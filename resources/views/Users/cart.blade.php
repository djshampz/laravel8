@extends('layouts.app')

@section('content')

    @foreach( $products as $item)
    <div class="card mb-3 cartpage" >
        <div class="row g-0">
            <div class="col-md-4">
                <img id="product" src={{ asset('/storage/images/'.$item->image) }} alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body bg-secondary text-left">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text ">
                        Price $: {{ $item->price }}
                    </p>
                    <p class="card-text">Quantity:
                        <select class="quantity">
                            {{ $last = $item->quantity }}
                            {{ $now = 0 }}
                            @for ($i = $now; $i <= $last; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </p>
                    <p class="sub-total">Cost: {{ Cart::subtotal() }}</p>
                    <p class="card-text float-right">
                        <a href="{{ route('item.delete', $item->id) }} "><button class="btn-danger">Remove</button></a>
                    </p>
                    <p class="card-text"><small class="text-muted">{{ $item->updated_at->diffForHumans() }}</small></p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="container">
        <p class="bg-dark text-left text-white">Sub Total: {{ Cart::total() }}  </p>
    </div>

@endsection
@section('extra.js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function (){
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function (element){
                    element.addEventListener('change', function(){
                    });
                }
            )
        })();
        $(document).ready(function () {

            $('.increment-btn').click(function (e) {
                e.preventDefault();
                var incre_value = $(this).parents('.quantity').find('.qty-input').val();
                var value = parseInt(incre_value, 10);
                value = isNaN(value) ? 0 : value;
                if(value<10){
                    value++;
                    $(this).parents('.quantity').find('.qty-input').val(value);
                }

            });

            $('.decrement-btn').click(function (e) {
                e.preventDefault();
                var decre_value = $(this).parents('.quantity').find('.qty-input').val();
                var value = parseInt(decre_value, 10);
                value = isNaN(value) ? 0 : value;
                if(value>1){
                    value--;
                    $(this).parents('.quantity').find('.qty-input').val(value);
                }
            });

        });
    </script>
@endsection
