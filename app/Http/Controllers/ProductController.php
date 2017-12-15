<?php

namespace App\Http\Controllers;

use App\Entities\Product;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManagerInterface;

class ProductController extends Controller
{


  public function getIndex(EntityManagerInterface $em)
  {
      $products = $em->getRepository(Product::class)->findAll();

      return view('admin.index', [
          'products' => $products
      ]);
  }

    public function getAdd()
    {
        return view('add');
    }

    public function ProductAdd(Request $request, EntityManagerInterface $em)
    {
        $task = new Task(
            $request->get('name'),
            $request->get('description')
        );

        $em->persist($task);
        $em->flush();

        return redirect('add')->with('success_message', 'Task added successfully!');
    }
    public function getToggle(EntityManagerInterface $em, $taskId)
{
    /* @var Task $task */
    $task = $em->getRepository(Task::class)->find($taskId);

    $task->toggleStatus();
    $newStatus = ($task->isDone()) ? 'done' : 'not done';

    $em->flush();

    return redirect('/')->with('success_message', 'Task successfully marked as ' . $newStatus);
}
public function getDelete(EntityManagerInterface $em, $taskId)
{
    $task = $em->getRepository(Task::class)->find($taskId);

    $em->remove($task);
    $em->flush();

    return redirect('/')->with('success_message', 'Task successfully removed.');
}
public function getEdit(EntityManagerInterface $em, $taskId)
{
    $task = $em->getRepository(Task::class)->find($taskId);

    return view('edit', [
        'task' => $task
    ]);
}
public function ProductEdit(Request $request, EntityManagerInterface $em, $taskId)
{
    /* @var Task $task */
    $task = $em->getRepository(Task::class)->find($taskId);

    $task->setName($request->get('name'));
    $task->setDescription($request->get('description'));

    $em->flush();

    return redirect('edit/' . $task->getId())->with('success_message', 'Task modified successfully.');
}

}
