<?php

namespace App\Http\Controllers;

use App\Entities\Cart;
use App\Entities\Product;
use App\Repository\ProductRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use LaravelDoctrine\ORM\Facades\EntityManager;
class CartController extends Controller
{
  public function CartProducts()
  {
    $em = app('em');
    /** @var \Doctrine\ORM\EntityManager $em */
    $this->repository = $em->getRepository(Cart::class);
          $products = $this->repository->findOneBy(['name'=>'ordercart']);

         return view('ordercart', compact('products'));
  }
  public function getProducts()
  {

  }
  public function getAllProducts()
{
    $em = app('em');
    /** @var \Doctrine\ORM\EntityManager $em */
    $repository = $em->getRepository(Product::class);
    return dd($repository->findAll());
}
}
