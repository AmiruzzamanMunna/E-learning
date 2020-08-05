@extends('Layouts.user-home')
@section('title')
    Enroll history
@endsection
@section('container')


     <!--Course Area Start-->

     <section class="ic-breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcumb-content">
                        <h2>Courses Enroll</h2>

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
                    <div class="col-md-4 col-lg-3">
                        <div class="ic-enroll-history-title">
                            <h4>Total {{count($data)}} Course Enroll</h4>
                        </div>
                    </div>
                    <div class="offset-lg-3 col-lg-3 col-md-4">
                        <select>
                            <option value="0">Short By Keyword Here</option>
                            <option value="1">Another Option</option>
                            <option value="2">Another Option</option>
                            <option value="4">Another Option</option>
                        </select>

                    </div>
                    <div class="col-md-4 col-lg-3">
                        <select>
                            <option value="0">Filter By Categories</option>
                            <option value="1">Another Option</option>
                            <option value="2">Another Option</option>
                            <option value="4">Another Option</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Enroll Area Start -->
    <section class="ic-enroll-history-area">
        <div class="container">
            @foreach ($data as $item)
            <div class="ic-enroll-history-warper">
                <div class="row">
                    <div class="col-md-5">
                        <div class="ic-enroll-title">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="image">
                                        <img src="{{asset('public')}}/assets/images/Course/{{$item->course_image}}" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-9 col-ic-pl-0">
                                    <div class="title">
                                        <h4>{{$item->course_name}}</h4>
                                        <p>{{$item->course_authorname}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 offset-lg-1 my-auto">
                        <div class="price">
                            <p>${{$item->order_amount}}</p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 my-auto">
                        <div class="date">
                            <span>Enroll</span>
                            <p>{{date('d F, Y',strtotime($item->order_date))}}</p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 my-auto">
                        <button type="button" class="ic-start-now-btn"><a style="color: white;text-decoration:none" href="{{route('user.courseDemo',$item->order_course_id)}}">Start Now</a></button>
                    </div>
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