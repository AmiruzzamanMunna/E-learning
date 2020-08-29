@extends('Layouts.admin-home')
@section('title')
    Login Page View
@endsection
@section('content')

<div class="container">
    
    <div class="card" style="margin-top: 10%">

        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Login Page Details</div>
                <div class="col-md-1 ml-auto">
                    @if (Session::has('loginadd'))
                    <a href="{{route('admin.loginPageAdd')}}"><i class="fas fa-plus"></i></a>
                    @endif
                    
                </div>
            </div>
        </div>
        <div class="card-body">

            <table class="table table-bordered table-responsive-md">
                <thead>
                    <thead>
                        <th>Sl No</th>
                        <th>Title</th>
                        <th>Logo</th>
                        <th>Image</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)

                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td width="30%">{{$item->admin_login_page_short_title}}</td>
                                <td><img src="{{asset('public/assets/admin/img')}}/{{$item->admin_login_page_image1}}" height="40%" width="auto" alt=""></td>
                                <td><img src="{{asset('public/assets/admin/img')}}/{{$item->admin_login_page_image2}}" height="10%" width="auto" alt=""></td>
                                <td>
                                    @if (Session::has('loginedit'))
                                        <a href="{{route('admin.loginPageEdit',$item->admin_login_page_id)}}"><i class="fas fa-edit"></i></a>
                                    @endif
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    @if (Session::has('logindelete'))
                                        @if ($loop->iteration==1)
                                            
                                        
                                        @else
                                            
                                            <a onclick="return confirm('Are You Sure!!')" href="{{route('admin.loginPageDelete',$item->admin_login_page_id)}}"><i class="fas fa-trash"></i></a>
                                        @endif
                                    @endif
                                    
                                    
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>



<script>

    
    $("#pemailexist").hide();
    $("#pname").hide();
    $("#prole").hide();
    $("#pemail").hide();
    $("#paddress").hide();
    $("#pphnnum").hide();
    $("#ppass").hide();

    function checkedEmail(){

        var email=$("#email").val();
        if(email==''){

            $("#pemailexist").hide();

        }else{

            $("#pemailexist").hide();

        }

    }

    

    $('#uimage').change(function (event) {

  	  var output = $("#usrc1")[0];
    	output.src = URL.createObjectURL(event.target.files[0]);
	});
    $('#image').change(function (event) {

  	  var output = $("#src1")[0];
    	output.src = URL.createObjectURL(event.target.files[0]);
	});

    $("#pcatname").hide();



  </script>

    
@endsection