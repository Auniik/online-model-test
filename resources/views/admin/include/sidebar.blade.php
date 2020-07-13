<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect"><i class="ion-close"></i></button>
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="{{route('home')}}" class="logo"><img src="{{asset('/')}}admin/assets/images/logo-lg.png" alt="" class="logo-large"></a>
        </div>
    </div>
    <div class="sidebar-inner niceScrollleft">
        <div id="sidebar-menu">
            <ul>
                <li><a href="{{asset('/home')}}" class="waves-effect"><i class="mdi mdi-airplay"></i> <span>Dashboard</span></a></li>
                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-layers"></i> <span> কুইজ টেস্ট
                        </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('quizzes.create')}}"> নতুন কুইজ</a></li>
                        <li><a href="{{route('quizzes.index')}}"> সকল কুইজ</a></li>
                        <li><a href="{{route('admin.player.add')}}">Manage Player</a></li>
                        <li><a href="{{route('add-question')}}">Questions</a></li>
                        <li><a href="{{route('admin.results')}}">Results</a></li>
                    </ul>
                </li>
                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-layers"></i> <span> অনলাইন পরীক্ষা
                        </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('exams.create')}}">Create Exam</a></li>
                        <li><a href="{{route('exams.index')}}">All Exams</a></li>
                        <li><a href="{{route('participants.index')}}">Participants</a></li>
                        <li><a href="{{route('assessments.index')}}">Assessments</a></li>
                        <li><a href="{{route('admin.results')}}">Results</a></li>
                        <li><a href="{{route('subjects.index')}}">Subjects</a></li>
                    </ul>
                </li>
                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-layers"></i> <span>Work </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.submitted.work')}}">Submitted Work</a></li>
                    </ul>
                </li>
                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-layers"></i> <span>Book Questions </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.book.question')}}">Book Question</a></li>
                    </ul>
                </li>
                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-layers"></i> <span>Gallery
                        </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('add-gallery')}}">Image Gallery</a></li>
                        <li><a href="{{route('add-video')}}">Video Gallery</a></li>
                    </ul>
                </li>
                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-layers"></i> <span>Page </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        {{--<li><a href="{{asset('add-about')}}">Manage About</a></li>--}}
                        <li><a href="{{asset('add-contact')}}">Manage Contact</a></li>
                         <li><a href="{{asset('add-bangabandhu')}}">Bangabandhu Page</a></li>
                        <li><a href="{{asset('add-book')}}">Manage Book</a></li>
                        <li><a href="{{asset('add-news')}}">Manage News</a></li>
                        <li><a href="{{asset('add-publication')}}">Manage Publication</a></li>
                    </ul>
                </li>
                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-layers"></i> <span>Blog</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{asset('add-blog')}}">Manage Blog</a></li>
                    </ul>
                </li>
                <!--<li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-layers"></i> <span>Video</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>-->
                <!--    <ul class="list-unstyled">-->
                <!--        <li><a href="{{route('add-video')}}">Manage Video</a></li>-->
                <!--    </ul>-->
                <!--</li>-->
                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-layers"></i> <span>Event Video</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('add-event-video')}}">Manage Event Video</a></li>
                    </ul>
                </li>
                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-layers"></i>
                        <span>Settings</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{asset('add-slider')}}">Manage Slider</a></li>
                    </ul>
                    <ul class="list-unstyled">
                        <li><a href="{{route('add-event-message')}}">Manage Message</a></li>
                    </ul>
                    <ul class="list-unstyled">
                        <li><a href="{{asset('add-about')}}">Manage Image</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- end sidebarinner -->
</div>
