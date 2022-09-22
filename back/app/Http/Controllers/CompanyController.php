<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    //====== show all data =======
    public function index()
    {
        return Company::all();
    }
    //====== show specifice data =======
    public function show($id)
    {
        return Company::FindOrFail($id);
    }
    //======= store your data =========
    public function store(Request $request){
        $company = new Company();
        $company->name = $request->name;
        $file = $request->file('image');
        if ($file!=null){
            $path = public_path('images');
            if(!file_exists($path)) {
                mkdir($path, 0777,true);
            }
        $file = $request->file('image');
        $fileName = uniqid().'_'.trim($file->getClientOriginalName());
        $company->image = asset('/images/'.$fileName);
        $file-> move($path,$fileName);
        }else {
            $company->image = $company->image;
        }
        $company->save();
        return response()->json(['id' => $company->id]);
    }
 

    public function update(Request $request, $id){
        $company = Company::Find($id);
        $company->name = $request->name;
        $file = $request->file('image');
        if ($file!=null){
            $path = public_path('images');
            if(!file_exists($path)) {
                mkdir($path, 0777,true);
            }
            $file = $request->file('image');
            $fileName = uniqid().'_'.trim($file->getClientOriginalName());
            $company->image = asset('/images/'.$fileName);
            $file-> move($path,$fileName);
        }else {
            $company->image = $company->image;
        }

        $company->save();
        return response()->json(['message' => 'Successfully for updateData']);
    }
}
