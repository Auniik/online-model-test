<!-- Navbar STart -->
<header id="topnav" class="defaultscroll sticky bg-white">
    <div class="container">
        <!-- Logo container-->
        <div>
            <a class="logo" href="/"><img src="{{asset('/')}}front/images/hotel/logo.png"></a>
        </div>
        {{--<div class="buy-button">--}}
            {{--@if(auth()->check())--}}
                {{--<a href="{{route('user.logout')}}" class="btn btn-primary">সাইন আউট</a>--}}
            {{--@else--}}
                {{--<a href="{{route('user.login')}}" class="btn btn-primary">সাইন ইন</a>--}}
                {{--<a href="{{route('user.registration')}}" class="btn btn-primary">সাইন আউট</a>--}}
            {{--@endif--}}
        {{--</div><!--end login button-->--}}

        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li><a href="{{route('welcome')}}">হোম</a></li>
                <li class="has-submenu">
                    <a href="javascript:">আমাদের সম্পর্কে <span class="menu-arrow"></span></a>
                    <ul class="submenu">
                        <li><a href="{{asset('amaderkotha')}}">টেকসই বিডি</a></li>
                        <li><a href="{{asset('tekasaibd')}}">লক্ষ্য-ও-উদ্দেশ্য</a></li>
                        <li><a href="{{route('bangabandhu')}}">বঙ্গবন্ধু</a></li>
                        <li><a href="{{asset('blog')}}">বার্তা সমূহ</a></li>
                        <li><a href="{{route('contact')}}">যোগাযোগ</a></li>
                    </ul>
                </li>
                <li><a href="{{asset('submit-work')}}">কাজ জমা দিন</a></li>
                @if(auth()->check())
                    <li class="has-submenu">
                        <a href="javascript:">{{auth()->user()->name}}<span class="menu-arrow"></span></a>
                        <ul class="submenu">
                            <li><a href="{{route('user.profile')}}">Profile</a></li>
                            {{--<li><a href="{{route('user.logout')}}">Logout</a></li>--}}
                        </ul>
                    </li>
                @endif
                <li class="has-submenu">
                <a href="javascript:void(0)">একাউন্ট</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        @if(auth()->check())
                            <li><a href="{{route('user.logout')}}">Sign Out</a></li>
                        @else
                        <li><a href="{{route('user.login')}}">সাইন ইন</a></li>
                        <li><a href="{{route('user.registration')}}">সাইন আপ</a></li>
                        @endif
                    </ul>
                </li>
            </ul><!--end navigation menu-->
            {{--<div class="buy-menu-btn d-none">--}}
                {{--@if(auth()->check())--}}
                    {{--<a href="{{route('user.logout')}}" class="btn btn-primary">সাইন আউট</a>--}}
                {{--@else--}}
                    {{--<a href="{{route('user.login')}}" class="btn btn-primary">সাইন ইন</a>--}}
                    {{--<a href="{{route('user.registration')}}" class="btn btn-primary">সাইন আউট</a>--}}
                {{--@endif--}}
            {{--</div><!--end login button-->--}}
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->
