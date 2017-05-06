<div class="cbp-l-inline">
    <div class="cbp-l-inline-left">
        <a href="img/products/{{ $product->id }}/full.jpg" data-lightbox="product-{{ $product->id }}" data-title="{{ $product->title }}"><img src="img/products/{{ $product->id }}/full.jpg" alt="{{ $product->title }}" class="cbp-l-project-img"></a>
    </div>

    <div class="cbp-l-inline-right">
        <div class="cbp-l-inline-title">{{ $product->title }}</div>
        <div class="cbp-l-inline-subtitle">{{ $product->in_stock ? Lang::get('interface.sections.products.in_stock') : Lang::get('interface.sections.products.not_in_stock') }}</div>

        <div class="cbp-l-inline-desc">
            {!! $product->description !!}
            <br>
            <br>
            <strong>{{ Lang::get('interface.sections.products.size') }}:</strong> 18*{{ $product->getSeparatedHeights() }}*2200 {{ Lang::get('interface.sections.products.mm') }}<br>
            <strong>{{ Lang::get('interface.sections.products.height') }}:</strong> {{ $product->getSeparatedHeights() }} {{ Lang::get('interface.sections.products.mm') }}
            <br>
            <strong>{{ Lang::get('interface.sections.products.unit') }}:</strong> {{ Lang::get('interface.sections.products.linear_meter') }}<br>
            <strong>{{ Lang::get('interface.sections.products.price') }}:</strong> {{ $product->getSeparatedPrices() }} {{ Lang::get('interface.sections.products.uah') }}
        </div>

        <p class="page-scroll">
            <button class="btn btn-u" id="btn-order" data-product-id="{{ $product->id }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                {{ Lang::get('interface.sections.products.buy') }}</button>
        </p>
    </div>
</div>