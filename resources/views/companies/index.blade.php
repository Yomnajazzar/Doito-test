@extends('layout.master')
@section('parentPageTitle', 'Main')
@section('title', 'Companies')

@section('content')

<div class="body">
    <div class="d-flex flex-row ">
        <div class="mb-3 px-1">
            <a href="{{route('companies.create')}}" class="btn btn-sm mb-1 btn-primary"><i class="fa fa-plus"></i> <span>Add</span></a>
        </div>


    </div>
    <div class="table-responsive">


        <table class="table table-hover companies-table dataTable table-custom spacing5">
            <thead>
                <tr>
                    <th>#Id</th>
                    <th>logo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Date </th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($companies as $company)
                   <tr>
                    <th>{{$company->id}}</th>
                    <th>
                        <img src="{{$company->logo_path}}" width="100" height="100" alt="{{$company->name}} Logo" title="" />
                        </th>
                    <th>{{$company->name }}</th>
                    <th>{{$company->email ?? $company->name . ' Email' }}</th>
                    <th>{{$company->website ?? $company->name . ' Website'}}</th>
                    <th >{{$company->created_at->translatedFormat('A h:i:s l  Y/m/d ')}}</th>
                    <th>
                        <a href="{{route('companies.edit' , $company->id)}}" class="btn btn-outline-primary"><i class="fa fa-edit"></i> <span>edit</span></a>
                        <form id="bank-{{$company->id}}" class="d-none" action="{{route('companies.destroy' , $company->id)}}" method="POST">
                            @csrf
                            @method("delete");
                        </form>
                        <a id="delete-bank" data-id="{{$company->id}}" href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash-o"></i> <span>delete</span></a>
                    </th>
                   </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}"/>
<style>
    td.details-control {
    background: url('../assets/images/details_open.png') no-repeat center center;
    cursor: pointer;
}
    tr.shown td.details-control {
        background: url('../assets/images/details_close.png') no-repeat center center;
    }
</style>
@stop

@section('page-script')
<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/companies-table.js') }}"></script>
@stop

@push('after-scripts')
    <script>
        $(function(){
            $('#submit-form-filters').on('click' , function(){
                $('#accept-filters-form').submit();
            });

            $('#reset-filters').on('click' , function(i , select){
                $('select').prop('selectedIndex' , 0);
                $('#accept-filters-form').submit();
            });

            function submitFormDelete(id){
                $(`form#bank-${id}`).submit();
            }

            $(document).on('click' , '#delete-bank', function(){
                const id = $(this).data('id');
                swal({
                        title: "Are sure of the deleting process ?",
                        text: "Deleting the company will delete its employees!!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#dc3545",
                        confirmButtonText: "OK",
                        cancelButtonText: "Cancel",
                        closeOnConfirm: false,
                        closeOnCancel: false,
                    }, function (isConfirm) {
                        if (isConfirm) {
                            console.log(id);
                            submitFormDelete(id);
                        } else {
                            swal({
                                title: "The process has been cancelled",
                                type: "error",
                                showCancelButton: true,
                                showConfirmButton: false,
                                cancelButtonText: "OK",
                                closeOnConfirm: false,
                                closeOnCancel: false,
                            });
                        }
                    });
            });
        });

    </script>
@endpush
