<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Products.addProduct');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateProduct();
        $filename = $request->image->getClientOriginalName();
        $request->image->storeAs('images', $filename, 'public');
        $user =Product::create([
            'name' => request('name'),
            'quantity' => request('quantity'),
            'price' => request('price'),
            'image' => $filename,
        ]);
        $user->save();

        return redirect(route('products'));
    }

    public function validateProduct() : array{
        return request()->validate([
            'name' => ['required', 'string', 'max:255', 'unique:products'],
            'quantity' => ['required'],
            'price' => ['required'],
            'image' =>['required', 'file', 'image']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        return view('Products.edit', compact('product'));
    }

    public function details(Product $product){

        return view('Products.details', compact('product'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product )
    {

        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'quantity' => ['required'],
            'price' => ['required'],
            'image' =>['required', 'file', 'image']
        ]);
        $filename = request()->image->getClientOriginalName();
        request()->image->storeAs('images', $filename, 'public');

        $product->update([
            'name' => request('name'),
            'quantity' => request('quantity'),
            'price' => request('price'),
            'image' => $filename,
        ]);

        return redirect(route('product.details', $product));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return  redirect(route('products'));
    }

    public function shopping(){

        $products = Product::latest()->get()->all();

        return view('Users.products', compact('products'));
    }

    public function history(){
        $orders = Order::where('customer_name', Auth::user()->name)->with('products')->get();

        return view('Users.purchases', compact('orders'));
    }
}
