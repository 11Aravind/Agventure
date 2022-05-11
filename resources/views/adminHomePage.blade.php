@extends('layouts.adminLayout')
@section('content')
<style>
    .submenu a {
    padding: 13px;
    color: white;
}
.submenu{
    width: 206px;height: 1000px;
/* background: black; */
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
<a href="/admin/user-profiles">View Users</a>

<a href="/admin/orders">View Orders</a>
<a href="/admin/guidelines">View Guidelines</a>
<a href="/admin/tips">View Tips</a>
<a href="/admin/auctions">View Auctions</a> 
</div>
@endsection