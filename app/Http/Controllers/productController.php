<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\brand;
class productController extends Controller
{
    public function show_product_add_form(){
        $cat = category::where('publication_status', 1)->get();
        $brand = brand::where('publication_status', 1)->get();
        return view('admin.product.add-product', [
            'catagory'  => $cat,
            'brand'     => $brand,
        ]);
    }

        public function product_store_form(Request $req){
            $product_image = $req->file('product_image');
            $imageName = $product_image->getClientOriginalName();
            $dir = 'image/productImage';
            $imageUrl = $dir.$imageName;
            $product_image->move($dir, $imageName);
        }

}
