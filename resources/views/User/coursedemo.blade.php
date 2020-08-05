@extends('Layouts.user-home')
@section('title')
    Course demo
@endsection
@section('container')

    <!--Course Details Area Start-->
    
    <section class="ic-breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcumb-content">
                        <h2>Course</h2>
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


    <!--Course Demo Area Start-->

    <section class="ic-course-demo-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ic-course-demo-title">
       
                        <h2>{{$course->course_name}}</h2>
                    </div>
                </div>
            </div>
            <div class="ic-course-details-main-left ic-course-demo-content">
                <ul class="nav nav-tabs ic-course-details-nav-tab ic-navtabs2" id="myTab" role="tablist">
                    <li class="nav-item ic-sm-display">
                        <a class="nav-link active" id="demo-content-tab" data-toggle="tab" href="#demo-content" role="tab" aria-controls="demo-content" aria-selected="true">Content</a>
                    </li>
                    <li class="nav-item ic-sm-display">
                        <a class="nav-link" id="information-tab" data-toggle="tab" href="#information" role="tab" aria-controls="information" aria-selected="false">Information </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="demo-content" role="tabpanel" aria-labelledby="demo-content-tab">
                        <div class="ic-course-demo-content">
                            <div class="row ic-m-25">
                                <div class="col-sm-6">
                                    <h6>Course Content</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="title2">3/18 1hr 48min</h6>
                                </div>
                            </div>
                            @forelse ($data as $item)

                                @if ($checkUserCourse)
                                <a href="{{route('user.courseDemoFile',[$id,$item->course_content_id,1])}}">
                                    <div class="ic-demo-content-body-warper demo-content-active">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-5">
                                                <div class="ic-demo-title">

                                                    <div class="icon">
                                                        <i class=""></i>
                                                    </div>
                                                    <div class="title">
                                                        <p>{{$item->course_content_title}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 offset-lg-1 col-md-2">
                                                <div class="ic-demo-item">
                                                    <p> Files {{$item->total}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 offset-lg-3 col-md-5">
                                                <div class="ic-demo-duration">
                                                    <p> Duration 00 Hr 43 Min</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @else
                                <a href="#">
                                    <div class="ic-demo-content-body-warper demo-content-active">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-5">
                                                <div class="ic-demo-title">

                                                    <div class="icon">
                                                        <i class="icofont-ui-lock"></i>
                                                    </div>
                                                    <div class="title">
                                                        <p>{{$item->course_content_title}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 offset-lg-1 col-md-2">
                                                <div class="ic-demo-item">
                                                    <p> Files {{$item->total}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 offset-lg-3 col-md-5">
                                                <div class="ic-demo-duration">
                                                    <p> Duration 00 Hr 43 Min</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                    
                                @endif
                                
                            @empty
                                
                            @endforelse
                            
                            

                        </div>
                    </div>
                    <div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="information-tab">
                        {{$course->course_description}}
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--Course details main content-->
    
@endsection