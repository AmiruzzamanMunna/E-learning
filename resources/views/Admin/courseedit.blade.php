@extends('Layouts.admin-home')
@section('title')
    Course Edit
@endsection
@section('content')

<div class="container">
    
    <div class="card" style="margin-top: 10%">

        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Course</div>
                <div class="col-md-1 ml-auto">
                   
                    
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="">Course Name</label>
                <input type="text" name="catname" id="ucoursename" value="{{$data->course_name}}" class="form-control">   
                <input type="hidden" name="catname" id="id" value="{{$data->course_id}}" class="form-control">   
                            
            </div>
            <div class="form-group">
                <label for="">Course Short Title</label>
                <input type="text" name="coursetitle" id="coursetitle" value="{{$data->course_short_title}}" class="form-control">   
                            
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="" id="uimage" class="form-control"> 
                @if ($data->course_image)
                <img height="200px" width="200px" src="{{asset('assets/images/Course')}}/{{$data->course_image}}" alt="" id="usrc1">  
                @else
                <img height="200px" width="200px" alt="" id="usrc1">  
                @endif
                                
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
                <label for="">Free course</label><br><br>
                <select name="" class="form-control" id="freecourse">
                    @if ($data->course_free_course==1)
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
                    @else 
                    <option value="0" selected>No</option>
                    <option value="1">Yes</option>
                    @endif
                    
                </select>             
            </div>
            <div class="form-group">
                <label for="">Course Introductory Video</label>
                <input type="file" name="catname" id="ucoursevideo" class="form-control"> 
                @if ($data->course_video)
                <video width="320" height="240" controls>
                    <source src="{{asset('assets/images/Course')}}/{{$data->course_video}}" type="video/mp4">
                </video>   
                @endif
                           
            </div>
            <div class="form-group">
                <label for="">Course price</label>
                <input type="text" name="catname" id="ucourseprice" class="form-control">               
            </div>
            <div class="form-group">
                <label for="">Coupon</label><br><br>
                <select name="" class="form-control" id="couponid">
                    <option value="0">Select</option>
                    @foreach ($coupon as $item)
                        @if ($data->course_coupon_id==$item->coupon_id)
                            <option value="{{$item->coupon_id}}" selected>{{$item->coupon_name}}</option>
                            
                        @else 
                        <option value="{{$item->coupon_id}}">{{$item->coupon_name}}</option>
                        @endif
                    @endforeach
      
                    
                </select>             
            </div>
            <div class="form-group">
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
    
        
        editCourse();
    
    });
    
    
    function editCourse(){
    
        
        var id=$("#id").val();
        console.log(id);
        
        var image = $('#uimage').val('');
    
        $.ajax({
    
            type:"get",
            url:"{{route('admin.editCourse')}}",
            data:{
    
                id:id
            },
            success:function(data){

                console.log(data);
    
                var coursename=$("#ucoursename").val(data.data.course_name);
                $("#usrc1").attr('src',data.image);
                
                var subCat=$("#usubCat").val();
                var authorname=$("#uauthorname").val(data.data.course_authorname);
                var credithour=$("#ucredithour").val(data.data.course_credithour);
                var coursedescription=$("#ucoursedescription").val(data.data.course_description);
                var level=$("#ulevel").val();
                var courserequire=$("#ucourserequire").val(data.data.course_requirement);
                var courseprice=$("#ucourseprice").val(data.data.course_price);
            
                $("#id").val(id);
                
                var html='';
                html+='<option value="0">Select</option>';
                for($i=0;$i<data.category.length;$i++){
    
                    if(data.data.course_category_id==data.category[$i].course_category_id){
                        html+='<option value="'+data.category[$i].course_category_id+'" selected>'+data.category[$i].course_category_name+'</option>';
                    }else{
    
                        html+='<option value="'+data.category[$i].course_category_id+'">'+data.category[$i].course_category_name+'</option>';
                    }                 
    
                    for($j=0;$j<data.subCategory.length;$j++){
    
                        if(data.category[$i].course_category_id==data.subCategory[$j].course_category_parent_id){
    
                            if(data.data.course_category_id==data.subCategory[$j].course_category_id){
    
                                html+='<option value="'+data.subCategory[$j].course_category_id+'" selected>'+data.category[$i].course_category_name+'->'+data.subCategory[$j].course_category_name+'</option>';
    
                            }else{
    
                                html+='<option value="'+data.subCategory[$j].course_category_id+'">'+data.category[$i].course_category_name+'->'+data.subCategory[$j].course_category_name+'</option>';
    
                            }
    
    
                        }
    
                        
                    }
                }
                var level='';
                level+='<option value="0">Select</option>';
    
                for($k=0;$k<data.level.length;$k++){
    
                    if(data.data.course_defficultylevel==data.level[$k].difficulty_level_id){
    
                        level+='<option value="'+data.level[$k].difficulty_level_id+'" selected>'+data.level[$k].difficulty_level_name+'</option>';
    
                    }else{
    
                        level+='<option value="'+data.level[$k].difficulty_level_id+'">'+data.level[$k].difficulty_level_name+'</option>';
    
                    }
    
                    
                }
                $("#ulevel").html(level);
                $("#usubCat").html(html);
    
            },
            error:function(error){
                console.log(error);
            }
        });
    
    }
    function editCourseUpdate(){
    
        var coursename=$("#ucoursename").val();
        var coursetitle=$("#coursetitle").val();
        var image = $('#uimage')[0].files[0];
        var ucoursevideo = $('#ucoursevideo')[0].files[0];
        var subCat=$("#usubCat").val();
        var freecourse=$("#freecourse").val();
        var authorname=$("#uauthorname").val();
        var credithour=$("#ucredithour").val();
        var coursedescription=$("#ucoursedescription").val();
        var level=$("#ulevel").val();
        var courserequire=$("#ucourserequire").val();
        var courseprice=$("#ucourseprice").val();
        var id=$("#id").val();
        var couponid=$("#couponid").val();
    
        var form_data=new FormData();
        form_data.append('id',id);
        form_data.append('coursename',coursename);
        form_data.append('coursetitle',coursetitle);
        form_data.append('image',image);
        form_data.append('subCat',subCat);
        form_data.append('freecourse',freecourse);
        form_data.append('coursevideo',ucoursevideo);
        form_data.append('authorname',authorname);
        form_data.append('credithour',credithour);
        form_data.append('coursedescription',coursedescription);
        form_data.append('level',level);
        form_data.append('courserequire',courserequire);
        form_data.append('courseprice',courseprice);
        form_data.append('couponid',couponid);
    
        $.ajax({
    
            type:"post",
            url:"{{route('admin.editCourseUpdate')}}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            processData:false,
            contentType:false,
            data:form_data,
            datatype:"json",
            success:function(data){
    
                console.log(data);
    
                location.replace("{{route('admin.courseListIndex')}}");
                
                
    
            },
            error:function(error){
    
                console.log(error);
            }
    
        });
    
    }
    function deleteCourse(id){
    
        $.ajax({
    
            type:"get",
            url:"{{route('admin.deleteCourse')}}",
            data:{
    
                id:id
            },
            success:function(data){
    
                
    
            },
            error:function(error){
                console.log(error);
            }
        });
        
    }
    </script>

    
@endsection