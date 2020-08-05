@extends('Layouts.admin-home')
@section('title')
    Course Catogory List
@endsection
@section('content')

<div class="container">
    
    <div class="card" style="margin-top: 10%">

        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Course Category</div>
                <div class="col-md-1 ml-auto">
                    @if (Session::has('coursecatadd'))
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
                        <th>Category Name</th>
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
          <h5 class="modal-title" id="exampleModalLongTitle">Course Category Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="">Category Name</label>
                <input type="text" name="catname" id="catname" class="form-control">   
                <p id="pcatname" style="color: red">This field is required</p>             
            </div>
            <div class="form-group">
                <label for="">Sub-Category</label>
                <select class="form-control" id="subCat">
                    
                </select>                
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="insertCourseCategory()">Save changes</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Course Category Update</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="">Category Name</label>
                <input type="text" name="catname" id="updatecatname" class="form-control">   
                <input type="hidden" id="id" class="form-control">   
                            
            </div>
            <div class="form-group">
                <label for="">Sub-Category</label>
                <select class="form-control" id="updatesubCat">
                    
                </select>                
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="editCourseCategoryUpdate()">Save changes</button>
        </div>
      </div>
    </div>
</div>

  <script>

    $("#pcatname").hide();

    $(document).ready(function(){

        getCategoryCourseList();

    });

    function getCategoryCourseList(){


        $.ajax({

            type:"get",
            url:"{{route('admin.getCategoryCourseList')}}",
            success:function(data){

                var html='';
                for($i=0;$i<data.category.length;$i++){


                    html+='<tr>';
                    html+='<td>'+($i+1)+'</td>';
                    html+='<td>'+data.category[$i].course_category_name+'</td>';
                    
                    if(data.courseedit==9 && data.coursedelete==10){

                        html+='<td><i class="fas fa-edit" onclick="editCourseCategory('+data.category[$i].course_category_id+')"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-trash" onclick="deleteCourseCategory('+data.category[$i].course_category_id+')"></i></td>';

                    }else if(data.courseedit==9){

                        html+='<td>< class="fas fa-edit" onclick="editCourseCategory('+data.category[$i].course_category_id+')"></td>';

                    }else if(data.coursedelete==10){

                        html+='<td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-trash" onclick="deleteCourseCategory('+data.category[$i].course_category_id+')"></i></td>';

                    }else {

                        html+='<td></td>'

                    }
                    
                    html+='</tr>';
                    for($j=($i);$j<data.subCategory.length;$j++){

                        if(data.category[$i].course_category_id==data.subCategory[$j].course_category_parent_id){

                            html+='<tr>';
                            html+='<td>'+($j)+'</td>';
                            html+='<td>'+'</br>&nbsp;&nbsp;&nbsp;&nbsp;'+data.subCategory[$j].course_category_name+'</td>';
                            if(data.courseedit==9 && data.coursedelete==10){

                                html+='<td><i class="fas fa-edit" onclick="editCourseCategory('+data.subCategory[$j].course_category_id+')"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-trash" onclick="deleteCourseCategory('+data.subCategory[$j].course_category_id+')"></i></td>';

                            }else if(data.courseedit==9){

                                html+='<td><i class="fas fa-edit" onclick="editCourseCategory('+data.subCategory[$j].course_category_id+')"></i>&nbsp;&nbsp;&nbsp;&nbsp;</td>';

                            }else if(data.coursedelete==10){

                                html+='<td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-trash" onclick="deleteCourseCategory('+data.subCategory[$j].course_category_id+')"></i></td>';

                            }else {

                                html+='<td></td>'

                            }
                            
                            html+='</tr>';

                        }
                    }
                    

                    

                    
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
    function insertCourseCategory(){

        var catname=$("#catname").val();
        var subCat=$("#subCat").val();

        if(catname==''){

            $("#pcatname").show();
            return ;

        }else{

            $.ajax({

                type:"get",
                url:"{{route('admin.insertCourseCategory')}}",
                data:{

                    catname:catname,
                    subCat:subCat,
                },
                success:function(data){

                    $("#exampleModalCenter").modal('hide');
                    var catname=$("#catname").val('');
                    var subCat=$("#subCat").val('');
                    getCategoryCourseList();

                },
                error:function(error){

                    console.log(error);
                }

            });


        }
    }
    function editCourseCategory(id){

        console.log(id);

        $("#exampleModalCenter1").modal('show');

        $.ajax({

            type:"get",
            url:"{{route('admin.editCourseCategory')}}",
            data:{

                id:id
            },
            success:function(data){

                

                $("#updatecatname").val(data.data.course_category_name);
                $("#id").val(id);
                var html='';
                html+='<option value="0">Select</option>';
                for($i=0;$i<data.category.length;$i++){

                    if(data.data.course_category_parent_id==data.category[$i].course_category_id){

                        html+='<option value="'+data.category[$i].course_category_id+'" selected>'+data.category[$i].course_category_name+'</option>';

                    }else{

                        html+='<option value="'+data.category[$i].course_category_id+'">'+data.category[$i].course_category_name+'</option>';

                    }

                    
                }
                $("#updatesubCat").html(html);

            },
            error:function(error){
                console.log(error);
            }
        });

    }
    function editCourseCategoryUpdate(){

        var catname=$("#updatecatname").val();
        var subcat=$("#updatesubCat").val();
        var id=$("#id").val();

        $.ajax({

            type:"get",
            url:"{{route('admin.editCourseCategoryUpdate')}}",
            data:{

                catname:catname,
                subcat:subcat,
                id:id
            },
            success:function(data){

                console.log(data);

                $("#exampleModalCenter1").modal('hide');
                
                getCategoryCourseList();

            },
            error:function(error){

                console.log(error);
            }

        });

    }
    function deleteCourseCategory(id){

        $.ajax({

            type:"get",
            url:"{{route('admin.deleteCourseCategory')}}",
            data:{

                id:id
            },
            success:function(data){

                getCategoryCourseList();

            },
            error:function(error){
                console.log(error);
            }
        });
        
    }
  </script>

    
@endsection