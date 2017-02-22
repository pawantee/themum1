@extends('layouts.app')
@section('content')
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">
                            <i class="fa fa-lg fa-id-card text-primary" aria-hidden="true"></i>
                        <strong class="text-primary">
                            ข้อมูล
                        </strong> 
                        <strong>
                            เด็กที่คลอด
                        </strong>
                        <div class="pull-right">
                            <a href="{{route('kids.create')}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i>
                               <strong>
                                    Add New
                               </strong> 
                               <i class="icon-emotsmile"></i>
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

                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>เลขบัตรประจำตัวประชาชน</th>
                                    <th>วัน /เดือน / ปี เกิด</th>
                                    <th>น้ำหนักเเรกเกิด</th>
                                    <th>กรุ๊ปเลือด</th>
                                    <th>ชื่อ - นามสกุล มารดา</th>
                                    <th> วันที่เพิ่ม</th>
                                    <th class="text-center" width="116">
                                        <i class="icon-options"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($kids as $key => $kid)
                                <tr>
                                    <td>{{$kid->name_kid}}</td>
                                    <td>{{$kid->card_kid}}</td>
                                    <td>{{$kid->date_d}}</td>
                                    <td>{{$kid->weight}}</td>
                                    <td>{{$kid->blood_group}}</td>
                                    <td>{{$kid->mum_id}}</td>
                                    <td>{{$kid->created_at}}</td>
                                    <td class="text-center" width="116">
                                        <div class="btn-group">
                                            <a href="{{route('kids.edit', ['kid_id' => $kid->kid_id])}}" class="btn btn-sm btn-default waves-effect" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                <span class="fa  fa-gear (alias)" aria-hidden="true"></span>
                                            </a>
                                            <a href="{{route('kids.show', ['kid_id' => $kid->kid_id])}}" class="btn btn-sm btn-primary waves-effect" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                <span class="fa fa-sm fa-folder-open-o" aria-hidden="true"></span>
                                            </a>
                                            <a class="btn btn-sm btn-danger waves-effect" href="javascript:void(0);" onclick="confirmDelete($(this).find('form'))" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                <form action="{{route('kids.destroy', ['kid_id' => $kid->kid_id])}}" method="post">
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
                <div class="btn-toolbar btn-sm" role="toolbar" aria-label="Toolbar  with button groups">
                    {{ $kids->appends(request()->all())->links() }}
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