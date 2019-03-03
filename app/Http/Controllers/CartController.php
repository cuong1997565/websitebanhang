<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Products;
use Mail;

class CartController extends Controller
{
    public function getAddCart ($id) {
        $product = Products::find($id);
        Cart::add(['id'=> $id, 'name' => $product->name,'qty' => 1,
        'price' => $product->price,'options' => ['img' => $product->img]
        ]);
        return redirect('cart/show');
    }

    public function getShowCart() {
        $data['items'] = Cart::content();
        $data['total'] = Cart::total();
        return view('frontend.cart',$data);
    }

    public function removeCart ($id) 
    {
            if($id == 'all') {
               Cart::destroy();
            } else {
               Cart::remove($id);
            }
            return back();
    }


    public function getUpdateCart (Request $request) {
        Cart::update($request->rowId, $request->qty);
    }

    public function postComplete (Request $request){
        $data['info'] = $request->all();
        $email = $request->email;
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total();
        Mail::send('frontend.email', $data, function ($message) use ($email) {
            $message->from('cuong1997565@gmail.com', 'Cương Nguyễn');
            $message->to($email , $email);
            $message->subject('Xác nhận hóa đơn mua hàng Vietproshop');
        });
        Cart::destroy();
        return redirect('complete');
    }

    public function getComplete () {
        return view('frontend.complete');
    }
}
