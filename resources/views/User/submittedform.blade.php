@extends('Layouts.user-home')
@section('title')
    Submitted Form
@endsection
@section('container')


     <!--Course Area Start-->

     <section class="ic-breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcumb-content">
                        <h2>Submitted Form</h2>

                        <div class="row ml-auto">
                            <p><a href="{{route('user.index')}}">Home</a></p>
                            @foreach(Request::segments() as $segment)
                                <p> <span>// </span><a href="{{$segment}}">{{$segment}}</a></p>
                            @endforeach
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ic-my-course-area">
        <div class="container">
            <div class="ic-my-course-select">
                <div class="row">
                    
                    
                </div>
            </div>
        </div>
    </section>
    <!--Enroll Area Start -->
    <section class="ic-enroll-history-area">
        <div class="container">
            @foreach ($submittedform as $item)
            <div class="ic-enroll-history-warper_">
                <div class="row">
                    <table class="table table-bordered table-responsive-md">
                        <thead>
                            <thead>
                                <th>Sl No</th>
                                <th>Lecture Name</th>
                                <th>Description</th>
                            </thead>
                            <tbody>
        
                                @foreach($submittedform as $key=>$eachdata)
                                <tr>
                                    <td>{{$key+1}}</td> 
                                    <td width="">{{$eachdata->course_name}} // {{$eachdata->course_content_title}}</td> 
                                    <td width=""><p class="text-responsive">{{$eachdata->user_submit_form_description}}</p></td> 
                                </tr>
                                @endforeach
                                
                            </tbody>
            
                        </thead>
                        
                    </table>
                    

                </div>
            </div>
                
            @endforeach
        

            <div class="row">
                <div class="col-sm-12">
                    <div class="ic-course-pagination ic-my-course-pagination enroll-history-pagi text-center">

                        <ul class="pagination ">
                            {{$data->appends(Request::all())->links()}}
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection