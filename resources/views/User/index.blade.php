@extends('Layouts.user-home')
@section('title')
    E-Learning
@endsection
@section('container')

<div class="ic-container">
    <section class="ic-banner-area d-flex align-items-center" style="background-image: url(public/assets/images/banner-bg.jpg)">
        <div class="container">
            <div class="ic-banner-content">
                <h1>You can learn anything
                    for bright future</h1>
                <p>Anywhere, anytime. Start learning today!</p>
                <div class="banner-search">
                    <input type="text" name="search" placeholder="search what do you learn">
                    <i class="icofont-search"></i>
                </div>
            </div>
        </div>
    </section>
</div>


<!--Banner Area End-->

<!--Category Area Start-->

<section class="ic-category-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <div class="ic-category-header">
                    <h1>Course <span>categories</span></h1>
                </div>
            </div>
            <div class="col-sm-5">
               <div class="ic-course-view-detais">
                    <a href="#">view all category</a>
               </div>
               
            </div>
        </div>
        

        <div id="ic-owl-category" class="owl-carousel owl-theme">
           

            @foreach ($data as $cat)

                @foreach ($subCategory as $id=>$sub)

                    @if ($sub->course_category_parent_id==$cat->course_category_id)

                        @php
                            $id=$cat->course_category_id 
                        @endphp                      
                        
                    @endif
                    
                    
                @endforeach
                
                @if ($id!=$cat->course_category_id)
                    <div class="item">
                        <a href="#">
                            <div class="ic-course-category-content">
                                <div class="content">
                                    <img src="{{asset('public')}}/assets/images/category1.jpg" class="img-fluid" alt="">
                                    <h6>{{$cat->course_category_name}}</h6>
                                </div>
                                <div class="hover-content-warper">
                                    <div class="hover-content">
                                        <h6>Total {{$cat->totalcourse}}+ courses</h6>
                                    </div>
                                </div>
        
                            </div>
                        </a>
                    </div>
                    
                @endif
            
            @endforeach
            
        </div>
    </div>
</section>

<!--Category Area End-->


<!--Course Area Start-->
<section class="ic-course-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="ic-course-header">
                    <h4>The world's largest selection of courses</h4>
                    <p>Choose from 100,000 online video courses with new additions published every month</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ic-course-filter">
                    <div class="btn-group">


                        <button type="button" class="btn category-button ic-course-active" data-filter="all">new course</button>

                        <button type="button" class="btn category-button" data-filter="top">top courses</button>


                        <button type="button" class="btn category-button" data-filter="featured">Featured course </button>

                        <button type="button" class="btn category-button" data-filter="free">free course</button>

                        <button type="button" class="btn category-button" data-filter="best">best selling course</button>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <!--item 1-->
            @foreach ($allCourses as $item)
            <div class="col-md-3 col-sm-6  all  best ic-col-mb">
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
                <div class="ic-course-top-title">
                    <p>Bestseller</p>
                </div>
            </div>
            @endforeach
            @foreach ($allCourses as $item)
            <div class="col-md-3 col-sm-6  all top featured">
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
                <div class="ic-course-top-title">
                    <p>Bestseller</p>
                </div>
            </div>
            @endforeach
            
            @foreach ($freeCourses as $item)
            <div class="col-md-3 col-sm-6  all free">
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
                <div class="ic-course-top-title">
                    <p>Bestseller</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="ic-all-course-bottom-btn text-center">
                    <button type="button"><a href="{{route('user.allCourse')}}">all new courses</a></button>
                </div>
            </div>
        </div>




    </div>
</section>
<!--Course Area End-->


<!--Get Start Area-->

<section class="ic-get-start-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="ic-get-start-left">
                    <img src="{{asset('public')}}/assets/images/learn.png" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="ic-get-start-right">
                    <h2>Become a expert with us. <span>Learn From Anywhere</span> </h2>
                    <p>Take classes on the go with the Skillshare app. Stream or download to watch on the plane, the subway, or wherever you learn best.</p>
                    <button><a href="#">get start now</a></button>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Get Start Area-->


<!--Blog Area Start-->

<section class="ic-blog-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="ic-blog-title">
                    <h2>Latest blog</h2>
                    <p>Choose from 100,000 online video courses with new additions published every month</p>
                </div>
            </div>
        </div>
        <div class="row">
            

            @forelse ($dataBlog as $item)
            <div class="col-md-4 col-sm-6">
                <div class="ic-blog-content">
                   <a href="{{route('user.blogDetails',$item['blog_id'])}}"><img src="{{$item['blog_image']}}" class="img-fluid" alt=""></a> 
                    <p class="author">Post By {{$item['blog_blooger_name']}} / {{date('d F, Y',strtotime($item['blog_date']))}}</p>
                    <h4><a href="{{route('user.blogDetails',$item['blog_id'])}}">{{$item['blog_title']}}</a></h4>
                    <p>{!!$item['blog_details']!!}</p>
                </div>
            </div>
            @empty
                <h3 style="color: #ff6b1b">Sorry No Blog Content is Available</h3>
            @endforelse
            

        </div>
    </div>
</section>

    
@endsection