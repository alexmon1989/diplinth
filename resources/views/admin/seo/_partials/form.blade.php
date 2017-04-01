{{ Form::open(['method' => 'post', 'autocomplete' => 'off']) }}
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
                        <label for="title_{{ $lang }}">Title *</label>
                        <input type="text" placeholder="Title" id="title_{{ $lang }}" name="title_{{ $lang }}" class="form-control" value="{{ old('title_'.$lang, Memory::get('site.title_' . $lang)) }}">
                    </div>

                    <div class="form-group">
                        <label for="title_{{ $lang }}">Keywords</label>
                        <input type="text" placeholder="Keywords" id="keywords_{{ $lang }}" name="keywords_{{ $lang }}" class="form-control" value="{{ old('keywords_'.$lang, Memory::get('site.keywords_' . $lang)) }}">
                    </div>

                    <div class="form-group">
                        <label for="description_{{ $lang }}">Description</label>
                        <input type="text" placeholder="Description" id="description_{{ $lang }}" name="description_{{ $lang }}" class="form-control" value="{{ old('keywords_'.$lang, Memory::get('site.description_' . $lang)) }}">
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