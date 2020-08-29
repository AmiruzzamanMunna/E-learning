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
                            <p> <span>//<a href="{{route('user.courseDetails',$id)}}">Course Details</a></span></p>
                            <p> <span>//<a href="{{route('user.courseDemo',$id)}}">Course Content</a> </span></p>
                            <p> <span>//<a href="{{route('user.courseDemoFile',[$id,$lectureid,$checkid])}}">Course File</a> </span></p>
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
                        <input type="hidden" id="lectureid" value="{{$lectureid}}">
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
                            @if ($content->course_content_course_video)
                                @if ($checkid==1)
                                    <input type="checkbox" id="checkbox" disabled="disabled" checked>
                                    <label for="checkbox"></label>
                                    <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,1])}}" class="ic-demo ic-demo-video-active">Video Tutorial</a>
                                @else
                                    <input type="checkbox" id="checkbox" disabled="disabled">
                                    <label for="checkbox"></label>
                                    <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,1])}}" class="">Video Tutorial</a>
                                @endif
                            @endif
                            
                            
                        </div>
                        <div class="ic-checkbox">

                            @if ($content->course_content_pdf)
                                @if ($checkid==2)
                                    <input type="checkbox" id="checkbox" disabled="disabled" checked>
                                    <label for="checkbox"></label>
                                    <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,2])}}" class="ic-demo ic-demo-video-active">Readable PDF</a>
                                @else
                                    <input type="checkbox" id="checkbox" disabled="disabled">
                                    <label for="checkbox"></label>
                                    <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,2])}}" class="">Readable PDF</a>
                                @endif
                            @endif
                                
                            
                        </div>
                        <div class="ic-checkbox">

                            @if ($content->course_content_audio)
                                @if ($checkid==3)
                                    <input type="checkbox" id="checkbox" disabled="disabled" checked>
                                    <label for="checkbox"></label>
                                    <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,3])}}" class="ic-demo ic-demo-video-active">Audio Tutorial</a>
                                @else
                                    <input type="checkbox" id="checkbox" disabled="disabled">
                                    <label for="checkbox"></label>
                                    <a href="{{route('user.courseDemoFile',[$id,$content->course_content_id,3])}}">Audio Tutorial</a>
                                @endif
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
                                <video poster="{{asset('public/assets/lecture')}}/{{$contentVideo->course_content_video_poster}}" controls autoplay controls controlsList="nodownload">
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
                                                    <p>{!!$contentVideo->course_content_video_summary!!}</p>
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
                                                {!!$contentVideo->course_content_video_excercise!!}
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
                            
                            <embed src="{{asset('public/assets/lecture')}}/{{$contentVideo->course_content_pdf}}#toolbar=0" width="625" height="425">
                                {{-- <iframe src="{{asset('public/assets/lecture')}}/{{$contentVideo->course_content_pdf}}#toolbar=0" width="100%" height="500px"></iframe> --}}
                            @endif
                            
                            <p>{!!$contentVideo->course_content_pdfdescription!!}</p>
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
                @if((!$examCheck))
                    
                    @if(($examType))
                        <input type="hidden" id="examtypeid" name="examtypeid" value="{{$examType->lecture_exam_question_type_id}}">
                        @if($examType->lecture_exam_question_type_id==2)
                            <div class="col-md-8">
                                <div class="ic-demo-video-right">
                                    <h4>{{$examType->lecture_exam_title}}</h4>

                                    <div id="online-test1" class="ic-online-test-content">
                                        
                                        @foreach($question as $key=>$each)
                                        <div class="row ic-row-sm">
                                            <div class="col-lg-5">
                                                <div class="ic-online-question-title">
                                                    <p>{{$key+1}}. {{$each->mcq_exam_name}} ?</p>
                                                    <input type="hidden" id="hidden_exam_id{{$each->mcq_exam_id}}" name="hidden_exam_id[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 offset-lg-1">
                                                <div class="row">

                                                    @foreach($examOption as $option)
                                                        @if($each->mcq_exam_id==$option->mcq_option_mcq_exam_id)
                                                        <div class="col-md-4">
                                                            <div class="bulgy-radios" role="radiogroup">
                                                                <label>
                                                                    <input onclick="radioCheck({{$each->mcq_exam_id}})" type="radio" value="{{$option->mcq_option_name}}" id="ansradio[]" name="options{{$each->mcq_exam_id}}" />
                                                                    <span class="radio"></span>
                                                                    <span class="label">{{$option->mcq_option_name}}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    
                                                    @endforeach
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    
                                        
                                        <div id="ic-test-question-btn1" class="ic-online-test-bottom">
                                            <a onclick="submitAnswer()" class="btn">Submit</a>
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
                        @if($examType->lecture_exam_question_type_id==1)
                            <div class="col-md-8">
                                <div class="ic-demo-video-right">
                                    <h4>{{$examType->lecture_exam_title}}</h4>

                                    <div id="online-test1" class="ic-online-test-content">
                                        
                                        @foreach($question as $key=>$each)
                                        <input type="hidden" id="exam_id" name="exam_id[]" value="{{$each->fill_exam_id}}">
                                        <div class="row ic-row-sm">
                                            <div class="col-lg-5">
                                                <div class="ic-online-question-title">
                                                    <p>{{$key+1}}. {{$each->tbl_fill_exam_name}} ?</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 offset-lg-1">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!-- <div class="bulgy-radios" role="radiogroup"> -->
                                                            <label>
                                                                <div class="row">
                                                                    <input type="text" class="form-control" name="ans_name[]" />
                                                                </div>
                                                                <!-- <span class="radio"></span>
                                                                <span class="label"></span> -->
                                                            </label>
                                                        <!-- </div> -->
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    
                                        
                                        <div id="ic-test-question-btn1" class="ic-online-test-bottom">
                                            <a onclick="submitAnswer()" class="btn">Submit</a>
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
                    @endif
                @else
                    
                    @if ($totalExamMarks>=80)
                        
                        <h2>You have Passed the Exam</h2>
                    @else
                        @if(($examType))
                                <input type="hidden" id="examtypeid" name="examtypeid" value="{{$examType->lecture_exam_question_type_id}}">
                                @if($examType->lecture_exam_question_type_id==2)
                                    <div class="col-md-8">
                                        <div class="ic-demo-video-right">
                                            <h4>{{$examType->lecture_exam_title}}</h4>

                                            <div id="online-test1" class="ic-online-test-content">
                                                
                                                @foreach($question as $key=>$each)
                                                <div class="row ic-row-sm">
                                                    <div class="col-lg-5">
                                                        <div class="ic-online-question-title">
                                                            <p>{{$key+1}}. {{$each->mcq_exam_name}} ?</p>
                                                            <input type="hidden" id="hidden_exam_id{{$each->mcq_exam_id}}" name="hidden_exam_id[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 offset-lg-1">
                                                        <div class="row">

                                                            @foreach($examOption as $option)
                                                                @if($each->mcq_exam_id==$option->mcq_option_mcq_exam_id)
                                                                <div class="col-md-4">
                                                                    <div class="bulgy-radios" role="radiogroup">
                                                                        <label>
                                                                            <input onclick="radioCheck({{$each->mcq_exam_id}})" type="radio" value="{{$option->mcq_option_name}}" id="ansradio[]" name="options{{$each->mcq_exam_id}}" />
                                                                            <span class="radio"></span>
                                                                            <span class="label">{{$option->mcq_option_name}}</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            
                                                            @endforeach
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            
                                                
                                                <div id="ic-test-question-btn1" class="ic-online-test-bottom">
                                                    <a onclick="submitAnswer()" class="btn">Submit</a>
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
                                @if($examType->lecture_exam_question_type_id==1)
                                    <div class="col-md-8">
                                        <div class="ic-demo-video-right">
                                            <h4>{{$examType->lecture_exam_title}}</h4>

                                            <div id="online-test1" class="ic-online-test-content">
                                                
                                                @foreach($question as $key=>$each)
                                                <input type="hidden" id="exam_id" name="exam_id[]" value="{{$each->fill_exam_id}}">
                                                <div class="row ic-row-sm">
                                                    <div class="col-lg-5">
                                                        <div class="ic-online-question-title">
                                                            <p>{{$key+1}}. {{$each->tbl_fill_exam_name}} ?</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 offset-lg-1">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <!-- <div class="bulgy-radios" role="radiogroup"> -->
                                                                    <label>
                                                                        <div class="row">
                                                                            <input type="text" class="form-control" name="ans_name[]" />
                                                                        </div>
                                                                        <!-- <span class="radio"></span>
                                                                        <span class="label"></span> -->
                                                                    </label>
                                                                <!-- </div> -->
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            
                                                
                                                <div id="ic-test-question-btn1" class="ic-online-test-bottom">
                                                    <a onclick="submitAnswer()" class="btn">Submit</a>
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
                            @endif
                            
                        @endif
                    
                @endif
                @endif
                @if ($contentVideo->course_content_result)
                <div class="col-md-8">
                    <div class="ic-demo-video-right">
                        <h4>Result</h4>
                        <div class="ic-online-test-result-area">
                            <div class="thank-warper text-center">
                                <h2>Thank You</h2>
                                <p>Congratulation To Get above 80% Marks.</p>
                            </div>
                            <div class="ic-result-mark-content">
                                {{-- <h4>Onlin Exam Result marks</h4> --}}
                                
                                @if (count($result)>0)
                                <table class="table table-bordered ic-table">

                                    @foreach ($result as $item)
                                       
                                        @if ($item->totalmarks>=90 and $item->totalmarks<=100)
                                            <tr>
                                                <td class="ic-td">Congratulations, you have done a very good job. Your hard <br> work will definitely bring good results.</td>
                                                <td class="ic-td-right">=> {{$item->totalmarks}}%</td>
                                            </tr>
                                        @endif
                                        @if ($item->totalmarks>=80 and $item->totalmarks<=89)
                                            <tr>
                                                <td class="ic-td">Not bad. You may now proceed to your next lesson.</td>
                                                <td class="ic-td-right">=> {{$item->totalmarks}}%</td>
                                            </tr>
                                        @endif
                                        @if ($item->totalmarks<70)
                                            <tr>
                                                <td class="ic-td">You must work hard to achieve your goal. So please study <br> hard. Otherwise, we cannot give you access to the next <br> lesson.</td>
                                                <td class="ic-td-right">=> {{$item->totalmarks}}%</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    
                                    

                                </table>
                                @else
                                    
                                @endif
                                
                                <div class="ic-note">
                                    <p> <span>Note:</span> If a student has passed at least 80% of their performance, they can proceed to the next lesson, otherwise they must repeat the exam until they have got at least 80% marks.</p>
                                </div>
                                <div class="ic-result-btn">
                                    {{-- <a href="demo-contact.html" class="btn">Submit Your Contact</a> --}}
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
                            <form action="{{route('user.formInsert')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" value="{{$user->signup_name}}" name="name" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{$lectureid}}" name="lesson" placeholder="Lesson Nr.">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" placeholder="Your Message"></textarea>
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
                                            
                                            
                                            <button type="submit" class="btn">Submit</button>
                                            {{-- <a class="btn" onclick="ratings()" class="btn">Check Ratings</a> --}}
                                            
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="url" value="{{url()->current()}}">
                                
                            </form>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(Session::has('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> {{Session('message')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>

                    </div>

                </div>
                @endif
                
            </div>
        </div>
        <div class="ic-rating-popup">
            <div class="row">
                <div class="col-sm-12">
                    <div class="popup-rating">
                       <div class="popup-rating-form">
                           
                            <textarea name="" id="comments" class="form-control" placeholder="Enter Your Review Here..."></textarea>
                            <input type="hidden" name="course_id" id="course_id" value="{{$id}}">
                           
                       </div>
                        <div class="rate">
                            <input type="radio" id="star5" onclick="onCheckRatings(5)" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" onclick="onCheckRatings(4)" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" onclick="onCheckRatings(3)" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" onclick="onCheckRatings(2)" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" onclick="onCheckRatings(1)" value="1" />
                            <label for="star1" title="text">1 star</label>
                            <input type="hidden" id="ratings">
                        </div>
                        <div class="rating-popup-btn">
                             <button onclick="goNext()" class="btn rating-btn">Save</button>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>

        $("#mainsubmit").hide();
        $(".ic-rating-popup").hide();
        function ratings(){

            $(".ic-rating-popup").show();
            let course_id=$("#course_id").val();
            $.ajax({

                type:"get",
                url:"{{route('user.getRatings')}}",
                data:{
                    course_id:course_id
                },
                success:function(data){

                    if(data.status=='got'){

                        let comments=$("#comments").val(data.data.ratings_comments);
                        let star=$("#star3:checked").val(data.data.ratings_rate);
                        $("#star"+data.data.ratings_rate).prop('checked',true);
                        
                    }
                },
                error:function(error){

                    console.log(error);
                }
            });
        }
        function onCheckRatings(id){

            $("#ratings").val(id);
        }
        function goNext(){

            let ratings=$("#ratings").val();
            let course_id=$("#course_id").val();
            let comments=$("#comments").val();

            $.ajax({

                type:"get",
                url:"{{route('user.ratingsInsert')}}",
                data:{
                    ratings:ratings,
                    course_id:course_id,
                    comments:comments,
                },
                success:function(data){
                    
                    if(data.status=='success'){

                        location.replace("{{route('user.courseDemoFile',[$id,$content->course_content_id,4])}}")
                    }
                },
                error:function(error){
                    console.log(error);
                }
            });
            
           
        }
    </script>
    <script>

        $(document).ready(function() {
            $("#player").vpplayer({
                src: "{{asset('public/assets/lecture')}}/{{$contentVideo->course_content_audio}}",
                trackName: "sample audio",
            });
            
        });


        function submitAnswer(){

            console.log('click');

            let examtypeid=$("#examtypeid").val();
            console.log(examtypeid);
            if(examtypeid==2){
                console.log('click2');
                var lectureid=$("#lectureid").val();
                var hidden_exam_id = $("input[name='hidden_exam_id[]']").map(function () {return $(this).val();}).get();;
                var ansradio = $("input[id^='ansradio']:checked").map(function () {return $(this).val();}).get();

                $.ajax({

                    type:"get",
                    url:"{{route('user.submitAnswer')}}",
                    data:{
                        
                        lectureid:lectureid,
                        hidden_exam_id:hidden_exam_id,
                        ansradio:ansradio,
                        examtypeid:examtypeid,

                    },
                    success:function(data){

                        if(data.status=='success'){

                            $("#ic-modal").show();
                            ratings();
                        }
                    },
                    error:function(error){

                        console.log(error);
                    }
                    
                });
                
            }
            if(examtypeid==1){

                console.log('click1');

                var lectureid=$("#lectureid").val();
                var hidden_exam_id = $("input[name='exam_id[]']").map(function () {return $(this).val();}).get();;
                var ans_name = $("input[name='ans_name[]']").map(function () {return $(this).val();}).get();
                console.log(hidden_exam_id);

                $.ajax({

                    type:"get",
                    url:"{{route('user.submitAnswer')}}",
                    data:{

                        lectureid:lectureid,
                        hidden_exam_id:hidden_exam_id,
                        ans_name:ans_name,
                        examtypeid:examtypeid,

                    },
                    success:function(data){

                        if(data.status=='success'){

                            $("#ic-modal").show();
                            ratings();
                        }
                    },
                    error:function(error){

                        console.log(error);
                    }
                    
                });
                
            }
            
        }

        
        function radioCheck(id){
            var exam_id=[];
            exam_id.push(id);
            $("#hidden_exam_id"+id).val(exam_id);
        }

        function examCheck(){

            $("#ic-modal").show();
        }
        

    </script>
    <!--Course Demo Video Area End-->
    
@endsection