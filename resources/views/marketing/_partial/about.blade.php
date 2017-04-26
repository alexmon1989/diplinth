
<section id="about" class="about-section section-first bg-grey">
    <div class="container">
        <div class="title-v1">
            <h2>{{ $aboutSectionProperties->title }}</h2>
        </div>
        <div class="row content-boxes-v3">
            @for($i = 1; $i <= 4; $i++)
            <div class="col-md-3 md-margin-bottom-30">
                <div class="content-boxes-in-v3">
                    <img alt="" src="img/about/{{ $i }}.jpg" class="img-responsive rounded-x">
                    <p class="margin-top-20 text-center">{!! $aboutSectionProperties->{'block_' . $i . '_text'} !!}</p>
                </div>
            </div>
            @endfor
        </div>
    </div>

    <div class="about-image">
        <div class="parallax-quote parallaxBg">
            <div class="container">
                <div class="parallax-quote-in">
                    <p>{!! $aboutSectionProperties->parallax_text !!}</p>
                    <small>- DiPlinth -</small>
                    <p class="text-center collaboration">
                        <a class="btn-u btn-brd btn-brd-hover btn-u-light" data-toggle="modal" data-target="#myModal" href="#collaboration">{{ Lang::get('interface.sections.contacts.collaboration_with_us') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>