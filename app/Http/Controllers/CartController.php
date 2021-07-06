<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function AddToCart(Request $request,$cart_id){
        $products = Product::find($cart_id);
       if ( $products->product_discount_price ){
           Cart::add(
               ['id' => $cart_id,
                   'name' => $request->name,
                   'qty' => $request->quantity,
                   'price' => $products->product_discount_price,
                   'weight' => 1,
                   'options' => [
                       'size' => $request->size,
                       'color' => $request->color,
                       'image' => $products->product_thumbnail,
                   ],
               ]);
           return response()->json(['success'=>'Product Add to Cart Successfully']);
       }else{
           Cart::add(
               ['id' => $cart_id,
                   'name' => $request->name,
                   'qty' => $request->quantity,
                   'price' => $products->product_selling_price,
                   'weight' => 1,
                   'options' => [
                       'size' => $request->size,
                       'color' => $request->color,
                       'image' => $products->product_thumbnail,
                   ],
               ]);
           return response()->json(['success'=>'Product Add to Cart Successfully']);
       }

    }
    public function AddToMiniCart(){
        $cart = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'cartCount' => $cart,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal)
        ));
    }
    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Remove item from mini cart Successfully']);
    }
}
