<?php


namespace App\Services;


use App\Bangabandhu;
use App\Blog;
use App\Book;
use App\Models\OnlineExam\Exam;
use App\Models\Quiz\Quiz;
use Illuminate\Support\Str;

class MetaGenerator
{

    public function build()
    {
        if (!request()->filled('ref')) {
            return $this->defaultMetas();
        }
        if (request('ref') == 'exam') {
            return $this->examMetas();
        }

        if (request('ref') == 'creativity') {
            return $this->creativityMetas();
        }

        if (request('ref') == 'quiz') {
            return $this->quizMetas();
        }

        if (request('ref') == 'blog') {
            return $this->blogMetas();
        }

        if (request('ref') == 'book') {
            return $this->bookMetas();
        }

        if (request('ref') == 'bb') {
            return $this->bangabandhuMetas();
        }

    }

    private function defaultMetas()
    {
        return (object)[
            'image' => '/front-end/images/Mujib_100_Logo.png',
            'description' => 'বঙ্গবন্ধুর জন্ম শতবার্ষিকী উপলক্ষে তার আদর্শ ও চেতনার প্রতি বিনম্রচিত্ত্বে সম্মান রেখে tekasaibd.com টেকসই লক্ষ্যমাত্রা নির্ধারণ করে মুজিব বর্ষব্যাপী বিভিন্ন সামাজিক ও মানবিক সমস্যার স্থায়ী সমাধান কার্যক্রম হাতে নিয়েছে।',
            'title' => 'টেকসইবিডি'
        ];
    }

    public function examMetas()
    {
        $image = '/front-end/images/default-exam.png';
        $description = '[দ্রষ্টব্য : ডানপাশের সংখ্যা প্রশ্নের পূর্ণমান জ্ঞাপক। প্রদত্ত অনুচ্ছেদ গুলো মনেযোগ দিয়ে পড় সংশ্লিষ্ট প্রশ্নোগুলোর যথাযথ উত্তর দাও]';
        $title = 'অনলাইন পরীক্ষা- ';
        if (request()->filled('id')) {
            $exam = Exam::query()->find(request('id'));
            if ($exam->image)
                $image = $exam->image;
            if ($exam->description) {
                $description = Str::limit(strip_tags($exam->description), 60, "(...)");
            }
            $title .= $exam->name;
        }

        return (object)[
            'image' => $image,
            'description' => $description,
            'title' => $title
        ];
    }
    public function creativityMetas()
    {
        return (object)[
            'image' => '/front-end/images/default-creativity.png' ,
            'description' => 'আপনার সৃজনশীলতা জমা দিন, সেরা হয়ে স্বীকৃতিসহ আকর্ষনীয় পুরষ্কার জিতুন',
            'title' => 'আপনার সৃজনশীল কাজ জমা দিন',
        ];
    }

    private function quizMetas()
    {
        $image = '/front-end/images/default-quiz.png';
        $description = 'অনলাইন কুইজ খেলুন';
        $title = 'অনলাইন কুইজ- ';

        $quiz = Quiz::query()
            ->whereHas('questions')
            ->where('is_default', 1)
            ->first();

        if ($quiz) {
            if ($quiz->image)
                $image = $quiz->image;
            if ($quiz->description) {
                $description = Str::limit(strip_tags($quiz->description), 60, "(...)");
            }
            $title .= $quiz->name;
        }
        return (object)[
            'image' => $image,
            'description' => $description,
            'title' => $title
        ];
    }

    private function blogMetas()
    {
        $image = '/front-end/images/default-blogs.png';
        $description = 'টেকসইবিডি বার্তা';
        $title = 'টেকসইবিডি বার্তা';
        if (request()->filled('id')) {
            $blog = Blog::query()->find(request('id'));
            if ($blog->image)
                $image = $blog->image;
            $description = $blog->shortTalks;
            $title = $blog->title;
        }

        return (object)[
            'image' => $image,
            'description' => $description,
            'title' => $title
        ];
    }

    private function bookMetas()
    {
        $image = '/front-end/images/default-book.png';
        $description = 'বই পড়ুন, সেরা পাঠক হয়ে স্বীকৃতিসহ আকর্ষনীয় পুরষ্কার জিতুন';
        $title = 'বই পড়ুন';
        if (request()->filled('id')) {
            $book = Book::query()->find(request('id'));
            if ($img = $book->img)
                $image = $img->image;
            $description = $book->shortDescription;
            $title = $book->title;
        }

        return (object)[
            'image' => $image,
            'description' => $description,
            'title' => $title
        ];
    }

    private function bangabandhuMetas()
    {
        $bb = Bangabandhu::query()->first();

        return (object)[
            'image' => '/front-end/images/Mujib_100_Logo.png',
            'description' => Str::limit(strip_tags($bb->description), 60, "(...)"),
            'title' => $bb->title
        ];
    }
}
