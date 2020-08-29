@extends('Layouts.admin-home')
@section('title')
    Blog Edit
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
                <div class="col-md-6">Page</div>
                <div class="col-md-1 ml-auto">
                   
                    
                </div>
            </div>
        </div>
        <div class="card-body">

            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{$data->pages_title}}" id="contentname" class="form-control">   
                               
                </div>
                <div class="form-group">
                    <label for="">Sub Menues</label>
                    <select name="submenu_id"  class="form-control">
                        <option value="">Select</option>
                        @foreach ($submenues as $item)

                            @if ($data->pages_submenu_id==$item->menu_id)
                                <option value="{{$item->menu_id}}" selected>{{$item->menu_name}}</option> 
                            @else
                                <option value="{{$item->menu_id}}">{{$item->menu_name}}</option>
                            @endif
                            
                             
                        @endforeach
                        
                    </select>  
                               
                </div>
                <div class="form-group">
                    <label for="">Link</label>
                    <input type="text" name="link" value="{{$data->pages_link}}" id="contentname" class="form-control">   
                               
                </div>
                <div class="form-group">
                    <label for="">Short Discription</label><br><br><br>
                    <textarea class="summernote" rows="50" cols="50" name="description">{!!$data->pages_description!!}</textarea> 
                                 
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