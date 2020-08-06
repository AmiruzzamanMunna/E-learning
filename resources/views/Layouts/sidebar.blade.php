      <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Main</li>
                            <li>
                                <a href="{{route('admin.index')}}" class="waves-effect">
                                    <i class="ti-home"></i><span class="badge badge-primary badge-pill float-right">2</span> <span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i><span>Administration<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    @if (Session::has('rolelist'))
                                        <li><a href="{{route('admin.roleIndex')}}">Role</a></li>
                                    @endif
                                    
                                    <li><a href="{{route('admin.adminListIndex')}}">Admin</a></li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-book"></i><span> Course <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    @if (Session::has('coursecatlist'))

                                        <li><a href="{{route('admin.courseCategoryIndex')}}">Course Category</a></li>
                                        
                                    @endif
                                    @if (Session::has('courseadd'))

                                        <li><a href="{{route('admin.courseAdd')}}">Add New Course</a></li>
                                        
                                    @endif
                                    @if (Session::has('courselist'))

                                        <li><a href="{{route('admin.courseListIndex')}}">All Course</a></li>
                                        
                                    @endif
                                    @if (Session::has('courselist'))

                                        {{-- <li><a href="{{route('admin.courseContentIndex')}}">All Lecture</a></li> --}}
                                        
                                    @endif
                                    
                                    
                                </ul>
                            </li>
                        
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-user-tie"></i><span>User <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">

                                    
                                    @if (Session::has('userlist'))

                                        <li><a href="{{route('admin.userList')}}">Registered User</a></li>
                                        
                                    @endif
                                    
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-shopping-bag"></i><span>Order <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    {{-- @if (Session::has('couponlist')) --}}
                                        <li><a href="{{route('admin.courseOrderList')}}">Course Order</a></li>
                                    {{-- @endif --}}
                                
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-gift"></i><span>Coupon <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    @if (Session::has('couponlist'))
                                        <li><a href="{{route('admin.couponIndex')}}">Coupon</a></li>
                                    @endif
                                
                                </ul>
                            </li>

                            

                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
