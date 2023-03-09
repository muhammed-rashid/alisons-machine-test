@extends('layouts/admin')
@section('title', 'Create Company')
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
                    <h4 class="card-title">Create New Company</h4>
                </div>
                <div class="card-body">
                    <form id="company-form" method="POST" action="{{ route('admin.company.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row col-12">
                            <h5 class="mb-1">
                                <i data-feather="disc" class="font-medium-4 mr-25"></i>
                                <span class="align-middle">Create new Company</span>
                            </h5>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label" for="name">Company Name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}"
                                   />
                                @if ($errors->has('name'))
                                    <span class="error">
                                        <p>{{ $errors->first('name') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{old('email')}}"/>
                                @if ($errors->has('email'))
                                    <span class="error">
                                        <p>{{ $errors->first('email') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="email">Website</label>
                                <input type="text" name="website" class="form-control" value="{{old('website')}}"/>
                                @if ($errors->has('website'))
                                    <span class="error">
                                        <p>{{ $errors->first('website') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                      
                             
                                    <label for="logo" class="form-label">Logo</label>
                                    <input class="form-control form-control" id="logo" type="file" name="logo">
                            
                                @if ($errors->has('logo'))
                                    <span class="error">
                                        <p>{{ $errors->first('logo') }}</p>
                                    </span>
                                @endif
                            </div>
                            
                            
                            
                            
                            
                            
                          
                           
                            
                        </div>
                        
                        
                        <div class="row col-12 flex-row-reverse mt-2 p-0">
                            <button type="submit"
                                class="btn btn-primary waves-effect waves-float waves-light">create</button>
                            <a class="btn btn-outline-secondary mr-1 waves-effect"
                                href="{{ route('admin.company.index') }}">Cancel</a>
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
    <script src="{{ asset(mix('js/scripts/app/company/create.js')) }}"></script>
@endsection
