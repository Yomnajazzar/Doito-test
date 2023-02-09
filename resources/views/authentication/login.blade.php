@extends('layout.authentication')
@section('title', 'Login')


@section('content')

<div class="auth-main2 particles_js  ">
    <div class="auth_div vivify fadeInTop">
        <div class="card">
            <div class="body">
                <div class="login-img">
                    <img class="img-fluid" src="../assets/images/login-img.png" />
                </div>
                <div>
                    <h2 class="text-center text-dark">Welcome</h2>
                    <h4 class="text-center text-dark">Doito</h4>
                    <form class="form-auth-small" action="{{route('login')}}" method="POST">
                        @csrf
                        @method('POST');
                        <div class="mb-3">
                            <p class="lead">Login Page</p>
                        </div>
                        <div class="form-group">
                            <label for="signin-email" class="control-label sr-only">Email</label>
                            <input type="email" name="email" class="form-control round" id="signin-email" placeholder="Type your email" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="signin-password" class="control-label sr-only" >Password</label>
                            <input type="password" name="password" class="form-control round" id="signin-password"  placeholder="Password" autocomplete="off">
                        </div>
                        <div class="form-group clearfix">
                            <label class="fancy-checkbox element-left">
                                <input type="checkbox" name="remember_me">
                                <span>Remember me</span>
                            </label>
                        </div>
                        @error('password')
                            {{$errors}}
                        @enderror
                        <button type="submit" class="btn btn-primary btn-round btn-block">Login</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->
@stop

@section('page-styles')

@stop

@section('page-script')
@stop
