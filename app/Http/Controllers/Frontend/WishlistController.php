<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get(); 
        return view('frontend.wishlist', compact('wishlist')); 
    }

    public function add(Request $request)
    {
        if(Auth::check())
        {
            $servc_id = $request->input('service_id');
            if(Service::find($servc_id))
            {
                $wish = new Wishlist();
                $wish->servc_id = $servc_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' => "Serviço adicionado a lista de desejo"]);
            }
            else{
                return response()->json(['status' => "Serviço não existe"]);
            }
        }
        else{
            return response()->json(['status' => "Faça o login para continuar"]);
        }
    }

    public function deleteitem(Request $request)
    {
        if(Auth::check())
        {
            $servc_id = $request->input('servc_id');
            if(Wishlist::where('servc_id', $servc_id)->where('user_id', Auth::id())->exists());
            {
                $wish = Wishlist::where('servc_id', $servc_id)->where('user_id', Auth::id())->first();
                $wish->delete();
                return response()->json(['status' => "Serviço removido da lista de desejo com sucesso!"]);
            }
        }
        else
        {
            return response()->json(['status' => "Faça o login para continuar"]);
        }
    }

    public function wishlistcount()
    {
        $wishcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count'=> $wishcount]);
    }
}
