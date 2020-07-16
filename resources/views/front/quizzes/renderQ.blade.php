<div class="col-12 text-center">
    <div class="form-group">
        <h5>#{{$count}} {{$question->title}}</h5>
        <input type="hidden" name="quiz_question_id" value="{{$question->id}}"/>
        <input type="hidden" name="quiz_assessment_id" value="{{$quiz_assessment_id}}"/>
    </div>
</div>
<div class="col-12">
    <div class="row">
        @foreach($options as $key => $option)

            @if ($key%2==0)
                <div class="col-lg-5 offset-lg-2">
                    <div class="custom-control custom-radio mb-3">
                        <input type="radio" id="customRadio{{$key}}"
                               name="quiz_option_id" required
                               class="custom-control-input"
                               value="{{$option->id}}"/>
                        <label class="custom-control-label" for="customRadio{{$key}}">{{$option->value}}</label>
                    </div>
                </div>
            @endif
            @if ($key%2!=0)
                <div class="col-lg-4">
                    <div class="custom-control custom-radio  mb-3">
                        <input type="radio" id="customRadio{{$key}}" name="quiz_option_id" required
                               class="custom-control-input"
                               value="{{$option->id}}"/>
                        <label class="custom-control-label" for="customRadio{{$key}}">{{$option->value}}</label>
                    </div>
                </div>
            @endif


        @endforeach
    </div>
</div>
