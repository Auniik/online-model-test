@extends('front.layout.master')
@section('content')

    <section id="about_bg">
        <div class="overlay">
            <div class="container-fulied">
                <div class="text_center animated zoomIn">
                    <h1>  লক্ষ্য ও উদ্দেশ্য </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="section about ">
        <div class="container">
            <div class="row align-items-center shadow-lg mission-vision">
                <div class="col-lg-6 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="section-title ml-lg-4">
                        <h4 class="title mb-4">মিশন</h4>
                        <p class="text-justify">{{$about->mission}}</p>
                    </div>
                </div><!--end col-->

                <div class="col-lg-6 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="section-title ml-lg-4">
                        <h4 class="title mb-4">ভিশন</h4>
                        <p class="text-justify">{{$about->vision}}</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- About End -->
    <section class="section about">
        <div class="container">
            <div class="row align-items-center shadow-lg  mission-vision">
                <div class="col-lg-12 col-md-12 mt-sm-0 pt-sm-0 mb-5">
                    <div class="section-title ml-lg-4">
                        <h4 class="title mb-4">গল্প</h4>
                        <p class="text-justify">{!! $about->short_description !!}</p>
                    </div>
                </div><!--end col-->
                <br><br>
                <div class="col-lg-12 col-md-12 mt-sm-0 pt-sm-0 mt-5">
                    <div class="section-title ml-4">
                        <h4 class="title mb-4">ভবিষ্যৎ পরিকল্পনা</h4>
                        <p class="text-justify">{!! $about->long_description !!}</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

    <section class="section about">
        <div class="container">
            <div class="row align-items-center shadow-lg  mission-vision">
                <div class="col-lg-12 col-md-12 mt-sm-0 pt-sm-0 mb-5">
                    <div class="section-title ml-lg-4">
                        <h4 class="title text-center mb-4"> লক্ষ্য ও উদ্দেশ্য</h4>
                        <p class="text-justify">
                            বাঙালি জাতির মুক্তির আলোকবর্তিকা বঙ্গবন্ধু শেখ মুজিবুর রহমান ছিলেন মানবিক গুনাবলীর উদার প্রকৃতির মানুষ। তিনি সার্বিক মুক্তির স্বপ্ন দেখতেন। ক্ষুধা-দারিদ্র মুক্ত স্বনির্ভর টেকসই সোনার বাংলা ছিলো তার স্বপ্নের’ই অংশ যা আমাদের জন্য অনুকরণীয়। বঙ্গবন্ধুর জন্ম শতবার্ষিকী উপলক্ষে তার আদর্শ ও চেতনার প্রতি বিনম্রচিত্ত্বে সম্মান রেখে tekasaibd.com টেকসই লক্ষ্যমাত্রা নির্ধারণ করে মুজিব বর্ষব্যাপী বিভিন্ন সামাজিক ও মানবিক সমস্যার স্থায়ী সমাধান কার্যক্রম হাতে নিয়েছে।
                        </p>

                        <p class="text-justify">
                            বেকার সমস্যা দূরীকরণ : ডিজিটাল বাংলাদেশের প্রযুক্তি সুবিধা কাজে লাগিয়ে tekasaibd.com একটা টেকসই মানের অনলাইন প্ল্যাটফর্ম তৈরিতে কাজ করছে। এতে বেকারত্ব দূরীকরণের মধ্যদিয়ে জাতির পিতার স্বপ্নের বাস্তবায়ণ দারিদ্র মুক্ত স্বনির্ভর সোনার বাংলা বিনির্মাণে টেকসই লক্ষ্যমাত্র অর্জনে ভূমিকা রাখবে।
                        </p>

                        <p class="text-justify">
                            মানবিক সহায়তা : বাঙালি জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমান ছিলেন অসহায় মানুষের অবলম্বন! তিনি দুঃখী মানুষের শক্তি, সাহস এবং অনুপ্রেরণা ছিলেন। তার মানবিক গুনাবলী অনুসরনে মুজিব বর্ষব্যাপী tekasaibd.com বিভিন্নভাবে মানবিক সহায়তা সেবা প্রদানের মাধ্যমে অসহায় মানুষের পাশে দাঁড়াতে চায়। যেমন- ক) অসহায়-গরীব অন্ধদের চিকিৎসা সেবা সহায়তা প্রদান। খ) অসহায়-গরীব প্রতিবন্ধীদের প্রয়োজনীয় সাহায্য সহায়তা প্রদান। গ) দুস্থ মানুষের টেকসই কর্মসংস্থান; ইত্যাদি...
                        </p>

                        <p class="text-justify">
                            সামাজিক মূল্যবোধ সৃষ্টি : মাদক একটি সামাজিক ব্যাধি। জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমান সদ্য স্বাধীন বাংলাদেশকে মাদকমুক্ত ঘোষনা করেছিলেন এবং তিনিই সর্বপ্রথম রাষ্ট্রীয়ভাবে আইন করে মাদকদ্রব্যসহ অন্যান্য অনৈতিক কার্যকলাপ নিষিদ্ধ করেছিলেন। তাঁর জীবদ্দশায় তাঁর বাসভবনে মাদকদ্রব্যের প্রবেশ নিষিদ্ধ ছিল। বঙ্গবন্ধু শেখ মুজিবুর রহমানের আদর্শ বাস্তবায়নে তার জন্ম শতবার্ষিকী উপলক্ষে মুজিব বর্ষব্যাপী সামাজিক অবক্ষয়ের অন্যতম প্রধান কারণ মাদক বিরোধী সামাজিক সচেতনতা বৃদ্ধির লক্ষে tekasaibd.com মাদক নিমূলে টেকসই লক্ষ্যমাত্র নিয়ে কাজ করবে। যার মধ্যে- </br>
                            • মাদক ব্যাবসায়ী এবং মাদকাসক্ত নাগরিকদের মাদকসেবনের ক্ষতিকারক প্রভাব সম্পর্কিত তথ্যসমূহ প্রচার করে জন-সচেতনতা বৃদ্ধির লক্ষে কাজ করবে। </br>
                            • বঙ্গবন্ধুর জন্ম শতবার্ষিকী উপলক্ষে মুজিব বর্ষব্যাপী দেশের তৃণমূল পর্যায় থেকে মাদকাসক্ত এবং মাদক ব্যাবসায়ীদের চিহ্নিতপূর্বক তালিকা করে তাদের স্বাস্থ্যসুরক্ষায় চিকিৎসা সেবা প্রদানে কাজ করবে। </br>
                            • মাদকসেবী এবং মাদক ব্যাবসায়ীদের স্বাভাবিক জীবনধারনের জন্য ভিন্ন ভিন্ন প্রফেশনাল ট্রেড কোর্স প্রশিক্ষণের মাধ্যমের কর্মদক্ষ জনশক্তি রূপে গড়েতুলে দক্ষতানুযায়ী চাকুরির ব্যাবস্থা করণে কাজ করবে। </br>
                        </p>
                        <p class="text-justify">
                            <strong> message </strong></br>
                            জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমানের অসমাপ্ত স্বপ্ন পূরণে আত্মনির্ভরশীল টেকসই সোনার বাংলা বিনির্মাণে আমাদের এই ক্ষুদ্র প্রচেষ্টা।
                        </p>
                        <p class="text-justify">
                            <strong>contact</strong></br>
                            01720-628169</br>
                            tekasai100@gmail.com</br>
                            108 awolad hossen market, airport road, tejgaon, Dhaka-1215.

                        </p>
                    </div>
                </div>
            </div><!--end row-->
        </div><!--end container-->
    </section>

@endsection
