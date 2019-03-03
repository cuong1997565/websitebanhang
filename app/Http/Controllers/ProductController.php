<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Category;
use DB;
use App\Http\Requests\AddProductRequest;

class ProductController extends Controller
{
    public function getProduct () {
        $product_list = DB::table('products')
        ->select('cate_name','price','img','name','products.id')
        ->join('categories','products.category_id','=','categories.id')
        ->orderBy('products.id','desc')
        ->get()->toArray();
        return view('backend.product',compact('product_list'));
    }

    public function getAddProduct () {
        $category = Category::all()->toArray();
        return view('backend.addproduct',compact('category'));
    }

    public function postAddProduct (AddProductRequest $request) {
        $url = $request->file('img');
        $file_name =  $url->getClientOriginalName();
        $product = new Products;
        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->price = $request->price;
        $product->img = $file_name;
        $product->warranty = $request->warranty;
        $product->accessories = $request->accessories;
        $product->promotion = $request->promotion;
        $product->condition = $request->condition;
        $product->status = $request->status;
        $product->description = $request->description;
        $product->featured = $request->featured;
        $product->category_id = $request->cate;
        $product->save();
        $url->move('public/upload/image/', $file_name);
        return back();
    }

    public function getEditProduct ($id) {
        $data = Products::find($id)->toArray();
        $category = Category::all()->toArray();
        return view('backend.editproduct', compact('data','category'));
    }

    public function postEditProduct (Request $request,$id) {
        $product = new Products;
        $arr['name'] = $request->name;
        $arr['slug'] = str_slug($request->name);
        $arr['price'] = $request->price;
        $arr['warranty'] = $request->warranty;
        $arr['accessories'] = $request->accessories;
        $arr['promotion'] = $request->promotion;
        $arr['condition'] = $request->condition;
        $arr['status'] = $request->status;
        $arr['description'] = $request->description;
        $arr['featured'] = $request->featured;
        $arr['category_id'] = $request->cate;
        if($request->hasFile('img')){
            $url = $request->file('img');
            $file_name =  $url->getClientOriginalName();
            $arr['img'] = $file_name;
            $url->move('public/upload/image/', $file_name);
        }
        $product::where('id', $id)->update($arr);
        return redirect()->route('list_product');

    }

    public function getDeleteProduct ($id) {
        Products::destroy($id);
        return back();

    }
}
