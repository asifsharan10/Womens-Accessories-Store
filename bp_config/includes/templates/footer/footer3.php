



<footer class="footer3 footer-background-color"  id="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="mb-5 mb-lg-0"> 
          <!--Title-->
          <h5>Our Company</h5>
          <div class="spacer primary-background-color"></div>
          <!--/Title--> 
          
          <!--Text Block-->
          <div class="footer-about">
            <p><?= $generalConfig['brand_name'] ?></p>
           <p><?= $generalConfig['corp_name'] ?></p>
          </div>
          <!--/Text Block--> 
          
        </div>
      </div>
      
            <!--Contact Block-->
      <div class="col-lg-3 col-sm-6">
        <div class="mb-5 mb-md-0"> 
          <!--Title-->
          <h5>Contact Details</h5>
          <div class="spacer primary-background-color"></div>
          <!--/Title--> 
          
          <!--Contact-->
          <ul class="contact-widget">
            <li class="d-flex">
              <div class="info"> <?= $generalConfig['phone_number'] ?></div>
            </li>
            <li class="d-flex"> 
              <div class="info"  style="word-break: break-all;"> <?= $generalConfig['email'] ?></div>
            </li>
            <li class="d-flex"> 
              <div class="info"> <?= $generalConfig['address'] ?></div>
            </li>
          </ul>
          <!--Contact--> 
        </div>
      </div>
      <!--/Contact Block--> 
      


                  <!--Contact Block-->
      <div class="col-lg-3 col-sm-6">
        <div class="mb-5 mb-md-0"> 
          <!--Title-->
          <h5>Shipping & Returns</h5>
          <div class="spacer primary-background-color"></div>
          <!--/Title--> 
          
          <!--Contact-->
          <ul class="contact-widget">
            <li class="d-flex">
              <div class="info"> <?= $generalConfig['fulfillment'] ?></div>
            </li>
            <li class="d-flex"> 
              <div class="info"> <?= $generalConfig['return_address'] ?></div>
            </li>
           
          </ul>
          <!--Contact--> 
        </div>
      </div>
      <!--/Contact Block--> 


      <div class="col-lg-3 col-sm-6 footer-nav">
        <div class="mb-5 mb-md-0"> 
          <!--Title-->
          <h5>Legal</h5>
          <div class="spacer primary-background-color"></div>
          <!--/Title-->
          
          
          
          
         <ul>
               <!--If any 1 product in shop is set to bill model 2,3,4 then cancel link enable -->
               <?php
                  $billingModel_find = array_column($products, 'billingModel');
                  // echo "<pre>";
                  // print_r($billingModel_find);
                  // if(count(array_unique($billingModel_find)) === 1) {
                  //     echo "all value same";
                  // } else {
                  //     echo "all value diff";
                  // }
                  $diff = array_diff($billingModel_find, [1]);
                  $show_ingridient_find = array_column($products, 'show_ingredients');
                  $found_ingridient = array_search('yes',$show_ingridient_find);
                  ?>
                <li><a href="index.php">Home</a></li>
               <li><a href="contact.php">Contact</a></li>
               <?php if($found_ingridient !== false) { ?>
               <li><a href="ingredients.php">Ingredients</a></li>
               <?php } ?>
               <li><a href="terms.php">Terms</a></li>
               <li><a href="privacy.php">Privacy</a></li>
               <?php if (!empty($diff)) { ?>
               <li><a href="cancellation.php">Cancellation</a></li>
               <?php } ?>
            </ul>
        </div>
      </div>
      

    </div>
    <div class="row text-center mt-5">
      <div class="footer-cc">
            <?php if ($card_type['master'] == 'yes') { ?> <img
                    src="./bp_config/images/payment/CardSet<?= $pageConfig['creditCardIcons'] ?>/mastercard.png"> <?php } ?>
            <?php if ($card_type['discover'] == 'yes') { ?><img
                src="./bp_config/images/payment/CardSet<?= $pageConfig['creditCardIcons'] ?>/discover.png"> <?php } ?>
            <?php if ($card_type['visa'] == 'yes') { ?><img
                src="./bp_config/images/payment/CardSet<?= $pageConfig['creditCardIcons'] ?>/visa.png"> <?php } ?>
        </div>
    </div>
  </div>
  <div class="copyright text-center mt-5">
    <div class="container">
      <p>&copy; <?php echo date("Y"); ?> <?= $generalConfig['brand_name'] ?></p>
      <div class="corp"><?= $generalConfig['corp_name'] ?></div>
    </div>
  </div>
  
  
  
    <?php if($found_ingridient !== false) { //if any one active product has the 'show_ingredients' => 'yes', then show it?>   
      <div class="container pt-4">
        <p>The statements made on our websites have not been evaluated by the FDA (U.S. Food & Drug Administration). This product is not intended to diagnose, cure or prevent any disease. The information provided by this website, email, or this company is not a substitute for a face-to-face consultation with your health care professional and should not be construed as individual medical advice. If there is a change in your medical condition, please stop using our product immediately and consult your health care professional. Do not use if safety seal is broken or missing. For adult use only, keep out of reach of children under 18 years of age.</p>
      </div>
    <?php } ?>
  
  
  
  
</footer>
