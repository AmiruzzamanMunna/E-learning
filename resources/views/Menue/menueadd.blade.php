@extends('Layouts.admin-home')
@section('title')
    Menue Add
@endsection
@section('content')

<div class="container">
    
    <div class="card" style="margin-top: 10%">

        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Menue</div>
                <div class="col-md-1 ml-auto">
                   
                    
                </div>
            </div>
        </div>
        <div class="card-body">

            <form method="post">

                @csrf
                <div class="form-group">
                    <label for="">Menue Name</label>
                    <input type="text" name="menuename" class="form-control">   
                                
                </div>
               
                
                <div class="form-group">
                    <label for="">Menue-Category</label>
                    <select class="form-control" name="menueid">
                        <option value="0">Select</option>
                        @foreach ($menues as $item)
                            <option value="{{$item->menu_id}}">{{$item->menu_name}}</option>
                        @endforeach
                    </select> 
                        
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" >Save changes</button>            
                </div>
            </form>
            
            
            
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