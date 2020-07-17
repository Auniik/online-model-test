@extends('front.layout.master')
@section('content')
    <section class="main-slider">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12 px-0">
                    <img src="{{asset('/')}}front/images/coworking/cta.jpg" class="align-items-center rounded-0" style="height: 250px" width="100%px"alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="section-two bg-light pt-4" id="question-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    @include('front.partials.notifications')
                    <div class="alert alert-success">Thank you for your participation. Soon we will let you know the result</div>
                    <br>
                    <a href="{{route('welcome')}}" class="btn btn-lg btn-outline-success">Homepage</a>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    setTimeout("location.href = '/';",5000);
</script>
