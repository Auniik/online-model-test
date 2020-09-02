<div class="top_part">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <form action="">
                <label class="fast_content" for="male">প্রাথমিক স্কুল</label>
                <input type="radio" id="male" name="gender" value="male">
                <label for="female">মাধ্যমিক স্কুল</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="other" class="pt-0">উচ্চ মাধ্যমিক স্কুল</label>
                <input type="radio" id="other" name="gender" value="other">
            </form>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12  text-center">
            <h5><strong>{{$assessment->exam->name}}</strong></h5>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 text-center">
            <p  class="pb-0 my-0">বিষয়ঃ {{$assessment->exam->subject->name}}</p>
            <p  class="pt-0 pb-0 my-0">শ্রেণীঃ {{$assessment->exam->class}}</p>
            <p class="pt-0 my-0" >পূর্ণমানঃ {{$assessment->exam->totalRemarks()}}</p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 text-center">
            <p class="pb-0 my-0">পরীক্ষার তারিখঃ <b>{{$assessment->exam->start_at->format('d/m/Y')}}</b></p>
            <p class="pt-0 my-0">নির্ধারিত সময়ঃ <b>{{$assessment->exam->duration}}</b></p>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-between text-white times">
            <h5>
                <b>
                    শুরুর সময়:
                </b>
                <span class="time">
                @if ($assessment->start_at)
                    {{$assessment->start_at->format('h:i A')}}
                @else
                    {{now()->format('h:i A')}}</h5>
                @endif
                </span>


            </h5>
                <h5><span class="timer"></span></h5>
            <h5>
                <b>শেষ হবেঃ </b>
                <span class="time">{{$assessment->possibleEndTime()->format('h:i A')}}</span>
            </h5>
        </div>
    </div>
</div>
