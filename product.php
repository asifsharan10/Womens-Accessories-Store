<?php
error_reporting(0);
$configFilePath = __DIR__ . DIRECTORY_SEPARATOR . 'bp_config' . DIRECTORY_SEPARATOR . 'site-info.php';
if (file_exists($configFilePath)) {
    require_once $configFilePath;
} else {
    echo 'General configuration error';
}
if (!array_key_exists("HTTP_REFERER", $_SERVER)) {
    header("Location:shop.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $generalConfig['brand_name'] ?></title>
    <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/bootstrap.min.css?v=<?= time() ?>">
    <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/custom.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/style.css?v=<?= time() ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body>
    <div id="loadingMask" style="width: 100%; height: 100%; position: fixed; background: #fff; z-index:99999999999;">
        <div>
            <img src="./img/loadingGif/<?= $pageConfig['loadingGif'] ?>.gif">
        </div>
    </div>
    <?php
    $thisProduct = null;
    $showTrialContinuityVerbiage = false;
    $subtotalPrice;
    foreach ($products as $product) {
        if ($product['status'] == 'active' && $product['billingModel'] != 1) {
            $showTrialContinuityVerbiage = true;
        }

        if ($product['id'] == $_GET['pro_id']) {
            $thisProduct = $product;

            switch ($thisProduct['billingModel']) {
                case '2':
                case '8':
                    $max_qty = $thisProduct['trialMaxqty'];
                    break;

                default:
                    $max_qty = $thisProduct['enableMaxqty'];
            }

            $options = $thisProduct['shop_option'];


            $subtotalPrice = $shippingPrice = 0;

            switch ($thisProduct['billingModel']) {
                case '1':
                    if ($thisProduct['straightSaleMultiPrice'] == "no") {
                        $subtotalPrice = sprintf("%0.2f", $thisProduct['ssPrice']);
                    }
                    if ($thisProduct['straightSaleMultiPrice'] == "yes") {
                        $subtotalPrice = sprintf("%0.2f", $thisProduct['shop_option']['shop_option1']['option_price']);
                    }
                    $shippingPrice = sprintf("%0.2f", $thisProduct['ssShipping']);
                    break;
                case '2':
                    $subtotalPrice = sprintf("%0.2f", $thisProduct['trialPrice']);
                    $shippingPrice = sprintf("%0.2f", $thisProduct['trialShipping']);
                    break;
                case '3':
                    $subtotalPrice = sprintf("%0.2f", $thisProduct['continuityPrice']);
                    $shippingPrice = sprintf("%0.2f", $thisProduct['continuityShipping']);
                    break;
                case '4':
                    $subtotalPrice = sprintf("%0.2f", $thisProduct['trialPrice']);
                    $shippingPrice = sprintf("%0.2f", $thisProduct['trialShipping']);
                    break;
                case '5':
                    if ($thisProduct['straightSaleMultiPrice'] == "no") {
                        $subtotalPrice = sprintf("%0.2f", $thisProduct['ssPrice']);
                    }
                    if ($thisProduct['straightSaleMultiPrice'] == "yes") {
                        $subtotalPrice = sprintf("%0.2f", $thisProduct['shop_option']['shop_option1']['option_price']);
                    }
                    $shippingPrice = sprintf("%0.2f", $thisProduct['ssShipping']);
                    break;
                case '6':
                    $subtotalPrice = sprintf("%0.2f", $thisProduct['trialPrice']);
                    $shippingPrice = sprintf("%0.2f", $thisProduct['trialShipping']);
                    break;
                case '7':
                    if ($thisProduct['straightSaleMultiPrice'] == "no") {
                        $subtotalPrice = sprintf("%0.2f", $thisProduct['ssPrice']);
                    }
                    if ($thisProduct['straightSaleMultiPrice'] == "yes") {
                        $subtotalPrice = sprintf("%0.2f", $thisProduct['shop_option']['shop_option1']['option_price']);
                    }
                    $shippingPrice = sprintf("%0.2f", $thisProduct['ssShipping']);
                    break;
            }
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
    if (file_exists('bp_config/includes/templates/product_page_templates/product_page' . $pageConfig['product_page'] . '.php')) {
        require 'bp_config/includes/templates/product_page_templates/product_page' . $pageConfig['product_page'] . '.php';
    }
    ?>

    <?php
    if (file_exists('bp_config/includes/templates/related_products_templates/related_products' . $pageConfig['relatedProducts_section'] . '.php')) {
        require 'bp_config/includes/templates/related_products_templates/related_products' . $pageConfig['relatedProducts_section'] . '.php';
    }
    ?>


    <?php
    if (file_exists('bp_config/includes/templates/footer/footer' . $pageConfig['footer_template'] . '.php')) {
        require 'bp_config/includes/templates/footer/footer' . $pageConfig['footer_template'] . '.php';
    }
    ?>
    <!-- <p id="loading-indicator" data-before="Product is already added in cart" style="display:none;"></p> -->

    <!-- <div class="popup-overlay fancybox-popup" id="fancybox-popup" style="display: none;">
            <div class="popup-inner">
               <h4>
                  Product is Already Added in The Cart
               </h4>
               <p style="margin-bottom:0;"><a href="javascript:void(0);" class="btn btn-update shop-btn-color" style="max-width: 200px;width: 100%;" id="same_product_pop">Okay</a></p>
            </div>
       </div> -->

    <!-- New Error Popup Modal -->
    <div class="popup-bg-overly" id="error_modal">
        <div class="modal1">
            <img src="./img/alert-yellow.png" width="44" height="44" />
            <span class="title">Oh snap!</span>
            <span class="mb-2">Seems like there is a problem.</span>
            <p class="errors-here" id="error_pop">
                Product is Already Added in The Cart
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


    <!-- LightBox Modal Start-->
    <div class="modal fade" id="img-lightbox" tabindex="-1" aria-labelledby="img-lightbox" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img id="lightbox-img-link" src="./img/hero_product.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- LightBox Modal End-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- new adding for dropdown -->
    <script type="text/javascript">
        $(document).ready(function() {
            var options = [];

            <?php foreach ($options as $option) { ?>
                options[<?= $option['option_quantity']; ?>] = <?= $option['option_price']; ?>;
            <?php } ?>

            var bill_model = sessionStorage.getItem("data_product_billing_model");
            var sale_type = sessionStorage.getItem("data_sale_type");
            var multiPrice = sessionStorage.getItem('data_product_MultiPrice');
            var prod_id = sessionStorage.getItem('data_product');
            // sessionStorage.setItem('data_product_type', 1);
            // fetch pricing for ss dropdown and pass it to the next page
            if (bill_model == 1 && multiPrice == 'yes') {
                // var quant = $(".select-qty").find('option:eq(0)').val();
                setTimeout(function() {
                    var quant = $(".select-qty").find('option:eq(0)').val();
                    sessionStorage.setItem('data_product_type', quant);
                }, 1000); //Time before execution

                $(".qty-select").click(function() {
                    var quant = $(".select-qty").val();
                    $(".select-qty").change(function() {
                        // alert('changes');
                        var quant = $(this).val();
                        console.log('qty: ' + quant);
                        sessionStorage.setItem('data_product_type', quant);

                        for (var option_key in options) {
                            if (option_key == quant) {
                                $('#subtotal_price').text(options[option_key].toFixed(2));
                                $('#single_pdt_price').text(($('#subtotal_price').text() * 1 + $('#shipping_price').text() * 1).toFixed(2));
                                sessionStorage.setItem('data_product_price', options[option_key]);
                                sessionStorage.setItem('data_total_price', options[option_key]);
                            }
                        }
                    });
                });
                var quant = $(".select-qty").val();
                for (var option_key in options) {
                    if (option_key == quant) {
                        $('#subtotal_price').text(options[option_key].toFixed(2));
                        $('#single_pdt_price').text(($('#subtotal_price').text() * 1 + $('#shipping_price').text() * 1).toFixed(2));
                        sessionStorage.setItem('data_product_price', options[option_key]);
                        sessionStorage.setItem('data_total_price', options[option_key]);
                    }
                }
            }
            if (bill_model == 1 && multiPrice == 'no') {
                var subPrice1 = $('#subtotal_price').text() * 1;
                var shipPrice1 = $('#shipping_price').text() * 1;
                sessionStorage.setItem('data_product_price', subPrice1);
                sessionStorage.setItem('data_total_price', subPrice1 + shipPrice1);
            }

            priceFixesAccordingToBilling();

            $(".selectbox").change(priceFixesAccordingToBilling);

            function priceFixesAccordingToBilling() {
                // Run Preloader
                $('#loadingMask').fadeIn();

                if (bill_model == 4 || bill_model == 5 || bill_model == 6 || bill_model == 7) {
                    var alo1;
                    sale_type = sessionStorage.getItem("data_sale_type");
                    var subtotal = $('span#subtotal_price').html();
                    var shipping = $('span#shipping_price').html();
                    var total = $('span#single_pdt_price').html();
                    sessionStorage.setItem("data_product_price", subtotal);
                    sessionStorage.setItem("data_product_shipping", shipping);
                    sessionStorage.setItem("data_total_price", total);

                    sale_type = parseInt(sale_type);
                    if (sale_type == 1 && multiPrice == 'yes') {
                        console.log('Working like charm');
                        // $(".qty-select").click(function() {
                        setTimeout(function() {
                            var quant = $(".select-qty").find('option:eq(0)').val();
                            sessionStorage.setItem('data_product_type', quant);
                            $(".qty-select").click(function() {
                                var quant = $(".select-qty").val();
                                $(".select-qty").change(function() {
                                    console.log('Value Changed');
                                    var quant = $(this).val();
                                    console.log('qty: ' + quant);
                                    sessionStorage.setItem('data_product_type', quant);

                                    for (var option_key in options) {
                                        if (option_key == quant) {
                                            $('#subtotal_price').text(options[option_key].toFixed(2));
                                            $('#single_pdt_price').text(($('#subtotal_price').text() * 1 + $('#shipping_price').text() * 1).toFixed(2));
                                            sessionStorage.setItem('data_product_price', options[option_key]);
                                            sessionStorage.setItem('data_total_price', options[option_key]);
                                        }
                                    }
                                });
                            });
                        }, 1000); //Time before execution

                    } else {
                        sessionStorage.setItem('data_product_type', '');
                    }
                } else {
                    sessionStorage.setItem('data_product_type', '');
                }
                $('#loadingMask').fadeOut();
            }
            //enable & disble qty in product & cart page depend on enableMaxqty key
            var max_qty = <?= $max_qty; ?>;

            sessionStorage.setItem('data_product_enableMaxqty', max_qty);
            if (max_qty > 1) {
                // alert('hello');
                $('#select-qty-text').css('display', 'block');
                $('.qty-col').css('display', 'flex');
                $(document).on('click', '#increase', function() {
                    var quant_val = $('.qty-value').val();
                    if (quant_val == max_qty) {
                        // $('.qty-col #decrease').css('display','none');
                        $('.qty-col #increase').prop("disabled", true);
                    }
                });
            }
        });
    </script>
    <script type="text/javascript">
        // GET THE SESSION VALUE AND PRINT THOSE
        $("#product_cat_main").val(sessionStorage.getItem("data_product_category"));
        document.getElementById("single_pdt_title").innerHTML = sessionStorage.getItem("data_product_title");
        // new condition for price
        var b_model = sessionStorage.getItem("data_product_billing_model");
        //document.getElementById("single_pdt_price").innerHTML = sessionStorage.getItem( "data_product_price" );

        document.getElementById("single_pdt_cat").innerHTML = sessionStorage.getItem("data_product_category");
        document.getElementById("single_pdt_category").innerHTML = sessionStorage.getItem("data_product_title");
        document.getElementById("single_pdt_link").innerHTML = sessionStorage.getItem("data_product_link");

        //QUANTITY INCREASE AND DECREASE
        $(function() {

            var b_model = sessionStorage.getItem("data_product_billing_model");
            var pdt_id = sessionStorage.getItem('data_product_id');

            if (b_model == 1) {
                $('#bill_model').html("<?= $generalConfig['naming_convention']['1'] ?>");
            }
            <?php if ($showTrialContinuityVerbiage) { ?>
                if (b_model == 2 || b_model == 8) {
                    $('#bill_model').html("<?= $generalConfig['naming_convention']['2'] ?>");
                }
                if (b_model == 3) {
                    $('#bill_model').html("<?= $generalConfig['naming_convention']['3'] ?>");
                }
            <?php } ?>

            if (b_model == 4) {
                $('#pdt_type').show();
                $('#bill_model').hide();
            }
            if (b_model == 5) {
                $('#pdt_type_5').show();
                $('#bill_model').hide();
            }
            if (b_model == 6) {
                $('#pdt_type6').show();
                $('#bill_model').hide();
            }
            if (b_model == 7) {
                $('#pdt_type7').show();
                $('#bill_model').hide();
            }

            var qtyValue = $('#qty').val();
            if (qtyValue == 1) {
                // $('#decrease').attr('disabled','disabled');
            }

            $('#increase').on('click', function() {

                var newqtyValueInc = ++qtyValue;
                $("#qty").val(newqtyValueInc);
                // $('.qty-value').val(newqtyValueInc);

                console.log(newqtyValueInc);
                var billmodel = sessionStorage.getItem("data_product_billing_model");
                $pdt_price = parseFloat(sessionStorage.getItem('data_product_price'));
                $pdt_qty = parseFloat(newqtyValueInc);

                $new_pdt_price = $pdt_price * $pdt_qty

                console.log($pdt_price);
                console.log($pdt_qty);
                console.log($new_pdt_price);

                sessionStorage.setItem('data_total_price', $new_pdt_price.toFixed(2));
                sessionStorage.setItem('data_pdt_qty', $pdt_qty);
                sessionStorage.setItem('data_product_billing_model', $b_model);
                // sessionStorage.setItem('qty' , $pdt_qty);

                $('#single_pdt_price').text($new_pdt_price.toFixed(2));

                // if(newqtyValueInc > 1){
                //     $('#decrease').removeAttr('disabled');
                // }

            });
            $('#decrease').on('click', function() {
                var newqtyValueDes = --qtyValue;

                $('#qty').val(newqtyValueDes);
                var billmodel = sessionStorage.getItem("data_product_billing_model");

                $tot_price = parseFloat(sessionStorage.getItem('data_total_price'));
                $pdt_price = parseFloat(sessionStorage.getItem('data_product_price'));

                $pdt_qty = parseFloat(newqtyValueDes);

                $new_pdt_price = $tot_price - $pdt_price;

                console.log($pdt_price);
                console.log($pdt_qty);
                console.log($new_pdt_price);

                sessionStorage.setItem('data_total_price', $new_pdt_price.toFixed(2));
                sessionStorage.setItem('data_pdt_qty', $pdt_qty);
                sessionStorage.setItem('data_product_billing_model', $b_model);
                //sessionStorage.setItem('qty' , $pdt_qty);

                $('#single_pdt_price').text($new_pdt_price.toFixed(2));



                // console.log(newqtyValueDes);
                if (newqtyValueDes == 1) {
                    $(this).attr('disabled', 'disabled');
                }

            });

            // if($('#qty').val() == '1'){
            //    $('#decrease').attr('disabled','disabled');
            // }else{
            //     $('#decrease').removeAttr('disabled','disabled');
            // }

        });

        // ADD TO CART FUNCTIONALITY
        var shoppingCart = [];

        function AddtoCart() {

            <?php if ($pageConfig['oneProductCartLimit'] == 'yes') { ?>

                for (i = 1; i <= <?= $generalConfig['product_count'] ?>; i++) {
                    if (sessionStorage.getItem('product-' + i)) {
                        sessionStorage.removeItem('product-' + i);
                    }
                }

            <?php } ?>

            var data_qty = document.getElementById("qty").value;
            sessionStorage.setItem('data_product_quantity', data_qty);
            var singleProduct = {};
            var bill_mod = sessionStorage.getItem("data_product_billing_model");

            //Fill the product object with data
            singleProduct.Id = sessionStorage.getItem("data_product_id");
            singleProduct.Image = sessionStorage.getItem("data_product_link");
            singleProduct.Saletype = sessionStorage.getItem("data_sale_type");
            singleProduct.SelectedSize = sessionStorage.getItem("data_product_selected_size");
            //new condition for diffrent type of products
            singleProduct.Price = sessionStorage.getItem("data_product_price");
            singleProduct.Ship = sessionStorage.getItem("data_product_shipping");
            singleProduct.Rbllprice = sessionStorage.getItem("data_product_rbllprice");
            <?php if ($showTrialContinuityVerbiage) { ?>
                singleProduct.trlPrice = $('#product-trl-price').val();
                singleProduct.Trlship = sessionStorage.getItem("data_product_trlshipping");
                singleProduct.trlRbllShippingPrice = $('#trl-rbll-shipping-price').val();
            <?php } ?>
            singleProduct.billModel = sessionStorage.getItem("data_product_billing_model");
            var prod_type = $('#qty_dropdown :selected').val(); //sessionStorage.getItem( "data_product_type" );
            var selected_size = sessionStorage.getItem("data_product_selected_size");
            if ((prod_type == '' && selected_size == '') || bill_mod == 2 || bill_mod == 8) {
                var pickedSize = $('input[name=prod-sizes]:checked').val();
                singleProduct.Name = sessionStorage.getItem("data_product_title") + ' ' + (pickedSize ? '- ' + pickedSize : '(1)');
            } else if (prod_type != '' && selected_size == '') {
                singleProduct.Name = sessionStorage.getItem("data_product_title") + (prod_type ? ' (' + prod_type + ')' : ' (1)');
            } else if (prod_type == '' && selected_size != '') {
                singleProduct.Name = sessionStorage.getItem("data_product_title") + ' - ' + sessionStorage.getItem("data_product_selected_size");
            } else if (prod_type != '' && selected_size != '') {
                singleProduct.Name = sessionStorage.getItem("data_product_title") + ' (' + prod_type + ') -' + sessionStorage.getItem("data_product_selected_size");
            }
            singleProduct.Alias = sessionStorage.getItem("data_product_alias");
            singleProduct.Qty = sessionStorage.getItem("data_product_quantity");
            singleProduct.Type = prod_type;
            singleProduct.Total = sessionStorage.getItem("data_total_price");
            singleProduct.Multiprice = sessionStorage.getItem("data_product_MultiPrice");
            singleProduct.EnableMaxqty = sessionStorage.getItem("data_product_enableMaxqty");
            singleProduct.StickyId = $('#product-sticky-id').val();


            var flag = 0;
            var productCart = [];
            var tot_pdt_count = <?= $generalConfig['product_count'] ?>;
            for (i = 1; i <= tot_pdt_count; i++) { //total pdt count

                var shopCart = JSON.parse(sessionStorage.getItem('product-' + i));
                productCart.push(shopCart);

            }
            //console.log(productCart);
            var cartPdtArrNew = productCart.filter(function(el) {
                return el != null && el != "";
            });

            cartPdtArrNew.forEach(function(d) {
                if (d.Id == singleProduct.Id) {
                    flag = flag + 1;
                    // alert("Product is already added in cart");
                    return null;
                }

            })

            if (flag == 0) {
                shoppingCart.push(singleProduct);
                // shoppingCart.push(singleProduct);
                //sessionStorage.setItem('shoppingCart'+singleProduct.Id, JSON.stringify(shoppingCart));
                sessionStorage.setItem(singleProduct.Id, JSON.stringify(singleProduct));

                window.location = 'cart.php';
            } else {
                //alert("Product is already added in cart");

                //   $('#fancybox-popup').show();
                //   $('#same_product_pop').click(function(){
                //       $('#fancybox-popup').hide();
                //   })
                $('#error_modal').show(function() {
                    $('#error_pop').html("");
                    $('#error_pop').append(
                        '<div class="alert alert-warning d-flex align-items-center justify-content-start my-2" role="alert">' +
                        '<i class="fas fa-times me-2"></i>' +
                        '<p class="error-msg p-0 m-0">' +
                        "Product is Already Added in The Cart" +
                        '</p>' +
                        '</div>'
                    );
                });
                // setTimeout(function(){
                //       $('#fancybox-popup').hide();
                //    },5000);
            }



            //Add newly created product to our shopping cart



        }
    </script>
    <script type="text/javascript" src="<?= $path['js']; ?>/include/product3.js"></script>

    <!-- if dropdown class is present in page, then remove plus minus feature -->
    <script type="text/javascript">
        if ($(".qty-select")[0]) {
            //$(".qty-col").css('display','none');
        } else {
            // Do something if class does not exist
        }

        //showing proper image in product page
        $(document).ready(function() {
            var pdt_image = sessionStorage.getItem("data_product_link");
            $('#single_pdt_link').attr('src', pdt_image);
            $('#lightbox-img-link').attr('src', pdt_image);
        });
        // disable decrease button
        $(document).on('click', '#increase', function() {
            var quant_val = $('.qty-value').val();
            if (quant_val > 1) {
                // $('.qty-col #decrease').css('display','none');
                $('#decrease').removeAttr('disabled');
            }
        });
        // disable increase button
        $(document).on('click', '#decrease', function() {
            $('.qty-col #increase').removeAttr('disabled');
            var quant_val = $('.qty-value').val();
            if (quant_val < 2) {
                // $('.qty-col #decrease').css('display','none');
                $('#decrease').prop('disabled', true);
            }
        });

        $(document).ready(function() {
            $('#loadingMask').fadeOut();
        });
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

</body>

</html>