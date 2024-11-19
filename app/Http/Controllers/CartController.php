<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SurfsideMedia\ShoppingCart\Facades\Cart;


class CartController extends Controller
{
    public function index(){
        $cartItems = Cart::content();
        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request){
        Cart::instance('cart')->add($request->id,$request->name,$request->quantity,$request->price)->associate('App\Models\Product');        
        session()->flash('success', 'Produto adicionado ao carrinho !');        
        return response()->json(['status'=>200,'message'=>'Item adicionado com sucesso ao seu carrinho.']);
    } 
}
