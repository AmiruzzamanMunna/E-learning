@extends('Layouts.admin-home')
@section('title')
    Registered User List
@endsection
@section('content')

<div class="container">
    
    <div class="card" style="margin-top: 10%">

        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Registered User</div>
                <div class="col-md-1 ml-auto">
                    @if (Session::has('useradd'))
                        <i onclick="openModal()" class="fas fa-plus"></i>
                    @endif
                    
                </div>
            </div>
        </div>
        <div class="card-body">

            <table class="table table-bordered table-responsive-md-sm-lg">
                <thead>
                    <thead>
                        <th>Sl No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact No.</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="showData">
                        
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">User Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="catname" id="name" class="form-control">   
                        
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="" id="image" class="form-control"> 
                <img height="200px" width="200px" alt="" id="src1">                  
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="catname" id="email" onfocusout="checkedEmail()" class="form-control">  
                <p id="pemailexist" style="color:red">This Email is already exist</p>                 
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="catname" id="address" class="form-control">                   
            </div>
            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" name="catname" id="phnnum" class="form-control">                   
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="catname" id="newpass" class="form-control">                   
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="insertUserList()">Save changes</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">User Update</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="catname" id="uname" class="form-control">   
                <input type="hidden" id="id" class="form-control">                 
                <input type="hidden" id="pass" class="form-control">                 
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="" id="uimage" class="form-control"> 
                <img height="200px" width="200px" alt="" id="src2">                  
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="catname" id="uemail" class="form-control" readonly>                   
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="catname" id="uaddress" class="form-control">                   
            </div>
            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" name="catname" id="uphnnum" class="form-control">                   
            </div>
            <div class="form-group">
                <label for="">Update Password</label>
                <input type="password" name="catname" id="upass" class="form-control">                   
            </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="editUserListUpdate()">Save changes</button>
        </div>
      </div>
    </div>
</div>

<script>

    
    $("#pemailexist").hide();

    function checkedEmail(){

        var email=$("#email").val();
        if(email==''){

            $("#pemailexist").hide();

        }else{

            $("#pemailexist").hide();

        }

    }

    

    $('#uimage').change(function (event) {

  	  var output = $("#src2")[0];
    	output.src = URL.createObjectURL(event.target.files[0]);
	});
    $('#image').change(function (event) {

  	  var output = $("#src1")[0];
    	output.src = URL.createObjectURL(event.target.files[0]);
	});

    $("#pcatname").hide();

    $(document).ready(function(){

        getUserList();

    });

    function getUserList(){


        $.ajax({

            type:"get",
            url:"{{route('admin.getUserList')}}",
            success:function(data){

                console.log(data);

                var html='';
                var exist='';

                for($i=0;$i<data.data.length;$i++){


                    html+='<tr>';
                    html+='<td>'+($i+1)+'</td>';
                    html+='<td>'+data.data[$i].signup_name+'</td>';
                    html+='<td>'+data.data[$i].signup_email+'</td>';
                    html+='<td>'+data.data[$i].signup_address+'</td>';
                    html+='<td>'+data.data[$i].signup_phonum+'</td>';
                    
                    
                    if(data.userEdit==4 && data.userDelete==5){

                        html+='<td><i class="fas fa-edit" onclick="editUserList('+data.data[$i].signup_id+')"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-trash" onclick="deleteUserList('+data.data[$i].signup_id+')"></i></td>';
                        
                    }else if(data.userEdit==4){

                        html+='<td><i class="fas fa-edit" onclick="editUserList('+data.data[$i].signup_id+')"></i>&nbsp;&nbsp;&nbsp;&nbsp;</td>';

                    }else if(data.userDelete==5){

                        html+='<td><i class="fas fa-trash" onclick="deleteUserList('+data.data[$i].signup_id+')"></i></td>';

                    }else {

                        html+='<td></td>';

                    }
                    
                    html+='</tr>';

                }
                
                $("#showData").html(html);
                $("#exist").html(exist);

            },
            error:function(error){
                console.log(error);
            }
        });


    }

    function openModal(){

        $("#exampleModalCenter").modal('show');
        var image = $('#image').val('');
        var name=$("#name").val('');
        var email=$("#email").val('');
        var address=$("#address").val('');
        var phnnum=$("#phnnum").val('');
        var pass=$("#newpass").val('');
        
    }
    function insertUserList(){

        var image = $('#image')[0].files[0];
        var name=$("#name").val();
        var email=$("#email").val();
        var address=$("#address").val();
        var phnnum=$("#phnnum").val();
        var pass=$("#newpass").val();
        

        var form_data=new FormData();
        form_data.append('image',image);
        form_data.append('name',name);
        form_data.append('email',email);
        form_data.append('address',address);
        form_data.append('phnnum',phnnum);
        form_data.append('pass',pass);
        form_data.append('upass',upass);
        form_data.append('id',id);

        $.ajax({

            type:"POST",
            url:"{{route('admin.insertUserList')}}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            processData:false,
            contentType:false,
            data:form_data,
            datatype:"json",

            success:function(data){

                console.log(data);

                if(data.status=='exist'){

                    $("#pemailexist").show();

                }else{

                    $("#exampleModalCenter").modal('hide');

                }

                $("#exampleModalCenter1").modal('hide');
                
                getUserList();

            },
            error:function(error){

                console.log(error);
            }

        });
    }
    function editUserList(id){


        $("#exampleModalCenter1").modal('show');
        $("#uimage").val('');
        $("#upass").val('');

        $.ajax({

            type:"get",
            url:"{{route('admin.editUserList')}}",
            data:{

                id:id
            },
            success:function(data){

                
                $("#src2").attr('src',data.image);
                $("#uname").val(data.data.signup_name);
                $("#uemail").val(data.data.signup_email);
                $("#uaddress").val(data.data.signup_address);
                $("#uphnnum").val(data.data.signup_phonum);
                $("#pass").val(data.data.signup_password);
                $("#id").val(id);


            },
            error:function(error){
                console.log(error);
            }
        });

    }
    function editUserListUpdate(){

        var image = $('#uimage')[0].files[0];
        var name=$("#uname").val();
        var email=$("#uemail").val();
        var address=$("#uaddress").val();
        var phnnum=$("#uphnnum").val();
        var pass=$("#pass").val();
        var upass=$("#upass").val();
        var id=$("#id").val();

        var form_data=new FormData();
        form_data.append('image',image);
        form_data.append('name',name);
        form_data.append('email',email);
        form_data.append('address',address);
        form_data.append('phnnum',phnnum);
        form_data.append('pass',pass);
        form_data.append('upass',upass);
        form_data.append('id',id);

        $.ajax({

            type:"POST",
            url:"{{route('admin.editUserListUpdate')}}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            processData:false,
            contentType:false,
            data:form_data,
            datatype:"json",
            
            success:function(data){

                console.log(data);

                $("#exampleModalCenter1").modal('hide');
                
                getUserList();

            },
            error:function(error){

                console.log(error);
            }

        });

    }
    function deleteUserList(id){

        $.ajax({

            type:"get",
            url:"{{route('admin.deleteUserList')}}",
            data:{

                id:id
            },
            success:function(data){

                getUserList();

            },
            error:function(error){
                console.log(error);
            }
        });
        
    }
  </script>

    
@endsection