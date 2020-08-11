<?php

use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Contract::query()->truncate();
        \App\Contract::query()->create([
            'title' => 'আপনার যে কোন পরামর্শ ও তথ্য জানতে আমাদের সাথে যোগাগোগ করুন ।',
            'description' => 'asdfas',
            'address' => '১০৮ আওলাদ হোসেন মার্কেট-২য় তলা, এয়ারপোর্ট রোড, তেজগাঁও ঢাকা-১২১৫',
            'phone' => '০১৭২০৬২৮১৬৯, ০১৯২৪০৮০৬৮৮',
            'email' => 'tekasai100@gmail.com',
            'image' => 'about-image/F6trM9oMOp9myNhRX1IjVJa6p6u.jpg'
        ]);
    }
}
