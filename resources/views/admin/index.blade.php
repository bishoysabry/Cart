
@extends('layouts.master')

@section('title')
products
@endsection


@section('content')
<br>
<br>
 <h1>hello</h1>

 @forelse($products as $product)
 <article class="product" data-productid="">
   <h1>{{$product->name}}</h1>
   <div class="info">
  <p></p>

   </div>
   <div class="interaction">
     <a   href="#">Like</a> |
     <a href="#">Dislike</a>
     |<a  id="edit" href="#"> Edit</a> |
     <a  class="confirm" href="">Delete</a>

   </div>

 </article>
 @empty
 no posts
@endforelse

@endsection
