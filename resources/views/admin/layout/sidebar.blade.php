<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>

            <!-- Author Portion -->
            <li class="{{ Request::is('admin/author/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_author_show') }}"><i class="fas fa-users"></i> <span>Author List</span></a></li>

            <!-- Advertisement Menu Portion -->
            <li class="nav-item dropdown
            {{ Request::is('admin/top-advertisement') ? 'active' : '' }} ||
            {{ Request::is('admin/home-advertisement') ? 'active' : '' }} ||
            {{ Request::is('admin/sidebar-advertisement') ? 'active' : '' }}
            ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-ad"></i><span>Advertisements</span></a>
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
                <a href="#" class="nav-link has-dropdown"><i class="far fa-newspaper"></i><span>News</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/category/show') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_category_show') }}"><i class="fas fa-angle-right"></i> All Categories</a></li>
                    <li class="{{ Request::is('admin/sub-category/show') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_sub_category_show') }}"><i class="fas fa-angle-right"></i>Sub Categories</a></li>
                    <li class="{{ Request::is('admin/post/show') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_post_show') }}"><i class="fas fa-angle-right"></i>Posts</a></li>
                </ul>
            </li>

            <!-- Pages Menu Portion -->
            <li class="nav-item dropdown 
            {{ Request::is('admin/page/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-copy"></i><span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/page/about') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_about') }}"><i class="fas fa-angle-right"></i>About</a></li>

                    <li class="{{ Request::is('admin/page/faq') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_faq') }}"><i class="fas fa-angle-right"></i>FAQ</a></li>

                    <li class="{{ Request::is('admin/page/contact') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_contact') }}"><i class="fas fa-angle-right"></i>Contact</a></li>

                    <li class="{{ Request::is('admin/page/login') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_login') }}"><i class="fas fa-angle-right"></i>Login</a></li>

                    <li class="{{ Request::is('admin/page/terms') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_terms') }}"><i class="fas fa-angle-right"></i>Terms And Conditions</a></li>

                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i>Privacy Policy</a></li>

                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i>Disclaimer</a></li>
                    
                </ul>
            </li>

            <li class="{{ Request::is('admin/setting') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_setting') }}"><i class="fas fa-cog"></i> <span>Setting</span></a></li>

            <li class="{{ Request::is('admin/photo/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_photo_show') }}"><i class="fas fa-camera"></i> <span>Photo Gallery</span></a></li>

            <li class="{{ Request::is('admin/video/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_video_show') }}"><i class="fas fa-video"></i> <span>Video Gallery</span></a></li>

            <li class="{{ Request::is('admin/faq/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq_show') }}"><i class="fas fa-comment"></i> <span>FAQs</span></a></li>

            <!-- Subscriber Portion -->
            <li class="nav-item dropdown 
            {{ Request::is('admin/subscriber/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Subscribers</span></a>
                <ul class="dropdown-menu">

                    <li class="{{ Request::is('admin/subscriber/all') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_subscriber') }}"><i class="fas fa-angle-right"></i>All Subscribers</a></li>

                    <li class="{{ Request::is('admin/subscriber/send-email') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_subscriber_send_email') }}"><i class="fas fa-angle-right"></i>Send Email</a></li> 

                </ul>
            </li>

            <!-- Live Channel -->
            <li class="{{ Request::is('admin/live-channel/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_live_channel_show') }}"><i class="fas fa-tv"></i> <span>Live Channel</span></a></li>

            <!-- Online Poll -->
            <li class="{{ Request::is('admin/online-poll/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_online_poll_show') }}"><i class="fas fa-poll"></i> <span>Online Poll</span></a></li>

            <!-- Language -->
            <li class="{{ Request::is('admin/language/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_language_show') }}"><i class="fas fa-language"></i> <span>Language</span></a></li>


        </ul>
    </aside>
</div>