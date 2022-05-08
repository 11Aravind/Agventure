@extends('layouts.adminLayout')
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
<div class="maindiv">
    <div class="left">
    <img src="{{asset('images/'. $product->image)}}" style="  margin-left: 144px;"alt="{{ $product->name }}" height="250px">
    </div>
    <div class="right">
    <span class="maincontent"> {{ $product->name}}</span> <br>
<span>{{ $product->description}}</span> <br>
<span> {{$product->category->name}}</span> <br>
<span> {{ $product->quantity }}&nbsp Left</span> <br>
<span > ₹ {{ $product->price }}</span> <br>
<span >  {{ $product->suitable_crops }}</span> <br>
<span > {{ $product->reccomended_crops }}</span> 
<span >  {{ $product->composition }}</span> <br>
    </div>
</div>
@endsection