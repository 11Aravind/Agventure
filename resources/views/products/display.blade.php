@extends('layouts.layout')
@section('content')
@if ($products->count())
<div class="card-deck" style="margin: 51px;">


@foreach($products as $product)
<div class="card">
<a href="/product/{{ $product->id }}">
  <div class="card">
    <img class="card-img-top"src="{{ asset('images/'. $product->image) }}" style="width:275;height:185px;"alt="{{ $product->name }}">

    <div class="card-body">
      <h5 class="card-title">{{ $product->name }}</h5>
</a>
      ₹ {{ $product->price }}
      <p class="card-text">{{ \Illuminate\Support\Str::limit($product->description, 150, $end='...') }}</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>

  </div>
@endforeach

</div>
@endif

@endsection
<!-- new tempna new start  -->
