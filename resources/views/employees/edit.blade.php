@extends('layout.master')
@section('title', 'Edit Employee')
{{-- @section('title2')
    <a href="{{route('employees')}}">Employee</a>
@endsection
 --}}

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Edit Employee</h2>
            </div>


            <div class="body">
                <form action="{{route('employees.update' , $employee->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="input-group  p-1 col-sm-12  col-md-6 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" for="question-text">First Name</span>
                            </div>
                            <input type="text" name="first_name" class="form-control" id="first_name" value="{{$employee->first_name}}" >
                            @error('first_name')
                                <div class="alert-danger w-100 d-flex align-items-center text-sm pr-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="input-group  p-1 col-sm-12  col-md-6 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" for="question-text">Last Name </span>
                            </div>
                            <input type="text" name="last_name" class="form-control" id="last_name" value="{{$employee->last_name}}">
                            @error('last_name')
                                <div class="alert-danger w-100 d-flex align-items-center text-sm pr-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="input-group  p-1 col-sm-12  col-md-6 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Email</span>
                            </div>
                            <input type="email"  name="email" class="form-control" id="email"value="{{$employee->email}}">
                            @error('email')
                                <div class="alert-danger w-100 d-flex align-items-center text-sm pr-1">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="input-group  p-1 col-sm-12  col-md-6 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Phone</span>
                            </div>
                            <input type="text"  name="phone" class="form-control" id="phone" value="{{$employee->phone}}">
                            @error('phone')
                                <div class="alert-danger w-100 d-flex align-items-center text-sm pr-1">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="input-group  p-1 col-sm-12  col-md-6 ">
                            <div class="input-group-prepend">
                                <label class="input-group-text" >Company</label>
                            </div>
                            <select required name="company_id" class="custom-select" id="company_id">
                                <option disabled >Select ..</option>
                                @foreach ($companies as $company)
                                    <option  @if($employee->company->id ==  $company->id ) selected @endif value="{{$company->id}}" >{{$company->name}}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <div class="alert-danger w-100 d-flex align-items-center text-sm pr-1">{{$message}}</div>
                            @enderror
                        </div>


                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="input-group  p-1 col-sm-12  col-md-6 ">
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
