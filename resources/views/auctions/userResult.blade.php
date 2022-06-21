@extends('layouts.layout')
@section('content')
<h2>Results</h2>
@if($bids->count() > 0)
@foreach($bids as $bid)
<div class="spacing">
<table class="table table-striped">
    <thead>
        <tr>
            <th>User Name</th>
            <th>Farmer</th>
            <th>Bid</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scop="row">{{ $bid->user->name }}</td>
            <td> {{ $bid->auction->user->name}}</td>
            <td> {{ $bid->bid}}</td>
            <td>{{ $bid->status }} </td>
            <td>
      
            </td>
        </tr>
    </tbody>
</table>
</div>
@if($bid->status == "approved" )
        <!-- <a href="/auction/results/proceed-to-buy/{{ $bid->auction_id }}">Proceed To Buy</a> <br> <br> -->
        <form action="/auction/results/proceed-to-buy/{{ $bid->auction_id }}" method="POST">
            @csrf
            <input type="hidden" name="total" value="{{ $bid->bid }}">
            <input type="submit" style="float:right" value="Proceed To Buy" class="btn btn-success"name="submit">
        </form>
    @endif
    <!-- {{ $bid->user->name }} <br> -->
    <!-- {{ $bid->auction->user->name}} <br> -->
    <!-- {{ $bid->bid}} <br> -->
    <!-- {{ $bid->status }} &nbsp;&nbsp; -->
 
@endforeach
@else
    No bids yet!
@endif
@endsection