@extends('layouts.layout')
@section('content')
<!-- <h2>Create Auction</h2> -->
<div class="container shadow-none p-3 mb-5 bg-light rounded" style="margin-top: 70px;">
<h2 class="text-center">Create Auction</h2>
<form action="/farmer/create-auction" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="item_id" value="{{ $item->id }}">
    <!-- new  -->
    <div class="row">
    <div class="col">
    <label for="starting_price">Starting Price</label> 
    <input type="text"class="form-control" name="starting_price"><br>
    <span>@error('starting_price'){{ $message }} @enderror</span> 
  </div>
    <div class="col">
    <label for="duration">Duration</label> 
    <select name="duration" class="form-control"id="">
    <option value="duration" selected disabled >Duration</option>
    <option value="6">6 hrs</option>
    <option value="12">12 hrs</option>
    <option value="18">18 hrs</option>
    <option value="24">24 hrs</option>
    <option value="30">30 hrs</option>    
    <option value="48">48 hrs</option>
    </select> <br>
    <span>@error('duration'){{ $message }} @enderror</span>  
  </div>
</div>
<!-- new end  -->

    
    <input type="submit"  style="float:right"class="btn btn-success" value="submit" name="submit">
    
</form>
</div>
@endsection