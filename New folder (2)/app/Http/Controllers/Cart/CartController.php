<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private $cart;

    public function __construct(Cart $cart = null) {
        $this->cart = $cart;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $carts = $this->cart->where('user_id', $user_id)->get();
        return view('cart.index', [
            'carts' => $carts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product_id = $request->input('product_id');
        $user_id = Auth::id();
        $cart = $this->cart->create([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'quantity' => 1
        ]);
        if ($cart) {
            return redirect()->route('user.cart.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user_id = Auth::id();
        $cart = $this->cart->where('user_id', $user_id)->where('id', $id)->delete();
        if ($cart) {
            return redirect()->back();
        }
    }
}
