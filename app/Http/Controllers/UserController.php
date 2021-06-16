<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Session;
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
         if(base64_decode($req->password,$user->password))
         {
             return "email or password is not correct";
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
            "username"=>"required | string | max:82 | unique:users",
            "email"=>"required | email | unique:users",

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





        $user= new User;
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
       $userid= Session::get('user')['id'];
        $data = User::where('id',$userid)->get();


        return view('listupdate',['lists'=>$data]);
      }
      function delete($id){
        $data= User::find($id);
        $data->delete();
        return redirect('listupdate');
      }



    function showData($id){
        $data= User::find($id);
        return view('profile',['data'=>$data]);
      }




      function update(Request $req){
        $data = User::find($req->id);
        $data->username=$req->username;
        $data->password=base64_encode($req->password);
        $data->confirm_password=base64_encode($req->confirm_password);
        $data->gender=$req->gender;
        $data->email=$req->email;
        $data->save();
        return redirect('/listupdate');
      }

}
