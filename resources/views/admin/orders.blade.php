@extends('layouts.admin')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">User_id</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $item)
        <tr>
            <th scope="row">{{ $item->name_product }}</th>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->price }}</td>
            <td><a href= {{ route('user.details', $item->user_id) }}> {{ $item->user_id }} </a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
