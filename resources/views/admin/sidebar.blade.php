@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp
<section class="sidebar">

    <div class="user-profile">
        <div class="ulogo">
            <a href="index.html">
                <!-- logo for regular state and mobile devices -->
                <div class="d-flex align-items-center justify-content-center">
                    <img src="{{ URL::to('backend/images/logo-dark.png') }}" alt="">
                    <h3><b>Sajib</b> Admin</h3>
                </div>
            </a>
        </div>
    </div>

    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">

        <li>
            <a href="{{ url('admin/dashboard') }}">
                <i data-feather="pie-chart"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="treeview">
            <a href="#">
                <i data-feather="message-circle"></i>
                <span>Brands</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route=='brand.index')?'active':'' }}"><a href="{{ route('brand.index') }}"><i class="ti-more"></i>All Brand</a></li>
                <li><a href="calendar.html"><i class="ti-more"></i>Calendar</a></li>
            </ul>
        </li>

        <li class="treeview {{ ($route=='all.category')?'active':'' }} ">
            <a href="">
                <i data-feather="mail"></i> <span>Category</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route=='all.category')?'active':'' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a></li>
                <li class="{{ ($route=='all.subcategory')?'active':'' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All SubCategory</a></li>
                <li class="{{ $route=='sub.subcategory'?'active':'' }}"><a href="{{ route('sub.subcategory') }}"><i class="ti-more"></i>Sub-SubCategory</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i data-feather="file"></i>
                <span>Products</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='add.product'?'active':'' }}"><a href="{{ route('add.product') }}"><i class="ti-more"></i>Add Product</a></li>
                <li class="{{ $route=='manage.product'?'active':'' }}"><a href="{{ route('manage.product') }}"><i class="ti-more"></i>Manage Product</a></li>

            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i data-feather="file"></i>
                <span>Sliders</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='slider.show'?'active':'' }}"><a href="{{ route('slider.show') }}"><i class="ti-more"></i>Manage Sliders</a></li>


            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i data-feather="file"></i>
                <span>Coupon</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='manage.coupon'?'active':'' }}"><a href="{{ route('manage.coupon') }}"><i class="ti-more"></i>Manage Coupon</a></li>


            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i data-feather="file"></i>
                <span>Shipping</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='all.division'?'active':'' }}"><a href="{{ route('all.division') }}"><i class="ti-more"></i>Division</a></li>
                <li class="{{ $route=='all.district'?'active':'' }}"><a href="{{ route('all.district') }}"><i class="ti-more"></i>District</a></li>
                <li class="{{ $route=='all.state'?'active':'' }}"><a href="{{ route('all.state') }}"><i class="ti-more"></i>State</a></li>


            </ul>
        </li>



        <li class="treeview">
            <a href="#">
                <i data-feather="file"></i>
                <span>Orders</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='pending.orders'?'active':'' }}"><a href="{{ route('pending.orders') }}"><i class="ti-more"></i>Pending Orders</a></li>
                <li class="{{ $route=='confirm.order'?'active':'' }}"><a href="{{ route('confirm.order') }}"><i class="ti-more"></i>Confirm Orders</a></li>
                <li class="{{ $route=='processing.order'?'active':'' }}"><a href="{{ route('processing.order') }}"><i class="ti-more"></i>Processing Orders</a></li>
                <li class="{{ $route=='picked.order'?'active':'' }}"><a href="{{ route('picked.order') }}"><i class="ti-more"></i>Picked Orders</a></li>
                <li class="{{ $route=='shipped.order'?'active':'' }}"><a href="{{ route('shipped.order') }}"><i class="ti-more"></i>Shipped Orders</a></li>
                <li class="{{ $route=='delivered.order'?'active':'' }}"><a href="{{ route('delivered.order') }}"><i class="ti-more"></i>Delivered Orders</a></li>
                <li class="{{ $route=='cancel.order'?'active':'' }}"><a href="{{ route('cancel.order') }}"><i class="ti-more"></i>Cancel Orders</a></li>


            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i data-feather="credit-card"></i>
                <span>Reports</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='all.report'?'active':'' }}"><a href="{{ route('all.report') }}"><i class="ti-more"></i>All Reports</a></li>

            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i data-feather="credit-card"></i>
                <span>All User</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route=='all.user'?'active':'' }}"><a href="{{ route('all.user') }}"><i class="ti-more"></i>All User</a></li>

            </ul>
        </li>


        <li class="header nav-small-cap">EXTRA</li>

        <li class="treeview">
            <a href="#">
                <i data-feather="layers"></i>
                <span>Multilevel</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#">Level One</a></li>
                <li class="treeview">
                    <a href="#">Level One
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Level Two</a></li>
                        <li class="treeview">
                            <a href="#">Level Two
                                <span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#">Level Three</a></li>
                                <li><a href="#">Level Three</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#">Level One</a></li>
            </ul>
        </li>



    </ul>
</section>
