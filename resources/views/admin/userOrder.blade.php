@extends('layouts.admin')

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>id</th>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Products</th>
            <th>Total Price</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>id</th>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Products</th>
            <th>Total Price</th>

        </tr>
        </tfoot>
        <tbody>
            @foreach($orders as $order)
                <tr data-entry-id="{{ $order->id }}">
                    <td>
                        {{ $order->id ?? '' }}
                    </td>
                    <td>
                        {{ $order->customer_name ?? '' }}
                    </td>
                    <td>
                        {{ $order->customer_email ?? '' }}
                    </td>
                    <td>
                        <ul>
                            @foreach($order->products as $item)
                                <li>{{ $item->name }} ({{ $item->pivot->quantity }} x ${{ $item->price }}) </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        {{ $order->price ?? '' }}
                    </td>

                </tr>
        @endforeach
        </tbody>
    </table>
@endsection
