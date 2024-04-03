<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add($service_slug)
    {
        $service = Service::where('slug', $service_slug)->where('status', '0')->first();

        if($service)
        {
            $service_id = $service->id;
            $review = Review::where('user_id', Auth::id())->where('servc_id', $service_id)->first();
            if($review)
            {
                return view('frontend.reviews.edit', compact('review'));
            }
            else
            {
            $verified_purchase = Order::where('orders.user_id', Auth::id())
                                 ->join('order_items', 'orders.id','order_items.order_id')
                                 ->where('order_items.servc_id', $service_id)->get();
            return view('frontend.reviews.index', compact('service','verified_purchase'));
            }
        }
        else
        {
            return redirect()->back()->with('status', "O link que você seguiu pode estar quebrado");
        }
    }

    public function create(Request $request)
    {
        $service_id = $request->input('service_id');
        $service = Service::where('id', $service_id)->where('status', '0')->first();
        if ($service) 
        {
            $user_review = $request->input('user_review');
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'servc_id' => $service_id,
                'user_review' => $user_review
            ]);
            $category_slug = $service->category->slug;
            $servc_slug = $service->slug;
            if($new_review)
            {
                return redirect('category/'.$category_slug.'/'.$servc_slug)->with('status', "Obrigado por escrever uma avaliação");
            }
        } 
        else 
        {
            return redirect()->back()->with('status', "O link que você seguiu pode estar quebrado");
        }
        
    }

    public function edit($service_slug)
    {
        $service = Service::where('slug', $service_slug)->where('status', '0')->first();
        if($service)
        {
            $service_id = $service->id;
            $review = Review::where('user_id', Auth::id())->where('servc_id', $service_id)->first();
            if ($review) 
            {
                return view('frontend.reviews.edit', compact('review'));
            } 
            else 
            {
                return redirect()->back()->with('status', "O link que você seguiu pode estar quebrado");
            }
            
        }
        else 
        {
            return redirect()->back()->with('status', "O link que você seguiu pode estar quebrado");
        }
    }

    public function update(Request $request)
    {
        $user_review = $request->input('user_review');
        if($user_review != '')
        {
            $review_id = $request->input('review_id');
            $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();
            if($review)
            {
                $review->user_review = $request->input('user_review');
                $review->update();
                return redirect('category/'.$review->service->category->slug.'/'.$review->service->slug)->with('status', "Avaliação atualizada com sucesso!!");
            }
            else 
            {
                return redirect()->back()->with('status', "O link que você seguiu pode estar quebrado");
            }
        }
        else 
        {
            return redirect()->back()->with('status', "Você não pode enviar uma avaliação vazia");
        }
    }
}
