<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('plant(1).png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Quicksand:wght@300&display=swap" rel="stylesheet"> 
    <title>{{$title}}</title>
</head>
<style>
    body {

      font-family: 'Montserrat', sans-serif;
      font-family: 'Quicksand', sans-serif;
    }
    *{
        margin:0px;
        padding:0px
    }
 
    .submenu{
        background: teal;
    }
    .top-navbar{
        background: teal;
    }
    .top-navbar{
        /* background-color: black; */
        width:100%;
        /* height: 77px; */
        padding: 19px 74px;
        display:flex;
        /* color:white; */
    }
    .top-navbar a{
        color:white;
        text-decoration: none;
        /* margin: 21px 0px 0px 49px; */
    }
    .left{
        flex: .3;
        color:white;
    }
    .right{
        flex:.7;
    }
    .right a{
        padding: 0px 30px;
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
}
.error-msg{
    color:red;
}
.spacing{
    /* padding: 51px 41px 0px 41px; */
    padding: 0px 41px 0px 41px;
}

    /* .side-bar{
        
        width: 20%;
  background: black;
  height: 1000px;
  display: flex;
  flex-direction: column;
} */
    
</style>
<body>
    <!-- <h1>adminlayout</h1> -->
    <div class="top-navbar">
    <div class="left">
       <h5>
            <a href="/admin">Agventure</a>
        </h5>
      </div>
        <div class="right">
        <a href="/admin/categories">View Categories</a>
        <a href="/admin/products">View Poducts</a>
        <a href="/admin/machines">View Machines</a>
       
<!-- drop down  -->
<div class="dropdown" style="     cursor: pointer;   display: inline-flex;">
  <p id="dLabel" type="button" style="color:white"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Other
  </p>
  <div class="dropdown-menu" style="transform: translate3d(-107px, 52px, 0px); position: absolute; top: 0px; left: 0px; will-change: transform;" aria-labelledby="dLabel" x-placement="bottom-start">
<a href="/admin/user-profiles" class="" style="color:black;padding: 14px;">View_Users</a>
  <hr>
  <a href="/admin/orders" style="color:black;padding: 14px;">View Orders</a> <hr>
<a href="/admin/guidelines" style="color:black;padding: 14px;">View Guidelines</a> <hr>
<a href="/admin/tips" style="color:black;padding: 14px;">View Tips</a> <hr>
<a href="/admin/auctions" style="color:black;padding: 14px;">View Auctions</a>   <hr>
@if(Session::get('loggedUser'))
    <a href="/auth/logout" style="color:black;padding: 14px;">Logout</a>
    @endif
  <!-- <a id="list-elements" style="padding: 14px;" style="padding: 14px;" class="" href="/auth/logout">Logout</a> -->
            <!-- <a class="submenu" href="/Logout">Logout</a> -->
  </div>
</div>
<!-- drop down end  -->





 
</div>
    
    </div>
    <div class="content">
    @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
</body>
</html>