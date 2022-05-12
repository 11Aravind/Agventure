@extends('layouts.layout')
@section('content')
<h2>Orders</h2>
@if(Session::get('msg'))
<span>{{Session::get('msg')}}</span>
@endif
@foreach($orders as $order)
<table class="table table-striped">
    <thead>
        <tr>
            <!-- <th></th> -->
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scop="row"><a href="/orders/{{$order->id}}">{{ $order->id}}
{{$order->user->name}}</a></td>
@foreach($order->products as $product)

<td>{{ $product->name}}</td>
@endforeach
<td>@foreach($order->machines as $machine)
<td>{{ $machine->name}}</td>
@endforeach</td>
<td>{{ $order->total}}</td>
<td>{{ $order->status}}  </td>
<td>{{$order->order_status}}</td>
        </tr>
    </tbody>
</table>

<div>

<!-- <a href="/orders/{{$order->id}}">{{ $order->id}}
{{$order->user->name}}</a> -->
<!-- @foreach($order->products as $product)
{{ $product->name}}
@endforeach -->
<!-- @foreach($order->machines as $machine)
{{ $machine->name}}
@endforeach -->


</div>
@endforeach
@endsection