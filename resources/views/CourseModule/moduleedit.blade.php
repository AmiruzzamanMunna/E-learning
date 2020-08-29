@extends('Layouts.admin-home')
@section('title')
    Module Edit
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

            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Module Name</label>
                    <input type="text" name="module_name" value="{{$data->course_module_name}}" id="contentname" class="form-control">   
                               
                </div>
    
                <div class="form-group">
                    <label for="">Short Discription</label><br><br><br>
                    <textarea class="summernote" name="description" value="" cols="48" rows="10">{!!$data->course_module_description!!}</textarea>  
                                 
                </div>
                <div class="form-group">
                    <label for="">File</label>
                    <input type="file" class="form-control" name="file">               
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save changes</button>            
                </div>
                
            </form>
        </div>
    </div>
</div>

    
@endsection