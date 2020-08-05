@extends('Layouts.admin-home')
@section('title')
    Registered Admin List
@endsection
@section('content')

<div class="container">
    
    <div class="card" style="margin-top: 10%">

        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Registered Admin</div>
                <div class="col-md-1 ml-auto">
                    @if (Session::has('adminadd'))
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
          <h5 class="modal-title" id="exampleModalLongTitle">Admin Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="catname" id="name" class="form-control">   
                <p id="pname" style="color:red">This  field is required</p> 
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="" id="image" class="form-control"> 
                <img height="200px" width="200px" alt="" id="src1">                  
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="catname" id="email" onfocusout="checkedEmail()" class="form-control">  
                <p id="pemail" style="color:red">This  field is required</p>                 
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <select name="" id="roleid" class="form-control">
                </select>  
                <p id="prole" style="color:red">This  field is required</p>                 
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="catname" id="address" class="form-control">  
                <p id="paddress" style="color:red">This  field is required</p>                 
            </div>
            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" name="catname" id="phnnum" class="form-control"> 
                <p id="pphnnum" style="color:red">This  field is required</p>                  
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="catname" id="newpass" class="form-control">   
                <p id="ppass" style="color:red">This  field is required</p>                
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="insertAdminList()">Save changes</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Admin Update</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="catname" id="uname" class="form-control">   
                <input type="hidden" name="catname" id="uid" class="form-control">   
                <input type="hidden" name="catname" id="pass" class="form-control">   
                
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="" id="uimage" class="form-control"> 
                <img height="200px" width="200px" alt="" id="usrc1">                  
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="catname" id="uemail" onfocusout="checkedEmail()" class="form-control" disabled>                  
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <select name="" id="uroleid" class="form-control">
                </select>  
                                
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
                <label for="">Password</label>
                <input type="password" name="catname" id="unewpass" class="form-control">   
               
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="editAdminListUpdate()">Save changes</button>
        </div>
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

    $(document).ready(function(){

        getAdminList();

    });

    function getAdminList(){


        $.ajax({

            type:"get",
            url:"{{route('admin.getAdminList')}}",
            success:function(data){

                var html='';

                for($i=0;$i<data.data.length;$i++){


                    html+='<tr>';
                    html+='<td>'+($i+1)+'</td>';
                    html+='<td>'+data.data[$i].admin_name+'</td>';
                    html+='<td>'+data.data[$i].admin_email+'</td>';
                    html+='<td>'+data.data[$i].admin_address+'</td>';
                    html+='<td>'+data.data[$i].admin_contactno+'</td>';
                    if(data.adminedit==25 && data.admindelete==26){

                        html+='<td><i class="fas fa-edit" onclick="editAdminList('+data.data[$i].admin_id+')"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-trash" onclick="deleteAdminList('+data.data[$i].admin_id+')"></i></td>';
                    }else if(data.adminedit==25){

                        html+='<td><i class="fas fa-edit" onclick="editAdminList('+data.data[$i].admin_id+')"></i>&nbsp;&nbsp;&nbsp;&nbsp;</td>';

                    }else if(data.admindelete==26){

                        html+='<td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-trash" onclick="deleteAdminList('+data.data[$i].admin_id+')"></i></td>';

                    }else {

                        html+='<td></td>';
                    }
                    
                    html+='</tr>';

                }

                var html2='<option value="0">Select</option>';

                for($i=0;$i<data.role.length;$i++){

                    html2+='<option value="'+data.role[$i].adminrole_id+'">'+data.role[$i].adminrole_name+'</option>';

                }
                $("#showData").html(html);
                $("#roleid").html(html2);

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

    function insertAdminList(){

        var image = $('#image')[0].files[0];
        var name=$("#name").val();
        var email=$("#email").val();
        var address=$("#address").val();
        var phnnum=$("#phnnum").val();
        var pass=$("#newpass").val();
        var role=$("#roleid").val();

        

        if(name=='' && email=='' && address=='' && phnnum=='' && pass=='' && role=='0'){

            $("#pname").show();
            $("#pemail").show();
            $("#paddress").show();
            $("#pphnnum").show();
            $("#ppass").show();
            $("#prole").show();
            

        }else if(email=='' && address=='' && phnnum=='' && pass==''){

            
            $("#pemail").show();
            $("#paddress").show();
            $("#pphnnum").show();
            $("#ppass").show();

        }else if(address=='' && phnnum=='' && pass==''){

            
            $("#paddress").show();
            $("#pphnnum").show();
            $("#ppass").show();

        }else if(phnnum=='' && pass==''){

            
            $("#pphnnum").show();
            $("#ppass").show();

        }else if(name=='' && email==''){

            $("#pname").show();
            $("#pemail").show();
            

        }else if(name=='' &&  address=='' && phnnum=='' && pass==''){

            $("#pname").show();
            $("#paddress").show();
            $("#pphnnum").show();
            $("#ppass").show();

        }else if(name=='' &&  phnnum=='' && pass==''){

            $("#pname").show();
            $("#pphnnum").show();
            $("#ppass").show();

        }else if(name=='' && pass==''){

            $("#pname").show();
            $("#ppass").show();

        }else if(email=='' && phnnum=='' && pass==''){

           
            $("#pemail").show();
            $("#pphnnum").show();
            $("#ppass").show();

        }else if(email=='' && pass==''){

            $("#pemail").show();
            $("#ppass").show();

        }else if(address=='' && pass==''){

            $("#paddress").show();
            $("#ppass").show();

        }else if(name=='' &&  address==''){

            $("#pname").show();
            $("#paddress").show();

        }else if(name=='' &&  phnnum==''){

            $("#pname").show();
            
            $("#pphnnum").show();
    

        }else if(email=='' && address==''){

            
            $("#pemail").show();
            $("#paddress").show();

        }else if(email=='' && phnnum==''){

            
            $("#pemail").show();
            $("#pphnnum").show();

        }else if(address=='' && pass==''){

            $("#paddress").show();
            $("#ppass").show();

        }else if(name!='' && email!='' && address!='' && phnnum!='' && pass!='' && role!='0'){

            var form_data=new FormData();
            form_data.append('image',image);
            form_data.append('name',name);
            form_data.append('role',role);
            form_data.append('email',email);
            form_data.append('address',address);
            form_data.append('phnnum',phnnum);
            form_data.append('pass',pass);

            $.ajax({

                type:"POST",
                url:"{{route('admin.insertAdminList')}}",
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
                    
                    getAdminList();

                },
                error:function(error){

                    console.log(error);
                }

            });

        }else {

            $("#pname").show();
            $("#pemail").show();
            $("#paddress").show();
            $("#pphnnum").show();
            $("#ppass").show();

        }
        

        
    }
    function editAdminList(id){


        $("#exampleModalCenter1").modal('show');
        $("#uimage").val('');
        $("#upass").val('');

        $.ajax({

            type:"get",
            url:"{{route('admin.editAdminList')}}",
            data:{

                id:id
            },
            success:function(data){

                
                $("#usrc1").attr('src',data.image);
                $("#uname").val(data.data.admin_name);
                $("#uemail").val(data.data.admin_email);
                $("#uaddress").val(data.data.admin_address);
                $("#uphnnum").val(data.data.admin_contactno);
                $("#pass").val(data.data.admin_password);
                $("#uid").val(id);
                var html2='<option value="0">Select</option>';

                for($i=0;$i<data.role.length;$i++){

                    if(data.data.admin_role_id==data.role[$i].adminrole_id){

                        html2+='<option value="'+data.role[$i].adminrole_id+'" selected>'+data.role[$i].adminrole_name+'</option>';

                    }else{

                        html2+='<option value="'+data.role[$i].adminrole_id+'">'+data.role[$i].adminrole_name+'</option>';
                    }

                    

                }

                $("#uroleid").html(html2);


            },
            error:function(error){
                console.log(error);
            }
        });

    }
    function editAdminListUpdate(){

        var image = $('#uimage')[0].files[0];
        var name=$("#uname").val();
        var email=$("#uemail").val();
        var address=$("#uaddress").val();
        var phnnum=$("#uphnnum").val();
        var pass=$("#pass").val();
        var upass=$("#unewpass").val();
        var id=$("#uid").val();
        var roleid=$("#uroleid").val();

        var form_data=new FormData();
        form_data.append('image',image);
        form_data.append('name',name);
        form_data.append('email',email);
        form_data.append('address',address);
        form_data.append('phnnum',phnnum);
        form_data.append('pass',pass);
        form_data.append('upass',upass);
        form_data.append('id',id);
        form_data.append('roleid',roleid);

        $.ajax({

            type:"POST",
            url:"{{route('admin.editAdminListUpdate')}}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            processData:false,
            contentType:false,
            data:form_data,
            datatype:"json",
            
            success:function(data){

                console.log(data);

                $("#exampleModalCenter1").modal('hide');
                
                getAdminList();

            },
            error:function(error){

                console.log(error);
            }

        });

    }
    function deleteAdminList(id){

        $.ajax({

            type:"get",
            url:"{{route('admin.deleteAdminList')}}",
            data:{

                id:id
            },
            success:function(data){

                getAdminList();

            },
            error:function(error){
                console.log(error);
            }
        });
        
    }
  </script>

    
@endsection