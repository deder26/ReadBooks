<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookCatagory;

class CatagoryController extends Controller
{
    public function CatagoryAdd(){
        return view('admin.catagory.CatagoryAdd');
    }
    
    public function CatagorySave(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);
        
        $catagory = new BookCatagory();
        $catagory->name = $request->name;
        $catagory->save();
        
        return redirect()->back()->with('message','Successfully Added');
    }
    
    public function CatagoryManage(){
        $catagories = BookCatagory::all();
        return view('admin.catagory.CatagoryManage',['catagories'=>$catagories]);
    }
    
    public function CatagoryEdit($id){
        $catagory = BookCatagory::find($id);
        return view('admin.catagory.CatagoryEdit',['catagory'=>$catagory]);
    }
    
    public function CatagoryUpdate(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);
        
        $catagory = BookCatagory::find($request->id);
        $catagory->name = $request->name;
        $catagory->save();
        
        return redirect('/catagory/manage')->with('message','Successfully Updated');
    }
    
    public function CatagoryDelete($id){
        $catagory = BookCatagory::find($id);
        $catagory->delete();
        return redirect('/catagory/manage')->with('message','Successfully Deleted');
    }
    
}
