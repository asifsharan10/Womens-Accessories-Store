<div class="col-12">
   <div class="order-heading py-3 px-4 d-flex justify-content-between rounded-2 mt-5 mb-4">
      <span class="text-white font-weight-normal">Order Info</span>
   </div>
   <form class="w-100 order-form" id="order_form" method="POST">
      <div class="row">
         <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h3 class="form-heading mb-3">Billing Details</h3>
            <div class="row">
               <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                  <div class="form-group">
                     <label>Frist Name:<sup>*</sup></label>
                     <input type="text" class="form-control" name="firstName" placeholder="Frist Name" value="<?= $_POST['firstName'] ?>" >
                  </div>
               </div>
               <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                  <div class="form-group">
                     <label>Last Name:<sup>*</sup></label>
                     <input type="text" class="form-control"  name="lastName" placeholder="Last Name" value="<?= $_POST['lastName'] ?>">
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label>Company Name: (optional)</label>
               <input type="text" class="form-control" placeholder="Company Name">
            </div>
            <div class="form-group">
               <label>Street Address:<sup>*</sup></label>
               <input type="text" class="form-control"  name="shippingAddress1" placeholder="Street Address" value="<?= $_POST['shippingAddress1'] ?>">
            </div>
            <div class="form-group">
               <label>Town/City:<sup>*</sup></label>
               <input type="text" class="form-control" name="shippingCity" placeholder="Town/City" value="<?= $_POST['shippingCity'] ?>">
            </div>
            <div class="form-group">
               <label>Country:<sup>*</sup></label>
               <input type="text" class="form-control" name="shippingCountry" placeholder="Country" value="<?= $_POST['shippingCountry'] ?>">
            </div>
            <div class="form-group">
               <label>State:<sup>*</sup></label>
               <input type="text" class="form-control" name="shippingState" placeholder="State"  maxlength="5" onkeyup="javascript:this.value=this.value.replace(/[^0-9]/g,'');" value="<?= $_POST['shippingState'] ?>">
            </div>
            <div class="form-group">
               <label>ZIP:<sup>*</sup></label>
               <input type="text" class="form-control" name="shippingZip" placeholder="Zip Code"  maxlength="5" onkeyup="javascript:this.value=this.value.replace(/[^0-9]/g,'');" value="<?= $_POST['shippingZip'] ?>">
            </div>
            <div class="form-group">
               <label>Phone:<sup>*</sup></label>
               <input type="tel" class="form-control"  name="phone" placeholder="e.g. 123" data-min-length="10" data-max-length="15" onkeyup="javascript:this.value=this.value.replace(/[^0-9]/g,'');" maxlength="10" value="<?= $_POST['phone'] ?>">
            </div>
            <div class="form-group">
               <label>Email Address:<sup>*</sup></label>
               <input type="email" class="form-control" name="email" placeholder="ex@info.com" value="<?= $_POST['email'] ?>">
            </div>
            <h3 class="form-heading mt-5 mb-3">Additional Information</h3>
            <div class="form-group">
               <label>Order Notes:(optional)</label>
               <textarea placeholder="Order Notes"></textarea>
            </div>
         </div>
         <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h3 class="form-heading mb-3">Your Order</h3>
            <table class="table mb-5">
               <thead>
                  <tr>
                     <th></th>
                     <th></th>
                     <th>Total</th>
                  </tr>
               </thead>
               <tbody>
               </tbody>
               <tfoot>
                  <tr>
                     <td colspan="2">Shipping Subtotal</td>
                     <td id="shipping_subtotal" value='0.00'>$00.00</td>
                  </tr>
                  <tr>
                     <td colspan="2">Product Subtotal</td>
                     <td id="product_subtotal" value='0.00'>$00.00</td>
                  </tr>
                  <tr>
                     <td colspan="2">Order Total</td>
                     <td id="final_price"  value='0.00'>$00.00</td>
                     <input type="hidden" name="order_total_value" value=""/>
                  </tr>
               </tfoot>
            </table>
            <div class="payment mb-4">
               <div class="payment-header d-flex justify-content-between px-3 py-3 align-items-center">
                  <label class="mb-0">
                     <!-- <input type="radio" name="payment" id="radio1"> -->
                     <span for="radio1"></span>
                     Payment Details
                  </label>
                  <div class="d-inline-flex">
                     <?php if($card_type['master']=='yes'){ ?> <img src="./bp_config/images/payment/CardSet<?= $pageConfig['creditCardIcons'] ?>/mastercard.png"> <?php } ?>
                     <?php if($card_type['discover']=='yes'){ ?><img src="./bp_config/images/payment/CardSet<?= $pageConfig['creditCardIcons'] ?>/discover.png"> <?php } ?>
                     <?php if($card_type['visa']=='yes'){ ?><img src="./bp_config/images/payment/CardSet<?= $pageConfig['creditCardIcons'] ?>/visa.png"> <?php } ?>
                  </div>
               </div>
               <div class="payment-form px-3 py-3 row m-0">
                  <div class="col-12">
                     <div class="form-group">
                        <input type="tel" class="form-control" name="cc_no" maxlength="16" onkeyup="javascript:this.value=this.value.replace(/[^0-9]/g,'');" value="" placeholder="Card No">
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-group">
                        <select class="form-control" name="cc_month" maxlength="2" placeholder="Month(MM)">
                           <option value="" selected="selected">Month(MM)</option>
                           <?php for($month=01; $month<13; $month = $month + 1){ ?>
                           <option value=<?= $month ?>><?= sprintf("%02d", $month); ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-group">
                        <select class="form-control" name="cc_year" maxlength="4" placeholder="Year(YYYY)">
                           <option value="" selected="selected">Year(YYYY)</option>
                           <?php  $c_year = date('Y'); 
                              for($year = $c_year; $year < ($c_year + 11); $year = $year + 1){ ?>
                           <option value=<?= $year ?>> <?= $year ?> </option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-group mb-0">
                        <input type="tel" class="form-control" name="CVV" maxlength="3" onkeyup="javascript:this.value=this.value.replace(/[^0-9]/g,'');" placeholder="CVV" value="">  
                     </div>
                  </div>
                  <div class="col-6">
                     <a href="javascript:void(0)" onClick="popop_cvv()" class="ml-4 cvv" >
                     What is This 
                     </a>
                  </div>
               </div>
            </div>
            <div class="form-btn p-4">
               <?php if($pageConfig['checkoutPage']['show_terms_checkbox']=="yes") {  ?>
               <label for="vehicle1" class="agree">
               <input type="checkbox" id="iagree" name="agree" value="agree">
               I agree with <a href="javascript:void(0)" onClick="popop_shower('terms.php')">Terms and Conditions</a> and <a href="javascript:void(0)" onClick="popop_shower('privacy.php')">Privacy Policy.</a>
               </label>
               <input type="hidden" id="checkbox_type" value="<?= $pageConfig['checkoutPage']['show_terms_checkbox'] ?>"/>
               <br/>
               <?php } ?>
               <label for="vehicle1" id="pv" class="agree" style="display:none;">
                  <span id="verbiagee"></span>
                  <!-- <?= $verbiage ?> -->
               </label>
               <input type="submit" id="place_order" name="" value="Place order">
            </div>
         </div>
      </div>
   </form>
</div>