@extends('layout.master')
@section('title', 'Add Compny')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Add Company</h2>
            </div>
            <div class="body">
                <form action="{{route('companies.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="row">

                        <div class="input-group  p-1 col-sm-12  col-md-6 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" for="question-text">Name</span>
                            </div>
                            <input type="text" required  name="name" class="form-control" value="{{old('name')}}" id="name" >
                            @error('name')
                                <div class="alert-danger w-100 d-flex align-items-center text-sm pr-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="input-group  p-1 col-sm-12  col-md-6 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Email</span>
                            </div>
                            <input type="email"  name="email" class="form-control" id="email" value="{{old('email')}}">
                            @error('email')
                                <div class="alert-danger w-100 d-flex align-items-center text-sm pr-1">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="input-group  p-1 col-sm-12  col-md-6 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Website</span>
                            </div>
                            <input type="url"  name="website" class="form-control" id="website" value="{{old('website')}}">
                            @error('question')
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
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> <span>Add</span></button>
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
