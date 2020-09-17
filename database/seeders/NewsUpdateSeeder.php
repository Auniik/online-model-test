<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NewsUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\News::query()->truncate();
        \App\News::query()->insert([
            [
                'title' => 'মুজিব মানে মুক্তি পিতার সঙ্গে সন্তানের না লেখা প্রেম চুক্তি..'
            ],
            [
                'title' => 'বঙ্গবন্ধুর খুনিদের মধ্যে একজন আব্দুল মাজেদের ফাঁসি...'
            ],
            [
                'title' => 'কারাগারের রোজনামচা বই পাঠক প্রতিযোগি মনোনয়ন চলছে..'
            ],
            [
                'title' => '২০২০ সালের ১৭ মার্চ থেকে ২০২১ সাল পর্যন্ত বছরব্যাপী থাকবে নানা আয়োজন..'
            ],
            [
                'title' => 'ষষ্ঠ শ্রেণির শিক্ষার্থীদের জন্য অনলাইন পরীক্ষা শুরু হতে যাচ্ছে',
                'link' => 'http://tekasaibd.com/exams/2/start'
            ],
            [
                'title' => 'মুজিব বর্ষ উপলক্ষে অনলাইন কুইজে অংশ নিন'
            ],
            [
                'title' => 'আপনার সৃজনশীল কাজ জমা দিন',
                'link'=> 'http://tekasaibd.com/submit-work'
            ]
        ]);
    }
}
