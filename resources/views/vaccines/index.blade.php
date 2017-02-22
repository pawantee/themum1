@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-lg fa-flask text-primary" aria-hidden="true"></i>
                    <strong class="text-primary">
                        วัคซีน
                    </strong>
                    <strong>
                        เด็กแรกเกิด
                    </strong>
                    <div class="pull-right">
                        <a href="{{route('vaccines.create')}}" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i>
                           <strong>
                                Add New
                           </strong> 
                           <i class="icon-chemistry"></i>
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
                                <th>ชื่อ วัคซีน</th>
								<th>วันที่เพิ่ม</th>
								<th class="text-center" width="116">
									<i class="icon-options"></i>
								</th>
							</tr>
						</thead>
						<tbody>
                        @foreach ($vaccines as $key => $vaccine)
							<tr>
                                <td>{{$vaccine->name}}</td>
								<td>{{$vaccine->created_at}}</td>
								<td class="text-center" width="116">
                                    <div class="btn-group">
                                        <a href="{{route('vaccines.edit', ['vaccine_id' => $vaccine->vaccine_id])}}" class="btn btn-sm btn-default waves-effect" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                            <span class="fa  fa-gear (alias)" aria-hidden="true"></span>
                                        </a>

                                        <a class="btn btn-sm btn-danger waves-effect" href="javascript:void(0);" onclick="confirmDelete($(this).find('form'))" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                            <form action="{{route('vaccines.destroy', ['vaccine_id' => $vaccine->vaccine_id])}}" method="post">
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
                    {{ $vaccines->appends(request()->all())->links() }}
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