{{-- Logo Section --}}
<div class="br-logo"><a href=""><span>[</span>ACE<span>]</span></a></div>

{{-- Navigation Bar Left --}}
<div class="br-sideleft overflow-y-auto ps ps--theme_default ps--active-y"
     data-ps-id="b49c1c43-79a0-22f2-3bc0-fdbe19388fe4">
    <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
    <div class="br-sideleft-menu">
        <a href="{{route('home')}}" class="br-menu-link {{ Request::is('dash') ? 'active' : '' }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        @if(auth()->user()->permissions == "admin" || auth()->user()->permissions == "manager" )
        <a href="#" class="br-menu-link {{ Request::is('queries/*') ? 'active show-sub' : '' }}">
            <div class="br-menu-item ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                <span class="menu-item-label">Query Management</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('q_manage')}}" class="nav-link {{ Request::is('queries/manage') ?
            'active' : '' }}">Queries Status</a></li>

            <li class="nav-item"><a href="{{route('q_search')}}"
                                    class="nav-link {{ Request::is('queries/search') ? 'active' : ''
                                    }}">Queries</a></li>
            <li class="nav-item"><a href="{{route('q_create')}}" class="nav-link {{ Request::is('queries/create') ?
            'active' : '' }}">Create A Query</a></li>
        </ul>
        <a href="#" class="br-menu-link {{ Request::is('admissions/*') ? 'active show-sub' : '' }}">
            <div class="br-menu-item">
                <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
                <span class="menu-item-label">Student</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('a_status')}}" class="nav-link {{ Request::is
            ('admissions/admissions-status') ?
            'active' : '' }}">Admissions Status</a></li>

            <li class="nav-item"><a href="{{route('a_batches')}}" class="nav-link {{ Request::is
            ('admissions/batches') ?
            'active' : '' }}">Batch Students</a></li>
            <li class="nav-item"><a href="{{route('a_search')}}" class="nav-link {{ Request::is
            ('admissions/search') ?
            'active' : '' }}">Search a Student</a></li>
            <li class="nav-item"><a href="{{route('s_create')}}" class="nav-link {{ Request::is
            ('admissions/new-admission') ?
            'active' : '' }}">New Admission</a></li>
            <li class="nav-item"><a href="navigation-layouts.html" class="nav-link">Alumni</a></li>
        </ul>
        <a href="#" class="br-menu-link {{ Request::is('academics/*') ? 'active' : '' }}">
            <div class="br-menu-item">
                <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                <span class="menu-item-label">Academics</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('academics_courses')}}"
                                    class="nav-link {{ Request::is('academics/courses') ? 'active' : '' }}">Manage
                    Courses</a></li>
            <li class="nav-item"><a href="{{route('academics_batches')}}"
                                    class="nav-link {{ Request::is('academics/batches') ? 'active' : '' }}">Manage
                    Batches</a></li>
        </ul>
        <a href="#" class="br-menu-link {{ Request::is('notifications/*') ? 'active' : '' }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
                <span class="menu-item-label">Notifications</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('n_single')}}"
                                    class="nav-link {{ Request::is('notifications/single') ? 'active' : ''
                                    }}">Sms &amp; Email</a></li>
            <li class="nav-item"><a href="{{route('academics_batches')}}"
                                    class="nav-link {{ Request::is('notifications/batches') ? 'active' : ''
                                    }}">Batch Notifications</a></li>

            <li class="nav-item"><a href="{{route('academics_batches')}}"
                                    class="nav-link {{ Request::is('notifications/batches') ? 'active' : ''
                                    }}">Manage Lesson Planner</a></li>
        </ul>
        {{--<a href="card-dashboard.html" class="br-menu-link">--}}
        {{--<div class="br-menu-item">--}}
        {{--<i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>--}}
        {{--<span class="menu-item-label">Human Resource</span>--}}
        {{--</div><!-- menu-item -->--}}
        {{--</a><!-- br-menu-link -->--}}

        <a href="#" class="br-menu-link {{ Request::is('finance/*') ? 'active show-sub' : '' }}">
            <div class="br-menu-item">
                <i class="menu-item-icon lessoicon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Finance</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="form-layouts.html" class="nav-link">Finance Status</a></li>
            <li class="nav-item"><a href="{{route('f_admissions')}}" class="nav-link {{ Request::is
            ('finance/admissions') ?
            'active' : '' }}">Finance Recieved</a></li>
            <li class="nav-item"><a href="{{route('f_recoveries')}}" class="nav-link {{ Request::is
            ('finance/recoveries') ?
            'active' : '' }}">Pending Recoveries</a></li>
            <li class="nav-item"><a href="{{route('f_expenses')}}" class="nav-link {{ Request::is
            ('finance/expenses') ?
            'active' : '' }}">Expenses</a></li>
            <li class="nav-item"><a href="form-wizards.html" class="nav-link">Salaries</a></li>
        </ul>
        <a href="# {{ Request::is('hr/*') ? 'active show-sub' : '' }}" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-person-outline tx-20"></i>
                <span class="menu-item-label">Users</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('hr_members')}}" class="nav-link">Members</a></li>
            <li class="nav-item"><a href="table-datatable.html" class="nav-link">Roles</a></li>
        </ul>
        @endif
        {{--<a href="#" class="br-menu-link">--}}
        {{--<div class="br-menu-item">--}}
        {{--<i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>--}}
        {{--<span class="menu-item-label">Maps</span>--}}
        {{--<i class="menu-item-arrow fa fa-angle-down"></i>--}}
        {{--</div><!-- menu-item -->--}}
        {{--</a><!-- br-menu-link -->--}}
        {{--<ul class="br-menu-sub nav flex-column">--}}
        {{--<li class="nav-item"><a href="map-google.html" class="nav-link">Google Maps</a></li>--}}
        {{--<li class="nav-item"><a href="map-leaflet.html" class="nav-link">Leaflet Maps</a></li>--}}
        {{--<li class="nav-item"><a href="map-vector.html" class="nav-link">Vector Maps</a></li>--}}
        {{--</ul>--}}
        {{--<a href="#" class="br-menu-link">--}}
        {{--<div class="br-menu-item">--}}
        {{--<i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>--}}
        {{--<span class="menu-item-label">Utilities</span>--}}
        {{--<i class="menu-item-arrow fa fa-angle-down"></i>--}}
        {{--</div><!-- menu-item -->--}}
        {{--</a><!-- br-menu-link -->--}}
        {{--<ul class="br-menu-sub nav flex-column">--}}
        {{--<li class="nav-item"><a href="background.html" class="nav-link">Background</a></li>--}}
        {{--<li class="nav-item"><a href="border.html" class="nav-link">Border</a></li>--}}
        {{--<li class="nav-item"><a href="height.html" class="nav-link">Height</a></li>--}}
        {{--<li class="nav-item"><a href="margin.html" class="nav-link">Margin</a></li>--}}
        {{--<li class="nav-item"><a href="padding.html" class="nav-link">Padding</a></li>--}}
        {{--<li class="nav-item"><a href="position.html" class="nav-link">Position</a></li>--}}
        {{--<li class="nav-item"><a href="typography-util.html" class="nav-link">Typography</a></li>--}}
        {{--<li class="nav-item"><a href="width.html" class="nav-link">Width</a></li>--}}
        {{--</ul>--}}
        {{--<a href="pages.html" class="br-menu-link">--}}
        {{--<div class="br-menu-item">--}}
        {{--<i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>--}}
        {{--<span class="menu-item-label">Apps &amp; Pages</span>--}}
        {{--</div><!-- menu-item -->--}}
        {{--</a><!-- br-menu-link -->--}}
        {{--<a href="layouts.html" class="br-menu-link">--}}
        {{--<div class="br-menu-item">--}}
        {{--<i class="menu-item-icon icon ion-ios-book-outline tx-22"></i>--}}
        {{--<span class="menu-item-label">Layouts</span>--}}
        {{--</div><!-- menu-item -->--}}
        {{--</a><!-- br-menu-link -->--}}
        {{--<a href="sitemap.html" class="br-menu-link">--}}
        {{--<div class="br-menu-item">--}}
        {{--<i class="menu-item-icon icon ion-ios-list-outline tx-22"></i>--}}
        {{--<span class="menu-item-label">Sitemap</span>--}}
        {{--</div><!-- menu-item -->--}}
        {{--</a><!-- br-menu-link -->--}}
    </div><!-- br-sideleft-menu -->

    <br>
    <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;">
        <div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__scrollbar-y-rail" style="top: 0px; height: 597px; right: 0px;">
        <div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 414px;"></div>
    </div>
</div>

{{-- Navigation Bar Top --}}
<div class="br-header">
    <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a>
        </div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i
                        class="icon ion-navicon-round"></i></a></div>
        <div class="input-group hidden-xs-down wd-170 transition">
            <input id="searchbox" type="text" class="form-control" placeholder="Search">
            <span class="input-group-btn">
                <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
            </span>
        </div><!-- input-group -->
    </div><!-- br-header-left -->
    <div class="br-header-right">
        <nav class="nav">
            <div class="dropdown">
                <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                    <i class="icon ion-ios-email-outline tx-24"></i>
                    <!-- start: if statement -->
                    <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
                    <!-- end: if statement -->
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-300 pd-0-force">
                    <div class="d-flex align-items-center justify-content-between pd-y-10 pd-x-20 bd-b bd-gray-200">
                        <label class="tx-12 tx-info tx-uppercase tx-semibold tx-spacing-2 mg-b-0">Messages</label>
                        <a href="" class="tx-11">+ Add New Message</a>
                    </div><!-- d-flex -->

                    <div class="media-list">
                        <!-- loop starts here -->
                        <a href="" class="media-list-link">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <div class="d-flex align-items-center justify-content-between mg-b-5">
                                        <p class="mg-b-0 tx-medium tx-gray-800 tx-14">Donna Seay</p>
                                        <span class="tx-11 tx-gray-500">2 minutes ago</span>
                                    </div><!-- d-flex -->
                                    <p class="tx-12 mg-b-0">A wonderful serenity has taken possession of my entire soul,
                                        like these sweet mornings of spring.</p>
                                </div>
                            </div><!-- media -->
                        </a>
                        <!-- loop ends here -->
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <div class="d-flex align-items-center justify-content-between mg-b-5">
                                        <p class="mg-b-0 tx-medium tx-gray-800 tx-14">Samantha Francis</p>
                                        <span class="tx-11 tx-gray-500">3 hours ago</span>
                                    </div><!-- d-flex -->
                                    <p class="tx-12 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
                                </div>
                            </div><!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <div class="d-flex align-items-center justify-content-between mg-b-5">
                                        <p class="mg-b-0 tx-medium tx-gray-800 tx-14">Robert Walker</p>
                                        <span class="tx-11 tx-gray-500">5 hours ago</span>
                                    </div><!-- d-flex -->
                                    <p class="tx-12 mg-b-0">I should be incapable of drawing a single stroke at the
                                        present moment...</p>
                                </div>
                            </div><!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <div class="d-flex align-items-center justify-content-between mg-b-5">
                                        <p class="mg-b-0 tx-medium tx-gray-800 tx-14">Larry Smith</p>
                                        <span class="tx-11 tx-gray-500">Yesterday</span>
                                    </div><!-- d-flex -->
                                    <p class="tx-12 mg-b-0">When, while the lovely valley teems with vapour around me,
                                        and the meridian sun strikes...</p>
                                </div>
                            </div><!-- media -->
                        </a>
                        <div class="pd-y-10 tx-center bd-t">
                            <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Messages</a>
                        </div>
                    </div><!-- media-list -->
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
            <div class="dropdown">
                <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                    <i class="icon ion-ios-bell-outline tx-24"></i>
                    <!-- start: if statement -->
                    <span class="square-8 bg-danger pos-absolute t-15 r-5 rounded-circle"></span>
                    <!-- end: if statement -->
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-300 pd-0-force">
                    <div class="d-flex align-items-center justify-content-between pd-y-10 pd-x-20 bd-b bd-gray-200">
                        <label class="tx-12 tx-info tx-uppercase tx-semibold tx-spacing-2 mg-b-0">Notifications</label>
                        <a href="" class="tx-11">Mark All as Read</a>
                    </div><!-- d-flex -->

                    <div class="media-list">
                        <!-- loop starts here -->
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth
                                            Bungaos</strong> tagged you and 18 others in a post.</p>
                                    <span class="tx-12">October 03, 2017 8:45am</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <!-- loop ends here -->
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa
                                            Brown</strong> appreciated your work <strong
                                                class="tx-medium tx-gray-800">The Social Network</strong></p>
                                    <span class="tx-12">October 02, 2017 12:44am</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong
                                                class="tx-medium tx-gray-800">Sale Group</strong></p>
                                    <span class="tx-12">October 01, 2017 10:20pm</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius
                                            Erving</strong> wants to connect with you on your conversation with <strong
                                                class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                                    <span class="tx-12">October 01, 2017 6:08pm</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <div class="pd-y-10 tx-center bd-t">
                            <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Notifications</a>
                        </div>
                    </div><!-- media-list -->
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
            <div class="dropdown">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <span class="logged-name hidden-md-down">
                        {{auth()->user()->name}}
                    </span>
                    <img src="http://via.placeholder.com/64x64" class="wd-32 rounded-circle" alt="">
                    <span class="square-10 bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href=""><i class="icon ion-ios-person"></i> Edit Profile</a></li>
                        <li><a href=""><i class="icon ion-ios-gear"></i> Settings</a></li>
                        <li><a href=""><i class="icon ion-ios-download"></i> Downloads</a></li>
                        <li><a href=""><i class="icon ion-ios-star"></i> Favorites</a></li>
                        <li><a href=""><i class="icon ion-ios-folder"></i> Collections</a></li>
                        <li><a href="" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="icon ion-power"></i>
                                {{ __('Sign Out') }}

                            </a></li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </nav>
        {{--<div class="navicon-right">--}}
        {{--<a id="btnRightMenu" href="" class="pos-relative">--}}
        {{--<i class="icon ion-ios-chatboxes-outline"></i>--}}
        {{--<!-- start: if statement -->--}}
        {{--<span class="square-8 bg-danger pos-absolute t-10 r--5 rounded-circle"></span>--}}
        {{--<!-- end: if statement -->--}}
        {{--</a>--}}
        {{--</div><!-- navicon-right -->--}}
    </div><!-- br-header-right -->
</div>

{{-- Chatbox Right --}}
{{--<div class="br-sideright">--}}
{{--<ul class="nav nav-tabs sidebar-tabs" role="tablist">--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link active" data-toggle="tab" role="tab" href="#contacts"><i class="icon ion-ios-contact-outline tx-24"></i></a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" data-toggle="tab" role="tab" href="#attachments"><i class="icon ion-ios-folder-outline tx-22"></i></a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" data-toggle="tab" role="tab" href="#calendar"><i class="icon ion-ios-calendar-outline tx-24"></i></a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" data-toggle="tab" role="tab" href="#settings"><i class="icon ion-ios-gear-outline tx-24"></i></a>--}}
{{--</li>--}}
{{--</ul><!-- sidebar-tabs -->--}}

{{--<!-- Tab panes -->--}}
{{----}}
{{--<div class="tab-content">--}}
{{--<div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto active ps ps--theme_default ps--active-y" id="contacts" role="tabpanel" data-ps-id="d3b8efbc-9359-edc3-32a4-343f32c6557a">--}}
{{--<label class="sidebar-label pd-x-25 mg-t-25">Online Contacts</label>--}}
{{--<div class="contact-list pd-x-10">--}}
{{--<a href="" class="contact-list-link new">--}}
{{--<div class="d-flex">--}}
{{--<div class="pos-relative">--}}
{{--<img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">--}}
{{--<div class="contact-status-indicator bg-success"></div>--}}
{{--</div>--}}
{{--<div class="contact-person">--}}
{{--<p class="mg-b-0">Marilyn Tarter</p>--}}
{{--<span class="tx-12 op-5 d-inline-block">Clemson, CA</span>--}}
{{--</div>--}}
{{--<span class="tx-info tx-12"><span class="square-8 bg-info rounded-circle"></span> 1 new</span>--}}
{{--</div><!-- d-flex -->--}}
{{--</a><!-- contact-list-link -->--}}
{{--<a href="" class="contact-list-link">--}}
{{--<div class="d-flex">--}}
{{--<div class="pos-relative">--}}
{{--<img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">--}}
{{--<div class="contact-status-indicator bg-success"></div>--}}
{{--</div>--}}
{{--<div class="contact-person">--}}
{{--<p class="mg-b-0 ">Belinda Connor</p>--}}
{{--<span class="tx-12 op-5 d-inline-block">Fort Kent, ME</span>--}}
{{--</div>--}}
{{--</div><!-- d-flex -->--}}
{{--</a><!-- contact-list-link -->--}}
{{--<a href="" class="contact-list-link new">--}}
{{--<div class="d-flex">--}}
{{--<div class="pos-relative">--}}
{{--<img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">--}}
{{--<div class="contact-status-indicator bg-success"></div>--}}
{{--</div>--}}
{{--<div class="contact-person">--}}
{{--<p class="mg-b-0">Britanny Cevallos</p>--}}
{{--<span class="tx-12 op-5 d-inline-block">Shiboygan Falls, WI</span>--}}
{{--</div>--}}
{{--<span class="tx-info tx-12"><span class="square-8 bg-info rounded-circle"></span> 3 new</span>--}}
{{--</div><!-- d-flex -->--}}
{{--</a><!-- contact-list-link -->--}}
{{--<a href="" class="contact-list-link new">--}}
{{--<div class="d-flex">--}}
{{--<div class="pos-relative">--}}
{{--<img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">--}}
{{--<div class="contact-status-indicator bg-success"></div>--}}
{{--</div>--}}
{{--<div class="contact-person">--}}
{{--<p class="mg-b-0">Brandon Lawrence</p>--}}
{{--<span class="tx-12 op-5 d-inline-block">Snohomish, WA</span>--}}
{{--</div>--}}
{{--<span class="tx-info tx-12"><span class="square-8 bg-info rounded-circle"></span> 1 new</span>--}}
{{--</div><!-- d-flex -->--}}
{{--</a><!-- contact-list-link -->--}}
{{--<a href="" class="contact-list-link">--}}
{{--<div class="d-flex">--}}
{{--<div class="pos-relative">--}}
{{--<img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">--}}
{{--<div class="contact-status-indicator bg-success"></div>--}}
{{--</div>--}}
{{--<div class="contact-person">--}}
{{--<p class="mg-b-0">Andrew Wiggins</p>--}}
{{--<span class="tx-12 op-5 d-inline-block">Springfield, MA</span>--}}
{{--</div>--}}
{{--</div><!-- d-flex -->--}}
{{--</a><!-- contact-list-link -->--}}
{{--<a href="" class="contact-list-link">--}}
{{--<div class="d-flex">--}}
{{--<div class="pos-relative">--}}
{{--<img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">--}}
{{--<div class="contact-status-indicator bg-success"></div>--}}
{{--</div>--}}
{{--<div class="contact-person">--}}
{{--<p class="mg-b-0">Theodore Gristen</p>--}}
{{--<span class="tx-12 op-5 d-inline-block">Nashville, TN</span>--}}
{{--</div>--}}
{{--</div><!-- d-flex -->--}}
{{--</a><!-- contact-list-link -->--}}
{{--<a href="" class="contact-list-link">--}}
{{--<div class="d-flex">--}}
{{--<div class="pos-relative">--}}
{{--<img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">--}}
{{--<div class="contact-status-indicator bg-success"></div>--}}
{{--</div>--}}
{{--<div class="contact-person">--}}
{{--<p class="mg-b-0">Deborah Miner</p>--}}
{{--<span class="tx-12 op-5 d-inline-block">North Shore, CA</span>--}}
{{--</div>--}}
{{--</div><!-- d-flex -->--}}
{{--</a><!-- contact-list-link -->--}}
{{--</div><!-- contact-list -->--}}

{{--<label class="sidebar-label pd-x-25 mg-t-25">Offline Contacts</label>--}}
{{--<div class="contact-list pd-x-10">--}}
{{--<a href="" class="contact-list-link">--}}
{{--<div class="d-flex">--}}
{{--<div class="pos-relative">--}}
{{--<img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">--}}
{{--<div class="contact-status-indicator bg-gray-500"></div>--}}
{{--</div>--}}
{{--<div class="contact-person">--}}
{{--<p class="mg-b-0">Marilyn Tarter</p>--}}
{{--<span class="tx-12 op-5 d-inline-block">Clemson, CA</span>--}}
{{--</div>--}}
{{--</div><!-- d-flex -->--}}
{{--</a><!-- contact-list-link -->--}}
{{--<a href="" class="contact-list-link">--}}
{{--<div class="d-flex">--}}
{{--<div class="pos-relative">--}}
{{--<img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">--}}
{{--<div class="contact-status-indicator bg-gray-500"></div>--}}
{{--</div>--}}
{{--<div class="mg-l-10">--}}
{{--<p class="mg-b-0">Belinda Connor</p>--}}
{{--<span class="tx-12 op-5 d-inline-block">Fort Kent, ME</span>--}}
{{--</div>--}}
{{--</div><!-- d-flex -->--}}
{{--</a><!-- contact-list-link -->--}}
{{--<a href="" class="contact-list-link">--}}
{{--<div class="d-flex">--}}
{{--<div class="pos-relative">--}}
{{--<img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">--}}
{{--<div class="contact-status-indicator bg-gray-500"></div>--}}
{{--</div>--}}
{{--<div class="contact-person">--}}
{{--<p class="mg-b-0">Britanny Cevallos</p>--}}
{{--<span class="tx-12 op-5 d-inline-block">Shiboygan Falls, WI</span>--}}
{{--</div>--}}
{{--</div><!-- d-flex -->--}}
{{--</a><!-- contact-list-link -->--}}
{{--<a href="" class="contact-list-link">--}}
{{--<div class="d-flex">--}}
{{--<div class="pos-relative">--}}
{{--<img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">--}}
{{--<div class="contact-status-indicator bg-gray-500"></div>--}}
{{--</div>--}}
{{--<div class="contact-person">--}}
{{--<p class="mg-b-0">Brandon Lawrence</p>--}}
{{--<span class="tx-12 op-5 d-inline-block">Snohomish, WA</span>--}}
{{--</div>--}}
{{--</div><!-- d-flex -->--}}
{{--</a><!-- contact-list-link -->--}}
{{--<a href="" class="contact-list-link">--}}
{{--<div class="d-flex">--}}
{{--<div class="pos-relative">--}}
{{--<img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">--}}
{{--<div class="contact-status-indicator bg-gray-500"></div>--}}
{{--</div>--}}
{{--<div class="contact-person">--}}
{{--<p class="mg-b-0">Andrew Wiggins</p>--}}
{{--<span class="tx-12 op-5 d-inline-block">Springfield, MA</span>--}}
{{--</div>--}}
{{--</div><!-- d-flex -->--}}
{{--</a><!-- contact-list-link -->--}}
{{--<a href="" class="contact-list-link">--}}
{{--<div class="d-flex">--}}
{{--<div class="pos-relative">--}}
{{--<img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">--}}
{{--<div class="contact-status-indicator bg-gray-500"></div>--}}
{{--</div>--}}
{{--<div class="contact-person">--}}
{{--<p class="mg-b-0">Theodore Gristen</p>--}}
{{--<span class="tx-12 op-5 d-inline-block">Nashville, TN</span>--}}
{{--</div>--}}
{{--</div><!-- d-flex -->--}}
{{--</a><!-- contact-list-link -->--}}
{{--<a href="" class="contact-list-link">--}}
{{--<div class="d-flex">--}}
{{--<div class="pos-relative">--}}
{{--<img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">--}}
{{--<div class="contact-status-indicator bg-gray-500"></div>--}}
{{--</div>--}}
{{--<div class="contact-person">--}}
{{--<p class="mg-b-0">Deborah Miner</p>--}}
{{--<span class="tx-12 op-5 d-inline-block">North Shore, CA</span>--}}
{{--</div>--}}
{{--</div><!-- d-flex -->--}}
{{--</a><!-- contact-list-link -->--}}
{{--</div><!-- contact-list -->--}}

{{--<div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; height: 597px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 375px;"></div></div></div><!-- #contacts -->--}}

{{--<div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto ps ps--theme_default" id="attachments" role="tabpanel" data-ps-id="71112297-26fb-4124-b6bc-823a0118dead">--}}
{{--<label class="sidebar-label pd-x-25 mg-t-25">Recent Attachments</label>--}}
{{--<div class="media-file-list">--}}
{{--<div class="media">--}}
{{--<div class="pd-10 bg-primary wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">--}}
{{--<i class="fa fa-file-image-o tx-28 tx-white"></i>--}}
{{--</div>--}}
{{--<div class="media-body">--}}
{{--<p class="mg-b-0 tx-13">IMG_43445</p>--}}
{{--<p class="mg-b-0 tx-12 op-5">JPG Image</p>--}}
{{--<p class="mg-b-0 tx-12 op-5">1.2mb</p>--}}
{{--</div><!-- media-body -->--}}
{{--<a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>--}}
{{--</div><!-- media -->--}}
{{--<div class="media mg-t-20">--}}
{{--<div class="pd-10 bg-purple wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">--}}
{{--<i class="fa fa-file-video-o tx-28 tx-white"></i>--}}
{{--</div>--}}
{{--<div class="media-body">--}}
{{--<p class="mg-b-0 tx-13">VID_6543</p>--}}
{{--<p class="mg-b-0 tx-12 op-5">MP4 Video</p>--}}
{{--<p class="mg-b-0 tx-12 op-5">24.8mb</p>--}}
{{--</div><!-- media-body -->--}}
{{--<a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>--}}
{{--</div><!-- media -->--}}
{{--<div class="media mg-t-20">--}}
{{--<div class="pd-10 bg-success wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">--}}
{{--<i class="fa fa-file-word-o tx-28 tx-white"></i>--}}
{{--</div>--}}
{{--<div class="media-body">--}}
{{--<p class="mg-b-0 tx-13">Tax_Form</p>--}}
{{--<p class="mg-b-0 tx-12 op-5">Word Document</p>--}}
{{--<p class="mg-b-0 tx-12 op-5">5.5mb</p>--}}
{{--</div><!-- media-body -->--}}
{{--<a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>--}}
{{--</div><!-- media -->--}}
{{--<div class="media mg-t-20">--}}
{{--<div class="pd-10 bg-warning wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">--}}
{{--<i class="fa fa-file-pdf-o tx-28 tx-white"></i>--}}
{{--</div>--}}
{{--<div class="media-body">--}}
{{--<p class="mg-b-0 tx-13">Getting_Started</p>--}}
{{--<p class="mg-b-0 tx-12 op-5">PDF Document</p>--}}
{{--<p class="mg-b-0 tx-12 op-5">12.7mb</p>--}}
{{--</div><!-- media-body -->--}}
{{--<a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>--}}
{{--</div><!-- media -->--}}
{{--<div class="media mg-t-20">--}}
{{--<div class="pd-10 bg-warning wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">--}}
{{--<i class="fa fa-file-pdf-o tx-28 tx-white"></i>--}}
{{--</div>--}}
{{--<div class="media-body">--}}
{{--<p class="mg-b-0 tx-13">Introduction</p>--}}
{{--<p class="mg-b-0 tx-12 op-5">PDF Document</p>--}}
{{--<p class="mg-b-0 tx-12 op-5">7.7mb</p>--}}
{{--</div><!-- media-body -->--}}
{{--<a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>--}}
{{--</div><!-- media -->--}}
{{--<div class="media mg-t-20">--}}
{{--<div class="pd-10 bg-primary wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">--}}
{{--<i class="fa fa-file-image-o tx-28 tx-white"></i>--}}
{{--</div>--}}
{{--<div class="media-body">--}}
{{--<p class="mg-b-0 tx-13">IMG_43420</p>--}}
{{--<p class="mg-b-0 tx-12 op-5">JPG Image</p>--}}
{{--<p class="mg-b-0 tx-12 op-5">2.2mb</p>--}}
{{--</div><!-- media-body -->--}}
{{--<a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>--}}
{{--</div><!-- media -->--}}
{{--<div class="media mg-t-20">--}}
{{--<div class="pd-10 bg-primary wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">--}}
{{--<i class="fa fa-file-image-o tx-28 tx-white"></i>--}}
{{--</div>--}}
{{--<div class="media-body">--}}
{{--<p class="mg-b-0 tx-13">IMG_43447</p>--}}
{{--<p class="mg-b-0 tx-12 op-5">JPG Image</p>--}}
{{--<p class="mg-b-0 tx-12 op-5">3.2mb</p>--}}
{{--</div><!-- media-body -->--}}
{{--<a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>--}}
{{--</div><!-- media -->--}}
{{--<div class="media mg-t-20">--}}
{{--<div class="pd-10 bg-purple wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">--}}
{{--<i class="fa fa-file-video-o tx-28 tx-white"></i>--}}
{{--</div>--}}
{{--<div class="media-body">--}}
{{--<p class="mg-b-0 tx-13">VID_6545</p>--}}
{{--<p class="mg-b-0 tx-12 op-5">AVI Video</p>--}}
{{--<p class="mg-b-0 tx-12 op-5">14.8mb</p>--}}
{{--</div><!-- media-body -->--}}
{{--<a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>--}}
{{--</div><!-- media -->--}}
{{--<div class="media mg-t-20">--}}
{{--<div class="pd-10 bg-success wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">--}}
{{--<i class="fa fa-file-word-o tx-28 tx-white"></i>--}}
{{--</div>--}}
{{--<div class="media-body">--}}
{{--<p class="mg-b-0 tx-13">Secret_Document</p>--}}
{{--<p class="mg-b-0 tx-12 op-5">Word Document</p>--}}
{{--<p class="mg-b-0 tx-12 op-5">4.5mb</p>--}}
{{--</div><!-- media-body -->--}}
{{--<a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>--}}
{{--</div><!-- media -->--}}
{{--</div><!-- media-list -->--}}
{{--<div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div><!-- #history -->--}}
{{--<div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto ps ps--theme_default" id="calendar" role="tabpanel" data-ps-id="7269f18d-12bc-ad0d-3fa8-28c8841b4eeb">--}}
{{--<label class="sidebar-label pd-x-25 mg-t-25">Time &amp; Date</label>--}}
{{--<div class="pd-x-25">--}}
{{--<h2 id="brTime" class="tx-white tx-lato mg-b-5">09:38:11 PM</h2>--}}
{{--<h6 id="brDate" class="tx-white tx-light op-3">May 23, 2019 THU</h6>--}}
{{--</div>--}}

{{--<label class="sidebar-label pd-x-25 mg-t-25">Events Calendar</label>--}}
{{--<div class="datepicker sidebar-datepicker hasDatepicker" id="dp1558629408082"><div class="ui-datepicker-inline ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" style="display: block;"><div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all"><a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="Prev"><span class="ui-icon ui-icon-circle-triangle-w">Prev</span></a><a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="Next"><span class="ui-icon ui-icon-circle-triangle-e">Next</span></a><div class="ui-datepicker-title"><span class="ui-datepicker-month">May</span>&nbsp;<span class="ui-datepicker-year">2019</span></div></div><table class="ui-datepicker-calendar"><thead><tr><th scope="col" class="ui-datepicker-week-end"><span title="Sunday">Su</span></th><th scope="col"><span title="Monday">Mo</span></th><th scope="col"><span title="Tuesday">Tu</span></th><th scope="col"><span title="Wednesday">We</span></th><th scope="col"><span title="Thursday">Th</span></th><th scope="col"><span title="Friday">Fr</span></th><th scope="col" class="ui-datepicker-week-end"><span title="Saturday">Sa</span></th></tr></thead><tbody><tr><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">1</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">2</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">3</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">4</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">5</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">6</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">7</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">8</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">9</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">10</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">11</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">12</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">13</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">14</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">15</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">16</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">17</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">18</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">19</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">20</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">21</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">22</a></td><td class=" ui-datepicker-days-cell-over  ui-datepicker-current-day ui-datepicker-today" data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default ui-state-highlight ui-state-active ui-state-hover" href="#">23</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">24</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">25</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">26</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">27</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">28</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">29</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">30</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="4" data-year="2019"><a class="ui-state-default" href="#">31</a></td><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td></tr></tbody></table></div></div>--}}

{{--<label class="sidebar-label pd-x-25 mg-t-25">Event Today</label>--}}
{{--<div class="pd-x-25">--}}
{{--<div class="list-group sidebar-event-list mg-b-20">--}}
{{--<div class="list-group-item">--}}
{{--<div>--}}
{{--<h6 class="tx-white tx-13 mg-b-5 tx-normal">Roven's 32th Birthday</h6>--}}
{{--<p class="mg-b-0 tx-white tx-12 op-2">2:30PM</p>--}}
{{--</div>--}}
{{--<a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>--}}
{{--</div><!-- list-group-item -->--}}
{{--<div class="list-group-item">--}}
{{--<div>--}}
{{--<h6 class="tx-white tx-13 mg-b-5 tx-normal">Regular Workout Schedule</h6>--}}
{{--<p class="mg-b-0 tx-white tx-12 op-2">7:30PM</p>--}}
{{--</div>--}}
{{--<a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>--}}
{{--</div><!-- list-group-item -->--}}
{{--</div><!-- list-group -->--}}

{{--<a href="" class="btn btn-block btn-outline-secondary tx-uppercase tx-11 tx-spacing-2">+ Add Event</a>--}}
{{--<br>--}}
{{--</div>--}}

{{--<div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>--}}
{{--<div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto ps ps--theme_default" id="settings" role="tabpanel" data-ps-id="ccecae29-9ed6-ff82-e58a-db974e130df1">--}}
{{--<label class="sidebar-label pd-x-25 mg-t-25">Quick Settings</label>--}}

{{--<div class="pd-y-20 pd-x-25 tx-white">--}}
{{--<h6 class="tx-13 tx-normal">Sound Notification</h6>--}}
{{--<p class="op-5 tx-13">Play an alert sound everytime there is a new notification.</p>--}}
{{--<div class="pos-relative">--}}
{{--<input type="checkbox" name="checkbox" class="switch-button" checked="" style="display: none;"><span class="switch-button-label off">OFF</span><div class="switch-button-background checked" style="width: 25px; height: 11px;"><div class="switch-button-button" style="width: 12px; height: 11px; left: 27px;"></div></div><span class="switch-button-label on">ON</span><div style="clear: left;"></div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="pd-y-20 pd-x-25 tx-white">--}}
{{--<h6 class="tx-13 tx-normal">2 Steps Verification</h6>--}}
{{--<p class="op-5 tx-13">Sign in using a two step verification by sending a verification code to your phone.</p>--}}
{{--<div class="pos-relative">--}}
{{--<input type="checkbox" name="checkbox2" class="switch-button" style="display: none;"><span class="switch-button-label on">OFF</span><div class="switch-button-background" style="width: 25px; height: 11px;"><div class="switch-button-button" style="width: 12px; height: 11px; left: -1px;"></div></div><span class="switch-button-label off">ON</span><div style="clear: left;"></div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="pd-y-20 pd-x-25 tx-white">--}}
{{--<h6 class="tx-13 tx-normal">Location Services</h6>--}}
{{--<p class="op-5 tx-13">Allowing us to access your location</p>--}}
{{--<div class="pos-relative">--}}
{{--<input type="checkbox" name="checkbox3" class="switch-button" style="display: none;"><span class="switch-button-label on">OFF</span><div class="switch-button-background" style="width: 25px; height: 11px;"><div class="switch-button-button" style="width: 12px; height: 11px; left: -1px;"></div></div><span class="switch-button-label off">ON</span><div style="clear: left;"></div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="pd-y-20 pd-x-25 tx-white">--}}
{{--<h6 class="tx-13 tx-normal">Newsletter Subscription</h6>--}}
{{--<p class="op-5 tx-13">Enables you to send us news and updates send straight to your email.</p>--}}
{{--<div class="pos-relative">--}}
{{--<input type="checkbox" name="checkbox4" class="switch-button" checked="" style="display: none;"><span class="switch-button-label off">OFF</span><div class="switch-button-background checked" style="width: 25px; height: 11px;"><div class="switch-button-button" style="width: 12px; height: 11px; left: 27px;"></div></div><span class="switch-button-label on">ON</span><div style="clear: left;"></div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="pd-y-20 pd-x-25 tx-white">--}}
{{--<h6 class="tx-13 tx-normal">Your email</h6>--}}
{{--<div class="pos-relative">--}}
{{--<input type="email" name="email" class="form-control form-control-inverse transition pd-y-10" value="janedoe@domain.com">--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="pd-y-20 pd-x-25">--}}
{{--<h6 class="tx-13 tx-normal tx-white mg-b-20">More Settings</h6>--}}
{{--<a href="" class="btn btn-block btn-outline-secondary tx-uppercase tx-11 tx-spacing-2">Account Settings</a>--}}
{{--<a href="" class="btn btn-block btn-outline-secondary tx-uppercase tx-11 tx-spacing-2">Privacy Settings</a>--}}
{{--</div>--}}

{{--<div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>--}}
{{--</div><!-- tab-content -->--}}
{{----}}
{{----}}
{{----}}
{{----}}
{{--</div>--}}


