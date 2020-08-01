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
                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-clock"></i> <span> কুইজ টেস্ট
                        </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('quizzes.create')}}"> নতুন কুইজ</a></li>
                        <li><a href="{{route('quizzes.index')}}"> সকল কুইজ</a></li>
                    </ul>
                </li>
                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-flask"></i> <span> অনলাইন
                            পরীক্ষা
                        </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('exams.create')}}"> নতুন পরীক্ষা</a></li>
                        <li><a href="{{route('exams.index')}}"> সকল পরীক্ষাসমূহ</a></li>
                        <li><a href="{{route('assessments.index')}}">নীরিক্ষণ</a></li>
                        <li><a href="{{route('subjects.index')}}"> বিষয়  সেটিংস</a></li>
                    </ul>
                </li>
                <li><a href="{{route('participants.index')}}" class="waves-effect"><i class="mdi mdi-account"></i>
                        <span> সকল পরীক্ষার্থী</span></a></li>

                <li><a href="{{route('admin.submitted.work')}}" class="waves-effect"><i class="mdi mdi-worker"></i>
                        <span> Submitted Works</span></a></li>

                <li><a href="{{url('/messages')}}" class="waves-effect"><i class="mdi mdi-note"></i>
                        <span> Messages</span></a></li>
                <li><a href="{{url('add-news')}}" class="waves-effect"><i class="mdi mdi-note"></i>
                        <span> Manage News</span></a></li>

                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-note"></i> <span> Manage Books
                        </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{asset('add-book')}}">All Books</a></li>
                        <li><a href="{{route('create-book')}}">Create Books</a></li>
                        <li><a href="{{route('admin.book.question')}}"> Book Questions</a></li>
                        <li><a href="{{route('admin.book.question.create')}}"> Create Questions</a></li>
                    </ul>
                </li>
                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-blogger"></i> <span> Blogging
                        </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('add-blog')}}">All Blogs</a></li>
                        <li><a href="{{route('create-blog')}}">Add Blog</a></li>
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
                        <li><a href="{{asset('add-publication')}}">Manage Publication</a></li>
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
