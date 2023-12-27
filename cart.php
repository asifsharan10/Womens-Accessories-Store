<?php
error_reporting(0);
$configFilePath = __DIR__ . DIRECTORY_SEPARATOR . 'bp_config' . DIRECTORY_SEPARATOR . 'site-info.php';
if (file_exists($configFilePath)) {
   require_once $configFilePath;
} else {
   echo 'General configuration error';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title><?= $generalConfig['brand_name'] ?></title>
   <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <!-- Fonts -->
   <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/bootstrap.min.css?v=<?= time() ?>">
   <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/custom.css?v=<?= time() ?>">
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

   <div id="cart-page">
      <?php
      if (file_exists('bp_config/includes/templates/cart_page_templates/cart_page' . $pageConfig['cart_page'] . '.php')) {
         require 'bp_config/includes/templates/cart_page_templates/cart_page' . $pageConfig['cart_page'] . '.php';
      }
      ?>
   </div>

   <p id="loading-indicator" data-before="Processing, one moment please..." style="display:none;"></p>



   <?php
   if (file_exists('bp_config/includes/templates/footer/footer' . $pageConfig['footer_template'] . '.php')) {
      require 'bp_config/includes/templates/footer/footer' . $pageConfig['footer_template'] . '.php';
   }
   ?>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
   <script type="text/javascript">
      $(function() {
         var total = sessionStorage.getItem('cartTotal');
         var qty = sessionStorage.getItem('qty');
         $('#cart_qty').html(qty);

         var productCart = [];
         var tot_pdt_count = <?= $generalConfig['product_count'] ?>;
         for (i = 1; i <= tot_pdt_count; i++) { //total pdt count

            var shoppingCart = JSON.parse(sessionStorage.getItem('product-' + i));
            productCart.push(shoppingCart);

         }
         //console.log(productCart);
         var cartPdtArrNew = productCart.filter(function(el) {
            return el != null && el != "";
         });

         //console.log(cartPdtArrNew);
         sessionStorage.setItem("cartPdtArr", JSON.stringify(cartPdtArrNew));

         let table = document.getElementById("product_row");

         var TotalPrice = {};

         var showQtyColumn = false;
         cartPdtArrNew.forEach(function(d) {
            if (d.EnableMaxqty > 1) {
               showQtyColumn = true;
               $('#qty-column-header').removeClass('d-none');
               return;
            }
         });

         cartPdtArrNew.forEach(function(d) {
            if (d.billModel == '2' || d.billModel == '8') {
               <?php if ($showTrialContinuityVerbiage) { ?>
                  console.log(d);
                  table += '<tr id="row-' + d.Id + '" data-product-id="' + d.Id + '" data-product-sticky-id="' + d.StickyId + '" data-product-name="' + d.Name + '" data-price="' + d.trlPrice + '" data-ship="' + d.Trlship + '" data-total="' + (d.trlPrice * d.Qty + d.Trlship * 1) + '" class="pdt_row" data-image="' + d.Image + '" data-qty="' + d.Qty + '" data-multiprice="' + d.Multiprice + '" data-billmodel="' + d.billModel + ' "data-sale-type="' + d.Saletype + '" data-type="' + (d.Type != 0 ? d.Type : '') + '"  data-enableMaxqty="' + d.EnableMaxqty + '">';
                  table += '<td><span class="material-icons close_button close-button" id="close-' + d.Id + '">close</span></td>';
                  table += '<td><img src="' + d.Image + '" class="img-fluid cart-pdt-image" id="image-' + d.Id + '"></td>';
                  table += '<td colspan="3" id="singlepdt">' + d.Name + '</td>';
                  table += '<td id="price-' + d.Id + '" class="priceCol" data-ship="' + d.Trlship + '" data-price="' + d.trlPrice + '">$' + d.trlPrice + '</td>';
                  <?php if ($pageConfig['displayShippingPrice'] == "yes") { ?>
                     table += '<td id="shipping-' + d.Id + '" data-ship="' + d.Trlship + '">$' + d.Trlship + '</td>';
                  <?php } ?>
                  table += '<td id="total-' + d.Id + '" class="totalCol" data-ship="' + d.Trlship + '" data-total="' + (d.trlPrice * d.Qty + d.Trlship * 1) + '">$' + (d.trlPrice * d.Qty + d.Trlship * 1).toFixed(2) + '</td>';
                  table += showQtyColumn ? ('<td id="qty-' + d.Id + '" class="qtyCol" data-qty="' + d.Qty + '">' + d.Qty + '</td>') : '';
                  table += '</tr>';
               <?php } ?>
            } else {
               table += '<tr id="row-' + d.Id + '" data-product-id="' + d.Id + '" data-product-sticky-id="' + d.StickyId + '" data-product-name="' + d.Name + '" data-price="' + d.Price + '" data-ship="' + d.Ship + '" data-total="' + (d.Price * d.Qty + d.Ship * 1) + '" class="pdt_row" data-image="' + d.Image + '" data-qty="' + d.Qty + '" data-multiprice="' + d.Multiprice + '" data-billmodel="' + d.billModel + ' "data-sale-type="' + d.Saletype + '" data-type="' + (d.Type != 0 ? d.Type : '') + '"  data-enableMaxqty="' + d.EnableMaxqty + '">';
               table += '<td><span class="material-icons close_button close-button" id="close-' + d.Id + '">close</span></td>';
               table += '<td><img src="' + d.Image + '" class="img-fluid cart-pdt-image" id="image-' + d.Id + '"></td>';
               table += '<td colspan="3" id="singlepdt">' + d.Name + '</td>';
               table += '<td id="price-' + d.Id + '" class="priceCol" data-ship="' + d.Ship + '" data-price="' + d.Price + '">$' + d.Price + '</td>';
               <?php if ($pageConfig['displayShippingPrice'] == "yes") { ?>
                  table += '<td id="shipping-' + d.Id + '" data-ship="' + d.Ship + '">$' + d.Ship + '</td>';
               <?php } ?>
               table += '<td id="total-' + d.Id + '" class="totalCol" data-ship="' + d.Ship + '" data-total="' + (d.Price * d.Qty + d.Ship * 1) + '">$' + (d.Price * d.Qty + d.Ship * 1).toFixed(2) + '</td>';
               table += showQtyColumn ? ('<td id="qty-' + d.Id + '" class="qtyCol" data-qty="' + d.Qty + '">' + d.Qty + '</td>') : '';
               table += '</tr>';
            }
         })

         $('#product_row').empty().html(table);

         var subtotal = shipping = total = 0;
         $('.totalCol').each(function() {

            subtotal += $(this).data('total') - $(this).data('ship');
            shipping += $(this).data('ship') * 1;
            total += parseFloat($(this).data('total'), 10);

            //console.log($(this).attr('data-total'));
            //console.log(total.toFixed(2));

            $('#subtotal').html(subtotal.toFixed(2));
            $('#shipping').html(shipping.toFixed(2));
            $('#total').html(total.toFixed(2));

            sessionStorage.setItem("subTotal", subtotal.toFixed(2));
            sessionStorage.setItem("shipping", shipping.toFixed(2));
            sessionStorage.setItem("cartTotal", total.toFixed(2));
         })
         var qtyCol = 0;
         $('.qtyCol').each(function() {

            qtyCol += parseFloat($(this).data('qty'), 10);
            sessionStorage.setItem("qty", qtyCol);

            var qtyValue = $(this).find('.qty').val();
            if (qtyValue == 1) {
               $(this).find('.decrease').attr('disabled', 'disabled');
            } else {
               $(this).find('.decrease').removeAttr('disabled', 'disabled');
            }

         })

         $('#btnCheckout').click(function() {
            window.location = 'checkout.php';
         })
         // $('#btnCheckout').click(function(){

         //    var sub_total = sessionStorage.getItem('subTotal');
         //    //console.log(maximum_ticket_value);
         //    var maximum_ticket_value = <?php echo $generalConfig['maximum_ticket_value'] ?>;
         //    if(sub_total >= maximum_ticket_value){
         //       //alert("The maximum ticket is 500");

         //       $('#fancybox-popup').show();
         //       $('#max_ticket_pop').click(function(){
         //          $('#fancybox-popup').hide();
         //       })
         //       // setTimeout(function(){
         //       //       $('#fancybox-popup').hide();
         //       //    },5000);

         //    } 

         //    else{
         //       window.location = 'checkout.php';
         //    }

         // })

         $('.close-button').click(function() {

            //console.log($(this).parents('tr').data('product-id'));

            sessionStorage.removeItem($(this).parents('tr').data('product-id'));

            var removeItem = $(this).parents('tr').data('product-id');

            var ar = sessionStorage.getItem("cartPdtArr");

            for (var i = 0; i < ar.length; i++) {
               if (ar[i].Id == removeItem) {
                  ar.splice(i, 1);

               }
            }
            location.reload(true);
            $('#cart_amt').html(total.toFixed(2));
            $('#cart_qty').html(qty);
            $('.subtotalAmount').html(total.toFixed(2));
         })

         if (sessionStorage.getItem('cartPdtArr') == '[]' || sessionStorage.getItem('cartPdtArr') == '') {
            //alert('hello');
            $('#btnCheckout').attr('disabled', 'disabled');
            $('#product_row')
               .empty()
               .html('<tr class="emptyRow"><td colspan="8"><p class="cart_empty">Please add a product to the cart to view checkout</p></td></tr>');
            sessionStorage.removeItem('cartTotal');
            sessionStorage.removeItem('prev_added_pdts');
            sessionStorage.removeItem('shipping');
            sessionStorage.removeItem('subTotal');
            sessionStorage.removeItem('productCart');
            // sessionStorage.removeItem('cart');
            sessionStorage.removeItem('data_pdt_qty');
            sessionStorage.removeItem("data_product_category");
            sessionStorage.removeItem("data_product_title");
            sessionStorage.removeItem("data_product_description");
            sessionStorage.removeItem("data_product_price");
            sessionStorage.removeItem("data_product_id");
            sessionStorage.removeItem("data_product_link");
            sessionStorage.removeItem("data_total_price");
            sessionStorage.removeItem("data_product_quantity");
            sessionStorage.removeItem("qty");
            sessionStorage.removeItem("data_product_enableMaxqty");

            // $('#cart_amt').html('0.00');
            //    $('#cart_qty').html('0');

         }



         var cartItemsFinal = [];

         $('.increase').click(function() {
            var qtyValue = $(this).parents('.qty-col').find('.qty').val();
            if (qtyValue == 1) {
               $(this).parents('.qty-col').find('.decrease').attr('disabled', 'disabled');
            }
            var newqtyValueInc = ++qtyValue;
            $(this).parents('.qty-col').find('.qty').val(newqtyValueInc);
            //console.log(newqtyValueInc);

            $pdt_price = parseFloat($(this).parents('.pdt_row').find('.priceCol').data('price'));
            $pdt_ship = parseFloat($(this).parents('.pdt_row').find('.priceCol').data('ship'));
            //console.log($pdt_price);
            $pdt_qty = parseFloat(newqtyValueInc);
            //console.log($pdt_qty);

            $new_pdt_price = $pdt_price * $pdt_qty + $pdt_ship;
            //console.log($new_pdt_price);

            $(this).parents('.pdt_row').attr('data-qty', $pdt_qty);
            $(this).parents('.pdt_row').attr('data-total', $new_pdt_price.toFixed(2));
            $(this).parents('.pdt_row').find('.totalCol').attr('data-total', $new_pdt_price.toFixed(2)).html('$' + $new_pdt_price.toFixed(2));

            sessionStorage.setItem('new_total_price', $new_pdt_price.toFixed(2));
            sessionStorage.setItem('new_pdt_qty', $pdt_qty);


            var cartItems = {};


            cartItems.Id = $(this).parents('.pdt_row').attr('data-product-id');
            cartItems.StickyId = $(this).parents('.pdt_row').attr('data-product-sticky-id');
            cartItems.Image = $(this).parents('.pdt_row').attr('data-image');
            cartItems.Saletype = $(this).parents('.pdt_row').attr('data-sale-type');
            cartItems.Name = $(this).parents('.pdt_row').attr('data-product-name');
            cartItems.Alias = $(this).parents('.pdt_row').attr('data-product-alias');
            cartItems.Multiprice = $(this).parents('.pdt_row').attr('data-multiprice');
            cartItems.EnableMaxqty = $(this).parents('.pdt_row').attr('data-enablemaxqty');
            cartItems.Price = $(this).parents('.pdt_row').attr('data-price');
            // cartItems.Ship = sessionStorage.getItem( "data_product_shipping" );
            cartItems.Ship = $(this).parents('.pdt_row').attr('data-ship');
            cartItems.Rbllprice = sessionStorage.getItem("data_product_rbllprice");
            <?php if ($showTrialContinuityVerbiage) { ?>
               cartItems.Trlship = sessionStorage.getItem("data_product_trlshipping");
            <?php } ?>
            cartItems.billModel = sessionStorage.getItem("data_product_billing_model");
            cartItems.Qty = $(this).parents('.pdt_row').attr('data-qty');
            cartItems.Type = $(this).parents('.pdt_row').attr('data-type');
            cartItems.Total = $(this).parents('.pdt_row').attr('data-total');

            //console.log(cartItems);

            sessionStorage.setItem(cartItems.Id, JSON.stringify(cartItems));

            if (newqtyValueInc > 1) {
               $(this).parents('.qty-col').find('.decrease').removeAttr('disabled', 'disabled');
               //alert(newqtyValueInc);
            }

            cartUpdate();
         })

         $('.decrease').click(function() {
            $(this).siblings(".inc_button").css('display', 'block');
            var qtyValue = $(this).parents('.qty-col').find('.qty').val();
            // if(qtyValue == 1){
            //    $(this).attr('disabled','disabled');
            // }

            var newqtyValueDec = --qtyValue;
            $(this).parents('.qty-col').find('.qty').val(newqtyValueDec);
            //console.log(newqtyValueInc);

            $tot_price = parseFloat($(this).parents('.pdt_row').attr('data-total'));
            //console.log($tot_price);

            $pdt_price = parseFloat($(this).parents('.pdt_row').attr('data-price'));
            //console.log($pdt_price);

            $pdt_qty = parseFloat(newqtyValueDec);

            $new_pdt_price = $tot_price - $pdt_price;
            //console.log($new_pdt_price);

            $(this).parents('.pdt_row').attr('data-qty', $pdt_qty);
            $(this).parents('.pdt_row').attr('data-total', $new_pdt_price.toFixed(2));
            $(this).parents('.pdt_row').find('.totalCol').attr('data-total', $new_pdt_price.toFixed(2)).html('$' + $new_pdt_price.toFixed(2));

            sessionStorage.setItem('new_total_price', $new_pdt_price.toFixed(2));
            sessionStorage.setItem('new_pdt_qty', $pdt_qty);

            var cartItems = {};

            cartItems.Id = $(this).parents('.pdt_row').attr('data-product-id');
            cartItems.StickyIdId = $(this).parents('.pdt_row').attr('data-product-sticky-id');
            cartItems.Image = $(this).parents('.pdt_row').attr('data-image');
            cartItems.Saletype = $(this).parents('.pdt_row').attr('data-sale-type');
            cartItems.Name = $(this).parents('.pdt_row').attr('data-product-name');
            cartItems.Alias = $(this).parents('.pdt_row').attr('data-product-alias');
            cartItems.Multiprice = $(this).parents('.pdt_row').attr('data-multiprice');
            cartItems.EnableMaxqty = $(this).parents('.pdt_row').attr('data-enablemaxqty');
            cartItems.Price = $(this).parents('.pdt_row').attr('data-price');
            cartItems.Ship = $(this).parents('.pdt_row').attr('data-ship');
            cartItems.Rbllprice = sessionStorage.getItem("data_product_rbllprice");
            <?php if ($showTrialContinuityVerbiage) { ?>
               cartItems.Trlship = sessionStorage.getItem("data_product_trlshipping");
            <?php } ?>
            cartItems.billModel = sessionStorage.getItem("data_product_billing_model");
            cartItems.Qty = $(this).parents('.pdt_row').attr('data-qty');
            cartItems.Type = $(this).parents('.pdt_row').attr('data-type');
            cartItems.Total = $(this).parents('.pdt_row').attr('data-total');

            //console.log(cartItems);
            sessionStorage.setItem(cartItems.Id, JSON.stringify(cartItems));
            if (newqtyValueDec == 1) {
               $(this).attr('disabled', 'disabled');
            }

            cartUpdate();
         })

         function cartUpdate() {
            var productCart = [];
            var tot_pdt_count = <?= $generalConfig['product_count'] ?>;
            for (i = 1; i <= tot_pdt_count; i++) { //total pdt count

               var shoppingCart = JSON.parse(sessionStorage.getItem('product-' + i));
               productCart.push(shoppingCart);

            }
            //console.log(productCart);
            var cartPdtArrNew = productCart.filter(function(el) {
               return el != null && el != "";
            });
            sessionStorage.setItem("cartPdtArr", JSON.stringify(productCart));

            sessionStorage.setItem("cartPdtArrNew", JSON.stringify(cartPdtArrNew));

            $('#loading-indicator').show(function() {
               location.reload();
            }).delay(4000);

            $('.subtotalAmount').html(sessionStorage.getItem('subTotal'))
         }

         $('#cart_update').click(function() {
            cartUpdate();
         });




      });
   </script>
   <script type="text/javascript">
      //disable or remove plus minus button fromm cart page for multiprice products
      $(document).ready(function() {
         // setTimeout(function(){
         $('.table tbody tr.pdt_row').each(function() {
            var enablemaxqty = $(this).attr('data-enablemaxqty');
            if (enablemaxqty == 1) {
               // $(this).children().find(".inc_button").css('display', 'none');
               // $(this).children().find(".dec_button").css('display', 'none');
               // $(this).children().find("input.qty").css('margin-left', '45px');
               // $(this).children().find("input.qty").css('width', '80px');
               $(this).children().find(".inc_button").prop('disabled', true);
               $(this).children().find(".dec_button").prop('disabled', true);
            } else if (enablemaxqty > 1) {
               // $(this).children().find(".inc_button").css('display', 'block');
               // $(this).children().find(".dec_button").css('display', 'block');
               $(this).children().find(".inc_button").prop('disabled', false);
               $(this).children().find(".dec_button").prop('disabled', false);

               var quant_val = $(this).children().find(".inc_button").siblings('.qty').val();
               if (quant_val == 1) {
                  $(this).children().find(".dec_button").prop('disabled', true);
               }

               $(this).on('click', '.inc_button', function() {
                  var quant_val = $(this).siblings('.qty').val();
                  if (quant_val == enablemaxqty) {
                     // $(this).css('display','none');
                     $(this).prop('disabled', true);
                  } else {
                     // $(this).css('display','block');
                     $(this).prop('disabled', false);
                  }
               });
               // $(this).on('click','.dec_button', function (){
               //    // $(this).siblings(".inc_button").css('display','block');
               //    $(this).siblings(".inc_button").prop('disabled', false);
               // });
               $('.dec_button').click(function() {
                  $(this).siblings(".inc_button").prop('disabled', false);
               });
            }
            var quant_val = $(this).children().find('.qty').val();
            if (quant_val == enablemaxqty) {
               // $(this).children().find('.inc_button').css('display','none');
               $(this).children().find('.inc_button').prop('disabled', true);
            }
         });
         // }, 3000);
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
   <script>
      $(document).ready(function() {
         $('#loadingMask').fadeOut();
      });
   </script>
</body>

</html>