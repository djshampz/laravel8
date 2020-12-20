@extends('layouts.app')

@section('content')

    @foreach( $products as $item)
    <div class="card mb-3" >
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
                    <p class="card-text float-right">
                        <a href="{{ route('item.delete', $item->id) }} "><button class="btn-danger">Remove</button></a>
                    </p>
                    <p class="card-text float-right" style="margin-right: 10px">
                        <form>
{{--                        <select name="quantities[]" multiple>--}}
{{--                            @foreach($quantities as $amount)--}}
{{--                                <option value="{{ $amount }}">--}}
{{--                                    {{ $amount }}--}}
{{--                                </option>--}}
{{--                            @endforeach--}}
                        </form>
                    </p>
                    <p class="card-text"><small class="text-muted">{{ $item->updated_at->diffForHumans() }}</small></p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
