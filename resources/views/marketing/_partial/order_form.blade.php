<input type="hidden" name="product_id" id="product_id" value="">

<div class="form-group">
    <label for="title">{{ Lang::get('interface.sections.products.plinth_title') }}</label>
    <input class="form-control" id="title" name="title" type="text" disabled="disabled" value="{{ $product->title }}">
</div>

<div class="form-group">
    <strong>{{ Lang::get('interface.sections.products.plinth_height') }}*</strong><br>
    @foreach($product->heights()->whereAvailable(true)->get() as $height)
    <label class="radio-inline">
        <input type="radio" name="height" {{ $loop->first == true ? 'checked' : '' }} value="{{ $height->value }}" data-price="{{ $height->price }}"> {{ $height->value }} {{ Lang::get('interface.sections.products.mm') }} (<strong>{{ $height->price }} {{ Lang::get('interface.sections.products.uah') }}/{{ Lang::get('interface.sections.products.linear_meter') }}</strong>)
    </label>
    @endforeach
</div>

<div class="form-group">
    <label for="count">{{ Lang::get('interface.sections.products.count_of_linear_metres') }}*</label>
    <input class="form-control" id="count" name="count" type="number" value="20">
</div>

<p><strong>{{ Lang::get('interface.sections.products.total_sum') }}:</strong> <span class="lead color-green" id="total-price"></span> <span class="lead color-green">{{ Lang::get('interface.sections.products.uah') }}</span></p>

<hr class="order">

<div class="form-group">
    <label for="username">{{ Lang::get('interface.sections.products.username') }}*</label>
    <input class="form-control" id="username" name="username" type="text" placeholder="{{ Lang::get('interface.sections.products.username') }}*">
</div>

<div class="form-group">
    <label for="userphone">{{ Lang::get('interface.sections.products.userphone') }}*</label>
    <input class="form-control" id="userphone" name="userphone" type="text" placeholder="{{ Lang::get('interface.sections.products.userphone') }}*">
</div>

<div class="form-group">
    <label for="useremail">{{ Lang::get('interface.sections.products.useremail') }}</label>
    <input class="form-control" id="useremail" name="useremail" type="text" placeholder="{{ Lang::get('interface.sections.products.useremail') }}">
</div>