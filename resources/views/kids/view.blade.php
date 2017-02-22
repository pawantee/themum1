@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-lg fa-id-card text-warning"></i>
                    <strong class="text-warning">
                        แสดง
                    </strong>
                    <strong>
                        ข้อมูลเด็ก
                    </strong>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" name="themum" method="POST" action="#">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name_kid') ? ' has-error' : '' }}">
                            <label for="name_kid" class="col-md-4 control-label">...</label>

                            <div class="col-md-6">
                                <input id="name_kid" type="text" class="form-control" name="name_kid" value="{{ $kid->name_kid }}" readonly>

                                @if ($errors->has('name_kid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name_kid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('card_kid') ? ' has-error' : '' }}">
                            <label for="card_kid" class="col-md-4 control-label">เลขบัตรประจำตัวประชาชน </label>

                            <div class="col-md-6">
                                <input id="card_kid" type="text" class="form-control" name="card_kid" value="{{ $kid->card_kid }}" readonly>

                                @if ($errors->has('card_kid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('card_kid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date_d') ? ' has-error' : '' }}">
                            <label for="date_d" class="col-md-4 control-label">...</label>

                            <div class="col-md-6">
                                <input id="date_d" type="text" class="form-control" name="date_d" value="{{ $kid->date_d }}" readonly>

                                @if ($errors->has('date_d'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_d') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('blood_group') ? ' has-error' : '' }}">
                            <label for="blood_group" class="col-md-4 control-label">...</label>

                            <div class="col-md-6">
                                <input id="blood_group" type="text" class="form-control" name="blood_group" value="{{ $kid->blood_group }}" readonly>

                                @if ($errors->has('blood_group'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('blood_group') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
                            <label for="weight" class="col-md-4 control-label">...</label>

                            <div class="col-md-6">
                                <input id="weight" type="text" class="form-control" name="weight" value="{{ $kid->weight }}" readonly>

                                @if ($errors->has('weight'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('length') ? ' has-error' : '' }}">
                            <label for="length" class="col-md-4 control-label">...</label>

                            <div class="col-md-6">
                                <input id="length" type="text" class="form-control" name="length" value="{{ $kid->length }}" readonly>

                                @if ($errors->has('length'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('length') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('head') ? ' has-error' : '' }}">
                            <label for="head" class="col-md-4 control-label">...</label>

                            <div class="col-md-6">
                                <input id="head" type="text" class="form-control" name="head" value="{{ $kid->head }}" readonly>

                                @if ($errors->has('head'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('head') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('anomaly') ? ' has-error' : '' }}">
                            <label for="anomaly" class="col-md-4 control-label">...</label>

                            <div class="col-md-6">
                                <input id="anomaly" type="text" class="form-control" name="anomaly" value="{{ $kid->anomaly }}" readonly>

                                @if ($errors->has('anomaly'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('anomaly') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('health') ? ' has-error' : '' }}">
                            <label for="health" class="col-md-4 control-label">...</label>

                            <div class="col-md-6">
                                <input id="health" type="text" class="form-control" name="health" value="{{ $kid->health }}" readonly>

                                @if ($errors->has('health'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('health') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mum_id') ? ' has-error' : '' }}">
                            <label for="mum_id" class="col-md-4 control-label">...</label>

                            <div class="col-md-6">
                                <input id="mum_id" type="text" class="form-control" name="mum_id" value="{{ $kid->mum_id }}" readonly>

                                @if ($errors->has('mum_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mum_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <a href="{{route('kids.edit', ['kid_id' => $kid->kid_id])}}" class="btn btn-sm btn-primary">
                                 <span aria-hidden="true" class="fa  fa-gear (alias)"></span>
                                  <strong> Edit</strong>
                                </a>
                                <a class="btn btn-sm btn-danger btn-custom" href="{{route('kids.index')}}">
                                    <i class="fa fa-lg fa-chevron-circle-left"></i>
                                    <strong> Back </strong>
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
