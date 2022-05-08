@extends('layouts.adminLayout')
@section('content')
<div class="top"><h3>Guidelines</h3><a href="/admin/create-guideline">Add Guidelines</a> </div>
<div class="spacing">
<!-- <h2>Guidelines</h2> -->
<table class="table table-striped">
    <thead>
    <tr>
        <th>Desease Name</th>
        <th>Short Description</th>
        <th>Symptoms</th>
        <th>Image</th>
    </tr>
    </thead>
    <tbody>
@foreach($guidelines as $guideline)
<tr>
    <td scop="row">
<h4>{{
    $guideline->disease_name
}}
</h4></td> 
<td>
<p>{{ $guideline->short_description }}</p></td> 
<td><img src="{{ asset('images/'. $guideline->image) }}"" alt="{{ $guideline->disease_name }}" height="70px"></td>
</tr>
</tbody>
@endforeach
</table>
</div>



@endsection