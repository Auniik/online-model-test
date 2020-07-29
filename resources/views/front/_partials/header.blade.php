
<!---------------------------- মেনুবার অংশ শুরু --------------->

<section id="navbar">
    <nav class="navbar navbar-expand-lg menu">
        <div class="container">
            <a class="navbar-brand logo-img" href="/"><img src="/front-end/images/logo-1.png" alt="logo"></a>
            <!--                    <a class="navbar-brand logo-img" href="#"><img src="/front-end/images/Mujib_100_Logo.png" alt="logo"></a>-->

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon">
                            <i class="fas fa-bars"></i>
                        </span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control" type="search" placeholder="অনুসন্ধান" aria-label="Search">
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link active_home" href="/">হোম</a> </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            টেকসই বিডি<i class="arows fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item custom-menu" href="{{asset('amaderkotha')}}">আমাদের সম্পর্কে</a>
                            <a class="dropdown-item custom-menu" href="{{asset('tekasaibd')}}">লক্ষ্য-ও-উদ্দেশ্য</a>
                            <a class="dropdown-item custom-menu" href="{{route('bangabandhu')}}">বঙ্গবন্ধু</a>
                            <a class="dropdown-item custom-menu" href="{{route('contact')}}">যোগাযোগ</a>
                        </div>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{asset('blog')}}">বার্তা</a> </li>
                </ul>
                @if (!auth('participant')->check())
                    <a href="/participants/login" class="btn btn-outline-success my-2 my-sm-0" type="submit">সাইন ইন</a>
                @else
                    <a href="/participants/profile" class="btn btn-link my-2 my-sm-0" type="submit">
                        {{auth('participant')->user()->name}}
                    </a>
                    <form action="/participants/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-success my-2 my-sm-0" type="submit">সাইন আউট</button>
                    </form>

                @endif


            </div>
            <a class="navbar-brand mujib-logo-img" href="#"><img src="/front-end/images/Mujib_100_Logo.png"
                                                                 alt="logo"></a>
        </div>
    </nav>
</section>

<section id="navbar" class="top-bar animated slideInDown">
    <div class="container-fulied">

        <table class="update-part">
            <tr>
                <td >
                    <p class="update-label">আপডেট</p>
                </td>
                <td class="up-content">
                    <marquee behavior="scroll" scrollamount="8" direction="left">
                        <p>
                            <a href="#">১। ষষ্ঠ শ্রেণির শিক্ষার্থীদের জন্য অনলাইন পরীক্ষা শুরু হতে যাচ্ছে ,</a>
                            <a href="#">২। মুজিব বর্ষ উপলক্ষে অনলাইন কুইজে অংশ নিন ,</a>
                            <a href="#">৩। আপনার সৃজনশীল কাজ জমা দিন ।</a>
                        </p>
                    </marquee>
                </td>
            </tr>
        </table>
    </div>
</section>

<!---------------------------- মেনুবার অংশ শেষ --------------->

