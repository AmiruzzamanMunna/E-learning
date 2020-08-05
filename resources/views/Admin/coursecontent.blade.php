@extends('Layouts.admin-home')
@section('title')
    Course Content
@endsection
@section('content')

<div class="container">
    
    <div class="card" style="margin-top: 10%">

        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Course Lecture Add</div>
                <div class="col-md-1 ml-auto">
                    @if (Session::has('coursecontentadd'))
                        <a href="{{route('admin.lectureAdd',$id)}}"><i class="fas fa-plus"></i></a>
                    @endif
                    
                </div>
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

            <table class="table table-bordered table-responsive-md-sm-lg">
                <thead>
                    <thead>
                        <th>Sl No</th>
                        <th>Lecture Name</th>
                        <th>Course Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($data as $key=>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->course_content_title}}</td>
                                <td>{{$item->course_name}}</td>
                                <td>
                                    @if (Session::has('coursecontentedit') && Session::has('coursecontentdelete'))
                                        <a href="{{route('admin.lectureEdit',$item->course_content_id)}}"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="return confirm('Are You Sure!!')" href="{{route('admin.lectureDelete',$item->course_content_id)}}"><i class="fas fa-trash"></i></a>
                                    @elseif(Session::has('coursecontentedit'))
                                        <a href="{{route('admin.lectureEdit',$item->course_content_id)}}"><i class="fas fa-edit"></i></a>
                                    @elseif(Session::has('coursecontentdelete'))
                                        <a onclick="return confirm('Are You Sure!!')" href="{{route('admin.lectureDelete',$item->course_content_id)}}"><i class="fas fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>



    
@endsection