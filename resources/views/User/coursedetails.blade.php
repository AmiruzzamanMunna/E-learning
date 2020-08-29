@extends('Layouts.user-home')
@section('title')
    Course Details
@endsection
@section('container')

    <!--Course Details Area Start-->

    <section class="ic-breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcumb-content">
                        <h2>Course Details</h2>
                        <div class="row ml-auto">
                            <p><a href="{{route('user.index')}}">Home</a></p>
                            <p> <span>//<a href="{{route('user.courseDetails',$id)}}">Course Details</a></span></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Course Details Banner Area Start-->

    <section class="ic-course-details-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="ic-course-details-banner-left">
                        <div class="title">
                            <h2>{{$data->course_name}}</h2>
                            <input type="hidden" name="" id="course_id" value="{{$data->course_id}}">
                            <p>{{$data->course_short_title}}</p>
                        </div>
                        <div class="author-duration-rating">
                            <p>{{$data->course_authorname}}</p>
                            <p><span> {{$data->difficulty_level_name}} </span> / <span> {{$data->course_credithour}} Hours </span> / <span>{{$lecture}} Lectures </span> / <span>{{$exam}} Exams</span></p>

                        </div>
                        <div class="rating-enroll">
                            <div class="rating">
                                    
                                @if ($dataRatings[0]['ratings']!=0)
                                    
                                    @for($i=0;$i<$dataRatings[0]['ratings'];$i++)
                                        <i class="icofont-star"></i>
                                    @endfor
                                    
                                @else
                                    <i class="icofont-star"></i>

                                @endif
                                <span style="color: white"><span class="color">{{$dataRatings[0]['ratings']}}</span> ({{$dataRatings[0]['totaluser']}} Ratings)</span>
                            </div>
                            <div class="enroll">
                                <p>{{$enroll}} Students Enrolled</p>
                            </div>
                        </div>
                        <div class="price">
                            <p>${{$data->course_price}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="video-wrapper">
                        <video src="{{asset('public/assets/images/Course')}}/{{$data->course_video}}" poster="{{asset('public/assets/images/course-details.jpg')}}"></video>
                    </div>
                    <div class="ic-course-details-banner-right">
                        <button type="button" class="add-cart-btn" onclick="cartAdd()">Add To Cart</button>
                        <button type="button" class="buy-now-btn" onclick="buyNow()">Buy Now</button>
                        <div class="icon" onclick="wishListAdd()">
                            <a><i class="icofont-ui-love"></i></a>
                        </div><br><br>
                        <div id="msgshow"></div>
                    </div><br><br><br>
                </div>
            </div>
        </div>
    </section>

    <!--Course Details Banner Area End-->


    <!--Course details main content-->

    <section class="ic-course-details-main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <div class="ic-course-details-main-left ic-course-details-main-left2">
                        <ul class="nav nav-tabs ic-course-details-nav-tab ic-navtabs2" id="myTab" role="tablist">
                            @foreach ($courseModule as $key=>$item)

                                @if ($key==0)

                                <li class="nav-item">
                                    <a class="nav-link active" id="content-tab" data-toggle="tab" href="#{{$item->course_module_name}}" role="tab" aria-controls="content" aria-selected="true">{{$item->course_module_name}}</a>
                                </li>
                                    
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" id="content-tab" data-toggle="tab" href="#{{$item->course_module_name}}" role="tab" aria-controls="content" aria-selected="true">{{$item->course_module_name}}</a>
                                </li>
                                @endif
                                
                            @endforeach
                            

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            @foreach ($courseModule as $key=>$item)

                                @if ($key==0)
                                    <div class="tab-pane fade show active" id="{{$item->course_module_name}}" role="tabpanel" aria-labelledby="resposiable-tab">
                                        
                                        @if ($item->course_module_file)
                                            <iframe src="{{asset('public/assets/CourseModule')}}/{{$item->course_module_file}}" frameborder="0"></iframe>
                                        @endif
                                        {!!$item->course_module_description!!}
                                        
                                    </div>
                                @else
                                    <div class="tab-pane fade" id="{{$item->course_module_name}}" role="tabpanel" aria-labelledby="resposiable-tab">
                                        
                                        @if ($item->course_module_file)
                                            <iframe src="{{asset('public/assets/CourseModule')}}/{{$item->course_module_file}}" frameborder="0"></iframe>
                                        @endif
                                        {!!$item->course_module_description!!}
                                        
                                    </div>
                                    
                                @endif
                                
                            @endforeach
                            <div class="ic-course-details-content2">
                                
                                <div class="ic-bottom">
                                    <p>Difficulty level: <span>{{$data->difficulty_level_name}}</span> </p>
                                    
        
                                    <a href="{{route('user.courseDemo',$id)}}" class="btn">Course</a>
                                </div>
                            </div>
                                    
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="ic-course-details-main-right">
                        <div class="ic-course-detais-top">
                            <h4>This Course Includes</h4>
                            <ul>
                                @foreach ($mergedContent as $item)
                                    <li>Total {{$item->course_credithour}} Credit Hour.</li>
                                    <li>Total {{$item->lecture}} Lecture.</li>
                                    <li>Total {{$item->resources}} Resources.</li>
                                    <li>{{$item->assignment}}.</li>
                                    <li>{{$item->exam}}.</li>
                                    @if ($item->certificate)
                                        <li>{{$item->certificate}} of Completion.</li>
                                    @endif
                                    
                                @endforeach
                                
                            </ul>
                        </div>

                        <div class="ic-share-course-icon">
                            <h4>Share This Course On</h4>
                            <ul>
                                <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                <li><a href="#"><i class="icofont-instagram"></i></a></li>
                                <li><a href="#"><i class="icofont-pinterest"></i></a></li>
                                <li><a href="#"><i class="icofont-github"></i></a></li>
                                <li><a href="#"><i class="icofont-youtube-play"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="ic-certification-btn">
                        <button type="button"><a href="{{route('user.CourseCertificate',$id)}}">Exam For Certification</a></button>
                    </div><br>
                    @if(session('message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Sorry!</strong> {{session('message')}}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!--Course details main content-->

<script>

    function cartAdd(){

        

        var course_id=$("#course_id").val();

        $.ajax({

            type:"get",
            url:"{{route('user.cartAdd')}}",
            data:{

                course_id:course_id
            },
            success:function(data){

                

                if(data.status=='success'){

                    let html='';

                    html+='<div class="alert alert-success alert-dismissible fade show" role="alert">';
                    html+='<strong>Success!</strong> Course Added to the Cart.';
                    html+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    html+='<span aria-hidden="true">&times;</span>';
                    html+='</button>';
                    html+='</div>';

                    $("#msgshow").html(html);
                    
                }
                if(data.status=='login'){

                    let html='';

                    html+='<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    html+='<strong>Sorry!</strong> You need to login';
                    html+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    html+='<span aria-hidden="true">&times;</span>';
                    html+='</button>';
                    html+='</div>';

                    $("#msgshow").html(html);
                    
                }
            },
            error:function(error){
                console.log(error);
            }
        })
    }
    function buyNow(){

        var course_id=$("#course_id").val();

        $.ajax({

            type:"get",
            url:"{{route('user.cartAdd')}}",
            data:{

                course_id:course_id
            },
            success:function(data){

                if(data.status=='success'){

                    location.replace("{{route('user.checkOutIndex')}}");
                    
                }
                if(data.status=='login'){

                    let html='';

                    html+='<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    html+='<strong>Sorry!</strong> You need to login';
                    html+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    html+='<span aria-hidden="true">&times;</span>';
                    html+='</button>';
                    html+='</div>';

                    $("#msgshow").html(html);

                }
            },
            error:function(error){
                console.log(error);
            }
        });
    }
    function wishListAdd(){

        var course_id=$("#course_id").val();

        $.ajax({

            type:"get",
            url:"{{route('user.wishListAdd')}}",
            data:{

                course_id:course_id
            },
            success:function(data){

                if(data.status=='success'){

                    let html='';

                    html+='<div class="alert alert-success alert-dismissible fade show" role="alert">';
                    html+='<strong>Success!</strong> Course Added to the Wish List.';
                    html+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    html+='<span aria-hidden="true">&times;</span>';
                    html+='</button>';
                    html+='</div>';

                    $("#msgshow").html(html);

                }
                if(data.status=='login'){

                    let html='';

                    html+='<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    html+='<strong>Sorry!</strong> You need to login';
                    html+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    html+='<span aria-hidden="true">&times;</span>';
                    html+='</button>';
                    html+='</div>';

                    $("#msgshow").html(html);

                }
            },
            error:function(error){
                console.log(error);
            }
        })
    }
</script>
    
@endsection