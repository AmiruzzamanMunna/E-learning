@extends('Layouts.user-home')
@section('title')
    Page
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
                        <p><a href="{{route('user.index')}}">Home//</a></p>
                        <p><a href="{{URL::current()}}">Page</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="ic-blog-details-area">
    <div class="container">
        
        @if ($data)
            <div class="ic-blog-details-title">
                @if ($data->pages_title)
                    <h2>{{$data->pages_title}}</h2>
                @endif
                
            </div>
            
            <div class="ic-title-bottom-txt">

                @if ($data->pages_description)
                    <p>{!!$data->pages_description!!}</p>
                @endif
                
            </div>
        @else
            <h2 style="color: #ff6b1b">Sorry No content is Available</h2>
        @endif

    </div>
</section>



@endsection