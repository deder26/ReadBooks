<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use DB;
use Session;
use App\User;

class ReportController extends Controller
{
    public function ViewReports(){
        $reports = DB::table('reports')
                    ->join('blogs','blogs.id','=','reports.blog_id')
                    ->select('blogs.title','blogs.user_id','blogs.story','reports.*')
                    ->orderBy('id','desc')
                    ->paginate('10');
        
        $users = User::all();
        
        
        return view('admin.reports.ViewReports',['reports'=>$reports,'users'=>$users]);
    }
    
    public function SubmitReport($id){
       
        if(Session::get('user_id'))
        {
           
            $uid = Session::get('user_id');
            $report = new Report();
            $report->blog_id = $id;
            $report->reportBy_user_id = $uid;
            $report->save();
            return redirect()->back();
        }
        else return redirect('/login');
    }
    
    public function DeleteReport($id){
        $report = Report::find($id);
        $report->delete();
        return redirect()->back();
    }
}
