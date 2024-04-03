<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addService(Request $request)
    {
        $service_id = $request->input('service_id');
        $service_qty = $request->input('service_qty');
        $checkin_date = $request->input('checkin_date');
        $checkout_date = $request->input('checkout_date');

        if($checkin_date == null)
        {
            return response()->json(['status' => $checkin_date . "Por favor entre a data de checkin"]);
        }

        if($checkout_date == null)
        {
            return response()->json(['status' => $checkout_date . "Por favor entre a data de checkout"]);
        }

        if (Auth::check()) {
            $servc_check = Service::where('id', $service_id)->first();

            if ($servc_check) {
                if (Cart::where('servc_id', $service_id)->where('user_id', Auth::id())->exists())
                 {
                    return response()->json(['status' => $servc_check->name . " já foi adicionado no carinho"]);
                } 
                else {
                    $cartItem = new Cart();
                    $cartItem->servc_id = $service_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->servc_qty = $service_qty;
                    $cartItem->checkin_date = $checkin_date;
                    $cartItem->checkout_date = $checkout_date;
                    $cartItem->save();
                    return response()->json(['status' => $servc_check->name . " adicionado no carinho"]);
                }
            }
        } else {
            return response()->json(['status' => "Faça o login para continuar"]);
        }
    }

    public function viewcart()
    {
        $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart', compact('cartitems'));
    }

    public function updatecart(Request $request)
    {
        $servc_id = $request->input('servc_id');
        $service_qty = $request->input('servc_qty');

        if(Auth::check())
        {
            if(Cart::where('servc_id', $servc_id)->where('user_id', Auth::id())->exists())
            {
                $cart = Cart::where('servc_id', $servc_id)->where('user_id', Auth::id())->first();
                $cart->servc_qty = $service_qty;
                $cart->update();
                return response()->json(['status' => "Quantidade atualizada!"]);
        }
    }
}

    public function deleteservice(Request $request)
    {
        if(Auth::check())
        {
            $servc_id = $request->input('servc_id');
            if(Cart::where('servc_id', $servc_id)->where('user_id', Auth::id())->exists());
            {
                $cartItem = Cart::where('servc_id', $servc_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Serviço removido do carinho com sucesso!"]);
            }
        }
        else
        {
            return response()->json(['status' => "Faça o login para continuar"]);
        }
    }

    public function cartcount()
    {
        $cartcount = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count'=>$cartcount]);
    }
}
