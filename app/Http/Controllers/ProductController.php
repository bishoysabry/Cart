<?php

namespace App\Http\Controllers;

use App\Entities\Product;
use App\Repository\ProductRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use LaravelDoctrine\ORM\Facades\EntityManager;
class ProductController extends Controller
{
  /**
   * @var ProductRepo
   */
  protected $productRepository;

  /**
   * ProductController constructor.
   *
   */
  public function __construct()
  {
      $em = app('em');
      /** @var \Doctrine\ORM\EntityManager $em */
      $this->repository = $em->getRepository(Product::class);
  }

  /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function getIndex()
{

      $products= $this->repository->retriveAll();
//  $products=$this->repository->retriveAll();
 return view('admin.index', compact('products'));
// return dd($products);
 //return dd($this->repository);
}

/*  $products = $em->getRepository(Product::class)
                         ->findOneBy(array('name' => $productName));
                         return view('admin.index', compact('products'));*/


/*  $products =EntityManager::All();

    return view('admin.index', compact('products'));*/
}
