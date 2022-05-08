@extends('layouts.layout')
@section('content')
<div class="cart" style="    margin: 29px 138px;">
<h2>My Cart </h2>
<table>
@php
$total = 0 ;
@endphp
@foreach($cartItems as $item)
@if($item->product_id)
<!-- new temp     -->
<table class="table striped">
    <!-- <thead>
    </thead> -->
        <tr>
            <tbody>
                <tr>
                    <td scop="row"><img src="{{ asset('images/'. $item->product->image)}}" style="width: 50px;height: 50px;"alt="{{ $item->product->image }} " height="20px"> </td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->product->price }} </td>
                    <td>
                        <span class="span" style="border:1px solid black"> <a href="/cart/increment-cart-item-count/{{$item->id}}">+</a>
{{$item->count}} <a href="/cart/decrement-cart-item-count/{{$item->id}}">-</a><span>
</td>
<td><a href="cart/delete-cart-item/{{$item->id}}">Delete</a></td>
@php
$total += ($item->product->price) * $item->count;
@endphp
                </tr>
            </tbody>
        </tr>
  
</table>
<!-- new temp end  -->
<!-- <span> {{ $item->product->name }} <span> {{ $item->product->price }} 
<img src="{{ asset('images/'. $item->product->image)}}" alt="{{ $item->product->image }} " height="20px"> 
<a href="/cart/increment-cart-item-count/{{$item->id}}">+</a>
{{$item->count}} <a href="/cart/decrement-cart-item-count/{{$item->id}}">-</a></span>
<a href="cart/delete-cart-item/{{$item->id}}">Delete</a> <br> -->

@endif
@if($item->machine_id)
<span> {{ $item->machine->name }} 
<img src="{{ asset('images/'. $item->machine->image)}}" alt="{{ $item->machine->image }} " height="20px"> 
<a href="/cart/increment-cart-item-count/{{$item->id}}">+</a>
{{$item->count}} <a href="/cart/decrement-cart-item-count/{{$item->id}}">-</a></span>
<a href="cart/delete-cart-item/{{$item->id}}">Delete</a> <br>
@php
$total += ($item->machine->price) * $item->count;
@endphp
@endif
@endforeach
</table>
@if($cartItems->count()>0)
<form action="/cart/proceed-to-buy" method="POST">
@csrf
<input type="hidden" name="total" value="{{ $total }}">
<input type="submit" class="btn btn-success" value="Proceed To Buy" name="submit">
</form>
@else
<h4> Empty cart!</h4>
@endif
</div>
@endsection