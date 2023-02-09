@extends('layout.master')
@section('title', 'Add Compny')
{{-- @section('title2')
    <a href="{{route('companies')}}">Company</a>
@endsection
 --}}

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Add Company</h2>
            </div>
            <div class="body">
                <form action="{{route('companies.update' , $company->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="input-group  p-1 col-sm-12  col-md-6 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" for="question-text">Name</span>
                            </div>
                            <input type="text"  name="name" required class="form-control" id="name" value="{{$company->name}}">
                            @error('name')
                                <div class="alert-danger w-100 d-flex align-items-center text-sm pr-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="input-group  p-1 col-sm-12  col-md-6 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Email</span>
                            </div>
                            <input type="email"  name="email" class="form-control" id="email"  value="{{$company->email}}">
                            @error('email')
                                <div class="alert-danger w-100 d-flex align-items-center text-sm pr-1">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="input-group  p-1 col-sm-12  col-md-6 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Website</span>
                            </div>
                            <input type="url"  name="website" class="form-control" id="website" value="{{$company->website}}">
                            @error('website')
                                <div class="alert-danger w-100 d-flex align-items-center text-sm pr-1">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="input-group  p-1 col-sm-12  col-md-6 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Logo</span>
                            </div>
                            <input type="file" accept=".jpg,.png,.jpge"  name="logo" class="form-control" id="logo" >
                            @error('logo')
                                <div class="alert-danger w-100 d-flex align-items-center text-sm pr-1">{{$message}}</div>
                            @enderror
                        </div>

                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="input-group  p-1 col-6 ">
                            <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> <span>Update</span></button>
                        </div>
                    </div>


        </div>
                </form>
            </div>
        </div>

    </div>
</div>
@stop

@section('page-styles')

@stop

@section('page-script')


<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>

@stop

@push('after-scripts')

@endpush
