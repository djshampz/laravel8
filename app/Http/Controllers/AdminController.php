<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        return view('admin.dashboard', ['users' => User::latest()->get()->all()]);
    }

    public function create(){
        return view('admin.adduser');
    }

    public function addUser(){

        $this->validateUser();
        $user =User::create([
            'name' => request('name'),
            'email' => request('email'),
            'address' => request('address'),
            'password' => Hash::make(request('password')),
            'phone' => request('phone'),
        ]);
        $user->save();

        return redirect('/dashboard');
    }

    public function validateUser() : array{
        return request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string'],
            'password' =>['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required']
        ]);
    }

    public function show(User $user){

        return view('admin.edit', compact('user'));
    }

    public function  update(User $user){

        $validateUser = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => ['required', 'string'],
            'phone' => ['required'],
        ]);
        $user->update($validateUser);

        return redirect(route('admin.dashboard'));

    }

    public function destroy(User $user){

        $user->delete();

        return redirect(route('admin.dashboard'));
    }
    public function showProducts(){


        return view('Products.show', ['products' => Product::latest()->get()->all()]);
    }
}
