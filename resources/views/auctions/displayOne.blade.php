@extends('layouts.layout')
@section('content')
<style>
    .maindiv{
        display:flex;
        margin: 23px;
    }
    .left{
        flex: .4;
    }
    .right{
        flex:.6;
        /* padding: 24px; */
    }
    .maincontent{
        font-weight: bolder;
font-size: 22px;
    }
    #addtocart{
        color:white;
        background-color: green;
        margin-top: 9px;
    }
</style>
<center style="padding: 18px 0px 0px 0px;">
<br> 
  <h2> Auction</h2>
  <br>
</center>
<!-- <h2 class="text-center">Auction</h2> -->
<!-- new start  -->
<div class="maindiv">
    <div class="left">
    <img src="{{asset('images/'. $auction->item->image)}}" alt="{{ $auction->item->image }} " height="250px">
    </div>
    <div class="right">
    <span class="maincontent"> {{$auction->item->name}}</span> <br>
    
    <span class="maincontent"> Starting Amount : &nbsp ₹ {{$auction->starting_amount}}</span> <br> <span> {{$auction->item->quantity}}&nbsp Left</span>
    <span>{{$auction->item->description}}</span> <br>
<!-- 
<span> {{$auction->item->quantity}}&nbsp Left</span> <br>
<span class="maincontent"> Starting Amount : &nbsp ₹ {{$auction->starting_amount}}</span> <br> -->
<span >  Farmenr:&nbsp  {{$auction->user->name}}</span> <br>
@if($auction->started_at)
Started At:&nbsp{{$auction->started_at->diffForHumans()}} <br>
@endif
@if($auction->ending_at)
Auction End: &nbsp{{$auction->ending_at->diffForHumans()}} <br>
@endif
@if($auction->duration)
Auction Duration:&nbsp{{$auction->duration}} hr<br>
@endif
<br>
{{$auction->status}}<br>
<form action="/auctions/new-bid" method="POST">
    @csrf
    <input type="hidden" name="auction_id" value="{{ $auction->id }}"><br>
   <div class="container">
   <div class="col-12">
   <label for="amount">Bid Amount</label>
    <input type="text" class="form-control" name="amount">
    @if(Session::get('fail'))
       <span class="errormsg"> {{ Session::get('fail')  }}</span>
    @endif
    @error('amount'){{ $message }}@enderror 
   </div>
    <input type="checkbox" style="margin-left: 20px;" name="agree" > Agree to terms and conditions <br> <br>
    <span class="errormsg">  @error('agree'){{ $message }}@enderror </span> 
    <input type="submit" name="submit" class="btn btn-success" value="Enter Auction">
   </div>
</form>




@endsection
<!-- new end  -->
