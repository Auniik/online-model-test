@extends('front.master')
@section('body')
    <!-- Hero Start -->
    <section class="bg-home d-flex align-items-center" style="margin-top: 125px">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="mr-lg-5">
                        <img src="/images/user/login.png" class="img-fluid d-block mx-auto" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="login-page bg-white shadow rounded p-4">
                        <div class="text-center">
                            <h4 class="mb-4">Login</h4>
                        </div>
                        @include('front.partials.notifications')
                        <form class="login-form" method="post" action="{{route('user.login.post')}}">
                            @csrf
                            <input type="hidden" value="{{request()->redirect}}" name="redirect">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group position-relative">
                                        <label>Your Email <span class="text-danger">*</span></label>
                                        <i class="mdi mdi-account ml-3 icons"></i>
                                        <input type="email" class="form-control pl-5" placeholder="Email" name="email" required="">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group position-relative">
                                        <label>Password <span class="text-danger">*</span></label>
                                        <i class="mdi mdi-key ml-3 icons"></i>
                                        <input type="password" class="form-control pl-5" placeholder="Password" name="password" required="">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember me</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-0">
                                    <button class="btn btn-primary w-100" type="submit">Sign in</button>
                                </div>
                                <!--<div class="col-lg-12 mt-4 text-center">-->
                                <!--    <h6>Or Login With</h6>-->
                                <!--    <ul class="list-unstyled social-icon mb-0 mt-3">-->
                                <!--        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-facebook" title="Facebook"></i></a></li>-->
                                <!--        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-google-plus" title="Google"></i></a></li>-->
                                <!--        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-github-circle" title="Github"></i></a></li>-->
                                <!--    </ul>-->
                                <!--</div>-->
                                <div class="col-12 text-center">
                                    <p class="mb-0 mt-3"><small class="text-dark mr-2">Don't have an account ?</small> <a href="{{route('user.registration')}}" class="text-dark font-weight-bold">Sign Up</a></p>
                                </div>
                            </div>
                        </form>
                    </div><!---->
                </div> <!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <!-- Hero End -->

@endsection