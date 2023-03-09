@extends('layouts/admin')
@section('title', 'View Employee')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">View Employee - {{$employee->full_name}}</h4>
                </div>
                <div class="card-body">
                    <form id="members-form" >
                    
                        

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label" for="name">Full Name</label>
                                <input type="text" name="name" class="form-control" value="{{$employee->full_name}}" readonly
                                   />
                             
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="name">Company Name</label>
                                <input type="text" name="name" class="form-control" value="{{$employee->companyDetail->name}}" readonly
                                   />
                             
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{$employee->email}}" readonly/>
                               
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="email">Phone</label>
                                <input type="email" name="email" class="form-control" value="{{$employee->phone}}" readonly/>
                               
                            </div>
                            
                            
                            
                            
                            
                            
                            
                          
                           
                            
                        </div>
                        
                        
                        <div class="row col-12 flex-row-reverse mt-2 p-0">
                           
                            <a class="btn btn-outline-secondary mr-1 waves-effect"
                                href="{{ route('admin.employee.index') }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


