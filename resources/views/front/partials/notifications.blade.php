

{{--@if(Session::has('warning'))--}}
{{--    <div class="alert alert-warning alert-dismissible fade show" role="alert">--}}
{{--        <strong>Warning!</strong> {{session('warning')}}--}}
{{--        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--            <span aria-hidden="true">&times;</span>--}}
{{--        </button>--}}
{{--    </div>--}}
{{--@endif--}}

{{--@if(Session::has('success'))--}}
{{--    <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--        <strong>{{__('default.success')}}!</strong> {{session('success')}}--}}
{{--        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--            <span aria-hidden="true">&times;</span>--}}
{{--        </button>--}}
{{--    </div>--}}
{{--@endif--}}

{{--@if(Session::has('danger'))--}}
{{--    <div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
{{--        <strong>Error!</strong> {{session('danger')}}--}}
{{--        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--            <span aria-hidden="true">&times;</span>--}}
{{--        </button>--}}
{{--    </div>--}}
{{--@endif--}}

{{--@if(Session::has('error'))--}}
{{--    <div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
{{--        <strong>Error!</strong> {{session('error')}}--}}
{{--        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--            <span aria-hidden="true">&times;</span>--}}
{{--        </button>--}}
{{--    </div>--}}
{{--@endif--}}

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
