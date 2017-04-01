<div class="cbp-l-inline">
    <div class="cbp-l-inline-left">
        <a href="img/products/{{ $product->id }}/full.jpg" data-lightbox="product-{{ $product->id }}" data-title="{{ $product->title }}"><img src="img/products/{{ $product->id }}/full.jpg" alt="{{ $product->title }}" class="cbp-l-project-img"></a>
    </div>

    <div class="cbp-l-inline-right">
        <div class="cbp-l-inline-title">{{ $product->title }}</div>
        <div class="cbp-l-inline-subtitle">{{ $product->in_stock ? Lang::get('interface.sections.products.in_stock') : Lang::get('interface.sections.products.not_in_stock') }}</div>

        <div class="cbp-l-inline-desc">{!! $product->description !!}</div>

        <p class="page-scroll">
            <a href="#order-form" class="btn btn-u">{{ Lang::get('interface.sections.products.buy') }}</a>
        </p>
    </div>
</div>