<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    

    public function addProduct(Request $request){

    
  
   
        $product_id= $request->input('product_id');
        $prodqty_qty= $request->input('product_qty');
        if(Auth::check()){
            $prod_check=Products::where('id',$product_id)->first();
            if( $prod_check){
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){
                   return response()->json(['status'=>$prod_check->name.'Already Added to Cart ']);
                }else{

              }
                $cartItem = new Cart();
                $cartItem->prod_id =$product_id;
                $cartItem->user_id =Auth::id();
                $cartItem->prod_qty = $prodqty_qty;

                $cartItem->save();

                return response()->json(['status'=>$prod_check->name.'Add to Cart Successfuly']);

            }
            
        }else{
            return response()->json(['status' => "login to continue"]);
        }


    }

   public  function viewCart(){

    $cartItem= Cart::where('user_id',Auth::id())->get();
    return view('Frontend.product.cart',compact('cartItem'));
   }


// //    public function remove_cart($id){

// //     $cartItem =Cart::find($id);
// //     $cartItem->delete();

// //     return redirect()->back()->with(['status'=>'Cart Succssfuly deleted']);

 

// }
public function remove_cart(Request $request){

    
    if(Auth::check()){

    $prod_id =$request->input('prod_id');
    if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
        $cartItem=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
       
        $cartItem->delete();

       return response()->json(['status' => "delete succesfuly"]);

        
    }
}
else{
    return response()->json(['status' => "login to continue"]);
}

}

public function updateCart(Request $request){

    $prod_id=$request->input('p_id');
    $prod_qty=$request->input('p_qty');
    if(Auth::check()){
    if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
        $cart =Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
        $cart->prod_qty=$prod_qty;
        $cart->update();
        return response()->json(['msg' => "Quantity update",'status'=>'true']);


    }
    }

}
  public function cart_count(){
    $cartcount =Cart::where('user_id',Auth::id())->count();
    return response()->json(['count'=>  $cartcount]);
  }
}