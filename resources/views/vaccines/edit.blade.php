@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                     <i class="fa fa-lg fa-flask text-danger" aria-hidden="true"></i>
                    <strong class="text-danger">
                        แก้ไข                    
                    </strong>
                    <strong>
                        วัคซีนเด็ก
                    </strong>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" name="themum" method="POST" action="{{route('vaccines.update', ['vaccine_id' => $vaccines->vaccine_id])}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">ชื่อวัคซีน</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $vaccines->name }}">


                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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
                                <a class="btn btn-sm btn-danger btn-custom" href="{{route('vaccines.index')}}">
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