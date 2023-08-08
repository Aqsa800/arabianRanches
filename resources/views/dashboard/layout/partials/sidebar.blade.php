<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div>
<a href="/home" class="brand-link">
        <center><img src="@if($logo) {{  $logo }} @else {{ asset('dashboard/dist/img/AdminLTELogo.png')}} @endif" alt="AdminLTE Logo" class="brand-image bg-white p-1 float-none"></center>
        <small class="brand-text font-weight-light">{{ $name }}</small>
    </a>
    </div>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if( Auth()->user()->image)
                <img src="{{ Auth()->user()->image }}" class="img-circle elevation-2" alt="User Image" style="width: 50px;
                height: 50px;
                object-fit: contain;">
                @else
                <img src="{{ asset('dashboard/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image" style="width: 50px;
                height: 50px;
                object-fit: contain;">
                @endif

            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth()->user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{ url('home') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-building"></i>
                        <p>
                            Real State
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('dashboard/properties') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Properties</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard/accommodations') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Accommodations</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard/amenities') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Amenities</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard/subCommunity') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub Community</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ url('dashboard/features') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Features</p>
                            </a>
                        </li>  --}}
                        <li class="nav-item">
                            <a href="{{ url('dashboard/offer-types') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Offer Types</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard/developers') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Developers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard/agents') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Agents</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard/completion-statuses') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Completion Status</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard/categories') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard/communities') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Communities</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard/neighbours') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Neighbours</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-user-plus"></i>
                        <p>
                            Lead Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('dashboard/leads') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lead List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--<li class="nav-item">-->
                <!--    <a href="{{ url('dashboard/testimonials') }}" class="nav-link">-->
                <!--        <i class="nav-icon fa fa-quote-left"></i>-->
                <!--        <p>Testimonials</p>-->
                <!--    </a>-->
                <!--</li>-->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-file"></i>
                        <p>
                            Content Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('dashboard/blogs') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blogs</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>
                            Website Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('dashboard/bulk-sms') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bulk SMS </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard/recaptcha-site-key') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Recaptcha Site Key</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard/social-info') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Social Info</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard/basic-info') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Basic Info</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-search-plus"></i>
                        <p>
                            SEO
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('dashboard/page-tags') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Page Tags</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('dashboard/teams') }}" class="nav-link">
                        <i class="nav-icon fa fa-user-plus"></i>
                        <p>Teams</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('dashboard/banners') }}" class="nav-link">
                        <i class="nav-icon fa fa-user-plus"></i>
                        <p>Banners</p>
                    </a>
                </li>
                @if (Auth::user()->role=== config('constants.super_admin'))
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            User Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('dashboard/users') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User List </p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ url('dashboard/profileSettings') }}" class="nav-link">
                        <i class="nav-icon fa fa-user-md"></i>
                        <p>Profile Setting</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="nav-icon fa fa-times"></i>
                        <p>Logout</p>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                        @csrf
                    </form>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
