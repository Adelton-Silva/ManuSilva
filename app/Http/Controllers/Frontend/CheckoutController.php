<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems = Cart::where('user_id',Auth::id())->get();
        foreach($old_cartitems as $item)
        {
            if(!Service::where('id', $item->servc_id)->where('qty','>=',$item->servc_qty)->exists())
            {
                $removeItem = Cart::where('user_id', Auth::id())->where('servc_id', $item->servc_id)->first();
                $removeItem->delete();
        }
    }
       $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout', compact('cartitems'));
    }
    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->island = $request->input('island');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');

        $order->payment_mode = $request->input('payment_mode');
        $order->payment_id = $request->input('payment_id');



        // To calculate the total price
        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems_total as $serv)
        {
            $total += $serv->services->selling_price;
        }

        $order->total_price = $total;
        
        $order->tracking_no = 'res'.rand(1111,9999);
        $order->save();

        
        $cartitems = Cart::where('user_id',Auth::id())->get();
        foreach($cartitems as $item)
        {
            OrderItem::create([
                'order_id'=> $order->id,
                'servc_id'=> $item->servc_id,
                'checkin_date'=> $item->checkin_date,
                'checkout_date'=> $item->checkout_date,
                'qty'=> $item->servc_qty,
                'price'=> $item->services->selling_price,
            ]);

            $servc = Service::where('id', $item->servc_id)->first();
            $servc->qty = $servc->qty - $item->servc_qty;
            $servc->update();
        }

        if(Auth::user()->address1 == Null)
        {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('island');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }

        $cartitems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitems);
        
        if($request->input('payment_mode') == "Pago com Razorpay" || $request->input('payment_mode') == "Pago com Paypal" )
        {
            return response()->json(['status'=>"O seu serviço foi reservado com sucesso!!"]);
        }
        return redirect('/my-orders')->with('status', "O seu serviço foi reservado com sucesso!!");
    }

    public function razorpaycheck(Request $request)
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach($cartitems as $item)
        {
            $total_price += $item->services->selling_price * $item->servc_qty;
        }

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address1 = $request->input('address1$address1');
        $address2 = $request->input('address2');
        $city = $request->input('city');
        $island = $request->input('island');
        $country = $request->input('country');
        $pincode = $request->input('pincode');

        return response()->json([
            'firstname'=> $firstname,
                'lastname'=> $lastname,
                'email'=> $email,
                'phone'=> $phone,
                'address1'=> $address1,
                'address2'=> $address2,
                'city'=> $city,
                'island'=> $island,
                'country'=> $country,
                'pincode'=> $pincode,
                'total_price'=> $total_price
        ]);
    }
}
