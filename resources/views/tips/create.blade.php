@extends('layouts.adminLayout')
@section('content')
<!-- <h2>Create Tip</h2> -->
<div class="container shadow-none p-3 mb-5 bg-light rounded" style="margin-top: 70px;">
<h2 class="text-center">Create Tip</h2><br>
<form action="/admin/create-tip" method="POST">
@csrf

<div class="row">
    <div class="col">
    <label for="title">Title</label>
    <input type="text" class="form-control"name="title"><br>
    <span class="error-msg">@error('title'){{ $message }}  @enderror</span> 
    </div>
    <div class="col">
    <label for="description">Description</label>
    <input type="text" class="form-control"name="description"><br>
    <span class="error-msg">@error('description') {{ $message }} @enderror</span> 
    </div>
</div>
<div class="row">
    <div class="col-12">
    <label for="url">Url</label>
    <input type="text" class="form-control"name="url"><br>
    <span class="error-msg">@error('url') {{ $message }} @enderror</span> 
    </div>
    <div class="col"style="margin-top: 23px;">
    <input type="submit" style="float:right;color:white;margin-top: -27px;"value="submit" name="submit" class="btn btn-warning">
    </div>
  </div>



    <!-- <label for="title">Title</label>
    <input type="text" name="title"><br>
    <span class="error-msg">@error('title'){{ $message }}  @enderror</span> 
        <label for="description">Description</label>
    <input type="text" name="description"><br>
    <span class="error-msg">@error('description') {{ $message }} @enderror</span> 
        <label for="url">Url</label>
    <input type="text" name="url"><br>
    <span class="error-msg">@error('url') {{ $message }} @enderror</span> 
        <input type="submit" value="submit" name="submit"> -->
 
</form>
</div>
@endsection