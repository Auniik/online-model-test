<?php


namespace App\Http\Controllers\Website;


use App\Models\OnlineExam\ParticipantAssessmentAttachment as Attachment;
use Illuminate\Support\Facades\Storage;

class AnswerAttachmentController extends \App\Http\Controllers\Controller
{

    public function destroy(Attachment $attachment)
    {
        Storage::delete($attachment->path);
        $attachment->delete();
        return response([
            'status' => true,
            'message' => 'উত্তর টি কেটে ফেলা হয়েছে ।',
        ]);
    }
}
