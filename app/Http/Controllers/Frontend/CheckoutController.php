<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Products;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class CheckoutController extends Controller
{
    public function index(){
       $cartItem =Cart::where('user_id', Auth::id())->get();
        return view('frontend.product.checkout',compact('cartItem'));
    }

    public function place_order(Request $request){
        $order =new Order();
       
        $order->user_id =Auth::id();

        $order->fname =$request->input('fname');
        $order->lname =$request->input('lname');
        $order->email =$request->input('email');
        $order->phone =$request->input('phone');
        $order->address1 =$request->input('address1');
        $order->address2 =$request->input('address2');
        $order->city =$request->input('city');
        $order->state =$request->input('state');
        $order->country =$request->input('country');
        $order->pincode =$request->input('pincode');

        $order->message =$request->input('message');
    
       $total =0;
       $cartItems_total =Cart::where('user_id',Auth::id())->get();
       foreach( $cartItems_total as $prod){
        $total += $prod->product_selling_price;
        
       }
       $order->total_price=$total;

       $order->total_price= $request->input('total');
 
      
        $order->tracking_no	 ='tracking'.rand(1111,9999);
        $order->save();


        $order->id;
       $cartItem =Cart::where('user_id', Auth::id())->get();
       foreach($cartItem as $item ){
        OrderItem::create([
            'order_id'=>$order->id,
            'prod_id'=>$item->prod_id,
            'qty'=> $item->prod_qty,
            'price'=> $item->product->selling_price,

        ]);
        $prod=Products::where('id',$item->prod_id)->first();
        $prod->qty=$prod->qty =$item->prod_qty;
        $prod->update();
       }

     if(Auth::user()->address==NULL)
    {
        $user =User::where('id',Auth::id())->first();

    
        $user->name =$request->input('fname');


        $user->lname =$request->input('lname');
    

        $user->email =$request->input('email');
  
        $user->phone =$request->input('phone');
        $user->address1 =$request->input('address1');
        $user->address2 =$request->input('address2');
        $user->city =$request->input('city');
        $user->state =$request->input('state');
        $user->country =$request->input('country');
        $user->pincode =$request->input('pincode');

        $user->message =$request->input('message');

        $user->update();
     }
     $cartItem =Cart::where('user_id', Auth::id())->get();

      Cart::destroy($cartItem);
     return redirect('/')->with('status','order placed Successfuly');
  }

//   public function razorpaycheck(Request $request){
//     $cartItem = Cart::where('user_id',Auth::id())->get();

//     $total_price =0;

//     foreach($cartItem as $item){
//         $total_price =$item->product->selling_price * $item->prod_qty;
        
//   }

//   $firstname =$request->input('firstname');
//   $lastname =$request->input('lastname');
//   $email =$request->input('email');
//   $phone =$request->input('phone');
//   $address1 =$request->input('address1');
//   $address2 =$request->input('address2');
//   $city =$request->input('city');
//   $country =$request->input('country');
//   $pincode =$request->input('pincode');
//   $message =$request->input('message');
   
//   return response()->json([

//     'firstname'=>$firstname,
//     'lastname'=>$lastname,
//     'email'=>$email,

//     'phone'=>$phone,
//     'address1'=>$address1,
//     'address2'=>$address2,
//     'city'=>$city,
//     'country'=>$country,
//     'pincode'=>$pincode,
//     'message'=>$message,
//     'total_price'=>$total_price
   
//   ]);
// }

}