@extends('layouts.layout')
@section('content')
<style>
    .submenu a {
    padding: 13px;
    color: white;
    text-decoration:none;
}
.submenu{
    width: 206px;height: 1000px;
background: #6dc36d;
    width: 206px;
    height: 1000px;
    display: flex;
    flex-direction: column;
    padding: 22px;
    color: white;
}
</style>
<!-- <h2>Admin Home Page</h2> -->
<div class="submenu"style="">
<a href="/farmer/items">View Items</a>

<a href="/farmer/auctions">View Auction</a>
<!--<a href="/admin/guidelines">View Guidelines</a>
<a href="/admin/tips">View Tips</a>
<a href="/admin/auctions">View Auctions</a>  -->
</div>

<!-- <h2>Farmer Home Page</h2> -->

<!-- </style> -->
<!-- <div class="top"><h3> Items</h3><a href="/farmer/items">View Items</a></div> -->
@endsection