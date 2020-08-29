@extends('Layouts.admin-home')
@section('title')
    Home Edit
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
                    <label for="">Header Image</label>
                    <input type="file" class="form-control" name="headerimage">               
                </div>
                <div class="form-group">
                    <label for="">Header Title</label>
                    <input type="text" name="headertitle" value="{{$data->homePage_header_title}}" id="contentname" class="form-control">             
                </div>
                <div class="form-group">
                    <label for="">Header Paragraph</label>
                    <input type="text" name="headerpera" value="{{$data->homepage_header_paragraph}}" id="contentname" class="form-control">             
                </div>
                <div class="form-group">
                    <label for="">Middle Image</label>
                    <input type="file" class="form-control" name="middleimage">               
                </div>
                <div class="form-group">
                    <label for="">Middle Title</label>
                    <input type="text" name="middletitle" value="{{$data->homePage_middle_title}}" id="contentname" class="form-control">             
                </div>
                <div class="form-group">
                    <label for="">Middle Paragraph</label>
                    <input type="text" name="middlepera" value="{{$data->homepage_middle_paragraph}}" id="contentname" class="form-control">             
                </div>
                <div class="form-group">
                    <label for="">Footer Image</label>
                    <input type="file" name="footerimage" class="form-control">   
                               
                </div>
                <div class="form-group">
                    <label for="">Footer Title</label>
                    <input type="text" value="{{$data->homePage_footer_title}}" name="footertitle" class="form-control">            
                </div>
                <div class="form-group">
                    <label for="">Footer Paragraph</label>
                    <input type="text" value="{{$data->homePage_footer_paragraph}}" name="footerpera" class="form-control">            
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