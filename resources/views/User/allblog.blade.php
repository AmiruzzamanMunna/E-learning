@extends('Layouts.user-home')
@section('title')
    All Blog
@endsection
@section('container')
    <!--Course Area Start-->

    <section class="ic-breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcumb-content">
                        <h2>Blog</h2>
                        <p> <a href="{{route('user.index')}}">Home</a> <span>// </span><a href="{{route('user.allBlog')}}">Blog</a></p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ic-blog-page-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="ic-blog-page-title">
                        <h2>Most popular Articles</h2>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div id="ic-blog-view1"  class="ic-view-aritical">
                        <a href="#">view all ariticles</a>
                    </div>
                </div>
            </div>
            @if (count($mostPopular)>0)

                <div id="ic-owl-blog1" class="owl-carousel owl-theme">
                    @foreach ($mostPopular as $item)
                        <div class="item">
                            <div class="ic-blog-page-content">
                                <img src="{{asset('public/assets/Blog')}}/{{$item->blog_image}}" class="img-dluid" alt="">
                                <p class="small-title">{{$item->course_category_name}}</p>
                                <h4><a href="{{route('user.blogDetails',$item->blog_id)}}">{{$item->blog_title}}</a></h4>
                                <p class="author">By {{$item->blog_blooger_name}} / {{date('d F, Y',strtotime($item->blog_date))}}</p>
                            </div>
                        </div>
                    @endforeach 
                </div>
            @else
                <h2 style="color: #ff6b1b">Sorry No content is Available</h2>
            @endif
            
        </div>
    </section>
    <section class="ic-blog-item-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="ic-blog-page-title ic-blog-sm-title">
                        <h2>Design & Development Articles</h2>
                    </div>
                </div>
                 <div class="col-sm-5">
                    <div id="ic-blog-view2"  class="ic-view-aritical ic-view-mt">
                        <a href="#">view all ariticles</a>
                    </div>
                </div>
            </div>
            @if (count($designDeveloment)>0)
                <div id="ic-owl-blog2" class="owl-carousel owl-theme ic-blog-page-owl">
                    
                    @foreach ($designDeveloment as $item)
                        <div class="item">
                            <div class="ic-blog-page-content">
                                <img src="{{asset('public/assets/Blog')}}/{{$item->blog_image}}" class="img-dluid" alt="">
                                <p class="small-title">{{$item->course_category_name}}</p>
                                <h4><a href="{{route('user.blogDetails',$item->blog_id)}}">{{$item->blog_title}}</a></h4>
                                <p class="author">By {{$item->blog_blooger_name}} / {{date('d F, Y',strtotime($item->blog_date))}}</p>
                            </div>
                        </div>
                    @endforeach 
                    
                </div>
            @else

                <h2 style="color: #ff6b1b">Sorry No content is Available</h2>
            @endif
            

        </div>
    </section>
    
    <section class="ic-get-start-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="ic-get-start-left">
                        <img src="{{asset('public/assets/Home')}}/{{$homePage->homepage_middle_image}}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ic-get-start-right">
                        @php
                            $string=$homePage->homePage_middle_title;
                            $explode=explode('.',$string);
                            $explodeString1=$explode[0];
                            $explodeString2=$explode[1];
                           
                        @endphp
    
                        
                        <h2>{{$explodeString1}}. <span>{{$explodeString2}}</span> </h2>
                        <p>{{$homePage->homepage_middle_paragraph}}</p>
                        <button><a href="#">get start now</a></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ic-blog-item-area ic-hr-ld-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="ic-blog-page-title ic-blog-sm-title">
                        <h2>IT & software Articles</h2>
                    </div>
                </div>
                 <div class="col-sm-5">
                    <div id="ic-blog-view4"  class="ic-view-aritical ic-view-mt">
                        <a href="#">view all ariticles</a>
                    </div>
                </div>
            </div>
            @if (count($itSoftware)>0)
                
            @else
                <h2 style="color: #ff6b1b">Sorry No content is Available</h2>
            @endif
            <div id="ic-owl-blog4" class="owl-carousel owl-theme ic-blog-page-owl">
                @foreach ($itSoftware as $item)
                    <div class="item">
                        <div class="ic-blog-page-content">
                            <img src="{{asset('public/assets/Blog')}}/{{$item->blog_image}}" class="img-dluid" alt="">
                            <p class="small-title">{{$item->course_category_name}}</p>
                            <h4><a href="{{route('user.blogDetails',$item->blog_id)}}">{{$item->blog_title}}</a></h4>
                            <p class="author">By {{$item->blog_blooger_name}} / {{date('d F, Y',strtotime($item->blog_date))}}</p>
                        </div>
                    </div>
                @endforeach 
            </div>

        </div>
    </section><br>
    

    
@endsection