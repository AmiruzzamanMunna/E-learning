@extends('Layouts.user-home')
@section('title')
    Check Out
@endsection
@section('js')
    <script src="https://js.stripe.com/v3/"></script>
@endsection
@section('container')

<!--Checkout  Area Start-->

<section class="ic-breadcumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="breadcumb-content">
                    <h2>Checkout</h2>
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

<section class="ic-checkout-area">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-6">
                <div class="ic-checkout-left">
                    <div class="header">
                        <h4>Checkout</h4>
                    </div>
                    <div class="billing">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Billing Address</label>
                                    <select data-live-search="true">
                                        <option value="0">Select Country</option>
                                        <option value="0">Bangladesh</option>
                                        <option value="0">USA</option>
                                        <option value="0">India</option>
                                        <option value="0">Pakistan</option>
                                        <option value="0">Srilanka</option>
                                        <option value="0">Nepal</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment">
                        <div class="ic-radios" role="radiogroup">
                            <label>
                                <input type="radio" name="options" />
                                <span class="radio"></span>
                                <span class="label">New Payment Card</span>
                            </label>

                            <br>
                            <label>
                                <input type="radio" name="options" />
                                <span class="radio"></span>
                                <span class="label">Pay With Paypal</span>
                            </label>
                        </div>
                    </div>
                    <div class="payment-card-info">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group payment-form-group">
                                    <label>Payment Card Info</label>
                                    <select id="pay_method" onchange="displayPayment()">
                                        <option value="C">Debit or Credit Card</option>
                                        <option value="B">Other Card</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div id="card-payment"  style="display:block">
                                    <div class="row">
                                        <div class="col-md-12 ic-slick-select">
                                            <div class="form-group">
                                                <select  id="slick">
                                                    <option value="0">Select Card Type</option>
                                                    <option value="card" data-imagesrc="{{asset('public')}}/assets/images/master-card.png"> 53608 XXXX XXXX</option>
                                                    <option value="card" data-imagesrc="{{asset('public')}}/assets/images/master-card.png">master card</option>
                                                    <option value="card" data-imagesrc="{{asset('public')}}/assets/images/master-card.png">Bank card</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Card Number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-date">
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

                                                <input type="text" class="form-control" placeholder="card Holder Name">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <input type="text" class="form-control" placeholder="card Number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-lg-4 offset-lg-2">
               <div class="ic-right-checkout">
                <div class="ic-cart-total">
                    <div class="cart-total-title">
                        <h4>cart total</h4>
                    </div>
                    <div class="ic-cart-total-content">
                    
                        <div class="row">
                            <h5 id="showtitle2"></h5>
                            <div class="col-sm-10 col-md-12 col-lg-10">
                                <div class="row" id="carttotal">
                
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="ic-cart-total-amount">
                        <div class="row">
                            <div class="col-sm-8">
                                <p>Total</p>
                            </div>
                            <div class="col-sm-3">
                                <p id="totalprice"></p>
                            </div>
                        </div>
                    </div>
                    <div class="ic-cart-checkout-btn">
                        <button onclick="courseOrder()">Complete Order </button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div id="paypal-button"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'ASqMGS7jkkXVeUoOJ72VTk6srgH_Ug0b1Ygg7nZ8Zu0UgMEr9_1S4NpJyMecPP6ogtZ7sK_LLE7uFDRv',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {

        var course_price=$("input[name='course_price[]']").map(function () {return $(this).val();}).get();

        var total=0;
        for($i=0;$i<course_price.length;$i++){

            total+=course_price[$i]<<0;
        }
        
      return actions.payment.create({
        transactions: [{
          amount: {
            total: total,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        courseOrder();
      });
    }
  }, '#paypal-button');

</script>

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

                        total+=data.data[$i].course_price;

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
                        html2+='<li><input type="hidden" id="course_id" name="course_id[]" value="'+data.data[$i].course_id+'"><input type="hidden" id="course_price" name="course_price[]" value="'+data.data[$i].course_price+'">'+data.data[$i].course_name+'</li>';
                        html2+='</ul>';
                        html2+='</div>';
                        html2+='<div class="col-sm-2 col-lg-2 col-md-12 my-auto">';
                        html2+='<p>$'+data.data[$i].course_price+'</p>';
                        html2+='</div>';
                        
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

                }else{
                    

                    $("#show").html("<h1 style=color:#ff6b1b>Sorry no Course in Cart</h1>");
                    $("#carttotal").html("<h1 style=color:#ff6b1b>Sorry No Course</h1>");

                    $("#showtitle").html('No Course in cart');
                    $("#showtitle2").html('No Course');

                    $("#totalprice").html('$0');

                }
                
            },
            error:function(error){

                console.log(error);
            }
        });
    }

    function courseOrder(){

        var course_id=$("input[name='course_id[]']").map(function () {return $(this).val();}).get();
        var course_price=$("input[name='course_price[]']").map(function () {return $(this).val();}).get();
        $.ajax({

            type:"get",
            url:"{{route('user.courseOrder')}}",
            data:{
                
                course_id:course_id,
                course_price:course_price,
            },
            success:function(data){

                console.log(data);
                
                if(data.status=='success'){

                    location.replace("{{route('user.userProfile')}}");
                }
            },
            error:function(error){

                console.log(error);
            }
        });


    }

    
    
</script>


@endsection