@extends('layouts.adminLayout')
@section('content')

<!-- new     start -->

<div class="container shadow-none p-3 mb-5 bg-light rounded" style="margin-top: 70px;">
<h2 class="text-center">Create Guideline</h2><br>
<form action="/admin/create-guideline" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- new one -->
  <div class="row">
    <div class="col">
    <label for="disease_name">Disease Name</label> 
    <input type="text" class="form-control"name="disease_name"> <br>
    <span class="error-msg">@error('disease_name') {{ $message }}@enderror</span> 
    </div>
    <div class="col">
    <label for="short_description">Short Description</label> 
    <input type="text" class="form-control" name="short_description"> <br>
    <span class="error-msg">@error('short_description') {{ $message }}@enderror</span> 
    </div>
  </div>

  <div class="row">
    <div class="col">
    <label for="symptoms">Symptoms</label> 
    <input type="text" class="form-control" name="symptoms"> <br>
    <span class="error-msg">@error('symptoms') {{ $message }}@enderror</span> 
</div>
    <div class="col">
    <label for="image">Image</label> 
    <input type="file" class="form-control" name="image" > <br>
    <span class="error-msg">@error('image') {{ $message }}@enderror</span> 
    </div>
    
  </div>
<!-- </div> -->
<div class="col"style="margin-top: 23px;">
    <input type="submit" style="float:right;color:white;margin-top: -27px;"value="submit" name="submit" class="btn btn-warning">
    </div>
  <!-- <input type="submit" value="submit" name="submit"> -->
</form>

    <!-- new one end -->
    </div>
<!-- new end  -->
<!-- 
<h2>Create Guideline</h2>
<form action="/admin/create-guideline" method="POST" enctype="multipart/form-data">
   
    
  
   
   
</form> -->

@endsection