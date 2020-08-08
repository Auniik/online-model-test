@php
    $default_description = "বঙ্গবন্ধুর জন্ম শতবার্ষিকী উপলক্ষে তার আদর্শ ও চেতনার প্রতি বিনম্রচিত্ত্বে সম্মান রেখে tekasaibd.com টেকসই লক্ষ্যমাত্রা নির্ধারণ করে মুজিব বর্ষব্যাপী বিভিন্ন সামাজিক ও মানবিক সমস্যার স্থায়ী সমাধান কার্যক্রম হাতে নিয়েছে।";
@endphp
    <title> @if ( $meta->title) {{ $meta->title}} @else  টেকসইবিডি @endif </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{url($meta->image)}}">
    <meta name="description" content="@if ($meta->description) {{$meta->description}} @else {{$default_description}} @endif">
    <meta name="keywords" content="টেকসই বিডি, tekasaibd.com, @if (isset($keywords)) {{$keywords}} @endif">
    <meta name="author" content="মোঃ নুরউদ্দিন রোকসার">

    <meta property="og:url"           content="909731212771520" />
    <meta property="fb:app_id"        content="{!! request()->fullUrl() !!}" />
    <meta property="og:title"         content="@if ( $meta->title) {{ $meta->title}} @else  টেকসইবিডি - Tekasaibd @endif" />
    <meta property="og:description"   content="@if ($meta->description) {{$meta->description}} @else {{$default_description}} @endif" />
    <meta property="og:image"         content="{{url($meta->image)}}" />
    <meta property="og:image:alt"     content="{{url('/front-end/images/Mujib_100_Logo.png')}}" />
    <meta property="og:site_name" content="টেকসইবিডি" />
    <meta property="og:type" content="article" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@nurroksar" />
    <meta name="twitter:creator" content="@nurroksar" />
    <meta name="twitter:url" content="{!! request()->fullUrl() !!}" />
    <meta name="twitter:title" content="@if ( $meta->title) {{ $meta->title}} @else  টেকসইবিডি @endif" />
    <meta name="twitter:description" content="@if ($meta->description) {{$meta->description}} @else {{$default_description}} @endif" />
    <meta name="twitter:image" content="{{url($meta->image)}}" />

    <!--canonical link-->
    <link rel="canonical" href="{!! request()->fullUrl() !!}">
    <link rel="amphtml" href="{!! request()->fullUrl() !!}">
