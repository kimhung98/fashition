@extends('client.layouts.app')
@section('content')

    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{ route('page.home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Forget your Password</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3" style="background: #d3ffee;">
                    <div class="register-form">
                        <h2>Forget your Password</h2>
                        @if(session('notification'))
                            <div class="alert alert-success">
                                {{session('notification')}}
                            </div>
                        @endif
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('forget.update', $id) }}" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" name="password">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirm Password *</label>
                                <input type="password" name="passwordAgain">
                            </div>
                            <button type="submit" class="site-btn register-btn">Change your Password</button>
                        </form>
                        <div class="switch-login">
                            <a href="{{ route('page.login') }}" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
