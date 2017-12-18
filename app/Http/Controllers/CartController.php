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
          $cart = $this->repository->findOneBy(['name'=>'ordercart']);
      //    $cart = $this->repository->findAll();

         return view('ordercart', compact('cart'));
  }
  public function removeProducts()
  {
    $em = app('em');
    /** @var \Doctrine\ORM\EntityManager $em */
    $this->repository = $em->getRepository(Cart::class);
          $cart = $this->repository->findOneBy(['name'=>'ordercart']);
          $cart->removeAllProducts();
          EntityManager::flush();
          return "done";

  }

public function addProduct(Product $product)
{
  $em = app('em');
  /** @var \Doctrine\ORM\EntityManager $em */
  $this->repository = $em->getRepository(Cart::class);
  $cart = $this->repository->findOneBy(['name'=>'ordercart']);
  $product = new Product();
  $product->setName('useful');
  $product->setDescription('useful descrtiption ');
  EntityManager::persist($product);
  EntityManager::flush();
  $cart->addProduct($product);
  EntityManager::flush();
  return "doneadd";
}
}
