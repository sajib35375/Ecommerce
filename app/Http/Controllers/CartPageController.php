<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function ViewMyCert(){
        return view('frontend.cart.cart_view');
    }

    public function LoadMyCert(){
        $cart = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'cart' => $cart,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal)
        ));
    }
    public function RemoveMyCart($rowId){
        Cart::remove($rowId);
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        return response()->json(['success'=>'Successfully remove cart from MyCart']);
    }
    public function cartIncrement($rowId){
        $cart = Cart::get($rowId);
        Cart::update($rowId, $cart->qty+1);


        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'discount' => $coupon->discount_amount,
                'discount_amount' => round(Cart::total()*($coupon->discount_amount/100)),
                'total_price' => round(Cart::total() - Cart::total()*$coupon->discount_amount/100),
            ]);
        }


        return response()->json(['success'=>'cart quantity increment successfully']);
    }
    public function cartDecrement($rowId){
        $cart = Cart::get($rowId);
        Cart::update($rowId, $cart->qty-1);

        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'discount' => $coupon->discount_amount,
                'discount_amount' => round(Cart::total()*($coupon->discount_amount/100)),
                'total_price' => round(Cart::total() - Cart::total()*$coupon->discount_amount/100),
            ]);
        }

        return response()->json(['success'=>'cart quantity decrement successfully']);
    }

}
