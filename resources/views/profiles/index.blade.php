@extends('layouts.app') 
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
                    <center>
                        <img src="{{asset('uploads/'. $users->images)}}" alt="images" class="img-responsive img-circle" width="100">
                        <h4>
                            <strong class="text-warning">
                                Name : {{$users->name}}
                            </strong>
                        </h4>
                        <form action="{{route('upload')}}" enctype="multipart/form-data" method="POST">
                             {{ csrf_field() }}
                             <center>
                                <input type="file" name="images">
                                <br />
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-picture"></i>
                                    Upload
                                </button>
                             </center>
                        </form>
                        <br />
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

