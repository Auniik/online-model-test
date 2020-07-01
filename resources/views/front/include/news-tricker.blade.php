<section class="news-scroll">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="onoffswitch3">
                    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="myonoffswitch3" checked>
                    <label class="onoffswitch3-label" for="myonoffswitch3">
        <span class="onoffswitch3-inner">
            <span class="onoffswitch3-active">
                @foreach($news as $new)
                    <marquee class="scroll-text">{{$new->title}}</marquee>
                @endforeach
                <span class="onoffswitch3-switch">আপডেট </span>
            </span>
            <span class="onoffswitch3-inactive"><span class="onoffswitch3-switch">SHOW BREAKING NEWS</span></span>
        </span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</section>