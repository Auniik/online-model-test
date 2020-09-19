<input type="hidden" id="stage" @if($qd_check) value="qd" @else value="general" @endif>
<div id="wrapper" class="w-100" @if($qd_check) style="display:none" @endif data-qd="{{$qd_check}}">
    <div class="col-lg-12 text-center">
        <div class="row align-items-center">
            <div class="col-lg-10 offset-lg-1 px-0">
                @if($question->meta)
                    <img src="{{asset($question->meta)}}"
                         class="align-items-center rounded-0 shadow-sm"
                         width="100%"
                    >
                @endif
            </div>
        </div>
        <div class="form-group">
            <h5 class="my-4 text-left question-title-margin"><strong>{{$count}}. {{$question->title}}</strong></h5>
            <input type="hidden" name="quiz_question_id" value="{{$question->id}}"/>
            <input type="hidden" name="quiz_assessment_id" value="{{$quiz_assessment_id}}"/>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            @foreach($options as $key => $option)
                @if ($key % 2 == 0)
                    <div class="col-lg-5 offset-lg-1 option-wrapper"
                         @if ($qd_check) style="display:none" @endif
                    >
                        <div class="custom-control custom-radio mb-3">
                            <input type="radio" id="customRadio{{$key}}"
                                   name="quiz_option_id" required
                                   class="custom-control-input"
                                   value="{{$option->id}}"/>
                            <label class="custom-control-label pt-0 cursor-pointer"
                                   for="customRadio{{$key}}">{{$option->value}}</label>
                        </div>
                    </div>
                @endif
                @if ($key % 2 != 0)
                    <div class="col-lg-5 option-wrapper"
                         @if ($qd_check) style="display:none" @endif
                    >
                        <div class="custom-control custom-radio  mb-3">
                            <input type="radio" id="customRadio{{$key}}" name="quiz_option_id" required
                                   class="custom-control-input"
                                   value="{{$option->id}}"/>
                            <label class="custom-control-label pt-0 cursor-pointer"
                                   for="customRadio{{$key}}">{{$option->value}}</label>
                        </div>
                    </div>
                @endif
            @endforeach

            <br>
            <div class="col-lg-12 text-center buttons-wrapper">
                <hr>
                <div class="form-group">
                    <input type="button"
                           id="skipButton" class="btn btn-primary"
                           style="width: 130px;"
                           value="স্কিপ করুন"
                    />
                    <input type="button"
                           id="nextButton"
                           disabled
                           class="btn btn-primary"
                           style="width: 130px;
                           @if ($qd_check) display:none @endif"
                           value="উত্তর দিন"
                    />
                    <input type="button"
                           id="show-options-btn"
                           class="btn btn-primary"
                           style="width: 130px;
                           @if (!$qd_check) display:none @endif"
                           value="অপশন"
                    />

                </div>
            </div>
        </div>
    </div>
</div>

@if ($qd_check)
    <div class="discussion-wrapper @if (!$qd_check) d-none @endif">
        <div class="col-lg-12 text-center">
            <div class="row align-items-center">
                <div class="col-lg-10 offset-lg-1 px-0 ">
                    @if($qd->image)
                        <img src="{{asset($qd->image)}}" class="align-items-center rounded-0 shadow-sm"
                             width="100%"
                        >
                    @endif
                </div>
            </div>
            <div class="form-group">
                <h5 class="my-4 text-justify mx-lg-5"><strong> {{$qd->title}}</strong></h5>
                <input type="hidden" name="quiz_question_id" value="{{$question->id}}"/>
                <input type="hidden" name="quiz_assessment_id" value="{{$quiz_assessment_id}}"/>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 ">
                    {!! $qd->description !!}
                </div>

                <div class="col-lg-12 d-flex justify-content-center mt-4">
                    <button type="button" class="btn btn-primary px-3 go-on-btn"> আপনার কুইজ</button>
                </div>
            </div>
        </div>
    </div>

@endif
