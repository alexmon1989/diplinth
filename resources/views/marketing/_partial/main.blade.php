<section id="main" class="intro-section">
    <div class="fullscreenbanner-container">
        <div class="fullscreenbanner">
            <ul>
                <!-- SLIDE 1 -->
                <li data-transition="curtain-1" data-slotamount="5" data-masterspeed="700" data-title="Slide 1">
                    <!-- MAIN IMAGE -->
                    <img src="unify/img/sliders/revolution/bg1.jpg" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                    <!-- LAYERS -->
                    <h1 class="tp-caption rs-caption-1 sft start"
                        data-x="center"
                        data-hoffset="0"
                        data-y="270"
                        data-speed="800"
                        data-start="2000"
                        data-easing="Back.easeInOut"
                        data-endspeed="300">
                        {!! $mainSectionProperties->title !!}
                    </h1>

                    <!-- LAYER -->
                    <div class="tp-caption rs-caption-2 sft"
                        data-x="center"
                        data-hoffset="0"
                        data-y="470"
                        data-speed="1000"
                        data-start="3000"
                        data-easing="Power4.easeOut"
                        data-endspeed="300"
                        data-endeasing="Power1.easeIn"
                        data-captionhidden="off"
                        style="z-index: 6">
                        {!! $mainSectionProperties->under_title_text !!}
                    </div>

                    <!-- LAYER -->
                    <div class="tp-caption rs-caption-3 sft"
                        data-x="center"
                        data-hoffset="0"
                        data-y="650"
                        data-speed="800"
                        data-start="3500"
                        data-easing="Power4.easeOut"
                        data-endspeed="300"
                        data-endeasing="Power1.easeIn"
                        data-captionhidden="off"
                        style="z-index: 6">

                        <div class="row text-center learnmore">
                            <div class="col-sm-12">
                                <span class="page-scroll"><a class="btn-u btn-brd btn-brd-hover btn-u-light" href="#about">{{ Lang::get('interface.sections.main.learn_more') }}</a></span>
                            </div>
                        </div>

                    </div>
                </li>
            </ul>
            <div class="tp-bannertimer tp-bottom"></div>
            <div class="tp-dottedoverlay twoxtwo"></div>
        </div>
    </div>
</section>