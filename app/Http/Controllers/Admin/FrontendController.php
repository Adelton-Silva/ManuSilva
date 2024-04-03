<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $orders = OrderItem::select(DB::raw('count(id) as total_order'),DB::raw('MONTHNAME(checkin_date) month'))->groupBy('month')->get();
        $payment = Order::selectRaw('count(id) as total_pay, payment_mode')->groupBy('payment_mode')->get();
        $localidades = Order::selectRaw('count(id) as total_order, city')->groupBy('city')->get();
        $ilha=[];
        $local=[];
        $pontos = [];
        $label = [];
        foreach ($orders as $order) {
            $pontos[] = ['name' => $order['month'], 'y' => $order['total_order']];
        }
        foreach ($payment as $paym) {
            $label[] = ['name' => $paym['payment_mode'], 'y' => $paym['total_pay']];
        }
        foreach ($localidades as $localidade) {
            $local[] = ['name' => $localidade['city'], 'y' => $localidade['total_order']];
        }
        return view('admin.index', ["data" => json_encode($pontos),"datas" => json_encode($label), "dados" => json_encode($local), 'payment' => $payment]);
    }
}
