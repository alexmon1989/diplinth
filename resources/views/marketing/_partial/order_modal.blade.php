<!-- Order Modal -->
<div class="modal fade" id="modal_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 id="myModalLabel1" class="modal-title">{{ Lang::get('interface.sections.products.plinth_order') }}</h4>
            </div>

            <div class="modal-body">
                <p>{{ Lang::get('interface.sections.products.for_order') }}:</p>
                <div id="order-form">
                    <p class="text-center"><img src="/unify/plugins/revolution-slider/rs-plugin/assets/loader.gif" alt=""></p>
                </div>
            </div>

            <div class="modal-footer">
                <span id="loading" style="display: none"><img src="/unify/plugins/revolution-slider/rs-plugin/assets/loader.gif" alt=""></span>
                <button data-dismiss="modal" class="btn btn-u btn-u-default" type="button">{{ Lang::get('interface.sections.products.cancel') }}</button>
                <button class="btn btn-u" type="button" disabled="disabled" id="confirm-order">{{ Lang::get('interface.sections.products.confirm') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->