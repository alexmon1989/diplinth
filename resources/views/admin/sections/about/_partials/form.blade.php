{{ Form::open(['method' => 'post', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) }}
    {{ Form::token() }}
    <div class="box-body">

        <div class="row">
            @for($i = 1; $i <= 4; $i++)
            <div class="col-md-3">
                <div class="form-group">
                    <label for="image_{{ $i }}">Изображение для блока {{ $i }}</label>
                    <a href="{{ asset('img/about/'.$i.'.jpg') }}" data-lightbox="small-image" data-title="Изображение блока {{ $i }}"><img alt="Photo" width="200" src="{{ asset('img/about/'.$i.'.jpg') }}" class="img-responsive pad"></a>
                    <input type="file" id="image_{{ $i }}" name="image_{{ $i }}">
                </div>
            </div>
            @endfor
            <div class="col-md-12">
                <p class="help-block">Изображения будут автоматически приведены к размеру <strong>200 х 200 пикселей</strong>.</p>
            </div>
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

                    @for($i = 1; $i <= 4; $i++)
                    <div class="form-group">
                        <label for="block_{{ $i }}_text_{{ $lang }}">Текст блока {{ $i }} *</label>
                        <textarea placeholder="Текст блока {{ $i }}" id="block_{{ $i }}_text_{{ $lang }}" name="block_{{ $i }}_text_{{ $lang }}" class="form-control textarea">{{ old('block_'.$i.'_text_'.$lang, isset($section) ? $sectionProperties[$lang]->{'block_'.$i.'_text'} : '') }}</textarea>
                    </div>
                    @endfor

                    <div class="form-group">
                        <label for="parallax_text_{{ $lang }}">Текст в Parallax-блоке *</label>
                        <input type="text" placeholder="Текст в Parallax-блоке" id="parallax_text_{{ $lang }}" name="parallax_text_{{ $lang }}" class="form-control" value="{{ old('parallax_text_'.$lang, isset($section) ? $sectionProperties[$lang]->parallax_text : '') }}">
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