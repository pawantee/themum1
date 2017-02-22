@extends('layouts.app')
@push('css')
    <link href="{{ asset ('css/datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset ('css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset ('css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-2x fa-user-md text-success" aria-hidden="true"></i>
                        <strong class="text-success">
                            เพิ่ม
                        </strong> 
                        <strong>
                            การฉีดวัคซีน
                        </strong>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" name="themum" method="POST" action="{{route('injectvaccines.store')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('kid_id') ? ' has-error' : '' }}">
                            <label for="kid_id" class="col-md-4 control-label">ชื่อเด็กที่ต้องวัคซีน</label>

                            <div class="col-md-6">
                                <input id="kid_id" type="text" class="form-control" name="kid_id" value="{{ old('kid_id') }}">

                                @if ($errors->has('kid_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kid_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('vaccine_id') ? ' has-error' : '' }}">
                            <label for="vaccine_id" class="col-md-4 control-label">ชื่อวัคซีน</label>

                            <div class="col-md-6">
                                <input id="vaccine_id" type="text" class="form-control" name="vaccine_id" value="{{ old('vaccine_id') }}">

                                @if ($errors->has('vaccine_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vaccine_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date_d') ? ' has-error' : '' }}">
                            <label for="date_d" class="col-md-4 control-label">วัน / เดือน / ปี</label>
                            
                            <div class="col-sm-6">
                              <div class="input-group">
                                  <input id="date_d" name="date_d" type="text" class="form-control" placeholder="dd/mm/yyyy" value="{{ old('date_d') }}" >
                                  <span class="input-group-addon bg-custom b-0 text-white">
                                    <i class="icon-calender"></i>
                                    <span class="icon-calendar"></span>
                                  </span>
                              </div>
                              @if ($errors->has('date_d'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_d') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-sm-4 control-label">สถานะ</label>
                            <div class="col-sm-6">
                                
                                <select name="status" id="status" class="selectpicker form-control" data-actions-box="true" data-style="btn-white" tabindex="-98" title="เลือกสถานะ.">

                                    @foreach ($statused as $key => $statused)
                                        <option value="{{$statused->id}}" data-content="
                                            <span class='label label-primary'>
                                                <i class='icon-pin text-danger' aria-hidden='true'> |</i>
                                                {{$statused->name}}</span>">{{$statused->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-sm btn-primary">
                                  <i class="fa fa-sm fa-save"></i>
                                  <strong> Save</strong>
                                </button>
                                <a class="btn btn-sm btn-danger btn-custom" href="{{route('injectvaccines.index')}}">
                                    <i class="fa fa-lg fa-chevron-circle-left"></i>
                                    <strong>Back</strong>
                                </a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

    <script src="{{ asset ('js/jquery-ui.js')}}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/datepicker.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js')}}"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            src = "{{ route('kidapi') }}";
             $("#kid_id").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: src,
                        dataType: "json",
                        data: {
                            term : request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                min_length: 3,
            });


             src1 = "{{ route('vaccineapi') }}";
             $("#vaccine_id").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: src1,
                        dataType: "json",
                        data: {
                            term : request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                min_length: 3,
            });
             
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            jQuery('#date_d').datepicker({
                autoclose: true,
                format: "dd/mm/yyyy",
                todayHighlight: true
            });
        });
    </script>
@endpush