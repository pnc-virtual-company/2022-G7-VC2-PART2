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
        $company->address = $request->address;
        $path = public_path('images');
            if(!file_exists($path)) {
                mkdir($path, 0777,true);
            }
            $file = $request->file('image');
            $fileName = uniqid().'_'.trim($file->getClientOriginalName());
            $company->image = $fileName;
            $file-> move($path,$fileName);
        $company->save();
        return response()->json(['message' => 'Success for store data']);
    }

    public function update(Request $request, $id){
        $company = Company::FindOrFail($id);
        $company->name = $request->name;
        $company->address = $request->address;
        $path = public_path('images');
            if(!file_exists($path)) {
                mkdir($path, 0777,true);
            }
            $file = $request->file('image');
            $fileName = uniqid().'_'.trim($file->getClientOriginalName());
            $company->image = $fileName;
            $file-> move($path,$fileName);
        $company->save();
        return response()->json(['message' => 'Success for Update your data']);
    }


}
