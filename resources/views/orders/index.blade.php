@extends('layouts.adminLayout')
@section('content')
<<<<<<< HEAD
<!-- <h2>Orders</h2> -->
<div class="top text-center"><h3>Orders</h3></div>
=======
<h2>Orders</h2>
@if($orders->count()> 0)
>>>>>>> 04485f0a4dbcb71da08175ffea340b9fdad17a64
@foreach($orders as $order)
<div>

<a href="/admin/orders/{{$order->id}}">{{ $order->id}}</a>
{{$order->user->name}}
@foreach($order->products as $product)
{{ $product->name}}
@endforeach
@foreach($order->machines as $machine)
{{ $machine->name}}
@endforeach
{{ $order->total}}
{{ $order->status}}  
{{$order->order_status}}

</div>
@endforeach
@else
<p>No guidelines yet. Please check back later.</p>
@endif
@endsection