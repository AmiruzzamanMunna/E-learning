@extends('Layouts.user-home')
@section('title')
    Blog Details
@endsection
@section('container')

<!--View Cart Area Start-->

<section class="ic-breadcumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="breadcumb-content">
                    <h2>Blog</h2>
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

<section class="ic-blog-details-area">
    <div class="container">
        <div class="ic-blog-details-banner">
            <img src="{{asset('public/assets/Blog')}}/{{$data->blog_image}}" height="auto;" width="100%" class="img-fluid" alt="">
        </div>
        <div class="ic-blog-details-title">
            <h2>{{$data->blog_title}}</h2>
        </div>
        <div class="d-flex justify-content-between ic-blog-details-title-bottom">
            <div class="autor">
                <p><span>Development</span> / By {{$data->blog_blooger_name}} / {{date('d F, Y',strtotime($data->blog_date))}}</p>
            </div>
            <div class="like-comment-download d-flex justify-content-between">
                <div class="view">
                    <i class="icofont-eye-alt"></i>
                    <span>5620</span>
                </div>
                <div class="like">
                   <i class="icofont-ui-love"></i>
                    <span>5620</span>
                </div>
                <div class="download">
                    <i class="icofont-download"></i>
                    <span>5620</span>
                </div>
            </div>
        </div>
        <div class="ic-title-bottom-txt">
            <p>{!!$data->blog_details!!}</p>
        </div>
        

        <div class="d-flex justify-content-between ic-blog-details-share-btn">
            <div class="ic-blog-share-icon">
                <p>share this articles on</p>
                <ul>
                    <li><a href="#"><i class="icofont-facebook"></i></a></li>
                    <li><a href="#"><i class="icofont-twitter"></i></a></li>
                    <li><a href="#"><i class="icofont-instagram"></i></a></li>
                    <li><a href="#"><i class="icofont-pinterest"></i></a></li>
                    <li><a href="#"><i class="icofont-instagram"></i></a></li>
                    <li><a href="#"><i class="icofont-youtube-play"></i></a></li>
                </ul>
            </div>
            <div class="ic-blog-details-download-btn">
                <button type="submit">Download This Articles InPDF</button>
            </div>
        </div>

    </div>
</section>
<section class="ic-blog-item-area ic-blog-details-related-article">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ic-col-pl-0">
                <div class="ic-blog-page-title">
                    <h2>related articles</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="item">
                    <div class="ic-blog-page-content">
                        <img src="assets/images/blog-page.jpg" class="img-fluid" alt="">
                        <p class="small-title">Development</p>
                        <h4 id="ic-hover-color"><a href="">Why Swift UI Should Be on the
                                Radar of Every Mobile Developer</a></h4>
                        <p class="author">By Jacqueline Wagner / 10 June, 2020</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="item">
                    <div class="ic-blog-page-content">
                        <img src="assets/images/blog-page.jpg" class="img-fluid" alt="">
                        <p class="small-title">Development</p>
                        <h4><a href="">Why Swift UI Should Be on the
                                Radar of Every Mobile Developer</a></h4>
                        <p class="author">By Jacqueline Wagner / 10 June, 2020</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="item">
                    <div class="ic-blog-page-content">
                        <img src="assets/images/blog-page.jpg" class="img-fluid" alt="">
                        <p class="small-title">Development</p>
                        <h4><a href="">Why Swift UI Should Be on the
                                Radar of Every Mobile Developer</a></h4>
                        <p class="author">By Jacqueline Wagner / 10 June, 2020</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="item">
                    <div class="ic-blog-page-content">
                        <img src="assets/images/blog-page.jpg" class="img-fluid" alt="">
                        <p class="small-title">Development</p>
                        <h4><a href="">Why Swift UI Should Be on the
                                Radar of Every Mobile Developer</a></h4>
                        <p class="author">By Jacqueline Wagner / 10 June, 2020</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


@endsection