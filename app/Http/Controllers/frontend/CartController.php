<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty= $request->input('product_qty');
        if(Auth::check())
        {
            $prod_check = Product::where('id',$product_id)->first();
            if($prod_check) 
            {
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status'=>$prod_check->name." Already added to cart"]);
                }
                $cartItem = new Cart();
                $cartItem->prod_id = $product_id;
                $cartItem->prod_qty = $product_qty;
                $cartItem->user_id = Auth::id();
                $cartItem->save();
                return response()->json(['status'=> $prod_check->name. " Added to cart"]);
            }  
        }
        else{
            return response()->json(['status'=>"Login to Continue"]);
        }
    }
    public function viewCart()
    {
        $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cartitems'));
    }
    public function deleteproduct(Request $request)
    {
        if(Auth::check())
        {
        $prod_id = $request->input('prod_id');
        if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
        {
            $cartItem = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
            $cartItem->delete();
            return response()->json(['status'=>"product delete successfully!"]);
        }
        }
        else{
            return response()->json(['status'=>"Login to Continue"]);
        }
    }
    public function updatecart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $prod_qty = $request->input('prod_qty');

        if(Auth::check())
        {
        if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
        {
            $cart= Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
            $cart->prod_qty=$prod_qty;
            $cart->update();
            return response()->json(['status'=>"product quantity update successfully!"]);
        }
        }
        else{
            return response()->json(['status'=>"Login to Continue"]);
        }
    }
}
