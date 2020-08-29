@extends('Layouts.admin-home')
@section('title')
    Page List
@endsection
@section('content')

<div class="container">
    
    <div class="card" style="margin-top: 10%">

        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Blog</div>
                <div class="col-md-1 ml-auto">
                    @if (Session::has('Blogadd'))
                        <a href="{{route('admin.pageAdd')}}"><i class="fas fa-plus"></i></a> 
                    @endif
                    
                </div>
        </div>
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{Session('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card-body">

            <table class="table table-bordered table-responsive-md">
                <thead>
                    <thead>
                        <th>Sl No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </thead>
                    <tbody>

                        @foreach ($data as $key=>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->pages_title}}</td>
                                <td>{!!$item->pages_description!!}</td>
                                <td><a href="{{route('admin.pageEdit',$item->pages_id)}}"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="return confirm('Are You Sure!!')" href="{{route('admin.pageDelete',$item->pages_id)}}"><i class="fas fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </thead>
            </table>
        </div>
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