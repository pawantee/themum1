@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-lg fa-address-book text-success"></i>
                    <strong class="text-success">
                        เพิ่ม                    
                    </strong>
                    <strong>
                        ประวัติหญิงตั้งครรภ์
                    </strong>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" name="themum" method="POST" action="{{route('mums.store')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name_mum') ? ' has-error' : '' }}">
                            <label for="name_mum" class="col-md-4 control-label">ชื่อ - นามสกุล มารดา</label>

                            <div class="col-md-6">
                                <input id="name_mum" type="text" class="form-control" name="name_mum" value="{{ old('name_mum') }}">

                                @if ($errors->has('name_mum'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name_mum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('crad') ? ' has-error' : '' }}">
                            <label for="crad" class="col-md-4 control-label">เลขบัตรประจำตัวประชาชน มารดา</label>

                            <div class="col-md-6">
                                <input id="crad" type="text" class="form-control" name="crad" value="{{ old('crad') }}">

                                @if ($errors->has('crad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('crad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('profession_mum') ? ' has-error' : '' }}">
                            <label for="profession_mum" class="col-md-4 control-label">อาชีพ มารดา</label>

                            <div class="col-md-6">
                                <input id="profession_mum" type="text" class="form-control" name="profession_mum" value="{{ old('profession_mum') }}">

                                @if ($errors->has('profession_mum'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profession_mum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('religion_mum') ? ' has-error' : '' }}">
                            <label for="religion_mum" class="col-md-4 control-label">ศาสนา มารดา</label>

                            <div class="col-md-6">
                                <input id="religion_mum" type="text" class="form-control" name="religion_mum" value="{{ old('religion_mum') }}">

                                @if ($errors->has('religion_mum'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('religion_mum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('study_mum') ? ' has-error' : '' }}">
                            <label for="study_mum" class="col-md-4 control-label">การศึกษาสูงสุด มารดา</label>

                            <div class="col-md-6">
                                <input id="study_mum" type="text" class="form-control" name="study_mum" value="{{ old('study_mum') }}">

                                @if ($errors->has('study_mum'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('study_mum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tel_mum') ? ' has-error' : '' }}">
                            <label for="tel_mum" class="col-md-4 control-label">เบอร์โทร มารดา</label>

                            <div class="col-md-6">
                                <input id="tel_mum" type="text" class="form-control" name="tel_mum" value="{{ old('tel_mum') }}">

                                @if ($errors->has('tel_mum'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tel_mum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name_fathter') ? ' has-error' : '' }}">
                            <label for="name_fathter" class="col-md-4 control-label">ชื่อ - นามสกุล บิดา</label>

                            <div class="col-md-6">
                                <input id="name_fathter" type="text" class="form-control" name="name_fathter" value="{{ old('name_fathter') }}">

                                @if ($errors->has('name_fathter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name_fathter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('crad_father') ? ' has-error' : '' }}">
                            <label for="crad_father" class="col-md-4 control-label">เลขบัตรประจำตัวประชาชน บิดา</label>

                            <div class="col-md-6">
                                <input id="crad_father" type="text" class="form-control" name="crad_father" value="{{ old('crad_father') }}">

                                @if ($errors->has('crad_father'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('crad_father') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('profession_fathter') ? ' has-error' : '' }}">
                            <label for="profession_fathter" class="col-md-4 control-label">อาชีพ บิดา</label>

                            <div class="col-md-6">
                                <input id="profession_fathter" type="text" class="form-control" name="profession_fathter" value="{{ old('profession_fathter') }}">

                                @if ($errors->has('profession_fathter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profession_fathter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('religion_fathter') ? ' has-error' : '' }}">
                            <label for="religion_fathter" class="col-md-4 control-label">ศาสนา บิดา</label>

                            <div class="col-md-6">
                                <input id="religion_fathter" type="text" class="form-control" name="religion_fathter" value="{{ old('religion_fathter') }}">

                                @if ($errors->has('religion_fathter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('religion_fathter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('study_fathter') ? ' has-error' : '' }}">
                            <label for="study_fathter" class="col-md-4 control-label">การศึกษาสูงสุด บิดา</label>

                            <div class="col-md-6">
                                <input id="study_fathter" type="text" class="form-control" name="study_fathter" value="{{ old('study_fathter') }}">

                                @if ($errors->has('study_fathter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('study_fathter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tel_fathter') ? ' has-error' : '' }}">
                            <label for="tel_fathter" class="col-md-4 control-label">เบอร์โทร บิดา</label>

                            <div class="col-md-6">
                                <input id="tel_fathter" type="text" class="form-control" name="tel_fathter" value="{{ old('tel_fathter') }}">

                                @if ($errors->has('tel_fathter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tel_fathter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">ที่อยู่</label>

                            <div class="col-md-6">
                                <textarea id="address" type="text" class="form-control"     name="address" value="{{ old('address') }}">
                                </textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('zipcod') ? ' has-error' : '' }}">
                            <label for="zipcod" class="col-md-4 control-label">รหัสไปรษณีย์</label>

                            <div class="col-md-6">
                                <input id="zipcod" type="text" class="form-control" name="zipcod" value="{{ old('zipcod') }}">

                                @if ($errors->has('zipcod'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zipcod') }}</strong>
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
                                <a class="btn btn-sm btn-danger btn-custom" href="{{route('mums.index')}}">
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
