
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
     <a   href="#"> add to order Cart </a> |
     <a   href="#"> add to Wishlist Cart </a> |

   </div>

 </article>
 @empty
 no posts
@endforelse

@endsection
