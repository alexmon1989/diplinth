
<section id="products" class="about-section">
    <div class="container content-lg">
        <div class="title-v1 noline">
            <h2>{{ Lang::get('interface.sections.products.title') }}</h2>
            <p>{{ Lang::get('interface.sections.products.under_title_text') }}</p>
        </div>

        <div class="cube-portfolio">
            <div id="grid-container" class="cbp-l-grid-gallery">
                @foreach($productsNotNew as $product)
                <div class="cbp-item print motion">
                    <a href="{{ route('marketing.product_details', ['product' => $product]) }}" class="cbp-caption cbp-singlePageInline" data-title="{{ $product->title }}">
                        <div class="cbp-caption-defaultWrap">
                            <img src="img/products/{{ $product->id }}/small.jpg" alt="">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">{{ $product->title }}</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container content-lg bg-grey">
        <div class="title-v1">
            <h2>{{ Lang::get('interface.sections.products.novelty') }}</h2>
            <p>{!! Lang::get('interface.sections.products.novelty_undertext') !!}:</p>
        </div>

        <div class="cube-portfolio">
            <div id="grid-container-novelty" class="cbp-l-grid-gallery">
                @foreach($productsNew as $product)
                <div class="cbp-item print motion">
                    <a href="{{ route('marketing.product_details', ['product' => $product]) }}" class="cbp-caption cbp-singlePageInline" data-title="{{ $product->title }}">
                        <div class="cbp-caption-defaultWrap">
                            <img src="img/products/{{ $product->id }}/small.jpg" alt="">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">{{ $product->title }}</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container content-lg">
        <div class="title-v1">
            <h2>{{ $fixingSectionProperties->title }}</h2>
            <p>{!! $fixingSectionProperties->under_title_text !!}</p>
        </div>

        <div class="row">
            <div class="col-md-4 content-boxes-v3">
                <div class="clearfix margin-bottom-15">
                    <i class="icon-custom icon-md rounded-x icon-bg-u icon-line {{ $fixingSectionSpecs->block_1_icon }}"></i>
                    <div class="content-boxes-in-v3">
                        <h2 class="heading-sm">{{ $fixingSectionProperties->block_1->title }}</h2>
                        <p>{!! $fixingSectionProperties->block_1->text !!}</p>
                    </div>
                </div>
                <div class="clearfix margin-bottom-15">
                    <i class="icon-custom icon-md rounded-x icon-bg-u icon-line {{ $fixingSectionSpecs->block_2_icon }}"></i>
                    <div class="content-boxes-in-v3">
                        <h2 class="heading-sm">{{ $fixingSectionProperties->block_2->title }}</h2>
                        <p>{!! $fixingSectionProperties->block_2->text !!}</p>
                    </div>
                </div>
                <div class="clearfix margin-bottom-15">
                    <i class="icon-custom icon-md rounded-x icon-bg-u icon-line {{ $fixingSectionSpecs->block_3_icon }}"></i>
                    <div class="content-boxes-in-v3">
                        <h2 class="heading-sm">{{ $fixingSectionProperties->block_3->title }}</h2>
                        <p>{!! $fixingSectionProperties->block_3->text !!}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <a href="img/products/fixing/2.jpg" data-lightbox="fixing-2" data-title="Монтаж плинтуса"><img class="img-responsive" src="img/products/fixing/2.jpg" alt="Монтаж плинтуса"></a>
            </div>

            <div class="col-md-4">
                <a href="img/products/fixing/1.jpg" data-lightbox="fixing-1" data-title="Крепление плинтуса"> <img class="img-responsive" src="img/products/fixing/1.jpg" alt="Крепление плинтуса"></a>
            </div>
        </div>
    </div>

    @include('marketing._partial.order_modal')
</section>