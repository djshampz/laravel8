@extends('layouts.admin')

@section('content')

    <div class="card mb-3">
        <div id="product">
            <img src={{ asset('/storage/images/'.$product->image) }} class="card-img-top" alt={{ $product->name }}>
        </div>
        <div class="card-body">
            <h5 class="card-title" id="detailsHeader">{{ $product->name }}</h5>
            <p class="card-text"  id="textDetails">Quantity:   {{ $product->quantity }}</p>
            <p class="card-text"  id="textDetails">Price($):   {{ $product->price }}</p>

            <a href={{ route('product.edit', $product->id) }} ><button class="btn-primary">Edit</button></a>
            <a href={{ route('product.delete', $product->id) }}><button class="btn-danger">Delete</button></a>

            <p class="card-text"><small class="text-muted"> Last updated {{ $product->updated_at->diffForHumans() }}</small></p>
        </div>
    </div>

@endsection
