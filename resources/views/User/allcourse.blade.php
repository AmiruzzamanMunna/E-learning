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
                            <p> <span>//<a href="{{URL::current()}}">Course</a></span></p>
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

                        @if (count($data)>0)
                            <div id="ic-owl-popular" class="owl-carousel owl-theme ic-course-owl">
                                
                                    
                                @foreach($data as $key=>$item)

                                    <div class="item">
                                        <div class="ic-course-content">
                                            <img src="{{asset('public/assets/images/Course')}}/{{$item->course_image}}" style="max-height: 205px" class="img-fluid" alt="">
                                            <div class="title">
                                                <h6><a href="{{route('user.courseDetails',$item->course_id)}}">{{$item->course_name}}</a></h6>
                                                <p>{{$item->course_authorname}}</p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="ratng">
                                                    
                                                    @if (($allRatings[$key])['ratings']!=0)
                                                        
                                                        @for($i=0;$i<(($allRatings[$key])['ratings']);$i++)
                                                            <i class="icofont-star"></i>
                                                        @endfor
                                                        
                                                    @else
                                                        <i style="color:#333333" class="icofont-star"></i>
                                                        <i style="color:#333333" class="icofont-star"></i>
                                                        <i style="color:#333333" class="icofont-star"></i>
                                                        <i style="color:#333333" class="icofont-star"></i>
                                                        <i style="color:#333333" class="icofont-star"></i>

                                                    @endif
                                                    
                                                    <span><span class="color">{{$allRatings[$key]['ratings']}}</span> ({{$allRatings[$key]['totaluser']}} Ratings)</span>
                                                </div>
                                                <div class="time">
                                                    <p>{{$item->course_credithour}}Hrs</p>
                                                </div>
                                            </div>
                                            <div class="price">

                                                @if ($item->course_free_course==1)
                                                    <p><s>${{$item->course_price}}</s> Free<p>
                                                @else
                                                    <p>${{$item->course_price}}<p>
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                @endforeach
                            </div>
                        @else
                                <h2 style="color: #ff6b1b">Sorry No Course is Available under this Category.</h2>
                        @endif

                    </div>
                    <div class="tab-pane fade" id="trending" role="tabpanel" aria-labelledby="trending-tab">
                        @if (count($data)>0)
                            <div id="ic-owl-trending" class="owl-carousel owl-theme ic-course-owl">
                
                                @foreach ($data as $key=>$item)

                                    <div class="item">
                                        <div class="ic-course-content">
                                            <img src="" style="max-height: 205px" class="img-fluid" alt="">
                                            <div class="title">
                                                <h6><a href="{{route('user.courseDetails',$item->course_id)}}">{{$item->course_name}}</a></h6>
                                                <p>{{$item->course_authorname}}</p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="ratng">
                                                    
                                                    @if (($allRatings[$key])['ratings']!=0)
                                                        
                                                        @for($i=0;$i<(($allRatings[$key])['ratings']);$i++)
                                                            <i class="icofont-star"></i>
                                                        @endfor
                                                        
                                                    @else
                                                        <i style="color:#333333" class="icofont-star"></i>
                                                        <i style="color:#333333" class="icofont-star"></i>
                                                        <i style="color:#333333" class="icofont-star"></i>
                                                        <i style="color:#333333" class="icofont-star"></i>
                                                        <i style="color:#333333" class="icofont-star"></i>

                                                    @endif
                                                    
                                                    <span><span class="color">{{$allRatings[$key]['ratings']}}</span> ({{$allRatings[$key]['totaluser']}} Ratings)</span>
                                                </div>
                                                <div class="time">
                                                    <p>{{$item->course_credithour}}Hrs</p>
                                                </div>
                                            </div>
                                            <div class="price">
                                                @if ($item->course_free_course==1)
                                                    <p><s>${{$item->course_price}}</s> Free<p>
                                                @else
                                                    <p>${{$item->course_price}}<p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                            
                                @endforeach

                            </div>

                        @else
                            <h2 style="color: #ff6b1b">Sorry No Course is Available under this Category</h2>
                        @endif

                    </div>
                    
                    <div class="tab-pane fade" id="free" role="tabpanel" aria-labelledby="free-tab">
                        @if (count($freeCourse)>0)
                            <div id="ic-owl-free" class="owl-carousel owl-theme ic-course-owl">

                                @foreach($freeCourse as $key=>$item)

                                    <div class="item">
                                        <div class="ic-course-content">
                                            <img src="{{asset('public/assets/images/Course')}}/{{$item->course_image}}" style="max-height: 205px" class="img-fluid" alt="">
                                            <div class="title">
                                                <h6><a href="{{route('user.courseDetails',$item->course_id)}}">{{$item->course_name}}</a></h6>
                                                <p>{{$item->course_authorname}}</p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="ratng">
                                                    
                                                    @if (($freeRatings[$key])['ratings']!=0)
                                                        
                                                        @for($i=0;$i<(($freeRatings[$key])['ratings']);$i++)
                                                            <i class="icofont-star"></i>
                                                        @endfor
                                                        
                                                    @else
                                                        <i style="color:#333333" class="icofont-star"></i>
                                                        <i style="color:#333333" class="icofont-star"></i>
                                                        <i style="color:#333333" class="icofont-star"></i>
                                                        <i style="color:#333333" class="icofont-star"></i>
                                                        <i style="color:#333333" class="icofont-star"></i>
                                                        

                                                    @endif
                                                    
                                                    <span><span class="color">{{$freeRatings[$key]['ratings']}}</span> ({{$freeRatings[$key]['totaluser']}} Ratings)</span>
                                                </div>
                                                <div class="time">
                                                    <p>{{$item->course_credithour}}Hrs</p>
                                                </div>
                                            </div>
                                            <div class="price">
                                                @if ($item->course_free_course==1)
                                                    <p><s>${{$item->course_price}}</s> Free<p>
                                                @else
                                                    <p>${{$item->course_price}}<p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                @endforeach
                                
                            </div>
                        @else
                            <h2 style="color: #ff6b1b">Sorry No Course is Available under this Category</h2>
                        @endif
                        

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
                    
                    @foreach ($featuredCourse as $key=>$item)
                    <div class="col-md-6">
                        <div class="ic-featured-course-left">
                            <img src="{{asset('public/assets/images/Course')}}/{{$item->course_image}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ic-featured-course-right">
                            <div class="title">
                                <p>Featured Course</p>
                                <h4>{{$item->course_short_title}} </h4>
                                {{-- <span>Last Updated August 2018</span> --}}
                            </div>
                            <div class="body-text">
                                <p>{{$item->course_short_title}}</p>
                                <p class="created-by"> Created by {{$item->course_authorname}}</p>
                                <p class="created-by"><span> {{$item->difficulty_level_name}}</span> / <span>{{$item->course_credithour}} Hours </span> / <span>{{$featuredcountItem[$key]['count']}} Lectures </span> / <span>{{$featuredcountItem[$key]['exam']}} Exams</span></p>
                            </div>
                            <div class="rating-enroll">
                                <div class="rating">
                                    
                                    @if ($featuredRatings[$key]->ratings!=0)
                                        
                                        @for($i=0;$i<$featuredRatings[$key]->ratings;$i++)
                                            <i class="icofont-star"></i>
                                        @endfor
                                        
                                    @else
                                        <i style="color:#333333" class="icofont-star"></i>
                                        <i style="color:#333333" class="icofont-star"></i>
                                        <i style="color:#333333" class="icofont-star"></i>
                                        <i style="color:#333333" class="icofont-star"></i>
                                        <i style="color:#333333" class="icofont-star"></i>

                                    @endif
                                    <span><span class="color">{{$featuredRatings[$key]->ratings}}</span> ({{$featuredRatings[$key]->totaluser}} Ratings)</span>
                                </div>
                                <div class="enroll">
                                    <p>{{$featuredcountItem[$key]['enroll']}} Students Enrolled</p>
                                </div>
                            </div>
                            <div class="price">
                                @if ($item->course_free_course==1)
                                    <p><s>${{$item->course_price}}</s> Free<p>
                                @else
                                    <p>${{$item->course_price}}<p>
                                @endif
                            </div>
                            <div class="featured-bottom">
                                <button type="button"><a style="text-decoration: none;color:white" href="{{route('user.courseDetails',$item->course_id)}}">Start Now</a></button>
                                <p><i class="icofont-ui-love"></i> Add To Favorite</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
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
                            <select onchange="filterDropDown()" id="filter">
                                <option value="0">Most Popular</option>
                                <option value="1">Trending</option>
                                <option value="2">Free Course</option>
                            
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
                                @foreach ($difficultyLevel as $item)
                                    <p><a onclick="skillFiltering({{$item->difficulty_level_id}})">{{$item->difficulty_level_name}}</a></p>
                                @endforeach
                               
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-6">
                            <div class="ic-experience-course-rating">
                                <h4>Rating</h4>
                                <div class="icon" onclick="ratingsFiltering(5)">
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                </div>
                                <div class="icon" onclick="ratingsFiltering(4)">
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="icon" onclick="ratingsFiltering(3)">
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="icon" onclick="ratingsFiltering(2)">
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="icon" onclick="ratingsFiltering(1)">
                                    <i class="icofont-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- <div class="ic-experience-course-video-duration">
                        <div class="experience-course-select">
                            <select>
                                <option value="0">Video Duration</option>
                                <option value="1">30 Hours</option>
                                <option value="2">40 Hours</option>
                                <option value="4">50 Hours</option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="ic-experience-course-price">
                        <div class="price-course-select">
                            <select id="price" onchange="priceFiltering()">
                                <option value="-1">Price</option>
                                <option value="0">Paid</option>
                                <option value="1">Free</option>
                            </select>
                        </div>
                    </div>
                    <div class="ic-experience-course-topic">
                        <div class="topic-course-select">
                            <select id="category" onchange="topicsFiltering()">
                                <option value="0">Topics</option>
                                @foreach ($allCategory as $item)
                                    <option value="{{$item->course_category_id}}">{{$item->course_category_name}}</option>
                                @endforeach
                            
                            </select>
                        </div>
                    </div>
                    <div class="ic-experience-course-author">
                        <div class="author-course-select">
                            <select id="author" onchange="autorFiltering()">
                                <option value="0">Authors</option>
                                @foreach ($allAuthor as $item)
                                    <option value="{{$item->course_authorname}}">{{$item->course_authorname}}</option>
                                @endforeach
                             
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-9" id="filtershow">
                    
                    @foreach($listcourse as $key=>$val)
                        @php
                            $item=$listcourse[$key];
                            $lecture=$countItem[$key];
                            
                        @endphp
                       
                        <div class="ic-user-experience-course-right">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="course-image">
                                        <img src="{{asset('public/assets/images/Course')}}/{{$item->course_image}}" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="col-md-8 ic-col-pl-0">
                                    <div class="content">
                                        <div class="ic-featured-course-right">
                                            <div class="title">

                                                <h4><a href="{{route('user.courseDetails',$item->course_id)}}">{{$item->course_name}}</a></h4>
                                                {{-- <span>Last Updated August 2018</span> --}}
                                            </div>
                                            <div class="body-text">

                                                <p class="created-by"> Created by {{$item->course_authorname}}</p>

                                                <p><span> {{$item->difficulty_level_name}} </span> / <span> {{$item->course_credithour}} Hours </span> / <span>{{$lecture['count']}} Lectures </span> / 
                                                    @if ($lecture['exam'])
                                                    <span>{{$lecture['exam']}} Exams</span>
                                                    @else
                                                    <span>0 Exams</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="rating-enroll experience-enroll">
                                                <div class="rating">
                                                    
                                                    @if ($listRatings[$key]['ratings']!=0)
                                                        
                                                        @for($i=0;$i<$listRatings[$key]['ratings'];$i++)
                                                            <i class="icofont-star"></i>
                                                        @endfor
                                                        
                                                    @else
                                                        <i style="color:#333333" class="icofont-star"></i>
                                                        <i style="color:#333333" class="icofont-star"></i>
                                                        <i style="color:#333333" class="icofont-star"></i>
                                                        <i style="color:#333333" class="icofont-star"></i>
                                                        <i style="color:#333333" class="icofont-star"></i>
                
                                                    @endif
                                                    <span><span class="color">{{$listRatings[$key]['ratings']}}</span> ({{$listRatings[$key]['totaluser']}} Ratings)</span>
                                                </div>
                                                <div class="enroll">
                                                    <p>{{$lecture['enroll']}} Students Enrolled</p>
                                                </div>
                                            </div>
                                            <div class="experience-course-price">
                                                <p>${{$item->course_price}}</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

        
                    @endforeach

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ic-course-pagination text-center">

                                <ul class="pagination">
                                    {{-- <li class="disabled">{{ $listcourse->appends(Request::all())->links() }}</li> --}}
                                    {{ $listcourse->appends(Request::all())->links() }}
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    

                </div>

            </div>
        </div>
    </section>

    <script>
        function filterDropDown(){

            let filter=$("#filter").val();
            $.ajax({

                type:'get',
                url:"{{route('user.courseFiltering')}}",
                data:{

                    filter:filter,
                },
                success:function(data){

                    console.log(data);
                    var html='';

                    if(data.data.length>0){

                        for (let index = 0; index < data.data.length; index++) {
                        
                            $item=data.data[index];

                            html+='<div class="ic-user-experience-course-right">';
                            html+='<div class="row">';
                            html+='<div class="col-md-4">';
                            html+='<div class="course-image">';
                            html+='<img src="'+$item.image+'" class="img-fluid" alt="">';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="col-md-8 ic-col-pl-0">';
                            html+='<div class="content">';
                            html+='<div class="ic-featured-course-right">';
                            html+='<div class="title">';
                            html+='<h4><a href="'+$item.route+'">'+$item.course_name+'</a></h4>';
                            html+='</div>';
                            html+='<div class="body-text">';
                            html+='<p class="created-by"> Created by '+$item.course_authorname+'</p>';
                            html+='<p><span> '+$item.difficulty_level_name+' </span> / <span> '+$item.course_credithour+' Hours </span> / <span>'+$item.count+' Lectures </span> / <span>'+$item.exam+' Exams</span></p>';
                            html+='</div>';
                            html+='<div class="rating-enroll experience-enroll">';
                            html+='<div class="rating">';
                            if(data.listRatings[index].ratings!=0){

                           
                                for($i=0;$i<data.listRatings[index].ratings;$i++){

                                    html+='<i class="icofont-star"></i>';
                                    
                                }

                            }else{

                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                            }
                            

                            html+='<p>'+data.listRatings[index].ratings+'('+data.listRatings[index].totaluser+' Ratings)</p>';
                            html+='</div>';
                            html+='<div class="enroll">';
                            html+='<p>'+$item.enroll+' Students Enrolled</p>';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="experience-course-price">';
                            if ($item.course_free_course==1) {

                                html+='<p><s>$'+$item.course_price+'</s> Free</p>';
                                
                            } else {

                                html+='<p>$'+$item.course_price+'</p>';
                            }
                            html+='<p>$'+$item.course_price+'</p>';
                            html+=' </div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                        
                        }
                        $("#filtershow").html(html);

                    }else{

                        html+='<h1 style="color:#ff6b1b">Sorry No Course is Available</h1>';
                        $("#filtershow").html(html);
                    }
                    
                    
                },
                error:function(error){

                    console.log(error);
                }
            });
        }

        function skillFiltering(id){

            $.ajax({

                type:'get',
                url:"{{route('user.skillFiltering')}}",
                data:{

                    id:id,
                },
                success:function(data){

                    console.log(data);
                    var html='';

                    if(data.data.length>0){

                        for (let index = 0; index < data.data.length; index++) {

                            $item=data.data[index];

                            html+='<div class="ic-user-experience-course-right">';
                            html+='<div class="row">';
                            html+='<div class="col-md-4">';
                            html+='<div class="course-image">';
                            html+='<img src="'+$item.image+'" class="img-fluid" alt="">';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="col-md-8 ic-col-pl-0">';
                            html+='<div class="content">';
                            html+='<div class="ic-featured-course-right">';
                            html+='<div class="title">';
                            html+='<h4><a href="'+$item.route+'">'+$item.course_name+'</a></h4>';
                            html+='</div>';
                            html+='<div class="body-text">';
                            html+='<p class="created-by"> Created by '+$item.course_authorname+'</p>';
                            html+='<p><span> '+$item.difficulty_level_name+' </span> / <span> '+$item.course_credithour+' Hours </span> / <span>'+$item.count+' Lectures </span> / <span>'+$item.exam+' Exams</span></p>';
                            html+='</div>';
                            html+='<div class="rating-enroll experience-enroll">';
                            html+='<div class="rating">';
                            if(data.listRatings[index].ratings!=0){

                        
                                for($i=0;$i<data.listRatings[index].ratings;$i++){

                                    html+='<i class="icofont-star"></i>';
                                    
                                }

                            }else{

                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                            }
                            

                            html+='<p>'+data.listRatings[index].ratings+'('+data.listRatings[index].totaluser+' Ratings)</p>';
                            html+='</div>';
                            html+='<div class="enroll">';
                            html+='<p>'+$item.enroll+' Students Enrolled</p>';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="experience-course-price">';
                            if ($item.course_free_course==1) {

                                html+='<p><s>$'+$item.course_price+'</s> Free</p>';

                            } else {

                            html+='<p>$'+$item.course_price+'</p>';
                            }
                            html+=' </div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';

                        }
                        $("#filtershow").html(html);

                    }else{

                        html+='<h1 style="color:#ff6b1b">Sorry No Course is Available</h1>';
                        $("#filtershow").html(html);
                    }

                    if(data.status=='nodata'){

                        html+='<h1 style="color:#ff6b1b">Sorry No Course is Available</h1>';
                        $("#filtershow").html(html);
                    }
                    
                    
                },
                error:function(error){

                    console.log(error);
                }
            });
        }
        function priceFiltering(){

            let filter=$("#price").val();
            $.ajax({

                type:'get',
                url:"{{route('user.priceFiltering')}}",
                data:{

                    filter:filter,
                },
                success:function(data){

                    
                    var html='';

                    if(data.data.length>0){

                        for (let index = 0; index < data.data.length; index++) {
                        
                            $item=data.data[index];

                            html+='<div class="ic-user-experience-course-right">';
                            html+='<div class="row">';
                            html+='<div class="col-md-4">';
                            html+='<div class="course-image">';
                            html+='<img src="'+$item.image+'" class="img-fluid" alt="">';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="col-md-8 ic-col-pl-0">';
                            html+='<div class="content">';
                            html+='<div class="ic-featured-course-right">';
                            html+='<div class="title">';
                            html+='<h4><a href="'+$item.route+'">'+$item.course_name+'</a></h4>';
                            html+='</div>';
                            html+='<div class="body-text">';
                            html+='<p class="created-by"> Created by '+$item.course_authorname+'</p>';
                            html+='<p><span> '+$item.difficulty_level_name+' </span> / <span> '+$item.course_credithour+' Hours </span> / <span>'+$item.count+' Lectures </span> / <span>'+$item.exam+' Exams</span></p>';
                            html+='</div>';
                            html+='<div class="rating-enroll experience-enroll">';
                            html+='<div class="rating">';
                            if(data.listRatings[index].ratings!=0){

                           
                                for($i=0;$i<data.listRatings[index].ratings;$i++){

                                    html+='<i class="icofont-star"></i>';
                                    
                                }

                            }else{

                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                            }
                            

                            html+='<p>'+data.listRatings[index].ratings+'('+data.listRatings[index].totaluser+' Ratings)</p>';
                            html+='</div>';
                            html+='<div class="enroll">';
                            html+='<p>'+$item.enroll+' Students Enrolled</p>';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="experience-course-price">';
                            if ($item.course_free_course==1) {

                                html+='<p><s>$'+$item.course_price+'</s> Free</p>';
                                console.log($item.course_price);

                            } else {

                                html+='<p>$'+$item.course_price+'</p>';
                            }
                            html+=' </div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                        
                        }
                        $("#filtershow").html(html);

                    }else{

                        html+='<h1 style="color:#ff6b1b">Sorry No Course is Available</h1>';
                        $("#filtershow").html(html);
                    }
                    
                    
                },
                error:function(error){

                    console.log(error);
                }
            });
        }
        function topicsFiltering(){

            let filter=$("#category").val();
            $.ajax({

                type:'get',
                url:"{{route('user.topicsFiltering')}}",
                data:{

                    filter:filter,
                },
                success:function(data){

                    
                    var html='';

                    if(data.data.length>0){

                        for (let index = 0; index < data.data.length; index++) {
                        
                            $item=data.data[index];

                            html+='<div class="ic-user-experience-course-right">';
                            html+='<div class="row">';
                            html+='<div class="col-md-4">';
                            html+='<div class="course-image">';
                            html+='<img src="'+$item.image+'" class="img-fluid" alt="">';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="col-md-8 ic-col-pl-0">';
                            html+='<div class="content">';
                            html+='<div class="ic-featured-course-right">';
                            html+='<div class="title">';
                            html+='<h4><a href="'+$item.route+'">'+$item.course_name+'</a></h4>';
                            html+='</div>';
                            html+='<div class="body-text">';
                            html+='<p class="created-by"> Created by '+$item.course_authorname+'</p>';
                            html+='<p><span> '+$item.difficulty_level_name+' </span> / <span> '+$item.course_credithour+' Hours </span> / <span>'+$item.count+' Lectures </span> / <span>'+$item.exam+' Exams</span></p>';
                            html+='</div>';
                            html+='<div class="rating-enroll experience-enroll">';
                            html+='<div class="rating">';
                            if(data.listRatings[index].ratings!=0){

                           
                                for($i=0;$i<data.listRatings[index].ratings;$i++){

                                    html+='<i class="icofont-star"></i>';
                                    
                                }

                            }else{

                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                            }
                            

                            html+='<p>'+data.listRatings[index].ratings+'('+data.listRatings[index].totaluser+' Ratings)</p>';
                            html+='</div>';
                            html+='<div class="enroll">';
                            html+='<p>'+$item.enroll+' Students Enrolled</p>';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="experience-course-price">';
                            if ($item.course_free_course==1) {

                                html+='<p><s>$'+$item.course_price+'</s> Free</p>';

                            }else {

                                html+='<p>$'+$item.course_price+'</p>';
                            }
                            html+=' </div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                        
                        }
                        $("#filtershow").html(html);

                    }else{

                        html+='<h1 style="color:#ff6b1b">Sorry No Course is Available</h1>';
                        $("#filtershow").html(html);
                    }
                    
                    
                },
                error:function(error){

                    console.log(error);
                }
            });
        }
        function autorFiltering(){

            let filter=$("#author").val();
            $.ajax({

                type:'get',
                url:"{{route('user.autorFiltering')}}",
                data:{

                    filter:filter,
                },
                success:function(data){

                    
                    var html='';

                    if(data.data.length>0){

                        for (let index = 0; index < data.data.length; index++) {
                        
                            $item=data.data[index];

                            html+='<div class="ic-user-experience-course-right">';
                            html+='<div class="row">';
                            html+='<div class="col-md-4">';
                            html+='<div class="course-image">';
                            html+='<img src="'+$item.image+'" class="img-fluid" alt="">';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="col-md-8 ic-col-pl-0">';
                            html+='<div class="content">';
                            html+='<div class="ic-featured-course-right">';
                            html+='<div class="title">';
                            html+='<h4><a href="'+$item.route+'">'+$item.course_name+'</a></h4>';
                            html+='</div>';
                            html+='<div class="body-text">';
                            html+='<p class="created-by"> Created by '+$item.course_authorname+'</p>';
                            html+='<p><span> '+$item.difficulty_level_name+' </span> / <span> '+$item.course_credithour+' Hours </span> / <span>'+$item.count+' Lectures </span> / <span>'+$item.exam+' Exams</span></p>';
                            html+='</div>';
                            html+='<div class="rating-enroll experience-enroll">';
                            html+='<div class="rating">';
                            if(data.listRatings[index].ratings!=0){

                           
                                for($i=0;$i<data.listRatings[index].ratings;$i++){

                                    html+='<i class="icofont-star"></i>';
                                    
                                }

                            }else{

                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                            }
                            

                            html+='<p>'+data.listRatings[index].ratings+'('+data.listRatings[index].totaluser+' Ratings)</p>';
                            html+='</div>';
                            html+='<div class="enroll">';
                            html+='<p>'+$item.enroll+' Students Enrolled</p>';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="experience-course-price">';
                            if ($item.course_free_course==1) {

                                html+='<p><s>$'+$item.course_price+'</s>Free</p>';

                            }else{

                                html+='<p>$'+$item.course_price+'</p>';
                            }
                            html+='<p>$'+$item.course_price+'</p>';
                            html+=' </div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                        
                        }
                        $("#filtershow").html(html);

                    }else{

                        html+='<h1 style="color:#ff6b1b">Sorry No Course is Available</h1>';
                        $("#filtershow").html(html);
                    }
                    
                    
                },
                error:function(error){

                    console.log(error);
                }
            });
        }
        function ratingsFiltering(id){

            
            $.ajax({

                type:'get',
                url:"{{route('user.ratingsFiltering')}}",
                data:{

                    id:id,
                },
                success:function(data){

                    
                    var html='';

                    if(data.data.length>0){

                        for (let index = 0; index < data.data.length; index++) {
                        
                            $item=data.data[index];

                            html+='<div class="ic-user-experience-course-right">';
                            html+='<div class="row">';
                            html+='<div class="col-md-4">';
                            html+='<div class="course-image">';
                            html+='<img src="'+$item.image+'" class="img-fluid" alt="">';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="col-md-8 ic-col-pl-0">';
                            html+='<div class="content">';
                            html+='<div class="ic-featured-course-right">';
                            html+='<div class="title">';
                            html+='<h4><a href="'+$item.route+'">'+$item.course_name+'</a></h4>';
                            html+='</div>';
                            html+='<div class="body-text">';
                            html+='<p class="created-by"> Created by '+$item.course_authorname+'</p>';
                            html+='<p><span> '+$item.difficulty_level_name+' </span> / <span> '+$item.course_credithour+' Hours </span> / <span>'+$item.count+' Lectures </span> / <span>'+$item.exam+' Exams</span></p>';
                            html+='</div>';
                            html+='<div class="rating-enroll experience-enroll">';
                            html+='<div class="rating">';
                            if(data.listRatings[index].ratings!=0){

                           
                                for($i=0;$i<data.listRatings[index].ratings;$i++){

                                    html+='<i class="icofont-star"></i>';
                                    
                                }

                            }else{

                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                                html+='<i style="color:#333333" class="icofont-star"></i>';
                            }
                            

                            html+='<p>'+data.listRatings[index].ratings+'('+data.listRatings[index].totaluser+' Ratings)</p>';
                            html+='</div>';
                            html+='<div class="enroll">';
                            html+='<p>'+$item.enroll+' Students Enrolled</p>';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="experience-course-price">';
                            if ($item.course_free_course==1) {

                                html+='<p><s>$'+$item.course_price+'</s> Free</p>';

                            }else {

                                html+='<p>$'+$item.course_price+'</p>';
                            }
                            html+=' </div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                        
                        }
                        $("#filtershow").html(html);

                    }else{

                        html+='<h1 style="color:#ff6b1b">Sorry No Course is Available</h1>';
                        $("#filtershow").html(html);
                    }
                    
                    
                },
                error:function(error){

                    console.log(error);
                }
            });
        }
        
    </script>
@endsection