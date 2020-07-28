@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0">Add Player Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.player.add.post')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <h3>{{Session::get('message')}}</h3>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Event Name</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="event_id">
                                    @foreach($events as $event)
                                     <option value="{{$event->id}}">{{$event->title}}[Status:{{$event->status==1?'Active':'Inactive'}}]</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Player Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Password" name="password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Player Type</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="player_type" required>
                                    <option>Select</option>
                                    <option value="general">General</option>
                                    <option value="vip" selected>VIP</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" id="editor"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" checked value="1" />
                                        <span>Publish</span>
                                    </label>
                                </div>
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio"   value="0"/>
                                        <span>Unpublish</span>
                                    </label>
                                </div>
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
                <div class="card-header">
                    <h4 class="mt-0">Manage Player</h4>
                </div>
                <div class="card-body">

                    <p class="text-muted mb-4 font-14"></p>
                    <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Password</th>
                            <th>Player Type</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($players as $player)
                            <?php
                             $event = \App\Event::find($player->event_id);
                            ?>

                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{$event->title}}</td>
                                <td>{{$player->name}}</td>
                                <td>{{$player->phone}}</td>
                                <td>{{$player->password}}</td>
                                <td>{{$player->player_type}}</td>
                                <td>{!! $player->description !!}</td>
                                <td>{{ $player->status }}</td>
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
