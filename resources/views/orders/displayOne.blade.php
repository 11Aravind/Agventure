@extends('layouts.layout')
@section('content')
<h2>Order</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>@foreach($order->products as $product)
{{ $product->name}}
@endforeach
@foreach($order->machines as $machine)
{{ $machine->name}}
@endforeach</td>
<td>{{  $order->user->name }}</td>
<td>{{$order->total}}</td>
<td>{{$order->status}}</td>
<td>{{$order->order_status}}</td>
<td><a href="/orders/cancel-order/{{$order->id}}">Cancel</a>` </td>
            </tr>
        </tbody>
    </table>


</div>
@endsection