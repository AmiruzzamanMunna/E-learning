@extends('Layouts.admin-home')
@section('title')
    Module Add
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

            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Module Name</label>
                    <input type="text" name="module_name" value="{{old('module_name')}}" id="contentname" class="form-control">   
                               
                </div>
    
                <div class="form-group">
                    <label for="">Short Discription</label><br><br><br>
                    <textarea name="description" value="" cols="48" rows="10">{{old('description')}}</textarea>  
                                 
                </div>
                <div class="form-group">
                    <label for="">File</label>
                    <input type="file" class="form-control" name="file">               
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save changes</button>            
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>

<!-- Modal -->



<script>

    $("#pcatname").hide();
    $("#pcoursename").hide();
    $("#pdescription").hide();
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
    
        
        openModal();
    
    });
    
    function openModal(){

        $("#exampleModalCenter").modal('show');
        $.ajax({

            type:"get",
            url:"{{route('admin.getCourseList')}}",
            success:function(data){

                console.log(data);

                var html='';
                html+='<option value="0">Select</option>';
                for($i=0;$i<data.data.length;$i++){

                    html+='<option value="'+data.data[$i].course_id+'">'+data.data[$i].course_name+'</option>';

                    
                }
                
            
                $("#courseid").html(html);

            },
            error:function(error){
                console.log(error);
            }
        });
    }
    function insertCourseContent(){

        
        var contentname=$("#contentname").val();
        var courseid=$("#courseid").val();
        var description=$("#description").val();



        if(contentname=='' && courseid=='0' && description==''){

            $("#pcoursename").show();
            $("#pcat").show();
            $("#pdescription").show();

        }
        else if(courseid=='0'){

            
            $("#pcat").show();
        }
        else if(description==''){

            
            $("#pdescription").show();
        }
        else if(contentname==''){

            $("#pcoursename").show();
            
        }else if(contentname!='' && courseid!='0' && description!=''){

            $.ajax({

                type:"get",
                url:"{{route('admin.insertCourseContent')}}",
                data:{

                    contentname:contentname,
                    courseid:courseid,
                    description:description,
                },
                success:function(data){

                    console.log(data);
                    location.replace("{{route('admin.courseContentIndex')}}");
                },
                error:function(error){

                    console.log(error);
                }
            });

        }else{

            $("#pcoursename").hide();
            $("#pcat").hide();
        }
    }
    function editCourse(id){
    
        console.log(id);
    
        $("#exampleModalCenter1").modal('show');
        var image = $('#uimage').val('');
    
        $.ajax({
    
            type:"get",
            url:"{{route('admin.editCourse')}}",
            data:{
    
                id:id
            },
            success:function(data){
    
                var coursename=$("#ucoursename").val(data.data.course_name);
                $("#usrc1").attr('src',data.image);
                var image = $('#image')[0].files[0];
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
        var image = $('#uimage')[0].files[0];
        var subCat=$("#usubCat").val();
        var authorname=$("#uauthorname").val();
        var credithour=$("#ucredithour").val();
        var coursedescription=$("#ucoursedescription").val();
        var level=$("#ulevel").val();
        var courserequire=$("#ucourserequire").val();
        var courseprice=$("#ucourseprice").val();
        var id=$("#id").val();
    
        var form_data=new FormData();
        form_data.append('id',id);
        form_data.append('coursename',coursename);
        form_data.append('image',image);
        form_data.append('subCat',subCat);
        form_data.append('authorname',authorname);
        form_data.append('credithour',credithour);
        form_data.append('coursedescription',coursedescription);
        form_data.append('level',level);
        form_data.append('courserequire',courserequire);
        form_data.append('courseprice',courseprice);
    
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
    
                $("#exampleModalCenter1").modal('hide');
                
                getCourseList();
    
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
    
                getCourseList();
    
            },
            error:function(error){
                console.log(error);
            }
        });
        
    }
    </script>

    
@endsection