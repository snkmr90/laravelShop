<?php

namespace App\Http\Controllers\front;
use Illuminate\Http\Request;
use App\Session;
use App\Product;
use App\Http\Controllers\Controller;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = session()->get('cart');
        return view('front/checkout',compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->product_name,
                        "quantity" => 1,
                        "price" => $product->product_price,
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->product_price,
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $stock = $product->product_stock; 
        $quantity = $request->quantity;
        if(!$product) {
            abort(404);
        }
        if(!$quantity || $quantity<1 ){
            return redirect()
                ->back()
                ->withInput()
                ->with('stockError'.$id, 'Please input quantity to add into cart!');
        }
        $cart = session()->get('cart');
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity']+$quantity;
            if($cart[$id]['quantity']>$stock){
                return redirect()
                ->back()
                ->withInput()
                ->with('stockError'.$id, 'Please reduce quantity for item!');    
            }
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = session()->get('cart');
        if(!$id || !isset($cart[$id])){
            return redirect()->back();
        }  
        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product removed from cart successfully!');
        }
    }
}
