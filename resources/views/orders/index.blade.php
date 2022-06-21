@extends('layouts.adminLayout')
@section('content')
<!-- <h2>Orders</h2> -->
<div class="top text-center"><h3>Orders</h3></div>
<div class="spacing">
@if($orders->count()> 0)
<table class="table table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>user name</th>
            <th>product name</th>
            <th>totel</th>
            <th>status</th>
            <th>order status</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <th scop="row"><a href="/admin/orders/{{$order->id}}">{{ $order->id}}</a></th>
            <th>{{$order->user->name}}</th>
            <th>@foreach($order->products as $product)
{{ $product->name}}
@endforeach

@foreach($order->machines as $machine)
{{ $machine->name}}
@endforeach</th>
            <th>{{ $order->total}}</th>
            <th>{{ $order->status}}  </th>
            <th>
{{$order->order_status}}</th>
        </tr>
        @endforeach   
    </tbody>

<div>

</table>
</div>






</div>

@else
<p>No guidelines yet. Please check back later.</p>
@endif
@endsection