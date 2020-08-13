<div class="left side-menu no-print">
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
                <li><a href="{{asset('/dashboard')}}" class="waves-effect"><i class="mdi mdi-airplay"></i>
                        <span>Dashboard</span></a></li>
                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-clock"></i> <span> কুইজ টেস্ট
                        </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('quizzes.create')}}"> নতুন কুইজ</a></li>
                        <li><a href="{{route('quizzes.index')}}"> সকল কুইজ</a></li>
                        <li><a href="{{route('quizzes.results.index')}}"> কুইজ ফলাফল</a></li>
                    </ul>
                </li>
                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-flask"></i> <span> অনলাইন
                            পরীক্ষা
                        </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('exams.create')}}"> নতুন পরীক্ষা</a></li>
                        <li><a href="{{route('exams.index')}}"> সকল পরীক্ষাসমূহ</a></li>
                        <li><a href="{{route('assessments.index')}}">নীরিক্ষণ</a></li>
                        <li><a href="{{route('subjects.index')}}"> বিষয় সেটিংস</a></li>
                    </ul>
                </li>
                <li><a href="{{route('participants.index')}}" class="waves-effect"><i class="mdi mdi-account"></i>
                        <span> সকল পরীক্ষার্থী</span></a></li>

                <li><a href="{{route('admin.submitted.work')}}" class="waves-effect"><i class="mdi mdi-worker"></i>
                        <span> Submitted Works</span></a></li>
                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-book-multiple-variant"></i> <span> Manage Books
                        </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{asset('add-book')}}">সকল বইসমূহ</a></li>
                        <li><a href="{{route('create-book')}}"> নতুন বই</a></li>
                        <li><a href="{{route('admin.book.question.create')}}"> Create Questions</a></li>
                    </ul>
                </li>





                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-blogger"></i> <span>  বার্তা
                        </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('add-blog')}}"> সকল বার্তাসমূহ</a></li>
                        <li><a href="{{route('create-blog')}}"> বার্তা তৈরী করুন</a></li>
                    </ul>
                </li>

                <li><a href="{{url('add-news')}}" class="waves-effect"><i class="mdi mdi-comment"></i>
                        <span> নিউজ আপডেট</span></a></li>
                <li><a href="{{url('/add-publication')}}" class="waves-effect"><i class="mdi mdi-note"></i>
                        <span> পাবলিকেশনস</span></a></li>

                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-contact-mail"></i> <span> যোগাযোগ
                        </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        {{--<li><a href="{{asset('add-about')}}">Manage About</a></li>--}}
                        <li><a href="{{url('edit-contact')}}"> যোগাযোগ</a></li>
                        <li><a href="{{url('/messages')}}"> Messages</a></li>
                    </ul>
                </li>

                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-book-open-page-variant"></i> <span> পেজ
                        </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        {{--<li><a href="{{asset('add-about')}}">Manage About</a></li>--}}
                         <li><a href="{{asset('edit-bangabandhu-info')}}"> বঙ্গবন্ধু</a></li>
                        <li><a href="{{url('/team-members')}}"> আমাদের সম্পর্কে</a></li>
                    </ul>
                </li>

                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-folder-image"></i> <span> গ্যালারী
                        </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('add-gallery')}}"> ছবির গ্যালারী</a></li>
                        <li><a href="{{route('add-video')}}"> ভিডিওচিত্র গ্যালারী</a></li>
                    </ul>
                </li>

                <li class="has_sub"><a href="" class="waves-effect"><i class="mdi mdi-settings"></i>
                        <span> সেটিংস</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{asset('add-slider')}}"> স্লাইডার</a></li>
{{--                        <li><a href="{{route('add-event-video')}}"> ইভেন্ট ভিডিও</a></li>--}}
{{--                        <li><a href="{{asset('add-about')}}"> ছবি  ম্যানেজ করুন</a></li>--}}
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- end sidebarinner -->
</div>
