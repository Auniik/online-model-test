<?php

use Illuminate\Database\Seeder;

class BangabandhuInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Bangabandhu::query()->truncate();
        \App\Bangabandhu::query()->create([
            'title' => 'জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমানের সংক্ষিপ্ত জীবনী',
            'description' => '১৯২০ সালে শেখ মুজিবুর রহমান ১৯২০ সালের ১৭ মার্চ, ফরিদপুর জেলার গোপালগঞ্জ মহকুমার (বর্তমানে জেলা) টুঙ্গিপাড়া গ্রামে জন্মগ্রহণ করেন। তাঁর বাবা শেখ লুৎফর রহমান এবং মা শেখ সায়েরা খাতুন। ৪ কন্যা এবং ২ পুত্রসন্তানের মধ্যে শেখ মুজিবুর রহমান ছিলেন তৃতীয়। মা-বাবা তাঁকে ‘খোকা’ বলে ডাকতেন। ১৯২৭ সালে সাত বছর বয়সে শেখ মুজিবুর রহমান গিমাডাঙ্গা প্রাথমিক বিদ্যালয়ে ভর্তির মাধ্যমে তাঁর স্কুল জীবন আরম্ভ করেন। নয় বছর বয়সে তিনি গোপালগঞ্জ পাবলিক স্কুলে তৃতীয় শ্রেণিতে ভর্তি হন। পরবর্তীকালে তিনি গোপালগঞ্জ মিশনারি স্কুলে ভর্তি হন। ছাত্র আন্দোলন এবং রাজনীতিতে পুরোপুরি সক্রিয় হয়ে ওঠার আগে অন্য আরো দশজন কিশোরের মত শেখ মুজিবুর রহমান খেলার মাঠকেই বেশি ভালোবাসতেন। ফুটবল খেলার প্রতি ছিল তাঁর দুরন্ত টান। একজন মেধাবী ফুটবলার হিসেবে কৈশোরে কুড়িয়েছিলেন অসামান্য খ্যাতি।

প্রতিযোগিতামূলক ফুটবল খেলাগুলোতে কৃতিত্বের স্বীকৃতিস্বরূপ শেখ মুজিবুর রহমান নিয়মিত পুরস্কৃত হতেন। ১৯৩৮ সালে শেখ মুজিবুর রহমান ১৮ বছর বয়সে শেখ ফজিলাতুন্নেসা (রেনু)-কে বিয়ে করেন। তাঁরা দুই কন্যা শেখ হাসিনা, শেখ রেহানা এবং তিন পুত্র শেখ কামাল, শেখ জামাল ও শেখ রাসেল এর জনক-জননী ছিলেন। ১৯৪২ সালে শেখ মুজিবুর রহমান গোপালগঞ্জ মিশন স্কুল থেকে ম্যাট্রিকুলেশন পরীক্ষায় উত্তীর্ণ হন। একই বছরে তিনি কলকাতা ইসলামিয়া কলেজে (বর্তমানে মৌলানা আজাদ কলেজ) ভর্তি হন। ১৯৪৭ সালে এই কলেজ থেকেই তিনি স্নাতক সম্পন্ন করেন। ১৯৪৩ সালে শেখ মুজিবুর রহমান বঙ্গীয় প্রাদেশিক মুসলিম লীগের (অল ইন্ডিয়া মুসলিম লীগের শাখা) কাউন্সিলর নির্বাচিত হন। ১৯৪৭ সালে ভারত বিভাজন পর্যন্ত তিনি তাঁর দায়িত্ব প্রশংসার সাথে পালন করে যান। ১৯৪৬ সালে শেখ মুজিবুর রহমান বিনা প্রতিদ্বন্দ্বিতায় কলকাতা ইসলামিয়া কলেজ ছাত্র ইউনিয়নের সাধারণ সম্পাদক নির্বাচিত হন। ১৯৪৬ সালের ১৬ আগস্ট কুখ্যাত ক্যালকাটা কিলিং (সাম্প্রদায়িক দাঙ্গা) শুরু হলে শেখ মুজিবুর রহমান সাম্প্রদায়িক সম্প্রীতি এবং শান্তি বজায় রাখার কাজে ঝাঁপিয়ে পড়েন, নিজের জীবন বাজি রেখে হিন্দু এবং মুসলমান উভয় সম্প্রদায়ের নিরীহ মানুষদের জীবন রক্ষা করেন। ১৯৪৭ সালে শান্তি মিশন চলাকালীন সময়ে শেখ মুজিবুর রহমান মহাত্মা গান্ধীর সাথে সাক্ষাৎ করেন। ভারত এবং পাকিস্তানের পাশাপাশি তৃতীয় রাষ্ট্র হিসেবে স্বতন্ত্র, স্বাধীন বাংলা প্রতিষ্ঠার জন্য শেখ মুজিবুর রহমান হোসেন শহীদ সোহরাওয়ার্দীর সাথে আন্দোলনে যোগ দেন। যদিও এই উদ্যোগ বাতিল হয় কিন্তু পরবর্তীতে এটিই একজন জাতির পিতার স্বপ্নের রাষ্ট্র গড়ার ভিত্তি হয়ে ওঠে। ১৯৪৮ সালে শেখ মুজিবুর রহমান ঢাকা বিশ্ববিদ্যালয়ের আইন বিভাগে ভর্তি হন এবং ৪ জানুয়ারি পাকিস্তানের প্রথম বিরোধীদলীয় ছাত্র সংগঠন পূর্ব পাকিস্তান মুসলিম ছাত্রলীগ প্রতিষ্ঠা করেন।

২৩ ফেব্রুয়ারি পাকিস্তানের প্রধানমন্ত্রী খাজা নাজিমুদ্দিন পাকিস্তানের গণপরিষদে দাঁড়িয়ে ঘোষণা করেন, “পূর্ব পাকিস্তানের জনগণকে অবশ্যই রাষ্ট্রভাষা হিসেবে উর্দুকে মেনে নিতে হবে।” শেখ মুজিবুর রহমান এই ঘোষণার বিরুদ্ধে তাৎক্ষণিকভাবে প্রতিবাদ জানান। উর্দুকে পাকিস্তানের একমাত্র রাষ্ট্রভাষা করার জন্য মুসলিম লীগের চক্রান্তের বিরুদ্ধে শেখ মুজিবুর রহমান আন্দোলনের প্রস্তুতি গ্রহণের জন্য কর্মতৎপরতা শুরু করেন। ২ মার্চ ফজলুল হক মুসলিম হলে অনুষ্ঠিত এক সভায় শেখ মুজিবুর রহমানের প্রস্তাবে ‘সর্বদলীয় রাষ্ট্রভাষা সংগ্রাম পরিষদ’ গঠিত হয়। ১১ মার্চ রাষ্ট্রভাষা বাংলার দাবিতে ধর্মঘট পালনকালে সচিবালয়ের সামনে বিক্ষোভরত অবস্থায় শেখ মুজিবুর রহমান কয়েকজন সহকর্মীসহ গ্রেফতার হন। শেখ মুজিবের গ্রেফতারের প্রতিবাদে ছাত্র সমাজ বিক্ষোভে ফেটে পড়ে। বিক্ষুব্ধ ছাত্র সমাজের অব্যাহত আন্দোলনের মুখে ১৫ মার্চ মুসলিম লীগ সরকার শেখ মুজিবুর রহমান এবং অন্যান্য ছাত্রনেতাদের মুক্তি দিতে বাধ্য হয়। ১৯৪৯ সালে শেখ মুজিবুর রহমান ঢাকা বিশ্ববিদ্যালয়ের চতুর্থ শ্রেণির কর্মচারীদের চাকরির নিরাপত্তা বিধান এবং অধিকার আদায় আন্দোলন সমর্থন জানান।

১৯ এপ্রিল চতুর্থ শ্রেণির কর্মচারীদের পক্ষে মিছিল বের করার প্রস্তুতিকালে কয়েকজন শিক্ষার্থীসহ শেখ মুজিবুর রহমানকে উপাচার্যের বাসভবন থেকে গ্রেফতার করা হয়। ২৩ জুন পূর্ব পাকিস্তান আওয়ামী মুসলিম লীগ (বর্তমান আওয়ামী লীগ) প্রতিষ্ঠিত হয় এবং কারাগারের বন্দী থাকা অবস্থাতেই শেখ মুজিবুর রহমান যুগ্ম সম্পাদক নির্বাচিত হন। ১৯৫২ সালের, ২৬ জানুয়ারি পাকিস্তানের তৎকালীন প্রধানমন্ত্রী খাজা নাজিমুদ্দিন ঘোষণা দেন, “একমাত্র উর্দুই হবে পাকিস্তানের রাষ্ট্রভাষা।’’ জেলে বন্দী অবস্থাতেই শেখ মুজিবুর রহমান রাষ্ট্রভাষা আন্দোলনে সক্রিয়ভাবে নিজেকে জড়িত রেখেছিলেন এবং আন্দোলনকে সফল করার জন্য জেল থেকেই পাঠাতেন গুরুত্বপূর্ণ নির্দেশনা। ১৬ ফেব্রুয়ারি থেকে শেখ মুজিবুর রহমান জেলের ভেতরেই টানা ১১ দিন ধরে আমরণ অনশন চালিয়ে যান এবং ২৭ ফেব্রুয়ারি তিনি মুক্তি পান। ২১ ফেব্রুয়ারি বাংলাকে রাষ্ট্রভাষা করার দাবিতে ছাত্র সংগ্রাম পরিষদ ধর্মঘট আহ্‌বান করে। আন্দোলনরত ছাত্র জনতা ১৪৪ ধারা ভেঙে মিছিল নিয়ে অগ্রসর হলে পুলিশ নির্বিচারে গুলি চালায়। পুলিশের গুলিতে শহীদ হন রফিক,সালাম, বরকত, জব্বার, শফিউর সহ আরো অনেকেই। জেল থেকে পাঠানো এক বিবৃতিতে শেখ মুজিবুর রহমান শহীদদের প্রতি গভীর শোক ও শ্রদ্ধা জানান। একই বছর শেখ মুজিবুর রহমান শান্তি সম্মেলন উপলক্ষে চীন সফর করেন। শান্তি সম্মেলনে শেখ মুজিবুর রহমান বাংলায় বক্তৃতা দেন, ভাষা আন্দোলনকে নিয়ে যান বৈশ্বিক অঙ্গনে।

১৯৫৩ সালে শেখ মুজিবুর রহমান আওয়ামী মুসলিম লীগের সাধারণ সম্পাদক নির্বাচিত হন এবং একজন বাঙালি নেতা হিসেবে তাঁর উত্থান হয়। ১৯৫৪ সালের, ১০ মার্চ পূর্ব পাকিস্তানের প্রথম সাধারণ নির্বাচন অনুষ্ঠিত হয়। যুক্তফ্রন্ট ২৩৭ টি আসনের মধ্যে ২২৩ টি আসনে জয়লাভ করে। আওয়ামী লীগ একাই ১৪৩ টি আসনে জয়ী হয়। শেখ মুজিবুর রহমান গোপালগঞ্জ আসন থেকে নির্বাচিত হন এবং ১৫ মে নতুন প্রাদেশিক সরকারের বন ও কৃষি মন্ত্রী হিসেবে শপথ গ্রহণ করেন। ২৯ মে ভারত স্বাধীনতা আইন- ১৯৪৭, প্রয়োগ করে কেন্দ্রীয় পাকিস্তান সরকার হঠাৎ করে যুক্তফ্রন্টের মন্ত্রিসভা ভেঙে দেয়। ৩০ মে শেখ মুজিবুর রহমান করাচি থেকে ঢাকায় পদার্পণ করা মাত্রই গ্রেফতার হন। ২৩ ডিসেম্বর তাঁকে মুক্তি দেয়া হয়। ১৯৫৫ সালে সাধারণ সম্পাদক শেখ মুজিবুর রহমানের নেতৃত্বে সব ধর্মের মানুষের অন্তর্ভুক্তি এবং অংশগ্রহণ নিশ্চিত করার উদ্দেশ্যে দলের নাম থেকে ‘মুসলিম’ শব্দটি প্রত্যাহার করে নাম রাখা হয় \'আওয়ামী লীগ\'। ১৯৫৫ সালের ২১-২৩ অক্টোবর আওয়ামী লীগের কাউন্সিল অধিবেশনে এই সিদ্ধান্ত গৃহীত হয়। ৬ সেপ্টেম্বর শেখ মুজিবুর রহমান পুনরায় আওয়ামী লীগের সাধারণ সম্পাদক নির্বাচিত হন। ১৯৫৬ সালে খান আতাউর রহমানের নেতৃত্বে প্রাদেশিক সরকারে শেখ মুজিবুর রহমান মন্ত্রী হিসেবে যোগ দেন। মাত্র নয় মাস তিনি মন্ত্রী পদের দায়িত্বে ছিলেন। আওয়ামী লীগের সাধারণ সম্পাদক হিসেবে বাঙালির অধিকার আদায় আন্দোলনকে বেগবান করা এবং সংগঠনকে আরো সুসংহত করার উদ্দেশ্যে ১৯৫৭ সালের ৩০ মে শেখ মুজিবুর রহমান স্বেচ্ছায় মন্ত্রীসভা থেকে পদত্যাগ করেন। ১৯৫৭ সালের, ১৯৫৭ সালের ১৩-১৪ জুন আওয়ামী লীগের কাউন্সিলে শেখ মুজিবুর রহমান পুনরায় আওয়ামী লীগের সাধারণ সম্পাদক নির্বাচিত হন। ২৪ জুন থেকে জুলাই ১৩ পর্যন্ত শেখ মুজিবুর রহমান সরকারি সফরে চীনে যান।

১৯৫৮ সালের, ৭ অক্টোবর পাকিস্তানের প্রেসিডেন্ট মেজর জেনারেল ইস্কান্দার মির্জা ও সেনাবাহিনী প্রধান জেনারেল আইয়ুব খান সামরিক শাসন জারি করেন এবং সমস্ত রাজনৈতিক কর্মকান্ড নিষিদ্ধ করেন। ১১ অক্টোবর শেখ মুজিবুর রহমানকে গ্রেফতার করা হয়। একের পর এক মিথ্যা মামলা দিয়ে তাঁকে হয়রানি করা হয়। ১৪ মাস পরে শেখ মুজিবুর রহমানকে মুক্তি দিয়ে পুনরায় জেলগেটেই গ্রেফতার করা হয়। ১৯৬১ সালে হাইকোর্ট কর্তৃক আটকাদেশ অবৈধ ঘোষণা করার পর শেখ মুজিবুর রহমান কারাগার থেকে মুক্তি লাভ করেন। এ সময়ই শেখ মুজিবুর রহমান বাংলাদেশের স্বাধীনতা সংগ্রামের লক্ষ্যে কাজ করার জন্য উদ্যমী ছাত্র নেতৃবৃন্দদের নিয়ে ‘স্বাধীন বাংলা বিপ্লবী পরিষদ’ নামে একটি গোপন সংগঠন প্রতিষ্ঠা করেন। ১৯৬২ সালে আইয়ুব সরকার ৬ ফেব্রুয়ারি শেখ মুজিবুর রহমানকে পুনরায় গ্রেফতার করে। ২ জুন চার বছরের সামরিক শাসনের অবসান ঘটলে ১৮ জুন শেখ মুজিবুর রহমান মুক্তি লাভ করেন। ২৪ সেপ্টেম্বর শেখ মুজিবুর রহমান লাহোর যান এবং শহীদ সোহরাওয়ার্দীর নেতৃত্বে অন্যান্য বিরোধীদলকে সাথে নিয়ে জাতীয় গণতান্ত্রিক ফ্রন্ট গঠন করেন। ১৯৬৪ সালের, ২৫ জানুয়ারি জেলা কমিটির সভাপতি ও সাধারণ সম্পাদকদের উপস্থিতিতে শেখ মুজিবুর রহমানের ধানমন্ডির ৩২ নং বাসভবনে অনুষ্ঠিত এক বিশেষ সভায় আওয়ামী লীগকে পুনরুজ্জীবিত করা হয়। এই অধিবেশনে জাতীয় গণতান্ত্রিক ফ্রন্ট থেকে আলাদা হয়ে আওয়ামী লীগ স্বতন্ত্র দল হিসেবে আবির্ভূত হয়।

৬-৮ মার্চ কাউন্সিল মিটিং-এ দেশের প্রাপ্তবয়স্ক নাগরিকের ভোটের মাধ্যমে সংসদীয় ব্যবস্থা প্রবর্তনের দাবি সম্বলিত প্রস্তাব গৃহীত হয়। সভায় মওলানা আবদুর রশিদ তর্কবাগীশ ও শেখ মুজিবুর রহমান যথাক্রমে দলের সভাপতি ও সাধারণ সম্পাদক নির্বাচিত হন। ১১ মার্চ শেখ মুজিবুর রহমানের নেতৃত্বে সাম্প্রদায়িক দাঙ্গার বিরুদ্ধে দাঙ্গা প্রতিরোধ কমিটি গঠিত হয়। দাঙ্গার পর শেখ মুজিবুর রহমান তৎকালীন সেনাশাসক আইয়ুব খান বিরোধী ঐক্যবদ্ধ আন্দোলনের প্রস্তুতি গ্রহণ করেন। শেখ মুজিবুর রহমানের নেতৃত্বে সম্মিলিত বিরোধী দল বা কম্বাইন্ড অপজিশন পার্টি গঠিত হয়। রাষ্ট্রপতি নির্বাচনের ১৪ দিন পূর্বে শেখ মুজিবুর রহমানকে গ্রেফতার করা হয়। ১৯৬৫ সালে শেখ মুজিবুর রহমানের বিরুদ্ধে রাষ্ট্রদোহিতা এবং \'তথাকথিত\' আপত্তিকর বক্তব্য প্রদানের অভিযোগে মামলা দায়ের করা হয়। তাঁকে এক বছরের কারাদণ্ড দেয়া হয়। পরবর্তীতে হাইকোর্টের নির্দেশে ঢাকা কেন্দ্রীয় কারাগার থেকে তিনি মুক্তিলাভ করেন। ১৯৬৬ সালে শেখ মুজিবুর রহমান ৫ ফেব্রুয়ারি লাহোরে বিরোধী দলগুলোর জাতীয় সম্মেলনে ঐতিহাসিক ছয় দফা দাবি উত্থাপন করেন। প্রস্তাবিত ছয় দফা ছিল বাঙালি জাতির মুক্তির সনদ। এই ছয় দফা মুক্তিকামী বাঙালি জাতির জন্য অর্থনৈতিক ও সামাজিক মুক্তির বীজ বুনে দেয়, পাকিস্তানি ঔপনিবেশিক শাসনের গোড়ায় আঘাত করে। ১ মার্চ শেখ মুজিবুর রহমান আওয়ামী লীগের সভাপতি নির্বাচিত হন। ছয় দফার পক্ষে জনমত সৃষ্টির লক্ষ্যে তিনি সারা বাংলায় গণসংযোগ সফর শুরু করেন। এ সময় তাঁকে আটবার গ্রেফতার করা হয় এবং সর্বশেষ ৮ মে গ্রেফতার করে কারাগারে প্রেরণ করা হয়। প্রায় তিন বছর শেখ মুজিবুর রহমান কারারুদ্ধ ছিলেন।

১৯৬৮ সালের, ৩ জানুয়ারি আইয়ুব সরকার মোট ৩৫ জন বাঙালির (রাজনীতিবিদ, সেনাবাহিনী, নৌবাহিনী, বিমান বাহিনী, সরকারি অফিসার) বিরুদ্ধে রাষ্ট্রদোহিতার অভিযোগ এনে আগরতলা ষড়যন্ত্র মামলা দায়ের করে। জেলে বন্দী থাকা অবস্থাতেই ১৮ জানুয়ারি তাঁর উপর পুনরায় গ্রেফতার আদেশ জারি করা হয়। ভারতের সহায়তায় পাকিস্তান বিচ্ছিন্ন করার অভিযোগে শেখ মুজিবুর রহমানকে ১ নম্বর আসামি করে মোট ৩৫ জনের বিরুদ্ধে ‘রাষ্ট্র বনাম শেখ মুজিব ও অন্যান্য’ মামলা দায়ের করা হয়। শেখ মুজিবুর রহমানসহ আগরতলা ষড়যন্ত্র মামলার অভিযুক্তদের মুক্তির দাবিতে সারা দেশে গণবিক্ষোভ শুরু হয়। ১৯ জুন ঢাকা সেনানিবাসে কঠোর নিরাপত্তার মধ্যে আগরতলা ষড়যন্ত্র মামলার বিচারকাজ শুরু হয়। ১৯৬৯ সালের, আগরতলা ষড়যন্ত্র মামলা প্রত্যাহার এবং শেখ মুজিবুর রহমানের মুক্তির দাবিতে দেশব্যাপী ছাত্র গণআন্দোলন শুরু হয়। টানা গণআন্দোলনের মুখে আইয়ুব সরকার ২২ ফেব্রুয়ারি শেখ মুজিবুর রহমানসহ আগরতলা ষড়যন্ত্র মামলার সকল বন্দীকে মুক্তি দিতে বাধ্য হয়। ২৩ শে ফেব্রুয়ারি রেসকোর্স ময়দানে (বর্তমানে সোহরাওয়ার্দী উদ্যান) এক বিশাল ছাত্র সমাবেশে লাখো শিক্ষার্থীর উপস্থিতিতে কেন্দ্রীয় ছাত্র সংগ্রাম পরিষদ শেখ মুজিবুর রহমানকে ‘বঙ্গবন্ধু’ উপাধিতে ভূষিত করে। ৫ ডিসেম্বর সোহরাওয়ার্দীর মৃত্যুবার্ষিকী উপলক্ষে আয়োজিত আওয়ামী লীগের এক জনসভায় শেখ মুজিবুর রহমান পূর্ব পাকিস্তানের নাম রাখেন ‘বাংলাদেশ’। ১৯৭০ সালের, বঙ্গবন্ধু শেখ মুজিবুর রহমান ছয় দফার আলোকে আওয়ামী লীগকে ভোট দিয়ে জয়যুক্ত করার জন্য দেশবাসীর প্রতি উদাত্ত আহ্বান জানান। আওয়ামী লীগের জন্য তিনি নৌকা প্রতীক বেছে নেন। ১২ নভেম্বর এক প্রলয়ংকরী ঘুর্ণিঝড়ে উপকূল এলাকায় লাখো মানুষের প্রাণহানি ঘটে। বঙ্গবন্ধু নির্বাচনী প্রচারণা স্থগিত রেখে ঘূর্ণিঝড় বিধ্বস্ত অঞ্চলে ছুটে যান। ৭ ডিসেম্বর সাধারণ নির্বাচনে আওয়ামী লীগ নিরঙ্কুশ সংখ্যাগরিষ্ঠতা পেয়ে জয়ী হয়। জাতীয় পরিষদের পূর্ব পাকিস্তান অংশে ১৬৯ টি আসনের মধ্যে ১৬৭ টি আসনে এবং প্রাদেশিক পরিষদের ৩১০টি আসনের মধ্যে ২৯৮ টি আসনে (সংরক্ষিত ১০ টি নারী আসনসহ) আওয়ামী লীগ জয়লাভ করে। ১৯৭১ সালের, ১ মার্চ প্রেসিডেন্ট ইয়াহিয়া খান জাতীয় পরিষদের অধিবেশন শুরুর মাত্র দুই দিন আগে অনির্দিষ্টকালের জন্য এই অধিবেশন স্থগিত ঘোষণা করেন। এই ঘোষণার ফলে সর্বস্তরের বাঙালি জনতা রাস্তায় নেমে এসে বিক্ষোভে ফেটে পড়ে। বাঙালি জাতির স্বাধীনতার আকাঙ্ক্ষা নতুন মোড় নেয়। ১ মার্চ থেকে বঙ্গবন্ধু কার্যত ছিলেন বাংলাদেশ রাষ্ট্রের প্রধান। একদিকে রাষ্ট্রপতি জেনারেল ইয়াহিয়ার নির্দেশ যেত, অপর দিকে ধানমন্ডির ৩২ নম্বর বাড়ি থেকে যেত বঙ্গবন্ধু শেখ মুজিবুর রহমানের নির্দেশ। বাংলার মানুষ মেনে চলতেন বঙ্গবন্ধুর নির্দেশ।

৭ মার্চ রেসকোর্স ময়দানের (বর্তমানে সোহরাওয়ার্দী উদ্যান) জনসমুদ্র থেকে বঙ্গবন্ধু শেখ মুজিবুর রহমান বজ্রকন্ঠে ঘোষণা করেন ‘এবারের সংগ্রাম আমাদের মুক্তির সংগ্রাম, এবারের সংগ্রাম স্বাধীনতার সংগ্রাম’। এই ঐতিহাসিক ভাষণের মাধ্যমে বঙ্গবন্ধু শেখ মুজিবুর রহমান দেশবাসীকে স্বাধীনতা সংগ্রামের জন্য সর্বাত্মক প্রস্তুতি গ্রহণের আহবান জানান। এইরকম উত্তেজনাপূর্ণ পরিস্থিতিতে পাকিস্তানের প্রেসিডেন্ট জেনারেল ইয়াহিয়া খান ঢাকায় আসেন এবং ক্ষমতা হস্তান্তরের প্রশ্নে ১৬ -২৪ মার্চ পর্যন্ত দফায় দফায় এই আলোচনা চলতে থাকে কিন্তু কোন ফলপ্রসূ সমাধান আসেনি। ২৫ মার্চ দিবাগত রাতে নিরীহ নিরস্ত্র বাঙালির উপর পাক হানাদার বাহিনী শতাব্দীর অন্যতম ঘৃণ্য গণহত্যা চালায়। ২৬ মার্চের প্রথম প্রহরে বঙ্গবন্ধু শেখ মুজিবুর রহমান বাংলাদেশের স্বাধীনতা ঘোষণা করেন। স্বাধীনতা ঘোষণার পরপর পাকিস্তানি সামরিক জান্তা বঙ্গবন্ধুকে গ্রেফতার করে এবং তাঁকে পাকিস্তানে নিয়ে যাওয়া হয়। ১০ এপ্রিল গণপ্রজাতন্ত্রী বাংলাদেশের প্রথম সরকার গঠিত হয় এবং গণপরিষদ কর্তৃক বঙ্গবন্ধু শেখ মুজিবুর রহমানকে রাষ্ট্রপতি নির্বাচিত করা হয়। বঙ্গবন্ধু শেখ মুজিবুর রহমানের অনুপস্থিতিতে, সৈয়দ নজরুল ইসলাম অস্থায়ী রাষ্ট্রপতি এবং তাজউদ্দীন আহমদ প্রধানমন্ত্রী নির্বাচিত হন। ১৭ এপ্রিল মেহেরপুরের বৈদ্যনাথতলার আম্রকাননে (বর্তমানে মুজিবনগর) বাংলাদেশ সরকারের শপথ গ্রহণ অনুষ্ঠিত হয়। নয় মাসের রক্তক্ষয়ী সংগ্রাম শেষে, পাকিস্তানি দখলদার বাহিনীর আত্মসমর্পণের মাধ্যমে ১৯৭১ সালের ১৬ ডিসেম্বর বাংলাদেশ স্বাধীনতা লাভ করে।

আগস্ট এবং সেপ্টেম্বরের মধ্যবর্তী সময়ের মধ্যে পাকিস্তান জেলে বঙ্গবন্ধু শেখ মুজিবুর রহমানের গোপন বিচার করে মৃত্যুদণ্ড ঘোষণা করা হয়। এর প্রতিক্রিয়ায় বিভিন্ন দেশ ও বিশ্বের মুক্তিকামী জনতা বঙ্গবন্ধু শেখ মুজিবুর রহমানের নিরাপত্তা দাবি করেন। ২৭ ডিসেম্বর বাংলাদেশ সরকারের পক্ষ থেকে অবিলম্বে বঙ্গবন্ধু শেখ মুজিবুর রহমানের নিঃশর্ত মুক্তি দাবি করা হয়| ১৯৭২ সালের, সালে পাকিস্তানের কারাগার থেকে মুক্ত হয়ে সদ্য স্বাধীন বাংলায় পদার্পন করেন- ১৯৭৩ সালের, নব প্রণীত সংবিধানের আলোকে, ৭ মার্চ স্বাধীন বাংলাদেশের প্রথম সাধারণ নির্বাচনে বঙ্গবন্ধু শেখ মুজিবুর রহমানের নেতৃত্বে আওয়ামী লীগ ৩০০ টি আসনের মধ্যে ২৯৩ টি আসনে জয়ী হয়ে সরকার গঠন করেন। ২৩ মে বিশ্ব শান্তিতে অবদানের স্বীকৃতিস্বরূপ বিশ্ব শান্তি পরিষদ বঙ্গবন্ধু শেখ মুজিবুর রহমানকে “জুলিও কুরি” পুরস্কারে ভূষিত করে। ৬ সেপ্টেম্বর বঙ্গবন্ধু শেখ মুজিবুর রহমান জোট নিরপেক্ষ সম্মেলনে যোগ দিতে আলজেরিয়ার উদ্দেশ্যে যাত্রা করেন।

আলজেরিয়ায় বিশ্বনেতৃবৃন্দের সাথে বঙ্গবন্ধু শেখ মুজিবুর রহমানের দ্বিপাক্ষিক আলোচনা অনুষ্ঠিত হয়। ১৯৭৪ সালের, ২৪ সেপ্টেম্বর জাতিসংঘের ২৯ তম সাধারণ পরিষদের সভায় বঙ্গবন্ধু শেখ মুজিবুর রহমান প্রথমবারের মতো বাংলায় বক্তব্য রাখেন। এর মাত্র সাতদিন আগে, ১৭ সেপ্টেম্বর, বিশ্ববাসীর অকুন্ঠ সমর্থন পেয়ে ১৩৬ তম দেশ হিসেবে বাংলাদেশ জাতিসংঘের সদস্যপদ লাভ করে। ১৯৭৫ সালে ১৫ আগস্টের ভোরে হাজার বছরের শ্রেষ্ঠ বাঙালি, বাংলাদেশের স্থপতি, বাঙালি জাতির জনক বঙ্গবন্ধু শেখ মুজিবুর রহমান দেশী-বিদেশী ষড়যন্ত্রের শিকার হয়ে নিজ বাসভবনে সেনাবাহিনীর কিছু বিপথগামী ও উচ্চাভিলাষী বিশ্বাসঘাতক অফিসারদের হাতে সপরিবারে নিহত হন। দুই কন্যা শেখ হাসিনা এবং শেখ রেহানা বিদেশে অবস্থান করায় সৌভাগ্যক্রমে বেঁচে যান। ১৯৭৫ সালের ১৫ আগস্ট বাঙালি জাতির ইতিহাসে অন্ধকারতম দিন। বাঙালি জাতি এই দিনটিকে জাতীয় শোক দিবস হিসেবে পালন করে এবং সাথে সাথে স্মরণ করে বিশাল হৃদয়ের সেই মহাপ্রাণ মানুষটিকে যিনি তাঁর সাহস, শৌর্য, আদর্শের মধ্য দিয়ে চিরকাল বেঁচে থাকবেন বাঙালি জাতির অন্তরে।',
           'image' => 'default/bangabandhu.jpg'
        ]);
    }
}
