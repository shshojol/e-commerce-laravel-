<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
class categoryController extends Controller
{
    public function add_category(){
        return view('admin.category.add-category');
    }

    public function save_category(Request $req){
        $cat = new category();
        $cat->category_name = $req->category_name;
        $cat->category_description = $req->category_description;
        $cat->publication_status = $req->publication_status;
        $cat->save();
        return back()->with('status', 'add succesfully');

    }

    public function manage_category(){
        $category = category::all();
        return view('admin.category.manage-category', ['category'=>$category]);
    }

    public function change_status_unpublished($id){
        $cat = category::find($id);
        $cat->publication_status = 0;
        $cat->save();

        return back();
    }

    public function change_status_published($id){
        $cat = category::find($id);
        $cat->publication_status = 1;
        $cat->save();

        return back();
    }

    public function Category_edit($id){
        $cat = category::find($id);
        return view('admin.category.edit-category' , ['cat' => $cat ] );
    }

    public function Category_update(Request $req){
        $cat = category::find($req->category_id);
        $cat->category_name = $req->category_name;
        $cat->category_description = $req->category_description;
        $cat->publication_status = $req->publication_status;
        $cat->save();
        return redirect('manage-category')->with('status', 'Update succesfully');

    }

    public function Category_delete($id){
        $cat = category::find($id);
        $cat->delete();
        return redirect('manage-category')->with('status', 'Delete succesfully');
    }
}
