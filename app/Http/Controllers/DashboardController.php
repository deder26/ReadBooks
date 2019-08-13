<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Message;
use App\Book;
use App\Blog;
use DB;
class DashboardController extends Controller
{
    public function Dashboard(){
        
        
        if(Auth::user()->isAdmin){
         
            return redirect('/dashboard-admin');
        }
        else 
            return redirect('/dashboard');
    }
    
    
    public function AdminDashboard(){
        
        
           $cnt = DB::table('users')->count();
            $cntMsg = DB::table('messages')->where('status',0)->count();
            $cntBook = DB::table('books')->count();
            $cntBlog = DB::table('blogs')->count();
            
            return view('admin.dashboard.AdminDash',['cnt'=>$cnt,'cntMsg'=>$cntMsg,'cntBook'=>$cntBook,'cntBlog'=>$cntBlog]);
    }
    
    public function UserDashboard(){
        return view('User.blog');
    }
    
    public function profile(){
        if(Auth::user()->isAdmin){
            return view('admin.dashboard.profile');
        }
        else return view('front-end.dashboard.UserProfile');
    }
    
    
}
