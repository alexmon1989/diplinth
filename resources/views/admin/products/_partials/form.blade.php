{{ Form::open(['method' => 'post', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) }}
    {{ Form::token() }}
    <div class="box-body">

        <div class="checkbox">
            <label>
                <input type="checkbox" name="enabled" value="1" {{ old('enabled', isset($product) ? $product->enabled : 0) == 1 ? 'checked=""' : ''  }}> Включено
            </label>
            <p class="help-block">Будет ли отображаться товар на сайте</p>
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="in_stock" value="1" {{ old('in_stock', isset($product) ? $product->in_stock : 0) == 1 ? 'checked=""' : ''  }}> В наличии
            </label>
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="is_new" value="1" {{ old('is_new', isset($product) ? $product->is_new : 0) == 1 ? 'checked=""' : ''  }}> Новинка
            </label>
            <p class="help-block">При выборе этого варианта товар автоматически попадёт в блок новинок</p>
        </div>

        <div class="form-group">
            <label for="small_image">Изображение для списка товаров</label>
            @if(isset($product))
                <a href="{{ asset('img/products/'.$product->id.'/small.jpg') }}" data-lightbox="small-image" data-title="Изображение для списка товаров"><img alt="Photo" width="200" src="{{ asset('img/products/'.$product->id.'/small.jpg') }}" class="img-responsive pad"></a>
            @endif
            <input type="file" id="small_image" name="small_image">
            <p class="help-block">Автоматически будет приведено к размеру <strong>700 х 525 пикселей</strong>.</p>
        </div>

        <div class="form-group">
            <label for="small_image">Изображение для деталей товара</label>
            @if(isset($product))
                <a href="{{ asset('img/products/'.$product->id.'/full.jpg') }}" data-lightbox="full-image" data-title="Изображение для деталей товара"><img alt="Photo" width="200" src="{{ asset('img/products/'.$product->id.'/full.jpg') }}" class="img-responsive pad"></a>
            @endif
            <input type="file" id="full_image" name="full_image">
            <p class="help-block">Автоматически будет приведено к размеру <strong>700 х 467 пикселей</strong>.</p>
        </div>

        @if(isset($product))
        <div class="form-group">
            <label>Высота товара</label>

            <table class="table table-bordered">
                <tr>
                    <td><strong>Значение, мм</strong></td>
                    <td><strong>Стоимость, грн</strong></td>
                    <td><strong>Доступно (отображать на сайте)</strong></td>
                    <td></td>
                </tr>
                @foreach($product->heights as $height)
                    <tr>
                        <td>{{ $height->value }}</td>
                        <td>{{ $height->price }}</td>
                        <td>
                            @if($height->available)
                                <a href="#" class="toggle_available" data-height_id="{{ $height->id }}"><strong>Да</strong></a>
                            @else
                                <a href="#" class="toggle_available" data-height_id="{{ $height->id }}">Нет</a>
                            @endif
                        </td>
                        <td>
                            <a href="#" class="delete_height" data-height_id="{{ $height->id }}" title="Удалить"><i class="fa fa-trash" aria-hidden="true"></i> Удалить</a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td>
                        <input placeholder="Значение, мм" id="height_value" type="number" class="form-control">
                    </td>
                    <td>
                        <input placeholder="Стоимость, грн" id="height_price" type="number" class="form-control">
                    </td>
                    <td>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="1" id="height_available"> Да
                            </label>
                        </div>
                    </td>
                    <td>
                        <input type="hidden" id="product_id" value="{{ $product->id }}">
                        <button type="button" class="btn btn-primary" id="add_height">Добавить</button>
                    </td>
                </tr>
            </table>
        </div>
        @endif



        <div class="alert alert-info alert-dismissible">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><i class="icon fa fa-info"></i> Внимание!</h4>
            Ниже во вкладках расположены поля, которые заполняются для каждого языка отдельно. Для переключения между языками нажмите на необходимую вкладку.
        </div>

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#ru" aria-expanded="false">Русский</a></li>
                <li><a data-toggle="tab" href="#uk" aria-expanded="false">Украинский</a></li>
                <li><a data-toggle="tab" href="#en" aria-expanded="false">Английский</a></li>
                <li><a data-toggle="tab" href="#pl" aria-expanded="false">Польский</a></li>
            </ul>
            <div class="tab-content">
                @foreach(['ru', 'uk', 'en', 'pl'] as $lang)

                <div id="{{ $lang }}" class="tab-pane {{ $loop->first ? 'active' : '' }}">
                    <div class="form-group">
                        <label for="name_{{ $lang }}">Название</label>
                        <input type="text" placeholder="Название" id="title_{{ $lang }}" name="title_{{ $lang }}" class="form-control" value="{{ old('title_'.$lang, isset($product) ? $product->translate($lang)->title : '') }}">
                    </div>

                    <div class="form-group">
                        <label for="description_{{ $lang }}">Описание</label>
                        <textarea placeholder="Описание" id="description_{{ $lang }}" name="description_{{ $lang }}" class="form-control textarea">{{ old('description_'.$lang, isset($product) ? $product->translate($lang)->description : '') }}</textarea>
                    </div>
                </div>
                <!-- /.tab-pane -->
                @endforeach
            </div>
            <!-- /.tab-content -->
        </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Сохранить</button>
    </div>
{{ Form::close() }}