@extends('layouts.app')


@section('content')

    @if( Cart::count() > 0 )
        <h2> {{ \Gloudemans\Shoppingcart\Facades\Cart::count() }} items in Cart </h2>
        @foreach( \Gloudemans\Shoppingcart\Facades\Cart::content() as $item)
            <div class="card mb-3 cartpage" >
                <div class="row g-0">
                    <div class="col-md-4">
                        <img id="product" src={{ asset('/storage/images/'.$item->model->image) }} alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body bg-secondary text-left">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text ">
                                Price $: {{ $item->price }}
                            </p>
                            <p class="card-text ">
                                Qunatity: {{ $item->qty }}
                            </p>
{{--                            <p class="card-text">Quantity:--}}
{{--                                <select class="quantity">--}}
{{--                                    {{ $last = 100 }}--}}
{{--                                    {{ $now = 0 }}--}}
{{--                                    @for ($i = $now; $i <= $last; $i++)--}}
{{--                                        <option value="{{ $i }}">{{ $i }}</option>--}}
{{--                                    @endfor--}}
{{--                                </select>--}}
{{--                            </p>--}}
{{--                            <p class="sub-total">Quantity: {{ $item->qty }}</p>--}}
                            <p class="card-text">
                                <form method="post" action="{{ route('updatecart', $item->rowId) }}">
                                @csrf
                                Quantity: <select class="quantity" name="quantities">
                                        {{ $last = 50 }}
                                        {{ $now = 1 }}
                                        @for ($i = $now; $i <= $last; $i++)
                                            <option value="{{ $i }}" >{{ $i }}</option>
                                        @endfor
                                    </select>
                                <button>Update Quantity</button>
                                </form>
                            </p>
{{--                            <p class="sub-total">Sub Total: {{ \Gloudemans\Shoppingcart\Facades\Cart::total() }}</p>--}}
                            <p class="card-text float-right">
                                <form action="{{ route('delete2', $item->rowId)}}" method="post">
                                @csrf
                                @method('delete')
                                     <input type="hidden" name="item_id" value="{{ $item->id }}">
                                     <a><button class="btn-danger float-right">Remove</button></a>
                                 </form>
                            </p>
                            <p class="card-text"><small class="text-muted"></small></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="container">
            <p class="bg-dark text-left text-white">Total: {{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}
                <a href="{{ route('checkout') }}"><button class="btn-primary float-right">Proceed to check out</button></a>
            </p>
        </div>
    @else
        <h3> No items in cart</h3>
    @endif
@endsection
