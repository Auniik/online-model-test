@extends('admin.master')

@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Submitted Works</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Work Type</th>
                            <th>URL Link</th>
                            <th>File</th>
                            <th>User</th>
                            <th>Contact</th>
                            <th>Submitted At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="eventSearchRes">
                        @foreach($works as $key => $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->title}}</td>
                                <td>{{$row->work_type}}</td>
                                <td><a href="{{$row->link}}" target="_blank">{{$row->link}}</a></td>
                                <td>
                                    <buttton data-files="{{$row->file}}"  class="btn btn-success btn-sm files-button">
                                        <i class="fa fa-eye"></i>
                                    </buttton>
                                </td>
                                <td>{{$row->user_name}}</td>
                                <td>{{$row->mobile_no}}</td>
                                <td>{{$row->updated_at->format('M d, Y h:i A')}}</td>
                                <td>
                                    <a href="{{route('delete-work',['id'=>$row->id])}}" class="btn btn-danger"
                                       onclick="return confirm('Are You ' + 'Delete This ')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                        {{$works->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

    <div class="modal fade" id="FilesMODAL" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="questions-block">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Submitted Files</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="written-">
                                <table class="table  table-bordered  table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Files</th>
                                    </tr>
                                    </thead>
                                    <tbody class="works-group">

                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')


    <script>
        const url = "{{url('/')}}";

        $(document).ready(function () {
            $('.files-button').on('click', function () {
                let files = $(this).data('files');
                if(typeof files == "string") {
                    $('.works-group').html(`
                        <tr class="works-row">
                            <td>
                                <a target="_blank" class="btn btn-link" href="${url}/${files}">${fileName(files)}</a>
                            </td>
                        </tr>
                    `)
                }

                if(typeof files == "object") {
                    $('.works-group').html(
                        files.map((file, i) => {
                            return `<tr class="works-row"><td>
                                <a target="_blank" class="btn btn-link" href="${url}/${file}">${++i}. ${fileName(file)
                            }</a>
                            </td></tr>`;
                        })

                    )
                }
                $('#FilesMODAL').modal('show')

            })
            function fileName(file) {
                return file.split('/').reverse()[0]
            }
        })
    </script>

@endpush
