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
<h2 class="text-center">Machine</h2>
<div class="maindiv">
    <div class="left">
    <img src="{{
    asset('images/'. $machine->image)}}" alt="{{ $machine->image }} " style="  margin-left: 144px;"alt="{{ $machine->name }}" height="250px">
    </div>
    <div class="right">
    <span class="maincontent"> {{ $machine->name}}</span> <br>
<span>{{ $machine->description}}</span> <br>
<span> </span> <br>
<span> {{ $machine->quantity }}&nbsp Left</span> <br>
<span > ₹ {{ $machine->price }}</span> <br>

    </div>
</div>
@endsection
