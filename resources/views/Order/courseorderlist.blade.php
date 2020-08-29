@extends('Layouts.admin-home')
@section('title')
    Course Order
@endsection
@section('content')

<div class="container">
    
    <div class="card" style="margin-top: 10%">

        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Order List</div>
                <div class="col-md-1 ml-auto">
                    
                    
                </div>
            </div>
        </div>
        <div class="card-body">

            <table class="table table-bordered table-responsive-md">
                <thead>
                    <thead>
                        <th>Sl No</th>
                        <th>Course Name</th>
                        <th>User Name</th>
                        <th>Amount</th>
                        <th>Order Date</th>
                        <th>Course Activity</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($data as $key=>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->course_name}}</td>
                                <td>{{$item->signup_name}}</td>
                                <td>{{$item->order_amount}}</td>
                                <td>{{$item->order_date}}</td>
                                <td>
                                    @if (Session::has('orderactive'))
                                        @if ($item->order_status==0)
                                            <button class="btn btn-danger"><a style="color: white" href="{{route('admin.activeCourse',$item->order_id)}}">Deactive</a></button>
                                        @else
                                            <button class="btn btn-success"><a style="color: white" href="{{route('admin.deActiveCourse',$item->order_id)}}">Active</a></button>
                                        @endif
                                    @endif
                                    
                                </td>
                                <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    @if (Session::has('orderdelete'))
                                        <a onclick="return confirm('Are You Sure!!')" href="{{route('admin.orderCourseDelete',$item->order_id)}}"><i class="fas fa-trash"></i>
                                        </a>
                                    @endif
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>



<script>

    
    $("#pemailexist").hide();
    $("#pname").hide();
    $("#prole").hide();
    $("#pemail").hide();
    $("#paddress").hide();
    $("#pphnnum").hide();
    $("#ppass").hide();


    


    $("#pcatname").hide();

    

    
  </script>

    
@endsection