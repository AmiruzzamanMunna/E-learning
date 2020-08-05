@extends('Layouts.user-home')
@section('title')
    Wish List
@endsection
@section('container')

<!--View Cart Area Start-->

<section class="ic-breadcumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="breadcumb-content">
                    <h2>Wish List</h2>
                    @foreach(Request::segments() as $segment)
                        <p> <a href="{{route('user.index')}}">Home</a> <span>// </span><a href="{{$segment}}">{{$segment}}</a></p>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>


<!--Wishlist Area Start -->

<section class="ic-wishlist-area">
    <div class="container">
           <div class="ic-cart-item-title text-center">
                 <h4 id="showtitle"></h4>
             </div>
           <div class="row">
         <div class="col-md-8 offset-md-2" id="show">
            
             {{-- <div class="ic-cart-item">
                 <div class="row">
                     <div class="col-md-8">
                         <div class="ic-cart-image-title">
                             <div class="row">
                                 <div class="col-sm-3">
                                     <div class="image">
                                         <img src="assets/images/cart-image.jpg" class="img-fluid" alt="">
                                     </div>
                                 </div>
                                 <div class="col-sm-9 ic-col-pl0">

                                     <div class="title">
                                         <h6>User Experience Design Essentials - Adobe XD UI UX Design</h6>
                                         <p>By Daniel Walter Scott and 1 other</p>
                                     </div>
                                 </div>
                             </div>

                         </div>
                     </div>
                     <div class="col-md-1 my-auto">
                         <div class="ic-cart-price">
                             <p>$44.00</p>
                         </div>
                     </div>
                     <div class="col-md-3 my-auto">
                         <div class="ic-cart-remove-save cart-icon">  
                            <i class="icofont-shopping-cart"></i>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="ic-cart-item">
                 <div class="row">
                     <div class="col-md-8">
                         <div class="ic-cart-image-title">
                             <div class="row">
                                 <div class="col-sm-3">
                                     <div class="image">
                                         <img src="assets/images/cart-image.jpg" class="img-fluid" alt="">
                                     </div>
                                 </div>
                                 <div class="col-sm-9 ic-col-pl0">

                                     <div class="title">
                                         <h6>User Experience Design Essentials - Adobe XD UI UX Design</h6>
                                         <p>By Daniel Walter Scott and 1 other</p>
                                     </div>
                                 </div>
                             </div>

                         </div>
                     </div>
                     <div class="col-md-1 my-auto">
                         <div class="ic-cart-price">
                             <p>$44.00</p>
                         </div>
                     </div>
                     <div class="col-md-3 my-auto">
                         <div class="ic-cart-remove-save cart-icon">
                                <i class="icofont-shopping-cart"></i>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="ic-cart-item">
                 <div class="row">
                     <div class="col-md-8">
                         <div class="ic-cart-image-title">
                             <div class="row">
                                 <div class="col-sm-3">
                                     <div class="image">
                                         <img src="assets/images/cart-image.jpg" class="img-fluid" alt="">
                                     </div>
                                 </div>
                                 <div class="col-sm-9 ic-col-pl0">

                                     <div class="title">
                                         <h6>User Experience Design Essentials - Adobe XD UI UX Design</h6>
                                         <p>By Daniel Walter Scott and 1 other</p>
                                     </div>
                                 </div>
                             </div>

                         </div>
                     </div>
                     <div class="col-md-1 my-auto">
                         <div class="ic-cart-price">
                             <p>$44.00</p>
                         </div>
                     </div>
                     <div class="col-md-3 my-auto">
                         <div class="ic-cart-remove-save cart-icon">
                                <i class="icofont-shopping-cart"></i>
                         </div>
                     </div>
                 </div>
             </div> --}}
         </div>
 
     </div>
    </div>
</section>


<!--Wishlist Area End -->


<!--View Cart Area End-->




<script>

    $(document).ready(function(){

        getCartItem();
    });
    function getCartItem(){

        $.ajax({

            type:"get",
            url:"{{route('user.wishListItem')}}",
            success:function(data){

                console.log(data);

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
                        html+='<div class="ic-cart-remove-save cart-icon">';
                        html+='<i class="icofont-close-squared-alt" onclick="wishListRemove('+data.data[$i].wishlist_id+')"></i>';
                        html+='<i onclick="wishToCart('+data.data[$i].course_id+')" class="icofont-shopping-cart"></i>';
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
                        html2+='<p>'+data.data[$i].course_price+'</p>';
                        html2+='</div>';
                        
                    }
                    $("#totalprice").html(total);
                    if(data.data.length>1){

                        $("#showtitle").html(data.data.length+' Courses in WishList');
                        $("#showtitle2").html(data.data.length+' Courses');

                    }else{

                        $("#showtitle").html(data.data.length+' Course in WishList');
                        $("#showtitle2").html(data.data.length+' Course');
                    }
                    
                    $("#show").html(html);
                    $("#carttotal").html(html2);

                }else{
                    

                    $("#show").html("<h1 style=color:#ff6b1b>Sorry no item is available</h1>");
                    $("#showtitle").html('No Courses in WishList');

                }
                
            },
            error:function(error){

                console.log(error);
            }
        });
    }
    function wishToCart(id){

        var course_id=id;

        $.ajax({

            type:"get",
            url:"{{route('user.wishToCart')}}",
            data:{

                course_id:course_id
            },
            success:function(data){

                if(data.status=='success'){
                    getCartItem();
                }
            },
            error:function(error){
                console.log(error);
            }
        })
    }
    function wishListRemove(id){

        $.ajax({

            type:"get",
            url:"{{route('user.wishListRemove')}}",
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
</script>


@endsection