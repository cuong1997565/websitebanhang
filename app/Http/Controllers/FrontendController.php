<?php

namespace App\Http\Controllers;
use App\Products;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use DB;


class FrontendController extends Controller
{
    public function getHome () {
        $data = Products::where('featured',1)->orderBy('id','desc')->take(8)->get()->toArray();
        $new  = Products::orderBy('id','desc')->take(8)->get()->toArray();
        return view('frontend.home',compact('data','new'));    
    }

    public function getDetail ($id) {
        $item['data'] = Products::find($id);
        $item['comments'] = Comment::where('com_product', $id)->get();
        return view('frontend.details',$item);
    }

    public function getCategory ($id) {
        $item['category'] = Category::find($id);
        $item['data'] = Products::where('category_id',$id)->orderBy('id','desc')->paginate(4);

        return view('frontend.category',$item);
    }

    public function postComment (Request $request,$id) {
        $comment = new Comment;
        $comment->email   = $request->email;
        $comment->name    = $request->name;
        $comment->content = $request->content;
        $comment->com_product = $id;
        $comment->save();
    }

    public function getSearch (Request $request) {
            $result = $request->result;
            $item['keyword'] = $result;
            $result = str_replace(' ','%',$result);
            $item['data'] = Products::where('name','like','%'.$result.'%')->get()->toArray();
            return view('frontend.search',$item);
        }
}
