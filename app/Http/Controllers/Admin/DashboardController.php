<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;

class DashboardController extends Controller
{
    //dashboard
    public function index(){
        $company = Company::count();
        $employees = Employee::count();
    
     
        return view('admin.dashboard.index',compact('company','employees'));
    }
}
