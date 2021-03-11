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
                        <h2 style="margin-top: 50px">Forget your Password</h2>
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
                        <form action="{{ route('forget.find') }}" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="email">Email *</label>
                                <input type="text" name="email">
                            </div>
                            <button type="submit" class="site-btn register-btn">Reset Password</button>
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
