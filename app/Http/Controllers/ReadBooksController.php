<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookCatagory;
use App\AdditionalInformation;
use Auth;
class ReadBooksController extends Controller
{
    public function index(){
      
        $catagories = BookCatagory::all();
        return view('front-end.home.index',['catagories'=>$catagories]);
    }
    
    public function blog(){
        $catagories = BookCatagory::all();
        return view('front-end.blogs.blog',['catagories'=>$catagories]);
    }
    
    public function about(){
        $catagories = BookCatagory::all();
        $about = AdditionalInformation::first();
        
        return view('front-end.aboutUs.about_us',['catagories'=>$catagories,'about'=>$about]);
    }
    
    public function contact(){
        $catagories = BookCatagory::all();
        $contact = AdditionalInformation::first();
       
        return view('front-end.contact.contact',['catagories'=>$catagories,'contact'=>$contact]);
    }
    
    
}
