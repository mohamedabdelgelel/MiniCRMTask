<?php

namespace App\Http\Controllers;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = DB::table('companies')->paginate(10);
        return view("Company.view",compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
        'name' => 'required',
        ]);
        $validator = \Validator::make($request->all(),[
            "logo"      => "dimensions:min_width:100,min_height:100",
        ]);

        if($validator->fails()){
            return \Redirect::back()->withInput()->withErrors( $validator );
        }

        $logoCom = $request->file('logo');
        $extension = $logoCom->getClientOriginalExtension();
        Storage::disk('public')->put($logoCom->getFilename().'.'.$extension,  File::get($logoCom));
        $newCompany = new Company();
        $newCompany->name = $request->input('name');
        $newCompany->email = $request->input('email');
        $newCompany->website = $request->input('website');
        $newCompany->mime = $logoCom->getClientMimeType();
        $newCompany->original_filename = $logoCom->getClientOriginalName();
        $newCompany->filename = $logoCom->getFilename().'.'.$extension;
        $newCompany->save();
        return redirect("displayCompanies");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findOrfail($id);
        return view("Company.detail",compact('company'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrfail($id);
        return view("Company.update",compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
        'name' => 'required',
        ]);
        $validator = \Validator::make($request->all(),[
            "logo"      => "dimensions:min_width:100,min_height:100",
        ]);

        if($validator->fails()){
            return \Redirect::back()->withInput()->withErrors( $validator );
        }

        $logoCom = $request->file('logo');
        $extension = $logoCom->getClientOriginalExtension();
        Storage::disk('public')->put($logoCom->getFilename().'.'.$extension,  File::get($logoCom));
        $updateCompany = Company::findOrfail($id);
        $updateCompany->name = $request->input('name');
        $updateCompany->email = $request->input('email');
        $updateCompany->website = $request->input('website');
        $updateCompany->mime = $logoCom->getClientMimeType();
        $updateCompany->original_filename = $logoCom->getClientOriginalName();
        $updateCompany->filename = $logoCom->getFilename().'.'.$extension;
        $updateCompany->save();
        return redirect("displayCompanies");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrfail($id);
        $company->delete();
        return redirect("displayCompanies");
    }
}
