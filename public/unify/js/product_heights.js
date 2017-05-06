$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '.delete_height', function(e) {
        e.preventDefault();
        var $this = $(this);
        var heightId = $this.data('height_id');

        $.get(
            '/admin/sections/products/delete-height/' + heightId + '/',
            function (data) {
                if (data.success == 1) {
                    $this.parent().parent().remove();
                }
            }
        );
    });

    $('body').on('click', '#add_height', function() {
        var $this = $(this);
        var productId = $("#product_id").val();

        var request = $.ajax({
            url: '/admin/sections/products/add-height/' + productId + '/',
            method: "POST",
            data:
                {
                    value: $("#height_value").val(),
                    price: $("#height_price").val(),
                    available: $("#height_available").is(':checked') ? 1 : 0
                },
            datatype: "json"
        });

        request.done(function(data) {
            if (data.success == 1) {
                var html = '<tr>' +
                    '<td>' + data.height.value + '</td>' +
                    '<td>' + data.height.price + '</td>' +
                    '<td><a href="#" class="toggle_available" data-height_id="' + data.height.id + '">' + (data.height.available == 1 ? '<strong>Да</strong>' : 'Нет') + '</a></td>' +
                    '<td>' +
                    '<a href="#" class="delete_height" data-height_id="' + data.height.id + '" title="Удалить"><i class="fa fa-trash" aria-hidden="true"></i> Удалить</a>' +
                    '</td>' +
                    '</tr>';

                $("#height_value").val('').parent().removeClass('has-error').find(".help-block").remove();
                $("#height_price").val('').parent().removeClass('has-error').find(".help-block").remove();
                $(html).insertBefore($this.parent().parent());
            }
        }).fail(function(jqXHR, textStatus, error) {
            var errors = jqXHR.responseJSON;
            for (var i in errors) {
                $item = $('#height_' + i);
                $item.parent().addClass('has-error').find(".help-block").remove();
                $item.after('<span class="help-block">' + errors[i] + '</span>');
            }
        })
    });

    $('body').on('click', '.toggle_available', function(e) {
        e.preventDefault();
        var $this = $(this);
        var heightId = $this.data('height_id');

        $.get(
            '/admin/sections/products/toggle-height-available/' + heightId + '/',
            function (data) {
                if (data.success == 1) {
                    if (data.height.available == 1) {
                        $this.html('<strong>Да</strong>');
                    } else {
                        $this.html('Нет');
                    }
                }
            }
        );
    });
});