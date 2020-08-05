@extends('Layouts.user-home')
@section('title')
    Course Contain Details
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


    <!--Course Demo Video Area Start-->

    <section class="ic-demo-video-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ic-demo-video-header">
                        <h2>{{$course->course_name}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="ic-demo-video-left">
                        <div class="title">
                            <p>01. Section: <span>{{$content->course_content_title}}</span> </p>
                        </div>
                        <div class="ic-checkbox">
                            @if ($checkid==1)
                            <input type="checkbox" id="checkbox" disabled="disabled" checked>
                            <label for="checkbox"></label>
                            <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,1])}}" class="ic-demo ic-demo-video-active">Video Tutorial</a>
                            @else
                            <input type="checkbox" id="checkbox" disabled="disabled">
                            <label for="checkbox"></label>
                            <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,1])}}" class="">Video Tutorial</a>
                            @endif
                            
                        </div>
                        <div class="ic-checkbox">
                            @if ($checkid==2)
                            <input type="checkbox" id="checkbox" disabled="disabled" checked>
                            <label for="checkbox"></label>
                            <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,2])}}" class="ic-demo ic-demo-video-active">Readable PDF</a>
                            @else
                            <input type="checkbox" id="checkbox" disabled="disabled">
                            <label for="checkbox"></label>
                            <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,2])}}" class="">Readable PDF</a>
                            @endif
                            
                        </div>
                        <div class="ic-checkbox">
                            @if ($checkid==3)
                            <input type="checkbox" id="checkbox" disabled="disabled" checked>
                            <label for="checkbox"></label>
                            <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,3])}}" class="ic-demo ic-demo-video-active">Audio Tutorial</a>
                            @else
                            <input type="checkbox" id="checkbox" disabled="disabled">
                            <label for="checkbox"></label>
                            <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,3])}}">Audio Tutorial</a>
                            @endif
                            
                        </div>
                        @if ($content->course_content_online_test==1)
                        <div class="ic-checkbox">
                            @if ($checkid==4)
                            <input type="checkbox" id="checkbox" disabled="disabled" checked>
                            <label for="checkbox"></label>
                            <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,4])}}" class="ic-demo ic-demo-video-active">Online test</a>
                            @else
                            <input type="checkbox" id="checkbox" disabled="disabled">
                            <label for="checkbox"></label>
                            <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,4])}}">Online test</a>
                            @endif
                            
                        </div>
                        @endif
                        @if ($content->course_content_result==1)
                        <div class="ic-checkbox">
                            @if ($checkid==5)
                            <input type="checkbox" id="checkbox" disabled="disabled" checked>
                            <label for="checkbox"></label>
                            <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,5])}}" class="ic-demo ic-demo-video-active">Result</a>
                            @else
                            <input type="checkbox" id="checkbox" disabled="disabled">
                            <label for="checkbox"></label>
                            <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,5])}}">Result</a>
                            @endif
                            
                        </div>
                        @endif
                        @if ($content->course_content_contactform==1)
                        <div class="ic-checkbox">
                            @if ($checkid==6)
                            <input type="checkbox" id="checkbox" disabled="disabled" checked>
                            <label for="checkbox"></label>
                            <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,6])}}" class="ic-demo ic-demo-video-active">Contact Form</a>
                            @else
                            <input type="checkbox" id="checkbox" disabled="disabled">
                            <label for="checkbox"></label>
                            <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,6])}}">Contact Form</a>
                            @endif
                            
                        </div>
                        @endif
                        
                        
                        
                    </div>
                </div>
                @if ($contentVideo->course_content_video_title)
                <div class="col-md-8">
                    <div class="ic-demo-video-right">
                        <h4>{{$contentVideo->course_content_video_title}}</h4>

                        @if ($contentVideo->course_content_course_video)
                            <div class="video-wrapper ic-course-demo-video">
                                <video poster="{{asset('public/assets/lecture')}}/{{$contentVideo->course_content_video_poster}}" controls>
                                    <source src="{{asset('public/assets/lecture')}}/{{$contentVideo->course_content_course_video}}" type="video/mp4">
                                </video>
                            </div>
                        @endif
                        
                        <div class="ic-demo-video-right-content">
                            <div id="ic-demo-video-main">

                                <div class="accordion" id="ic-demo-faq">

                                    @if ($contentVideo->course_content_video_summary)
                                    <div class="card">
                                        <div class="card-header" id="ic-demo-faqhead1">
                                            <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#ic-demo-faq1" aria-expanded="true" aria-controls="ic-demo-faq1">Summery</a>
                                        </div>

                                        <div id="ic-demo-faq1" class="collapse show" aria-labelledby="ic-demo-faqhead1" data-parent="#ic-demo-faq">
                                            <div class="card-body ic-demo-card-body">
                                                <div class="ic-demo-video-card-body">
                                                    <p>{{$contentVideo->course_content_video_summary}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($contentVideo->course_content_video_summary)
                                    <div class="card">
                                        <div class="card-header" id="ic-demo-faqhead2">
                                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#ic-demo-faq2" aria-expanded="true" aria-controls="ic-demo-faq2">Exercise File</a>
                                        </div>

                                        <div id="ic-demo-faq2" class="collapse" aria-labelledby="ic-demo-faqhead2" data-parent="#ic-demo-faq">
                                            <div class="card-body">
                                                {{$contentVideo->course_content_video_excercise}}
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    

                                </div>

                            </div>
                        </div>

                        <div class="ic-course-demo-video-bottom">
                            <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,2])}}" class="btn">
                                Readable PDF <i class="icofont-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @if ($contentVideo->course_content_pdf_title)
                <div class="col-md-8">
                    <div class="ic-demo-video-right">
                        <h4>{{$contentVideo->course_content_pdf_title}}</h4>
                        <div class="ic-course-demo-pdf-content">

                            @if ($contentVideo->course_content_pdf)
                            
                            <embed src="{{asset('public/assets/lecture')}}/{{$contentVideo->course_content_pdf}}" width="625" height="425">
                                {{-- <iframe src="{{asset('assets/lecture')}}/{{$contentVideo->course_content_pdf}}#toolbar=0" width="100%" height="500px"></iframe> --}}
                            @endif
                            
                            <p>{{$contentVideo->course_content_pdfdescription}}</p>
                        </div>



                        <div class="ic-course-demo-pdf-bottom">
                            <div class="row">
                                <div class="col-sm-6 ic-col-xs">
                                    <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,1])}}" class="btn">
                                     <i class="icofont-long-arrow-left"></i>  Video Tutorial
                                    </a>
                                </div>
                                <div class="col-sm-6 ic-col-xs text-right">
                                    <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,3])}}" class="btn">
                                         Audio Tutorial  <i class="icofont-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endif
                @if ($contentVideo->course_content_audio_title)
                <div class="col-md-8">
                    <div class="ic-demo-video-right">
                        <h4>{{$contentVideo->course_content_audio_title}}</h4>

                        <div class="ic-demo-audio-content">
                            <div class="ic-demo-audio-player">
                                <div id="player">

                                </div>

                            </div>
                            <p>{{$contentVideo->course_content_audio_description}}</p>
                            <div class="ic-course-demo-pdf-bottom">
                                <div class="ic-demo-audio-btn">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,2])}}" class="btn">
                                                <i class="icofont-long-arrow-left"></i> Readable PDF
                                            </a>
                                        </div>
                                        @if ($content->course_content_online_test==1)
                                        <div class="col-sm-6 text-right">
                                            <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,4])}}" class="btn">
                                                Online Test <i class="icofont-long-arrow-right"></i>
                                            </a>
                                        </div>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if ($contentVideo->course_content_online_test)

                <div class="col-md-8">
                    <div class="ic-demo-video-right">
                        <h4>Your Title Here</h4>

                        <div id="online-test1" class="ic-online-test-content">
                            <h5>Q1. Was Passt?</h5>
                            <div class="row ic-row-sm">
                                <div class="col-lg-5">
                                    <div class="ic-online-question-title">
                                        <p class="ic-line-m"><i class="icofont-ui-press"></i> Wie <span>heiBen</span> Sie? </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 offset-lg-1">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="bulgy-radios" role="radiogroup">
                                                <label>
                                                    <input type="radio" name="options" checked />
                                                    <span class="radio"></span>
                                                    <span class="label">HeiBen</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="bulgy-radios" role="radiogroup" >
                                                <label>
                                                    <input type="radio" name="options" />
                                                    <span class="radio"></span>
                                                    <span class="label">HeiBt</span>
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="bulgy-radios" role="radiogroup">
                                                <label>
                                                    <input type="radio" name="options" />
                                                    <span class="radio"></span>
                                                    <span class="label">HeiBe</span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Item 2-->
                            <div class="row ic-row-sm">
                                <div class="col-lg-5">
                                    <div class="ic-online-question-title">
                                        <p>1. Er . . . . . . . . .Betriebswirtschaft</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 offset-lg-1">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="bulgy-radios" role="radiogroup">
                                                <label>
                                                    <input type="radio" name="options2" />
                                                    <span class="radio"></span>
                                                    <span class="label">Studierst</span>
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="bulgy-radios" role="radiogroup">
                                                <label>
                                                    <input type="radio" name="options2" />
                                                    <span class="radio"></span>
                                                    <span class="label">Studieren</span>
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="bulgy-radios" role="radiogroup">
                                                <label>
                                                    <input type="radio" name="options2" />
                                                    <span class="radio"></span>
                                                    <span class="label">Studiert</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Item 3-->
                            <div class="row ic-row-sm">
                                <div class="col-lg-5">
                                    <div class="ic-online-question-title">
                                        <p>2. Wo . . . . . . . . .Sarah?</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 offset-lg-1">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="bulgy-radios" role="radiogroup">
                                                <label>
                                                    <input type="radio" name="options3" />
                                                    <span class="radio"></span>
                                                    <span class="label"> Wohen </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="bulgy-radios" role="radiogroup">
                                                <label>
                                                    <input type="radio" name="options3" />
                                                    <span class="radio"></span>
                                                    <span class="label">Wohn </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="bulgy-radios" role="radiogroup" >
                                                <label>
                                                    <input type="radio" name="options3" />
                                                    <span class="radio"></span>
                                                    <span class="label">Wohnst</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Item 4-->
                            <div class="row ic-row-sm">
                                <div class="col-lg-5">
                                    <div class="ic-online-question-title">
                                        <p>3. Was bist. . . . . . . . .von Beruf?</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 offset-lg-1">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="bulgy-radios" role="radiogroup">
                                                <label>
                                                    <input type="radio" name="options4" />
                                                    <span class="radio"></span>
                                                    <span class="label">Du</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="bulgy-radios" role="radiogroup">
                                                <label>
                                                    <input type="radio" name="options4" />
                                                    <span class="radio"></span>
                                                    <span class="label"> Sie</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="bulgy-radios" role="radiogroup">
                                                <label>
                                                    <input type="radio" name="options4" />
                                                    <span class="radio"></span>
                                                    <span class="label">ch</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Item 5-->
                            <div class="row ic-row-sm">
                                <div class="col-lg-5">
                                    <div class="ic-online-question-title">
                                        <p>4. Woher . . . . . . . . . Sie? </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 offset-lg-1">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="bulgy-radios" role="radiogroup">
                                                <label>
                                                    <input type="radio" name="options5" />
                                                    <span class="radio"></span>
                                                    <span class="label"> Kommen</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="bulgy-radios" role="radiogroup" >
                                                <label>
                                                    <input type="radio" name="options5" />
                                                    <span class="radio"></span>
                                                    <span class="label">Komme</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="bulgy-radios" role="radiogroup" >
                                                <label>
                                                    <input type="radio" name="options5" />
                                                    <span class="radio"></span>
                                                    <span class="label">Kommt</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Item 6-->
                            <div class="row ic-row-sm">
                                <div class="col-lg-5">
                                    <div class="ic-online-question-title">
                                        <p>5. Frau Binder . . . . . . . . .Lehrerin? </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 offset-lg-1">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="bulgy-radios" role="radiogroup" >
                                                <label>
                                                    <input type="radio" name="options6" />
                                                    <span class="radio"></span>
                                                    <span class="label"> Bin</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="bulgy-radios" role="radiogroup" >
                                                <label>
                                                    <input type="radio" name="options6" />
                                                    <span class="radio"></span>
                                                    <span class="label"> Sind </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="bulgy-radios" role="radiogroup" >
                                                <label>
                                                    <input type="radio" name="options6" />
                                                    <span class="radio"></span>
                                                    <span class="label"> Ist</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="ic-test-question-btn1" class="ic-online-test-bottom">
                                <a class="btn">Submit</a>
                            </div>
                        </div>
                        <div id="online-test2">
                            <div class="ic-online-test2-image">
                                <img src="{{asset('public')}}/assets/images/online-test.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="ic-online-test-question2">
                                <h5>Q2. Erganzen Sie?</h5>
                                <p><i class="icofont-ui-press"></i> Faru Binder <span>wohnt</span> in Berline. (wohnen)</p>
                                <ul>
                                    <li> Sarah <input type="text" placeholder=".  .   .  .   .   .   .   .   ."> aus Frankreich. (Kommen)</li>
                                    <li> kh<input type="text" placeholder=".  .  .   .  .   .   .   .   .   .">Rudi Zollner. (heiben)</li>
                                    <li> Sarah<input type="text" placeholder=".  .  .   .  .   .   .   .   .   .">aus Frankreich. (Kommen)</li>
                                    <li> kh <input type="text" placeholder=".  .   .  .   .   .   .   .   .">Rudi Zollner. (heiben)</li>
                                    <li> Sarah<input type="text" placeholder=".  .  .   .  .   .   .   .   .   .">aus Frankreich. (Kommen) (heiben)</li>
                                    <li> kh<input type="text" placeholder=".  .  .   .  .   .   .   .   .   .">.Rudi Zollner. (heiben)</li>
                                    <li> Sarah. <input type="text" placeholder=".  .   .  .   .   .   .   .   .">aus Frankreich. (Kommen)</li>
                                    <li> kh<input type="text" placeholder=".  .  .   .  .   .   .   .   .   .">Rudi Zollner. (heiben)</li>
                                    <li> Sarah<input type="text" placeholder=".  .  .   .  .   .   .   .   .   .">aus Frankreich. (Kommen)</li>
                                    <li> kh<input type="text" placeholder=".  .  .   .  .   .   .   .   .   .">Rudi Zollner. (heiben)</li>
                                    <li> Sarah<input type="text" placeholder=".  .  .   .  .   .   .   .   .   ."> .aus Frankreich. (Kommen)</li>
                                    <li> kh<input type="text" placeholder=".  .  .   .  .   .   .   .   .   .">Rudi Zollner. (heiben)</li>
                                </ul>
                            </div>
                            <div id="ic-test-question-btn2" class="ic-online-test-bottom">
                                <a class="btn">Submit</a>
                            </div>

                        </div>
                        <div id="online-test3">
                            <h3>Q3. Erganzen Sie die Verben.</h3>
                            <p>Most UFO sightings occur <input type="text" placeholder=".  .   .  .   .   .   .   .   ."> (during) the night, either late in the evening or in the early hours of the morning, <input type="text" placeholder=".  .   .  .   .   .   .   .   ."> (Often) they take place on a dark moonless night when the person <input type="text" placeholder=".  .   .  .   .   .   .   .   ."> (was) alone on a country road. This eerie atmosphere is perfect <input type="text" placeholder=".  .   .  .   .   .   .   .   ."> (Prepossition) playing tricks on a person’s imagination. Police and newspaper officers are often swamped <input type="text" placeholder=".  .   .  .   .   .   .   .   ."> (Prepossition) calls when something strange is seen in the skies, <input type="text" placeholder=".  .   .  .   .   .   .   .   ."> (How, Then, Once, Before) an explanation is given, most people are happy to accept it.</p>

                            <div id="ic-test-question-btn3" class="ic-online-test-bottom">
                                <a class="btn">Submit Your Exam</a>
                            </div>
                        </div>


                    </div>
                    <div id="ic-modal" class="ic-online-test-modal text-center animated fadeInDown">
                        <h2>Thank you</h2>
                        <p> Congratulation To Get 80% Marks</p>
                        <a class="btn question-next1">Next</a>
                    </div>
                    <div id="ic-modal2" class="ic-online-test-modal text-center animated fadeInDown">
                        <h2>Thank you</h2>
                        <p> Congratulation To Get 80% Marks</p>
                        <a class="btn  question-next2">Next</a>
                    </div>
                    <div id="ic-modal3" class="ic-online-test-modal text-center animated fadeInDown">
                        <h2>Thank you</h2>
                        <p> Congratulation To Get 80% Marks</p>
                        <a href="result.html" class="btn  question-next2">Next</a>
                    </div>
                </div>
                    
                @endif
                @if ($contentVideo->course_content_result)
                <div class="col-md-8">
                    <div class="ic-demo-video-right">
                        <h4>Introduction Exam Result</h4>
                        <div class="ic-online-test-result-area">
                            <div class="thank-warper text-center">
                                <h2>Thank You</h2>
                                <p>For Attending Online Exam & Congratulation To Get 80% Marks And Welcome For The Next Section</p>
                            </div>
                            <div class="ic-result-mark-content">
                                <h4>Onlin Exam Result marks</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>

                                <table class="table table-bordered ic-table">

                                    <tr>
                                        <td class="ic-td">You must work hard to achieve your goal. So please study <br> hard. Otherwise, we cannot give you access to the next <br> lesson.</td>
                                        <td class="ic-td-right">=> 60%</td>
                                    </tr>
                                    <tr>

                                        <td class="ic-td">You are close to the next lesson. You must reach at least 80% <br>to continue with the next lesson. So please repeat the <br> exams.</td>
                                        <td class="ic-td-right">=> 70%</td>
                                    </tr>
                                    <tr>
                                        <td class="ic-td">Not bad. You may now proceed to your next lesson.</td>
                                        <td class="ic-td-right">=> 80%</td>
                                    </tr>
                                    <tr>
                                        <td class="ic-td">Congratulations, you have done a very good job. Your hard <br> work will definitely bring good results.</td>
                                        <td class="ic-td-right">=> 90 - 100%</td>
                                    </tr>

                                </table>
                                <div class="ic-note">
                                    <p> <span>Note:</span> If a student has passed at least 80% of their performance, they can proceed to the next lesson, otherwise they must repeat the exam until they have got at least 80% marks.</p>
                                </div>
                                <div class="ic-result-btn">
                                    <a href="demo-contact.html" class="btn">Submit Your Contact</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                    
                @endif
                @if ($contentVideo->course_content_contactform)
                <div class="col-md-8">
                    <div class="ic-demo-video-right">
                        <h4>Contact Form</h4>
                        <div class="ic-demo-contact-area">
                            <h4>Submit Your Contact Info</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Lesson Nr.">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="" class="form-control" placeholder="Your Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="file-upload">
                                        <input class="file-upload__input" type="file" name="myFile[]" id="myFile" multiple>
                                        <button class="file-upload__button" type="button">Upload Your Image</button>
                                        <span class="file-upload__label"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="ic-demo-contact-btn">
                                        <a href="#" class="btn">Submit & Next Section</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                @endif
                
            </div>
        </div>
    </section>
    <script>

        $(document).ready(function() {
            $("#player").vpplayer({
                src: "{{asset('public/assets/lecture')}}/{{$contentVideo->course_content_audio}}",
                trackName: "sample audio",
            });
        });

    </script>
    <!--Course Demo Video Area End-->
    
@endsection