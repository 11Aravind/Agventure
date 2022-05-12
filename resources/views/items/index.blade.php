@extends('layouts.layout')
@section('content')

<!-- <h2>Items</h2> -->
<!-- <div class="top"><h3> Items</h3></div> -->
<div class="top"><h3> Items</h3><a href="/farmer/create-item">Add new Items</a></div>
<!-- <div class="top text-center"><h3>Items</h3></div> -->
<div class="spacing" style="">
@if ($items->count())
<table class="table striped">
    <thead>
    <tr>
        <th>Item Name</th>
        <th>Item Description</th>
        <th>Quantity</th>
        <th>Created By</th>
        <th>Image</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
@foreach($items as $item)

<tr>
   
<td scop="row">
<a href="/farmer/item/{{ $item->id }}">
        {{
    $item->name
        }}</a>
        </td>

        
        <td>
        {{
    $item->description
}}

        </td>
        <td>
            {{
                $item->quantity
            }}
        </td>
        <td>
            {{
                $item->user->name

            }}
        </td>
        <td>
        <img src="{{
           asset('images/'. $item->image)}}" alt="{{ $item->image }} " height="40px">

        </td>
        <td>
            <a href="/farmer/update-item/{{ $item-> id }}">Update</a>
        </td>
        <td>
            <a href="/farmer/delete-item/{{ $item-> id }}">Delete</a>
        </td>
        
    </tr>
  
@endforeach
</tbody>
</table>
<!-- <a href="/farmer/create-item">Add new item</a> -->
@else
<p>No items yet. Please check back later.</p>
<br>
<!-- <a href="/farmer/create-item">Add new item</a> -->
@endif
        </div>
@endsection