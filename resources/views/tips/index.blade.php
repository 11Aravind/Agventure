@extends('layouts.adminLayout')
@section('content')
<!-- <h2>Tips</h2> -->

<div class="top"><h3>Tips</h3><a href="/admin/create-tip">Add Tips</a> </div>
<div class="spacing">
<table class="table table-striped">
    <thead>
    <tr>
        <th>
            Titile
        </th>
        <th>
            Description
        </th>
        <th>
            Url
        </th>
        <th>
            Created By
        </th>
        <th>
            Created At
        </th>
    </tr>
    </thead>
    <tbody>
    <tr>
@foreach($tips as $tip)

<td scop="row">
<a href="/admin/tip/{{ $tip->id }}">
    {{ $tip->title }}
</a>
</td>

<td>
{{ $tip->description }}
</td>
<td>
    {{ $tip->url }}
</td>
<td>
    {{ $tip->user->name }}
</td>
<td>
    {{ $tip->created_at->diffForHumans() }}
</td>
@endforeach
</tr>
</tbody>
</table>
</div>
@endsection