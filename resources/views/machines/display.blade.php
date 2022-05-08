@extends('layouts.layout')
@section('content')
<!-- <h2>Machines</h2> -->
<div class="container">
<center style="padding: 18px 0px 0px 0px;">
  <h1> Machines</h1>
</center>
@if ($machines->count())
    @foreach($machines as $machine)
    <!-- <a href="/machine/{{ $machine->id }}">
    <img src="{{ asset('images/'. $machine->image) }}"" alt="{{ $machine->name }}" height="100px"><br>
    <span> {{ $machine->name }}</span> <br>
    </a>
    <span> ₹ {{ $machine->price }}</span> <br>
    <span>{{ $machine->description }}</span> <br> -->

    <!-- new start  -->
    <div class="row" style="">
<!-- new template  -->

  <div class="col-sm-3" style="padding: 18px 30px 11px 45px;">
  <a href="/machine/{{ $machine->id }}">

  <div class="card" style="width: 15rem;">
  <img class="card-img-top" src="{{ asset('images/'. $machine->image) }}" alt="{{ $machine->name }}"style="width:275;height:185px;">
  <div class="card-body" style="padding:.8rem">
    <p class="card-text">
    <div class="product-shop">
<span class="product-name" itemprop="name">{{ $machine->name }}</span>
<div class="price-box">
<p class="old-price">
<span class="price">
<span><span class="price">₹ {{  $machine->price }}</span></span>
<span class="strike-through"></span>
</span>
</p>
</a>
</div>
<div class="short-desc ellipsis-text" ><p>{{ $machine->description }}</p></div>
</div>
    </p>
  </div>
</div>
</div>
    <!-- new end  -->
    @endforeach
@else
    <p>No products yet. Please check back later.</p>
@endif
</div>
@endsection