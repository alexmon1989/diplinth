{{ Form::open(['method' => 'post', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) }}
    {{ Form::token() }}
    <div class="box-body">

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
                        <label for="title_{{ $lang }}">Главный текст (тег h1) *</label>
                        <textarea placeholder="Главный текст (тег h1)" id="title_{{ $lang }}" name="title_{{ $lang }}" class="form-control textarea">{{ old('title_'.$lang, isset($section) ? $sectionProperties[$lang]->title : '') }}</textarea>
                        <p class="help-block">Внимание! Тег h1 должен быть один на всю страницу, к нему очень "чувствительны" поисковые системы. Отнеситесь внимательну к его выбору.</p>
                    </div>

                    <div class="form-group">
                        <label for="under_title_text_{{ $lang }}">Текст под главным *</label>
                        <textarea placeholder="Текст под главным" id="under_title_text_{{ $lang }}" name="under_title_text_{{ $lang }}" class="form-control textarea">{{ old('under_title_text_'.$lang, isset($section) ? $sectionProperties[$lang]->under_title_text : '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="form_title_{{ $lang }}">Заголовок формы *</label>
                        <input type="text" placeholder="Заголовок формы" id="form_title_{{ $lang }}" name="form_title_{{ $lang }}" class="form-control" value="{{ old('title_'.$lang, isset($section) ? $sectionProperties[$lang]->form_title : '') }}">
                    </div>
                </div>
                <!-- /.tab-pane -->

                @endforeach
            </div>
            <!-- /.tab-content -->
        </div>

        <hr/>

        <div class="form-group">
            <label for="form_email">Отправлять данные формы на следующий адрес *</label>
            <input type="text" placeholder="Отправлять данные формы на следующий адрес" id="form_email" name="form_email" class="form-control" value="{{ old('form_email', Memory::get('orders_form_email')) }}">
        </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Сохранить</button>
    </div>
{{ Form::close() }}