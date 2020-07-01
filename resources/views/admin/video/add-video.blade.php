@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('new-video')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h4 class="mt-0 header-title">Add Eevnt Data</h4>
                        <h3>{{Session::get('message')}}</h3>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-sm-2 col-form-label">Video URL</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="url" name="link" value="" id="example-url-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 offset-10">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Manage Event</h4>
                    <p class="text-muted mb-4 font-14"></p>
                    <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>link</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($youtubies as $youtubie)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$youtubie->link}}</td>
                                <td><a href="{{route('delete-video',['id'=>$youtubie->id])}}"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection