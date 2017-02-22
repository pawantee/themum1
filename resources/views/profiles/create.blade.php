@extends('layouts.ssm') 
@section('title', 'profile') 
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-lg fa-id-card text-primary"></i>
                    <strong class="text-primary">
                        Upload
                    </strong>
                    <strong>
                        รูปภาพ
                    </strong>
                </div>
                <div class="panel-body">
                    <div href="javascript:;" class="center-block text-center text-dark">
                            <img src="{{asset ('uploads/defualt.png')}}" class="thumb-lg img-thumbnail img-circle" alt="">
                            <div class="h5 m-b-0">
                                <a href="{{route('profiles.create')}}" class="btn btn-primary btn-sm waves-effect">
                                    <i class="fa fa-upload"></i>
                                    <span>Upload</span>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>