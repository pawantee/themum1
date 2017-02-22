@extends('layouts.app')
@section('content')
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-2x fa-user-md text-danger" aria-hidden="true"></i>
                        <strong class="text-danger">
                            เพิ่ม
                        </strong> 
                        <strong>
                            การฉีดวัคซีน
                        </strong>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" name="themum" method="POST" action="{{route('injectvaccines.update', ['no' => $injectvaccine->no])}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('kid_id') ? ' has-error' : '' }}">
                            <label for="kid_id" class="col-md-4 control-label">ชื่อเด็กที่ต้องวัคซีน</label>

                            <div class="col-md-6">
                                <input id="kid_id" type="text" class="form-control" name="kid_id" value="{{ $injectvaccine->kid_id }}">

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
                                <input id="vaccine_id" type="text" class="form-control" name="vaccine_id" value="{{ $injectvaccine->vaccine_id }}">

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
                                  <input id="date_d" name="date_d" type="text" class="form-control" placeholder="dd/mm/yyyy" value="{{ $injectvaccine->date_d }}" >
                                  <span class="input-group-addon bg-custom b-0 text-white">
                                    <i class="icon-calender"></i>
                                    <span class="icon-calendar"></span>
                                  </span>
                              </div>
                          </div>
                        </div>
                        

                        <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-sm-4 control-label">สถานะ</label>
                            <div class="col-sm-6">
                                
                                <select name="status" id="status" class="selectpicker form-control" data-actions-box="true" data-style="btn-white" tabindex="-98" title="เลือกสถานะ.">

                                    @foreach ($statused as $key => $statused)
                                        @if($statused->id === $injectvaccine->status)
                                        <option value="{{$statused->id}}" data-content="
                                            <span class='label label-primary'>
                                                {{$statused->name}}</span>" selected>{{$statused->name}}
                                        </option>
                                        @else 
                                            <option value="{{$statused->id}}" data-content="<span class='label label-primary'> {{$statused->name}}</span>">{{$statused->name}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                       {{--  <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">สถานะ</label>

                            <div class="col-md-6">
                                <input id="status" type="text" class="form-control" name="status" value="{{ $injectvaccine->status }}">

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}
                            
                        <input name="_method" type="hidden" value="PUT">

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
    <script src="{{ asset('js/datepicker.min.js')}}"></script>
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