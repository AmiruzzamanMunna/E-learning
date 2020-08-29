@extends('Layouts.admin-home')
@section('title')
    Exam Add
@endsection
@section('content')

<div class="container">
    
    <div class="card" style="margin-top: 10%">

        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Exam</div>
                <div class="col-md-1 ml-auto">
                    <!-- <a onclick="append()"><i class="fas fa-plus"></i></a>   -->
                </div>
            </div>
        </div>
        <div class="card-body">

            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Exam Title</label>
                    <input type="text" name="examtitle" value="{{old('examtitle')}}" class="form-control">   
                              
                </div>
                <div class="form-group">
                    <label for="">Exam Type</label>
                    <select class="form-control" name="exam_type_id" id="exam_type_id" onchange="Change()">
                        <option value="0">Select</option>
                        @foreach($data as $each_data)
                            <option value="{{$each_data->exam_type_id}}">{{$each_data->exam_type_name}}</option>
                        @endforeach
                    </select>  
                                
                </div>
                <div class="form-group">
                    <label for="">Exam Total Marks</label>
                    <input type="text" name="exammarks" id="contentname" value="{{old('exammarks')}}" class="form-control">   
                              
                </div>
                <div class="form-group" id="mcq">
                    
                                
                </div>
                <div class="form-group" id="fill">
                    
                                
                </div>
                
                <div class="form-group">
                    <button id="mcqbutton" type="button" onclick="addQuestion()" class="btn btn-primary">Add Question</button>         
                    <button id="fillbutton" type="button" onclick="filAppend()" class="btn btn-primary">Add Question</button>         
                    <button type="submit" class="btn btn-primary">Save changes</button>            
                </div>
            </form>
        </div>
    </div>
</div>
    
<script>

    $("#mcq").hide();
    $("#mcqbutton").hide();
    $("#fillbutton").hide();

    $i=0;
    function append(id){
        $i++;
        var html='';
        html+='<div class="row" id="appendans'+$i+'"><input type="hidden" name="hidden_question_option_id[]" value="'+id+'"><input onclick="checkBoxChecked('+$i+')" type="checkbox" name="option_name_check[]" id="option_checkbox'+$i+'"/>&nbsp;&nbsp;<input type="text" name="option_name[]" id="option_name'+$i+'" class="form-control col-9">&nbsp;&nbsp;<i onclick="removeAppend('+$i+')" class="fas fa-minus-circle"></i></div>';
        $("#ans_option"+id).append(html);
        
    }
    function removeAppend(id){
        $("#appendans"+id).remove();
    }
    $i=0;
    function addQuestion(){  
        $i++;
                        
        var html='<div class="form-group row"><div class="col-4">';
        html+='<label for="">Question Name</label>';
        html+='<input type="hidden" name="hidden_question_name_id[]" value="'+$i+'"><input type="text" class="form-control" name="question_name[]"> ';
        html+='</div>';
        html+='<div class="col-4">';
        html+='<label for="">Answer Option</label>';
        html+=' <a onclick="append('+$i+')"><i class="fas fa-plus"></i></a>';
        html+='<div id="ans_option'+$i+'">';
        html+='</div>';
        html+='</div>';
        html+='<div class="col-4">';
        html+='<div id="ans_option'+$i+'">';
        html+='</div> ';
        html+='</div></div>';
      

        $("#mcq").append(html);
   
    }
    function Change(){

        let examtype=$("#exam_type_id").val();
        if(examtype!=0 && examtype==2){
            $("#mcq").show();
            $("#mcqbutton").show();
            $("#fillbutton").hide();
        }else if(examtype!=0 && examtype==1){

            $("#fillbutton").show();
            $("#mcqbutton").hide();

        }else{

            $("#mcqbutton").hide();
            $("#fillbutton").hide();
        }
    }
    function checkBoxChecked(id){
        
        if($('#option_checkbox'+id).prop('checked')==true){

            var name=$("#option_name"+id).val();
            $("#option_checkbox"+id).val(name);
            var check=$("#option_checkbox"+id).val();

        }
    }

    // Fill in the Blank

    $i=0;
    function filAppend(){

        console.log('clilck');

        $i++;

        var html='';
        html='<div id="fillrow'+$i+'" class="form-group row"><div class="col-4">';
        html+='<label for="">Question Name</label>';
        html+='<input type="text" class="form-control" name="question_name[]"> ';
        html+='</div>';
        html+='<div class="col-4">';
        html+='<label for="">Answer Option</label>';
        html+='<input type="text" class="form-control" name="ans_name[]">';
        html+='<div id="ans_option'+$i+'">';
        html+='</div>';
        html+='</div>';
        html+='<div class="col-4">';
        html+='<div id="ans_option'+$i+'">';
        html+='</div><i onclick="fillRemoveAppend('+$i+')" style="margin-top: 35px;" class="fas fa-minus-circle"></i>';
        html+='</div></div>';

        $("#fill").append(html);

    }
    function fillRemoveAppend(id){

        $("#fillrow"+id).remove();
    }
</script>
@endsection