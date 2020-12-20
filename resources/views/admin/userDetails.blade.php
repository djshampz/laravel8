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
        <div class="card-body">
            <a href={{ route('admin.edit', $user->id) }} ><button class="btn-primary">Edit</button></a>
            <a href={{ route('admin.delete', $user->id) }}><button class="btn-danger">Delete</button></a>
        </div>
    </div>

@endsection
