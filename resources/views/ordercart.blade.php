
@extends('layouts.master')

@section('title')
orderCart
@endsection


@section('content')
<br>
<br>
<br>
<br>
<?php  $cartproducts = $cart->getProducts()?>
@foreach ($cartproducts as $product)
{{$product->getName()}}
{{$product->getDescription()}}
@endforeach

@endsection
