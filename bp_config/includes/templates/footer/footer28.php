<footer class="footer footer28 footer-background-color" id="footer">
   <div class="container">
        <div class="col-lg-12 footer-contain">
            <?php
                $billingModel_find = array_column($products, 'billingModel');
                $diff = array_diff($billingModel_find, [1]);
                $show_ingridient_find = array_column($products, 'show_ingredients');
                $found_ingridient = array_search('yes',$show_ingridient_find);
                ?>
            <?php if($found_ingridient !== false) { //if any one active product has the 'show_ingredients' => 'yes', then show it?> 
                <div class="container p-0">
                    <p>The statements made on our websites have not been evaluated by the FDA (U.S. Food & Drug Administration). This product is not intended to diagnose, cure or prevent any disease. The information provided by this website, email, or this company is not a substitute for a face-to-face consultation with your health care professional and should not be construed as individual medical advice. If there is a change in your medical condition, please stop using our product immediately and consult your health care professional. Do not use if safety seal is broken or missing. For adult use only, keep out of reach of children under 18 years of age.</p>
                </div>
            <?php } ?>
        </div>

    <div class="row row-contain">

      <div class="col-lg-3 column px-3">
        <div class="mb-5 mb-lg-0"> 
          <!--Title-->
          <h5 class="mt-3"> About us</h5>
          <div class="spacer"></div>
          <!--/Title-->
          <div class="footer-about">
            <p class="footer-brand"><?= $generalConfig['brand_name'] ?></p>
          </div>
        </div>
      </div>


      <div class="col-lg-3 col-sm-6 column px-3">
        <div class="mb-5 mb-md-0"> 
          <!--Title-->
          <h5 class="mt-3">Contact Details</h5>
          <div class="spacer"></div>
          <!--/Title--> 
          
          <!--Contact-->
          <ul class="contact-widget">
            <li class="d-flex"> 
              <div class="info mb-3"> <?= $generalConfig['address'] ?></div>
            </li>
            <li class="d-flex"> 
              <div class="info  mb-3"><?= $generalConfig['phone_number'] ?></div>
            </li>
            <li class="d-flex">
              <div class="info"><a href="mailto:<?= $generalConfig['email'] ?>"  style="word-break: break-all;"><?= $generalConfig['email'] ?></a></div>
            </li>
          </ul>
          <!--Contact--> 
        </div>
        <div class="spacer"></div>
        <div class="mb-5 mb-md-0"> 
          <!--Title-->
          <h5 class="mt-3">Payment Methods</h5>
          <div class="spacer"></div>
          <!--/Title--> 
          <ul>
              <!-- Logos -->
          <div class="footer-cc mt-3">
              <?php if ($card_type['master'] == 'yes') { ?> <img
                      src="./bp_config/images/payment/CardSet<?= $pageConfig['creditCardIcons'] ?>/mastercard.png"> <?php } ?>
              <?php if ($card_type['discover'] == 'yes') { ?><img
                  src="./bp_config/images/payment/CardSet<?= $pageConfig['creditCardIcons'] ?>/discover.png"> <?php } ?>
              <?php if ($card_type['visa'] == 'yes') { ?><img
                  src="./bp_config/images/payment/CardSet<?= $pageConfig['creditCardIcons'] ?>/visa.png"> <?php } ?>
          </div>
          <!-- Logos -->
          </ul>
        </div>
      </div>


      <!--Contact Block-->
      <div class="col-lg-3 col-sm-6 column px-3">
      <div class="mb-md-0"> 
            <h5 class="mt-3">Quick Links</h5>
            <div class="spacer"></div>
          <!--Title-->
            <div class="quick-links">
            <!--/Title-->
                <ul class="contact-widget">
                    <!--If any 1 product in shop is set to bill model 2,3,4 then cancel link enable -->
                    <li class="mb-3"><a href="index.php">Home</a></li>
                    <li class="mb-3"><a href="contact.php">Contact</a></li>
                    <?php if($found_ingridient !== false) { ?>
                    <li class="mb-3"><a href="ingredients.php">Ingredients</a></li>
                    <?php } ?>
                    <?php if (!empty($diff)) { ?>
                    <li class="mb-3"><a href="cancellation.php">Cancellation</a></li>
                    <?php } ?>
                    <li class="mb-3"><a href="terms.php">Terms</a></li>
                    <li class="mb-3"><a href="privacy.php">Privacy</a></li>
                </ul>
            </div>
        </div>
        <div class="spacer"></div>
        <div class="mb-5 mb-md-0"> 
          <!--Title-->
          <h5 class="mt-3">Returns</h5>
          <div class="spacer"></div>
          <!--/Title--> 
          
          <!--Contact-->
          <ul class="contact-widget">
            <li class="d-flex"> 
              <div class="info mb-3"> <?= $generalConfig['fulfillment'] ?></div>
            </li>
            <li class="d-flex"> 
              <div class="info  mb-3"><?= $generalConfig['return_address'] ?></div>
            </li>
          </ul>
          <!--Contact--> 

          
        </div>
      </div>
      <!--/Contact Block--> 
      

      <div class="col-lg-3 col-sm-6 px-3">
        <div class="mb-5 mb-md-0">
            <h5 class="mt-3">Copyright</h5>
            <div class="spacer"></div>
            <div>
                <p>
                    &copy; <?php echo date("Y"); ?> <?= $generalConfig['brand_name'] ?>
                </p>
                </div>
                <div>
                <div class="corp">
                    <?= $generalConfig['corp_name'] ?>
                </div>
            </div>
        </div>
      </div>
      
    </div>
  </div>
</footer>
