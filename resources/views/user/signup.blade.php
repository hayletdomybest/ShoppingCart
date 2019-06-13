@extends('layout.master')
@section('title')
使用者註冊
@endsection
@section('content')
    <div class='row justify-content-center'>
        <div class=" col-md-4 col-md-offset-4">
            <h1>使用者註冊</h1>
            <form action="{{route('user.signup')}}" method="POST">
                {{ csrf_field() }}
                <div class='form-group'>
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email" class='form-control'>
                </div>
                <div class='form-group'>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class='form-control'>
                </div>
                <div class='form-group'>
                    <input type="submit" value="註冊" class='btn btn-primary'>
                </div>
                @if(Session::has('errors'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('errors')->first('login')}}
                    </div>
                @endif
            </form>
        </div>
    </div>

@endsection