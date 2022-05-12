@extends('layouts.layout')
@section('content')
<style>
  .checkout{
    margin: 27px 114px 114px 114px;
}
 .add_newaddress{
  border: none;
    outline: none;
    background: #f8f9fa;
 } 
</style>
<div class="checkout shadow-none p-3 mb-5 bg-light rounded">
<h2>Checkout</h2>

<div>


<h5 > Add New Address<button class="add_newaddress" onclick="toggleAdressForm()"> + </button></h5>
<div id="address" class="shadow-none p-3 mb-5 bg-light rounded" style="display:none">
<form action="/checkout/create-address" method="POST">
  @csrf
<!-- new  -->
<div class="row">
    <div class="col">
    <label for="name">Full Name</label> 
    <input  class="form-control"  type="text" name="name"><br>
    <span>@error('name') {{ $message }}  @enderror</span>     </div>
    <div class="col">
    <label for="phone">Phone</label> 
    <input  class="form-control"  type="text" name="phone"><br>
    <span>@error('phone'){{ $message }}@enderror</span>
    </div>
  </div>
  <div class="row">
    <div class="col">
    <label for="house_name">House Name</label> 
    <input  class="form-control"  type="text" name="house_name"><br>
    <span>@error('house_name') {{ $message }}@enderror</span>     </div>
    <div class="col">
    <label for="street">Street</label> 
        <input  class="form-control"  type="text" name="street"><br>
        <span>@error('street') { $message }}@enderror</span>  
    </div>
  </div>
  <div class="row">
    <div class="col">
    <label for="pincode">Pincode</label> 
        <input  class="form-control"  type="text" name="pincode"><br>
        <span>@error('pincode') {{ $message }}@enderror</span>     </div>
    <div class="col">
    <label for="city">City</label> 
        <input class="form-control"   type="text" name="city"><br>
        <span>@error('city') {{ $message }} @enderror</span>   
    </div>
  </div>
  <div class="row">
    <div class="col">
    <label for="district">District</label> 
        <input  class="form-control" type="text" name="district"><br>
        <span>@error('district') {{ $message }}@enderror</span>    </div>
    <div class="col">
    <label for="state">State</label> 
        <input class="form-control"  type="text" name="state"><br>
        <span>@error('state'){{ $message }}@enderror</span>   
    </div>
  </div>
<!-- end  -->
 
         
    
      

     
       

        <input type="submit"  class="btn btn-success"value="add" name="submit">
</form>
</div>
<br>
<!-- <br><br> -->
<form action="/checkout" method="POST">
@csrf

<h5>Select address</h5> <br>
<!-- @if(Session::get('success'))
<input type="hidden" name="auction_id" value="{{ Session::get('auctionId') }}">
@endif -->

<!-- <h4>Select address</h4> <br> -->
    @foreach($addresses as $address)
    <input type="radio" name="selected_address" value="{{ $address->id }}" >  
    <span>{{ $address->name}}, <br> {{ $address->house_name}},<br>
        {{ $address->street}},{{ $address->city}},{{ $address->district }}, <br>{{ $address->state }},,{{ $address->phone}}
        {{ $address->pincode }}. 
        <!-- <a href="/checkout/update-address/{{$address->id}}">Edit</a>  -->
        <a href="/checkout/delete-address/{{$address->id}}">Delete</a></span> <br>
    @endforeach
    <span>@error('selected_address') {{ $message }}@enderror</span> <br>
</div>
<label for="payment_method">Payment Method</label><br>
<input  type="radio" name="payment_method" value="card" onclick="displayPaymentForm()">&nbsp &nbsp  Credit/Debit/ATM Card<br> 

<div id="payment" class="shadow-none p-3 mb-5 bg-light rounded" style="display:none">
<h5>Add Payment Details</h5>
<!-- new  -->
<div class="row">
    <div class="col">
    <label for="card_number">Card Number</label> 
<input type="text" class="form-control" name="card_number" > <br>
<span>@error('card_number') {{ $message }}@enderror</span>  
     </div>
    <div class="col">
    <label for="expiry_month">Expiry Month</label> 
<input type="text" class="form-control" name="expiry_month"><br>
<span>@error('expiry_month'){{ $message }} @enderror</span>  
    </div>
  </div>
  <div class="row">
    <div class="col">
    <label for="expiry_year">Expiry Year</label> 
<input type="text" class="form-control" name="expiry_year"><br>
<span>@error('expiry_year'){{ $message }} @enderror</span>  
     </div>
    <div class="col">
    <label for="cvv">CVV</label> 
<input type="password" class="form-control" name="cvv"><br>
<span>@error('cvv'){{ $message }}@enderror</span> 
    </div>
  </div>
<!-- new end  -->
</div>
<input  type="radio" name="payment_method" value="cod" onclick="hidePaymentForm()">&nbsp  &nbspCOD<br>
<input type="submit" value="PROCEED" class="btn btn-success" style="margin-top: 12px;" name="submit">
</form>

@if(Session::has('stripe_error'))
<p>{{ Session::get('stripe_error')}}</p>
@endif

<script>
    
  function toggleAdressForm() {
  var x = document.getElementById("address");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function displayPaymentForm() {
  var x = document.getElementById("payment");
  if (x.style.display === "none") {
    x.style.display = "block";
  }
}
function hidePaymentForm() {
  var x = document.getElementById("payment");
  if (x.style.display != "none") {
    x.style.display = "none";
  }
}

</script>
</div>
@endsection
