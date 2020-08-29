@extends('Layouts.admin-home')
@section('title')
    Course Add
@endsection
@section('script')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>  
  <script>
  $(document).ready(function() {
        $('.summernote').summernote({
          height:400,
        });
    });
</script>
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
                <input type="text" name="catname" id="coursename" class="form-control">   
                <p id="pcoursename" style="color: red">This field is required</p>             
            </div>
            <div class="form-group">
                <label for="">Course Short Title</label>
                <input type="text" name="coursetitle" id="coursetitle" value="" class="form-control">   
                            
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="" id="image" class="form-control"> 
                <img height="200px" width="200px" alt="" id="src1">                  
            </div>
            <div class="form-group">
                <label for="">Sub-Category</label>
                <select class="form-control" id="subCat">
                    
                </select> 
                <p id="pcat" style="color: red">This field is required</p>                
            </div>
            <div class="form-group">
                <label for="">Author Name</label>
                <input type="text" name="Authorname" id="authorname" class="form-control">   
                <p id="pauthname" style="color: red">This field is required</p>             
            </div>
            <div class="form-group">
                <label for="">Credit Hour</label>
                <input type="text" name="credit hour" id="credithour" class="form-control">   
                <p id="pcredit" style="color: red">This field is required</p>             
            </div>
            <div class="form-group">
                <label for="">Course Description</label><br><br>
                <textarea class="summernote" name="" id="coursedescription" cols="48" rows="10"></textarea>  
                <p id="pdes" style="color: red">This field is required</p>             
            </div>
            <div class="form-group">
                <label for="">Course Difficulty Level</label>
                <select name="" id="level" class="form-control">        
            
                </select>  
                <p id="plevel" style="color: red">This field is required</p>             
            </div>
            <div class="form-group">
                <label for="">Course Requirement</label><br><br>
                <textarea class="summernote" name="" id="courserequire" cols="48" rows="10"></textarea>  
                <p id="preq" style="color: red">This field is required</p>             
            </div>
            <div class="form-group">
                <label for="">Free course</label><br><br>
                <select name="" class="form-control" id="freecourse">

                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    
                </select>             
            </div>
            <div class="form-group">
                <label for="">Course Introductory Video</label>
                <input type="file" name="catname" id="coursevideo" class="form-control"> 
                           
            </div>
            <div class="form-group">
                <label for="">Course price</label>
                <input type="text" name="courseprice" id="courseprice" class="form-control">   
                <p id="pprice" style="color: red">This field is required</p>             
            </div>
            <div class="form-group">
                <label for="">Coupon</label><br><br>
                <select name="" class="form-control" id="couponid">
                    <option value="0">Select</option>
                    @foreach ($coupon as $item)
                        <option value="{{$item->coupon_id}}">{{$item->coupon_name}}</option>
                    @endforeach
      
                    
                </select>             
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary" onclick="insertCourse()">Save changes</button>            
            </div>
        </div>
    </div>
</div>

<!-- Modal -->



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
        openModal();
    
    });
    
    function getCourseList(){
    
    
        $.ajax({
    
            type:"get",
            url:"{{route('admin.getCourseList')}}",
            success:function(data){
    
                
    
                var html='';
                for($i=0;$i<data.data.length;$i++){
    
    
                    html+='<tr>';
                    html+='<td>'+($i+1)+'</td>';
                    html+='<td>'+data.data[$i].course_name+'</td>';
                    html+='<td>'+data.data[$i].course_category_name+'</td>';
                    html+='<td>'+data.data[$i].course_authorname+'</td>';
                    html+='<td>'+data.data[$i].course_credithour+'</td>';
                    html+='<td>'+data.data[$i].course_price+'</td>';
                    
                    if(data.courseedit==30 && data.coursedelete==31){
    
                        html+='<td><i class="fas fa-edit" onclick="editCourse('+data.data[$i].course_id+')"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-trash" onclick="deleteCourse('+data.data[$i].course_id+')"></i></td>';
    
                    }else if(data.courseedit==30){
    
                        html+='<td>< class="fas fa-edit" onclick="editCourse('+data.data[$i].course_id+')"></td>';
    
                    }else if(data.coursedelete==31){
    
                        html+='<td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-trash" onclick="deleteCourse('+data.data[$i].course_id+')"></i></td>';
    
                    }else {
    
                        html+='<td></td>'
    
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
    
        
        $.ajax({
    
            type:"get",
            url:"{{route('admin.getCategoryList')}}",
            success:function(data){
    
                console.log(data);
    
                var html='';
                html+='<option value="0">Select</option>';
                for($i=0;$i<data.category.length;$i++){
    
                    html+='<option value="'+data.category[$i].course_category_id+'">'+data.category[$i].course_category_name+'</option>';
    
                    for($j=0;$j<data.subCategory.length;$j++){
    
                        if(data.category[$i].course_category_id==data.subCategory[$j].course_category_parent_id){
    
                            html+='<option value="'+data.subCategory[$j].course_category_id+'">'+data.category[$i].course_category_name+'->'+data.subCategory[$j].course_category_name+'</option>';
    
                        }
    
                        
                    }
                }
                var level='';
                level+='<option value="0">Select</option>';
    
                for($k=0;$k<data.level.length;$k++){
    
                    level+='<option value="'+data.level[$k].difficulty_level_id+'">'+data.level[$k].difficulty_level_name+'</option>';
                }
                $("#level").html(level);
                $("#subCat").html(html);
    
            },
            error:function(error){
                console.log(error);
            }
        });
    }
    function insertCourse(){
    
        var image = $('#image')[0].files[0];
        var coursevideo = $('#coursevideo')[0].files[0];
        var freecourse=$("#freecourse").val();
        var coursename=$("#coursename").val();
        var coursetitle=$("#coursetitle").val();
        var subCat=$("#subCat").val();
        var authorname=$("#authorname").val();
        var credithour=$("#credithour").val();
        var coursedescription=$("#coursedescription").val();
        var level=$("#level").val();
        var courserequire=$("#courserequire").val();
        var courseprice=$("#courseprice").val();
        var couponid=$("#couponid").val();
        
    
        if(coursename=='' && subCat=='0' && authorname=='' && !parseInt(credithour) && coursedescription=='' && level=='0' && courserequire=='' && !parseFloat(courseprice)){
    
            $("#pcoursename").show();
            $("#pcat").show();
            $("#pauthname").show();
            $("#pcredit").show();
            $("#pdes").show();
            $("#plevel").show();
            $("#preq").show();
            $("#pprice").show();
    
        }
        else if(subCat=='0' && authorname=='' && !parseInt(credithour) && coursedescription=='' && level=='0' && courserequire=='' && !parseFloat(courseprice)){
    
            $("#pcat").show();
            $("#pauthname").show();
            $("#pcredit").show();
            $("#pdes").show();
            $("#plevel").show();
            $("#preq").show();
            $("#pprice").show();
        }
        else if(authorname=='' && !parseInt(credithour) && coursedescription=='' && level=='0' && courserequire=='' && !parseFloat(courseprice)){
    
            $("#pauthname").show();
            $("#pcredit").show();
            $("#pdes").show();
            $("#plevel").show();
            $("#preq").show();
            $("#pprice").show();
        }
        else if(!parseInt(credithour) && coursedescription=='' && level=='0' && courserequire=='' && !parseFloat(courseprice)){
    
            $("#pcredit").show();
            $("#pdes").show();
            $("#plevel").show();
            $("#preq").show();
            $("#pprice").show();
        }
        else if(coursedescription=='' && level=='0' && courserequire=='' && !parseFloat(courseprice)){
    
            $("#pdes").show();
            $("#plevel").show();
            $("#preq").show();
            $("#pprice").show();
    
        }
        else if(level=='0' && courserequire=='' && !parseFloat(courseprice)){
    
            $("#plevel").show();
            $("#preq").show();
            $("#pprice").show();
        }
        else if(courserequire=='' && !parseFloat(courseprice)){
    
            $("#preq").show();
            $("#pprice").show();
        }
        else if(!parseFloat(courseprice)){
    
            $("#pprice").show();
        }
        else if(coursename=='' && authorname=='' && !parseInt(credithour) && coursedescription=='' && level=='0' && courserequire=='' && !parseFloat(courseprice)){
    
            $("#pcoursename").show();
            $("#pcat").show();
            $("#pauthname").show();
            $("#pcredit").show();
            $("#pdes").show();
            $("#plevel").show();
            $("#preq").show();
            $("#pprice").show();
        }
        else if(coursename=='' && !parseInt(credithour) && coursedescription=='' && level=='0' && courserequire=='' && !parseFloat(courseprice)){
    
            $("#pcoursename").show();
            $("#pcredit").show();
            $("#pdes").show();
            $("#plevel").show();
            $("#preq").show();
            $("#pprice").show();
    
        }
        else if(coursename=='' && coursedescription=='' && level=='0' && courserequire=='' && !parseFloat(courseprice)){
    
            $("#pcoursename").show();
            $("#pdes").show();
            $("#plevel").show();
            $("#preq").show();
            $("#pprice").show();
    
        }
        else if(coursename=='' && level=='0' && courserequire=='' && !parseFloat(courseprice)){
    
            $("#pcoursename").show();
            $("#plevel").show();
            $("#preq").show();
            $("#pprice").show();
    
        }
        else if(coursename=='' && courserequire=='' && !parseFloat(courseprice)){
    
            $("#pcoursename").show();
            $("#preq").show();
            $("#pprice").show();
    
        }
        else if(coursename=='' && !parseFloat(courseprice)){
    
            $("#pcoursename").show();
            $("#pprice").show();
    
        }
        else if(coursename==''){
    
            $("#pcoursename").show();
        }
        else if(subCat=='0' && !parseInt(credithour) && coursedescription=='' && level=='0' && courserequire=='' && !parseFloat(courseprice)){
    
    
            $("#pcat").show();
            $("#pcredit").show();
            $("#pdes").show();
            $("#plevel").show();
            $("#preq").show();
            $("#pprice").show();
    
        }
        else if(subCat=='0' && coursedescription=='' && level=='0' && courserequire=='' && !parseFloat(courseprice)){
    
    
            $("#pcat").show();
            $("#pdes").show();
            $("#plevel").show();
            $("#preq").show();
            $("#pprice").show();
    
        }
        else if(subCat=='0' && level=='0' && courserequire=='' && !parseFloat(courseprice)){
    
            $("#pcat").show();
            $("#plevel").show();
            $("#preq").show();
            $("#pprice").show();
    
        }
        else if(subCat=='0' && courserequire=='' && !parseFloat(courseprice)){
    
            $("#pcat").show();
            $("#preq").show();
            $("#pprice").show();
    
        }
        else if(subCat=='0' && courserequire=='' && !parseFloat(courseprice)){
    
            
            $("#pcat").show();
            $("#preq").show();
            $("#pprice").show();
    
        }
        else if(subCat=='0' && !parseFloat(courseprice)){
    
            $("#pcoursename").show();
            $("#pcat").show();
            $("#pprice").show();
    
        }
        else if(subCat=='0'){
    
            $("#pcat").show();
        }
        else if(authorname=='' && coursedescription=='' && level=='0' && courserequire=='' && !parseFloat(courseprice)){
    
            $("#pauthname").show();
            $("#pdes").show();
            $("#plevel").show();
            $("#preq").show();
            $("#pprice").show();
    
        }
        else if(authorname==''  && level=='0' && courserequire=='' && !parseFloat(courseprice)){
    
    
            $("#pauthname").show();
            $("#plevel").show();
            $("#preq").show();
            $("#pprice").show();
    
        }
        else if(authorname==''  && courserequire=='' && !parseFloat(courseprice)){
    
            
            $("#pauthname").show();
            $("#preq").show();
            $("#pprice").show();
    
        }
        else if(authorname=='' && !parseFloat(courseprice)){
    
            
            $("#pauthname").show();
            $("#pprice").show();
    
        }
        else if(authorname==''){
    
            $("#pauthname").show();
        }
        else if(!parseInt(credithour) && level=='0' && courserequire=='' && !parseFloat(courseprice)){
    
            
            $("#pcredit").show();
            $("#plevel").show();
            $("#preq").show();
            $("#pprice").show();
    
        }
        else if(!parseInt(credithour) && courserequire=='' && !parseFloat(courseprice)){
    
            
            $("#pcredit").show();
            $("#preq").show();
            $("#pprice").show();
    
        }
        else if(!parseInt(credithour) && !parseFloat(courseprice)){
    
            $("#pcredit").show();
            $("#pprice").show();
    
        }
        else if(!parseInt(credithour)){
    
            $("#pcredit").show();
        }
        else if(coursedescription=='' && courserequire=='' && !parseFloat(courseprice)){
    
            
            $("#pdes").show();
            $("#preq").show();
            $("#pprice").show();
        }
        
        else if(coursedescription=='' && !parseFloat(courseprice)){
    
            
            $("#pdes").show();
            $("#pprice").show();
    
        }
        else if(coursedescription==''){
    
            $("#pdes").show();
        }
        else if(level=='0' && !parseFloat(courseprice)){
    
            
            $("#plevel").show();
            $("#pprice").show();
    
        }
        else if(level=='0'){
    
            
            $("#plevel").show();
    
        }
        else if(coursename!='' && subCat!='0' && authorname!='' && parseInt(credithour) && coursedescription!='' && level!='0' && courserequire!='' && parseFloat(courseprice)){
    
            var coursename=$("#coursename").val();
            var coursetitle=$("#coursetitle").val();
            var image = $('#image')[0].files[0];
            var subCat=$("#subCat").val();
            var authorname=$("#authorname").val();
            var credithour=$("#credithour").val();
            var coursedescription=$("#coursedescription").val();
            var level=$("#level").val();
            var courserequire=$("#courserequire").val();
            var courseprice=$("#courseprice").val();
            var couponid=$("#couponid").val();
    
            var form_data=new FormData();
            form_data.append('coursename',coursename);
            form_data.append('coursetitle',coursetitle);
            form_data.append('image',image);
            form_data.append('subCat',subCat);
            form_data.append('coursevideo',coursevideo);
            form_data.append('freecourse',freecourse);
            form_data.append('authorname',authorname);
            form_data.append('credithour',credithour);
            form_data.append('coursedescription',coursedescription);
            form_data.append('level',level);
            form_data.append('courserequire',courserequire);
            form_data.append('courseprice',courseprice);
            form_data.append('couponid',couponid);
    
            $.ajax({
    
                type:"post",
                url:"{{route('admin.insertCourse')}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                processData:false,
                contentType:false,
                data:form_data,
                datatype:"json",
                success:function(data){
    
                    location.replace("{{route('admin.courseListIndex')}}");
    
                },
                error:function(error){
    
                    console.log(error);
                }
    
            });
    
        }
        else{
    
            $("#pcoursename").show();
            $("#pcat").show();
            $("#pauthname").show();
            $("#pcredit").show();
            $("#pdes").show();
            $("#plevel").show();
            $("#preq").show();
            $("#pprice").show();
    
            
    
    
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