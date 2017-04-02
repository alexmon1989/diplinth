<section id="contact" class="contacts-section">
    <div class="container content-lg">
        <div class="title-v1">
            <h2>{{ $contactsSectionProperties->title }}</h2>
            <p>{!! $contactsSectionProperties->under_title_text !!}</p>
        </div>

        <div class="row contacts-in">
            <div class="col-md-6 md-margin-bottom-40">
                <ul class="list-unstyled">
                    @if($contactsSectionProperties->address)
                    <li><i class="fa fa-home"></i> {{ $contactsSectionProperties->address }}</li>
                    @endif
                    @if($contactsSectionProperties->tel_1)
                    <li><a href="tel:{{ $contactsSectionProperties->tel_1 }}"><i class="fa fa-phone"></i>{{ $contactsSectionProperties->tel_1 }}</a></li>
                    @endif
                    @if($contactsSectionProperties->tel_2)
                    <li><a href="tel:{{ $contactsSectionProperties->tel_2 }}"><i class="fa fa-phone"></i>{{ $contactsSectionProperties->tel_2 }}</a></li>
                    @endif
                    @if($contactsSectionProperties->tel_3)
                    <li><a href="tel:{{ $contactsSectionProperties->tel_3 }}"><i class="fa fa-phone"></i>{{ $contactsSectionProperties->tel_3 }}</a></li>
                    @endif
                    @if($contactsSectionSpecs->email)
                    <li><a href="mailto:{{ $contactsSectionSpecs->email }}"><i class="fa fa-envelope"></i> {{ $contactsSectionSpecs->email }}</a></li>
                    @endif
                    @if($contactsSectionSpecs->web_site)
                    <li><a href="http://{{ $contactsSectionSpecs->web_site }}" rel="nofollow">{{ $contactsSectionSpecs->web_site }}</a></li>
                    @endif
                </ul>
            </div>

            <div class="col-md-6">
                <form action="{{ route('marketing.post_contact_form') }}" method="post" id="sky-form3" class="sky-form contact-style">
                    {{ Form::token() }}
                    <fieldset>
                        <label>{{ Lang::get('interface.sections.contacts.name') }}</label>
                        <div class="row">
                            <div class="col-md-7 margin-bottom-20 col-md-offset-0">
                                <div>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>
                        </div>

                        <label>{{ Lang::get('interface.sections.contacts.telephone') }}</label>
                        <div class="row">
                            <div class="col-md-7 margin-bottom-20 col-md-offset-0">
                                <div>
                                    <input type="text" name="telephone" id="telephone" class="form-control">
                                </div>
                            </div>
                        </div>

                        <label>{{ Lang::get('interface.sections.contacts.email') }} <span class="color-red">*</span></label>
                        <div class="row">
                            <div class="col-md-7 margin-bottom-20 col-md-offset-0">
                                <div>
                                    <input type="text" name="email" id="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <label>{{ Lang::get('interface.sections.contacts.message') }}</label>
                        <div class="row">
                            <div class="col-md-11 margin-bottom-20 col-md-offset-0">
                                <div>
                                    <textarea rows="8" name="msg" id="msg" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <p><button type="submit" class="btn-u btn-brd btn-brd-hover btn-u-dark">{{ Lang::get('interface.sections.contacts.send') }}</button></p>
                    </fieldset>

                    <div class="message">
                        <i class="rounded-x fa fa-check"></i>
                        <p>{{ Lang::get('interface.sections.contacts.success_message') }}</p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Google Map -->
    <div id="map"
    class="map-class"
    data-lat="{{ $contactsSectionSpecs->map_marker_position->lat }}"
    data-lng="{{ $contactsSectionSpecs->map_marker_position->lng }}"></div>

    <div class="copyright-section">
        <p>{{ date('Y') }} &copy; {{ Lang::get('interface.copyright') }}</p>
        <ul class="social-icons">
            <li><a href="https://fb.com/diplinth" rel="nofollow" data-original-title="Facebook" class="social_facebook rounded-x"></a></li>
        </ul>
        <span class="page-scroll"><a href="#intro"><i class="fa fa-angle-double-up back-to-top"></i></a></span>
    </div>
</section>