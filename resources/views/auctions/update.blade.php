@extends('layouts.layout')
@section('content')
<!-- <h2>Update Auction</h2> -->
<div class="container shadow-none p-3 mb-5 bg-light rounded" style="margin-top: 70px;">
<h2 class="text-center">Update Auction</h2>
<form action="/farmer/update-auction" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $auction->id }}">

    <!-- new temp  -->
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
  <div class="col">
  <label for="status">Status</label> 
    <select name="status" id="" class="form-control">
    <option value="status" selected disabled >Status</option>
    <option value="pending">Pending</option>
    <option value="cancelled">Cancel</option>
    <option value="ended">End</option>
    </select> <br>
    <span>@error('status') {{ $message }}@enderror</span> 
  </div>
</div>
    <!-- new temp end  -->

        
    <input type="submit" value="submit" class="btn btn-success"name="submit">
    
</form>
</div>
</div>
@endsection