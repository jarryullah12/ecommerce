<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

use Session;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    //

    function shoes()
    {
       $data= Product::paginate(6);
       return view('shoes',['products'=>$data]);
    }
    function index()
    {
       $data= Product::all()->random(6);
       return view('product',['products'=>$data]);
    }

    function detail($id)
    {
        $data =Product::find($id);
        return view('detail',['product'=>$data]);
    }
    function search(Request $req)
    {
        $data= Product::
        where('name', 'like', '%'.$req->input('query').'%')
        ->get();
        return view('search',['products'=>$data]);
    }
    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            $cart= new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            return redirect('/cartlist');

        }
        else
        {
            return redirect('/login');
        }
    }
    static function cartItem()
    {
        $userId= Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();

    }
    function cartList()
    {
        if(session()->has('user')){
        $userId= Session::get('user')['id'];
       $data=  DB::table('cart')
         ->join('products','cart.product_id','products.id')
         ->select('products.*','cart.id as cart_id')
         ->where('cart.user_id',$userId)
         ->get();

         return view('cartlist',['products'=>$data]);
        }else{
            return redirect('/');
        }
    }
    function removeCart($id)
    {
         Cart::destroy($id);
        return redirect('cartlist');
    }
    function orderNow()
    {
        if(session()->has('user')){
        $userId= Session::get('user')['id'];
        $totalprice = DB::table('cart')
          ->join('products','cart.product_id','products.id')
          ->where('cart.user_id',$userId)
          ->sum('products.price');

          return view('ordernow',['totalprice'=>$totalprice]);
        }else{
            return redirect('/');
        }
    }

    function orderPlace(Request $req)
    {
        $userId= Session::get('user')['id'];
        $allCart=Cart::where('user_id',$userId)->get();
        foreach($allCart as $cart)
        {
            $order= new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->address=$req->address;
            $order->status="pending";
            $order->payment_method=$req->payment;
            $order->payment_status="pending";
            $order->save();
        }
        Cart::where('user_id',$userId)->delete();
        return redirect('/');
        // return $req->input();
    }

    function myOrder()
    {
        if(session()->has('user')){
        $userId= Session::get('user')['id'];
        $orders= DB::table('orders')
          ->join('products','orders.product_id','products.id')
          ->where('orders.user_id',$userId)
          ->get();
        return view('myorder',['orders'=>$orders]);

        }else{
            return redirect('/');
        }

    }
    function cartb()
    {
        if(session()->has('user')){
        $userId= Session::get('user')['id'];
       $data=  DB::table('cart')
         ->join('products','cart.product_id','products.id')
         ->select('products.*','cart.id as cart_id','cart.product_price')
         ->where('cart.user_id', $userId)
         ->get();

         return view('ordernow',['products'=>$data]);
        }else{
            return redirect('/');
        }
    }
    function addInCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            $cart= new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->product_price=$req->product_price;

            $cart->save();
            return redirect('/ordernow');

        }
        else
        {
            return redirect('/login');
        }
    }

}
