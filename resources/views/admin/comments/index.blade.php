@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-horizontal">
                        <div class="row">
                            <h4 class="col-7"><span id="header-title">  ম্যাসেজ </span></h4>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="question-block">
                        <div class="table-responsive-sm">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th> নাম</th>
                                    <th> ইমেইল</th>
                                    <th> বার্তা</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($messages as $message)

                                    <tr>
                                        <td>{{$message->name}}</td>
                                        <td>{{$message->email}}</td>
                                        <td>
                                            <button class="btn btn-success view-comment"
                                                    data-comment="{{$message->comment}}">Show</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$messages->appends(request()->query())}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="CommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <h4>  বার্তা</h4>
                        </div>
                        <div class="card-body">
                            <div class="comment-block"> </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection

@push('script')


    <script>

        $(document).ready(function () {
            $('.view-comment').click(function () {
                const comment = $(this).data('comment');
                $('.comment-block').html(comment)
                $('#CommentModal').modal('show')
            })
        })

    </script>

@endpush
