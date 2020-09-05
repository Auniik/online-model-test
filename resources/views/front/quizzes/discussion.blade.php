<div class="col-12 text-center">
    <div class="row align-items-center">
        <div class="col-lg-10 offset-lg-1 px-0 ">
            @if($discussion->image)
                <img src="{{asset($discussion->image)}}" class="align-items-center rounded-0 shadow-sm"
                     width="100%"
                >
            @endif
        </div>
    </div>
    <div class="form-group">
        <h5 class="my-4 text-justify mx-lg-5"><strong>{{$discussion->title}}</strong></h5>
        <input type="hidden" name="quiz_question_id" value="{{$question_id}}"/>
        <input type="hidden" name="quiz_assessment_id" value="{{$quiz_assessment_id}}"/>
    </div>
</div>
<div class="col-12">
    <div class="row">
        <div class="col-lg-12">
            {!! $discussion->description !!}
        </div>
    </div>
</div>
