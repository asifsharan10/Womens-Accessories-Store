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
      <title>Data</title>
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <style>img{max-width: 100%;}</style>
       <style>
           .zoom {
               transition: transform .2s;
               margin: 0 auto;
           }
           .zoom:hover {
               transform: scale(1.5);
           }
       </style>
   </head>
   <body>
   <div id="loadingMask" style="width: 100%; height: 100%; position: fixed; background: #fff; z-index:99999999999;">
       <div>
           <img src="./img/loadingGif/<?= $pageConfig['loadingGif'] ?>.gif">
       </div>
   </div>
      <div class="container">
         <table class="table table-striped table-light">
            <tbody>
               <tr>
                  <th scope="row">DBA</th>
                  <td><?= $generalConfig['brand_name'] ?></td>
               </tr>
               <tr>
                  <th scope="row">Website Url</th>
                  <td><?= $generalConfig['website_url'] ?></td>
               </tr>
               <tr>
                  <th scope="row">Email</th>
                  <td><?= $generalConfig['email'] ?></td>
               </tr>
               <tr>
                  <th scope="row">Corporation</th>
                  <td><?= $generalConfig['corp_name'] ?></td>
               </tr>
               <tr>
                  <th scope="row">Descriptor</th>
                  <td><?= $generalConfig['descriptor'] ?></td>
               </tr>
               <tr>
                  <th scope="row">Phone Number</th>
                  <td><?= $generalConfig['phone_number'] ?></td>
               </tr>
               <tr>
                  <th scope="row">Address</th>
                  <td><?= $generalConfig['address'] ?></td>
               </tr>
               <tr>
                  <th scope="row">Fulfillment</th>
                  <td><?= $generalConfig['fulfillment'] ?></td>
               </tr>
               <tr>
                  <th scope="row">Return Address</th>
                  <td><?= $generalConfig['return_address'] ?></td>
               </tr>
            </tbody>
         </table>
         <table id="data-table" class="table table-striped table-light">
            <thead>
               <tr>
                  <th>Product Image</th>
                  <th>Product Name</th>
                  <th>Product Description</th>
                  <th id="ingredient-image-column" style="display: none;">Ingredient Image</th>
                  <th>Billing Model</th>
                  <th>Sub total</th>
                  <th>Shipping Price</th>
                  <th>Total</th>
                  <th>SS Multi Price</th>
                  <th align="right"></th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $count = 1;
                  $qty_text = 'none';
                  $prices = [];
                  foreach ($products as $key => $value){
                  $product = $products['product'.$count];
                  $product_id = $product['id'];
                  if($product['billingModel']=='1' ) //ss
                  { 
                    $pprice = $product['ssPrice']; 
                    $sprice = $product['ssShipping']; 
                    $product_type = 'Straight Sale';
                    $max_qty = 10;
                    if($product['ssMaxqty']=='1'){
                      $data_total = sprintf("%0.2f", ($pprice + $sprice)) ;
                      $data_product = sprintf("%0.2f", $pprice);
                      $data_shipping = sprintf("%0.2f", $sprice);
                      $qty_disable = 'display:none';
                      $quantity_button_type = 'hidden';
                    } else {
                      //$data_total = '0.00';
                      $data_total =  sprintf("%0.2f", ($pprice + $sprice));
                      $data_product = sprintf("%0.2f", $pprice);
                      $data_shipping = sprintf("%0.2f", $sprice);
                      $qty_disable = 'display:table-cell';
                      $qty_text = 'cell';
                      $quantity_button_type = 'number';
                    }
                  }
                  else if ($product['billingModel']=='2') //trial
                  { 
                    $pprice = $product['trialPrice'];
                    $sprice = $product['trialShipping'];
                    $product_type = 'Trial';
                    $max_qty = 10;
                    //$verbiage = $pageConfig['checkoutPage']['trial_verbiage'];
                    if($product['trialMaxqty']=='1'){
                      $data_total = sprintf("%0.2f", $sprice); ;
                      $data_product = sprintf("%0.2f", $pprice);
                      $data_shipping = sprintf("%0.2f", $sprice);
                      $qty_disable = 'display:none';
                      $quantity_button_type = 'hidden';
                    } else {
                      //$data_total = '0.00';
                      $data_total =  sprintf("%0.2f", $sprice);
                      $data_product = sprintf("%0.2f", $pprice);
                      $data_shipping = sprintf("%0.2f", $sprice);
                      $qty_text = 'cell';
                      $qty_disable = 'display:table-cell';
                      $quantity_button_type = 'number';
                    }
                  }
                  else if ($product['billingModel']=='3') //Con
                  { 
                    $pprice = $product['continuityPrice']; 
                    $sprice = $product['continuityShipping'];
                    $product_type = 'Continuity';
                    $max_qty = 10;
                    if($product['continuityMaxqty']=='1'){
                      $data_total =  sprintf("%0.2f", ($pprice + $sprice));
                      $data_product = sprintf("%0.2f", $pprice);
                      $data_shipping =  sprintf("%0.2f", $sprice);
                      $qty_disable = 'display:none';
                      $quantity_button_type = 'hidden';
                    } else {
                      //$data_total = '0.00';
                      $data_total =  sprintf("%0.2f", ($pprice + $sprice));
                      $data_product = sprintf("%0.2f", $pprice);
                      $data_shipping = sprintf("%0.2f", $sprice);
                      $qty_text = 'cell';
                      $qty_disable = 'display:table-cell';
                      $quantity_button_type = 'number';
                    }
                  }
                  else if ($product['billingModel']=='4') // ss+trial
                  {
                    $pprice = '0.00'; //$product['ssPrice']; 
                    $sprice = '0.00'; //$product['ssShipping']; 
                    $product_type = '<select class="prod_type_4" product_serial="'.$count.'">
                                        <option value="0" selected="selected">Choose One</option>
                                        <option value="1" >Straight Sale</option>
                                        <option value="2">Trial</option>
                                      </select>';
                    $data_total = '0.00';
                    $qty_disable = 'display:none';
                  }
                  else if ($product['billingModel']=='5') //ss+con
                  {
                    $pprice = '0.00'; //$product['ssPrice']; 
                    $sprice = '0.00'; //$product['ssShipping']; 
                    $product_type = '<select class="prod_type_5" product_serial="'.$count.'">
                                        <option value="0" selected="selected">Choose One</option>
                                        <option value="1" >Straight Sale</option>
                                        <option value="3">Continuity</option>
                                      </select>';
                    $data_total = '0.00';
                    $qty_disable = 'display:none';
                  }
                  else if ($product['billingModel']=='6') // trial+con
                  {
                    $pprice = '0.00'; //$product['ssPrice']; 
                    $sprice = '0.00'; //$product['ssShipping']; 
                    $product_type = '<select class="prod_type_6" product_serial="'.$count.'">
                                        <option value="0" selected="selected">Choose One</option>
                                        <option value="2">Trial</option>
                                        <option value="3">Continuity</option>
                                      </select>';
                    $data_total = '0.00';
                    $qty_disable = 'display:none';
                  }
                  else if ($product['billingModel']=='7') //ss+trial+con
                  {
                    $pprice = '0.00'; //$product['ssPrice']; 
                    $sprice = '0.00'; //$product['ssShipping']; 
                    $product_type = '<select class="prod_type_0" product_serial="'.$count.'">
                                        <option value="0" selected="selected">Choose One</option>
                                        <option value="1">Straight Sale</option>
                                        <option value="2">Trial</option>
                                        <option value="3">Continuity</option>
                                      </select>';
                    $data_total = '0.00';
                    $qty_disable = 'display:none';
                  }
                  if( $product['billingModel'] == '1' && $product['ssMaxqty']=='2' || 
                    $product['billingModel'] == '2' && $product['trialMaxqty']=='2' || 
                    $product['billingModel'] == '3' && $product['continuityMaxqty']=='2' 
                  ) 
                  { 
                    $quantity_button_status = 'enabled';
                    $atc_status = 'enabled';
                    $qty_value="1" ;
                    //if($product['billingModel'] == '1'){ }
                  } 
                  else if(  $product['billingModel'] == '4' ||
                            $product['billingModel'] == '5' || 
                            $product['billingModel'] == '6' || 
                            $product['billingModel'] == '7') 
                  {
                    $quantity_button_status = 'disabled';
                    $atc_status = 'disabled';
                    $term_status="display:none";
                    $quantity_button_type = 'hidden';
                    //$qty_value="1";
                  }
                  else
                  { 
                    $quantity_button_status = 'disabled';
                    $atc_status = 'enabled';
                    $qty_value="1";
                  }
                  if($product['status']=='active')
                  {  
                  ?>
               <tr id="tr<?= $count ?>" class="data_row">
                  <td><img src="<?= preg_match('/^(http\:\/\/|https\:\/\/)/', $product['image']) ? $product['image'] : $path['images'] . '/' . $product['image']; ?>" class="imgThumb zoom"></td>
                  <td><span class="product-name"><?= $product['name']; ?></span></td>
                  <td><?= $product['description']; ?></td>

                  <td class="ingredient-image-column d-none" data-block="<?= $product['show_ingredients'] == 'yes'; ?>">
                      <img src="<?= preg_match('/^(http\:\/\/|https\:\/\/)/', $product['ingredients_image']) ? $product['ingredients_image'] : $path['images'] . '/' . $product['ingredients_image']; ?>" class="imgThumb">
                  </td>
                  
                  <td><?php if ($product_type) { ?>
                      <span class="product-name"><?= $product_type; ?></span>
                  <?php } ?></td>

                   <td><?php if ($product['billingModel'] != '1' || $product['straightSaleMultiPrice'] != 'yes') { ?>
                        <span class="product-price" id="p_price_<?= $count; ?>" product_price="<?= $pprice; ?>">$<?= $pprice; ?></span>
                   <?php } ?></td>

                  <td><?php if ($sprice) { ?>
                      <span class="product-price" id="s_price_<?= $count; ?>" product_s_price="<?= $sprice; ?>">$<?= $sprice; ?></span>
                  <?php } ?></td>

                  <td><?php if ($product['billingModel'] != '1' || $product['straightSaleMultiPrice'] != 'yes') { ?>
                      <span class="product-price" id="sub_total_<?= $count; ?>" value="<?= ($pprice + $sprice); ?>">
                        $<?=  sprintf("%.2f", $data_total); ?>
                     </span>
                  <?php } ?></td>

                   <td><?php if ($product['billingModel'] == '1' && $product['straightSaleMultiPrice'] == 'yes') { ?>
                           <?php foreach ($product['shop_option'] as $shopOption) { ?>
                               <div>$<?= $shopOption['option_price']; ?>&nbsp;(<?= $shopOption['option_quantity']; ?>)</div>
                           <?php } ?>
                   <?php } ?></td>

                  <td align="right" class="qty_all_<?= $count ?> qty_td" style="<?= $qty_disable ?>">
                     <span class="qty_all_<?= $count ?> qty_span">
                     <input type="<?= $quantity_button_type; ?>" value="<?= $qty_value ?>"  min="0" max="<?= $max_qty; ?>" id="qty_<?= $count ?>" product_serial="<?= $count ?>"  class="qty quentity <?= $quantity_button_status; ?>" <?= $quantity_button_status; ?> />
                     </span>
                  </td>
                  <input type="hidden" id="final_sub_price_<?= $count; ?>" value=""/>
                  <input type="hidden" name="qty_button_status_<?= $count; ?>" value="<?= $quantity_button_status; ?>"/>
                  <input type="hidden" name="ss_<?= $count; ?>" value="<?= $product['ssMaxqty']; ?>"/>
                  <input type="hidden" name="ss_p<?= $count; ?>" value="<?= $product['ssPrice']; ?>"/>
                  <input type="hidden" name="ss_ship<?= $count; ?>" value="<?= $product['ssShipping']; ?>"/>
                  <input type="hidden" name="trl_<?= $count; ?>" value="<?= $product['trialMaxqty']; ?>"/>
                  <input type="hidden" name="trl_p<?= $count; ?>" value="<?= $product['trialPrice']; ?>"/>
                  <input type="hidden" name="trl_ship<?= $count; ?>" value="<?= $product['trialShipping']; ?>"/>
                  <input type="hidden" name="con_<?= $count; ?>" value="<?= $product['continuityMaxqty']; ?>"/>
                  <input type="hidden" name="con_p<?= $count; ?>" value="<?= $product['continuityPrice']; ?>"/>
                  <input type="hidden" name="con_ship<?= $count; ?>" value="<?= $product['continuityShipping']; ?>"/>
                  <input type="hidden" name="product_type_<?= $count; ?>" value="<?= $product['billingModel']; ?>">
                  <input type="hidden" name="term_status" value="<?= $product['billingModel']; ?>">
                  <input type="hidden" name="multi_product_cart" value="<?= $pageConfig['checkoutPage']['multi_product_cart']; ?>">
               </tr>
               <?php
                  // if($product['ssMaxqty']=='2' || $product['continuityMaxqty']=='2'){ $qty_text = 1;}
                      if (isset($product['shop_option'])) {
                          foreach ($product['shop_option'] as $optionKey => $optionValue) {
                              if (isset($optionValue['option_price'])) {
                                  $prices[] = round($optionValue['option_price'], 2);
                              }
                          }
                      }
                  }
                  $count = $count + 1; 
                  }
                  ?>
               <input type="hidden" id="qty_textt" value="<?= $qty_text ?>"/>
            </tbody>
            <tfoot></tfoot>
         </table>
          <table class="table table-striped table-light">
              <tbody>
                  <?php
                  $i = 1;
                  if (count($prices)) {
                        asort($prices);
                        foreach ($prices as $price) { ?>
                            <tr>
                                <td width="15%"><?= $i++; ?></td>
                                <td>$<?= sprintf("%0.2f", $price);?></td>
                            </tr>
                        <?php }
                  }
                  ?>
              </tbody>
          </table>
      </div>
      <script src="<?= $path['js']; ?>/jquery.min.js"></script>
      <script>
         $( document ).ready(function() {

             $('#data-table tr th').each(function(i) {
                 //select all tds in this column
                 var tds = $(this).parents('table').find('tr td:nth-child(' + (i + 1) + ')');
                 //check if all the cells in this column are empty
                 if (tds.length == tds.filter(':empty').length) {
                     //hide header
                     $(this).hide();
                     //hide cells
                     tds.hide();
                 }
             });

             let showIngredientImageColumn = false;

             $('.ingredient-image-column').each(function () {
                 if ($(this).data('block')) {
                     showIngredientImageColumn = true;
                 }
                 else {
                     $(this).children().hide();
                 }
             });

             if (showIngredientImageColumn) {
                 $('#ingredient-image-column').show();
                 $('.ingredient-image-column').toggleClass('d-block d-none');
             }

          var qty_txt = $('#qty_textt').attr('value');
          if(qty_txt == 'cell') { 
             $('.qty_td').attr('style','display:cell');
          }
          $('#qty_txt_status').css('display',qty_txt);
          //------------- Product 0 type dropdown ------------------//
            $('.prod_type_0').change(function(){
              var prod_val = $(this).val();
              var prod_serial = $(this).attr('product_serial');
              if(prod_val==0){
                $('#addtocart_'+prod_serial).addClass('disabled');
                $('input[product_serial='+prod_serial+']').removeClass('enabled');
                $('input[product_serial='+prod_serial+']').addClass('disabled');
                $('input[product_serial='+prod_serial+']').attr('disabled','disabled');
                $('#qty_'+prod_serial).attr('type','hidden');
                if(qty_txt == 'none'){ 
                    $('#qty_txt_status').css('display','none');
                    $('.qty_all_'+prod_serial).css('display','none');
                    $('.qty_td').attr('style','display:none');
                     }
                $('#p_price_'+prod_serial).html('$0.00');
                $('#s_price_'+prod_serial).html('$0.00');
                $('#sub_total_'+prod_serial).html('$0.00');
                $('input[product_serial='+prod_serial+']').val('');
                $('#addtocart_'+prod_serial).attr('module', 7);
              }
              else if(prod_val==1){
                var p_price = Number($('input[name=ss_p'+prod_serial+']').val()).toFixed(2);
                var ship_price = Number($('input[name=ss_ship'+prod_serial+']').val()).toFixed(2);
                var tot_price = Number(parseFloat($('input[name=ss_p'+prod_serial+']').val()) + parseFloat($('input[name=ss_ship'+prod_serial+']').val())).toFixed(2);
                  $('input[product_serial='+prod_serial+']').val(1);
                  $('#addtocart_'+prod_serial).removeClass('enabled');
                  $('#addtocart_'+prod_serial).addClass('disabled');
                  $('#p_price_'+prod_serial).attr('value',p_price);
                  $('#p_price_'+prod_serial).attr('product_price',p_price);
                  $('#p_price_'+prod_serial).html('$'+p_price);
                  $('#s_price_'+prod_serial).attr('value',ship_price);
                  $('#s_price_'+prod_serial).attr('product_s_price',ship_price);
                  $('#s_price_'+prod_serial).html('$'+ship_price);
                  $('#sub_total_'+prod_serial).html('$'+tot_price);
                  $('#qty_'+prod_serial).val(1);
                  $('#addtocart_'+prod_serial).attr('module', 1);
                  if($('input[name=ss_'+prod_serial+']').val()==1){
                      $('input[product_serial='+prod_serial+']').addClass('disabled');
                      $('input[product_serial='+prod_serial+']').attr("disabled", true);
                      $('#addtocart_'+prod_serial).removeClass('disabled');
                      $('.qty_all_'+prod_serial).css('display','cell');
                      $('#addtocart_'+prod_serial).attr('data_total', tot_price );
                      $('#addtocart_'+prod_serial).attr('data_product', p_price );
                      $('#addtocart_'+prod_serial).attr('data_shipping', ship_price);
                      $('#qty_'+prod_serial).attr('type','hidden');
                      if(qty_txt == 'none'){ 
                        $('#qty_txt_status').css('display','none');
                        $('.qty_all_'+prod_serial).css('display','none');
                        $('.qty_td').attr('style','display:none');
                         }
                  } else {
                    $('input[product_serial='+prod_serial+']').attr("disabled", false);
                    $('input[product_serial='+prod_serial+']').removeClass('disabled');
                    $('input[product_serial='+prod_serial+']').addClass('enabled');
                    $('.qty_all_'+prod_serial).attr('style','display:cell');
                    $('input[product_serial='+prod_serial+']').attr('value','1');
                    $('#addtocart_'+prod_serial).attr('data_total',tot_price);
                    $('#addtocart_'+prod_serial).attr('data_shipping',ship_price);
                    $('#addtocart_'+prod_serial).attr('data_product',p_price);
                    $('#addtocart_'+prod_serial).removeClass('disabled');
                    $('#addtocart_'+prod_serial).addClass('enabled');
                    $('#qty_txt_status').attr('style','display:cell');
                    $('#qty_'+prod_serial).attr('max', 10);
                    $('#qty_'+prod_serial).attr('type','number');
                    $('.qty_td').attr('style','display:cell');
                  }
                  $('#terms').css('display', '');
              }
              else if(prod_val==2){
                var p_price = Number($('input[name=trl_p'+prod_serial+']').val()).toFixed(2);
                var ship_price = Number($('input[name=trl_ship'+prod_serial+']').val()).toFixed(2);
                var tot_price = Number(parseFloat($('input[name=trl_p'+prod_serial+']').val()) + parseFloat($('input[name=trl_ship'+prod_serial+']').val())).toFixed(2);
                  $('input[product_serial='+prod_serial+']').val(1);
                  $('#addtocart_'+prod_serial).removeClass('enabled');
                  $('#addtocart_'+prod_serial).addClass('disabled');
                  $('#p_price_'+prod_serial).attr('value',p_price);
                  $('#p_price_'+prod_serial).attr('product_price',p_price);
                  $('#p_price_'+prod_serial).html('$'+p_price);
                  $('#s_price_'+prod_serial).attr('value',ship_price);
                  $('#s_price_'+prod_serial).attr('product_s_price',ship_price);
                  $('#s_price_'+prod_serial).html('$'+ship_price);
                  $('#sub_total_'+prod_serial).html('$'+tot_price);
                  $('#qty_'+prod_serial).val(1);
                  $('#addtocart_'+prod_serial).attr('module', 2);
                  if($('input[name=trl_'+prod_serial+']').val()=='1'){
                    $('input[product_serial='+prod_serial+']').addClass('disabled');
                    $('input[product_serial='+prod_serial+']').attr("disabled", true);
                    $('#addtocart_'+prod_serial).removeClass('disabled');
                    $('.qty_all_'+prod_serial).css('display','cell');
                    $('#addtocart_'+prod_serial).attr('data_total', tot_price );
                    $('#addtocart_'+prod_serial).attr('data_product', p_price );
                    $('#addtocart_'+prod_serial).attr('data_shipping', ship_price);
                    $('#qty_'+prod_serial).attr('type','hidden');
                    if(qty_txt == 'none'){ 
                        $('#qty_txt_status').css('display','none');
                        $('.qty_all_'+prod_serial).css('display','none');
                        $('.qty_td').attr('style','display:none');
                        }
                  }
                else {
                  $('input[product_serial='+prod_serial+']').attr("disabled", false);
                  $('input[product_serial='+prod_serial+']').removeClass('disabled');
                  $('input[product_serial='+prod_serial+']').addClass('enabled');
                  $('input[product_serial='+prod_serial+']').attr('value','1');
                  $('.qty_all_'+prod_serial).attr('style','display:cell');
                  $('#addtocart_'+prod_serial).attr('data_total',tot_price);
                  $('#addtocart_'+prod_serial).attr('data_shipping',ship_price);
                  $('#addtocart_'+prod_serial).attr('data_product',p_price);
                  $('#addtocart_'+prod_serial).removeClass('disabled');
                  $('#addtocart_'+prod_serial).addClass('enabled');
                  $('#qty_txt_status').attr('style','display:cell');
                  $('input[id=qty_'+prod_serial+']').attr('max', 10);
                  $('#qty_'+prod_serial).attr('type','number');
                  $('.qty_td').attr('style','display:cell');
                }
                  $('#terms').css('display', '');
              }
              else if(prod_val==3){
                var p_price = Number($('input[name=con_p'+prod_serial+']').val()).toFixed(2);
                var ship_price = Number($('input[name=con_ship'+prod_serial+']').val()).toFixed(2);
                var tot_price = Number(parseFloat($('input[name=con_p'+prod_serial+']').val()) + parseFloat($('input[name=con_ship'+prod_serial+']').val())).toFixed(2);
                  $('input[product_serial='+prod_serial+']').val(1);
                  $('#addtocart_'+prod_serial).removeClass('enabled');
                  $('#addtocart_'+prod_serial).addClass('disabled');
                  $('#p_price_'+prod_serial).attr('value',p_price);
                  $('#p_price_'+prod_serial).attr('product_price',p_price);
                  $('#p_price_'+prod_serial).html('$'+p_price);
                  $('#s_price_'+prod_serial).attr('value',ship_price);
                  $('#s_price_'+prod_serial).attr('product_s_price',ship_price);
                  $('#s_price_'+prod_serial).html('$'+ship_price);
                  $('#sub_total_'+prod_serial).html('$'+tot_price);
                  $('#qty_'+prod_serial).val(1);
                  $('#addtocart_'+prod_serial).attr('module', 3);
                  if($('input[name=con_'+prod_serial+']').val()==1){
                    $('input[product_serial='+prod_serial+']').addClass('disabled');
                    $('input[product_serial='+prod_serial+']').attr("disabled", true);
                    $('.qty_all_'+prod_serial).css('display','cell');
                    $('#addtocart_'+prod_serial).removeClass('disabled');
                    $('#addtocart_'+prod_serial).attr('data_total', tot_price );
                    $('#addtocart_'+prod_serial).attr('data_product', p_price );
                    $('#addtocart_'+prod_serial).attr('data_shipping', ship_price);
                    $('#qty_'+prod_serial).attr('type','hidden');
                    if(qty_txt == 'none'){ 
                        $('#qty_txt_status').css('display','none');
                        $('.qty_all_'+prod_serial).css('display','none');
                        $('.qty_td').attr('style','display:none');
                        }
                  }else {
                    $('input[product_serial='+prod_serial+']').attr("disabled", false);
                    $('input[product_serial='+prod_serial+']').removeClass('disabled');
                    $('input[product_serial='+prod_serial+']').addClass('enabled');
                    $('.qty_all_'+prod_serial).attr('style','display:cell');
                    $('input[product_serial='+prod_serial+']').attr('value','1');
                    $('#addtocart_'+prod_serial).attr('data_total',tot_price);
                    $('#addtocart_'+prod_serial).attr('data_shipping',p_price);
                    $('#addtocart_'+prod_serial).attr('data_product',ship_price);
                    $('#addtocart_'+prod_serial).removeClass('disabled');
                    $('#addtocart_'+prod_serial).addClass('enabled');
                    $('#qty_txt_status').attr('style','display:cell');
                    $('input[id=qty_'+prod_serial+']').attr('max', 10);
                    $('#qty_'+prod_serial).attr('type','number');
                    $('.qty_td').attr('style','display:cell');
                  }
                  $('#terms').css('display', '');
              }
            });
          //------------- Product 4 type dropdown ------------------//
            $('.prod_type_4').change(function(){
              var prod_val = $(this).val();
              var prod_serial = $(this).attr('product_serial');
              if(prod_val==0){
                $('#addtocart_'+prod_serial).addClass('disabled');
                $('input[product_serial='+prod_serial+']').removeClass('enabled');
                $('input[product_serial='+prod_serial+']').addClass('disabled');
                $('input[product_serial='+prod_serial+']').attr('disabled','disabled');
                $('#qty_'+prod_serial).attr('type','hidden');
                if(qty_txt == 'none'){ 
                    $('#qty_txt_status').css('display','none');
                    $('.qty_all_'+prod_serial).css('display','none');
                    $('.qty_td').attr('style','display:none');
                     }
                $('#p_price_'+prod_serial).html('$0.00');
                $('#s_price_'+prod_serial).html('$0.00');
                $('#sub_total_'+prod_serial).html('$0.00');
                $('input[product_serial='+prod_serial+']').val('');
                $('#addtocart_'+prod_serial).attr('module', 4);
              }
              else if(prod_val==1){
                var p_price = Number($('input[name=ss_p'+prod_serial+']').val()).toFixed(2);
                var ship_price = Number($('input[name=ss_ship'+prod_serial+']').val()).toFixed(2);
                var tot_price = Number(parseFloat($('input[name=ss_p'+prod_serial+']').val()) + parseFloat($('input[name=ss_ship'+prod_serial+']').val())).toFixed(2);
                  $('input[product_serial='+prod_serial+']').val(1);
                  $('#p_price_'+prod_serial).attr('value',p_price);
                  $('#p_price_'+prod_serial).attr('product_price',p_price);
                  $('#p_price_'+prod_serial).html('$'+p_price);
                  $('#s_price_'+prod_serial).attr('value',ship_price);
                  $('#s_price_'+prod_serial).attr('product_s_price',ship_price);
                  $('#s_price_'+prod_serial).html('$'+ship_price);
                  $('#sub_total_'+prod_serial).html('$'+tot_price);
                  $('#addtocart_'+prod_serial).attr('module', 1);
                  if($('input[name=ss_'+prod_serial+']').val()==1){
                      $('input[product_serial='+prod_serial+']').addClass('disabled');
                      $('input[product_serial='+prod_serial+']').attr("disabled", true);
                      $('.qty_all_'+prod_serial).css('display','cell');
                      $('#addtocart_'+prod_serial).removeClass('disabled');
                      $('#addtocart_'+prod_serial).attr('data_total', tot_price );
                      $('#addtocart_'+prod_serial).attr('data_product', p_price );
                      $('#addtocart_'+prod_serial).attr('data_shipping', ship_price);
                      $('#qty_'+prod_serial).attr('type','hidden');
                      if(qty_txt == 'none'){ 
                        $('#qty_txt_status').css('display','none');
                        $('.qty_all_'+prod_serial).css('display','none');
                        $('.qty_td').attr('style','display:none');
                         }
                  } else {
                    $('input[product_serial='+prod_serial+']').attr("disabled", false);
                    $('input[product_serial='+prod_serial+']').removeClass('disabled');
                    $('input[product_serial='+prod_serial+']').addClass('enabled');
                    $('input[product_serial='+prod_serial+']').attr('value','1');
                    $('.qty_all_'+prod_serial).attr('style','display:cell');
                    $('#addtocart_'+prod_serial).attr('data_total',tot_price);
                    $('#addtocart_'+prod_serial).attr('data_shipping',ship_price);
                    $('#addtocart_'+prod_serial).attr('data_product',p_price);
                    $('#addtocart_'+prod_serial).removeClass('disabled');
                    $('#addtocart_'+prod_serial).addClass('enabled');
                    $('#qty_txt_status').attr('style','display:cell');
                    $('input[id=qty_'+prod_serial+']').attr('max', 10);
                    $('#qty_'+prod_serial).attr('type','number');
                    $('.qty_td').attr('style','display:cell');
                  }
              }
              else if(prod_val==2){
                var p_price = Number($('input[name=trl_p'+prod_serial+']').val()).toFixed(2);
                var ship_price = Number($('input[name=trl_ship'+prod_serial+']').val()).toFixed(2);
                var tot_price = Number(parseFloat($('input[name=trl_p'+prod_serial+']').val()) + parseFloat($('input[name=trl_ship'+prod_serial+']').val())).toFixed(2);
                  $('input[product_serial='+prod_serial+']').val(1);
                  $('#p_price_'+prod_serial).attr('value',p_price);
                  $('#p_price_'+prod_serial).attr('product_price',p_price);
                  $('#p_price_'+prod_serial).html('$'+p_price);
                  $('#s_price_'+prod_serial).attr('value',ship_price);
                  $('#s_price_'+prod_serial).attr('product_s_price',ship_price);
                  $('#s_price_'+prod_serial).html('$'+ship_price);
                  $('#sub_total_'+prod_serial).html('$'+tot_price);
                  $('#addtocart_'+prod_serial).attr('module', 2);
                  if($('input[name=trl_'+prod_serial+']').val()=='1'){
                    // $('input[product_serial='+prod_serial+']').css('display','none');
                    $('input[product_serial='+prod_serial+']').addClass('disabled');
                    $('input[product_serial='+prod_serial+']').attr("disabled", true);
                    $('.qty_all_'+prod_serial).css('display','cell');
                    $('#addtocart_'+prod_serial).removeClass('disabled');
                    $('#addtocart_'+prod_serial).attr('data_total', tot_price );
                    $('#addtocart_'+prod_serial).attr('data_product', p_price );
                    $('#addtocart_'+prod_serial).attr('data_shipping',ship_price);
                    $('#qty_'+prod_serial).attr('type','hidden');
                    if(qty_txt == 'none'){ 
                        $('#qty_txt_status').css('display','none');
                        $('.qty_all_'+prod_serial).css('display','none');
                        $('.qty_td').attr('style','display:none');
                        }
                  }
                  else {
                    $('input[product_serial='+prod_serial+']').attr("disabled", false);
                    $('input[product_serial='+prod_serial+']').removeClass('disabled');
                    $('input[product_serial='+prod_serial+']').addClass('enabled');
                    $('.qty_all_'+prod_serial).attr('style','display:cell');
                    $('input[product_serial='+prod_serial+']').attr('value','1');
                    $('#addtocart_'+prod_serial).attr('data_total',tot_price);
                    $('#addtocart_'+prod_serial).attr('data_shipping',ship_price);
                    $('#addtocart_'+prod_serial).attr('data_product',p_price);
                    $('#addtocart_'+prod_serial).removeClass('disabled');
                    $('#addtocart_'+prod_serial).addClass('enabled');
                    $('#qty_txt_status').attr('style','display:cell');
                    $('input[id=qty_'+prod_serial+']').attr('max', 10);
                    $('#qty_'+prod_serial).attr('type','number');
                    $('.qty_td').attr('style','display:cell');
                  }
              }
            });
          //------------- Product 5 type dropdown ------------------//
            $('.prod_type_5').change(function(){
              var prod_val = $(this).val();
              var prod_serial = $(this).attr('product_serial');
              if(prod_val==0){
                $('#addtocart_'+prod_serial).addClass('disabled');
                $('input[product_serial='+prod_serial+']').removeClass('enabled');
                $('input[product_serial='+prod_serial+']').addClass('disabled');
                $('input[product_serial='+prod_serial+']').attr('disabled','disabled');
                $('#qty_'+prod_serial).attr('type','hidden');
                if(qty_txt == 'none'){ 
                    $('#qty_txt_status').css('display','none');
                    $('.qty_all_'+prod_serial).css('display','none');
                    $('.qty_td').attr('style','display:none');
                     }
                $('#p_price_'+prod_serial).html('$0.00');
                $('#s_price_'+prod_serial).html('$0.00');
                $('#sub_total_'+prod_serial).html('$0.00');
                $('input[product_serial='+prod_serial+']').val('');
                $('#addtocart_'+prod_serial).attr('module', 5);
              }
              else if(prod_val==1){
                var p_price = Number($('input[name=ss_p'+prod_serial+']').val()).toFixed(2);
                var ship_price = Number($('input[name=ss_ship'+prod_serial+']').val()).toFixed(2);
                var tot_price = Number(parseFloat($('input[name=ss_p'+prod_serial+']').val()) + parseFloat($('input[name=ss_ship'+prod_serial+']').val())).toFixed(2);
                  $('input[product_serial='+prod_serial+']').val(1);
                  $('#p_price_'+prod_serial).attr('value',p_price);
                  $('#p_price_'+prod_serial).attr('product_price',p_price);
                  $('#p_price_'+prod_serial).html('$'+p_price);
                  $('#s_price_'+prod_serial).attr('value',ship_price);
                  $('#s_price_'+prod_serial).attr('product_s_price',ship_price);
                  $('#s_price_'+prod_serial).html('$'+ship_price);
                  $('#sub_total_'+prod_serial).html('$'+tot_price);
                  $('#addtocart_'+prod_serial).attr('module', 1);
                  if($('input[name=ss_'+prod_serial+']').val()==1){
                      $('input[product_serial='+prod_serial+']').addClass('disabled');
                      $('input[product_serial='+prod_serial+']').attr("disabled", true);
                      $('#addtocart_'+prod_serial).removeClass('disabled');
                      $('.qty_all_'+prod_serial).css('display','cell');
                      $('#addtocart_'+prod_serial).attr('data_total', tot_price );
                      $('#addtocart_'+prod_serial).attr('data_product', p_price );
                      $('#addtocart_'+prod_serial).attr('data_shipping', ship_price);
                      $('#qty_'+prod_serial).attr('type','hidden');
                      if(qty_txt == 'none'){ 
                        $('#qty_txt_status').css('display','none');
                        $('.qty_all_'+prod_serial).css('display','none');
                        $('.qty_td').attr('style','display:none');
                         }
                  } else {
                    $('input[product_serial='+prod_serial+']').attr("disabled", false);
                    $('input[product_serial='+prod_serial+']').removeClass('disabled');
                    $('input[product_serial='+prod_serial+']').addClass('enabled');
                    $('input[product_serial='+prod_serial+']').attr('value','1');
                    $('.qty_all_'+prod_serial).attr('style','display:cell');
                    $('#addtocart_'+prod_serial).attr('data_total',tot_price);
                    $('#addtocart_'+prod_serial).attr('data_shipping',ship_price);
                    $('#addtocart_'+prod_serial).attr('data_product',p_price);
                    $('#addtocart_'+prod_serial).removeClass('disabled');
                    $('#addtocart_'+prod_serial).addClass('enabled');
                    $('#qty_txt_status').attr('style','display:cell');
                    $('input[id=qty_'+prod_serial+']').attr('max', 10);
                    $('#qty_'+prod_serial).attr('type','number');
                    $('.qty_td').attr('style','display:cell');
                  }
              }
              else if(prod_val==3){
                var p_price = Number($('input[name=con_p'+prod_serial+']').val()).toFixed(2);
                var ship_price = Number($('input[name=con_ship'+prod_serial+']').val()).toFixed(2);
                var tot_price = Number(parseFloat($('input[name=con_p'+prod_serial+']').val()) + parseFloat($('input[name=con_ship'+prod_serial+']').val())).toFixed(2);
                  $('input[product_serial='+prod_serial+']').val(1);
                  $('#p_price_'+prod_serial).attr('value',p_price);
                  $('#p_price_'+prod_serial).attr('product_price',p_price);
                  $('#p_price_'+prod_serial).html('$'+p_price);
                  $('#s_price_'+prod_serial).attr('value',ship_price);
                  $('#s_price_'+prod_serial).attr('product_s_price',ship_price);
                  $('#s_price_'+prod_serial).html('$'+ship_price);
                  $('#sub_total_'+prod_serial).html('$'+tot_price);
                  $('#addtocart_'+prod_serial).attr('module', 3);
                  if($('input[name=con_'+prod_serial+']').val()==1){
                    $('input[product_serial='+prod_serial+']').addClass('disabled');
                    $('input[product_serial='+prod_serial+']').attr("disabled", true);
                    $('.qty_all_'+prod_serial).css('display','cell');
                    $('#addtocart_'+prod_serial).removeClass('disabled');
                    $('#addtocart_'+prod_serial).attr('data_total', tot_price );
                    $('#addtocart_'+prod_serial).attr('data_product',p_price );
                    $('#addtocart_'+prod_serial).attr('data_shipping',ship_price);
                    $('#qty_'+prod_serial).attr('type','hidden');
                    if(qty_txt == 'none'){ 
                        $('#qty_txt_status').css('display','none');
                        $('.qty_all_'+prod_serial).css('display','none');
                        $('.qty_td').attr('style','display:none');
                        }
                  }else {
                    $('input[product_serial='+prod_serial+']').attr("disabled", false);
                    $('input[product_serial='+prod_serial+']').removeClass('disabled');
                    $('input[product_serial='+prod_serial+']').addClass('enabled');
                    $('input[product_serial='+prod_serial+']').attr('value','1');
                    $('.qty_all_'+prod_serial).attr('style','display:cell');
                    $('#addtocart_'+prod_serial).attr('data_total',tot_price);
                    $('#addtocart_'+prod_serial).attr('data_shipping',ship_price);
                    $('#addtocart_'+prod_serial).attr('data_product',p_price);
                    $('#addtocart_'+prod_serial).removeClass('disabled');
                    $('#addtocart_'+prod_serial).addClass('enabled');
                    $('#qty_txt_status').attr('style','display:cell');
                    $('input[id=qty_'+prod_serial+']').attr('max', 10);
                    $('#qty_'+prod_serial).attr('type','number');
                    $('.qty_td').attr('style','display:cell');
                  }
              }
            });
          //------------- Product 6 type dropdown ------------------//
            $('.prod_type_6').change(function(){
              var prod_val = $(this).val();
              var prod_serial = $(this).attr('product_serial');
              if(prod_val==0){
                $('#addtocart_'+prod_serial).addClass('disabled');
                $('input[product_serial='+prod_serial+']').removeClass('enabled');
                $('input[product_serial='+prod_serial+']').addClass('disabled');
                $('input[product_serial='+prod_serial+']').attr('disabled','disabled');
                $('#qty_'+prod_serial).attr('type','hidden');
                if(qty_txt == 'none'){ 
                    $('#qty_txt_status').css('display','none');
                    $('.qty_all_'+prod_serial).css('display','none');
                    $('.qty_td').attr('style','display:none');
                     }
                $('#p_price_'+prod_serial).html('$0.00');
                $('#s_price_'+prod_serial).html('$0.00');
                $('#sub_total_'+prod_serial).html('$0.00');
                $('input[product_serial='+prod_serial+']').val('');
                $('#addtocart_'+prod_serial).attr('module', 6);
              }
              else if(prod_val==2){
                var p_price = Number($('input[name=trl_p'+prod_serial+']').val()).toFixed(2);
                var ship_price = Number($('input[name=trl_ship'+prod_serial+']').val()).toFixed(2);
                var tot_price = Number(parseFloat($('input[name=trl_p'+prod_serial+']').val()) + parseFloat($('input[name=trl_ship'+prod_serial+']').val())).toFixed(2);
                  $('input[product_serial='+prod_serial+']').val(1);
                  $('#p_price_'+prod_serial).attr('value',p_price);
                  $('#p_price_'+prod_serial).attr('product_price',p_price);
                  $('#p_price_'+prod_serial).html('$'+p_price);
                  $('#s_price_'+prod_serial).attr('value',ship_price);
                  $('#s_price_'+prod_serial).attr('product_s_price',ship_price);
                  $('#s_price_'+prod_serial).html('$'+ship_price);
                  $('#sub_total_'+prod_serial).html('$'+tot_price);
                  $('#addtocart_'+prod_serial).attr('module', 2);
                  if($('input[name=trl_'+prod_serial+']').val()=='1'){
                    // $('input[product_serial='+prod_serial+']').css('display','none');
                    $('input[product_serial='+prod_serial+']').addClass('disabled');
                    $('input[product_serial='+prod_serial+']').attr("disabled", true);
                    $('#addtocart_'+prod_serial).removeClass('disabled');
                    $('.qty_all_'+prod_serial).css('display','cell');
                    $('#addtocart_'+prod_serial).attr('data_total', tot_price );
                    $('#addtocart_'+prod_serial).attr('data_product', p_price );
                    $('#addtocart_'+prod_serial).attr('data_shipping', ship_price);
                    $('#qty_'+prod_serial).attr('type','hidden');
                    if(qty_txt == 'none'){ 
                        $('#qty_txt_status').css('display','none');
                        $('.qty_all_'+prod_serial).css('display','none');
                        $('.qty_td').attr('style','display:none');
                        }
                  }
                  else {
                    $('input[product_serial='+prod_serial+']').attr("disabled", false);
                    $('input[product_serial='+prod_serial+']').removeClass('disabled');
                    $('input[product_serial='+prod_serial+']').addClass('enabled');
                    $('input[product_serial='+prod_serial+']').attr('value','1');
                    $('.qty_all_'+prod_serial).attr('style','display:cell');
                    $('#addtocart_'+prod_serial).attr('data_total',tot_price);
                    $('#addtocart_'+prod_serial).attr('data_shipping',ship_price);
                    $('#addtocart_'+prod_serial).attr('data_product',p_price);
                    $('#addtocart_'+prod_serial).removeClass('disabled');
                    $('#addtocart_'+prod_serial).addClass('enabled');
                    $('#qty_txt_status').attr('style','display:cell');
                    $('input[id=qty_'+prod_serial+']').attr('max', 10);
                    $('#qty_'+prod_serial).attr('type','number');
                    $('.qty_td').attr('style','display:cell');
                  }
              }
              else if(prod_val==3){
                var p_price = Number($('input[name=con_p'+prod_serial+']').val()).toFixed(2);
                var ship_price = Number($('input[name=con_ship'+prod_serial+']').val()).toFixed(2);
                var tot_price = Number(parseFloat($('input[name=con_p'+prod_serial+']').val()) + parseFloat($('input[name=con_ship'+prod_serial+']').val())).toFixed(2);
                  $('input[product_serial='+prod_serial+']').val(1);
                  $('#p_price_'+prod_serial).attr('value',p_price);
                  $('#p_price_'+prod_serial).attr('product_price',p_price);
                  $('#p_price_'+prod_serial).html('$'+p_price);
                  $('#s_price_'+prod_serial).attr('value',ship_price);
                  $('#s_price_'+prod_serial).attr('product_s_price',ship_price);
                  $('#s_price_'+prod_serial).html('$'+ship_price);
                  $('#sub_total_'+prod_serial).html('$'+tot_price);
                  $('#addtocart_'+prod_serial).attr('module', 3);
                  if($('input[name=con_'+prod_serial+']').val()==1){
                    //$('input[product_serial='+prod_serial+']').css('display','none');
                    $('input[product_serial='+prod_serial+']').addClass('disabled');
                    $('input[product_serial='+prod_serial+']').attr("disabled", true);
                    $('.qty_all_'+prod_serial).css('display','cell');
                    $('#addtocart_'+prod_serial).removeClass('disabled');
                    $('#addtocart_'+prod_serial).attr('data_total', tot_price );
                    $('#addtocart_'+prod_serial).attr('data_product', p_price );
                    $('#addtocart_'+prod_serial).attr('data_shipping', ship_price);
                    $('#qty_'+prod_serial).attr('type','hidden');
                    if(qty_txt == 'none'){ 
                        $('#qty_txt_status').css('display','none');
                        $('.qty_all_'+prod_serial).css('display','none');
                        $('.qty_td').attr('style','display:none');
                        }
                  }else {
                    $('input[product_serial='+prod_serial+']').attr("disabled", false);
                    $('input[product_serial='+prod_serial+']').removeClass('disabled');
                    $('input[product_serial='+prod_serial+']').addClass('enabled');
                    //$('input[product_serial='+prod_serial+']').css('display','block');
                    $('input[product_serial='+prod_serial+']').attr('value','1');
                    $('.qty_all_'+prod_serial).attr('style','display:cell');
                    $('#addtocart_'+prod_serial).attr('data_total',tot_price);
                    $('#addtocart_'+prod_serial).attr('data_shipping',ship_price);
                    $('#addtocart_'+prod_serial).attr('data_product',p_price);
                    $('#addtocart_'+prod_serial).removeClass('disabled');
                    $('#addtocart_'+prod_serial).addClass('enabled');
                    $('#qty_txt_status').attr('style','display:cell');
                    $('input[id=qty_'+prod_serial+']').attr('max', 10);
                    $('#qty_'+prod_serial).attr('type','number');
                    $('.qty_td').attr('style','display:cell');
                  }
              }
            });
          //-------------- QTY box --------------------//
            $('.qty').change(function(){
                var val = $(this).val();
                var p_serial = $(this).attr('product_serial');
                var p_price_id = 'p_price_'+ p_serial;
                var pp = $('#'+p_price_id).attr('product_price');
                var changed_price = ((pp * val).toFixed(2));
                var s_price = $('#s_price_'+p_serial).attr('product_s_price');
                var changed_price_with_shipping = (parseFloat(changed_price) + parseFloat(s_price)).toFixed(2);
                if(
                  $('input[name=product_type_'+p_serial+']').val()==2 || 
                  $('input[name=product_type_'+p_serial+']').val()==7 && $('#addtocart_'+p_serial).attr('module')==2 ||
                  $('input[name=product_type_'+p_serial+']').val()==4 && $('#addtocart_'+p_serial).attr('module')==2 ||
                  $('input[name=product_type_'+p_serial+']').val()==6 && $('#addtocart_'+p_serial).attr('module')==2
                  ){
                  var changed_price_with_shipping = ((val * s_price).toFixed(2)); 
                }
                $('#sub_total_'+p_serial).html('$'+changed_price_with_shipping);
                $('#sub_total_'+p_serial).attr('value', changed_price_with_shipping);
                $('#addtocart_'+p_serial).attr('data_total',changed_price_with_shipping);
                $('#addtocart_'+p_serial).attr('data_shipping',s_price);
                $('#addtocart_'+p_serial).attr('data_product',changed_price);
                $(this).attr('value', val);
                //console.log($('input[name=product_type_'+p_serial+']').val());
                if(val>0){
                  $('#addtocart_'+p_serial).removeClass('disabled');
                  $('#addtocart_'+p_serial).addClass('buy');
                } else if(val==0) {
                  $('#addtocart_'+p_serial).addClass('disabled');
                  $('#addtocart_'+p_serial).removeClass('buy');
                  $('#sub_total_'+p_serial).html('$'+'0.00');
                }
            });
          // ------------- Add to cart BTN ----------------- //
            $('.buy').click(function(){
                $(this).html('Added');
                $(this).addClass('disabled');
                //$('#pv').css('display','block');
                var current_add_to_cart_id = ($(this).attr('id')).split('_')[1];
                $('input[product_serial='+current_add_to_cart_id+']').addClass('disabled');
                $('select[product_serial='+current_add_to_cart_id+']').addClass('disabled');
                $('#dlt_'+current_add_to_cart_id).css('display','inline-block');
                var new_value = (parseFloat($(this).attr('data_total')) + parseFloat($('#final_price').attr('value'))).toFixed(2);
                $('#final_price').attr('value', new_value);
                $('input[name="order_total_value"]').attr('value', new_value);
                var new_ship_value = (parseFloat($(this).attr('data_shipping')) + parseFloat($('#shipping_subtotal').attr('value'))).toFixed(2);
                if(
                  $('input[name=product_type_'+current_add_to_cart_id+']').val()==2 ||
                  $('input[name=product_type_'+current_add_to_cart_id+']').val()==7 && $('#addtocart_'+current_add_to_cart_id).attr('module')==2 ||
                  $('input[name=product_type_'+current_add_to_cart_id+']').val()==4 && $('#addtocart_'+current_add_to_cart_id).attr('module')==2 ||
                  $('input[name=product_type_'+current_add_to_cart_id+']').val()==6 && $('#addtocart_'+current_add_to_cart_id).attr('module')==2
                  ){ 
                    var new_ship_value = (parseFloat($(this).attr('data_total')) + parseFloat($('#shipping_subtotal').attr('value'))).toFixed(2);
                    }
                $('#shipping_subtotal').attr('value', new_ship_value);
                var new_product_value = (parseFloat($(this).attr('data_product')) + parseFloat($('#product_subtotal').attr('value'))).toFixed(2);
                $('#product_subtotal').attr('value', new_product_value);
                $('#final_price').html('$'+new_value);
                $('#shipping_subtotal').html('$'+new_ship_value);
                $('#product_subtotal').html('$'+new_product_value);
                if($('input[name="multi_product_cart"]').val() == 'no'){
                    $('.delete.active').trigger("click");
                    $('#dlt_'+current_add_to_cart_id).addClass('active');
                    var mpc = 0;
                  }
                else
                  {
                    var mpc = 1;
                  }
                var mod = $(this).attr('module');
                var p_id = $(this).attr('p_id');
                var data_product = $(this).attr('data_product');
                var data_shipping = $(this).attr('data_shipping');
                var data_total = $(this).attr('data_total');
                var p_qty = $('input[product_serial='+current_add_to_cart_id+']').attr('value');
                console.log(mod,p_id,mpc,p_qty);
                show_var(mod,p_id,mpc,data_product,data_shipping,data_total);
                show_pname(mod,p_id,mpc,p_qty);
            });
          // ------------- Delete BTN ----------------- //
           $('.delete').click(function(){
              var current_dlt_id = ($(this).attr('id')).split('_')[1];
              var new_rmv_value = (parseFloat($('#final_price').attr('value')) - parseFloat($('#addtocart_'+current_dlt_id).attr('data_total'))).toFixed(2);
                $('#final_price').attr('value', new_rmv_value);
                $('input[name="order_total_value"]').attr('value', new_rmv_value);
                $('#final_price').html('$'+new_rmv_value);
              var new_rmv_ship_value = (parseFloat($('#shipping_subtotal').attr('value')) - parseFloat($('#addtocart_'+current_dlt_id).attr('data_shipping'))).toFixed(2);
                $('#shipping_subtotal').attr('value', new_rmv_ship_value);
                $('#shipping_subtotal').html('$'+new_rmv_ship_value);
              var new_rmv_prod_value = (parseFloat($('#product_subtotal').attr('value')) - parseFloat($('#addtocart_'+current_dlt_id).attr('data_product'))).toFixed(2);
                $('#product_subtotal').attr('value', new_rmv_prod_value);
                $('#product_subtotal').html('$'+new_rmv_prod_value);
             $('#dlt_'+current_dlt_id).css('display','none');   
             $('#addtocart_'+current_dlt_id).html('Add to Cart');
             $('input[product_serial='+current_dlt_id+']').removeClass('disabled');
             $('select[product_serial='+current_dlt_id+']').removeClass('disabled');
             $('input[product_serial='+current_dlt_id+']').val(1);
             $('#addtocart_'+current_dlt_id).removeClass('disabled');
             $('#addtocart_'+current_dlt_id).addClass('enabled');
              if($('input[name=qty_button_status_'+current_dlt_id+']').val() == 'disabled'){ 
                  $('#addtocart_'+current_dlt_id).removeClass('disabled');
                }
              if($('input[name="multi_product_cart"]').val() == 'no'){
                $('.delete.active').removeClass('active');
                  }
              $('#terms').css('display','inline-block;');
              var p_id = $(this).attr('p_id');
              hide_var(p_id);
              hide_pname(p_id);
           });
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
            $(document).ready(function(){
                $('#loadingMask').fadeOut();
            });
        </script>
   </body>
</html>