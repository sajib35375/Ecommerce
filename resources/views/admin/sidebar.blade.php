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

        <li class="header nav-small-cap">User Interface</li>

        <li class="treeview">
            <a href="#">
                <i data-feather="grid"></i>
                <span>Components</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
                <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
                <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
                <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
                <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
                <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i data-feather="credit-card"></i>
                <span>Cards</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
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
