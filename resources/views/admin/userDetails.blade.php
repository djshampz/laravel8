@extends('layouts.admin')

@section('content')

    <div class="card" style="width: auto;">
        <div class="card-body">
            <h5 class="card-title">User Name: {{ $user->name }}</h5>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Email: {{ $user->email }}</li>
            <li class="list-group-item">Phone: {{ $user->phone }}</li>
            <li class="list-group-item">Address: {{ $user->address }}</li>
        </ul>
            <a class="nav-link" href={{ route('order') }}>
            <div class="sb-nav-link-icon"><i class="fa fa-archive"></i></div>
                <form action ="{{ route('user_order') }}" method = "post">
                    @csrf
                    <input type="hidden" name=" user_id" value="{{ $user->id }}">
                    <button class="btn-primary">Orders</button>
                </form>

            </a>
        <div class="card-body">
            <a href={{ route('admin.edit', $user->id) }} ><button class="btn-primary">Edit</button></a>
            <a href={{ route('admin.delete', $user->id) }}><button class="btn-danger">Delete</button></a>
        </div>
    </div>

@endsection
