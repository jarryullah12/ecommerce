<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    //
    function store(Request $req){
        $comment= new Comment();
        $comment->comment=$req->comment;
        $comment->save();

        return back();
    }
    function index(){
        $comments=Comment::where('approve','1')->get();
        return view('front',['comments'=>$comments]);
    }
    function dash(){
        $comments=Comment::orderBy('created_at','desc')->get();
        return view('dashboard',['comments'=>$comments]);
    }
    function approval(Request $req){
        $comment=Comment::find($req->commentId);
        $approveVal=$req->approve;
        if($approveVal=='on'){
            $approveVal=1;
        }else{
            $approveVal=0;
        }
        $comment->approve=$approveVal;
        $comment->save();
        return back();

    }
}
