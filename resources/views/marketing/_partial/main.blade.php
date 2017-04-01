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
                        data-y="200"
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
                        data-y="390"
                        data-speed="1000"
                        data-start="3000"
                        data-easing="Power4.easeOut"
                        data-endspeed="300"
                        data-endeasing="Power1.easeIn"
                        data-captionhidden="off"
                        style="z-index: 6">
                        {!! $mainSectionProperties->under_title_text !!}

                        <a id="order-form"></a>
                    </div>

                    <!-- LAYER -->
                    <div class="tp-caption rs-caption-3 sft"
                        data-x="center"
                        data-hoffset="0"
                        data-y="535"
                        data-speed="800"
                        data-start="3500"
                        data-easing="Power4.easeOut"
                        data-endspeed="300"
                        data-endeasing="Power1.easeIn"
                        data-captionhidden="off"
                        style="z-index: 6">

                        <form action="{{ route('marketing.make_order') }}" method="post" id="make-order-form" class="sky-form top">
                            {{ Form::token() }}
                            <header>{{ $mainSectionProperties->form_title }}</header>
                            <fieldset>
                                <div class="row">
                                    <div class="col col-6">
                                        <section class="margin-bottom-0">
                                            <label class="label">{{ Lang::get('interface.sections.main.your_name') }}: *</label>
                                            <label class="input">
                                                <i class="icon-prepend fa fa-user"></i>
                                                <input type="text" id="your_name" name="your_name" placeholder="{{ Lang::get('interface.sections.main.your_name') }}">
                                            </label>
                                        </section>
                                        <section class="margin-bottom-0">
                                            <label class="label">{{ Lang::get('interface.sections.main.telephone') }}: *</label>
                                            <label class="input">
                                                <i class="icon-prepend fa fa-phone"></i>
                                                <input type="text" id="telephone" name="telephone" placeholder="{{ Lang::get('interface.sections.main.telephone') }}">
                                            </label>
                                        </section>
                                        <section class="margin-bottom-0">
                                            <label class="label">{{ Lang::get('interface.sections.main.email') }}: *</label>
                                            <label class="input">
                                                <i class="icon-prepend fa fa-envelope"></i>
                                                <input type="text" id="email" name="email" placeholder="{{ Lang::get('interface.sections.main.email') }}">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="col col-6">
                                        <section class="margin-bottom-0">
                                            <label class="label">{{ Lang::get('interface.sections.main.message') }}:</label>
                                            <label class="textarea">
                                                <i class="icon-prepend fa fa-comment"></i>
                                                <textarea rows="4" id="msg" name="msg" placeholder="{{ Lang::get('interface.sections.main.message') }}"></textarea>
                                            </label>
                                        </section>
                                        <section class="margin-bottom-0">
                                                <button type="submit" class="btn-u">{{ Lang::get('interface.sections.main.send') }}</button>
                                        </section>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="message">
                                <i class="rounded-x fa fa-check"></i>
                                <p>{!! Lang::get('interface.sections.main.success_message') !!}</p>
                            </div>
                        </form>

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