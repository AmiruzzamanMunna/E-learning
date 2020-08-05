@extends('Layouts.user-home')
@section('title')
    Login
@endsection
@section('container')
    <!--Login Area Start-->

    <section class="ic-login-area">
        <div class="container">
            <div class="row">

                <div class="col-md-3">
                    <div class="ic-login-left">
                        <img src="assets/images/login.png" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-md-8 col-lg-6 ">
                    <div class="ic-login-right">
                        <div class="ic-login-right-heading text-center">
                            <h2>Alliance <span>Academic</span></h2>
                            <p>Just Login To Continue To Learn</p>
                        </div>
                        <form method="post">

                            @csrf
                           
                            <div class="ic-form-field">
                                <div class="form-group ic-form-group">
                                    <input type="email" class="form-control" name="email" placeholder="User Name or Email Address">
                                    <i class="icofont-user-alt-4"></i>
                                </div>
                                <div class="form-group ic-form-group form-group-password">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <i class="icofont-lock"></i>
                                </div>
                                <div class="form-group ic-form-group form-group-password">

                                    @if(session('message'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Sorry!</strong> {{session('message')}}.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>

                            </div>
                            <div class="ic-remember-forget">
                                    <div class="d-flex justify-content-between">
                                <div>
                                    <div class="ic-checkbox ic-login-checkbox">
                                        <input type="checkbox" id="checkbox">
                                        <label for="checkbox"></label>
                                        <p>Remember Me</p>
                                    </div>
                                </div>
                                <div class="ic-forget-password">
                                    <a href="#">Forget Password</a>
                                </div>
                            </div>
                            </div>
                        
                            <div class="ic-login-btn">
                                <button type="submit">continue to log in</button>
                            </div>
                            <div class="ic-login-social text-center">
                                <p>Or Log in With</p>
                                <ul>
                                    <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                    <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                    <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                                    <li><a href="#"><i class="icofont-instagram"></i></a></li>
                                </ul>

                            </div>
                            <div class="ic-login-bottom text-center">
                                <p>Don't have an account? <a href="{{route('user.signUp')}}">Join With Us</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Login Area End-->
@endsection