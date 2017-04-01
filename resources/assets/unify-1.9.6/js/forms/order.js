var OrderForm = function () {

    var pathArray = window.location.pathname.split( '/' );

    var errorsMessages = {
        'ru': {
            your_name:
            {
                required: 'Пожалуйста, введите ваше имя'
            },
            telephone:
            {
                required: 'Пожалуйста, введите ваш телефон для связи'
            },
            email:
            {
                required: 'Пожалуйста, введите ваш E-Mail адрес',
                email: 'Пожалуйста, введите правильный E-Mail адрес'
            },
            msg:
            {
                required: 'Пожалуйста, введите сообщение',
                minlength: 'Длина сообщения - не менее 10 символов'
            }
        },
        'uk': {
            your_name:
            {
                required: 'Будь ласка, введіть ваше ім\'я'
            },
            telephone:
            {
                required: 'Будь ласка, введіть ваш телефон для зв\'язку'
            },
            email:
            {
                required: 'Будь ласка, введіть вашу E-Mail адресу',
                email: 'Будь ласка, введіть правильну E-Mail адресу'
            },
            msg:
            {
                required: 'Будь ласка, введіть повідомлення',
                minlength: 'Довжина повідомлення - не менше 10 символів'
            }
        },
        'en': {
            your_name:
            {
                required: 'Please enter your name'
            },
            telephone:
            {
                required: 'Please enter your telephone number to contact'
            },
            email:
            {
                required: 'Please enter your E-Mail address',
                email: 'Please enter a valid E-Mail address'
            },
            msg:
            {
                required: 'Please enter a message',
                minlength: 'Message length - not less than 10 characters'
            }
        },
        'pl': {
            your_name:
            {
                required: 'Proszę podać swoje imię i nazwisko'
            },
            telephone:
            {
                required: 'Proszę podać telefon do komunikowania się ze sobą'
            },
            email:
            {
                required: 'Podaj swój adres e-mail',
                email: 'Proszę podać poprawny adres e-mail'
            },
            msg:
            {
                required: 'Wpisz wiadomość',
                minlength: 'Długość wiadomości - nie mniej niż 10 znaków'
            }
        }
    };

    return {

        // Order Form
        initOrderForm: function () {
            // Validation
            $("#make-order-form").validate({
                // Rules for form validation
                rules:
                {
                    your_name:
                    {
                        required: true
                    },
                    telephone:
                    {
                        required: true
                    },
                    email:
                    {
                        required: true,
                        email: true
                    },
                    msg:
                    {
                        required: true,
                        minlength: 10
                    }
                },

                // Messages for form validation
                messages: errorsMessages[pathArray[1]],

                // Ajax form submition
                submitHandler: function(form) {
                    $(form).ajaxSubmit(
                        {
                            beforeSend: function()
                            {
                                $('#order-form button[type="submit"]').attr('disabled', true);
                            },
                            success: function()
                            {
                                $("#make-order-form").addClass('submited');
                            }
                        });
                },

                // Do not change code below
                errorPlacement: function(error, element) {
                    error.insertBefore(element.parent());
                }
            });
        }

    };

}();
