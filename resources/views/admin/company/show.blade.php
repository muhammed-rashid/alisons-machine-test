@extends('layouts/admin')
@section('title', 'View Company')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">View Company - {{$company->name}}</h4>
                </div>
                <div class="card-body">
                    <form id="members-form" >
                    
                        

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label" for="name">Company Name</label>
                                <input type="text" name="name" class="form-control" value="{{$company->name}}" readonly
                                   />
                             
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{$company->email}}" readonly/>
                               
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="email">Website</label>
                                <input type="text" name="website" class="form-control" value="{{$company->website}}" readonly/>
                               
                            </div>
                            <div class="form-group col-md-4">
                                
                                @if($company->logo)
                                    <img src="{{$company->logo_url}}" alt="" srcset="" style="width: 100px;height:auto">
                                @endif
                             
                                
                            </div>
                            
                            
                            
                            
                            
                            
                          
                           
                            
                        </div>
                        
                        
                        <div class="row col-12 flex-row-reverse mt-2 p-0">
                           
                            <a class="btn btn-outline-secondary mr-1 waves-effect"
                                href="{{ route('admin.company.index') }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

