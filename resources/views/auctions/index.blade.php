@extends('layouts.layout')
@section('content')

<!-- <h2>Auctions</h2> -->
<div class="top"><h3>Auctions Items</h3></div>
<div class="spacing" style="">
<table class="table striped">
    <thead>
    <tr>
        <th>Item Name</th>
        <th>Item Description</th>
        <th>Starting Price</th>
        <th>Quantity</th>
        <th>Created By</th>
        <th>Started At</th>
        <th>Status</th>
        <th>Image</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
@foreach($auctions as $auction)

<tr>
   
<td scop="row">
<a href="/farmer/auction/{{ $auction->id }}">
        {{
    $auction->item->name
        }}</a>
        </td>

        
        <td>
        {{
    $auction->item->description
}}

        </td>
       
        <td>
            {{
                $auction->starting_amount
            }}
        </td>
        <td>
            {{
                $auction->item->quantity
            }}
        </td>
        <td>
            {{
                $auction->user->name

            }}
        </td>
      @if($auction->started_at)
      <td>
            {{
                $auction->started_at->diffForHumans()
            }}
        </td>
      @endif
      <td>
          {{
            $auction->started_at
          }}
      </td>
        <td>
            {{
                $auction->status
            }}
        </td>
        <td>
        <img src="{{
           asset('images/'. $auction->item->image)}}" alt="{{ $auction->item->image }} " height="40px">

        </td>
        <td>
            <a href="/farmer/update-auction/{{ $auction-> id }}">Update</a>
        </td>
        <td>
            <a href="/farmer/delete-auction/{{ $auction-> id }}">Delete</a>
        </td>
        
    </tr>
    
@endforeach
</tbody>
</table>
        </div>
@endsection