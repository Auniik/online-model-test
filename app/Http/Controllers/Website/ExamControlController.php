<?php


namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class ExamControlController extends Controller
{

    public function index(Request $request)
    {

        $questions = session('questions');
        $questions = $this->paginate($questions,
            3,
            $request->get('page', 1),
            $request->url()
        );
        return view('front.online-exam.playground', [
            'started_at' => session('started_at'),
            'duration' => session('duration'),
            'questions' => $questions,
            'assessment' => session('assessment'),
        ]);
    }

    public function paginate($items, $perPage = 15, $page = null,
                             $baseUrl = null,
                             $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ?
            $items : Collection::make($items);

        $lap = new LengthAwarePaginator($items->forPage($page, $perPage),
            $items->count(),
            $perPage, $page, $options);

        if ($baseUrl) {
            $lap->setPath($baseUrl);
        }

        return $lap;
    }
}
