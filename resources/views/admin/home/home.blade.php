@extends('admin.master')
@section('body')
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{asset('/')}}admin/#">Tekasaibd</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- end page title end breadcrumb -->
       <div class="row">
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="col-3 align-self-center">
                                        <div class="round"><i class="mdi mdi-account-multiple-plus "></i></div>
                                    </div>
                                    <div class="col-9 align-self-center text-right">
                                        <div class="m-l-10">
                                            <h5 class="mt-0">
                                                {{$total_participants}}
                                            </h5>
                                            <p class="mb-0 text-muted">
                                                <a href="/participants">মোট পরীক্ষার্থী</a> <span class="badge
                                                bg-soft-success"><i class="mdi
                                                mdi-arrow-up"></i></span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress mt-3" style="height:3px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="col-3 align-self-center">
                                        <div class="round"><i class="mdi mdi-eye"></i></div>
                                    </div>
                                    <div class="col-9 text-right align-self-center">
                                        <div class="m-l-10">
                                            <h5 class="mt-0">
                                                {{$total_quizzes}}</h5>
                                            <p class="mb-0 text-muted"> মোট কুইজ</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress mt-3" style="height:3px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 48%;" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="search-type-arrow"></div>
                                <div class="d-flex flex-row">
                                    <div class="col-3 align-self-center">
                                        <div class="round"><i class="mdi mdi-cart"></i></div>
                                    </div>
                                    <div class="col-9 align-self-center text-right">
                                        <div class="m-l-10">
                                            <h5 class="mt-0">
                                                {{$total_exams}}</h5>
                                            <p class="mb-0 text-muted"> মোট অনলাইন পরীক্ষা</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress mt-3" style="height:3px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 61%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
                <div class="card">
                    <div class="card-header">
                        <h4 class="mt-0">Dynamic Report</h4>
                    </div>
                    <div class="card-body">

                        <p class="text-muted mb-4 font-14"></p>
                        <div id="morris-bar-stacked" class="morris-chart"></div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h3>@php
                                        $publications = DB::table('publications')->count('id');
                                    @endphp
                                    {{$publications}}</h3>
                                <h6 class="text-lightdark">Total Publications</h6><span class="text-muted"><small></small></span></div>
                            <div class="col-4 text-center">
                                <h5><i class="mdi mdi-airplane-takeoff mr-2 text-danger font-20"></i></h5>
                                <h6 class="text-lightdark"></h6><span class="text-muted"><small>2020 to 2021</small></span></div>
                        </div>
                    </div>
                    <!--end card-body-->

                    <!--end card-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <!--end row-->
    </div>
    <!-- container -->
</div>
@endsection
