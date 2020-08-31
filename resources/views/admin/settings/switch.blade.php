@extends('admin.master')
@push('style')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

@endpush
@section('body')
    <div class="row  m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-horizontal">
                        <div class="row">
                            <h4 class="col-7"><span id="header-title">  সেটিংস </span></h4>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                   <div class="row">
                       @foreach($switches as $switch)
                       <div class="col-lg-6 offset-lg-2">
                           <div class="form-check form-check-inline">
                               <input id="inlineCheckbox{{$switch->id}}"
                                      class="form-check-input"
                                      type="checkbox"
                                      data-toggle="toggle"
                                      data-style="mr-1"
                                      {{$switch->value ? 'checked' : ''}}
                                      data-id="{{$switch->id}}"
                               >
                               <label for="inlineCheckbox{{$switch->id}}" class="form-check-label">{{__('default.settings_' . $switch->key)}}</label>
                           </div>
                       </div>
                       @endforeach
                           <br>
                           <br>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <script>

        $(document).ready(function () {
            $('.form-check-input').change(function() {
                $.ajax({
                    url: `settings/${$(this).data('id')}`,
                    type: 'POST',
                    data: {
                        _token: "{{csrf_token()}}",
                        value: Number($(this).prop('checked'))
                    }
                }).done(function (data) {
                    console.log(data)
                    toastr.success(data.message)
                });
            })
        })


    </script>
@endpush
