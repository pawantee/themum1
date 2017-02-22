@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-8">
            <form id="form_search" name="form_search" method="GET" action="{{route('mums.index')}}">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" id="search" name="search" class="form-control" placeholder="Search.">
                    <span class="input-group-btn">
                      <button type="submit" class="btn waves-effect btn-white">
                        <i class="fa fa-search"></i>
                      </button>
                    </span>
                </div>
            </form>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-lg fa-address-book text-primary"></i>
                    <strong class="text-primary">
                        ข้อมูล
                    </strong>
                    <strong>
                        ประวัติหญิงตั้งครรภ์
                    </strong>
                    <div class="pull-right">
                        <a href="{{route('mums.create')}}" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i>
                           <strong>
                                Add New
                           </strong> 
                            <i class="icon-user-female"></i>
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

                    {{-- <table class="table table-bordered table-sm table-striped"> --}}
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>ชื่อ - นามสกุล มารดา</th>
                                <th>เลขบัตรประจำตัวประชาชน มารดา</th>
                                {{-- <th>อาชีพ มารดา</th> --}}
                                {{-- <th>ศาสนา มารดา</th> --}}
                                {{-- <th>การศึกษาสูงสุด มารดา</th> --}}
                                <th>เบอร์โทร มารดา</th>
                                <th>ชื่อ - นามสกุล บิดา</th>
                                <th>เลขบัตรประจำตัวประชาชน บิดา</th>
                                {{-- <th>อาชีพ บิดา</th> --}}
                                {{-- <th>ศาสนา บิดา</th> --}}
                                {{-- <th>การศึกษาสูงสุด บิดา</th> --}}
                                <th>เบอร์โทร บิดา</th>
                                <th>วันที่เพิ่ม</th>
                                {{-- <th>รหัสไปรษณีย์</th> --}}
                                <th class="text-center" width="116">
                                    <i class="icon-options"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach ($mums as $key => $mum)
                            <tr>
                                <td>{{$mum->name_mum}}</td>
                                <td>{{$mum->crad}}</td>
                                {{-- <td>{{$mum->profession_mum}}</td>
                                <td>{{$mum->religion_mum}}</td>
                                <td>{{$mum->study_mum}}</td> --}}
                                <td>{{$mum->tel_mum}}</td>
                                <td>{{$mum->name_fathter}}</td>
                                <td>{{$mum->crad_father}}</td>
                                {{-- <td>{{$mum->profession_fathter}}</td>
                                <td>{{$mum->religion_fathter}}</td>
                                <td>{{$mum->study_fathter}}</td> --}}
                                <td>{{$mum->tel_fathter}}</td>
                                <td>{{$mum->created_at}}</td>
                                {{-- <td>{{$mum->zipcod}}</td> --}}
                                <td class="text-center" width="116">
                                    <div class="btn-group">
                                        <a href="{{route('mums.edit', ['id_mum' => $mum->id_mum])}}" class="btn btn-sm btn-default waves-effect" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                            <span class="fa  fa-gear (alias)" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{route('mums.show', ['id_mum' => $mum->id_mum])}}" class="btn btn-sm btn-primary waves-effect" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                            <span class="fa fa-sm fa-folder-open-o" aria-hidden="true"></span>
                                        </a>
                                        <a class="btn btn-sm btn-danger waves-effect" href="javascript:void(0);" onclick="confirmDelete($(this).find('form'))" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                            <form action="{{route('mums.destroy', ['id_mum' => $mum->id_mum])}}" method="post">
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
                    <div class="btn-toolbar btn-sm" role="toolbar" aria-label="Toolbar with button groups">
                        {{ $mums->appends(request()->all())->links() }}
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