@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="/chatusers/store">
                    <div class="input-group mb-3 input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Username</span>
                        </div>
                        <input type="text" name="name" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2">About</span>
                        </div>
                        <input type="text" name="about" class="form-control" aria-label="About" aria-describedby="basic-addon2">
                    </div>

                    <div class="form-group">
                        <input type="file" name="avatar">
                    </div>
                    {{csrf_field()}}
                    <input type="submit" value="Chat Now!" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-6">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('status'))
                    <div class="alert alert-success">
                        <label class="label label-success">{{session('status')}}</label>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection