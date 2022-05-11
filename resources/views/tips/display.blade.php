@extends('layouts.layout')
@section('content')
<!-- <h2>Tips</h2> -->
<style>
   .maincontent {
display:flex;
margin: 124px;
    margin-top: 4px;
    margin-bottom: 16px;
   }
   .left{
flex:.3;
   }
   .right{
    flex:.7;
    margin-left: 26px;
    margin-top: 20px;
   }
</style>
@foreach($tips as $tip)
<div class="maincontent">
    <div class="left">
    <iframe width="495" height="250" src="{{ $tip->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; 
autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="right">
    <h3>{{$tip->title}}</h3>
<p>{{$tip->description}}</p>
    </div>
</div>

@endforeach
@endsection
