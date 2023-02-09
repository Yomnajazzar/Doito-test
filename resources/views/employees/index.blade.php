@extends('layout.master')
@section('parentPageTitle', 'Main')
@section('title', 'employees')

@section('content')

<div class="body">
    <div class="d-flex flex-row ">
        <div class="mb-3 px-1">
            <a href="{{route('employees.create')}}" class="btn btn-sm mb-1 btn-primary"><i class="fa fa-plus"></i> <span>Add</span></a>
        </div>


    </div>
    <div class="table-responsive">


        <table class="table table-hover employees-table  dataTable table-custom spacing5">
            <thead>
                <tr>
                    <th>#Id</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Phone</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($employees as $empolyee)
                   <tr>

                    <th>{{$empolyee->id}}</th>
                    <th>{{$empolyee->full_name}}</th>
                    <th>{{$empolyee->email}}</th>
                    <th>{{$empolyee->company->name}}</th>
                    <th>{{$empolyee->phone}}</th>

                    <th>

                        <a href="{{route('employees.edit' , $empolyee->id)}}" class="btn btn-outline-primary"><i class="fa fa-edit"></i> <span>edit</span></a>
                        <form id="bank-{{$empolyee->id}}" class="d-none" action="{{route('employees.destroy' , $empolyee->id)}}" method="POST">
                            @csrf
                            @method("delete");
                        </form>
                        <a id="delete-bank" data-id="{{$empolyee->id}}" href="javascript:;" class="btn btn-outline-danger"><i class="fa fa-trash-o"></i> <span>delete</span></a>
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
<script src="{{ asset('assets/js/pages/tables/employees-table.js') }}"></script>
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
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#dc3545",
                        confirmButtonText: "Ok",
                        cancelButtonText: "cancel",
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
                                cancelButtonText: "ok",
                                closeOnConfirm: false,
                                closeOnCancel: false,
                            });
                        }
                    });
            });
        });

    </script>
@endpush
