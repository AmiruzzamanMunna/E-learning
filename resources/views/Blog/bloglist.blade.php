@extends('Layouts.admin-home')
@section('title')
    Blog List
@endsection
@section('content')

<div class="container">
    
    <div class="card" style="margin-top: 10%">

        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Blog</div>
                <div class="col-md-1 ml-auto">
                    {{-- @if (Session::has('moduleadd')) --}}
                        <a href="{{route('admin.blogAdd')}}"><i class="fas fa-plus"></i></a> 
                    {{-- @endif --}}
                    
                </div>
        </div>
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{Session('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card-body">

            <table class="table table-bordered table-responsive-md">
                <thead>
                    <thead>
                        <th>Sl No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Author Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($data as $key=>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><img src="{{asset('public/assets/Blog')}}/{{$item->blog_image}}" height="150px" width="100px" alt=""></td>
                                <td>{{$item->blog_title}}</td>
                                <td>{{$item->blog_blooger_name}}</td>
                                <td><a href="{{route('admin.blogEdit',$item->blog_id)}}"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="return confirm('Are You Sure!!')" href="{{route('admin.blogDelete',$item->blog_id)}}"><i class="fas fa-trash"></i></a></td>  
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
          <h5 class="modal-title" id="exampleModalLongTitle">Course Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="insertCourse()">Save changes</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Course Update</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="">Course Name</label>
                <input type="text" name="catname" id="ucoursename" class="form-control">   
                <input type="hidden" name="catname" id="id" class="form-control">   
                            
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="" id="uimage" class="form-control"> 
                <img height="200px" width="200px" alt="" id="usrc1">                  
            </div>
            <div class="form-group">
                <label for="">Sub-Category</label>
                <select class="form-control" id="usubCat">
                    
                </select> 
                               
            </div>
            <div class="form-group">
                <label for="">Author Name</label>
                <input type="text" name="catname" id="uauthorname" class="form-control">   
                          
            </div>
            <div class="form-group">
                <label for="">Credit Hour</label>
                <input type="text" name="catname" id="ucredithour" class="form-control">   
                         
            </div>
            <div class="form-group">
                <label for="">Course Description</label><br><br>
                <textarea name="" id="ucoursedescription" cols="48" rows="10"></textarea>  
                         
            </div>
            <div class="form-group">
                <label for="">Course Difficulty Level</label>
                <select name="" id="ulevel" class="form-control">        
            
                </select>  
                       
            </div>
            <div class="form-group">
                <label for="">Course Requirement</label><br><br>
                <textarea name="" id="ucourserequire" cols="48" rows="10"></textarea>              
            </div>
            <div class="form-group">
                <label for="">Course price</label>
                <input type="text" name="catname" id="ucourseprice" class="form-control">               
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="editCourseUpdate()">Save changes</button>
        </div>
      </div>
    </div>
</div>

<script>

$("#pcatname").hide();
$("#pcoursename").hide();
$("#pcat").hide();
$("#pauthname").hide();
$("#pcredit").hide();
$("#pdes").hide();
$("#plevel").hide();
$("#preq").hide();
$("#pprice").hide();

$('#uimage').change(function (event) {

    var output = $("#usrc1")[0];
    output.src = URL.createObjectURL(event.target.files[0]);
});
$('#image').change(function (event) {

    var output = $("#src1")[0];
    output.src = URL.createObjectURL(event.target.files[0]);
});

$(document).ready(function(){

    getCourseList();

});


</script>

    
@endsection