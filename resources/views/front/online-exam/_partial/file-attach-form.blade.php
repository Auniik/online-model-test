<form class="writtenFileForm margin_left mt-4"
      action="{{route('assessment-answer.store', [$assessment->id, $question->id])}}"
      method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="serial" value="{{$sl - 1}}">
    <label for="file-{{$question->id}}"> ফাইল  যুক্ত  করুন</label>
    <input class="form-control written-attachments"
           type="file" id="file-{{$question->id}}"
           name="attachments[]"
           multiple
    >
    <p class="mb-4"> আপনার উত্তর টি  খাতায় অথবা  কোন ডকুমেন্টে লিখে এখানে  আপলোড  করতে পারেন</p>
</form>
