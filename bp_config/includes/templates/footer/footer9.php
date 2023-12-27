<footer class="footer9 footer-background-color"  id="footer">
<div class="row">
      <div class="col-lg-3 footer-brand-name px-5 mt-4">
        <div class="company-info">
          <h5 class="footer-heading">About</h5>
          <ul>  
            <li>Copyright &copy; <?php echo date("Y"); ?>  <?= $generalConfig['brand_name'] ?></li>
            <li> <?= $generalConfig['corp_name'] ?></li>
          </ul>

        </div>
      </div>
      <div class="col-lg-3 col-md-4 footer-menu px-5 mt-4">
      <h5 class="footer-heading mb-3">Menu</h5>
           <ul>
              <?php
                $billingModel_find = array_column($products, 'billingModel');
                $diff = array_diff($billingModel_find, [1]);
                $show_ingridient_find = array_column($products, 'show_ingredients');
                $found_ingridient = array_search('yes',$show_ingridient_find);
            ?>
            <li>
                <h4 class="me-4">1</h4>
                <a href="index.php">Home</a>
            </li> 
            <div class="spacer"></div>
            <li>
                <h4 class="me-4">2</h4>
                <a href="contact.php">Contact</a>
            </li> 
            <div class="spacer"></div>
            <li>
                <h4 class="me-4">3</h4>
                <a href="terms.php">Terms</a>
            </li>
            <div class="spacer"></div>
            <li>
                <h4 class="me-4">4</h4>
                <a href="privacy.php">Privacy</a>
            </li>
            <div class="spacer"></div>
            <li>
                <h4 class="me-4">5</h4>
                <a href="shop.php">Shop</a>
            </li>
            <div class="spacer"></div>
            <?php if($found_ingridient !== false) { ?>
            <li>
                <h4 class="me-4">6</h4>
                <a href="ingredients.php">Ingredients</a>
            </li>
            <?php } ?>          
            <?php if (!empty($diff)) { ?>
            <li><a href="cancellation.php">Cancellation</a></li>
            <?php } ?>
          </ul>
      </div>
      <div class="col-lg-3 col-md-4 pt-md-0 px-5 mt-4 footer-return-order">
        <h5 class="footer-heading mb-3">Return Order</h5>
        <ul>
            <li><?= $generalConfig['fulfillment'] ?></li>
            <div class="spacer-dotted"></div>
            <li><?= $generalConfig['return_address'] ?></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-4 pt-md-0 px-5 mt-4 footer-contact">
        <h5 class="footer-heading mb-3">Contact</h5>
        <ul>
          <li class="pb-2 mb-3"><a href="tel:<?= $generalConfig['phone_number'] ?>">
            <?= $generalConfig['phone_number'] ?>
            </a></li>
          <li class="pb-2 mb-3"><a href="mailto:<?= $generalConfig['email'] ?>" style="word-break: break-all;">
            <?= $generalConfig['email'] ?>
            </a></li>
          <li class="pb-2 mb-3">
            <?= $generalConfig['address'] ?>
          </li>
        </ul>
      </div>
    </div>
  <div class="copy-section px-4">
    <div class="copyright">
        <div class="row justify-content-between">
          <div class="col-12 col-md-6 mt-2">
            <?= $generalConfig['brand_name'] ?>
          </div>
          <div class="col-12 col-md-6 text-md-end mt-2">
              <div class="footer-cc ">
                  <?php if ($card_type['master'] == 'yes') { ?> <img
                          src="./bp_config/images/payment/CardSet<?= $pageConfig['creditCardIcons'] ?>/mastercard.png"> <?php } ?>
                  <?php if ($card_type['discover'] == 'yes') { ?><img
                      src="./bp_config/images/payment/CardSet<?= $pageConfig['creditCardIcons'] ?>/discover.png"> <?php } ?>
                  <?php if ($card_type['visa'] == 'yes') { ?><img
                      src="./bp_config/images/payment/CardSet<?= $pageConfig['creditCardIcons'] ?>/visa.png"> <?php } ?>
              </div>
          </div>
        </div>
    </div>
  </div>
   <?php if($found_ingridient !== false) { //if any one active product has the 'show_ingredients' => 'yes', then show it?> 
        <div class="py-4 px-4">
          The statements made on our websites have not been evaluated by the FDA (U.S. Food & Drug Administration). This product is not intended to diagnose, cure or prevent any disease. The information provided by this website, email, or this company is not a substitute for a face-to-face consultation with your health care professional and should not be construed as individual medical advice. If there is a change in your medical condition, please stop using our product immediately and consult your health care professional. Do not use if safety seal is broken or missing. For adult use only, keep out of reach of children under 18 years of age.
        </div> 
   <?php } ?>
</footer>