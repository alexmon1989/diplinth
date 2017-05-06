var Order = function () {

    return {
        init: function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#btn-order', function() {
                var productId = $(this).data('product-id');

                $("#order-form").html('<p class="text-center"><img src="/unify/plugins/revolution-slider/rs-plugin/assets/loader.gif" alt=""></p>');
                $('#modal_order').modal('show');

                $.get('/product-order-form/' + productId, function (data) {
                    $("#order-form").html(data);
                    $("#confirm-order").prop("disabled", false).removeClass('disabled');
                    $("#product_id").val(productId);
                    Order.calculatePrice();
                });
            }).on('change', 'input[name=height]', function() {
                Order.calculatePrice();
            }).on('change', '#count', function() {
                Order.calculatePrice();
            }).on('click', '#confirm-order', function() {
                Order.sendOrder();
            });
        },

        calculatePrice: function () {
            var price = parseInt($("input[name=height]:checked").data('price')) || 0;
            var count = parseInt($("#count").val()) || 0;
            var totalPrice = price * count;

            $("#total-price").html(totalPrice);
        },

        sendOrder: function() {
            var url = $(location).attr('href');
            var segments = url.split( '/' );
            var lang = segments[3] || 'ru';

            $("#confirm-order").prop("disabled", true).addClass('disabled');
            $("#loading").show();

            var request = $.ajax({
                url: '/' + lang + '/make-order/' + $("#product_id").val(),
                method: "POST",
                data:
                    {
                        height: parseInt($("input[name=height]:checked").val()) || 0,
                        count: parseInt($("#count").val()) || 0,
                        username: $("#username").val(),
                        userphone: $("#userphone").val(),
                        useremail: $("#useremail").val()
                    },
                datatype: "json"
            });

            request.done(function(data) {
                if (data.success == 1) {
                    $("#order-form").html('<p class="lead color-green">' + data.message + '</p>');
                    $("#loading").hide();
                }
            }).fail(function(jqXHR, textStatus, error) {
                var errors = jqXHR.responseJSON;
                for (var i in errors) {
                    $item = $('#' + i);
                    $item.parent().addClass('has-error').find(".help-block").remove();
                    $item.after('<span class="help-block">' + errors[i] + '</span>');
                }
                $("#confirm-order").prop("disabled", false).removeClass('disabled');
                $("#loading").hide();
            });
        }
    }

}();
