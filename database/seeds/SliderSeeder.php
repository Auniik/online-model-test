<?php

use App\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::query()->truncate();
        Slider::query()->create([
            'title' => 'Slide 1',
            'short_description' => '<p class="fadeInLeft animated" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms;">শিক্ষা তথ্য ও সৃজনশীল অনলাইন প্লাটফর্ম</p>
                <h2 class="inner-box wow fadeInRight animated" data-wow-delay="0ms" ata-wow-duration="1500ms" style="visibility: visible; animation-duration:
                                    1500ms; animation-delay: 0ms; animation-name: fadeInRight; font-family: shorif-shishir">টেকসই
                    <span>বাংলা</span>
                </h2>
                <p class="fadeInLeft animated p-2" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms;">সবকিছু একসাথে এখানেই</p>',
            'link_1' => 'https://tekasaibd.com/submit-work?ref=creativity',
            'link_1_text' => 'সৃজনশীলতা জমা দিন',
            'image' => 'default/slider_default.jpeg',
            'status' => 1
        ]);
    }
}
