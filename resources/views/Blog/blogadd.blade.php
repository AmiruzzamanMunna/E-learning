@extends('Layouts.admin-home')
@section('title')
    Blog Add
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
                <div class="col-md-6">Blog</div>
                <div class="col-md-1 ml-auto">
                   
                    
                </div>
            </div>
        </div>
        <div class="card-body">

            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{old('title')}}" id="contentname" class="form-control">   
                               
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select name="category_id" id="" class="form-control">
                        @foreach ($category as $item)
                            <option value="{{$item->course_category_id}}">{{$item->course_category_name}}</option> 
                        @endforeach
                        
                    </select>  
                               
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="file">               
                </div>
                <div class="form-group">
                    <label for="">Author Name</label>
                    <input type="text" name="authorname" value="{{old('authorname')}}" class="form-control">   
                               
                </div>
                <div class="form-group">
                    <label for="">Short Discription</label><br><br><br>
                    <textarea class="summernote" rows="50" cols="50" name="description">{{old('description')}}</textarea> 
                                 
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


    
@endsection