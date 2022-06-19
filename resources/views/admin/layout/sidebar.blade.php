<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            <!-- Advertisement Menu Portion -->
            <li class="nav-item dropdown
            {{ Request::is('admin/top-advertisement') ? 'active' : '' }} ||
            {{ Request::is('admin/home-advertisement') ? 'active' : '' }} ||
            {{ Request::is('admin/sidebar-advertisement') ? 'active' : '' }}
            ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Advertisements</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/top-advertisement') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_top_ad_show') }}"><i class="fas fa-angle-right"></i> Top Advertisement</a></li>
                    <li class="{{ Request::is('admin/home-advertisement') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home_ad_show') }}"><i class="fas fa-angle-right"></i>Home Advertisement</a></li>
                    <li class="{{ Request::is('admin/sidebar-advertisement') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_sidebar_ad_show') }}"><i class="fas fa-angle-right"></i>Sidebar Advertisement</a></li>
                </ul>
            </li>

            <!-- News Menu Portion -->
            <li class="nav-item dropdown 
            {{ Request::is('admin/category/show') ? 'active' : '' }} ||
            {{ Request::is('admin/sub-category/show') ? 'active' : '' }} ||
            {{ Request::is('admin/post/show') ? 'active' : '' }}
            ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>News</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/category/show') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_category_show') }}"><i class="fas fa-angle-right"></i> All Categories</a></li>
                    <li class="{{ Request::is('admin/sub-category/show') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_sub_category_show') }}"><i class="fas fa-angle-right"></i>Sub Categories</a></li>
                    <li class="{{ Request::is('admin/post/show') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_post_show') }}"><i class="fas fa-angle-right"></i>Posts</a></li>
                </ul>
            </li>

            <!-- News Menu Portion -->
            <li class="nav-item dropdown 
            {{ Request::is('admin/page/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/page/about') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_about') }}"><i class="fas fa-angle-right"></i>About</a></li>
                    <li class="{{ Request::is('admin/page/faq') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_faq') }}"><i class="fas fa-angle-right"></i>FAQ</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i>Contact</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i>Login</a></li>
                    <li class="{{ Request::is('admin/page/terms') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_terms') }}"><i class="fas fa-angle-right"></i>Terms And Conditions</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i>Privacy Policy</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i>Disclaimer</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/setting') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_setting') }}"><i class="fas fa-hand-point-right"></i> <span>Setting</span></a></li>

            <li class="{{ Request::is('admin/photo/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_photo_show') }}"><i class="fas fa-hand-point-right"></i> <span>Photo Gallery</span></a></li>

            <li class="{{ Request::is('admin/video/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_video_show') }}"><i class="fas fa-hand-point-right"></i> <span>Video Gallery</span></a></li>

            {{-- <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Dropdown Items</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 1</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 2</a></li>
                </ul>
            </li> --}}


            <!-- Settings Portion 
            <li class=""><a class="nav-link" href="setting.html"><i class="fas fa-hand-point-right"></i> <span>Setting</span></a></li>
            -->
            
            {{-- <li class=""><a class="nav-link" href="setting.html"><i class="fas fa-hand-point-right"></i> <span>Setting</span></a></li>

            <li class=""><a class="nav-link" href="form.html"><i class="fas fa-hand-point-right"></i> <span>Form</span></a></li>

            <li class=""><a class="nav-link" href="table.html"><i class="fas fa-hand-point-right"></i> <span>Table</span></a></li>

            <li class=""><a class="nav-link" href="invoice.html"><i class="fas fa-hand-point-right"></i> <span>Invoice</span></a></li> --}}

        </ul>
    </aside>
</div>