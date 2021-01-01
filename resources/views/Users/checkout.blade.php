@extends('layouts.app')

@section('content')

    <table class="table table-dark table-striped">
        <thead>
        <tr class="font-italic font-weight-bolder">
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
        </tr>
        </thead>
        <tbody class="font-weight-light" >
        <form method="post" action="{{ route('storeOrder') }}">
            <input type="hidden" name="customer_email" class="form-control" value="{{ Auth::user()->email }}">
            <input type="hidden" name="customer_name" class="form-control" value="{{ Auth::user()->name }}">
            @csrf
        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $item)

        <tr>
            <td>{{ $item->name }}
                <input type="hidden" name="product_name[]" class="form-control" value="{{ $item->id}}" />
            </td>
            <td>{{ $item->price }}
            </td>
            <td>{{ $item->qty }}
                <input type="hidden" name="quantities[]" class="form-control" value="{{ $item->qty }}" />
                <input type="hidden" name="price" class="form-control" value="{{ Gloudemans\Shoppingcart\Facades\Cart::total() }}" />
            </td>
        </tr>
        @endforeach
            <td><button class="btn btn-primary"  value="Confirm">Confirm</button></td>
        </form>
        </tbody>
    </table>
    <p class="font-weight-bold">Grand Total: {{ Gloudemans\Shoppingcart\Facades\Cart::total() }}</p>
    Payment done on delivery expect groceries within a day
{{--        <form action="{{ route('create4') }}" method="post">--}}
{{--        @csrf--}}
{{--            <input type="hidden"  name="name" value={{ $item->name }} >--}}
{{--            <input type="hidden"  name="quantity" value="{{ $item->qty}}">--}}
{{--            <input type="hidden"  name="price" value="{{ $item->price }}">--}}
{{--            <input type="hidden"  name="item_id" value={{ $item->id }} >--}}
{{--            <input type="hidden"  name="user_id" value="{{ Auth::user()->id}}">--}}
{{--            <button class="btn-primary">Proceed?</button>--}}
{{--    </form>--}}
{{--    <form action = "{{ route('checkoutStore')}}" method = "post">--}}
{{--        @csrf--}}
{{--        <input type="hidden"  name="quantity" value={{ $item->qty }} >--}}
{{--        <input type="hidden"  name="name" value="{{ $item->name }}">--}}
{{--        <input type="hidden"  name="price" value="{{ $item->price }}">--}}
{{--        <input type="hidden"  name="item_id" value={{ $item->id }} >--}}
{{--        <input type="hidden"  name="user_id" value="{{ Auth::user()->id}}">--}}
{{--        <button class = "btn btn-primary">Add to Cart</button>--}}
{{--    </form>--}}
@endsection
