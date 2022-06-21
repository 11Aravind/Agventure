@extends('layouts.layout')
@section('content')

<!-- <h2>Results</h2> -->
<div class="top text-center"><h3> Results</h3></div>
<div class="spacing">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>User Name</th>
            <th>Farmer Name</th>
            <th>bid</th>
            <th>status</th>
           <th> Change Status</th>
        </tr>
    </thead>
    <tbody>
    @if($bids->count() > 0)
    @foreach($bids as $bid)
    <tr>
    <td scop="row">{{ $bid->user->name }} </td>
    <td>{{ $bid->auction->user->name}}</td>
    <td>{{ $bid->bid}}</td>
    <td>{{ $bid->status }}</td>
    <td> <a href="/farmer/auction/results/approve/{{ $bid->id }}">approve</a></td>
  </tr>
  @endforeach
</tbody>

    </table>
</div>
@else
    No bids yet!
@endif
@endsection