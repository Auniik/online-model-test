@extends('admin.master')
@section('body')
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Manage Results</h4>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Select Result</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="result_id" onchange="getFilteredResult(this.value)">
                                <option value="">Select Event</option>
                                <option value="all">All Event</option>
                                @foreach($events as $event)
                                    <option value="{{$event->id}}" {{request()->event_id==$event->id?'selected':''}}>{{$event->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Event Name</th>
                            <th>Player</th>
                            <th>No of Question</th>
                            <th>Correct</th>
                            <th>Wrong</th>
                            <th>Point</th>
                            <th>Time taken</th>
                            <th>Quiz time</th>
                        </tr>
                        </thead>
                        <tbody id="resultSearchRes">
                        @foreach($result as $key => $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->event->title}}</td>
                                <td>{{$row->player->name}} <br>
                                    {{$row->player->phone}}</td>
                                <td>{{$row->total_question}}</td>
                                <td>{{$row->correct}}</td>
                                <td>{{$row->incorrect}}</td>
                                <td>{{$row->points}}</td>
                                <td>{{$row->total_time}}m</td>
                                <td>{{$row->updated_at}}</td>
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