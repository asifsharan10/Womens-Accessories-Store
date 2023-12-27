<footer class="footer footer15 footer-background-color" id="footer">
   <div class="container">
    
   
    <div class="w-100 footer-brand-name row">
          <!--Title-->
          <div class="col-lg-6 d-flex align-items-center">
            <h5 class="my-4"><?= $generalConfig['brand_name'] ?></h5>
          </div>
          <div class="col-lg-6">
          <?php
            $billingModel_find = array_column($products, 'billingModel');
            $diff = array_diff($billingModel_find, [1]);
            $show_ingridient_find = array_column($products, 'show_ingredients');
            $found_ingridient = array_search('yes',$show_ingridient_find);
            ?>
            <?php if($found_ingridient !== false) { //if any one active product has the 'show_ingredients' => 'yes', then show it?> 
                <div class="container mt-5 p-0">
                    <p>The statements made on our websites have not been evaluated by the FDA (U.S. Food & Drug Administration). This product is not intended to diagnose, cure or prevent any disease. The information provided by this website, email, or this company is not a substitute for a face-to-face consultation with your health care professional and should not be construed as individual medical advice. If there is a change in your medical condition, please stop using our product immediately and consult your health care professional. Do not use if safety seal is broken or missing. For adult use only, keep out of reach of children under 18 years of age.</p>
                </div>
            <?php } ?>
          </div>   
    </div>

    <div class="row">
      <!--Contact Block-->
      <div class="col-lg-3 col-sm-6 mt-4 footer-site-map">
        <div class="mb-5 mb-md-0"> 
          <!--Title-->
          <h5 class="mt-4"> Quick Links</h5>
          <!--/Title--> 
          <ul class="my-4">
            <?php
                $billingModel_find = array_column($products, 'billingModel');
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

      <div class="col-lg-3 col-sm-6 mt-4 footer-site-map">
        <div class="mb-5 mb-md-0"> 
          <!--Title-->
          <h5 class="mt-4">Legal</h5>
          <!--/Title--> 
            <ul class="mt-4">
               <!--If any 1 product in shop is set to bill model 2,3,4 then cancel link enable -->
               <li><a href="terms.php">Terms</a></li>
               <li><a href="privacy.php">Privacy</a></li>
            </ul>
        </div>
        <div class="footer-cc mb-2 mt-5 ">
            <?php if ($card_type['master'] == 'yes') { ?> <img
                    src="./bp_config/images/payment/CardSet<?= $pageConfig['creditCardIcons'] ?>/mastercard.png"> <?php } ?>
            <?php if ($card_type['discover'] == 'yes') { ?><img
                src="./bp_config/images/payment/CardSet<?= $pageConfig['creditCardIcons'] ?>/discover.png"> <?php } ?>
            <?php if ($card_type['visa'] == 'yes') { ?><img
                src="./bp_config/images/payment/CardSet<?= $pageConfig['creditCardIcons'] ?>/visa.png"> <?php } ?>
        </div>
      </div>
      <!--/Contact Block-->
      
      <div class="col-lg-3 col-sm-6 mt-4 footer-site-map">
        <div class="mb-5 mb-md-0">
            <!--Title-->
            <h5 class="mt-4"> Contact</h5>
            <ul class="contact-widget mt-4">
                <li class="pb-2 my-2">
                    <?= $generalConfig['address'] ?>
                </li>
                <li class="pb-2 my-2"><a href="tel:<?= $generalConfig['phone_number'] ?>">
                    <?= $generalConfig['phone_number'] ?>
                    </a></li>
                <li class="pb-2 my-2"><a href="mailto:<?= $generalConfig['email'] ?>" style="word-break: break-all;">
                    <?= $generalConfig['email'] ?>
                    </a></li>
            </ul>
        </div>
      </div>
      
        <!--Contact Block-->
      <div class="col-lg-3 col-sm-6 mt-4 footer-return-shipment">
        <div class="mb-5 mb-md-0"> 
          <!--Title-->
          <h5 class="mt-4"> Return Shipment</h5>
          <!--/Title--> 
          
          <!--Contact-->
          <ul class="contact-widget">
            <li class="d-flex"> 
              <div class="info"><?= $generalConfig['fulfillment'] ?></div>
            </li>
            <li class="d-flex"> 
              <div class="info"><?= $generalConfig['return_address'] ?></div>
            </li>
          </ul>
          <!--Contact--> 
        </div>
      </div>
      <!--/Contact Block--> 
      
      
    </div>
  </div>
  <div class="">
      <div class="container copyright bottom-footer px-2 mt-4">
        <p>&copy; <?php echo date("Y"); ?> <?= $generalConfig['brand_name'] ?></p>    
        <div class="corp">
          <?= $generalConfig['corp_name'] ?>
        </div>
      </div>
  </div>
</footer>
