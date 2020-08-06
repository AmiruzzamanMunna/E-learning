@extends('Layouts.admin-home')
@section('title')
    Coupon
@endsection
@section('content')

<div class="container">
    
    <div class="card" style="margin-top: 10%">

        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Course Category</div>
                <div class="col-md-1 ml-auto">
                    @if (Session::has('couponadd'))
                        <i onclick="openModal()" class="fas fa-plus"></i>
                    @endif
                    
                </div>
            </div>
        </div>
        <div class="card-body">

            <table class="table table-bordered table-responsive-md">
                <thead>
                    <thead>
                        <th>Sl No</th>
                        <th>Name</th>
                        <th>Limit</th>
                        <th>Amount</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="showData">
                        
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Coupon Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="catname" id="name" onfocusout="nameCheck()" class="form-control">   
                <p id="pname" style="color: red">This field is required</p>             
            </div>
            <div class="form-group">
                <label for="">Limit</label>
                <input type="number" name="catname" onfocusout="limitCheck()" id="limit" class="form-control">   
                <p id="plimit" style="color: red">This field is required</p>             
            </div>
            <div class="form-group">
                <label for="">Amount</label>
                <input type="text" name="catname" onfocusout="amountCheck()" id="amount" class="form-control">   
                <p id="pamount" style="color: red">This field is required</p>             
            </div>
            <div class="form-group">
                <label for="">Start Date</label>
                <input type="date" name="catname" id="startdate" onfocusout="startDateCheck()" value="{{date('Y-m-d')}}" class="form-control">   
                <p id="pstartdate" style="color: red">This field is required</p>             
            </div>
            <div class="form-group">
                <label for="">End Date</label>
                <input type="date" name="catname" id="enddate" onfocusout="endDateCheck()" onfocusout="dateCheck()" value="{{date('Y-m-d')}}" class="form-control">   
                <p id="penddate" style="color: red">This field is required</p>
                <p id="dateerror" style="color: red">Your End date is not greater than the start date</p>             
            </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="insertCoupon()">Save changes</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Coupon Update</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="catname" id="uname" class="form-control"> 
                <input type="hidden" name="" id="id">  
                             
            </div>
            <div class="form-group">
                <label for="">Limit</label>
                <input type="number" name="catname" id="ulimit" class="form-control">   
                           
            </div>
            <div class="form-group">
                <label for="">Amount</label>
                <input type="text" name="catname" id="uamount" class="form-control">   
                            
            </div>
            <div class="form-group">
                <label for="">Start Date</label>
                <input type="date" name="catname" id="ustartdate" class="form-control">   
                          
            </div>
            <div class="form-group">
                <label for="">End Date</label>
                <input type="date" name="catname" id="uenddate" onfocusout="uDateCheck()" class="form-control">   
                <p id="udateerror" style="color: red">Your End date is not greater than the start date</p>
                            
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="editCouponUpdate()">Save changes</button>
        </div>
      </div>
    </div>
</div>

  <script>

    $("#dateerror").hide();
    $("#udateerror").hide();
    $("#pname").hide();
    $("#plimit").hide();
    $("#pamount").hide();
    $("#pstartdate").hide();
    $("#penddate").hide();

    $(document).ready(function(){

        getCouponList();

    });

    function nameCheck(){

        var name=$("#name").val();
        
        if(name==''){

            $("#pname").show()

        }else{

            $("#pname").hide();

        }

    }
    function limitCheck(){

        var name=$("#limit").val();
        
        if(name==''){

            $("#plimit").show()

        }else{

            $("#plimit").hide();

        }

    }
    function amountCheck(){

        var name=$("#amount").val();
        
        if(name==''){

            $("#pamount").show()

        }else{

            $("#pamount").hide();

        }

    }
    function startDateCheck(){

        var name=$("#startdate").val();
        
        if(name==''){

            $("#pstartdate").show()

        }else{

            $("#pstartdate").hide();

        }

    }
    function endDateCheck(){

        var name=$("#enddate").val();
        
        if(name==''){

            $("#penddate").show()

        }else{

            $("#penddate").hide();

        }

    }

    function dateCheck(){

        $("#dateerror").hide();
    }
    function uDateCheck(){

        $("#udateerror").hide();
    }

    function getCouponList(){


        $.ajax({

            type:"get",
            url:"{{route('admin.getCouponList')}}",
            success:function(data){

                var html='';
                for($i=0;$i<data.data.length;$i++){


                    html+='<tr>';
                    html+='<td>'+($i+1)+'</td>';
                    html+='<td>'+data.data[$i].coupon_name+'</td>';
                    html+='<td>'+data.data[$i].coupon_limit+'</td>';
                    html+='<td>'+data.data[$i].coupon_amount+'</td>';
                    html+='<td>'+data.data[$i].coupon_start_date+'</td>';
                    html+='<td>'+data.data[$i].coupon_end_date+'</td>';
                    if(data.couponedit==20 && data.coupondelete==21){
                        html+='<td><i class="fas fa-edit" onclick="editCoupon('+data.data[$i].coupon_id+')"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-trash" onclick="deleteCoupon('+data.data[$i].coupon_id+')"></i></td>';
                    }else if(data.couponedit==20){

                        html+='<td><i class="fas fa-edit" onclick="editCoupon('+data.data[$i].coupon_id+')"></i>&nbsp;&nbsp;&nbsp;&nbsp;</td>';

                    }else if(data.coupondelete==21){

                        html+='<td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-trash" onclick="deleteCoupon('+data.data[$i].coupon_id+')"></i></td>';

                    }else {
                        html+='<td></td>';
                    }
                    
                    html+='</tr>';
                    
                }
                $("#showData").html(html);

            },
            error:function(error){
                console.log(error);
            }
        });


    }

    function openModal(){

        $("#exampleModalCenter").modal('show');
        
    }
    function insertCoupon(){

        var name=$("#name").val();
        var limit=$("#limit").val();
        var amount=$("#amount").val();
        var startdate=$("#startdate").val();
        var enddate=$("#enddate").val();

        if(name=='' && limit=='' && amount=='' && startdate=='' && enddate==''){

            $("#pname").show();
            $("#plimit").show();
            $("#pamount").show();
            $("#pstartdate").show();
            $("#penddate").show();

        }else if(name==''&& limit=='' && amount==''){

            console.log('here');

            $("#pname").show();
            $("#pamount").show();
            $("#plimit").show();


        }else if(limit=='' && amount=='' && startdate=='' && enddate==''){

            $("#plimit").show();
            $("#pamount").show();
            $("#pstartdate").show();
            $("#penddate").show();

        }else if(amount=='' && startdate=='' && enddate==''){
            
            $("#pamount").show();
            $("#pstartdate").show();
            $("#penddate").show();

        }else if(startdate=='' && enddate==''){
            
            $("#pstartdate").show();
            $("#penddate").show();

        }else if(startdate==''){
            
            $("#pstartdate").show();
           

        }else if(enddate==''){
            
            $("#penddate").show();

        }else if(amount==''){
            
            $("#pamount").show();
            

        }else if(limit==''){
            
            $("#plimit").show();
            
            
        }else if(name==''){

            $("#pname").show();
            

        }else if(name=='' && amount=='' && startdate=='' && enddate==''){

            $("#pname").show();
            $("#pamount").show();
            $("#pstartdate").show();
            $("#penddate").show();

        }else if(limit=='' && startdate=='' && enddate==''){

            
            $("#plimit").show();
            $("#pstartdate").show();
            $("#penddate").show();

        }else if(amount=='' && startdate=='' && enddate==''){

            $("#pamount").show();
            $("#pstartdate").show();
            $("#penddate").show();

        }else if(name=='' && limit==''){

            $("#pname").show();
            $("#plimit").show();
            

        }else if(name=='' && amount==''){

            $("#pname").show();
            
            $("#pamount").show();
            

        }else if(name=='' && startdate==''){

            $("#pname").show();

            $("#pstartdate").show();
         

        }else if(name=='' && enddate==''){

            $("#pname").show();
            $("#penddate").show();

        }else if(limit=='' && amount==''){

            
            $("#plimit").show();
            $("#pamount").show();
            

        }else if(limit=='' && startdate==''){

           
            $("#plimit").show();
            $("#pstartdate").show();
            

        }else if(limit=='' && enddate==''){

            $("#plimit").show();
            $("#penddate").show();

        }else if(amount=='' && startdate==''){

            
            $("#pamount").show();
            $("#pstartdate").show();
           

        }else if(amount=='' && enddate==''){

           
            $("#pamount").show();
            $("#penddate").show();

        }else{

            $.ajax({

                type:"get",
                url:"{{route('admin.insertCoupon')}}",
                data:{

                    name:name,
                    limit:limit,
                    amount:amount,
                    startdate:startdate,
                    enddate:enddate,
                },
                success:function(data){

                    console.log(data);

                    if(data.status=='error'){

                        $("#dateerror").show();

                    }else{

                        $("#exampleModalCenter").modal('hide');
                        var name=$("#name").val('');
                        var limit=$("#limit").val('');
                        var amount=$("#amount").val('');
                        var startdate=$("#startdate").val();
                        var enddate=$("#enddate").val();
                        getCouponList();

                    }

                    

                },
                error:function(error){

                    console.log(error);
                }

            });

        }

        
    }
    function editCoupon(id){

        console.log(id);

        $("#exampleModalCenter1").modal('show');
        $("#udateerror").hide();

        $.ajax({

            type:"get",
            url:"{{route('admin.editCoupon')}}",
            data:{

                id:id
            },
            success:function(data){
                
                $("#id").val(id);
                var name=$("#uname").val(data.data.coupon_name);
                var limit=$("#ulimit").val(data.data.coupon_limit);
                var amount=$("#uamount").val(data.data.coupon_amount);
                var startdate=$("#ustartdate").val(data.data.coupon_start_date);
                var enddate=$("#uenddate").val(data.data.coupon_end_date);
                

            },
            error:function(error){
                console.log(error);
            }
        });

    }
    function editCouponUpdate(){

        var name=$("#uname").val();
        var limit=$("#ulimit").val();
        var amount=$("#uamount").val();
        var startdate=$("#ustartdate").val();
        var enddate=$("#uenddate").val();
        var id=$("#id").val();

        $.ajax({

            type:"get",
            url:"{{route('admin.editCouponUpdate')}}",
            data:{

                name:name,
                limit:limit,
                amount:amount,
                startdate:startdate,
                enddate:enddate,
                id:id
            },
            success:function(data){

                console.log(data);

                if(data.status=='error'){

                    $("#udateerror").show();

                }else{

                    $("#exampleModalCenter1").modal('hide');

                }

                
                
                getCouponList();

            },
            error:function(error){

                console.log(error);
            }

        });

    }
    function deleteCoupon(id){

        $.ajax({

            type:"get",
            url:"{{route('admin.deleteCoupon')}}",
            data:{

                id:id
            },
            success:function(data){

                getCouponList();

            },
            error:function(error){
                console.log(error);
            }
        });
        
    }
  </script>

    
@endsection