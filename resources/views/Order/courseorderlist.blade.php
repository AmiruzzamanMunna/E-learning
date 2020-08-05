@extends('Layouts.admin-home')
@section('title')
    Course Order
@endsection
@section('content')

<div class="container">
    
    <div class="card" style="margin-top: 10%">

        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Order List</div>
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
                        <th>Course Name</th>
                        <th>User Name</th>
                        <th>Amount</th>
                        <th>Order Date</th>
                        <th>Course Activity</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($data as $key=>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->course_name}}</td>
                                <td>{{$item->signup_name}}</td>
                                <td>{{$item->order_amount}}</td>
                                <td>{{$item->order_date}}</td>
                                <td>
                                    @if ($item->order_status==0)
                                        <button class="btn btn-danger"><a style="color: white" href="{{route('admin.activeCourse',$item->order_id)}}">Deactive</a></button>
                                    @else
                                        <button class="btn btn-success"><a style="color: white" href="{{route('admin.deActiveCourse',$item->order_id)}}">Active</a></button>
                                    @endif
                                </td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="return confirm('Are You Sure!!')" href="{{route('admin.orderCourseDelete',$item->order_id)}}"><i class="fas fa-trash"></i></a></td>
                            </tr>
                        @endforeach
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


    


    $("#pcatname").hide();

    

    
  </script>

    
@endsection