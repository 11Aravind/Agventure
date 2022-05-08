@extends('layouts.adminLayout')
@section('content')
<!-- padding: 51px 41px 0px 41px; -->
<div class="top text-center"><h3>Auctions</h3></div>
<div class="spacing" style="">
<!-- <h2></h2> -->
<table class="table table-striped">
<thead>
    <tr>
        <th>Item Name</th>
        <th>Item Description</th>
        <th>Starting Price</th>
        <th>Quantity</th>
        <th>Created By</th>
        <th>Status</th>
        <th>Image</th>
        <th>Approve</th>
        <th>Reject</th>
    </tr>
</thead>
<tbody>
@foreach($auctions as $auction)

<tr>
   
<td scope="row">
<a href="/admin/auction/{{ $auction->id }}">
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
            <a href="/admin/auction/approve/{{ $auction-> id }}">Approve</a>
        </td>
        <td>
            <a href="/admin/auction/reject/{{ $auction-> id }}">Reject</a>
        </td>
        
    </tr>
    </tbody>
@endforeach
</table>
</div>
@endsection