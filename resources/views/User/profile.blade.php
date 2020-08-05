@extends('Layouts.user-home')
@section('title')
    Profile
@endsection
@section('container')

<!--Breadcumb Area Start-->

<section class="ic-breadcumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="breadcumb-content">
                    <h2>Profile</h2>
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

<!--Breadcumb Area End-->


<!--Profile Area Start -->

<!--Notification Modal-->
<div class="modal fade ic-notification-modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Christian Crawford snet a new message
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum quae neque dicta doloribus blanditiis sint expedita porro corporis. Vel nesciunt delectus fugit praesentium doloribus dolore deserunt harum, culpa recusandae nobis.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!--Notification Modal-->


<section class="ic-profile-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-3">
                <div class="ic-profile-left">
                    <div class="ic-profile-top">
                        @if ($user->signup_image)
                            <img src="{{asset('assets')}}/images/{{$user->signup_image}}" class="img-fluid" alt="">
                        @else    
                            <img src="assets/images/peofile.jpg" class="img-fluid" alt="">
                        @endif
                        
                        <h4>{{$user->signup_name}}</h4>
                        <p>{{$user->signup_professional_tag}}</p>
                    </div>
                    <div class="ic-profile-tabs">
                        <p>View Public Profile</p>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
                            <a class="nav-link" href="{{route('user.enrollHistory')}}" >Enrolled Course</a>
                            
                            <a class="nav-link" id="v-pills-photo-tab" data-toggle="pill" href="#v-pills-photo" role="tab" aria-controls="v-pills-photo" aria-selected="false">Photo</a>
                            <a class="nav-link" id="v-pills-account-tab" data-toggle="pill" href="#v-pills-account" role="tab" aria-controls="v-pills-account" aria-selected="false">Account</a>
                            <a class="nav-link" id="v-pills-payment-tab" data-toggle="pill" href="#v-pills-payment" role="tab" aria-controls="v-pills-payment" aria-selected="false">Payment Methods</a>
                            <a class="nav-link" id="v-pills-privacy-tab" data-toggle="pill" href="#v-pills-privacy" role="tab" aria-controls="v-pills-privacy" aria-selected="false">Privacy</a>
                            <a class="nav-link" id="v-pills-notification-tab" data-toggle="pill" href="#v-pills-notification" role="tab" aria-controls="v-pills-notification" aria-selected="false">Notifications</a>
                            <a class="nav-link" id="v-pills-close-tab" data-toggle="pill" href="#v-pills-close" role="tab" aria-controls="v-pills-close" aria-selected="false">Close account</a>
                            <a class="nav-link" href="{{route('user.logOut')}}" >Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 offset-lg-1">
                <div class="ic-profile-right">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="ic-prifile-content-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4>Public Profile</h4>
                                        <p>Add information about yourself</p>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" value="{{$user->signup_name}}" placeholder="Enter First Name">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter Last Name">
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="professiontag" value="{{$user->signup_professional_tag}}" placeholder="Professional Tag">
                                            <span>Add a professional headline like, "Engineer at Udemy" or "Architect."</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" id="professionbio" value="{{$user->signup_professionalbio}}" placeholder="Your Profession Bio Here">{{$user->signup_professionalbio}}</textarea>
                                            <span>Links and coupon codes are not permitted in this section.</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ic-profile-select">
                                        <select>
                                            <option value="0">Select Your Language</option>
                                            <option value="1">Another Option</option>
                                            <option value="2">Another Option</option>
                                            <option value="4">Another Option</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="ic-profile-link">
                                            <h4>Links</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ic-m">
                                        <div class="form-group ic-input-container">
                                            <a href="{{$user->signup_wblinks}}"> <i class="icofont-web"></i></a>

                                            <input type="text" name="web" id="weblink" class="form-control" value="{{$user->signup_wblinks}}" placeholder="Website: https//www.">
                                        </div>
                                    </div>
                                    <div class="col-md-12 ic-m">
                                        <div class="form-group ic-input-container">

                                            <a href="{{$user->signup_fblinks}}"> <i class="icofont-facebook"></i></a>
                                            <input type="text" class="form-control" id="fblink" value="{{$user->signup_fblinks}}" placeholder="Facebook profile Name">

                                        </div>
                                        <span>Input your Facebook username (e.g. johnsmith).</span>
                                    </div>
                                    <div class="col-md-12 ic-m">
                                        <div class="form-group ic-input-container">
                                            <a href="{{$user->signup_ttlinks}}"><i class="icofont-twitter"></i></a>
                                            <input type="text" class="form-control" id="twlink" value="{{$user->signup_ttlinks}}" placeholder="Twitter profile Name">

                                        </div>
                                        <span>Input your Twitter username (e.g. johnsmith).</span>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            @foreach ($links as $item)
                                                <div class="customer_records">
                                                    <div class="icon">
                                                        <a href="{{$item->user_profilelinks_link}}"><i class="icofont-user-alt-7"></i></a>
                                                    </div>

                                                    <input type="text" class="form-control" value="{{$item->user_profilelinks_link}}" id="uplinks[]" name="uplinks[]" placeholder="Add Another Profile Name">
                                                    <input type="hidden" class="form-control" value="{{$item->user_profilelinks_id}}" id="uplinksid[]" name="uplinksid[]" placeholder="Add Another Profile Name">
                                                    <div class="icon2">
                                                        <a class="remove-field btn-remove-customer" onclick="deleteUserLinks({{$item->user_profilelinks_id}})"><i class="icofont-minus"></i></a>
                                                    </div>

                                                </div>
                                                
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="customer_records" id="customer_records">
                                                <div class="icon">
                                                    <a href="#"><i class="icofont-user-alt-7"></i></a>
                                                </div>

                                                <input type="text" class="form-control" name="addlinks[]" id="addlinks[]" placeholder="Add Another Profile Name">
                                                <div class="icon2">
                                                    <a class="extra-fields-customer" id="addButton"><i class="icofont-plus"></i></a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="customer_records_dynamic"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="ic-profile-save-btn">
                                            <button onclick="updateProfile()" type="submit">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-photo" role="tabpanel" aria-labelledby="v-pills-photo-tab">
                            photo
                        </div>
                        <div class="tab-pane fade" id="v-pills-account" role="tabpanel" aria-labelledby="v-pills-account-tab">
                            account
                        </div>
                        <div class="tab-pane fade" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab">
                            <div class="ic-profile-payment-method">
                                <div class="ic-payment-heading">
                                    <h4>Payment Methos</h4>
                                    <p>Add information about Payment Method</p>
                                </div>
                                <div class="ic-payment-content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <select id="pay_method" onchange="displayPayment()">
                                                <option value="C">Debit or Credit Card</option>
                                                <option value="B">Other Card</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="card-payment" class="payment" style="display:block">
                                                <div class="row">
                                                    <div class="col-md-12 ic-slick-select">
                                                        <div class="form-group">
                                                            <select  id="slick">
                                                                <option value="0">Select Card Type</option>
                                                                <option value="card" data-imagesrc="assets/images/master-card.png"> 53608 XXXX XXXX</option>
                                                                <option value="card" data-imagesrc="assets/images/master-card.png">master card</option>
                                                                <option value="card" data-imagesrc="assets/images/master-card.png">Bank card</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Card Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="date" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group CVV">

                                                            <input type="text" class="form-control" placeholder="CVC Number" id="cvc">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div id="bank-payment" class="payment" style="display:none">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group" id="bankacct">

                                                            <input type="text" class="form-control"  placeholder="card Holder Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">

                                                            <input type="text" class="form-control"  placeholder="card Number">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="ic-profile-save-btn">
                                                <button type="submit">Save</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-privacy" role="tabpanel" aria-labelledby="v-pills-privacy-tab">
                            privacy
                        </div>
                        <div class="tab-pane fade" id="v-pills-notification" role="tabpanel" aria-labelledby="v-pills-notification-tab">
                            <div class="ic-profile-notification">
                                <div class="ic-notification-heading">
                                    <h4>All Notifications</h4>
                                    <p>Your notifications shown by newest first</p>
                                </div>
                                <div class="ic-notification-content">
                                    <div class="d-flex justify-content-between">
                                        <div class="ic-message">
                                            <a href="#"><i class="icofont-close-line"></i></a>
                                            <p>Message</p>
                                        </div>
                                        <div class="ic-date">
                                            <i class="icofont-clock-time"></i>
                                            <p>14 June, 2020 at 9:30 PM</p>
                                        </div>
                                    </div>
                                    <div class="ic-body-content">
                                        <button type="button" class="" data-toggle="modal" data-target="#exampleModalCenter">
                                            <h4>Christian Crawford snet a new message</h4>
                                        </button>

                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        <span>Jessica Martinez</span>
                                    </div>
                                </div>
                                <div class="ic-notification-content">
                                    <div class="d-flex justify-content-between">
                                        <div class="ic-message">
                                            <a href="#"><i class="icofont-close-line"></i></a>
                                            <p class="ic-comment">Comment</p>
                                        </div>
                                        <div class="ic-date">
                                            <i class="icofont-clock-time"></i>
                                            <p>14 June, 2020 at 9:30 PM</p>
                                        </div>
                                    </div>
                                    <div class="ic-body-content">
                                        <button type="button" class="" data-toggle="modal" data-target="#exampleModalCenter">
                                            <h4>Christian Crawford snet a new message</h4>
                                        </button>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        <span>Jessica Martinez</span>
                                    </div>
                                </div>
                                <div class="ic-notification-content">
                                    <div class="d-flex justify-content-between">
                                        <div class="ic-message">
                                            <a href="#"><i class="icofont-close-line"></i></a>
                                            <p>Message</p>
                                        </div>
                                        <div class="ic-date">
                                            <i class="icofont-clock-time"></i>
                                            <p>14 June, 2020 at 9:30 PM</p>
                                        </div>
                                    </div>
                                    <div class="ic-body-content">
                                        <button type="button" class="" data-toggle="modal" data-target="#exampleModalCenter">
                                            <h4>Christian Crawford snet a new message</h4>
                                        </button>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        <span>Jessica Martinez</span>
                                    </div>
                                </div>
                                <div class="ic-notification-content">
                                    <div class="d-flex justify-content-between">
                                        <div class="ic-message">
                                            <a href="#"><i class="icofont-close-line"></i></a>
                                            <p class="ic-comment">Comment</p>
                                        </div>
                                        <div class="ic-date">
                                            <i class="icofont-clock-time"></i>
                                            <p>14 June, 2020 at 9:30 PM</p>
                                        </div>
                                    </div>
                                    <div class="ic-body-content">
                                        <button type="button" class="" data-toggle="modal" data-target="#exampleModalCenter">
                                            <h4>Christian Crawford snet a new message</h4>
                                        </button>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        <span>Jessica Martinez</span>
                                    </div>
                                </div>
                                <div class="ic-notification-content">
                                    <div class="d-flex justify-content-between">
                                        <div class="ic-message">
                                            <a href="#"><i class="icofont-close-line"></i></a>
                                            <p>Message</p>
                                        </div>
                                        <div class="ic-date">
                                            <i class="icofont-clock-time"></i>
                                            <p>14 June, 2020 at 9:30 PM</p>
                                        </div>
                                    </div>
                                    <div class="ic-body-content">
                                        <button type="button" class="" data-toggle="modal" data-target="#exampleModalCenter">
                                            <h4>Christian Crawford snet a new message</h4>
                                        </button>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        <span>Jessica Martinez</span>
                                    </div>
                                </div>
                                <div class="ic-notification-content">
                                    <div class="d-flex justify-content-between">
                                        <div class="ic-message">
                                            <a href="#"><i class="icofont-close-line"></i></a>
                                            <p class="ic-comment">Comment</p>
                                        </div>
                                        <div class="ic-date">
                                            <i class="icofont-clock-time"></i>
                                            <p>14 June, 2020 at 9:30 PM</p>
                                        </div>
                                    </div>
                                    <div class="ic-body-content">
                                        <button type="button" class="" data-toggle="modal" data-target="#exampleModalCenter">
                                            <h4>Christian Crawford snet a new message</h4>
                                        </button>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        <span>Jessica Martinez</span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="ic-course-pagination  text-center ic-profile-pagination">

                                        <ul class="pagination ">
                                            <li class="disabled"><a href="#">«</a></li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li class="active"><a href="#">5</a></li>
                                            <li><a href="#">6</a></li>
                                            <li><a href="#">7</a></li>
                                            <li><a href="#">8</a></li>
                                            <li><a href="#">9</a></li>
                                            <li><a href="#">»</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-close" role="tabpanel" aria-labelledby="v-pills-close-tab">
                            close
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Profile Area End -->
    
@endsection
<script>

    function updateProfile(){


        
        var addval = $("input[name='addlinks[]']").map(function(){return $(this).val();}).get();
        if(addval!=''){

            
            links=addval;
            

        }else{

            links=[];
            
        }
        var uplinks = $("input[name='uplinks[]']").map(function(){return $(this).val();}).get();
        var uplinksid = $("input[name='uplinksid[]']").map(function(){return $(this).val();}).get();
        var name=$("#name").val();
        var ptag=$("#professiontag").val();
        var pbio=$("#professionbio").val();
        var weblink=$("#weblink").val();
        var fblink=$("#fblink").val();
        var twlink=$("#twlink").val();
        // console.log(links);


        $.ajax({

            type:"get",
            url:"{{route('user.userProfileUpdate')}}",
            data:{

                links:links,
                uplinks:uplinks,
                uplinksid:uplinksid,
                name:name,
                ptag:ptag,
                pbio:pbio,
                weblink:weblink,
                fblink:fblink,
                twlink:twlink,

            },
            success:function(data){

                if(data.status=='success'){

                    location.reload();
                }

            },
            error:function(error){

                console.log(error);
            }

        });
    }

    function deleteUserLinks(id){

        $.ajax({

            type:"get",
            url:"{{route('user.deleteUserLinks')}}",
            data:{

                id:id,
                

            },
            success:function(data){

                if(data.status=='success'){

                    location.reload();
                }

            },
            error:function(error){

                console.log(error);
            }

        });

    }
</script>