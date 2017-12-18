
@extends('layouts.master')

@section('title')
products
@endsection


@section('content')
<br>
<br>
 <h1> <a href="{{ url('articles/create') }}">Add</a></h1>

 @forelse($products as $product)
 <article class="product" data-productid="">
   <h1>{{$product->getName()}}</h1>
   <div class="info">
  <p>{{$product->getDescription()}}</p>

   </div>
   <div class="interaction">
     @if ($ordercart->hasProduct($product))
    <span> Added to ordercart</span> |
    @else
     <a   href="/add/ordercart/{{$product->getId()}}"> add to order Cart </a> |
     @endif
     @if ($wishlistcart->hasProduct($product))
    <span> Added to WishList Cart</span> |
    @else
     <a   href="/add/wish list cart/{{$product->getId()}}"> add to Wishlist Cart </a> |
     @endif


   </div>

 </article>
 @empty
 no posts
@endforelse

@endsection
