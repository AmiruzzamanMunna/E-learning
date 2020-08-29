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
                            <p><a href="{{route('user.index')}}">Home//</a></p>
                            <p><a href="{{route('user.userProfile')}}">Profile//</a></p>
                            <p><a href="{{route('user.enrollHistory')}}">Enroll History</a></p>
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
                        <select id="keyword_id" onchange="keyWordFiltering()">
                            <option value="0">Short By Keyword Here</option>
                            @foreach ($keywordSort as $item)
                                <option value="{{$item->course_id}}">{{$item->course_name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-4 col-lg-3">
                        <select id="category_id" onchange="categoryFiltering()">
                            <option value="0">Filter By Categories</option>
                            @foreach ($keywordSort as $item)
                                <option value="{{$item->course_category_id}}">{{$item->course_category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Enroll Area Start -->
    <section class="ic-enroll-history-area">
        <div class="container" id="showdata">
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
    <script>

        function keyWordFiltering(){

            let keyword_id=$("#keyword_id").val();
            
            $.ajax({

                type:'get',
                url:"{{route('user.keyWordFiltering')}}",
                data:{

                    id:keyword_id,
                },
                success:function(data){

                    console.log(data);
                    var html='';

                    if(data.data.length>0){

                        for($i=0;$i<data.data.length;$i++){

                            $item=data.data[$i];
                            html+='<div class="ic-enroll-history-warper">';
                            html+='<div class="row">';
                            html+='<div class="col-md-5">';
                            html+='<div class="ic-enroll-title">';
                            html+='<div class="row">';
                            html+='<div class="col-sm-3">';
                            html+='<div class="image">';
                            html+='<img src="'+$item.image+'" class="img-fluid" alt="">';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="col-sm-9 col-ic-pl-0">';
                            html+='<div class="title">';
                            html+='<h4>'+$item.course_name+'</h4>';
                            html+='<p>'+$item.course_authorname+'</p>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="col-md-2 col-sm-4 offset-lg-1 my-auto">';
                            html+='<div class="price">';
                            html+='<p>$'+$item.order_amount+'</p>';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="col-md-2 col-sm-4 my-auto">';
                            html+='<div class="date">';
                            html+='<span>Enroll</span>';
                            html+='<p>'+$item.order_date+'</p>';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="col-md-2 col-sm-4 my-auto">';
                            html+='<button type="button" class="ic-start-now-btn"><a style="color: white;text-decoration:none" href="'+$item.link+'">Start Now</a></button>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';

                        }

                    }else{

                        html+='<h2 style="color: #ff6b1b">Sorry No Course Content is Available</h2>'

                    }
                    
                    
                    
                    
                    $("#showdata").html(html);
                   
                },
                error:function(error){
                    console.log(error);
                }
            });
        }
        function categoryFiltering(){

            let keyword_id=$("#category_id").val();
            
            $.ajax({

                type:'get',
                url:"{{route('user.categoryFiltering')}}",
                data:{

                    id:keyword_id,
                },
                success:function(data){

                    console.log(data);
                    var html='';

                    if(data.data.length>0){

                        for($i=0;$i<data.data.length;$i++){

                            $item=data.data[$i];
                            html+='<div class="ic-enroll-history-warper">';
                            html+='<div class="row">';
                            html+='<div class="col-md-5">';
                            html+='<div class="ic-enroll-title">';
                            html+='<div class="row">';
                            html+='<div class="col-sm-3">';
                            html+='<div class="image">';
                            html+='<img src="'+$item.image+'" class="img-fluid" alt="">';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="col-sm-9 col-ic-pl-0">';
                            html+='<div class="title">';
                            html+='<h4>'+$item.course_name+'</h4>';
                            html+='<p>'+$item.course_authorname+'</p>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="col-md-2 col-sm-4 offset-lg-1 my-auto">';
                            html+='<div class="price">';
                            html+='<p>$'+$item.order_amount+'</p>';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="col-md-2 col-sm-4 my-auto">';
                            html+='<div class="date">';
                            html+='<span>Enroll</span>';
                            html+='<p>'+$item.order_date+'</p>';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="col-md-2 col-sm-4 my-auto">';
                            html+='<button type="button" class="ic-start-now-btn"><a style="color: white;text-decoration:none" href="'+$item.link+'">Start Now</a></button>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';

                        }

                    }else{

                        html+='<h2 style="color: #ff6b1b">Sorry No Course Content is Available</h2>'

                    }
                    
                    
                    
                    
                    $("#showdata").html(html);
                   
                },
                error:function(error){
                    console.log(error);
                }
            });
        }
    </script>
@endsection