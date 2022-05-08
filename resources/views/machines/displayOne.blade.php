@extends('layouts.layout')
@section('content')
<style>
    .maindiv{
        display:flex;
        margin: 23px;
    }
    .left{
        flex: .4;
    }
    .right{
        flex:.6;
        padding: 24px;
    }
    .maincontent{
        font-weight: bolder;
font-size: 22px;
    }
    #addtocart{
        color:white;
        background-color: green;
        margin-top: 9px;
    }
</style>

<!-- new start  -->
<div class="maindiv">
    <div class="left">
    <img src="{{ asset('images/'. $machine->image) }}" style="  margin-left: 144px;"alt="{{ $machine->name }}" height="250px">
    </div>
    <div class="right">
    <span class="maincontent"> {{ $machine->name }}</span> <br>
<span>{{ $machine->description }}</span> <br>
<!-- <span>{{ $machine->category->name }}</span> <br> -->
<span> {{ $machine->quantity }}&nbsp Left</span> <br>
<span class="maincontent"> ₹ {{ $machine->price }}</span> <br>

<form action="/add-to-cart" method="POST">
@csrf
<input type="hidden" name="machine_id" value="{{$machine->id}}">
<input type="submit" value="Add To Cart"  class="btn btn-success"name="submit">
</form>
<!-- new end  -->


<!-- <img src="{{ asset('images/'. $machine->image) }}"alt="{{ $machine->name }}" height="250px"><br>
<span> {{ $machine->name }}</span> <br>
<span>{{ $machine->description }}</span> <br>
<span> {{ $machine->quantity }}</span> <br>
<span> ₹ {{ $machine->price }}</span> <br> -->
<!-- <form action="/add-to-cart" method="POST">
@csrf
<input type="hidden" name="machine_id" value="{{$machine->id}}">
<input type="submit" value="Add To Cart" name="submit">
</form> -->

@endsection