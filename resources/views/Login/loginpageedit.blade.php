@extends('Layouts.admin-home')
@section('title')
    Login Page Edit
@endsection
@section('content')

<div class="container">
    
    <div class="card" style="margin-top: 10%">

        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Edit Page</div>
                <div class="col-md-1 ml-auto">
                   
                    
                </div>
            </div>
        </div>
        <div class="card-body">

            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{$data->admin_login_page_short_title}}" class="form-control">   
                               
                </div>

                <div class="form-group">
                    <label for="">Logo</label>
                    <input type="file" class="form-control" name="logo">               
                </div>
                <div class="form-group">
                    <label for="">Image2</label>
                    <input type="file" class="form-control" name="image2">               
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
    
    
    </script>

    
@endsection