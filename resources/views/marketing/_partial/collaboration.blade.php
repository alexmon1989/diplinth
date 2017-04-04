<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 id="myModalLabel1" class="modal-title">{{ Lang::get('interface.sections.contacts.collaboration_with_us') }}</h4>
            </div>
            <div class="modal-body">
                {!! $contactsSectionProperties->collaboration !!}
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn-u btn-u-default" type="button">{{ Lang::get('interface.sections.contacts.close') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->