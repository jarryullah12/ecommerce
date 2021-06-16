<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\Product;

use Illuminate\Support\Facades\Crypt;
use Validator;
use Session;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    //

    function login(Request $req)
    {

        $rules=array(

            "email"=>"required | email",

            'password' => ['required',
               'min:12',
               'max:32',
               'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/']


        );
          $Validator = Validator::make($req->all(),$rules);
          if($Validator->fails()){
           return view('login')->withErrors($Validator);
          }else{


         $user= admin::where(['email'=>$req->email])->first();
         if(base64_decode($req->password,$user->password))
         {
             return "email or password is not correct";
         }
         else
         {
             $req->session()->put('admin',$user);
             return redirect('/');
         }
          }
    }
    function register(Request $req)
    {
        $rules=array(
            "username"=>"required | string | max:82 | unique:admins",
            "email"=>"required | email | unique:admins",

            "confirm_password"=>'required',
            'password' => ['required_with:confirm_password|same:confirm_password',
            'min:12',
            'max:32',
            'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/']


        );
          $Validator = Validator::make($req->all(),$rules);
          if($Validator->fails()){
           return view('register')->withErrors($Validator);
          }else{





        $user= new admin;
        $user->username=$req->username;
        $user->email=$req->email;
        $user->gender=$req->gender;

        $user->password=base64_encode($req->password);
        $user->confirm_password=base64_encode($req->confirm_password);





        $user->save();
        return view("login", $user);


         }


    }
    function show(){
        if(Session::has('admin')){
       $userid= Session::get('admin')['id'];
        $data = admin::where('id',$userid)->get();


        return view('listupdate',['lists'=>$data]);
        }else{
            return redirect('/login');
        }
      }
      function delete($id){
        $data= admin::find($id);
        $data->delete();
        return redirect('listupdate');
      }



    function showData($id){
        $data= admin::find($id);
        return view('profile',['data'=>$data]);
      }




      function update(Request $req){
        $data = admin::find($req->id);
        $data->username=$req->username;
        $data->password=base64_encode($req->password);
        $data->confirm_password=base64_encode($req->confirm_password);
        $data->gender=$req->gender;
        $data->email=$req->email;
        $data->save();
        return redirect('/listupdate');
      }





}

