<div class="col-12">
   <div class="customDataTable">
      <div class="w-100 d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-between justify-content-xl-between align-items-center flex-wrap">
      </div>
      <div class="table w-100 my-3 dt-table">
         <table class="table dataTable">
            <thead>
               <tr>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Base Price</th>
                  <th>Shipping Price</th>
                  <th>Sub total</th>
                  <th align="right" id="qty_txt_status" style="<?= $qty_disable ?>"><span >Qty</span></th>
                  <th align="right"></th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $count = 1;
                  $qty_text = 'none';
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
                  <td><img src="<?= $path['images']; ?>/<?= $product['image']; ?>" class="imgThumb"></td>
                  <td style="max-width: 200px;"><span class="product-name"><?= $product['name']; ?></span></td>
                  <td><span class="product-name"><?= $product_type; ?></span></td>
                  <td><span class="product-price" id="p_price_<?= $count; ?>" product_price="<?= $pprice; ?>">$<?= $pprice; ?></span></td>
                  <td><span class="product-price" id="s_price_<?= $count; ?>" product_s_price="<?= $sprice; ?>">$<?= $sprice; ?></span></td>
                  <td><span class="product-price" id="sub_total_<?= $count; ?>" value="<?= ($pprice + $sprice); ?>">
                     $<?=  sprintf("%.2f", $data_total); ?>
                     </span> 
                  </td>
                  <td align="right" class="qty_all_<?= $count ?> qty_td" style="<?= $qty_disable ?>">
                     <span class="qty_all_<?= $count ?> qty_span">
                     <input type="<?= $quantity_button_type; ?>" value="<?= $qty_value ?>"  min="0" max="<?= $max_qty; ?>" id="qty_<?= $count ?>" product_serial="<?= $count ?>"  class="qty quentity <?= $quantity_button_status; ?>" <?= $quantity_button_status; ?> />
                     </span>
                  </td>
                  <td align="right">    
                     <a href="javascript:void(0);" id="addtocart_<?= $count; ?>" data_total="<?= $data_total; ?>" data_shipping="<?= $data_shipping; ?>" data_product="<?= $data_product; ?>" class="addTOCart buy <?= $atc_status; ?>" p_id="<?= $product['id'] ?>" module="<?= $product['billingModel'] ?>">Add to Cart</a>
                     <a href="javascript:void(0);" class="delete ml-4" id="dlt_<?= $count; ?>" style="display:none;" p_id="<?= $product['id'] ?>"><img height="25" width="25" src="<?= $path['images']; ?>/delete.png"></a>
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
                  }
                  $count = $count + 1; 
                  }
                  ?>
               <input type="hidden" id="qty_textt" value="<?= $qty_text ?>"/>
            </tbody>
            <tfoot></tfoot>
         </table>
      </div>
   </div>
</div>