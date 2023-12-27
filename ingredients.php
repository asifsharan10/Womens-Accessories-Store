<?php
   error_reporting(0);
   $configFilePath = __DIR__ . DIRECTORY_SEPARATOR . 'bp_config' . DIRECTORY_SEPARATOR . 'site-info.php';
   if (file_exists($configFilePath )) {
   require_once $configFilePath;
   }else{
   echo 'General configuration error';
   }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Ingredients</title>
      <?= $generalConfig['add_stylesheet'] ?>
      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <!-- Fonts -->
      <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/bootstrap.min.css?v=<?= time() ?>">
      <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/custom.css?v=<?= time() ?>">
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
      <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/style.css?v=<?= time() ?>">
      <link rel="stylesheet" href="<?= $path['css']; ?>/checkout_custom.css?v=<?= time() ?>">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <style>img{max-width:100%;}</style>
      
   </head>
   <body>
   <div id="loadingMask" style="width: 100%; height: 100%; position: fixed; background: #fff; z-index:99999999999;">
       <div>
           <img src="./img/loadingGif/<?= $pageConfig['loadingGif'] ?>.gif">
       </div>
   </div>

<?php
if (file_exists('bp_config/includes/templates/headers/header' . $pageConfig['header_template'] . '.php')) {
    require 'bp_config/includes/templates/headers/header' . $pageConfig['header_template'] . '.php';
}
?>

<script type="text/javascript">
    $(function(){
        // var total = sessionStorage.getItem('cartTotal');
        // var qty = sessionStorage.getItem('qty');
        // console.log(qty);
        // // $('#cart_amt').html(total);
        // $('#cart_qty').html(qty);
        var productCart = [];
        var tot_pdt_count = <?=$generalConfig['product_count']?>;
        for(i=1;i<=tot_pdt_count;i++){       //total pdt count

            var shoppingCart = JSON.parse(sessionStorage.getItem( 'product-'+i ));
            var cartpdtTotal = productCart.push(shoppingCart);

        }
        //console.log(productCart);
        var cartPdtArrNew = productCart.filter(function (el) {
            return el != null && el != "";
        });

        console.log(cartPdtArrNew);
        sessionStorage.setItem( "cartPdtArr", JSON.stringify(cartPdtArrNew));

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

        cartPdtArrNew.forEach(function(d){
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
        $('.cartTotal').each(function(){

            total += parseFloat($(this).data('total'),10);
            //console.log($(this).attr('data-total'));
            //console.log(total)
            $('#subtotalAmount').html(total.toFixed(2));
            $('#cart_amt').html(total.toFixed(2));
        })

        var qtyCol = 0;
        $('.cartNumber').each(function(){

            qtyCol += parseFloat($(this).data('qty'),10);
            $('#cart_qty').html(qtyCol);
        })
        $('.close-button').click(function(){

            console.log($(this).parents('tr').data('product-id'));

            sessionStorage.removeItem($(this).parents('tr').data('product-id'));

            var removeItem = $(this).parents('tr').data('product-id');

            var ar = sessionStorage.getItem( "cartPdtArr");

            for(var i=0; i < ar.length; i++) {
                if(ar[i].Id == removeItem)
                {
                    ar.splice(i,1);

                }
                if(sessionStorage.getItem('cartPdtArrNew') == '[]' || sessionStorage.getItem('cartPdtArrNew') == ''){
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

        if(sessionStorage.getItem('cartPdtArr') == '[]' || sessionStorage.getItem('cartPdtArr') == ''){
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

<div class="py-5">
      <div class="container">
         <h1>Ingredients</h1>
         <?php 
            foreach ($products as $key => $value){
               foreach ($value as $k => $v){
                  if($v == 'active'){
                     $p = $key;
                     $product = $products[$p];
            if($product['status']=='active' && $product['show_ingredients'] == 'yes')
            { 
            ?>
            <div class="ingredient-container" style="margin-bottom: 40px;border:2px solid black;user-select: none;">
         <p style="color:black;text-transform:uppercase;margin:0;font-weight:bold;text-align:center"> <?= $product['name'] ?></p>
         <img src="<?= preg_match('/^(http\:\/\/|https\:\/\/)/', $product['ingredients_image']) ? $product['ingredients_image'] : $path['images'] . '/' . $product['ingredients_image']; ?>"/>
         </div>
         <?php 
            }
                              }
                                 }
                                    } 
            ?>
      </div>
      </div>

<?php
if (file_exists('bp_config/includes/templates/footer/footer' . $pageConfig['footer_template'] . '.php')) {
    require 'bp_config/includes/templates/footer/footer' . $pageConfig['footer_template'] . '.php';
}
?>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" ></script>  
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
            $(document).ready(function(){
                $('#loadingMask').fadeOut();
            });
        </script>
   </body>
</html>