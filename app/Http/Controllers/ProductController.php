<?php

namespace App\Http\Controllers;

use App\Entities\Product;
use App\Entities\Cart;
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
    protected $repository;

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
 * @return array
 */
public function getIndex()
{
$ordercart = EntityManager::find(Cart::class,2);
$wishlistcart = EntityManager::find(Cart::class,1);
 $products = $this->repository->findAll();
  //return dd($products);
 //$products = EntityManager::findAll(Product::class);
  //    $products= $this->repository->findAll();
//  $products=$this->repository->retriveAll();
return view('admin.index', compact(['products','ordercart','wishlistcart']));
// return dd($products);
 //return dd($this->repository);
}










/*  $products = $em->getRepository(Product::class)
                         ->findOneBy(array('name' => $productName));
                         return view('admin.index', compact('products'));*/


/*  $products =EntityManager::All();

    return view('admin.index', compact('products'));*/
}
