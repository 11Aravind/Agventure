

@extends('layouts.layout')
@section('content')
<div class="container">
<center style="padding: 18px 0px 0px 0px;">
<br> 
  <h2> Guidelines</h2>
  <br>
</center>
@if($guidelines->count() > 0)

@foreach($guidelines as $guideline)</a>
    <div class="row" >
<!-- new template  -->

  <div class="col-sm-3" style="padding: 18px 30px 11px 45px;">
  <a href="/guideline/{{ $guideline->id }}">

  <div class="card" style="width: 15rem;">
  <img class="card-img-top" src="{{ asset('images/'. $guideline->image) }}" alt="{{ $guideline->disease_name }}"  style="width:275;height:185px;">
  <div class="card-body" style="padding:.8rem">
    <p class="card-text">
    <div class="product-shop">
<span class="product-name" itemprop="name">{{$guideline->disease_name}}</span>
<div class="price-box">
<p class="old-price">
<span class="price">
<!-- <span><span class="price"></span></span> -->
<span class="strike-through"></span>
</span>

</p>
</a>
</div>
<div class="short-desc ellipsis-text" ><p>{{ $guideline->short_description }}</p></div>

</div>
    </p>
  </div>
</div>
</div>
@endforeach
@else
<p>No guidelines yet. Please check back later.</p>
@endif

@endsection




