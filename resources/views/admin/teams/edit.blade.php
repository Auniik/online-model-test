@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mt-0">  টিম মেম্বার হালনাগাদ করুন</h4>
                    <a href="{{route('team-members.index')}}" style="height: 35px; " class="btn
                    btn-primary col-2"> টিম মেম্বারস দেখুন</a>
                </div>
                <div class="card-body">
                    <form action="{{route('team-members.update', $team_member)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> নাম</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$team_member->name}}" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Designation</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$team_member->designation}}" name="designation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> ছবি 600*600 </label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image" accept="image/*"><br>
                                @if (\Illuminate\Support\Facades\Storage::exists($team_member->image))
                                    <img src="{{asset($team_member->image)}}" width="150" height="150">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> শর্ট ম্যাসেজ</label>
                            <div class="col-sm-10">
                                <textarea name="short_message" class="form-control" id="editor" >{{$team_member->short_message}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> ম্যাসেজ</label>
                            <div class="col-sm-10">
                                <textarea name="message" class="form-control" id="editor" required>{{$team_member->message}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Facebook Link</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$team_member->facebook_link}}"
                                       name="facebook_link" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Twitter Link</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$team_member->twitter_link}}"
                                       name="twitter_link">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Instagram Link</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$team_member->instagram_link}}"
                                       name="instagram_link" >
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
@endsection
