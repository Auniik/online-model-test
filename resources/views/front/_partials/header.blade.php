
<!---------------------------- মেনুবার অংশ শুরু --------------->

<section id="navbar">
    <nav class="navbar navbar-expand-lg menu">
        <div class="container">
            <a class="navbar-brand logo-img" href="/"><img src="/front-end/images/logo-1.png" alt="logo"></a>
<!--                    <a class="navbar-brand logo-img" href="#"><img src="/front-end/images/Mujib_100_Logo.png" alt="logo"></a>-->

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon">
                            <i class="fas fa-bars"></i>
                        </span> </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
{{--                <form class="form-inline my-2 my-lg-0">--}}
{{--                    <input class="form-control" type="search" placeholder="অনুসন্ধান" aria-label="Search">--}}
{{--                </form>--}}
                <ul class="navbar-nav">
{{--                    <li class="nav-item"> <a class="btn btn-sm btn-success" href="/">হোম</a> </li>--}}
                    <a href="/"  class="btn btn-outline-success my-2 my-sm-0" type="submit"> হোম </a>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            টেকসই বিডি<i class="arows fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item custom-menu" href="{{asset('amaderkotha')}}">আমাদের সম্পর্কে</a>
                            <a class="dropdown-item custom-menu" href="{{asset('tekasaibd')}}">লক্ষ্য-ও-উদ্দেশ্য</a>
                            <a class="dropdown-item custom-menu" href="{{route('bangabandhu')}}">বঙ্গবন্ধু</a>
                            <a class="dropdown-item custom-menu" href="{{route('contact')}}">যোগাযোগ</a>
                        </div>
                    </li>
                    <a href="{{url('blog')}}"  class="btn btn-outline-success my-2 my-sm-0" type="submit"> বার্তা </a>
                    @if (!auth('participant')->check())
                        <a href="/participants/login" class="btn btn-outline-success my-2 my-sm-0" type="submit">সাইন ইন</a>
                    @else
                        <a href="/participants/profile" class="btn btn-link my-2 my-sm-0" type="submit">
                            {{auth('participant')->user()->name}}
                        </a>
                        <form action="/participants/logout" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-success my-2 my-sm-0">সাইন আউট</button>
                        </form>

                    @endif
                </ul>



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
                        <p class="text-primary">
                            {!! $news !!}
                        </p>
                    </marquee>
                </td>
            </tr>
        </table>
    </div>
</section>

<!---------------------------- মেনুবার অংশ শেষ --------------->

