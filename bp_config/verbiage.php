<?php
error_reporting(0);
// $configFilePath = 'site-info.php';
$configFilePath = __DIR__ . DIRECTORY_SEPARATOR . 'site-info.php';
if (file_exists($configFilePath)) {
   require_once $configFilePath;
} else {
   echo 'General configuration error';
}

$product_name = "";
echo $billing_module = $_REQUEST['mod'];
echo $pid =   $_REQUEST['pid'];
echo $data_product = $_REQUEST['data_product'];
echo $data_shipping = $_REQUEST['data_shipping'];
echo $data_total = $_REQUEST['data_total'];

//$billing_module = 1;
foreach ($products as $key => $value) {
   foreach ($value as $k => $v) {
      if ($v == 'active') {
         $p = $key;
         $product = $products[$p];
         // echo "<pre>";
         // print_r($product);
         // For Straight Sale
?>
         <?php
         if ($product['billingModel'] == 1) {
            if ($product['straightSaleMultiPrice'] == 'yes') {
               $option_price_array = array_column($product['shop_option'], 'option_price');
               $option_quantity_array = array_column($product['shop_option'], 'option_quantity');
               $price_quant_combined_arr = array_combine($option_quantity_array, $option_price_array);
               // echo "<pre>";
               // print_r($price_quant_combined_arr);
               $string = '';
               // foreach ($option_price_array as $key => $value) {
               // $string .= 'By placing an order you will be billed $'. sprintf("%.2f",($value + $product['ssShipping'])).' ($'. sprintf("%.2f", $value) .' + $'. sprintf("%.2f",$product['ssShipping']) .' for shipping) for '. $product['name'].' ('.$quantityval.').This is a one-time purchase. Shipment via '. $generalConfig["shipping_carrier"] .' typically takes '. $generalConfig["shipping_period"] .' business days. Your credit card will be billed as “'. $generalConfig['descriptor'] .'” on your statement.<br><br>';
               // } 
               foreach ($price_quant_combined_arr as $key => $value) {
                  if ($pageConfig['displayShippingPrice'] == "yes")
                     $string .= 'By placing an order you will be billed $' . sprintf("%.2f", ($value + $product['ssShipping'])) . ' ($' . sprintf("%.2f", $value) . ' + $' . sprintf("%.2f", $product['ssShipping']) . ' for shipping) for ' . $product['name'] . ' (' . $key . '). This is a one-time purchase. Shipment via ' . $generalConfig["shipping_carrier"] . ' typically takes ' . $generalConfig["shipping_period"] . ' business days. Your credit card will be billed as “' . $generalConfig['descriptor'] . '” on your statement.<br><br>';
                  else
                     $string .= 'By placing an order you will be billed $' . sprintf("%.2f", ($value + $product['ssShipping'])) . ' for shipping) for ' . $product['name'] . ' (' . $key . '). This is a one-time purchase. Shipment via ' . $generalConfig["shipping_carrier"] . ' typically takes ' . $generalConfig["shipping_period"] . ' business days. Your credit card will be billed as “' . $generalConfig['descriptor'] . '” on your statement.<br><br>';
               }
         ?>
               <div class="terms_cond" style="display:none;">
                  <p><?= $product['name']; ?> <?php if ($pageConfig['displayBillingModel'] == 'yes') {
                                                   echo (" - " . $generalConfig['naming_convention']['1']);
                                                } ?></p> <?php
                                                         echo $typeA_multiprice = $string . '</div>';
                                                      } else { ?>
                  <div class="terms_cond" style="display:none;">
                     <p><?= $product['name']; ?> <?php if ($pageConfig['displayBillingModel'] == 'yes') {
                                                            echo (" - " . $generalConfig['naming_convention']['1']);
                                                         } ?></p>
                  <?php
                                                         if ($pageConfig['displayShippingPrice'] == "yes")
                                                            echo $typeA = 'By placing an order you will be billed $' . sprintf("%.2f", ($product['ssPrice'] + $product['ssShipping'])) . ' ($' . sprintf("%.2f", $product['ssPrice']) . ' + $' . sprintf("%.2f", $product['ssShipping']) . ' for shipping). This is a one-time purchase. Shipment via ' . $generalConfig["shipping_carrier"] . ' typically takes ' . $generalConfig["shipping_period"] . ' business days. Your credit card will be billed as “' . $generalConfig['descriptor'] . '” on your statement.<br><br></div>';
                                                         else
                                                            echo $typeA = 'By placing an order you will be billed $' . sprintf("%.2f", ($product['ssPrice'] + $product['ssShipping'])) . ' for shipping). This is a one-time purchase. Shipment via ' . $generalConfig["shipping_carrier"] . ' typically takes ' . $generalConfig["shipping_period"] . ' business days. Your credit card will be billed as “' . $generalConfig['descriptor'] . '” on your statement.<br><br></div>';
                                                      }
                                                   }
                                                   if ($product['billingModel'] == 2) { ?>
                  <div class="terms_cond" style="display:none;">
                     <p><?= $product['name']; ?> <?php if ($pageConfig['displayBillingModel'] == 'yes') {
                                                         echo (" - " . $generalConfig['naming_convention']['2']);
                                                      } ?></p>
                  <?php
                                                      // For Trial
                                                      echo $typeB = '
            By placing an order, you agree to the full terms and conditions and privacy policy as well as enrollment into our monthly auto-ship program where you will immediately be billed the shipping and handling amount of $' . sprintf("%.2f", ($product['trialShipping'])) . ' 
            and we will immediately ship you a bottle of ' . $product["name"] . '. You have a ' . $generalConfig["trial_period"] . ' day ' . $generalConfig["trial_period_breakdown"] . ' trial period. Your trial will begin upon receipt of ' . $product["name"] . '. After your ' . $generalConfig["trial_period"] . ' day ' . $generalConfig["trial_period_breakdown"] . ' trial period has ended, your credit card will then be automatically charged the full retail price of $' . sprintf("%.2f", $product["trialRebillPrice"]) . ' and you will be shipped a recurring supply of ' . $product["name"] . ' every 30 days unless you take action to cancel your trial. For all MasterCard transactions ONLY, you will receive an email requiring your response to activate the monthly auto-ship program. If you are happy with ' . $product["name"] . ', you are required to consent to the monthly auto-ship program in order to receive additional ' . $product["name"] . '. You will be charged $' . sprintf("%.2f", ($product["trialRebillPrice"] + $product["trialRebillShippingPrice"])) . ' ($' . sprintf("%.2f", ($product["trialRebillPrice"])) . ' + $' . sprintf("%.2f", ($product["trialRebillShippingPrice"])) . ' for shipping) for each recurring product that has shipped to you until you cancel. If our product is not right for you, simply call  ' . $generalConfig["phone_number"] . ' or contact us via email at ' . $generalConfig["email"] . ', or click on the cancellation link to cancel your auto-ship membership. Shipment via ' . $generalConfig["shipping_carrier"] . ' typically takes ' . $generalConfig["shipping_period"] . ' business days. Your credit card will be billed as ' . $generalConfig["descriptor"] . ' on your statement.<br><br></div>          
            ';
                                                   }
                                                   if ($product['billingModel'] == 3) { ?>
                     <div class="terms_cond" style="display:none;">
                        <p><?= $product['name']; ?> <?php if ($pageConfig['displayBillingModel'] == 'yes') {
                                                         echo (" - " . $generalConfig['naming_convention']['3']);
                                                      } ?>
                           <p />
                        <?php
                                                      // For Continuity
                                                      echo $typeC = '
            By placing an order you will immediately be billed $' . sprintf("%.2f", ($product['continuityPrice'] + $product['continuityShipping'])) . ' ($' . sprintf("%.2f", $product['continuityPrice']) . ' + $' . sprintf("%.2f", $product['continuityShipping']) . ' for shipping) and we will immediately ship you a supply of ' . $product['name'] . '. Your credit card will be automatically charged the full retail price of $' . sprintf("%.2f", ($product['continuityPrice'] + $product['continuityShipping'])) . ' ($' . sprintf("%.2f", $product['continuityPrice']) . ' + $' . sprintf("%.2f", $product['continuityShipping']) . ' for shipping) and you will be shipped a recurring supply of ' . $product['name'] . '  every 30 days unless you take action to cancel your subscription. If our product is not right for you, simply call ' . $generalConfig['phone_number'] . ' or contact us via email at ' . $generalConfig['email'] . ' to cancel your auto-ship membership. Shipment via ' . $generalConfig['shipping_carrier'] . ' typically takes ' . $generalConfig['shipping_period'] . ' business days. Your credit card will be billed as ' . $generalConfig['descriptor'] . ' on your statement.<br><br></div>
            ';
                                                   }
                                                   if ($product['billingModel'] == 8) { ?>
                        <div class="terms_cond" style="display:none;">
                           <p><?= $product['name']; ?> <?php if ($pageConfig['displayBillingModel'] == 'yes') {
                                                            echo (" - " . $generalConfig['naming_convention']['2']);
                                                         } ?></p>
                        <?php
                                                      // For Trial
                                                      echo $typeB = '
                   By placing an order, you will immediately be billed the shipping and handling amount of $' . sprintf("%.2f", ($product['trialShipping'])) . ' and we will immediately ship you a one-time supply of ' . $product["name"] . '. You have a ' . $generalConfig["trial_period"] . ' day trial period. Your trial will begin the day you receive ' . $product["name"] . '. After your ' . $generalConfig["trial_period"] . ' day trial period has ended, your credit card will then be automatically charged a one-time full retail price of $' . sprintf("%.2f", $product["trialRebillPrice"]) . '. For all MasterCard transactions ONLY, you will receive an email requiring your response to accept the charge of the full retail price of $' . sprintf("%.2f", $product["trialRebillPrice"]) . '. If you are happy with ' . $product["name"] . ', you are required to consent to the charge for the full retail price of $' . sprintf("%.2f", $product["trialRebillPrice"]) . '. If our product is not right for you, simply call ' . $generalConfig["phone_number"] . ' or contact us via email at ' . $generalConfig["email"] . ' or click on the <a href="/cancellation.php" target="_blank">cancellation</a> link to cancel your order. Shipment via USPS typically takes ' . $generalConfig["shipping_period"] . ' business days. Your credit card will be billed as ' . $generalConfig["descriptor"] . ' on your statement.<br><br></div>
                   ';
                                                   }
                                                   if ($product['billingModel'] == 1 && $billing_module == 1 && $product['id'] == $pid) { ?>
                           <div id="pid<?= $pid ?>">
                              <b><input type="checkbox" class="prod_v_p" id="<?= $pid ?>" value="<?= $product['name']; ?>" p_name="<?= $product['name']; ?> Straight Sale"> <?= $product['name']; ?> - Straight Sale</b><br />
                              <?= $typeA ?>
                              <br /><br />
                           </div>
                        <?php }
                                                   if (($product['billingModel'] == 2  && $billing_module == 2 && $product['id'] == $pid) || ($product['billingModel'] == 8  && $billing_module == 2 && $product['id'] == $pid)) { ?>
                           <div id="pid<?= $pid ?>">
                              <b><input type="checkbox" class="prod_v_p" id="<?= $pid ?>" value="<?= $product['name']; ?>" p_name="<?= $product['name']; ?> Trl"> <?= $product['name']; ?> - Trial</b><br />
                              <?= $typeB ?>
                              <br /><br />
                           </div>
                        <?php }
                                                   if ($product['billingModel'] == 3 && $billing_module == 3 && $product['id'] == $pid) { ?>
                           <div id="pid<?= $pid ?>">
                              <b><input type="checkbox" class="prod_v_p" id="<?= $pid ?>" value="<?= $product['name']; ?>" p_name="<?= $product['name']; ?> Cntnty"> <?= $product['name']; ?> - Continuity</b><br />
                              <?= $typeC ?>
                              <br /><br />
                           </div>
                        <?php }
                                                   if ($product['billingModel'] == 4 && $billing_module == 1 && $product['id'] == $pid) { ?>
                           <div id="pid<?= $pid ?>">
                              <b><input type="checkbox" class="prod_v_p" id="<?= $pid ?>" value="<?= $product['name']; ?>" p_name="<?= $product['name']; ?> Straight Sale"> <?= $product['name']; ?> - Straight Sale</b><br />
                              <?= $typeA ?>
                              <br /><br />
                           </div>
                        <?php }
                                                   if ($product['billingModel'] == 4 && $billing_module == 2 && $product['id'] == $pid) { ?>
                           <div id="pid<?= $pid ?>">
                              <b><input type="checkbox" class="prod_v_p" id="<?= $pid ?>" value="<?= $product['name']; ?>" p_name="<?= $product['name']; ?> Trl"> <?= $product['name']; ?> - Trial</b><br />
                              <?= $typeB ?>
                              <br /><br />
                           </div>
                        <?php }
                                                   if ($product['billingModel'] == 5 && $billing_module == 1 && $product['id'] == $pid) { ?>
                           <div id="pid<?= $pid ?>">
                              <b><input type="checkbox" class="prod_v_p" id="<?= $pid ?>" value="<?= $product['name']; ?>" p_name="<?= $product['name']; ?> Straight Sale"> <?= $product['name']; ?> - Straight Sale</b><br />
                              <?= $typeA ?>
                              <br /><br />
                           </div>
                        <?php }
                                                   if ($product['billingModel'] == 5 && $billing_module == 3 && $product['id'] == $pid) { ?>
                           <div id="pid<?= $pid ?>">
                              <b><input type="checkbox" class="prod_v_p" id="<?= $pid ?>" value="<?= $product['name']; ?>" p_name="<?= $product['name']; ?> Cntnty"> <?= $product['name']; ?> - Continuity</b><br />
                              <?= $typeC ?>
                              <br /><br />
                           </div>
                        <?php }
                                                   if ($product['billingModel'] == 6 && $billing_module == 2 && $product['id'] == $pid) { ?>
                           <div id="pid<?= $pid ?>">
                              <b><input type="checkbox" class="prod_v_p" id="<?= $pid ?>" value="<?= $product['name']; ?>" p_name="<?= $product['name']; ?> Trl"> <?= $product['name']; ?> - Trial</b><br />
                              <?= $typeB ?>
                              <br /><br />
                           </div>
                        <?php }
                                                   if ($product['billingModel'] == 6 && $billing_module == 3 && $product['id'] == $pid) { ?>
                           <div id="pid<?= $pid ?>">
                              <b><input type="checkbox" class="prod_v_p" id="<?= $pid ?>" value="<?= $product['name']; ?>" p_name="<?= $product['name']; ?> Cntnty"> <?= $product['name']; ?> - Continuity</b><br />
                              <?= $typeC ?>
                              <br /><br />
                           </div>
                        <?php }
                                                   if ($product['billingModel'] == 7 && $billing_module == 1 && $product['id'] == $pid) { ?>
                           <div id="pid<?= $pid ?>">
                              <b><input type="checkbox" class="prod_v_p" id="<?= $pid ?>" value="<?= $product['name']; ?>" p_name="<?= $product['name']; ?> Straight Sale"> <?= $product['name']; ?> - Straight Sale</b><br />
                              <?= $typeA ?>
                              <br /><br />
                           </div>
                        <?php }
                                                   if ($product['billingModel'] == 7 && $billing_module == 2 && $product['id'] == $pid) { ?>
                           <div id="pid<?= $pid ?>">
                              <b><input type="checkbox" class="prod_v_p" id="<?= $pid ?>" value="<?= $product['name']; ?>" p_name="<?= $product['name']; ?> Trl"> <?= $product['name']; ?> - Trial</b><br />
                              <?= $typeB ?>
                              <br /><br />
                           </div>
                        <?php }
                                                   if ($product['billingModel'] == 7 && $billing_module == 3 && $product['id'] == $pid) { ?>
                           <div id="pid<?= $pid ?>">
                              <b><input type="checkbox" class="prod_v_p" id="<?= $pid ?>" value="<?= $product['name']; ?>" p_name="<?= $product['name']; ?> Cntnty"> <?= $product['name']; ?> - Continuity</b><br />
                              <?= $typeC ?>
                              <br /><br />
                           </div>
               <?php
                                                   }
                                                }
                                             }
                                          }
               ?>



               <!DOCTYPE html>
               <html>

               <head>
                  <title><?= $generalConfig['brand_name'] ?></title>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
               </head>

               <body>
                  <div id="term_area"></div>
                  <?php
                  $showTrialContinuityVerbiage = false;

                  foreach ($products as $product) {
                     if ($product['status'] == 'active' && $product['billingModel'] != 1) {
                        $showTrialContinuityVerbiage = true;
                     }
                  }
                  ?>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
                  <script type="text/javascript">
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

                        let pdtTerms = "";
                        cartPdtArrNew.forEach(function(f) {
                           console.log(f);
                           if (f.Saletype == 1) {
                              <?php if ($pageConfig['displayShippingPrice'] == "yes") { ?>
                                 pdtTerms += '<div class="terms_col" id="terms-' + f.Id + '" data-bill="1"><input type="checkbox" id="prod_agree-' + f.Id + '" name="prod_agree" class="ss_agree-' + f.Id + '" value="agree">&nbsp;By placing an order you will be billed $<span class="total_price">' + f.Total + '</span> ($<span class="total_price">' + f.Total + '</span> + $<span id="ship_price">' + f.Ship + '</span> for shipping) for <span id="prod_name">' + f.Name + '</span>. This is a one-time purchase. Shipment via <?php echo $generalConfig["shipping_carrier"]; ?> typically takes <?php echo $generalConfig["shipping_period"]; ?> business days. Your credit card will be billed as “<?php echo $generalConfig["descriptor"]; ?>” on your statement.</div><br/>';
                              <?php } else { ?>
                                 pdtTerms += '<div class="terms_col" id="terms-' + f.Id + '" data-bill="1"><input type="checkbox" id="prod_agree-' + f.Id + '" name="prod_agree" class="ss_agree-' + f.Id + '" value="agree">&nbsp;By placing an order you will be billed $<span class="total_price">' + f.Total + ' for <span id="prod_name">' + f.Name + '</span>. This is a one-time purchase. Shipment via <?php echo $generalConfig["shipping_carrier"]; ?> typically takes <?php echo $generalConfig["shipping_period"]; ?> business days. Your credit card will be billed as “<?php echo $generalConfig["descriptor"]; ?>” on your statement.</div><br/>';
                              <?php } ?>

                           }
                           <?php if ($showTrialContinuityVerbiage) { ?>
                              if (f.Saletype == 2) {
                                 if (f.billModel == 2) {
                                    var trl_total_prc = parseFloat(+f.Rbllprice + +f.trlRbllShippingPrice).toFixed(2);
                                    pdtTerms += '<div class="terms_col" id="terms-' + f.Id + '" data-bill="2"><input type="checkbox" id="prod_agree-' + f.Id + '" name="prod_agree" class="trl_agree-' + f.Id + '" value="agree">&nbsp;By placing an order, you agree to the full terms and conditions and privacy policy as well as enrollment into our monthly auto-ship program where you will immediately be billed the shipping and handling amount of $' + f.Total + ' and we will immediately ship you a bottle of ' + f.Name + '. You have a <?php echo $generalConfig["trial_period"]; ?> day <?php echo $generalConfig["trial_period_breakdown"]; ?> trial period. Your trial will begin upon receipt of ' + f.Name + '. After your <?php echo $generalConfig["trial_period"]; ?> day <?php echo $generalConfig["trial_period_breakdown"]; ?> trial period has ended, your credit card will then be automatically charged the full retail price of $' + f.Rbllprice + ' and you will be shipped a recurring supply of ' + f.Name + ' every 30 days unless you take action to cancel your trial. For all MasterCard transactions ONLY, you will receive an email requiring your response to activate the monthly auto-ship program. If you are happy with ' + f.Name + ', you are required to consent to the monthly auto-ship program in order to receive additional ' + f.Name + '. You will be charged $' + trl_total_prc + '($' + f.Rbllprice + ' + $' + f.trlRbllShippingPrice + ') for shipping for each recurring product that has shipped to you until you cancel. If our product is not right for you, simply call  <?php echo $generalConfig["phone_number"]; ?> or contact us via email at <?php echo $generalConfig["email"]; ?>, or click on the cancellation link to cancel your auto-ship membership. Shipment via <?php echo $generalConfig["shipping_carrier"]; ?> typically takes <?php echo $generalConfig["shipping_period"]; ?> business days. Your credit card will be billed as <?php echo $generalConfig["descriptor"]; ?> on your statement.</div><br/>';
                                 } else if (f.billModel == 8) {
                                    var trl_total_prc = parseFloat(+f.Rbllprice + +f.trlRbllShippingPrice).toFixed(2);
                                    pdtTerms += '<div class="terms_col" id="terms-' + f.Id + '" data-bill="8"><input type="checkbox" id="prod_agree-' + f.Id + '" name="prod_agree" class="trl_agree-' + f.Id + '" value="agree">&nbsp;By placing an order, you will immediately be billed the shipping and handling amount of $' + f.Trlship + ' and we will immediately ship you a one-time supply of ' + f.Name + '. You have a <?php echo $generalConfig["trial_period"]; ?> day trial period. Your trial will begin the day you receive ' + f.Name + '. After your <?php echo $generalConfig["trial_period"]; ?> day trial period has ended, your credit card will then be automatically charged a one-time full retail price of $' + f.Rbllprice + '. For all MasterCard transactions ONLY, you will receive an email requiring your response to accept the charge of the full retail price of $' + f.Rbllprice + '. If you are happy with ' + f.Name + ', you are required to consent to the charge for the full retail price of $' + f.Rbllprice + '. If our product is not right for you, simply call <?php echo $generalConfig["phone_number"]; ?> or contact us via email at <?php echo $generalConfig["email"]; ?> or click on the <a href="/cancellation.php" target="_blank">cancellation</a> link to cancel your order. Shipment via USPS typically takes <?php echo $generalConfig["shipping_period"]; ?> business days. Your credit card will be billed as <?php echo $generalConfig["descriptor"]; ?> on your statement.</div><br/>';
                                 }
                              }
                              if (f.Saletype == 3) {
                                 pdtTerms += '<div class="terms_col" id="terms-' + f.Id + '" data-bill="3"><input type="checkbox" id="prod_agree-' + f.Id + '" name="prod_agree" class="cont_agree-' + f.Id + '" value="agree">&nbsp;By placing an order you will immediately be billed $' + f.Total + ' ($' + f.Total + ' + $' + f.Ship + ' for shipping) and we will immediately ship you a supply of ' + f.Name + '. Your credit card will be automatically charged the full retail price of $' + f.Total + ' ($' + f.Total + ' + $' + f.Ship + ' for shipping) and you will be shipped a recurring supply of ' + f.Name + '  every 30 days unless you take action to cancel your subscription. If our product is not right for you, simply call <?php echo $generalConfig["phone_number"]; ?> or contact us via email at <?php echo $generalConfig["email"]; ?> to cancel your auto-ship membership. Shipment via <?php echo $generalConfig["shipping_carrier"]; ?> typically takes <?php echo $generalConfig["shipping_period"]; ?> business days. Your credit card will be billed as <?php echo $generalConfig["descriptor"]; ?> on your statement.</div><br/>';
                              }
                           <?php } ?>
                        });
                        var cart_total = sessionStorage.getItem('cartTotal');
                        var ship_total = sessionStorage.getItem('shipping');
                        totTerms = '<div class="terms_col" id="terms-total"><input type="checkbox" id="prod_agree-total" name="prod_agree" class="total_agree" value="agree">&nbsp;You agree with <a href="terms.php" target="_blank">Terms and Conditions</a> and <a href="privacy.php" target="_blank">Privacy Policy</a>. By placing an order you will immediately be billed $<span class="total_price">' + cart_total + '</span> ($<span class="total_price">' + (cart_total - ship_total).toFixed(2) + '</span> + $<span id="ship_price">' + ship_total + '</span> for shipping) for your order </span>.  Shipment via <?php echo $generalConfig["shipping_carrier"]; ?> typically takes <?php echo $generalConfig["shipping_period"]; ?> business days. Your credit card will be billed as “<?php echo $generalConfig["descriptor"]; ?>” on your statement.</div><br/>';

                        // $("#term_area").html(pdtTerms);
                        // $("#prodTerms").html(pdtTerms);
                        $('#prodTerms').empty().html(pdtTerms);
                        $('#totalTerms').empty().html(totTerms);
                     });
                  </script>
               </body>

               </html>