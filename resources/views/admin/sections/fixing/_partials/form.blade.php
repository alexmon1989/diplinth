{{ Form::open(['method' => 'post', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) }}
    {{ Form::token() }}
    <div class="box-body">

        <div class="form-group">
            <label for="image_1">Изображение 1 *</label>
            <a href="{{ asset('img/products/fixing/1.jpg') }}" data-lightbox="image_1" data-title="Изображение 1"><img alt="Photo" width="200" src="{{ asset('img/products/fixing/1.jpg') }}" class="img-responsive pad"></a>
            <input type="file" id="image_1" name="image_1">
        </div>

        <div class="form-group">
            <label for="image_1">Изображение 2 *</label>
            <a href="{{ asset('img/products/fixing/2.jpg') }}" data-lightbox="image_2" data-title="Изображение 2"><img alt="Photo" width="200" src="{{ asset('img/products/fixing/2.jpg') }}" class="img-responsive pad"></a>
            <input type="file" id="image_2" name="image_2">
        </div>

        <div class="form-group">
            <label for="block_1_icon">Иконка блока 1 *</label>
            <input type="text" placeholder="Иконка блока 1" id="block_1_icon" name="block_1_icon" class="form-control" value="{{ old('block_1_icon', isset($section) ? $sectionSpecs->block_1_icon : '') }}">
        </div>

        <div class="form-group">
            <label for="block_2_icon">Иконка блока 2 *</label>
            <input type="text" placeholder="Иконка блока 2" id="block_2_icon" name="block_2_icon" class="form-control" value="{{ old('block_2_icon', isset($section) ? $sectionSpecs->block_2_icon : '') }}">
        </div>

        <div class="form-group">
            <label for="block_3_icon">Иконка блока 3 *</label>
            <input type="text" placeholder="Иконка блока 3" id="block_3_icon" name="block_3_icon" class="form-control" value="{{ old('block_3_icon', isset($section) ? $sectionSpecs->block_3_icon : '') }}">
        </div>

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
                        <label for="title_{{ $lang }}">Заголовок секции *</label>
                        <input type="text" placeholder="Заголовок секции" id="title_{{ $lang }}" name="title_{{ $lang }}" class="form-control" value="{{ old('title_'.$lang, isset($section) ? $sectionProperties[$lang]->title : '') }}">
                    </div>

                    <div class="form-group">
                        <label for="under_title_text_{{ $lang }}">Текст под заголовком *</label>
                        <textarea placeholder="Текст под заголовком" id="under_title_text_{{ $lang }}" name="under_title_text_{{ $lang }}" class="form-control textarea">{{ old('under_title_text_'.$lang, isset($section) ? $sectionProperties[$lang]->under_title_text : '') }}</textarea>
                    </div>

                    @for($i = 1; $i <= 3; $i++)
                    <div class="form-group">
                        <label for="block_{{ $i }}_title_{{ $lang }}">Заголовок блока {{ $i }}</label>
                        <input type="text" placeholder="Заголовок блока {{ $i }}" id="block_{{ $i }}_title_{{ $lang }}" name="block_{{ $i }}_title_{{ $lang }}" class="form-control" value="{{ old('block_'. $i .'_title_'.$lang, isset($section) ? $sectionProperties[$lang]->{'block_'.$i}->title : '') }}">
                    </div>


                    <div class="form-group">
                        <label for="block_{{ $i }}_text_{{ $lang }}">Текст блока {{ $i }}</label>
                        <textarea placeholder="Текст блока {{ $i }}" id="block_{{ $i }}_text_{{ $lang }}" name="block_{{ $i }}_text_{{ $lang }}" class="form-control textarea">{{ old('block_'.$i.'_text_'.$lang, isset($section) ? $sectionProperties[$lang]->{'block_'.$i}->text : '') }}</textarea>
                    </div>
                    @endfor
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