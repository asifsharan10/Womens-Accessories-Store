<?php
$verbiageFilePath = __DIR__ . DIRECTORY_SEPARATOR . 'bp_config' . DIRECTORY_SEPARATOR . 'verbiage.php';
if (file_exists($verbiageFilePath)) {
    require_once $verbiageFilePath;
} else {
    echo 'verbiage configuration error';
}
error_reporting(0);

if (isset($_POST['firstName'])) {
    //detect the type of credit card
    $creditCardType = 'visa';

    if (str_starts_with($_POST['cc_no'], '5')) $creditCardType = 'master';
    if (str_starts_with($_POST['cc_no'], '6')) $creditCardType = 'discover';

    //detect IP
    $IP = 'none';

    if (!empty($_SERVER['HTTP_CLIENT_IP']))             $IP = $_SERVER['HTTP_CLIENT_IP'];
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   $IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
    elseif (isset($_SERVER['REMOTE_ADDR']))             $IP = $_SERVER['REMOTE_ADDR'];

    //parse cart products
    $products = json_decode($_POST['products']);
    $offers = [];

    if (count($products)) {
        foreach ($products as $product) {
            $offers[] = [
                'offer_id'          => $CRM['offerId'],
                'product_id'        => $product->StickyId,
                'billing_model_id'  => $CRM['billingModelId'],
                'quantity'          => $product->quantity,
                'price'             => $product->price
            ];
        }
    }

    if (isset($_POST['shipping-insurance'])) {
        $offers[] = [
            'offer_id'          => $CRM['offerId'],
            'product_id'        => $CRM['shippingInsuranceProductId'],
            'billing_model_id'  => $CRM['billingModelId'],
            'quantity'          => 1,
            'price'             => $CRM['shippingInsurancePrice']
        ];
    }

    //set expirationDate
    $expirationDate  = $_POST['cc_month'] < 10 ? ('0' . $_POST['cc_month']) : $_POST['cc_month'];
    $expirationDate .= substr($_POST['cc_year'], -2);

    //put the data together
    $json = json_encode([
        'firstName'         => $_POST['firstName'],
        'lastName'          => $_POST['lastName'],
        'billingFirstName'  => $_POST['firstName'],
        'billingLastName'   => $_POST['lastName'],
        'billingAddress1'   => $_POST['shippingAddress1'],
        'billingAddress2'   => '',
        'billingCity'       => $_POST['shippingCity'],
        'billingState'      => $_POST['shippingState'],
        'billingZip'        => $_POST['shippingZip'],
        'billingCountry'    => $_POST['shippingCountry'],
        'phone'             => $_POST['phone'],
        'email'             => $_POST['email'],
        'creditCardType'    => $creditCardType,
        'creditCardNumber'  => $_POST['cc_no'],
        'expirationDate'    => $expirationDate,
        'CVV'               => $_POST['CVV'],
        'shippingId'        => $CRM['shippingId'],
        'tranType'          => $CRM['tranType'],
        'ipAddress'         => $IP,
        'campaignId'        => $CRM['campaignId'],
        'offers'            => $offers,
        'shippingAddress1'  => $_POST['shippingAddress1'],
        'shippingAddress2'  => '',
        'shippingCity'      => $_POST['shippingCity'],
        'shippingState'     => $_POST['shippingState'],
        'shippingZip'       => $_POST['shippingZip'],
        'shippingCountry'   => $_POST['shippingCountry'],
        'notes'             => $_POST['notes'],
        'forceGatewayId'    => $CRM['gatewayId']
    ]);

    //request
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $CRM['url']);
    curl_setopt($ch, CURLOPT_USERPWD, $CRM['username'] . ':' . $CRM['password']);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = json_decode(curl_exec($ch));
    curl_close($ch);
}

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Fonts -->
    <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/bootstrap.min.css?v=<?= time() ?>">
    <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/custom.css?v=<?= time() ?>">
    <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/checkout_custom.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/style.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/animate.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="bp_config/css/swiper-bundle.min.css" />
    <!-- <script src="bp_config/js/swiper-bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

</head>

<body>
    <div id="loadingMask" style="width: 100%; height: 100%; position: fixed; background: #fff; z-index:99999999999;">
        <div>
            <img src="./img/loadingGif/<?= $pageConfig['loadingGif'] ?>.gif">
        </div>
    </div>
    <?php if (!isset($response->error_message) && isset($response->order_id)) { ?>
        <script>
            window.location.href = './confirm.php?order_id=<?= $response->order_id; ?>';
        </script>
    <?php } else if (isset($_POST['firstName']) && ($response->error_message >= 1)) {
        if (file_exists('./orderfail.php')) {
            require './orderfail.php';
        } else {
            echo ("<h1>There is Some Error Please Try Again Later!</h1>");
        }
    } ?>

    <?php
    $showTrialContinuityVerbiage = false;

    foreach ($products as $product) {
        if ($product['status'] == 'active' && $product['billingModel'] != 1) {
            $showTrialContinuityVerbiage = true;
        }
    }
    ?>

    <?php
    if (file_exists('bp_config/includes/templates/headers/header' . $pageConfig['header_template'] . '.php')) {
        require 'bp_config/includes/templates/headers/header' . $pageConfig['header_template'] . '.php';
    }
    ?>

    <script type="text/javascript">
        $(function() {
            // var total = sessionStorage.getItem('cartTotal');
            // var qty = sessionStorage.getItem('qty');
            // console.log(qty);
            // // $('#cart_amt').html(total);
            // $('#cart_qty').html(qty);
            var productCart = [];
            var tot_pdt_count = <?= $generalConfig['product_count'] ?>;
            for (i = 1; i <= tot_pdt_count; i++) { //total pdt count

                var shoppingCart = JSON.parse(sessionStorage.getItem('product-' + i));
                var cartpdtTotal = productCart.push(shoppingCart);

            }
            //console.log(productCart);
            var cartPdtArrNew = productCart.filter(function(el) {
                return el != null && el != "";
            });

            console.log(cartPdtArrNew);
            sessionStorage.setItem("cartPdtArr", JSON.stringify(cartPdtArrNew));

            let table = document.getElementById("minicartRow");

            //let table = '<thead><tr><th>id</th><th>name</th><th>age</th></tr></thead><tbody>';

            // let table = $('#cartRO');


            var TotalPrice = {};

            var showCartNumber = false;
            cartPdtArrNew.forEach(function(d) {
                if (d.EnableMaxqty > 1) {
                    showCartNumber = true;
                    return;
                }
            });

            cartPdtArrNew.forEach(function(d) {
                if (d.billModel == '2' || d.billModel == '8') {
                    <?php if ($showTrialContinuityVerbiage) { ?>
                        table += '<tr id="row-' + d.Id + '" data-product-id="' + d.Id + '" data-product-name="' + d.Name + '">'
                        table += '<td><img src="' + d.Image + '" class="img-fluid  mini-pdt-image" id="mini-image-' + d.Id + '"></td>';
                        table += '<td><p>' + d.Name + '</p><p class="cart_amount"><span class="cartNumber" id="cartNumber">' + (showCartNumber ? d.Qty : '') + '</span> X <span class="cartPrice" id="cartPrice">$' + d.trlPrice + '</span></p><p class="cart_amount" style="display:none;"> = <span class="cartTotal" id="cartTotal" data-total="' + (d.Qty * d.trlPrice) + '">$' + (d.Qty * d.trlPrice) + '</span></p></td>';
                        table += '<td><span class="material-icons close_button close-button" id="close-' + d.Id + '">close</span></td></tr>';
                    <?php } ?>
                } else {
                    table += '<tr id="row-' + d.Id + '" data-product-id="' + d.Id + '" data-product-name="' + d.Name + '">'
                    table += '<td><img src="' + d.Image + '" class="img-fluid  mini-pdt-image" id="mini-image-' + d.Id + '"></td>';
                    table += '<td><p>' + d.Name + '</p><p class="cart_amount"><span class="cartNumber" id="cartNumber">' + (showCartNumber ? d.Qty : '') + '</span> X <span class="cartPrice" id="cartPrice">$' + d.Price + '</span></p><p class="cart_amount" style="display:none;"> = <span class="cartTotal" id="cartTotal" data-total="' + d.Total + '">$' + d.Total + '</span></p></td>';
                    table += '<td><span class="material-icons close_button close-button" id="close-' + d.Id + '">close</span></td></tr>';
                }
            })

            $('#minicartRow').empty().html(table);

            var miniTotal = sessionStorage.getItem('cartTotal');

            $('.subtotalAmount').html(miniTotal);

            var total = 0;
            $('.cartTotal').each(function() {

                total += parseFloat($(this).data('total'), 10);
                //console.log($(this).attr('data-total'));
                //console.log(total)
                $('#subtotalAmount').html(total.toFixed(2));
                $('#cart_amt').html(total.toFixed(2));
            })

            var qtyCol = 0;
            $('.cartNumber').each(function() {

                qtyCol += parseFloat($(this).data('qty'), 10);
                $('#cart_qty').html(qtyCol);
            })
            $('.close-button').click(function() {

                console.log($(this).parents('tr').data('product-id'));

                sessionStorage.removeItem($(this).parents('tr').data('product-id'));

                var removeItem = $(this).parents('tr').data('product-id');

                var ar = sessionStorage.getItem("cartPdtArr");

                for (var i = 0; i < ar.length; i++) {
                    if (ar[i].Id == removeItem) {
                        ar.splice(i, 1);

                    }
                    if (sessionStorage.getItem('cartPdtArrNew') == '[]' || sessionStorage.getItem('cartPdtArrNew') == '') {
                        $('.subtotalAmount').html('0.00');
                        $('#cart_amt').html('0.00');
                        $('.bag_icon').removeClass('active');
                    }
                }
                location.reload(true);
                //            $('#cart_amt').html(total);
                // $('#cart_qty').html(qty);
                // $('.subtotalAmount').html(total);
            })

            if (sessionStorage.getItem('cartPdtArr') == '[]' || sessionStorage.getItem('cartPdtArr') == '') {
                //alert('hello');
                $('#minicartRow')
                    .empty()
                    .html('<tr class="emptyRow"><td colspan="3"><p class="cart_empty">Cart is Empty</p></td></tr>');
                $('#cart_amt').html('0.00');
                $('#cart_qty').html('0');
                $('.subtotalAmount').html('0.00');
                $('.cart_bag').addClass('empty_bag');
                $('.bag_icon').removeClass('active');

            }
        })
    </script>

    <?php
    if (file_exists('bp_config/includes/templates/checkout_page_templates/checkout_page' . $pageConfig['checkout_page'] . '.php')) {
        require 'bp_config/includes/templates/checkout_page_templates/checkout_page' . $pageConfig['checkout_page'] . '.php';
    }
    ?>


    <!-- New Error Popup Modal -->
    <div class="popup-bg-overly" id="error_modal">
        <div class="modal1">
            <img src="./img/alert.png" width="44" height="38" />
            <span class="title">Oh snap!</span>
            <span class="mb-2">Error has occured while submitting your request.</span>
            <p class="errors-here" id="error_pop">
            </p>
            <div class="button">Dismiss</div>
        </div>
    </div>
    <script>
        $('.button').bind('click', function() {
            $('.popup-bg-overly').fadeOut();
        });
    </script>
    <!-- New Error Popup Modal -->

    <?php
    if (file_exists('bp_config/includes/templates/footer/footer' . $pageConfig['footer_template'] . '.php')) {
        require 'bp_config/includes/templates/footer/footer' . $pageConfig['footer_template'] . '.php';
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {

            var cartPdtArr = [];
            //var cartItems = {} = JSON.parse(sessionStorage.getItem('cart'));
            //var prevItems = {} = JSON.parse(sessionStorage.getItem('prev_added_pdts'));
            var tot_pdt_count = <?= $generalConfig['product_count'] ?>;
            for (i = 1; i <= tot_pdt_count; i++) { //total pdt count
                var cartpdt = JSON.parse(sessionStorage.getItem('product-' + i));
                var cartpdtTotal = cartPdtArr.push(cartpdt);
                // console.log(cartPdtArr.length);
            }

            var cartPdtArrNew = cartPdtArr.filter(function(el) {
                return el != null && el != "";
            });

            //var cartPdtAA = JSON.stringify(cartPdtArrNew);
            //console.log(cartPdtArrNew);
            sessionStorage.setItem("cartPdtArr", JSON.stringify(cartPdtArr));

            sessionStorage.setItem("cartPdtArrNew", JSON.stringify(cartPdtArrNew));

            let table = "";

            var Total = {};

            var showQtyColumn = false;
            cartPdtArrNew.forEach(function(d) {
                if (d.EnableMaxqty > 1) {
                    showQtyColumn = true;
                    $('#qty-column-header').removeClass('d-none');
                    return;
                }
            });

            var products = [];

            cartPdtArrNew.forEach(function(d) {
                products.push({
                    StickyId: d.StickyId,
                    quantity: d.Qty,
                    price: d.Price
                });

                if (d.Saletype == 1) {
                    var category = "<?= $generalConfig['naming_convention']['1'] ?>";
                }
                <?php if ($showTrialContinuityVerbiage) { ?>
                    else if (d.Saletype == 2) {
                        var category = "<?= $generalConfig['naming_convention']['2'] ?>";
                    } else if (d.Saletype == 3) {
                        var category = "<?= $generalConfig['naming_convention']['3'] ?>";
                    }
                <?php } ?>
                if (d.billModel == '2' || d.billModel == '8') {
                    <?php if ($showTrialContinuityVerbiage) { ?>
                        table += '<tr id="row-' + d.Id + '" data-product-id="' + d.Id + '" data-product-sticky-id="' + d.StickyId + '" data-product-name="' + d.Name + '" data-price="' + d.trlPrice + '" data-total="' + (d.trlPrice * d.Qty + d.Trlship * 1) + '" class="pdt_row" data-image="' + d.Image + '" data-qty="' + d.Qty + '">';
                        // table += '<td>&nbsp;</td>';
                        table += '<td><img src="' + d.Image + '" class="img-fluid cart-pdt-image" id="image-' + d.Id + '"></td>';
                        table += '<td colspan="3">' + d.Name + '</td>';
                        <?php if ($pageConfig['showBillingColumnCheckoutPage'] == "yes") { ?>
                            table += '<td style="text-align:center;" id="category-' + d.billModel + '" class="categoryCol" data-cat="' + d.billModel + '">' + category + '</td>';
                        <?php    }  ?>
                        table += '<td style="text-align:center;" id="price-' + d.Id + '" class="priceCol" data-price="' + d.trlPrice + '">$' + d.trlPrice + '</td>';
                        <?php if ($pageConfig['displayShippingPrice'] == "yes") { ?>
                            table += '<td style="text-align:center;" id="shipping-' + d.Id + '" data-ship="' + d.Trlship + '">$' + d.Trlship + '</td>';
                        <?php } ?>
                        table += '<td style="text-align:center;" id="total-' + d.Id + '" class="totalCol" data-total="' + (d.trlPrice * d.Qty + d.Trlship * 1) + '">$' + (d.trlPrice * d.Qty + d.Trlship * 1).toFixed(2) + '</td>';
                        table += showQtyColumn ? ('<td style="text-align:center;" id="qty-' + d.Id + '" class="qtyCol" data-qty="' + d.Qty + '"><span class="qty" value="' + d.Qty + '" id="qty-' + d.Id + '" readonly="">' + d.Qty + '</span></td>') : '';
                        table += '</tr>';
                    <?php } ?>
                } else {
                    table += '<tr id="row-' + d.Id + '" data-product-id="' + d.Id + '" data-product-sticky-id="' + d.StickyId + '" data-product-name="' + d.Name + '" data-price="' + d.price + '" data-total="' + (d.Price * d.Qty + d.Ship * 1) + '" class="pdt_row" data-image="' + d.Image + '" data-qty="' + d.Qty + '">';
                    // table += '<td>&nbsp;</td>';
                    table += '<td><img src="' + d.Image + '" class="img-fluid cart-pdt-image" id="image-' + d.Id + '"></td>';
                    table += '<td colspan="3">' + d.Name + '</td>';
                    <?php if ($pageConfig['showBillingColumnCheckoutPage'] == "yes") { ?>
                        table += '<td style="text-align:center;" id="category-' + d.billModel + '" class="categoryCol" data-cat="' + d.billModel + '">' + category + '</td>';
                    <?php    }  ?>
                    table += '<td style="text-align:center;" id="price-' + d.Id + '" class="priceCol" data-price="' + d.Price + '">$' + d.Price + '</td>';
                    <?php if ($pageConfig['displayShippingPrice'] == "yes") { ?>
                        table += '<td style="text-align:center;" id="shipping-' + d.Id + '" data-ship="' + d.Ship + '">$' + d.Ship + '</td>';
                    <?php } ?>
                    table += '<td style="text-align:center;" id="total-' + d.Id + '" class="totalCol" data-total="' + (d.Price * d.Qty + d.Ship * 1) + '">$' + (d.Price * d.Qty + d.Ship * 1).toFixed(2) + '</td>';
                    table += showQtyColumn ? ('<td style="text-align:center;" id="qty-' + d.Id + '" class="qtyCol" data-qty="' + d.Qty + '"><span class="qty" value="' + d.Qty + '" id="qty-' + d.Id + '" readonly="">' + d.Qty + '</span></td>') : '';
                    table += '</tr>';
                }
            })

            $('#cartRow').empty().html(table);
            $(".checkout-page2 #cartRow td:nth-child(3)").prepend("Subtotal: ");
            <?php if ($pageConfig['displayShippingPrice'] == "yes") { ?>
                $(".checkout-page2 #cartRow td:nth-child(4)").prepend("Shipping: ");
            <?php } ?>
            $(".checkout-page2 #total-cost tr:last-child td:nth-child(2)").prepend('<span class="usd">USD</span>');
            $('#products').val(JSON.stringify(products));

            if (sessionStorage.getItem('cartPdtArrNew') == '[]' || sessionStorage.getItem('cartPdtArrNew') == '') {
                //alert('hello');
                $('#cartRow')
                    .empty()
                    .html('<tr class="emptyRow"><td colspan="8"><p class="cart_empty">Cart is Empty</p></td></tr>');
                sessionStorage.removeItem('cartTotal');
                sessionStorage.removeItem('prev_added_pdts');
                sessionStorage.removeItem('shipping');
                sessionStorage.removeItem('subTotal');
                sessionStorage.removeItem('cartPdtArr');
                // sessionStorage.removeItem('cart');
                sessionStorage.removeItem('qty');

                $('.bag_icon').removeClass('active');
                //$('#prodTerms').hide();


            }

            var SubTotal = sessionStorage.getItem('subTotal');
            var cartTotal = sessionStorage.getItem('cartTotal');
            var shipping = sessionStorage.getItem('shipping');

            $('#product_subtotal').val(SubTotal).html(SubTotal);
            $('#shipping_subtotal').val(shipping).html(shipping);
            $('#final_price').val(cartTotal).html(cartTotal);

            if (<?php echo $pageConfig['checkout_page'] ?> != 2) {
                console.log("Checkout1");
                $('#btnPlaceOrder').click(function() {

                    var errors = new Array();
                    var sub_total = sessionStorage.getItem('subTotal');
                    //console.log(maximum_ticket_value);
                    var maximum_ticket_value = <?php echo $generalConfig['maximum_ticket_value'] ?>;
                    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    // var formData = $("#order_form").serialize();
                    var firstName = $('#firstName').val();
                    var lastName = $('#lastName').val();
                    var shippingAddress1 = $('#shippingAddress1').val();
                    var shippingCity = $('#shippingCity').val();
                    var shippingCountry = $('#shippingCountry').val();
                    var shipping_state = $('#shipping_state').val();
                    var shippingZip = $('#shippingZip').val();
                    var phone = $('#phone').val();
                    var email = $('#email').val();
                    var orderNotes = $('#order-notes').val();
                    var cc_no = $('#cc_no').val();
                    var cc_month = $('#cc_month').val();
                    var cc_year = $('#cc_year').val();
                    var cvv = $('#cvv').val();

                    let userData = {
                        firstName: firstName,
                        lastName: lastName,
                        phone: phone,
                        email: email
                    };
                    sessionStorage.setItem('userData', JSON.stringify(userData));

                    if (sub_total > maximum_ticket_value) {
                        errors.push('The maximum ticket is $' + maximum_ticket_value + '<br>');
                    }
                    if (firstName == '') {
                        errors.push('Please enter your first name<br>');
                        // return false;
                    }
                    if (lastName == '') {
                        errors.push('Please enter your last name<br>');
                        // return false;
                    }
                    if (shippingAddress1 == '') {
                        errors.push('Please enter your shipping address<br>');
                        // return false;
                    }
                    if (shippingCity == '') {
                        errors.push('Please enter your shiping city<br>');
                        // return false;
                    }
                    if (shippingCountry == '') {
                        errors.push('Please enter your shipping country<br>');
                        // return false;
                    }
                    if (shipping_state == '') {
                        errors.push('Please enter your shipping state<br>');
                        // return false;
                    }
                    if (shippingZip == '') {
                        errors.push('Please enter your shipping zip<br>');
                        // return false;
                    }
                    if (phone == '') {
                        errors.push('Please enter your phone number<br>');
                        // return false;
                    }
                    // if (email  == '') {
                    //     errors.push('Please enter your email<br>');
                    //     // return false;
                    // }

                    if (!regex.test(email) || email == '') {
                        errors.push('Please enter valid email<br>');
                    }
                    if (cc_no == '') {
                        errors.push('Please enter your credit card number<br>');
                        // return false;
                    }
                    if (cc_month == '') {
                        errors.push('Please enter your credit card month<br>');
                        // return false;
                    }
                    if (cc_year == '') {
                        errors.push('Please enter your credit card year<br>');
                        // return false;
                    }
                    if (cvv == '') {
                        errors.push('Please enter your CVV<br>');
                        // return false;
                    }

                    //showing or not showing checkoutpage Total price agree terms based on site-info file's require_generic_text_terms key
                    var require_generic_text_terms = "<?php echo $pageConfig['checkoutPage']['require_generic_text_terms']; ?>";
                    if (require_generic_text_terms == "yes") {
                        if ($('#iagree').prop("checked") == false) {
                            errors.push('Please agree to the terms and conditions<br>');
                        }
                    }

                    //showing or not showing checkoutpage prod agree terms based on site-info file's require_product_terms key

                    var checkoutPage_prod_terms = "<?php echo $pageConfig['checkoutPage']['require_product_terms']; ?>";
                    if (checkoutPage_prod_terms == "yes") {
                        cartPdtArrNew.forEach(function(b) {
                            if (b.Saletype == 1 && $('.ss_agree-' + b.Id).is(":checked") == false) {
                                errors.push('Please agree to the ' + b.Name + ' terms');
                            }
                            <?php if ($showTrialContinuityVerbiage) { ?>
                                if (b.Saletype == 2 && $('.trial_agree-' + b.Id).is(":checked") == false) {
                                    errors.push('Please agree to the ' + b.Name + ' terms');
                                }
                                if (b.Saletype == 3 && $('.cont_agree-' + b.Id).is(":checked") == false) {
                                    errors.push('Please agree to the ' + b.Name + ' terms');
                                }
                            <?php } ?>
                        });
                    }

                    //showing or not showing checkoutpage prod agree terms based on site-info file's require_total_price_terms key
                    var require_total_price_terms = "<?php echo $pageConfig['checkoutPage']['require_total_price_terms']; ?>";
                    if (require_total_price_terms == "yes") {
                        if ($(".total_agree").prop('checked') == false) {
                            errors.push('Please agree to the Terms<br>');
                        }
                    }


                    // console.log(errors.length);
                    if (!sessionStorage.getItem('cartPdtArr')) {
                        $('#error_modal').show(function() {
                            $('#error_pop').html("");
                            $('#error_pop').append(
                                '<div class="alert alert-danger d-flex align-items-center justify-content-start my-2" role="alert">' +
                                '<i class="fas fa-times me-2"></i>' +
                                '<p class="error-msg p-0 m-0">' +
                                "Cart is Empty. Please add a product to continue" +
                                '</p>' +
                                '</div>'
                            );
                        });
                        return false;
                    }
                    if (errors.length == 0) {
                        $('#loadingMask').show();
                        $('#order_form').submit();
                    } else {
                        $('#error_modal').show(function() {
                            $('#error_pop').html("");
                            errors.forEach((error) => {
                                $('#error_pop').append(
                                    '<div class="alert alert-danger d-flex align-items-center justify-content-start my-2" role="alert">' +
                                    '<i class="fas fa-times me-2"></i>' +
                                    '<p class="error-msg p-0 m-0">' +
                                    error +
                                    '</p>' +
                                    '</div>'
                                );
                            })
                        });
                        return false;
                    }
                })
            }

        });

        function popop_cvv() {
            $('#cvv-img').slideToggle();
        }
    </script>
    <?php
    $dynamicFont = __DIR__ . DIRECTORY_SEPARATOR . 'bp_config' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'fonts.php';
    if (file_exists($dynamicFont)) {
        require_once $dynamicFont;
    }
    ?>
    <?php
    $dynamicColors = __DIR__ . DIRECTORY_SEPARATOR . 'bp_config' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'colors.php';
    if (file_exists($dynamicColors)) {
        require_once $dynamicColors;
    }
    ?>
    <script>
        $(document).ready(function() {
            $('#loadingMask').fadeOut();
        });
    </script>
</body>

</html>