<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Validator;

use Illuminate\Support\Facades\Hash;
class UserController extends Controller
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


         $user= User::where(['email'=>$req->email])->first();
         if(!$user ||  !Hash::check($req->password,$user->password))
         {
             return "username or password is not correct";
         }
         else
         {
             $req->session()->put('user',$user);
             return redirect('/');
         }
          }
    }
    function register(Request $req)
    {
        $rules=array(
            "name"=>"required | string | max:82 | unique:users",
            "email"=>"required | email | unique:users",
            "dob"=>"required | date | before:2000-01-01",
            "confirm_password"=>'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:34|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'password' => ['required_with:confirm_password|same:confirm_password',
            'min:12',
            'max:32',
            'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/']


        );
          $Validator = Validator::make($req->all(),$rules);
          if($Validator->fails()){
           return view('register')->withErrors($Validator);
          }else{





        $user= new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->confirm_password=Hash::make($req->confirm_password);
        $user->dob=$req->dob;


    if($req->hasfile('image')){
        $file = $req->file('image');
        $originalName = $file->getClientOriginalName();
        $filename = time().'.'. $originalName;
        $file->storeAs('public/images/', $filename);
        $size = $req->file('image')->getsize();
        $user->image = $filename;
        $user->size = $size;
    }else{
        return $req;
        $user->image='';
    }


        $user->save();
        return view("login",$user);


         }


    }
    function create(){

        $photos = User::all();
        return view('upload', compact('photos'));
    }
}
