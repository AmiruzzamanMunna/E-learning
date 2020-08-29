@extends('Layouts.user-home')
@section('title')
    Sign Up
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
                <div class="col-md-8 col-lg-6">
                    <div class="ic-login-right">
                        <div class="ic-login-right-heading text-center">
                            <h2>Alliance <span>Academic</span></h2>
                            <p>Sign Up & Start Learning To Golden Futrue!</p>
                        </div>
                        <form id="validate">
                           
                            <div class="ic-form-field">
                                <div class="form-group ic-form-group">
                                    <input type="text" class="form-control" onfocusout="checkedName()" id="name" placeholder="User Full Name">
                                    <i class="icofont-user-alt-4"></i>
                                    <p id="pname" style="color:red">This field is required</p>
                                </div>
                                <div class="form-group ic-form-group">
                                    <input type="email" class="form-control" onfocusout="checkedEmail()" id="email" placeholder="Email Address">
                                    <i class="icofont-ui-email"></i>
                                    <p id="pemail" style="color:red">This field is required</p>
                                    <p id="pemailexist" style="color:red">This Email is already exist</p>
                                </div>
                                <div class="form-group ic-form-group">
                                    <input type="text" class="form-control" onfocusout="checkedAddress()" id="address" placeholder="Address">
                                    <i class="icofont-address-book"></i>
                                    <p id="paddress" style="color:red">This field is required</p>
                                </div>
                                <div class="form-group ic-form-group">
                                    <input type="text" class="form-control" onfocusout="checkedPhnnum()" id="phnnum" placeholder="Phone Number">
                                    <i class="icofont-phone"></i>
                                    <p id="pphnnum" style="color:red">This field is required</p>
                                </div>
                                <div class="form-group ic-form-group form-group-password">
                                    <input type="password" id="password" onfocusout="checkedPassword()" class="form-control" placeholder="Password">
                                    <i class="icofont-lock"></i>
                                    <p id="ppassword" style="color:red">This field is required</p>
                                </div>
                            </div>
                            <div class="ic-remember-forget">
                                    <div class="d-flex justify-content-between">
                                <div>
                                    <div class="ic-checkbox ic-login-checkbox">
                                        <input type="checkbox" id="checkbox" name="checkName" onclick="checkedVal()" value="1">
                                        <label for="checkbox"></label>
                                        <p>By signing up, you agree to our <a href="">Terms <span>&</span> Privacy Policy.</a> </p>
                                        <div id="checkId">
                                            
                                        </div>
                                    </div>
                                </div>
                             
                            </div>
                            </div>
                        
                            <div class="ic-login-btn">
                                <button type="button" onclick="signUp()">continue to log in</button>
                            </div>
                            <div class="ic-login-social text-center">
                                <p>Or Sign Up With</p>
                                <ul>
                                    <li><a href="{{route('user.facebook')}}"><i class="icofont-facebook"></i></a></li>
                                    <li><a href="{{route('user.twitter')}}"><i class="icofont-twitter"></i></a></li>
                                    <li><a href="{{route('user.linkedin')}}"><i class="icofont-linkedin"></i></a></li>
                                    <li><a href="{{route('user.instagram')}}"><i class="icofont-instagram"></i></a></li>
                                </ul>

                            </div>
                            <div class="ic-login-bottom text-center">
                                <p>Already have an account? <a href="{{route('user.login')}}">Login Here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    


    <!--Login Area End-->
@endsection
@section('js')

<script>

    $("#pname").hide();
    $("#pemail").hide();
    $("#paddress").hide();
    $("#pphnnum").hide();
    $("#ppassword").hide();
    $("#pemailexist").hide();

    function checkedName(){

        var name=$("#name").val();

        if(name==''){

            $("#pname").show();

        }else{

            $("#pname").hide();

        }

    }
    function checkedEmail(){

        var name=$("#email").val();

        if(name==''){

            $("#pemail").show();
            $("#pemailexist").hide();

        }else{

            $("#pemail").hide();
            $("#pemailexist").hide();

        }

    }
    function checkedAddress(){

        var name=$("#address").val();

        if(name==''){

            $("#paddress").show();

        }else{

            $("#paddress").hide();

        }

    }
    function checkedPhnnum(){

        var name=$("#phnnum").val();

        if(name==''){

            $("#pphnnum").show();

        }else{

            $("#pphnnum").hide();

        }

    }
    function checkedPassword(){

        var name=$("#password").val();

        if(name==''){

            $("#ppassword").show();

        }else{

            $("#ppassword").hide();

        }

    }


    


    function checkedVal(){

        $("#checkId").html('');
    }

    function signUp(){

        
        var checkbox=$("input[name='checkName']:checked").val();
        
        if(checkbox==1){

            

            var name=$("#name").val();
            var email=$("#email").val();
            var address=$("#address").val();
            var phnnum=$("#phnnum").val();
            var password=$("#password").val();

            if(name!=''&& email!='' && address!=''&& phnnum!='' && password!=''){

                $("#pname").hide();
                $("#pemail").hide();
                $("#paddress").hide();
                $("#pphnnum").hide();
                $("#ppassword").hide();

                $.ajax({

                    type:"get",
                    url:"{{route('user.signUpStore')}}",
                    data:{

                        name:name,
                        email:email,
                        address:address,
                        phnnum:phnnum,
                        password:password,

                    },
                    success:function(data){

                        if(data.status=='success'){

                            location.replace("{{route('user.login')}}");

                        }
                        if(data.status=='exist'){

                            $("#pemailexist").show();

                        }
                        
                    },
                    error:function(error){
                        console.log(error);
                    }
                });

            }else if(name=='' && email=='' && address=='' && phnnum=='' && password==''){

                $("#pname").show();
                $("#pemail").show();
                $("#paddress").show();
                $("#pphnnum").show();
                $("#ppassword").show();

            }else if(name==''){

                $("#pname").show();

            }else if(email==''){

                $("#pemail").show();

            }else if(address==''){

                $("#paddress").show();

            }else if(phnnum==''){

                $("#pphnnum").show();

            }else if(password==''){

                $("#ppassword").show();

            }else{

                return $("#pname").show();
                return $("#pemail").show();
                return $("#paddress").show();
                return $("#pphnnum").show();
                return $("#ppassword").show();

            }

            
        }else{

            var html='';
            html+='<p style="color:red">You need to check the Check box</p>';
            $("#checkId").html(html);
        }
        
    }
</script>
    
@endsection