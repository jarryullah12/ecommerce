<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;
use Validator;
use Illuminate\Support\MessageBag;
use App\Models\Photo;


class photoController extends Controller
{
    //

    function create(){

        $photos = Photo::all();
        return view('upload', compact('photos'));
    }

    function store(Request $req){

       $Validator= Validator::make($req->all(),[
            'name' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:34|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',

          ]);
          if($Validator->fails()){

            return response()->json($Validator->errors(),401);

           }else{


        $name = $req->file('name')->getClientOriginalName();
        $size = $req->file('name')->getsize();

        $req->file('name')->storeAs('public/images/', $name);


        $photo = new Photo();
        $photo->name = $name;
        $photo->size = $size;

        $photo->save();
        return back();

}
    }
    }



