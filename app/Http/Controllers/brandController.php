<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\brand;
use Illuminate\Support\Facades\Redis;

class brandController extends Controller
{
    public function index_brand(){
        return view('admin.brand.add-brand');
    }

    public function add_brand(Request $req){
        $validatedData = $req->validate([
                'brand_name' => 'required',
                'brand_description' => 'required'
        ]);
        $brand = new brand();
        $brand->brand_name = $req->brand_name;
        $brand->brand_description = $req->brand_description;
        $brand->publication_status = $req->publication_status;
        $brand->save();
        return back()->with('status', 'brand added succesfullly');
    }

    public function manage_brand(){
        $brand = brand::all();
        return view('admin.brand.manage-brand', ['brand'=>$brand]);
    }

    public function change_brand_status_to_unpublished($id){
        $brand = brand::find($id);
        $brand->publication_status = 0;
        $brand->save();
        return back()->with('status', 'Publication Status Changed');
    }

    public function change_brand_status_to_published($id){
        $brand = brand::find($id);
        $brand->publication_status = 1;
        $brand->save();
        return back()->with('status', 'Publication Status Changed');
    }

    public function brand_edit($id){
        $brand = brand::find($id);
        return view('admin.brand.brand-edit', ['brand'=>$brand]);
    }

    public function brand_update(Request $req){
        $brand = brand::find($req->brand_id);
        $brand->brand_name = $req->brand_name;
        $brand->brand_description = $req->brand_description;
        $brand->publication_status = $req->publication_status;
        $brand->save();
        return redirect(route('manage-brand'))->with('status', 'Update succesfully');
    }

    public function brand_delete($id){
        $brand = brand::find($id);
        $brand->delete();
        return redirect(route('manage-brand'))->with('status', 'delete succesfully');
    }


}
