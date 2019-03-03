<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;

class CategoryController extends Controller
{
    public function getCate () {
        $data = Category::all()->toArray();
        return view('backend.category',compact('data'));
    }

    public function postCate (AddCateRequest $request) {
        $category = new Category;
        $category->cate_name = $request->name;
        $category->cate_slug = str_slug($request->name);
        $category->save();
        return back();

    }

    public function getEditCate ($id) {
        $category = Category::find($id)->toArray();
        return view('backend.editcategory',compact('category'));
    }

    public function postEditCate (EditCateRequest $request, $id) {
        $category = Category::find($id);
        $category->cate_name = $request->name;
        $category->cate_slug = str_slug($request->name);
        $category->save();
        return redirect()->route('list_cate');
    }

    public function getDeleteCate($id) {
        Category::destroy($id);
        return back();
    }
}
