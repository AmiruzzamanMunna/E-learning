@extends('Layouts.user-home')
@section('title')
    All Course
@endsection
@section('container')
     <!--Course Area Start-->

     <section class="ic-breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcumb-content">
                        <h2>Courses</h2>

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

    <section class="ic-course-category">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ic-course-category-heading">
                        <h2>Courses To Get You Started</h2>
                    </div>
                </div>
            </div>
            <div class="ic-course-category-content">
                <ul class="nav nav-tabs course-nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pupolar-tab" data-toggle="tab" href="#pupolar" role="tab" aria-controls="pupolar" aria-selected="true">Most Popular</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="trending-tab" data-toggle="tab" href="#trending" role="tab" aria-controls="trending" aria-selected="false">Trending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="free-tab" data-toggle="tab" href="#free" role="tab" aria-controls="free" aria-selected="false">Free Course</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="pupolar" role="tabpanel" aria-labelledby="pupolar-tab">


                        <div id="ic-owl-popular" class="owl-carousel owl-theme ic-course-owl">
                            @forelse ($data as $item)

                                <div class="item">
                                    <div class="ic-course-content">
                                        <img src="{{asset('public/assets/images/Course')}}/{{$item->course_image}}" style="max-height: 205px" class="img-fluid" alt="">
                                        <div class="title">
                                            <h6><a href="{{route('user.courseDetails',$item->course_id)}}">{{$item->course_name}}</a></h6>
                                            <p>{{$item->course_authorname}}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="ratng">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span><span class="color">4.8</span> (22,225)</span>
                                            </div>
                                            <div class="time">
                                                <p>8Hrs</p>
                                            </div>
                                        </div>
                                        <div class="price">
                                            <p>${{$item->course_price}}<p>
                                        </div>
                                    </div>
                                </div>
                                
                            @empty
                                <h2 style="color: #ff6b1b">Sorry No Course Content is Available</h2>
                                
                            @endforelse
                            
                            {{-- <div class="item">
                                <div class="ic-course-content">
                                    <img src="{{asset('public')}}/assets/images/course.jpg" class="img-fluid" alt="">
                                    <div class="title">
                                        <h6><a href="course-details.html">Advanced CSS and Sass: Flexbox, Grid Animations and More! Jonas Schmedtmann</a></h6>
                                        <p>Jonas Schmedtmann</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="ratng">
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <span><span class="color">4.8</span> (22,225)</span>
                                        </div>
                                        <div class="time">
                                            <p>8Hrs</p>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <p>$55.00<p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="ic-course-content">
                                    <img src="{{asset('public')}}/assets/images/course.jpg" class="img-fluid" alt="">
                                    <div class="title">
                                        <h6><a href="course-details.html">Advanced CSS and Sass: Flexbox, Grid Animations and More! Jonas Schmedtmann</a></h6>
                                        <p>Jonas Schmedtmann</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="ratng">
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <span><span class="color">4.8</span> (22,225)</span>
                                        </div>
                                        <div class="time">
                                            <p>8Hrs</p>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <p>$55.00<p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="ic-course-content">
                                    <img src="{{asset('public')}}/assets/images/course.jpg" class="img-fluid" alt="">
                                    <div class="title">
                                        <h6><a href="course-details.html">Advanced CSS and Sass: Flexbox, Grid Animations and More! Jonas Schmedtmann</a></h6>
                                        <p>Jonas Schmedtmann</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="ratng">
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <span><span class="color">4.8</span> (22,225)</span>
                                        </div>
                                        <div class="time">
                                            <p>8Hrs</p>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <p>$55.00<p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="ic-course-content">
                                    <img src="{{asset('public')}}/assets/images/course.jpg" class="img-fluid" alt="">
                                    <div class="title">
                                        <h6><a href="course-details.html">Advanced CSS and Sass: Flexbox, Grid Animations and More! Jonas Schmedtmann</a></h6>
                                        <p>Jonas Schmedtmann</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="ratng">
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <span><span class="color">4.8</span> (22,225)</span>
                                        </div>
                                        <div class="time">
                                            <p>8Hrs</p>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <p>$55.00<p>
                                    </div>
                                </div>
                            </div> --}}

                        </div>

                    </div>
                    <div class="tab-pane fade" id="trending" role="tabpanel" aria-labelledby="trending-tab">

                        <div id="ic-owl-trending" class="owl-carousel owl-theme ic-course-owl">

                            @forelse ($data as $item)

                                <div class="item">
                                    <div class="ic-course-content">
                                        <img src="{{asset('public/assets/images/Course')}}/{{$item->course_image}}" style="max-height: 205px" class="img-fluid" alt="">
                                        <div class="title">
                                            <h6><a href="{{route('user.courseDetails',$item->course_id)}}">{{$item->course_name}}</a></h6>
                                            <p>{{$item->course_authorname}}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="ratng">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span><span class="color">4.8</span> (22,225)</span>
                                            </div>
                                            <div class="time">
                                                <p>8Hrs</p>
                                            </div>
                                        </div>
                                        <div class="price">
                                            <p>${{$item->course_price}}<p>
                                        </div>
                                    </div>
                                </div>
                                
                            @empty
                                <h2 style="color: #ff6b1b">Sorry No Course Content is Available</h2>
                                
                            @endforelse
        

                        </div>



                    </div>
                    <div class="tab-pane fade" id="free" role="tabpanel" aria-labelledby="free-tab">

                        <div id="ic-owl-free" class="owl-carousel owl-theme ic-course-owl">

                            @forelse ($freeCourse as $item)

                                <div class="item">
                                    <div class="ic-course-content">
                                        <img src="{{asset('public/assets/images/Course')}}/{{$item->course_image}}" style="max-height: 205px" class="img-fluid" alt="">
                                        <div class="title">
                                            <h6><a href="{{route('user.courseDetails',$item->course_id)}}">{{$item->course_name}}</a></h6>
                                            <p>{{$item->course_authorname}}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="ratng">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span><span class="color">4.8</span> (22,225)</span>
                                            </div>
                                            <div class="time">
                                                <p>8Hrs</p>
                                            </div>
                                        </div>
                                        <div class="price">
                                            <p>${{$item->course_price}}<p>
                                        </div>
                                    </div>
                                </div>
                                
                            @empty
                                <h2 style="color: #ff6b1b">Sorry No Course Content is Available</h2>
                                
                            @endforelse
                            

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Featured Course-->

    <section class="ic-featured-course">
        <div class="container">
            <div class="ic-featured-course-warper">
                <div class="row">
                    <div class="col-md-6">
                        <div class="ic-featured-course-left">
                            <img src="{{asset('public')}}/assets/images/featurd-course.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ic-featured-course-right">
                            <div class="title">
                                <p>Featured Course</p>
                                <h4>Ultimate Photoshop Training: From Beginner to Expert </h4>
                                <span>Last Updated August 2018</span>
                            </div>
                            <div class="body-text">
                                <p>Master Photoshop Courses without any previous knowledge with this
                                    easy-to-follow course . . . .
                                </p>
                                <p class="created-by"> Created by Cristian Doru Barin, Christian Barin - International</p>
                                <p class="created-by"><span> Beginner Level</span> / <span>5 Hours </span> / <span>86 Lectures </span> / <span>2 Exams</span></p>
                            </div>
                            <div class="rating-enroll">
                                <div class="rating">
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <p>4.5(3,547 Ratings)</p>
                                </div>
                                <div class="enroll">
                                    <p>30,257 Students Enrolled</p>
                                </div>
                            </div>
                            <div class="price">
                                <p>$44.00</p>
                            </div>
                            <div class="featured-bottom">
                                <button type="button">Start Now</button>
                                <p><i class="icofont-ui-love"></i> Add To Favorite</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!--Featured Course-->
    <section class="ic-user-experience-course-area">
        <div class="container">
            <div class="ic-user-experience-warper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="ic-user-experience-heading">
                            <h2>All User Experience Courses</h2>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ic-user-experience-filter">
                            <i class="icofont-filter"></i>
                            <span>Filter</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="filter-select">
                            <select>
                                <option value="0">Best selling</option>
                                <option value="1">Free COurse</option>
                                <option value="2">Another option</option>
                                <option value="4">Another Option</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 ic-ecperience-course-left">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-6">
                            <div class="ic-experience-course-skill">
                                <h4>Skill Level</h4>
                                <p><a href="#">Beginner (1022)</a></p>
                                <p><a href="#" class="active">Intermediate (901)</a></p>
                                <p><a href="#">Advanced (788)</a></p>
                                <p><a href="#">Appropriate for all (3,991)</a></p>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-6">
                            <div class="ic-experience-course-rating">
                                <h4>Rating</h4>
                                <div class="icon">
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                </div>
                                <div class="icon">
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="icon">
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="icon">
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="icon">
                                    <i class="icofont-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="ic-experience-course-video-duration">
                        <div class="experience-course-select">
                            <select>
                                <option value="0">Video Duration</option>
                                <option value="1">30 Hours</option>
                                <option value="2">40 Hours</option>
                                <option value="4">50 Hours</option>
                            </select>
                        </div>
                    </div>
                    <div class="ic-experience-course-price">
                        <div class="price-course-select">
                            <select>
                                <option value="0">Price</option>
                                <option value="1">$30</option>
                                <option value="2">$40</option>
                                <option value="4">$50</option>
                            </select>
                        </div>
                    </div>
                    <div class="ic-experience-course-topic">
                        <div class="topic-course-select">
                            <select>
                                <option value="0">Topics</option>
                                <option value="1">Web Design</option>
                                <option value="2">Web Design</option>
                                <option value="4">Web Design</option>
                            </select>
                        </div>
                    </div>
                    <div class="ic-experience-course-author">
                        <div class="author-course-select">
                            <select>
                                <option value="0">Authors</option>
                                <option value="1">Another Option</option>
                                <option value="2">Another Option</option>
                                <option value="4">Another Option</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="ic-user-experience-course-right">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="course-image">
                                    <img src="{{asset('public')}}/assets/images/user-experience.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-md-8 ic-col-pl-0">
                                <div class="content">
                                    <div class="ic-featured-course-right">
                                        <div class="title">

                                            <h4><a href="course-details.html">Ultimate Photoshop Training: From Beginner to Expert</a> </h4>
                                            <span>Last Updated August 2018</span>
                                        </div>
                                        <div class="body-text">

                                            <p class="created-by"> Created by Cristian Doru Barin, Christian Barin - International</p>
                                            <p class="created-by"><span> Beginner Level</span> / <span>5 Hours </span> / <span>86 Lectures </span> / <span>2 Exams</span></p>
                                        </div>
                                        <div class="rating-enroll experience-enroll">
                                            <div class="rating">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <p>4.5(3,547 Ratings)</p>
                                            </div>
                                            <div class="enroll">
                                                <p>30,257 Students Enrolled</p>
                                            </div>
                                        </div>
                                        <div class="experience-course-price">
                                            <p>$33.00</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ic-user-experience-course-right">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="course-image">
                                    <img src="assets/images/user-experience.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-md-8 ic-col-pl-0">
                                <div class="content">
                                    <div class="ic-featured-course-right">
                                        <div class="title">

                                            <h4><a href="course-details.html">Ultimate Photoshop Training: From Beginner to Expert </a></h4>
                                            <span>Last Updated August 2018</span>
                                        </div>
                                        <div class="body-text">

                                            <p class="created-by"> Created by Cristian Doru Barin, Christian Barin - International</p>
                                            <p class="created-by"><span> Beginner Level</span> / <span>5 Hours </span> / <span>86 Lectures </span> / <span>2 Exams</span></p>
                                        </div>
                                        <div class="rating-enroll experience-enroll">
                                            <div class="rating">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <p>4.5(3,547 Ratings)</p>
                                            </div>
                                            <div class="enroll">
                                                <p>30,257 Students Enrolled</p>
                                            </div>
                                        </div>
                                        <div class="experience-course-price">
                                            <p>$33.00</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ic-user-experience-course-right">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="course-image">
                                    <img src="{{asset('public')}}/assets/images/user-experience.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-md-8 ic-col-pl-0">
                                <div class="content">
                                    <div class="ic-featured-course-right">
                                        <div class="title">

                                            <h4><a href="course-details.html">Ultimate Photoshop Training: From Beginner to Expert </a></h4>
                                            <span>Last Updated August 2018</span>
                                        </div>
                                        <div class="body-text">

                                            <p class="created-by"> Created by Cristian Doru Barin, Christian Barin - International</p>
                                            <p class="created-by"><span> Beginner Level</span> / <span>5 Hours </span> / <span>86 Lectures </span> / <span>2 Exams</span></p>
                                        </div>
                                        <div class="rating-enroll experience-enroll">
                                            <div class="rating">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <p>4.5(3,547 Ratings)</p>
                                            </div>
                                            <div class="enroll">
                                                <p>30,257 Students Enrolled</p>
                                            </div>
                                        </div>
                                        <div class="experience-course-price">
                                            <p>$33.00</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ic-user-experience-course-right">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="course-image">
                                    <img src="{{asset('public')}}/assets/images/user-experience.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-md-8 ic-col-pl-0">
                                <div class="content">
                                    <div class="ic-featured-course-right">
                                        <div class="title">

                                            <h4><a href="course-details.html">Ultimate Photoshop Training: From Beginner to Expert</a> </h4>
                                            <span>Last Updated August 2018</span>
                                        </div>
                                        <div class="body-text">

                                            <p class="created-by"> Created by Cristian Doru Barin, Christian Barin - International</p>
                                            <p class="created-by"><span> Beginner Level</span> / <span>5 Hours </span> / <span>86 Lectures </span> / <span>2 Exams</span></p>
                                        </div>
                                        <div class="rating-enroll experience-enroll">
                                            <div class="rating">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <p>4.5(3,547 Ratings)</p>
                                            </div>
                                            <div class="enroll">
                                                <p>30,257 Students Enrolled</p>
                                            </div>
                                        </div>
                                        <div class="experience-course-price">
                                            <p>$33.00</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ic-user-experience-course-right">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="course-image">
                                    <img src="{{asset('public')}}/assets/images/user-experience.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-md-8 ic-col-pl-0">
                                <div class="content">
                                    <div class="ic-featured-course-right">
                                        <div class="title">

                                            <h4><a href="course-details.html">Ultimate Photoshop Training: From Beginner to Expert</a> </h4>
                                            <span>Last Updated August 2018</span>
                                        </div>
                                        <div class="body-text">

                                            <p class="created-by"> Created by Cristian Doru Barin, Christian Barin - International</p>
                                            <p class="created-by"><span> Beginner Level</span> / <span>5 Hours </span> / <span>86 Lectures </span> / <span>2 Exams</span></p>
                                        </div>
                                        <div class="rating-enroll experience-enroll">
                                            <div class="rating">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <p>4.5(3,547 Ratings)</p>
                                            </div>
                                            <div class="enroll">
                                                <p>30,257 Students Enrolled</p>
                                            </div>
                                        </div>
                                        <div class="experience-course-price">
                                            <p>$33.00</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ic-user-experience-course-right">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="course-image">
                                    <img src="{{asset('public')}}/assets/images/user-experience.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-md-8 ic-col-pl-0">
                                <div class="content">
                                    <div class="ic-featured-course-right">
                                        <div class="title">

                                            <h4><a href="course-details.html">Ultimate Photoshop Training: From Beginner to Expert</a> </h4>
                                            <span>Last Updated August 2018</span>
                                        </div>
                                        <div class="body-text">

                                            <p class="created-by"> Created by Cristian Doru Barin, Christian Barin - International</p>
                                            <p class="created-by"><span> Beginner Level</span> / <span>5 Hours </span> / <span>86 Lectures </span> / <span>2 Exams</span></p>
                                        </div>
                                        <div class="rating-enroll experience-enroll">
                                            <div class="rating">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <p>4.5(3,547 Ratings)</p>
                                            </div>
                                            <div class="enroll">
                                                <p>30,257 Students Enrolled</p>
                                            </div>
                                        </div>
                                        <div class="experience-course-price">
                                            <p>$33.00</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ic-user-experience-course-right">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="course-image">
                                    <img src="{{asset('public')}}/assets/images/user-experience.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-md-8 ic-col-pl-0">
                                <div class="content">
                                    <div class="ic-featured-course-right">
                                        <div class="title">

                                            <h4><a href="course-details.html">Ultimate Photoshop Training: From Beginner to Expert</a> </h4>
                                            <span>Last Updated August 2018</span>
                                        </div>
                                        <div class="body-text">

                                            <p class="created-by"> Created by Cristian Doru Barin, Christian Barin - International</p>
                                            <p class="created-by"><span> Beginner Level</span> / <span>5 Hours </span> / <span>86 Lectures </span> / <span>2 Exams</span></p>
                                        </div>
                                        <div class="rating-enroll experience-enroll">
                                            <div class="rating">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <p>4.5(3,547 Ratings)</p>
                                            </div>
                                            <div class="enroll">
                                                <p>30,257 Students Enrolled</p>
                                            </div>
                                        </div>
                                        <div class="experience-course-price">
                                            <p>$33.00</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ic-user-experience-course-right">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="course-image">
                                    <img src="{{asset('public')}}/assets/images/user-experience.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-md-8 ic-col-pl-0">
                                <div class="content">
                                    <div class="ic-featured-course-right">
                                        <div class="title">

                                            <h4><a href="course-details.html">Ultimate Photoshop Training: From Beginner to Expert</a></h4>
                                            <span>Last Updated August 2018</span>
                                        </div>
                                        <div class="body-text">

                                            <p class="created-by"> Created by Cristian Doru Barin, Christian Barin - International</p>
                                            <p class="created-by"><span> Beginner Level</span> / <span>5 Hours </span> / <span>86 Lectures </span> / <span>2 Exams</span></p>
                                        </div>
                                        <div class="rating-enroll experience-enroll">
                                            <div class="rating">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <p>4.5(3,547 Ratings)</p>
                                            </div>
                                            <div class="enroll">
                                                <p>30,257 Students Enrolled</p>
                                            </div>
                                        </div>
                                        <div class="experience-course-price">
                                            <p>$33.00</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ic-course-pagination text-center">

                                <ul class="pagination">
                                    <li class="disabled"><a href="#">«</a></li>
                                    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection