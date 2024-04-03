<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request)
    {
        $stars_rated = $request->input('product_rating');
        $service_id = $request->input('product_id');

        $servc_check = Service::where('id', $service_id)->where('status', '0')->first();
        if($servc_check)
        {
          $verified_purchase = Order::where('orders.user_id', Auth::id())
                                 ->join('order_items', 'orders.id','order_items.order_id')
                                 ->where('order_items.servc_id', $service_id)->get();
            
            if($verified_purchase->count() > 0)
            {
                $existing_rating = Rating::where('user_id', Auth::id())->where('servc_id', $service_id)->first();
                if($existing_rating)
                {
                    $existing_rating->stars_rated = $stars_rated;
                    $existing_rating->update();
                }
                else
                {
                    Rating::create([
                        'user_id' => Auth::id(),
                        'servc_id' => $service_id,
                        'stars_rated' => $stars_rated
                    ]);
                }
                return redirect()->back()->with('status', "Obrigado por avaliar este serviço!!");
               
            }
            else
            {
                return redirect()->back()->with('status', "Não podes avaliar um serviço sem fazer a reserva");
            }
        }
        else
            {
                return redirect()->back()->with('status', "O link que você seguiu pode estar quebrado");
            }
    }
}
