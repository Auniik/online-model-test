<div class="top_part">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 top_content">
            <form action="">
                <label class="fast_content" for="male">প্রাথমিক স্কুল</label>
                <input type="radio" id="male" name="gender" value="male">
                <label for="female">মাধ্যমিক স্কুল</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="other">উচ্চ মাধ্যমিক স্কুল</label>
                <input type="radio" id="other" name="gender" value="other">
            </form>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 top_content">
            <h5>{{$assessment->exam->name}}</h5>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 top_content">
            <p>বিষয়ঃ {{$assessment->exam->subject->name}}</p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 top_content">
            <p>পরীক্ষার তারিখঃ {{$assessment->exam->start_at->format('d/m/Y')}}</p>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 top_content">
            <h4>পরীক্ষার নির্ধারিত সময়ঃ {{$assessment->exam->duration}} ঘন্টা</h4>
        </div>
    </div>
</div>
