@extends('layouts.app')

@section('shopping')
    @foreach($products as $item)

        <div class="col" id="mycolumn">
            <div class="col-sm-12 col-lg-6">
                <div class="card h-100 text-white bg-dark mb-3" style="width: 18rem;" id="items">
                    <div class="card-header">{{ $item->name }}</div>
                    <div id="shoppingproduct">
                        <img id="image-top"class="card-img-top" src={{ asset('/storage/images/'.$item->image) }} class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Price: {{ $item->price }} $</h5>
                        <p class="card-text">Available: {{ $item->quantity }}</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>


    @endforeach
@endsection
