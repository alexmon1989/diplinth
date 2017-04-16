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
                        <label for="title_{{ $lang }}">Заголовок секции *</label>
                        <input type="text" placeholder="Заголовок секции" id="title_{{ $lang }}" name="title_{{ $lang }}" class="form-control" value="{{ old('title_'.$lang, isset($section) ? $sectionProperties[$lang]->title : '') }}">
                    </div>

                    <div class="form-group">
                        <label for="under_title_text_{{ $lang }}">Текст под заголовком *</label>
                        <textarea placeholder="Текст под заголовком" id="under_title_text_{{ $lang }}" name="under_title_text_{{ $lang }}" class="form-control textarea">{{ old('under_title_text_'.$lang, isset($section) ? $sectionProperties[$lang]->under_title_text : '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="address_{{ $lang }}">Адрес</label>
                        <input type="text" placeholder="Адрес" id="address_{{ $lang }}" name="address_{{ $lang }}" class="form-control" value="{{ old('address_'.$lang, isset($section) ? $sectionProperties[$lang]->address : '') }}">
                    </div>

                    <div class="form-group">
                        <label for="tel_1_{{ $lang }}">Телефон 1</label>
                        <input type="text" placeholder="Телефон 1" id="tel_1_{{ $lang }}" name="tel_1_{{ $lang }}" class="form-control" value="{{ old('tel_1_'.$lang, isset($section) ? $sectionProperties[$lang]->tel_1 : '') }}">
                    </div>

                    <div class="form-group">
                        <label for="tel_2_{{ $lang }}">Телефон 2</label>
                        <input type="text" placeholder="Телефон 2" id="tel_2_{{ $lang }}" name="tel_2_{{ $lang }}" class="form-control" value="{{ old('tel_2_'.$lang, isset($section) ? $sectionProperties[$lang]->tel_2 : '') }}">
                    </div>

                    <div class="form-group">
                        <label for="tel_3_{{ $lang }}">Телефон 3</label>
                        <input type="text" placeholder="Телефон 3" id="tel_3_{{ $lang }}" name="tel_3_{{ $lang }}" class="form-control" value="{{ old('tel_3_'.$lang, isset($section) ? $sectionProperties[$lang]->tel_3 : '') }}">
                    </div>

                    <div class="form-group">
                        <label for="collaboration_{{ $lang }}">Текст для условий сотрудничества</label>
                        <textarea class="form-control textarea" name="collaboration_{{ $lang }}" id="collaboration_{{ $lang }}" cols="30" rows="5">{!! old('collaboration_'.$lang, (isset($section) and isset($sectionProperties[$lang]->collaboration)) ? $sectionProperties[$lang]->collaboration : '') !!}</textarea>
                    </div>
                </div>
                <!-- /.tab-pane -->

                @endforeach
            </div>
            <!-- /.tab-content -->
        </div>

        <hr/>

        <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="text" placeholder="Адрес" id="email" name="email" class="form-control" value="{{ old('email', isset($section) ? $sectionSpecs->email : '') }}">
        </div>

        <div class="form-group">
            <label for="web_site">Веб-сайт</label>
            <input type="text" placeholder="Веб-сайт" id="web_site" name="web_site" class="form-control" value="{{ old('web_site', isset($section) ? $sectionSpecs->web_site : '') }}">
        </div>

        <div class="form-group">
            <label for="facebook">Facebook</label>
            <input type="text" placeholder="Facebook" id="facebook" name="facebook" class="form-control" value="{{ old('facebook', (isset($section) and isset($sectionSpecs->facebook)) ? $sectionSpecs->facebook : '') }}">
        </div>

        <hr/>

        <h4>Метка на карте</h4>

        <div class="form-group">
            <label for="lat">Широта*</label>
            <input type="text" placeholder="Широта" id="lat" name="lat" class="form-control" value="{{ old('lat', isset($section) ? $sectionSpecs->map_marker_position->lat : '') }}">
        </div>

        <div class="form-group">
            <label for="lng">Долгота*</label>
            <input type="text" placeholder="Долгота" id="lng" name="lng" class="form-control" value="{{ old('lng', isset($section) ? $sectionSpecs->map_marker_position->lng : '') }}">
        </div>

        <hr/>

        <div class="form-group">
            <label for="form_email">Отправлять данные формы заказа на следующий адрес *</label>
            <input type="text" placeholder="Отправлять данные формы заказа на следующий адрес" id="form_email_orders" name="form_email_orders" class="form-control" value="{{ old('form_email_orders', Memory::get('orders_form_email')) }}">
        </div>

        <div class="form-group">
            <label for="form_email">Отправлять данные контактной формы на следующий адрес *</label>
            <input type="text" placeholder="Отправлять данные контактной формы на следующий адрес" id="form_email" name="form_email" class="form-control" value="{{ old('form_email', Memory::get('contacts_form_email')) }}">
        </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Сохранить</button>
    </div>
{{ Form::close() }}