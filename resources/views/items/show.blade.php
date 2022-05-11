@extends('layouts.layout')
@section('content')
<!-- new temp  -->
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
<!-- <h2>product</h2> -->
<div class="maindiv">
    <div class="left">
    <img src="{{
    asset('images/'. $item->image)}}" style="  margin-left: 144px;"alt="{{ $item->image }}" height="250px">
    </div>
    <div class="right">
    <span class="maincontent"> {{ $item->name }}</span> <br>
<span>{{ $item->description }}</span> <br>

<span> {{ $item->quantity }}&nbsp Left</span> <br>
<span class="maincontent"> {{$item->user->user_name}}</span> <br>
<span >  {{  $item->price }}</span> <br>


    </div>
</div>
<!-- end temp  -->

@endsection