<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('plant(1).png') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Quicksand:wght@300&display=swap" rel="stylesheet"> 
        <title>{{$title}}</title>
<style>   

 body {
    font-family: 'Montserrat', sans-serif;
    font-family: 'Quicksand', sans-serif;
}  
.errormsg{
    color:red;
}
.success{
    color:green;
}
    
img .d-block.w-100 {
    height: 500px;
}
.img-with-text {
    padding: 0px 33px;
    margin-top: 15px;
    text-align: center;
}
.head{
    color:#f35121;  
}
.redbtn{
    background:#f35121;
}
.top{
        display: flex;
background-color: #f9f5f5;
padding: 21px;
/* margin: 56px; */
margin: 25px;
    }
.top-nav-bar{
    padding: 0px 0px 15px 0px;
    display: flex;
    margin-bottom: 0px;
    /* background-color: #f2f2f2; */
  
            }
.categoryImag{
    width: 20px;
    height: 20px;
}
.searchBox{
    /* border-radius: 6px; */
    margin-top: 28px;
    width: 196px;
    padding: 3px;
    border: none;
    border-bottom:1px solid black;
    outline: none;
    /* background-color: #f2f2f2; */
}

#list-elements{
    text-decoration: none;
    color: black;
    flex: 1;
    border-radius: 7px;
    font-size: 17px;
    padding: 8px;
}

.footer{
    padding: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
    
}    
.bar{
    background: #6dc36d;height: 23px;
    display:flex;
    color:white;
}
.bar a{
    text-decoration:none;
    color:white;
    padding: 16px;
}
.contact{
    margin-left: 68px;
    flex:.9;
}
.top-nav-bar{
    border-bottom: 1px solid #eee;
}
.spacing{
    /* padding: 51px 41px 0px 41px;
    padding: 0px 41px 0px 41px;
}
        .top{
        display: flex;
background-color: #f9f5f5;
padding: 21px;
/* margin: 56px; */
margin: 25px;
    }
    .top h3 {
  flex: .9;
    background-color: #b2b2b2;
    bottom: 0px;
}  */
.errormsg{
    color: red;
}
.successmsg{
    color: green;
}
    </style>
    </head>

    <body class="content">
    <div class="bar" style="">
<div class="contact">
0468-12345566 &nbsp aravind@gmail.com
</div>
   
<div class="menus"><a href="/tips">Tips</a>
<a href="/auctions">Auction</a>
<a href="/guidelines">Guideline</a>
<a href="/soil-test/create-soil-test">soil Text</a>
<a href="/weather">weather</a>

<a href="/user/create-complaint">complaint</a></div> 
</div>
        <ul class="top-nav-bar">
            <a id="list-elements"href="/"><h3>Agventure</h3></a>            
            <div class="img-with-text">
                <a href="/products?category=1">
            <img class="categoryImag"src="{{ asset('farming-black.png') }}   " alt="seeds" /> </a>
    <br>
    <a id="list-elements"href="/products?category=1"  class="categoryname">Seeds </a>
</div>
            <div class="img-with-text">
            <a href="/products?category=2">
    <img class="categoryImag"src="{{ asset('fertilizer-black.png') }}   " alt="fertilizers" /> </a>
    <br>
    <a id="list-elements"href="/products?category=2"  class="categoryname">Fertilizers </a>
</div>
            <div class="img-with-text">
            <a href="/products?category=2">
    <img class="categoryImag"src="{{ asset('pesticide-black.png') }}   " alt="pesticides" /> </a>
    <br>
   <a id="list-elements"href="/products?category=3" class="categoryname">Pesticides </a>
</div>
<div class="img-with-text">
<a href="/machines">
    <img class="categoryImag"src=" {{ asset('tractor-black.png') }}  " alt="machines" /></a> <br>
    <a id="list-elements"href="/machines"  class="categoryname">Machines</a>
</div>
@if(Session::get('role')=='farmer')
<!-- <div class="img-with-text">
<a href="/machines">
    <img class="categoryImag"src=" {{ asset('tractor-black.png') }}  " alt="machines" /></a> <br>
    <a id="list-elements"href="/machines"  class="categoryname">Other</a>
</div> -->

<!-- new  -->
<!-- drop down  -->
<div class="dropdown" style="    cursor: pointer;">
  <p id="dLabel" id="list-elements"  style="margin-right: 18px;margin-top: 35px;"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Other
  </p>
  <div class="dropdown-menu"  style="transform: translate3d(-117px, 55px, 0px);"aria-labelledby="dLabel">

  <a href="/farmer/items" class="submenu"style="padding: 14px;">View Items</a>
<hr>
<a href="/farmer/auctions" class="submenu"style="padding: 14px;">View Auction</a>

  
            <!-- <a class="submenu" href="/Logout">Logout</a> -->
  </div>
</div>
<!-- drop down end  -->
@endif
<!-- {{ Session::get('loggedUser') }}  -->

<form action="/products" method="GET">
            
            <input type="text" class="searchBox" name="search" 
            placeholder="Search..."
            value="{{ request('search') }}">
            <!-- <img class="searchimg"src="{{ asset('assets/search.png') }}    " alt="search"> -->
           </form>
            @if(Session::get('loggedUser'))
            <div class="img-with-text">
                <a href="/cart">
             <img class="categoryImag"src="{{ asset('shopping-cart-black.png') }}   " alt="cart" /> 
             </a>
        <br>
        <!-- <a id="list-elements"href="/cart"  class="categoryname">Cart </p> -->
        </div>
<!-- drop down  -->
<div class="dropdown">
  <p id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="https://thumbs.dreamstime.com/b/businessman-avatar-image-beard-hairstyle-male-profile-vector-illustration-178545831.jpg" 
    alt="userpic" style="width: 43px;
    height: 43px;
    margin-right: 15px;
    margin-top: 9px;">
  </p>
  <div class="dropdown-menu"  style="transform: translate3d(-124px, 55px, 0px);"aria-labelledby="dLabel">
  <span class="submenu"style="padding: 14px;">Welocme , user {{ Session::get('loggedUser') }}</span> <br>
  <hr>
  <a id="list-elements" style="padding: 14px;"class="submenu" href="/auth/logout">Logout</a>
            <!-- <a class="submenu" href="/Logout">Logout</a> -->
  </div>
</div>
<!-- drop down end  -->
        
            <!-- Welocme , user {{ Session::get('loggedUser') }} -->
            <!-- <a id="list-elements" href="/auth/logout">Logout</a> -->
                @else
                <div class="img-with-text" style="margin-top: 31px;">
    <a href="/auth/signin" tyle="color: white;" class="btn btn-light" id="list-elements">Signin</a>
</div>
            @endif
        </ul>
    @yield('content')
    <footer class="footer">
      
       <!-- <span class="footer-content">&copy;Agventure</span> -->
     
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
    </footer>
    </body>
</html>
