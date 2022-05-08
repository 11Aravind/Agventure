@extends('layouts.layout')
@section('content')
<!-- <h2>Create Complaints</h2> -->
<div class="container shadow-none p-3 mb-5 bg-light rounded" style="margin-top: 70px;">
<h2 class="text-center">Create Complaints</h2>
<form action="/user/create-complaint" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- new  -->
    <div class="row">
    <div class="col">
    <label for="subject">Subject</label> 
    <input type="text"class="form-control" name="subject"><br>
    <span>@error('subject'){{ $message }}@enderror</span>    </div>
    <div class="col">
    <label for="proof">Proof</label> 
    <input type="file"class="form-control" name="proof"> <br>
    <span>@error('proof')  {{ $message }}  @enderror</span> 
    
    </div>
  </div>
  <div class="col-12">
  <label for="complaint">Complaint</label> 
    <textarea type="text"class="form-control" name="complaint" > </textarea><br>
    <span>@error('complaint') {{ $message }}@enderror</span> 
  </div>
  <input type="submit" value="submit" name="submit"class="btn btn-success block">
  <!-- <input type="submit" > -->
    <!-- new end  -->
</form>
</div>
@endsection