@extends('layouts.app')
@push('css')
    <link href="{{ asset ('css/datepicker.min.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-lg fa-id-card text-danger"></i>
                    <strong class="text-danger">
                        แก้ไข
                    </strong>
                    <strong>
                        ประวัติเด็ก
                    </strong>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" name="themum" method="POST" action="{{route('kids.update', ['kid_id' => $kid->kid_id])}}">
                        {{ csrf_field() }}

                         <div class="form-group{{ $errors->has('name_kid') ? ' has-error' : '' }}">
                            <label for="name_kid" class="col-md-4 control-label">ชื่อ - นามสกุล</label>

                            <div class="col-md-6">
                                <input id="name_kid" type="text" class="form-control" name="name_kid" value="{{ $kid->name_kid }}">

                                @if ($errors->has('name_kid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name_kid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('card_kid') ? ' has-error' : '' }}">
                            <label for="card_kid" class="col-md-4 control-label">เลขบัตรประจำตัวประชาชน</label>

                            <div class="col-md-6">
                                <input id="card_kid" type="text" class="form-control" name="card_kid" value="{{ $kid->card_kid }}">

                                @if ($errors->has('card_kid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('card_kid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date_d') ? ' has-error' : '' }}">
                            <label for="date_d" class="col-md-4 control-label">วัน / เดือน / ปี เกิด</label>
                            <div class="col-sm-6">
                              <div class="input-group">
                                  <input id="date_d" name="date_d" type="text" class="form-control" placeholder="dd/mm/yyyy" value="{{ $kid->date_d }}" >
                                  <span class="input-group-addon bg-custom b-0 text-white">
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

                        <div class="form-group{{ $errors->has('blood_group') ? ' has-error' : '' }}">
                            <label for="blood_group" class="col-md-4 control-label">กรุ๊ปเลือด</label>

                            <div class="col-md-6">
                                <input id="blood_group" type="text" class="form-control" name="blood_group" value="{{ $kid->blood_group }}">

                                @if ($errors->has('blood_group'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('blood_group') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
                            <label for="weight" class="col-md-4 control-label">น้ำหนักแรกเกิด</label>

                            <div class="col-md-6">
                                <input id="weight" type="text" class="form-control" name="weight" value="{{ $kid->weight }}">

                                @if ($errors->has('weight'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('length') ? ' has-error' : '' }}">
                            <label for="length" class="col-md-4 control-label"> ความยาว</label>

                            <div class="col-md-6">
                                <input id="length" type="text" class="form-control" name="length" value="{{ $kid->length }}">

                                @if ($errors->has('length'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('length') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('head') ? ' has-error' : '' }}">
                            <label for="head" class="col-md-4 control-label">เส้นรอบศรีษะ</label>

                            <div class="col-md-6">
                                <input id="head" type="text" class="form-control" name="head" value="{{ $kid->head }}">

                                @if ($errors->has('head'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('head') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('anomaly') ? ' has-error' : '' }}">
                            <label for="anomaly" class="col-md-4 control-label">สุขภาพแรกเกิด</label>

                            <div class="col-md-6">
                                <input id="anomaly" type="text" class="form-control" name="anomaly" value="{{ $kid->anomaly }}">

                                @if ($errors->has('anomaly'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('anomaly') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('health') ? ' has-error' : '' }}">
                            <label for="health" class="col-md-4 control-label">ความผิดปกติแต่กำเนิด</label>

                            <div class="col-md-6">
                                <input id="health" type="text" class="form-control" name="health" value="{{ $kid->health }}">

                                @if ($errors->has('health'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('health') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mum_id') ? ' has-error' : '' }}">
                            <label for="mum_id" class="col-md-4 control-label">ชื่อ - นามสุกล มารดา</label>

                            <div class="col-md-6">
                                <input id="mum_id" type="text" class="form-control" name="mum_id" value="{{ $kid->mum_id }}">

                                @if ($errors->has('mum_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mum_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input name="_method" type="hidden" value="PUT">

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-sm btn-primary">
                                  <i class="fa fa-sm fa-save"></i>
                                  <strong> Save</strong>
                                </button>
                                <a class="btn btn-sm btn-danger btn-custom" href="{{route('kids.index')}}">
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
    <script src="{{ asset('js/jquery.min.js') }}"></script>
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