<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use App\Notifications\CompanyRegisterNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
           
            $companies = Company::query();
            return DataTables::of($companies)->addColumn('actions',function($company){
                    $actions = "";
                    $actions .= '<a href="'.route('admin.company.show',$company->id).'" title="View company  Details"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye font-medium-3 text-primary mr-50"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>';
                    $actions .= '<a href="'.route('admin.company.edit',$company->id).'" title="Edit Company"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg>&nbsp;</a>';
                    $actions .= '<a href="javascript:void(0)" id="'.$company->id.'" class="delete" title="Delete company" id="'.$company->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash font-medium-3 text-primary mr-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';
                return $actions;
            })->rawColumns(['actions'])->make(true);
        }
        return view('admin.company.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyCreateRequest $request)
    {
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'website'=>$request->website
        ];
        //handle file input
        if($request->hasFile('logo')){
            $fileName = time() . "_" . Str::random(20).'.'.$request->file('logo')->getClientOriginalExtension(); 
            Storage::disk('public')->putFileAs('company',$request->file('logo'),$fileName);
            $data['logo'] = $fileName;
        }

        try{
        $company = Company::create($data);
        if($company->email){
            $company->notify(new CompanyRegisterNotification($company));
        }
        session()->flash('success','Company created successfully');
        return redirect()->route('admin.company.index');

        }catch(\Exception $e){
            session()->flash('error','Something went wrong,try again!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        
        return view('admin.company.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request, Company $company)
    {
        
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'website'=>$request->website
        ];
        //handle file input
        if($request->hasFile('logo')){
            $fileName = time() . "_" . Str::random(20).'.'.$request->file('logo')->getClientOriginalExtension(); 
            Storage::disk('public')->putFileAs('company',$request->file('logo'),$fileName);
            $data['logo'] = $fileName;

            //deleting the current file
            Storage::disk('public')->delete('company/'.$company->logo);
        }

        try{
        $company->update($data);
        session()->flash('success','Company updated successfully');
        return redirect()->route('admin.company.index');

        }catch(\Exception $e){
            session()->flash('error','Something went wrong,try again!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if($company){
            try{
            Storage::disk('public')->delete('company/'.$company->logo);
            $company->delete();
            return response()->json([
                'success'=>true,
                'message'=>'Company deleted successfully'
            ]);
            }catch(\Exception $e){
                return response()->json([
                    'success'=>false,
                    'message'=>'something went wrong, try again later!'
                ]);
            }
            
        }
    }
}
