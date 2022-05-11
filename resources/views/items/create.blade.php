@extends('layouts.layout')
@section('content')
<!-- <h2>Create Item</h2> -->
<div class="container shadow-none p-3 mb-5 bg-light rounded" style="margin-top: 70px;">
<h2 class="text-center">Create Item</h2>
<form action="/farmer/create-item" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- new  -->
    <div class="row">
    <div class="col">
    <label for="item_name">Item Name</label> 
    <input type="text" class="form-control" name="item_name"><br>
    <span>@error('item_name'){{ $message }}@enderror</span> 
  </div>
    <div class="col">
    <label for="category">Category</label> 
    <select name="category" class="form-control" >
        <option value="category"  selected disabled>Category</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>        
        @endforeach
    </select> <br>
    <span>@error('category') {{ $message }}@enderror</span> 
  </div>
</div>
  <div class="row">
    <div class="col">
    <label for="quantity">Item Quantity </label> 
    <input type="text"  class="form-control"name="quantity"><br>
    <span>@error('quantity')  {{ $message }} @enderror</span>  
  </div>
    <div class="col">
    <label for="item_image">Item Image </label> 
    <input type="file"  class="form-control"src="" alt="" name="item_image"><br>
    <span>@error('item_image'){{ $message }} @enderror</span> 
  </div>
</div>
<div class="col-12">
<label for="item_description">Item Description </label>
<textarea name="item_description" id="" cols="3" rows="5" class="form-control"></textarea>

</div>
    <!-- ne wnd  -->
 
   
   
   
    <input type="submit" value="submit"  class="btn btn-success"name="submit">
    
</form>
</div>
@endsection