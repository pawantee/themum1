@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
             <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="icon-magnifier text-primary"></i>
                    <strong>
                        สืบค้นข้อมูลฉีดวัคซีนเด็ก
                    </strong> 
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="GET" action="{{route('search')}}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}">
                            <label for="search" class="col-md-4 control-label">ชื่อ - นามสกุล เด็กที่ฉีดวัคซีน</label>

                            <div class="col-md-6">
                                <input id="search" type="search" class="form-control" name="search" value="{{ old('search') }}" required autofocus placeholder="ชื่อ - นามสกุล">

                                @if ($errors->has('search'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('search') }}</strong>
                                    </span>
                                @endif

                            </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-magnifier"></i>
                                    สืบค้น
                                </button>
                        </div>
                    </form>
                    <br>
                    <table class="table table-striped table-bordered table-hover table-condensed ">
                            <thead>
                                <tr>
                                    <th>ชื่อเด็กที่ต้องฉีดวัคซีน</th>
                                    <th>ชื่อวัคซีน</th>
                                    <th>วัน / เดือน / ปี</th>
                                    <th>สถานะ</th>
                                    <th>วันที่เพิ่ม</th>
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
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection()

