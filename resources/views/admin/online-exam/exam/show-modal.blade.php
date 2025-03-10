<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <span class="float-right">{{$exam->in_homepage ? 'Showed' : 'Not Showed'}} in
                    homepage</span>
                <h4>Show Exam {{get_status($exam->status)}}</h4>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2"> পরীক্ষার নাম</label>
                    <div class="col-sm-10">
                        {{$exam->name}}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2  "> শ্রেণী</label>
                    <div class="col-sm-4">
                        {{$exam->class}}
                    </div>
                    <label for="example-text-input" class="col-sm-2  text-right">বিষয়</label>
                    <div class="col-sm-4">
                        {{$exam->subject->name}}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2"> পরীক্ষা শুরু হবে</label>
                    <div class="col-sm-4">
                        {{$exam->start_at->format('d/m/Y h:m A')}}
                    </div>
                    <label for="example-text-input" class="col-sm-2 text-right">Duration</label>
                    <div class="col-sm-4">
                        {{$exam->duration}}
                    </div>

                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2"> কভার  ছবি</label>
                    <div class="col-sm-2">
                        <img src="/{{$exam->image}}" class="img img-fluid" style="height: 70px"
                             alt="{{$exam->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2"> বিবরণ</label>
                    <div class="col-sm-10">
                        {!! $exam->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
