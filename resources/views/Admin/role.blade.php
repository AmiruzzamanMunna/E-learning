@extends('Layouts.admin-home')
@section('title')
    Role
@endsection
@section('content')

<div class="container">
    
    <div class="card" style="margin-top: 10%">

        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Role</div>
                <div class="col-md-1 ml-auto">
                    @if (Session::has('roleadd'))
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
                        <th>Role Name</th>
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
          <h5 class="modal-title" id="exampleModalLongTitle">Role Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="">Role Name</label>
                <input type="text" name="catname" id="catname" class="form-control">   
                <p id="pcatname" style="color: red">This field is required</p>             
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="insertRole()">Save changes</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Role Update</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="catname" id="updatecatname" class="form-control">   
                <input type="hidden" id="id" class="form-control">   
                            
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="editRoleUpdate()">Save changes</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Permission</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <label for="" >Role Name : </label>
            <label for="" id="rolename">Role Name</label><br>
            <input type="hidden" id="roleId">

            <label for="">All Permission</label>


            
            <div id="accordion" class="accordingshow">
                
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="permissionStore()">Save changes</button>
        </div>
      </div>
    </div>
</div>

  <script>

    $("#pcatname").hide();

    $(document).ready(function(){

        getRoleList();

    });

    function getRoleList(){


        $.ajax({

            type:"get",
            url:"{{route('admin.getRoleList')}}",
            success:function(data){

                var html='';
                for($i=0;$i<data.data.length;$i++){


                    html+='<tr>';
                    html+='<td>'+($i+1)+'</td>';
                    html+='<td>'+data.data[$i].adminrole_name+'</td>';
                    if(data.roleedit==14 && data.roledelete==15 && data.roleper==16){

                        html+='<td><i class="fa fa-eye" onclick="permissionModal('+data.data[$i].adminrole_id+')" aria-hidden="true">&nbsp;&nbsp;&nbsp;&nbsp;</i><i class="fas fa-edit" onclick="editRole('+data.data[$i].adminrole_id+')"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-trash" onclick="deleteRole('+data.data[$i].adminrole_id+')"></i></td>';

                    }else if(data.roleper==16){

                        html+='<td><i class="fa fa-eye" onclick="permissionModal('+data.data[$i].adminrole_id+')" aria-hidden="true">&nbsp;&nbsp;&nbsp;&nbsp;</i></td>';

                    }else if(data.roleedit==14){

                        html+='<td><i class="fas fa-edit" onclick="editRole('+data.data[$i].adminrole_id+')"></i>&nbsp;&nbsp;&nbsp;&nbsp;</td>';

                    }else if(data.roledelete==15){

                        html+='<td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-trash" onclick="deleteRole('+data.data[$i].adminrole_id+')"></i></td>';

                    }else{

                        html+='<td></td>';

                    }
                    
                    html+='</tr>';
                    
                    
                }
                $("#showData").html(html);

            },
            error:function(error){
                console.log(error);
            }
        });


    }

    function openModal(){

        $("#exampleModalCenter").modal('show');
        $.ajax({

            type:"get",
            url:"{{route('admin.getSubCategory')}}",
            success:function(data){

                var html='';
                html+='<option value="0">Select</option>';
                for($i=0;$i<data.data.length;$i++){

                    html+='<option value="'+data.data[$i].course_category_id+'">'+data.data[$i].course_category_name+'</option>';
                }
                $("#subCat").html(html);

            },
            error:function(error){
                console.log(error);
            }
        });
    }
    function insertRole(){

        var catname=$("#catname").val();
        

        if(catname==''){

            $("#pcatname").show();
            return ;

        }else{

            $.ajax({

                type:"get",
                url:"{{route('admin.insertRole')}}",
                data:{

                    name:catname,
                    
                },
                success:function(data){

                    $("#exampleModalCenter").modal('hide');
                    var catname=$("#catname").val('');
                    var subCat=$("#subCat").val('');
                    getRoleList();

                },
                error:function(error){

                    console.log(error);
                }

            });


        }
    }
    function editRole(id){

        console.log(id);

        $("#exampleModalCenter1").modal('show');

        $.ajax({

            type:"get",
            url:"{{route('admin.editRole')}}",
            data:{

                id:id
            },
            success:function(data){

                

                $("#updatecatname").val(data.data.adminrole_name);
                $("#id").val(id);
                var html='';
                
                

            },
            error:function(error){
                console.log(error);
            }
        });

    }
    function editRoleUpdate(){

        var catname=$("#updatecatname").val();
        var id=$("#id").val();

        $.ajax({

            type:"get",
            url:"{{route('admin.editRoleUpdate')}}",
            data:{

                name:catname,
                id:id
            },
            success:function(data){

                console.log(data);

                $("#exampleModalCenter1").modal('hide');
                
                getRoleList();

            },
            error:function(error){

                console.log(error);
            }

        });

    }
    function deleteRole(id){

        $.ajax({

            type:"get",
            url:"{{route('admin.deleteRole')}}",
            data:{

                id:id
            },
            success:function(data){

                getRoleList();

            },
            error:function(error){
                console.log(error);
            }
        });
        
    }
    function permissionModal(id){

        console.log(id);

        $("#exampleModalCenter2").modal('show');

        $("#roleId").val(id);

        $.ajax({

            type:"get",
            url:"{{route('admin.rolePermission')}}",
            data:{
                id:id,
            },
            success:function(data){

                $("#rolename").html(data.data.adminrole_name);

                // console.log(data.rolePer);

                var html='';

                for($i=0;$i<data.permission.length;$i++){

                    html+='<div class="card">';
                    html+='<div class="card-header" id="headingOne">';
                    html+='<h5 class="mb-0">';
                    html+='<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne'+$i+'" aria-expanded="true" aria-controls="collapseOne">'+data.permission[$i].permission_name+'</button>';
                    html+='</h5>';
                    html+='</div>';

                    for($j=0;$j<data.subPermission.length;$j++){

                        

                        if(data.permission[$i].permission_id==data.subPermission[$j].permission_parent_id){


                            for($k=0;$k<data.rolePer.length;$k++){

                                if(data.rolePer[$k].role_permission_per_id==data.subPermission[$j].permission_id){

                                    var id=data.rolePer[$k].role_permission_per_id;
                                    
                                    html+='<div id="collapseOne'+$i+'" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">'; 
                                    html+='<div class="card-body"><input type="checkbox" name="updateper[]" id="updateper[]" value="'+data.subPermission[$j].permission_id+'" checked>'+data.subPermission[$j].permission_name; 
                                    html+='</div>'; 
                                    html+='</div>';
                                    
                                }
                                
                            }

                            if(id!=data.subPermission[$j].permission_id){

                                html+='<div id="collapseOne'+$i+'" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">'; 
                                html+='<div class="card-body"><input type="checkbox" name="per[]" id="per[]" value="'+data.subPermission[$j].permission_id+'">'+data.subPermission[$j].permission_name; 
                                html+='</div>'; 
                                html+='</div>';

                            }
                        
                        }
                    }
                    
                    html+='</div>'; 
                    
                    
                }

                $(".accordingshow").html(html);
                

            },
            error:function(error){

                console.log(error);
            }
        });

    }

    function permissionStore(){

        var roleId=$("#roleId").val();

        var permissionID = $("input[name='per[]']:checked").map(function(){return $(this).val();}).get();
        var updatePermissionUnCheck = $("input[name='updateper[]']:not(:checked)").map(function () {return $(this).val();}).get();
        
        

        if(permissionID.length>0 || updatePermissionUnCheck.length>0){

            $.ajax({

                type:"get",
                url:"{{route('admin.permissionStore')}}",
                data:{
                    roleId:roleId,
                    permissionid:permissionID,
                    updatePermissionUnCheck:updatePermissionUnCheck,
                },
                success:function(data){

                    if(data.status=='success'){

                        $("#exampleModalCenter2").modal('hide');
                        getRoleList();
                    }
                },
                error:function(error){

                    console.log(error);
                }
            });

        }else{

            alert('checkbox must be checked');

        }

        
    }
  </script>


    
@endsection