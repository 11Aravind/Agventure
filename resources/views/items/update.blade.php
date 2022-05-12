@extends('layouts.layout')
@section('content')
<!-- <h2>Create Item</h2> -->
<div class="container shadow-none p-3 mb-5 bg-light rounded" style="margin-top: 70px;">
<h2 class="text-center">Update Item</h2>
<form action="/farmer/update-item" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$item->id}}">
    <input type="hidden" name="item_image" value="{{$item->image}}">

    <div class="row">
    <div class="col">
    <label for="item_name">Item Name</label> 
    <input type="text"class="form-control" name="item_name" value="{{$item->name}}"><br>
    <span>@error('item_name') {{ $message }} @enderror</span> 
  </div>
    <div class="col">
    <label for="item_description">Item Description</label> 
    <input type="text" class="form-control"name="item_description" value="{{$item->description}}"><br>
    <span>@error('item_description') {{ $message }}@enderror</span> 
  </div>
</div>
<div class="row">
    <div class="col">
    <label for="category">Category</label> 
    <select class="form-control"name="category" >
        <option value="category"  selected disabled>Category</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>        
        @endforeach
    </select> <br>
    <span>@error('category'){{ $message }} @enderror</span> 
  </div>
    <div class="col">
    <label for="quantity">Item Quantity </label> 
    <input type="text"class="form-control" name="quantity" value="{{$item->quantity}}"><br>
    <span>@error('quantity'){{ $message }}@enderror</span> 
  </div>
</div>


    <!-- <label for="item_name">Item Name</label> 
    <input type="text" name="item_name" value="{{$item->name}}"><br>
    <span>@error('item_name') {{ $message }} @enderror</span>  -->
    <!-- <label for="item_description">Item Description</label> 
    <input type="text" name="item_description" value="{{$item->description}}"><br>
    <span>@error('item_description') {{ $message }}@enderror</span>  -->
   
    <!-- <label for="quantity">Item Quantity </label> 
    <input type="text" name="quantity" value="{{$item->quantity}}"><br>
    <span>@error('quantity'){{ $message }}@enderror</span>  -->
   
    <!-- <label for="item_image">Item Image </label> <br>
    <input type="file" src="" alt="" name="item_image"><br>
    <span>@error('item_image') 
        
        {{ $message }}
    
        @enderror</span> <br> -->
    <input type="submit" value="submit" class="btn btn-success"name="submit">
    
</form>
</div>
</div>
@endsection