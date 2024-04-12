<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
   public function index()
   {
       //$featured_service = Service::where('trending','1')->take(15)->get();
       //$trending_category = Category::where('popular','1')->take(15)->get(); 
       //return view('auth.login', compact('featured_service','trending_category'));
       return view('auth.login');
   }

   public function category()
   {
       $category = Category::where('status','0')->get();
       return view('frontend.category', compact('category'));
   }

   public function viewcategory($slug)
   {
       if(Category::where('slug',$slug)->exists())
       {
             $category = Category::where('slug',$slug)->first();
             $service = Service::where('cate_id',$category->id)->where('status','0')->get();
             return view('frontend.services.index', compact('category','service'));
       }
       else{
           return redirect('/')->with('status',"Categoria não existe");
       }
   }

   public function serviceview($cate_slug, $serv_slug)
   {
       if(Category::where('slug',$cate_slug)->exists())
       {
            if(Service::where('slug', $serv_slug)->exists())
            {
                 $services = Service::where('slug', $serv_slug)->first();
                 $ratings = Rating::where('servc_id', $services->id)->get();
                 $rating_sum = Rating::where('servc_id', $services->id)->sum('stars_rated');
                 $user_rating = Rating::where('servc_id', $services->id)->where('user_id', Auth::id())->first();
                 $reviews = Review::where('servc_id', $services->id)->get();

                 if($ratings->count() > 0)
                 {
                    $rating_value = $rating_sum/$ratings->count();
                 }
                 else
                 {
                     $rating_value = 0;
                 }
                
                 return view('frontend.services.view', compact('services', 'ratings','rating_value', 'user_rating', 'reviews'));
            }
            else{
                return redirect('/')->with('status',"Serviço não existe");
            }
       }
       else{
        return redirect('/')->with('status',"Categoria  não existe");
    }

   }

   public function servicelistAjax()
   {
      $services = Service::select('name')->where('status', '0')->get();
      $data = [];

      foreach($services as $item) {
          $data[] = $item['name'];
      }
      return $data;
   }

   public function searchServices(Request $request)
   {
       $searched_service = $request->service_name;

       if($searched_service != "")
       {
           $service = Service::where("name","LIKE","%$searched_service%")->first();
           if($service)
           {
               return redirect('category/'.$service->category->slug.'/'.$service->slug);
           }
           else{
               return redirect()->back()->with("status","Nenhum serviço correspondeu à sua pesquisa");
           }
       }
       else{
           return redirect()->back();
       }
   }
}
