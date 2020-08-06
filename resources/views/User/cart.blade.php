@extends('Layouts.user-home')
@section('title')
    Cart
@endsection
@section('container')

<!--View Cart Area Start-->

<section class="ic-breadcumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="breadcumb-content">
                    <h2>Cart</h2>
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


<section class="ic-view-cart-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="ic-cart-item-title">
                    <h4 id="showtitle"></h4>
                </div>
                <div id="show">
                    
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="ic-cart-total">
                    <div class="cart-total-title">
                        <h4>cart total</h4>
                    </div>
                    <div class="ic-cart-total-content">
                        <h5 id="showtitle2"></h5>
                        <div class="row" id="carttotal">
            
                        </div>

                    </div>
                    <div class="ic-cart-total-amount">
                        <div class="row">
                            <div class="col-sm-10">
                                <p>Total</p>
                            </div>
                            <div class="col-sm-2">
                                <p id="totalprice"></p>
                            </div>
                        </div>
                    </div>
                    <div class="ic-cart-checkout-btn" id="showbtn">
                        <a href="{{route('user.checkOutIndex')}}"><button href="">checkout now</button></a>
                    </div>
                </div>

                <div class="ic-cart-coupon" id="hidedata">
                    <div class="form-group coupon-fleid">
                        <input type="text" name="coupon" id="couponname" class="form-control" placeholder="enter coupon code">
                    </div>
                    <div class="ic-coupon-btn">
                        <button onclick="applyCoupon()">apply now</button>
                    </div>
                    
                </div>
                <div id="couponshow">

                </div>
            </div>
        </div>
    </div>
</section>

<!--View Cart Area End-->




<script>

    $(document).ready(function(){

        getCartItem();
    });
    function getCartItem(){

        $.ajax({

            type:"get",
            url:"{{route('user.getCartItem')}}",
            success:function(data){

                var html='';
                var html2='';
                var total=0;
                
                if(data.data.length>0){

                    for($i=0;$i<data.data.length;$i++){                        

                        html+='<div class="ic-cart-item">';
                        html+='<div class="row">';
                        html+='<div class="col-md-8">';
                        html+='<div class="ic-cart-image-title">';
                        html+='<div class="row">';
                        html+='<div class="col-sm-3">';
                        html+='<div class="image">';
                        html+='<img src="'+data.data[$i].course_image+'" class="img-fluid" alt="">';
                        html+='</div>';
                        html+='</div>';
                        html+='<div class="col-sm-9 ic-col-pl0">';
                        html+='<div class="title">';
                        html+='<h6>'+data.data[$i].course_name+'</h6>';
                        html+='<p>'+data.data[$i].course_authorname+'</p>';
                        html+='</div>';
                        html+='</div>';
                        html+='</div>';
                        html+='</div>';
                        html+='</div>';
                        html+='<div class="col-md-1 my-auto">';
                        html+='<div class="ic-cart-price">';
                        html+='<p>$'+data.data[$i].course_price+'</p>';
                        html+='</div>';
                        html+='</div>';
                        html+='<div class="col-md-3">';
                        html+='<div class="ic-cart-remove-save">';
                        html+='<i class="icofont-close-squared-alt" onclick="cartRemove('+data.data[$i].cart_id+')"></i>';
                        html+='<i onclick="cartToWishList('+data.data[$i].course_id+')" class="icofont-ui-love"></i>';
                        html+='</div>';
                        html+='</div>';
                        html+='</div>';
                        html+='</div>';                            
                                
                            

                        html2+='<div class="col-sm-10 col-md-12 col-lg-10">';
                        html2+='<ul>';
                        html2+='<li>'+data.data[$i].course_name+'</li>';
                        html2+='</ul>';
                        html2+='</div>';
                        html2+='<div class="col-sm-2 col-lg-2 col-md-12 my-auto">';
                        html2+='<p>$'+data.data[$i].course_price+'</p>';
                        html2+='</div>';

                        total+=data.data[$i].course_price;
                        
                    }
                
                    $("#totalprice").html('$'+data.total);
                    if(data.data.length>1){

                        $("#showtitle").html(data.data.length+' Courses in cart');
                        $("#showtitle2").html(data.data.length+' Courses');

                    }else{

                        $("#showtitle").html(data.data.length+' Course in cart');
                        $("#showtitle2").html(data.data.length+' Course');
                    }
                    
                    $("#show").html(html);
                    $("#carttotal").html(html2);
                    $("#showbtn").show();
                    $("#hidedata").show();

                }else{
                    

                    $("#show").html("<h1 style=color:#ff6b1b>Sorry no Course in Cart</h1>");
                    $("#carttotal").html("<h1 style=color:#ff6b1b>Sorry No Course</h1>");

                    $("#showtitle").html('No Course in cart');
                    $("#showtitle2").html('No Course');

                    $("#totalprice").html('$0');
                    $("#showbtn").hide();
                    $("#hidedata").hide();

                }
                
            },
            error:function(error){

                console.log(error);
            }
        });
    }
    function cartRemove(id){

        $.ajax({

            type:"get",
            url:"{{route('user.cartRemove')}}",
            data:{

                id:id,
            },
            success:function(data){
                
                if(data.status=='remove'){
                    
                    getCartItem();
                }
            },
            error:function(error){

                console.log(error);
            }
        });
    }
    function cartToWishList(id){

        $.ajax({

            type:"get",
            url:"{{route('user.cartToWishList')}}",
            data:{

                course_id:id,
            },
            success:function(data){
                
                if(data.status=='success'){

                    getCartItem();
                }
            },
            error:function(error){

                console.log(error);
            }
        });
    }
    function applyCoupon(){

        var couponname=$("#couponname").val();

        
        $.ajax({

            type:'get',
            url:"{{route('user.applyCoupon')}}",
            data:{
                couponname:couponname
            },
            success:function(data){
                console.log(data);
                if(data.status=='expired')
                {    
                    var html='';
                    html+='<div class="alert alert-warning alert-dismissible fade show" role="alert">';
                    html+='<strong>Sorry !</strong> Coupon is already Expired.';
                    html+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    html+='<span aria-hidden="true">&times;</span>';
                    html+='</button>';
                    html+='</div>';

                    $("#couponshow").html(html);

                }
                if(data.status=='success')
                {    
                    var html='';
                    html+='<div class="alert alert-success alert-dismissible fade show" role="alert">';
                    html+='<strong>Success !</strong> Coupon is Applied.';
                    html+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    html+='<span aria-hidden="true">&times;</span>';
                    html+='</button>';
                    html+='</div>';

                    $("#couponshow").html(html);
                    $("#hidedata").hide();
                    getCartItem();


                }
            },
            error:function(error){

                console.log(error);
            }
        });
    }
</script>


@endsection