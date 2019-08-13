<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdditionalInformation;

class AdditionalController extends Controller
{
    public function AdditionalInfo()
    {
        $info = AdditionalInformation::all();
        if ($info->isEmpty()) {
            $info = new AdditionalInformation();
            $info->comapanyName = 'ShopNow';
            $info->desscription = 'Write Description Here';
            $info->contact = 'Write contact Here';
            $info->email = 'Write email Here';
            $info->address = 'Write address Here';
            $info->save();
        }
        $info = AdditionalInformation::first();
        
        return view('admin.AdditionalInfo.AdditionalView', [
            'info' => $info
        ]);
    }
    
    public function UpdateAdditionalInfo($id)
    {
        $info = AdditionalInformation::find($id);
        return view('admin.AdditionalInfo.AdditionalInfo', [
            'info' => $info
        ]);
    }
    
    public function SaveInfo(Request $request)
    {
        $this->validate($request, [
            
            'company_name' => 'required',
            'company_description' => 'required',
            'company_contact' => 'required',
            'company_email' => 'required',
            'company_address' => 'required',
        ]);
        
        
        $info = AdditionalInformation::find($request->id);
        
        $info->comapanyName = $request->company_name;
        $info->desscription = $request->company_description;
        $info->contact = $request->company_contact;
        $info->email = $request->company_email;
        $info->address = $request->company_address;
        
        $info->save();
        
        return redirect('/additional-info')->with('message', 'Successfully Updated');
    }
}
