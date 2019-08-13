<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Comment;
use App\Blog;
use App\User;
use App\BookCatagory;

class CommentController extends Controller
{
    public function comment(Request $request){
      
        if(Session::get('user_id')){
            
        
        $uid = Session::get('user_id');
            
        $this->validate($request,[
            'comment' => 'required'
        ]);
        
        $comment = new Comment();
        
        $comment->blog_id = $request->blog_id;
        $comment->user_id = $uid;
        $comment->comment = $request->comment;
        
        $comment->save();
        return redirect()->back();
        }
        else return redirect('/login');
        
    }
    
    public function DeleteComment($id){
        $comment = Comment::find($id);
        $comment->delete();
        
        return redirect()->back();
    }
    
    public function EditComment($bid,$id){
        $blog = Blog::find($bid);
        $comment = Comment::find($id);
        $users = User::all();
        $catagories = BookCatagory::all();
        return view('front-end.comment.EditComment',['catagories'=>$catagories,'users'=>$users,'blog'=>$blog,'comment'=>$comment]);
    }
    
    public function UpdateComment(Request $request){
      
            
            
        
            
            $this->validate($request,[
                'comment' => 'required'
            ]);
            
            $comment = Comment::find($request->id);
            $comment->comment = $request->comment;
            
            $comment->save();
            
            $id= $request->blog_id;
            
            return redirect()->action(
                'BlogController@SingleViewStory', ['id' => $id]);
      
        
    }
}
