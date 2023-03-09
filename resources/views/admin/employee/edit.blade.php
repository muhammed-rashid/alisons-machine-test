@extends('layouts/admin')
@section('title', 'Edit Employee')
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
                    <h4 class="card-title"> Edit Employee</h4>
                </div>
                <div class="card-body">
                    <form id="company-form" method="POST" action="{{ route('admin.employee.update',$employee->id) }}" >
                        @method('PUT')
                        @csrf
                        <div class="row col-12">
                            <h5 class="mb-1">
                                <i data-feather="disc" class="font-medium-4 mr-25"></i>
                                <span class="align-middle">Edit Employee</span>
                            </h5>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label" for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{old('first_name',$employee->first_name)}}"
                                   />
                                @if ($errors->has('first_name'))
                                    <span class="error">
                                        <p>{{ $errors->first('first_name') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{old('last_name',$employee->last_name)}}"
                                   />
                                @if ($errors->has('last_name'))
                                    <span class="error">
                                        <p>{{ $errors->first('last_name') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="company">Company</label>
                               <select class="form-control select2" name="company">
                                <option value=""></option>
                                @foreach ($companies as $company)
                                <option value="{{$company->id}}" @if($company->id == $employee->company) selected @endif>{{$company->name}}</option>
                                @endforeach
                               
                               </select>
                                @if ($errors->has('company'))
                                    <span class="error">
                                        <p>{{ $errors->first('company') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{old('email',$employee->email)}}"/>
                                @if ($errors->has('email'))
                                    <span class="error">
                                        <p>{{ $errors->first('email') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{old('phone',$employee->phone)}}"/>
                                @if ($errors->has('phone'))
                                    <span class="error">
                                        <p>{{ $errors->first('phone') }}</p>
                                    </span>
                                @endif
                            </div>
                            
                            
                           
                            
                            
                            
                            
                            
                          
                           
                            
                        </div>
                        
                        
                        <div class="row col-12 flex-row-reverse mt-2 p-0">
                            <button type="submit"
                                class="btn btn-primary waves-effect waves-float waves-light">Update</button>
                            <a class="btn btn-outline-secondary mr-1 waves-effect"
                                href="{{ route('admin.employee.index') }}">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/app/employee/create.js')) }}"></script>
@endsection
