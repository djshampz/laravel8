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
{{--                        <form action = "{{ route('addtoCart')}}" method="post">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" class="form-control @error('product_id') is-invalid @enderror" name="product_id" value={{ $item->id }} >--}}
{{--                            <input type="hidden" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ Auth::user()->id }}">--}}
{{--                            <button class = "btn btn-primary">Add to Cart</button>--}}
{{--                        </form>--}}
                        <form action = "{{ route('store4')}}" method="post">
                            @csrf
                            <input type="hidden"  name="id" value={{ $item->id }} >
                            <input type="hidden"  name="name" value="{{ $item->name }}">
                            <input type="hidden"  name="price" value="{{ $item->price }}">
                            <input type="hidden"  name="quantity" value="1">
                            <button class = "btn btn-primary">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
