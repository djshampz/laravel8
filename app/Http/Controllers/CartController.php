<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Gloudemans\Shoppingcart\Facades;

class CartController extends Controller
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
    public function index2(){


        return view('Users.cart2');
    }

    public function store2(Request $request){
        $duplicates = Facades\Cart::search(function($cartItem, $rowId) use ($request){
                return $cartItem->id === $request->id;
        });


//        $order =Order::create([
//            'name_product' => request('name'),
//            'quantity' => request('quantity'),
//            'price' => request('price'),
//            'product_id' => request('id'),
//            'user_id' => Auth::user()->id,
//        ]);
//        $order->save();

        if ($duplicates->isNotEmpty()){
            return redirect()->route('index2');
        }
       \Gloudemans\Shoppingcart\Facades\Cart::add(request('id'), request('name'), 1, request('price') )->associate('App\Models\Product');

       return view('Users.cart2');
    }

    public function emptyCart($product){

//        Order::where('product_id', request('item_id'))->get();

        Facades\Cart::remove($product);


        return view('Users.cart2');
    }


    public function index()
    {
        $users = User::where('id', Auth::user()->id)->first();

        $products = $users->products;
        return view('Users.cart', compact('products'));
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
    public function store()
    {

        request()->validate([
            'user_id' => ['required',
                Rule::unique('product_user', 'user_id')->where(function ($query) {
                return $query->where('product_id', request('product_id'));
// assuming you're sending 'user_id' in the request
            }),],
        ]);
        $newitem = User::find(request('user_id'));

        $newitem->products()->attach(request('product_id'));

        $newitem->save();


        return redirect()->back()->with('success message', 'Item was added to cart');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {

    }
    public static function cartItem(){

        $users = User::where('id', Auth::user()->id)->first();

        return $total = $users->products->count();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function updateCart($id)
    {
        Facades\Cart::update($id, request('quantities'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $newitem = Product::find($product)->first();

        $newitem->users()->sync([]);

        $newitem->save();

        return redirect()->back();
    }

    public function updatetocart(Request $request)
    {
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);

            $item_id_list = array_column($cart_data, 'item_id');
            $prod_id_is_there = $prod_id;

            if(in_array($prod_id_is_there, $item_id_list))
            {
                foreach($cart_data as $keys => $values)
                {
                    if($cart_data[$keys]["item_id"] == $prod_id)
                    {
                        $cart_data[$keys]["item_quantity"] =  $quantity;
                        $item_data = json_encode($cart_data);
                        $minutes = 60;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                        return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Quantity Updated']);
                    }
                }
            }
        }
    }
    public function  store3(Request $request){



        Facades\Cart::destroy();
        return redirect(route('goShopping'));
    }

}
