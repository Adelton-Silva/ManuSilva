<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   public function index()
   {
       $orders = Order::where('user_id', Auth::id())->get();
       return view('frontend.orders.index', compact('orders'));
   }

   public function view($id)
   {
       $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
       return view('frontend.orders.view', compact('orders'));
   }

   public function edit($id)
   {
       $ordersedit = Order::find($id);
    return view('frontend.orders.edit', compact('ordersedit'));
   }
    public function updateord(Request $request, $id)
    {
        
        $ordersedit = Order::find($id);
        if($ordersedit->status == 0){
        $ordersedit->fname = $request->input('fname');
        $ordersedit->lname = $request->input('lname');
        $ordersedit->email = $request->input('email');
        $ordersedit->phone = $request->input('phone');
        $ordersedit->address1 = $request->input('address1');
        $ordersedit->address2 = $request->input('address2');
        $ordersedit->city = $request->input('city');
        $ordersedit->island = $request->input('island');
        $ordersedit->country = $request->input('country');
        $ordersedit->pincode = $request->input('pincode');
        $ordersedit->status = 0;
        $ordersedit->update();

        return redirect('my-orders')->with('status', "Dados do pedido atualizado com sucesso!");
    }
    else{
        return redirect('my-orders')->with('status', "Dados do pedido não pode ser atualizado porque já esta finalizado!");
    }
    }
    
    public function destroy($id)
    {
        $order = Order::find($id);
        $orderItem = OrderItem::find($id);
        if ($order->status == 0){
        $order->delete();
        if ($order->id == $orderItem->order_id){
            $orderItem->delete();
        }
        return redirect('/my-orders')->with('status',"Pedido cancelado com sucesso!");
        }
        else{
            return redirect('my-orders')->with('status', "Pedido não pode ser cancelado porque já foi finalizado!");
        }
    }
}

