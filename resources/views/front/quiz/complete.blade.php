@extends('front.layout.master')
@section('content')
    <section id="about_bg" style="height: 138px;">
        <div class="overlay">
            <div class="container-fulied">
                <div class="text_center animated zoomIn">
                    <h1> Thank You! </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="section-two bg-light pt-4" id="question-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="alert alert-success">Thank you for your participation. Soon we will let you know the result</div>
                    <br>
                    Go back to <a href="{{url('/')}}" class="btn btn-lg btn-outline-success">HOME</a>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    setTimeout("location.href = '/';",5000);
</script>
