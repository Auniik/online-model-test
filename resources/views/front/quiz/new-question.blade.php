<h4 class="mb-3 text-center">প্রশ্ন No <span id="questionNo"> {{count(session('quiz_question'))}} </span></h4>
<div class="row text-center">
    <div class="col-lg-12 col-md-12">
        <div class="form-group">
            <h5 class="event-questions" id="questionTitle">{{$question->title}}</h5>
            <input type="hidden" name="questionId"  value="{{$question->id}}" id="questionId"/>
        </div>
    </div>
</div>
<div class="col-lg-12 col-md-12">
    <div class="row" id="resultRow">
        <div class="col-lg-6 col-md-6">
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="quizAnswer" required class="custom-control-input" value="1"/>
                <label class="custom-control-label" for="customRadio1">{{$a[0]}}</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="quizAnswer" required class="custom-control-input" value="2">
                <label class="custom-control-label" for="customRadio2">{{$a[1]}}</label>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio3" name="quizAnswer" required class="custom-control-input" value="3"/>
                <label class="custom-control-label" for="customRadio3">{{$a[2]}}</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio4" name="quizAnswer" required class="custom-control-input" value="4"/>
                <label class="custom-control-label" for="customRadio4">{{$a[3]}}</label>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-2 col-md-2 mt-5" style="float:right;">
    <div class="form-group">
        <input type="button" id="nextQuestion" name="nextQuestion" class="searchbtn btn btn-primary w-100" value="Next"/>
    </div>
</div>