/**
 * Created by admin on 03.10.2017.
 */
// =========================================================================  contact_form + validator
$(function() {
    function formsValide(form) {
        send = 1;
        form.find('input.required').each(function() {
            if ($(this).hasClass('required')) {
                if ($(this).attr('name') == "name") {
                    var str = $(this).val();
                    str = $.trim(str);
                    if(str.length < 2){
                        alert ('Введите Имя');
                        send = 0;
                        return false;
                    }
                }
                if ($(this).attr('name') == "email") {
                    var str = $(this).val();
                    str = $.trim(str);
                    if(str.length < 5){
                        alert ('Введите email');
                        send = 0;
                        return false;
                    }
                }
                if ($(this).attr('name') == "tel") {
                    var str = $(this).val();
                    str = $.trim(str);
                    if(str.length < 5){
                        alert ('Введите телефон');
                        send = 0;
                        return false;
                    }

                }
            }
        });
        if (send) {
            return true;
        } else {
            return false;
        }
    }

    //при нажатии на кнопку button нужной формы запускаем функцию обработки данных
    $('#get_payment').click(function() {
        if (formsValide($(this).closest('form'))) {

            $('#contact_form').before('<div id="contact_form_info">Оформление заявки. Подождите...</div>');
            $('#contact_form').hide();
            //берем путь php обработчика
            order_url = $('#contact_form').attr('action');
            form_data = $(this).closest('form').serialize();
            //посылаем асинхронный запрос на сервер и передаем все данные формы
            $.post(order_url, form_data, function(data) {
                //выводим возврашаемый сервером код html вместо содержимого формы
                $('#contact_form').remove();
                console.log(data);
                $('#contact_form_info').html(data);
                $('#PaymentForm').find('.content-wrappern, .main-headern, .main-footern').css('display','none');
            }, "html");
        }
        return false;
    });
});


