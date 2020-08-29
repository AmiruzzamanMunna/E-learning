<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="#" type="image/png">
        <title>Forget Password</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('public/assets/admin')}}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('public/assets/admin')}}/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('public/assets/admin')}}/vendors/linericon/style.css">
        
        <!-- Extra Plugin CSS -->
        
        <!-- main css -->
        <link rel="stylesheet" href="{{asset('public/assets/admin')}}/css/style.css"> 
        <link rel="stylesheet" href="{{asset('public/assets/admin')}}/css/responsive.css">
    </head>
    <body class="body_color">
      
        <!--================Login Form Area =================-->
        <section class="ic_main_form_area">
            <div class="container">
                <div class="ic_main_form_inner">
                    <div class="row">
                        <div class="col-lg-6 col-md-5">
                            <div class="form_img">
                                <img src="{{asset('public/assets/admin/img')}}/{{$data->admin_login_page_image2}}" height="550px" width="auto" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7 d-flex">
                            <div class="form_box">
                                <img class="img-fluid" src="{{asset('public/assets/admin/img')}}/{{$data->admin_login_page_image1}}" alt="">
                                <p>{{$data->admin_login_page_short_title}}</p>
                                <form class="row login_form" method="post" id="contactForm" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group col-lg-12">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                        <i class="fa fa-user-o"></i>
                                    </div>
                                    
                                    
                                    <div class="form-group col-lg-12">
                                        <button type="submit" value="submit" class="btn submit_btn form-control">Send Mail</button>
                                    </div>
                                    
                                </form>
                                <br>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
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
                </div>
            </div>
        </section>
        <!--================End Login Form Area =================-->
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{asset('public/assets/admin')}}/js/jquery-3.3.1.min.js"></script>
        <script src="{{asset('public/assets/admin')}}/js/popper.min.js"></script>
        <script src="{{asset('public/assets/admin')}}/js/bootstrap.min.js"></script>
        <!-- Extra Plugin CSS -->
        <script src="{{asset('public/assets/admin')}}/vendors/nice-select/js/jquery.nice-select.min.js"></script>
       
        <script src="{{asset('public/assets/admin')}}/js/theme-dist.js"></script>
    </body>
</html>