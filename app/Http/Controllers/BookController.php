<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use DB;
use App\BookCatagory;

class BookController extends Controller
{
    public function BookAdd(){
        $catagories = BookCatagory::all();
        return view('admin.books.BookAdd',['catagories'=>$catagories]);
    }
    
    public function BookSave(Request $request){
        $this->validate($request,[
            'catagory_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'coverPic' => 'required',
            'book' => 'required'
        ]);
        
        $BookImage = $request->file('coverPic');
        $ImageName = $BookImage->getClientOriginalName();
        $directory = 'book-image/';
        $ImageUrl = $directory.$ImageName;
        $BookImage ->move($directory,$ImageName);
        
        $BookFile = $request->file('book');
        $FileName = $BookFile->getClientOriginalName();
        $directory = 'book-files/';
        $FileUrl = $directory.$FileName;
        $BookFile ->move($directory,$FileName);
        
        $book = new Book();
        $book->catagory_id = $request->catagory_id ;
        $book->title = $request->title ;
        $book->author = $request->author ;
        $book->coverPic = $ImageUrl;
        $book->book = $FileUrl ;
        
        $book->save();
        return redirect()->back()->with('message','Successfully Added');
    }
    
    public function BookManage(){
      
        $books = DB::table('books')
                ->join('book_catagories','book_catagories.id','=','books.catagory_id')
                ->select('book_catagories.name','books.*')
                ->paginate('15');
       // return $books;
        return view('admin.books.BookManage',['books'=>$books]);
        
    }
    
    public function BookEdit($id){
        $book = DB::table('books')
        ->join('book_catagories','book_catagories.id','=','books.catagory_id')
        ->select('book_catagories.name','books.*')
        ->where('books.id','=',$id)
        ->first();
        $catagories = BookCatagory::all();
        
        //return $book;
        return view('admin.books.BookEdit',['catagories'=>$catagories,'book'=>$book]);
    }
    
    public function BookUpdate(Request $request){
        $this->validate($request,[
            'catagory_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'coverPic' => 'required',
            'book' => 'required'
        ]);
        
        $BookImage = $request->file('coverPic');
        $ImageName = $BookImage->getClientOriginalName();
        $directory = 'book-image/';
        $ImageUrl = $directory.$ImageName;
        $BookImage ->move($directory,$ImageName);
        
        $BookFile = $request->file('book');
        $FileName = $BookFile->getClientOriginalName();
        $directory = 'book-files/';
        $FileUrl = $directory.$FileName;
        $BookFile ->move($directory,$FileName);
        
        $book = Book::find($request->id);
        $book->catagory_id = $request->catagory_id ;
        $book->title = $request->title ;
        $book->author = $request->author ;
        $book->coverPic = $ImageUrl;
        $book->book = $FileUrl ;
        
        $book->save();
        return redirect('/books/manage')->with('message','Successfully Updated');
    }
    
    public function ShowBook($id){
        $book = Book::find($id);
        return view('admin.books.ShowBook',['book'=>$book]);;
    }
    
    public function BookDelete($id){
        $book = Book::find($id);
        $book->delete();
        return redirect('/books/manage')->with('message','Successfully Deleted');
    }
    public function BooksCatagoryView($name, $id){
        $books = DB::table('books')->where('catagory_id','=',$id)->paginate('12');
        
        $catagories = BookCatagory::all();
        return view('front-end.books.Viewbooks',['books'=>$books,'catagories'=>$catagories]);
        
    }
    public function SearchBook(Request $request){
       
        $this->validate( $request,[
           'BookName' => 'required' 
        ]);
        $name = $request->BookName; 
        $books = DB::table('books')->where('title','LIKE','%'.$name.'%')->orWhere('author','LIKE','%'.$name.'%')->paginate('12');
        $catagories = BookCatagory::all();
        if(!$books->isEmpty())
            return view('front-end.books.Viewbooks',['books'=>$books,'catagories'=>$catagories]);
        else
            return view('front-end.books.SearchNotFound',['catagories'=>$catagories]);
    }

    
    public function ReadBook($id){
        $book = Book::find($id);
        $catagories = BookCatagory::all();
        return view('front-end.books.ReadBook',['book'=>$book,'catagories'=>$catagories]);
    }
}
