@extends('Layouts.admin-home')
@section('title')
    login
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6 mr-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" onfocusout="emailCheck()" class="form-control" id="email">
                            <p id="pemail" style="color: red">This field is required</p>

                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" onfocusout="passCheck()" class="form-control" id="pass">
                            <p id="ppass" style="color: red">This field is required</p>
                        </div>
                        <div class="form-group" id="error">

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 ml-auto">
                                        <button class="btn btn-success" onclick="loginAdminCheck()">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $("#pemail").hide();
    $("#ppass").hide();

    function emailCheck(){

        var email=$("#email").val();

        if(email==''){

            $("#pemail").show();

        }else{

            $("#pemail").hide();

        }
    }
    function passCheck(){

        var pass=$("#pass").val();

        if(pass==''){

            $("#ppass").show();

        }else{

            $("#ppass").hide();

        }
    }

    function loginAdminCheck(){

        var email=$("#email").val();
        var pass=$("#pass").val();
        if(email=='' && pass==''){

            $("#pemail").show();
            $("#ppass").show();

        }else{

            $.ajax({

                type:"get",
                url:"{{route('admin.loginAdminCheck')}}",
                data:{

                    email:email,
                    pass:pass,

                },
                success:function(data){

                    console.log(data);

                    if(data.status=='success'){

                        location.replace("{{route('admin.index')}}");
                    }

                    if(data.status=='error'){

                        $("#error").html('<p style="color:red">Invalid Login Information</p>');
                        return ;

                    }

                },
                error:function(error){

                    console.log(error);
                }
            });

        }
    }
</script>
@endsection