@extends('layouts.app')
@section('content')
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-2x fa-user-md text-primary" aria-hidden="true"></i>
                        <strong class="text-primary">
                            ข้อมูล
                        </strong> 
                        <strong>
                            การฉีดวัคซีน
                        </strong>
                        <div class="pull-right">
                            <a href="{{route('injectvaccines.create')}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i>
                               <strong>
                                    Add New
                               </strong> 
                               <i class="icon-pin"></i>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="panel-body">

                    @if (session('status'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </button>
                        <strong>{{session('status')}}</strong>
                    </div>
                    @endif

                        <table class="table table-striped table-bordered table-hover table-condensed ">
                            <thead>
                                <tr>
                                    <th>ชื่อเด็กที่ต้องฉีดวัคซีน</th>
                                    <th>ชื่อวัคซีน</th>
                                    <th>วัน / เดือน / ปี</th>
                                    <th>สถานะ</th>
                                    <th>วันที่เพิ่ม</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($injectvaccines as $key => $injectvaccine)
                                <tr>
                                    <td>{{ $injectvaccine->kid_id}}</td>
                                    <td>{{ $injectvaccine->vaccine_id}}</td>
                                    <td>{{ $injectvaccine->date_d}}</td>
                                    <td>
                                        <span class="label label-primary">
                                        {{$injectvaccine->statused->name}}
                                        </span>
                                    </td>
                                    <td>{{ $injectvaccine->created_at}}</td>
                                    <td class="text-center" width="116">
                                    <div class="btn-group">
                                        <a href="{{route('injectvaccines.edit', ['no' => $injectvaccine->no])}}" class="btn btn-sm btn-default waves-effect" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                            <span class="fa  fa-gear (alias)" aria-hidden="true"></span>
                                        </a>
                                        
                                        <a class="btn btn-sm btn-danger waves-effect" href="javascript:void(0);" onclick="confirmDelete($(this).find('form'))" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                            <form action="{{route('injectvaccines.destroy', ['no' => $injectvaccine->no])}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                            </form>
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </a>
                                     </div>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/core.js') }}"></script>
    <script type="text/javascript">
        function confirmDelete(e) {
            swal({
                title: "Are you sure?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Delete",
                closeOnConfirm: false
            },
            function(){
                 if (e.submit()) {
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                }
            });
        }
    </script>
@endpush