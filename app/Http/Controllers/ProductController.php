<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Validator;
use Session;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    //


    function index()
    {
        $data= DB::table('admins')
        ->join('products','admins.id','products.id')
        ->join('orders','orders.product_id','products.id')
        ->get();

       return view('product',['products'=>$data]);
    }

    function addnew(Request $req)
    {

        $rules=array(
            "name"=>'required | string | max:500',
            "price"=>'required | integer | max:500',
            "category"=>'required | string | max:500',
            'gallery' =>'required|image|mimes:jpg,png,jpeg,gif,svg',
            'gallery2' =>'required|image|mimes:jpg,png,jpeg,gif,svg',
            'gallery3' =>'required|image|mimes:jpg,png,jpeg,gif,svg',

            "description"=>'required | string | max:2000',
            "short_description"=>'required | string | max:1000',



        );
          $Validator = Validator::make($req->all(),$rules);
          if($Validator->fails()){
           return view('addnewproducts')->withErrors($Validator);
          }else{
        $pro= new Product;
        $pro->name=$req->name;
        $pro->price=$req->price;
        $pro->category=$req->category;

        $pro->description=$req->description;
        $pro->short_description=$req->short_description;


         if($req->hasfile('gallery')){
            $file = $req->file('gallery');
            $ext = $file->getClientOriginalName();
            $filename = time().'.'. $ext;
            $file->move('storage/images/1/', $filename);

            $pro->gallery = $filename;

        }else{
            return $req;
            $pro->gallery='';
        }
        if($req->hasfile('gallery2')){
            $file = $req->file('gallery2');
            $ext = $file->getClientOriginalName();
            $filename = time().'.'. $ext;
            $file->move('storage/images/1/', $filename);

            $pro->gallery2 = $filename;

        }else{
            return $req;
            $pro->gallery2='';
        }
        if($req->hasfile('gallery3')){
            $file = $req->file('gallery3');
            $ext = $file->getClientOriginalName();
            $filename = time().'.'. $ext;
            $file->move('storage/images/1/', $filename);

            $pro->gallery3 = $filename;

        }else{
            return $req;
            $pro->gallery3='';
        }

            $pro->save();

            return redirect('/') ;

            }



        }

        function create(){

            $products = Product::all();
            return view('showproducts', compact('products'));

        }



        function showpro(){
            $pro = Product::all();
            return view('showproducts',['products'=>$pro]);
          }
          function delete($id){
            $pro= Product::find($id);
            $pro->delete();
            return redirect('showproducts');
          }

          function editpro($id){
            $pro= Product::find($id);
            return view('editproducts',['pro'=>$pro]);
          }
          function update(Request $req){
            $pro = Product::find($req->id);
            $pro->name=$req->name;
            $pro->price=$req->price;
            $pro->category=$req->category;

            $pro->description=$req->description;
            $pro->short_description=$req->short_description;

            if($req->hasfile('gallery')){
                $file = $req->file('gallery');
                $ext = $file->getClientOriginalName();
                $filename = time().'.'. $ext;
                $file->move('storage/images/1/', $filename);

                $pro->gallery = $filename;

            }else{
                return $req;
                $pro->gallery='';
            }
            if($req->hasfile('gallery2')){
                $file = $req->file('gallery2');
                $ext = $file->getClientOriginalName();
                $filename = time().'.'. $ext;
                $file->move('storage/images/1/', $filename);

                $pro->gallery2 = $filename;

            }else{
                return $req;
                $pro->gallery2='';
            }
            if($req->hasfile('gallery3')){
                $file = $req->file('gallery3');
                $ext = $file->getClientOriginalName();
                $filename = time().'.'. $ext;
                $file->move('storage/images/1/', $filename);
                $pro->gallery3 = $filename;
            }else{
                return $req;
                $pro->gallery3='';
            }


            $pro->save();
            return redirect('showproducts');
          }







}







