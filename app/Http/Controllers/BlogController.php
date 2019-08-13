<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use DB;
use App\User;
use App\BookCatagory;
use Session;
use App\Comment;
use Auth;
class BlogController extends Controller
{
    public function WriteStroies(){
        if(Auth::user()->isAdmin){
            return view('Blogs.blog');
        }
        else return view('User.blog');
    }
    
    public function BlogSave(Request $request){
        
        $this->validate($request,[
            'title' => 'required',
            'story' => 'required'
        ]);
        
        $blog = new Blog();
        $blog->user_id = $request->user_id;
        $blog->title = $request->title;
        $blog->story = $request->story;
        
        $blog->save();
        
        return redirect()->back()->with('message','Successfully Posted');
    }
    
    public function MyStroies(){
        $blogs = DB::table('blogs')->where('user_id',Session::get('user_id'))->paginate('15');
        
        if(Auth::user()->isAdmin){
            return view('Blogs.MyStories',['blogs'=>$blogs]);
        }
        else return view('User.MyStories',['blogs'=>$blogs]);
        
    }
    
    public function ViewStory($id){
        $blog = Blog::find($id);
        
        if(Auth::user()->isAdmin){
            return view('Blogs.ViewStory',['blog'=>$blog]);
        }
        else return view('User.ViewStory',['blog'=>$blog]);
        
    }
    
    
    
    public function ViewReportedStory($id){
        $blog = Blog::find($id);
        
        return view('admin.reports.ViewReportedStory',['blog'=>$blog]);
        
    }
    
    public function EditStory($id){
        $blog = Blog::find($id);
        
        return view('Blogs.EditStory',['blog'=>$blog]);
        
    }
    
    public function UpdateStory(Request $request){
        
        $this->validate($request,[
            'title' => 'required',
            'story' => 'required'
        ]);
        
        $blog = Blog::find($request->id);
        
        $blog->user_id = $request->user_id;
        $blog->title = $request->title;
        $blog->story = $request->story;
        
        $blog->save();
        
        return redirect('/blog/my-stroies')->with('message','Successfully Updated');
        
    }
    
    public function DeleteStory($id){
        $blog = Blog::find($id);
        $blog->delete(); 
        
        return redirect('/blog/my-stroies')->with('message','Successfully Deleted');
        
    }
    
    public function DeleteStoryF($id){
        $blog = Blog::find($id);
        $blog->delete();
        
        return redirect('/blog');
        
    }
    
    public function Viewblogs(){
        $blogs = DB::table('blogs')
                ->orderBy('id','desc')
                ->paginate('10');
        
        $users = User::all();
        $catagories = BookCatagory::all();
        
        return view('front-end.blogs.blog',['blogs'=>$blogs,'users'=>$users,'catagories'=>$catagories]);
    }
    public function ViewMyBlogs(){
        $uid = Session::get('user_id');
        $blogs = DB::table('blogs')
        ->where('user_id', $uid)
        ->orderBy('id','desc')
        ->paginate('10');
        
        $users = User::all();
        $catagories = BookCatagory::all();
        
        return view('front-end.blogs.ViewMyBlogs',['blogs'=>$blogs,'users'=>$users,'catagories'=>$catagories]);
    }
    public function SingleViewStory($id){
        $blog = Blog::find($id);
        $comments = DB::table('comments')->where('blog_id',$id)->orderBy('id','desc')->paginate('10');
        $users = User::all();
        $catagories = BookCatagory::all();
        
        
        return view('front-end.blogs.SingleViewStory',['blog'=>$blog,'users'=>$users,'catagories'=>$catagories,'comments'=>$comments]);
    }
}
