<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function add()
    {
        $category = Category::all();
        return view('admin.services.add', compact('category'));
    }

    public function insert(Request $request)
    {
        $services = new Service();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/carregador',$filename);
            $services->image = $filename;
        }
        $services->cate_id = $request->input('cate_id');
        $services->name = $request->input('name');
        $services->slug = $request->input('slug');
        $services->small_description = $request->input('small_description');
        $services->description = $request->input('description');
        $services->original_price = $request->input('original_price');
        $services->selling_price = $request->input('original_price') - ($request->input('original_price')*$request->input('tax')/100);
        $services->tax = $request->input('tax');
        $services->qty = $request->input('qty');
        $services->status = $request->input('status') == TRUE ? '1':'0';
        $services->trending = $request->input('trending') == TRUE ? '1':'0';
        $services->meta_title = $request->input('meta_title');
        $services->meta_keywords = $request->input('meta_keywords');
        $services->meta_description = $request->input('meta_description');
        $services->save();
        return redirect('services')->with('status',"Serviço adicionado com sucesso!");
    }

    public function edit($id)
    {
        $services = Service::find($id);
        return view('admin.services.edit', compact('services'));
    }

    public function update(Request $request, $id)
    {
        $services = Service::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/services/'.$services->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/services',$filename);
            $services->image = $filename;
        }
        $services->name = $request->input('name');
        $services->slug = $request->input('slug');
        $services->small_description = $request->input('small_description');
        $services->description = $request->input('description');
        $services->original_price = $request->input('original_price');
        $services->selling_price = $request->input('original_price') - ($request->input('original_price')*$request->input('tax')/100);
        $services->tax = $request->input('tax');
        $services->qty = $request->input('qty');
        $services->status = $request->input('status') == TRUE ? '1':'0';
        $services->trending = $request->input('trending') == TRUE ? '1':'0';
        $services->meta_title = $request->input('meta_title');
        $services->meta_keywords = $request->input('meta_keywords');
        $services->meta_description = $request->input('meta_description');
        $services->update();
        return redirect('services')->with('status',"Serviço atualizado com sucesso!"); 
    }

    public function destroy($id)
    {
        $services = Service::find($id);
        $path = 'assets/uploads/services/'.$services->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $services->delete();
        return redirect('services')->with('status',"Serviço eliminado com sucesso!"); 
    }
}
