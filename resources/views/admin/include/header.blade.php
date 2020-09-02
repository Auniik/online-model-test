<div class="topbar no-print">
    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">

             {{--<li class="list-inline-item dropdown notification-list"><a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><i class="ti-email noti-icon"></i> <span class="badge badge-danger noti-icon-badge">5</span></a>--}}
                {{--<div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">--}}
                    {{--<!-- item-->--}}
                    {{--<div class="dropdown-item noti-title">--}}
                        {{--<h5><span class="badge badge-danger float-right">745</span>Messages</h5></div>--}}
                    {{--<!-- item-->--}}
                    {{--<a href="javascript:void(0);" class="dropdown-item notify-item">--}}
                        {{--<div class="notify-icon"><img src="assets/images/users/avatar-2.jpg" alt="user-img" class="img-fluid rounded-circle"></div>--}}
                        {{--<p class="notify-details"><b>Charles M. Jones</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>--}}
                    {{--</a>--}}
                    {{--<!-- item-->--}}
                    {{--<!-- All--><a href="javascript:void(0);" class="dropdown-item notify-item">View All</a></div>--}}
            {{--</li>--}}
            {{--<li class="list-inline-item dropdown notification-list"><a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><i class="ti-bell noti-icon"></i> <span class="badge badge-success noti-icon-badge">23</span></a>--}}
                {{--<div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">--}}
                    {{--<!-- item-->--}}
                    {{--<div class="dropdown-item noti-title">--}}
                        {{--<h5><span class="badge badge-danger float-right">87</span>Notification</h5></div>--}}
                    {{--<!-- item-->--}}
                    {{--<a href="javascript:void(0);" class="dropdown-item notify-item">--}}
                        {{--<div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>--}}
                        {{--<p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>--}}
                    {{--</a>--}}
                    {{--<!-- item-->--}}
                    {{--<!-- All--><a href="javascript:void(0);" class="dropdown-item notify-item">View All</a></div>--}}
            {{--</li>--}}
            <a class="btn btn-info" target="_blank" href="/">Visit Site</a>
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><img src="{{asset('/')}}admin/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle"></a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                    <!-- item-->
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect"><i class="mdi mdi-menu"></i></button>
            </li>
        </ul>
        <div class="clearfix"></div>
    </nav>
</div>
