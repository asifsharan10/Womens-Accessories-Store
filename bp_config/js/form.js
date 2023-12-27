$(function () {
    $(window).keydown(function (e) {
        if (e.which === 27 && $('#error_handler_overlay').length) {
            $('#error_handler_overlay').remove();
        }
    });


    $(document).off('click', '#error_handler_overlay_close');
    $(document).on('click', '#error_handler_overlay_close', function () {
        $('#error_handler_overlay').fadeOut(500);
    });
});

// For error Display

function error_handler(errors) {
    if ($('#error_handler_overlay').length) {
        $('#error_handler_overlay').remove();
    }

    $('body').append(getUI(errors));

    $('#error_handler_overlay').fadeIn(500);
}

function getUI(errors) {
    var li = '';

    $.each(errors, function (key, value) {
        li += '<li>' + value + '</li>';
    });

    var html = '';
    html += '<div id="error_handler_overlay">';
    html += '<div class="error_handler_body"><a href="javascript:void(0);" id="error_handler_overlay_close">X</a><ul>' + li + '</ul></div>';
    html += '</div>';

    return html;
}

// For custom data display 

function popop_shower(msg) {
    if ($('#error_handler_overlay').length) {
        $('#error_handler_overlay').remove();
    }

    $('body').append(msg_data(msg));

    $('#error_handler_overlay').fadeIn(500);
}

function msg_data(msg) {

    var div = '<div style="width:100%;"><iframe width="500" height="400" style="width:100%;height:400px" src="' + msg + '" ></iframe></div>';
    var html = '';

    html += '<div id="error_handler_overlay">';
    html += '<div class="error_handler_body" style="width:100%"><a href="javascript:void(0);" id="error_handler_overlay_close">X</a>' + div + '</div>';
    html += '</div>';

    return html;
}

// cvv popup display

function popop_cvv() {
    if ($('#error_handler_overlay').length) {
        $('#error_handler_overlay').remove();
    }

    var html = '';
    html += '<div id="error_handler_overlay">';
    html += '<div class="error_handler_body"><a href="javascript:void(0);" id="error_handler_overlay_close">X</a> <img style="width:100%" src="./bp_config/images/payment/cvv.jpg"/> </div>';
    html += '</div>';

    $('body').append(html);
    $('#error_handler_overlay').fadeIn(500);
}

function popop_cancel_text(phone) {
    if ($('#error_handler_overlay').length) {
        $('#error_handler_overlay').remove();
    }
    var html = '';
    html += '<div id="error_handler_overlay">';
    html += '<div class="error_handler_body"><a href="javascript:void(0);" id="error_handler_overlay_close">X</a>';
    html += '<div><p>Sorry, we are unable to complete your request. Please contact customer support for assistance at ' + phone + '</p></div>';
    html += '</div>';

    $('body').append(html);
    $('#error_handler_overlay').fadeIn(500);
}

function confirm() {
    if ($('#error_handler_overlay').length) {
        $('#error_handler_overlay').remove();
    }

    var html = '';
    html += '<div id="error_handler_overlay">';
    html += '<div class="error_handler_body"><a href="javascript:void(0);" id="error_handler_overlay_close">X</a>';
    html += '<div class="container"><h3>Your request has been submitted ! Your subscription will be cancelled! </h3></div>';
    html += '</div>';

    $('body').append(html);
    $('#error_handler_overlay').fadeIn(500);
}


function order_confirm() {
    var loader = $("#loading-indicator");
    loader.show();

    if ($('#error_handler_overlay').length) {
        $('#error_handler_overlay').remove();
    }

    var firstName = $("input[name=firstName]").val();
    var lastName = $('input[name=lastName]').val();
    var shippingAddress1 = $('input[name=shippingAddress1]').val();
    var shippingCity = $('input[name=shippingCity]').val();
    var shippingState = $('select[name=shippingState]').val();
    var shippingCountry = $('input[name=shippingCountry]').val();
    var shippingZip = $('input[name=shippingZip]').val();
    var phone = $('input[name=phone]').val();
    var email = $('input[name=email]').val();
    var ccno = $('input[name=cc_no]').val();
    var ccmonth = $('select[name=cc_month]').val();
    var ccyear = $('select[name=cc_year]').val();
    var cvv = $('input[name=CVV]').val();
    var customNotes = $('textarea#order-notes').val();
    var products = $('.cart-product');

    var data = {
        'firstName': firstName,
        'lastName': lastName,
        'address1': shippingAddress1,
        'city': shippingCity,
        'state': shippingState,
        'country': shippingCountry,
        'postalCode': shippingZip,
        'phoneNumber': phone,
        'emailAddress': email,
        'billShipSame': 1,
        'paySource': 'CREDITCARD',
        'cardNumber': ccno,
        'cardMonth': ccmonth,
        'cardYear': ccyear,
        'cardSecurityCode': cvv,
        'custom_Order_Notes': customNotes,
        'redirectsTo': 'https://your-domain/confirm.php', // Thank You Page (3DS success)
        'errorRedirectsTo': '', //Error page URL (after 3DS failure),
        'custom_Product_Ordered': '',
        'custom_Website_Url': window.location.host,
    };

    window.data = Object.assign({}, data);

    if (products.length > 0) {
        products.each(function (index, item) {
            var key = index + 1;
            window.data['product' + key + '_id'] = item.dataset.konid;
            window.data['product' + key + '_qty'] = item.dataset.quantity;
            window.data['product' + key + '_price'] = item.dataset.price;
            window.data['product' + key + '_shipPrice'] = item.dataset.shipping;
            window.data['custom_Product_Ordered'] += key > 1 ? ', ' : '' + item.innerText;
        })
    }

    $.ajax({
        url: '/bp_config/ajax.php',
        type: 'POST',
        dataType: 'json',
        data: {
            action: 'import_order',
            data: window.data,
        },
        success: function (res) {
            if (res.status === 'success') {
                console.log(res.message.orderId);
                if (res.message.orderId) {
                    var form = $('<form>');
                    form.attr('method', 'POST');
                    form.attr('action', '/confirm.php');
                    var input = $('<input>');
                    input.attr('type', 'hidden');
                    input.attr('name', 'message[orderId]');
                    input.attr('value', res.message.orderId);
                    form.append(input).appendTo('body').submit().remove();
                }
            } else if (res.status === 'error') {
                var html = '';
                html += '<div id="error_handler_overlay">';
                html += '<div class="error_handler_body"><a href="javascript:void(0);" id="error_handler_overlay_close">X</a>';
                html += '<div class="container">';
                if (typeof res.message === 'string') {
                    html += '<p>' + res.message + '</p></div>';
                } else {
                    for (var messageKey in res.message) {
                        html += '<p>' + messageKey + ': ' + res.message[messageKey] + '</p>';
                    }
                }
                html += '</div>';
                html += '</div>';
                $('body').append(html);
                $('#error_handler_overlay').fadeIn(500);

            } else if (res.status === 'merc_redirect') {
                if (res.message.url) {
                    window.location.href = res.message.url;
                } else if (res.message.script) {
                    eval(res.message.script);
                }
            }
            loader.hide();
        },
        error: function (err) {
            console.log(err);
            var html = '';
            html += '<div id="error_handler_overlay">';
            html += '<div class="error_handler_body"><a href="javascript:void(0);" id="error_handler_overlay_close">X</a>';
            html += '<div class="container"><p> Sorry, we are unable to process your payment. Please try again later. </p></div>';
            html += '</div>';
            $('body').append(html);
            loader.hide();
            $('#error_handler_overlay').fadeIn(500)
        }
    });


}

function show_var(mod, p_id, mpc, data_product, data_shipping, data_total) {
    if ($('#error_handler_overlay').length) {
        $('#error_handler_overlay').remove();
    }

    var page = 'bp_config/verbiage.php?mod=' + mod + '&pid=' + p_id + '&data_product=' + data_product + '&data_shipping=' + data_shipping + '&data_total=' + data_total;

    if (mpc == 0) {
        $('#verbiagee').load(page);
    } else if (mpc == 1) {
        $('#pv').append($('<div>').load(page));
    }

    $('#pv').css('display', 'block');
}

function hide_var(pid) {
    if ($('#error_handler_overlay').length) {
        $('#error_handler_overlay').remove();
    }

    $('#pid' + pid).remove();


    $('#pv').css('display', 'block');

}

function show_pname(mod, p_id, mpc, p_qty) {
    if ($('#error_handler_overlay').length) {
        $('#error_handler_overlay').remove();
    }
    var content = 'bp_config/product.php?mod=' + mod + '&pid=' + p_id + '&p_qty=' + p_qty;

    if (mpc == 0) {
        $('#p_name_all').load(content);
    } else if (mpc == 1) {
        $('#p_name_all').append($('<div>').load(content));
    }


}

function hide_pname(p_id) {
    if ($('#error_handler_overlay').length) {
        $('#error_handler_overlay').remove();
    }
    $('#pid' + p_id).remove();
}

// function cvv() {
//  if ($('#error_handler_overlay').length) {
//      $('#error_handler_overlay').remove();
//  }

//  var html = '';
//  html += '<div id="error_handler_overlay">';
//  html += '<div class="error_handler_body"><a href="javascript:void(0);" id="error_handler_overlay_close">X</a>';
//  html += '<div class="container"><img src="./bp_config/images/cvv.jpg" /></div>';
//  html += '</div>';

//      $('body').append(html);
//      setTimeout($('#error_handler_overlay').fadeIn(500), 2000);
// }


function setDefaultSelectValue ($excludeByClass){
    var $selects = $('.customDataTable select');
    if($selects.length > 0) {
        var $addToCart = $('.addTOCart');
        $selects.each(function (index, select) {
           if(typeof $excludeByClass !== 'undefined' && $(this).hasClass($excludeByClass) || $(this).hasClass('disabled')) {
               return;
           }
           var $options = $(this).find('option');
           if($options.length > 0) {
               $options.eq(0).removeAttr('selected').eq(0).attr('selected', 'selected').parents('tr').find('.addTOCart').addClass('disabled');
           }
        });
    }
}
$(document).ready(function ($) {
    var $addToCart = $('.addTOCart');
    $addToCart.on('click', function () {
        var $select = $(this).closest('tr').find('select');
        if($select.length > 0) {
            var $excludeByClass = $select.attr('class');
            setDefaultSelectValue($excludeByClass);
        } else {
            setDefaultSelectValue();
        }
    })

});
