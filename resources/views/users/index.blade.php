@extends('layouts.adminLayout')
@section('content')
<!-- <h2>Users</h2> -->
<div class="spacing">
<div class="top text-center"><h3>Users</h3></div>
<table class="table table-striped">
   <thead>
<tr>
<th scop="row">Name</th>
<th>Email</th>
<th>Phone Number</th>
<th>Role</th>
<th>Joined At</th>
</tr>
</thead>
<tbody>
@foreach($users as $user)

<tr>
<a href="/profile/{{$user->id}}">
   <td> {{ $user->name }} </td>
</a>
   <td> {{ $user->email }} </td>
   <td> {{ $user->phone }} </td>
   <td> {{ $user->role }} </td>
   <td> {{ $user->created_at->diffForHumans() }} </td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection