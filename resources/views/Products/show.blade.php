@extends('layouts.admin')

@section('content')

    <main>
    <div class="container-fluid">
        <h1 class="mt-4">Products</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href={{ route('addProduct') }} ><button class="btn-primary">Add</button></a></li>
        </ol>
        <div class="row">
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                DataTable Example
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price($)</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Price($)</th>
                            <th>Quantity</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td><a href={{ route('product.edit', $product->id) }} ><button class="btn-primary">Edit</button></a></td>
                                <td><a href={{ route('product.delete', $product->id) }}><button class="btn-danger">Delete</button></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection
