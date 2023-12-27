<!-- popular Section Starts -->
<?php ob_start(); ?>

<?php if ($pageConfig['popularProducts']['displaypopularProducts'] == 'yes') { ?>
   <section class="popular_section2 position-relative p-0 my50">
      <div class="container">
         <div class="pdtHeading pb-5">
            <h3 class="m-auto text-center "><?= $updateContent['popularTitle'] ?></h3>
         </div>
         <div class="product-wrapper row gx-3">
            <div class="col-12 col-lg-4">
               <input type="hidden" name="user_ip" id="user_ip" value="" />
               <div class="swiper popular-slider1">
                  <div class="swiper-wrapper">
                     <?php
                     $products_rand1 = $products;
                     uksort($products_rand1, function () {
                        return rand() > rand();
                     });
                     $i = 0;
                     foreach ($products_rand1 as $key => $value) {
                        $i++;
                        foreach ($value as $k => $v) {
                           if ($v == 'active' && $i <= $pageConfig['popularProducts']['popularProducts']) {
                              $p = $key;
                              $product = $products_rand1[$p];
                              if ($product['status'] == 'active') {
                                 $priceMin = $product['ssPrice'];
                                 if ($product['straightSaleMultiPrice'] == 'yes' && $product['billingModel'] == '1')
                                    $priceMin = $product['shop_option']['shop_option1']['option_price'];
                                 else if ($product['billingModel'] == '2' || $product['billingModel'] == '6' || $product['billingModel'] == '7' || $product['billingModel'] == '8')
                                    $priceMin = $product['trialPrice'];
                                 else if ($product['billingModel'] == '3')
                                    $priceMin = $product['continuityPrice'];
                     ?>
                                 <div class="product-section swiper-slide" data-product="product<?php echo $i; ?>" data-prod-id="<?= $product['id'] ?>" data-product-category="<?= $product['category'] ?>" data-product-title="<?= $product['name'] ?>" data-product-alias="<?= $product['alias'] ?>" data-product-description="<?= $product['description'] ?>" data-product-price="<?= $priceMin ?>" data-product-shipping="<?= $product['ssShipping'] ?>" <?php if ($product['billingModel'] != 1) { ?> data-product-rbllprice="<?= $product['trialRebillPrice'] ?>" data-product-trlshipping="<?= $product['trialShipping'] ?>" data-product-cntntyprice="<?= $product['continuityPrice'] ?>" data-product-cntntyshipping="<?= $product['continuityShipping'] ?>" <?php } ?> data-product-billmodel="<?= $product['billingModel'] ?>" data-product-MultiPrice="<?= $product['straightSaleMultiPrice'] ?>" data-product-id="product-<?php echo $i; ?>" data-product-size-option="<?= $product['sizeOption'] ?>" data-product-image-link="<?= preg_match('/^(http\:\/\/|https\:\/\/)/', $product['image']) ? $product['image'] : $path['images'] . '/' . $product['image']; ?>">
                                    <a href="javascript:void(0);" class="btn_shop">
                                       <div class="product-block">
                                          <div class="pdtImageWrapper position-relative">
                                             <img class="prod_img13" src="<?= preg_match('/^(http\:\/\/|https\:\/\/)/', $product['image']) ? $product['image'] : $path['images'] . '/' . $product['image']; ?>">
                                          </div>
                                          <div class="product-details text-center">
                                             <?php if ($pageConfig['displayBillingModel'] == 'yes') { ?>
                                                <p class="prod_category13">
                                                   <span>
                                                      <?php
                                                      switch ($product['billingModel']) {
                                                         case 1:
                                                            echo $generalConfig['naming_convention']['1'];
                                                            break;

                                                         case 2:
                                                         case 8:
                                                            echo $generalConfig['naming_convention']['2'];
                                                            break;

                                                         case 3:
                                                            echo $generalConfig['naming_convention']['3'];
                                                            break;

                                                         case 4:
                                                            echo $generalConfig['naming_convention']['1'] . ' & ' . $generalConfig['naming_convention']['2'];
                                                            break;

                                                         case 5:
                                                            echo $generalConfig['naming_convention']['1'] . ' & ' . $generalConfig['naming_convention']['3'];
                                                            break;

                                                         case 6:
                                                            echo $generalConfig['naming_convention']['2'] . ' & ' . $generalConfig['naming_convention']['3'];
                                                            break;

                                                         case 7:
                                                            echo $generalConfig['naming_convention']['1'] . ' & ' . $generalConfig['naming_convention']['2'] . ' & ' . $generalConfig['naming_convention']['3'];
                                                            break;
                                                      }
                                                      ?>
                                                   </span>
                                                </p>
                                             <?php } ?>
                                             <h5 class="product-title product-name13"><?= $product['name'] ?></h5>
                                             <div class="pdt-price-wrapper">
                                                <?php
                                                if ($product['billingModel'] == 1 && $product['straightSaleMultiPrice'] == 'no') { ?>
                                                   <p class="prod_price13"><span>$<?= $product['ssPrice'] ?></span></p>
                                                <?php }
                                                if ($product['billingModel'] == 1 && $product['straightSaleMultiPrice'] == 'yes') {
                                                   $prod_variant_count = count($product['shop_option']);
                                                ?>
                                                   <p class="prod_price13">
                                                      <span>
                                                         <?php if (($product['shop_option']['shop_option1']['option_price'] != $product['shop_option']['shop_option' . $prod_variant_count]['option_price']) && ($pageConfig['onlyShowFirstPrice'] == 'no')) { ?>
                                                            $<?= $product['shop_option']['shop_option1']['option_price'] ?> - $<?= $product['shop_option']['shop_option' . $prod_variant_count]['option_price'] ?>
                                                         <?php } else { ?>
                                                            $<?= $product['shop_option']['shop_option1']['option_price']; ?>
                                                         <?php } ?>
                                                      </span>
                                                   </p>
                                                <?php }
                                                if ($product['billingModel'] == 2 || $product['billingModel'] == 8) { ?>
                                                   <p class="prod_price13"><span>$<?= $product['trialPrice']; ?> + <?= $product['trialShipping']; ?> for shipping</span></p>
                                                <?php }
                                                if ($product['billingModel'] == 3) { ?>
                                                   <p class="prod_price13"><span>$<?= $product['continuityPrice']; ?> <?php if ($pageConfig['displayShippingPrice'] == "yes") { ?>+ <?= $product['continuityShipping']; ?> for shipping<?php } ?></span></p>
                                                <?php }
                                                if ($product['billingModel'] == 4) { ?>
                                                   <p class="prod_price13"><span>$<?= $product['trialShipping'] ?></span></p>
                                                <?php }
                                                if ($product['billingModel'] == 5) { ?>
                                                   <p class="prod_price13"><span>$<?= $product['ssPrice'] ?></span></p>
                                                <?php }
                                                if ($product['billingModel'] == 6) { ?>
                                                   <p class="prod_price13"><span>$<?= $product['trialShipping'] ?></span></p>
                                                <?php }
                                                if ($product['billingModel'] == 7) { ?>
                                                   <p class="prod_price13"><span>$<?= $product['ssPrice'] ?></span></p>
                                                <?php }
                                                ?>
                                             </div>

                                          </div>
                                       </div>
                                    </a>

                                 </div>
                     <?php
                              }
                           }
                        }
                     } ?>
                  </div>
                  <div class="ft-prev ft-button-prev1 ft-nav">
                     << /div>
                        <div class="ft-next ft-button-next1 ft-nav">></div>
                  </div>
               </div>
               <div class="col-12 col-lg-4 d-none d-lg-block">
                  <input type="hidden" name="user_ip" id="user_ip" value="" />
                  <div class="swiper popular-slider2">
                     <div class="swiper-wrapper">
                        <?php
                        $products_rand2 = $products;
                        uksort($products_rand2, function () {
                           return rand() > rand();
                        });
                        $i = 0;
                        foreach ($products_rand2 as $key => $value) {
                           $i++;
                           foreach ($value as $k => $v) {
                              if ($v == 'active' && $i <= $pageConfig['popularProducts']['popularProducts']) {
                                 $p = $key;
                                 $product = $products_rand2[$p];
                                 if ($product['status'] == 'active') {
                                    $priceMin = $product['ssPrice'];
                                    if ($product['straightSaleMultiPrice'] == 'yes' && $product['billingModel'] == '1')
                                       $priceMin = $product['shop_option']['shop_option1']['option_price'];
                                    else if ($product['billingModel'] == '2' || $product['billingModel'] == '6' || $product['billingModel'] == '7' || $product['billingModel'] == '8')
                                       $priceMin = $product['trialPrice'];
                                    else if ($product['billingModel'] == '3')
                                       $priceMin = $product['continuityPrice'];
                        ?>
                                    <div class="product-section swiper-slide" data-product="product<?php echo $i; ?>" data-prod-id="<?= $product['id'] ?>" data-product-category="<?= $product['category'] ?>" data-product-title="<?= $product['name'] ?>" data-product-alias="<?= $product['alias'] ?>" data-product-description="<?= $product['description'] ?>" data-product-price="<?= $priceMin ?>" data-product-shipping="<?= $product['ssShipping'] ?>" <?php if ($product['billingModel'] != 1) { ?> data-product-rbllprice="<?= $product['trialRebillPrice'] ?>" data-product-trlshipping="<?= $product['trialShipping'] ?>" data-product-cntntyprice="<?= $product['continuityPrice'] ?>" data-product-cntntyshipping="<?= $product['continuityShipping'] ?>" <?php } ?> data-product-billmodel="<?= $product['billingModel'] ?>" data-product-MultiPrice="<?= $product['straightSaleMultiPrice'] ?>" data-product-id="product-<?php echo $i; ?>" data-product-size-option="<?= $product['sizeOption'] ?>" data-product-image-link="<?= preg_match('/^(http\:\/\/|https\:\/\/)/', $product['image']) ? $product['image'] : $path['images'] . '/' . $product['image']; ?>">
                                       <a href="javascript:void(0);" class="btn_shop">
                                          <div class="product-block">
                                             <div class="pdtImageWrapper position-relative">
                                                <img class="prod_img13" src="<?= preg_match('/^(http\:\/\/|https\:\/\/)/', $product['image']) ? $product['image'] : $path['images'] . '/' . $product['image']; ?>">
                                             </div>
                                             <div class="product-details text-center">
                                                <?php if ($pageConfig['displayBillingModel'] == 'yes') { ?>
                                                   <p class="prod_category13">
                                                      <span>
                                                         <?php
                                                         switch ($product['billingModel']) {
                                                            case 1:
                                                               echo $generalConfig['naming_convention']['1'];
                                                               break;

                                                            case 2:
                                                            case 8:
                                                               echo $generalConfig['naming_convention']['2'];
                                                               break;

                                                            case 3:
                                                               echo $generalConfig['naming_convention']['3'];
                                                               break;

                                                            case 4:
                                                               echo $generalConfig['naming_convention']['1'] . ' & ' . $generalConfig['naming_convention']['2'];
                                                               break;

                                                            case 5:
                                                               echo $generalConfig['naming_convention']['1'] . ' & ' . $generalConfig['naming_convention']['3'];
                                                               break;

                                                            case 6:
                                                               echo $generalConfig['naming_convention']['2'] . ' & ' . $generalConfig['naming_convention']['3'];
                                                               break;

                                                            case 7:
                                                               echo $generalConfig['naming_convention']['1'] . ' & ' . $generalConfig['naming_convention']['2'] . ' & ' . $generalConfig['naming_convention']['3'];
                                                               break;
                                                         }
                                                         ?>
                                                      </span>
                                                   </p>
                                                <?php } ?>
                                                <h5 class="product-title product-name13"><?= $product['name'] ?></h5>
                                                <div class="pdt-price-wrapper">
                                                   <?php
                                                   if ($product['billingModel'] == 1 && $product['straightSaleMultiPrice'] == 'no') { ?>
                                                      <p class="prod_price13"><span>$<?= $product['ssPrice'] ?></span></p>
                                                   <?php }
                                                   if ($product['billingModel'] == 1 && $product['straightSaleMultiPrice'] == 'yes') {
                                                      $prod_variant_count = count($product['shop_option']);
                                                   ?>
                                                      <p class="prod_price13">
                                                         <span>
                                                            <?php if (($product['shop_option']['shop_option1']['option_price'] != $product['shop_option']['shop_option' . $prod_variant_count]['option_price']) && ($pageConfig['onlyShowFirstPrice'] == 'no')) { ?>
                                                               $<?= $product['shop_option']['shop_option1']['option_price'] ?> - $<?= $product['shop_option']['shop_option' . $prod_variant_count]['option_price'] ?>
                                                            <?php } else { ?>
                                                               $<?= $product['shop_option']['shop_option1']['option_price']; ?>
                                                            <?php } ?>
                                                         </span>
                                                      </p>
                                                   <?php }
                                                   if ($product['billingModel'] == 2 || $product['billingModel'] == 8) { ?>
                                                      <p class="prod_price13"><span>$<?= $product['trialPrice']; ?> + <?= $product['trialShipping']; ?> for shipping</span></p>
                                                   <?php }
                                                   if ($product['billingModel'] == 3) { ?>
                                                      <p class="prod_price13"><span>$<?= $product['continuityPrice']; ?> <?php if ($pageConfig['displayShippingPrice'] == "yes") { ?>+ <?= $product['continuityShipping']; ?> for shipping<?php } ?></span></p>
                                                   <?php }
                                                   if ($product['billingModel'] == 4) { ?>
                                                      <p class="prod_price13"><span>$<?= $product['trialShipping'] ?></span></p>
                                                   <?php }
                                                   if ($product['billingModel'] == 5) { ?>
                                                      <p class="prod_price13"><span>$<?= $product['ssPrice'] ?></span></p>
                                                   <?php }
                                                   if ($product['billingModel'] == 6) { ?>
                                                      <p class="prod_price13"><span>$<?= $product['trialShipping'] ?></span></p>
                                                   <?php }
                                                   if ($product['billingModel'] == 7) { ?>
                                                      <p class="prod_price13"><span>$<?= $product['ssPrice'] ?></span></p>
                                                   <?php }
                                                   ?>
                                                </div>

                                             </div>
                                          </div>
                                       </a>

                                    </div>
                        <?php
                                 }
                              }
                           }
                        } ?>
                     </div>
                     <div class="ft-prev ft-button-prev2 ft-nav">
                        << /div>
                           <div class="ft-next ft-button-next2 ft-nav">></div>
                     </div>
                  </div>
                  <div class="col-12 col-lg-4 d-none d-lg-block">
                     <input type="hidden" name="user_ip" id="user_ip" value="" />
                     <div class="swiper popular-slider3">
                        <div class="swiper-wrapper">
                           <?php
                           $products_rand3 = $products;
                           uksort($products_rand3, function () {
                              return rand() > rand();
                           });
                           $i = 0;
                           foreach ($products_rand3 as $key => $value) {
                              $i++;
                              foreach ($value as $k => $v) {
                                 if ($v == 'active' && $i <= $pageConfig['popularProducts']['popularProducts']) {
                                    $p = $key;
                                    $product = $products_rand3[$p];
                                    if ($product['status'] == 'active') {
                                       $priceMin = $product['ssPrice'];
                                       if ($product['straightSaleMultiPrice'] == 'yes' && $product['billingModel'] == '1')
                                          $priceMin = $product['shop_option']['shop_option1']['option_price'];
                                       else if ($product['billingModel'] == '2' || $product['billingModel'] == '6' || $product['billingModel'] == '7' || $product['billingModel'] == '8')
                                          $priceMin = $product['trialPrice'];
                                       else if ($product['billingModel'] == '3')
                                          $priceMin = $product['continuityPrice'];
                           ?>
                                       <div class="product-section swiper-slide" data-product="product<?php echo $i; ?>" data-prod-id="<?= $product['id'] ?>" data-product-category="<?= $product['category'] ?>" data-product-title="<?= $product['name'] ?>" data-product-alias="<?= $product['alias'] ?>" data-product-description="<?= $product['description'] ?>" data-product-price="<?= $priceMin ?>" data-product-shipping="<?= $product['ssShipping'] ?>" <?php if ($product['billingModel'] != 1) { ?> data-product-rbllprice="<?= $product['trialRebillPrice'] ?>" data-product-trlshipping="<?= $product['trialShipping'] ?>" data-product-cntntyprice="<?= $product['continuityPrice'] ?>" data-product-cntntyshipping="<?= $product['continuityShipping'] ?>" <?php } ?> data-product-billmodel="<?= $product['billingModel'] ?>" data-product-MultiPrice="<?= $product['straightSaleMultiPrice'] ?>" data-product-id="product-<?php echo $i; ?>" data-product-size-option="<?= $product['sizeOption'] ?>" data-product-image-link="<?= preg_match('/^(http\:\/\/|https\:\/\/)/', $product['image']) ? $product['image'] : $path['images'] . '/' . $product['image']; ?>">
                                          <a href="javascript:void(0);" class="btn_shop">
                                             <div class="product-block">
                                                <div class="pdtImageWrapper position-relative">
                                                   <img class="prod_img13" src="<?= preg_match('/^(http\:\/\/|https\:\/\/)/', $product['image']) ? $product['image'] : $path['images'] . '/' . $product['image']; ?>">
                                                </div>
                                                <div class="product-details text-center">
                                                   <?php if ($pageConfig['displayBillingModel'] == 'yes') { ?>
                                                      <p class="prod_category13">
                                                         <span>
                                                            <?php
                                                            switch ($product['billingModel']) {
                                                               case 1:
                                                                  echo $generalConfig['naming_convention']['1'];
                                                                  break;

                                                               case 2:
                                                               case 8:
                                                                  echo $generalConfig['naming_convention']['2'];
                                                                  break;

                                                               case 3:
                                                                  echo $generalConfig['naming_convention']['3'];
                                                                  break;

                                                               case 4:
                                                                  echo $generalConfig['naming_convention']['1'] . ' & ' . $generalConfig['naming_convention']['2'];
                                                                  break;

                                                               case 5:
                                                                  echo $generalConfig['naming_convention']['1'] . ' & ' . $generalConfig['naming_convention']['3'];
                                                                  break;

                                                               case 6:
                                                                  echo $generalConfig['naming_convention']['2'] . ' & ' . $generalConfig['naming_convention']['3'];
                                                                  break;

                                                               case 7:
                                                                  echo $generalConfig['naming_convention']['1'] . ' & ' . $generalConfig['naming_convention']['2'] . ' & ' . $generalConfig['naming_convention']['3'];
                                                                  break;
                                                            }
                                                            ?>
                                                         </span>
                                                      </p>
                                                   <?php } ?>
                                                   <h5 class="product-title product-name13"><?= $product['name'] ?></h5>
                                                   <div class="pdt-price-wrapper">
                                                      <?php
                                                      if ($product['billingModel'] == 1 && $product['straightSaleMultiPrice'] == 'no') { ?>
                                                         <p class="prod_price13"><span>$<?= $product['ssPrice'] ?></span></p>
                                                      <?php }
                                                      if ($product['billingModel'] == 1 && $product['straightSaleMultiPrice'] == 'yes') {
                                                         $prod_variant_count = count($product['shop_option']);
                                                      ?>
                                                         <p class="prod_price13">
                                                            <span>
                                                               <?php if (($product['shop_option']['shop_option1']['option_price'] != $product['shop_option']['shop_option' . $prod_variant_count]['option_price']) && ($pageConfig['onlyShowFirstPrice'] == 'no')) { ?>
                                                                  $<?= $product['shop_option']['shop_option1']['option_price'] ?> - $<?= $product['shop_option']['shop_option' . $prod_variant_count]['option_price'] ?>
                                                               <?php } else { ?>
                                                                  $<?= $product['shop_option']['shop_option1']['option_price']; ?>
                                                               <?php } ?>
                                                            </span>
                                                         </p>
                                                      <?php }
                                                      if ($product['billingModel'] == 2 || $product['billingModel'] == 8) { ?>
                                                         <p class="prod_price13"><span>$<?= $product['trialPrice']; ?> + <?= $product['trialShipping']; ?> for shipping</span></p>
                                                      <?php }
                                                      if ($product['billingModel'] == 3) { ?>
                                                         <p class="prod_price13"><span>$<?= $product['continuityPrice']; ?> <?php if ($pageConfig['displayShippingPrice'] == "yes") { ?>+ <?= $product['continuityShipping']; ?> for shipping<?php } ?></span></p>
                                                      <?php }
                                                      if ($product['billingModel'] == 4) { ?>
                                                         <p class="prod_price13"><span>$<?= $product['trialShipping'] ?></span></p>
                                                      <?php }
                                                      if ($product['billingModel'] == 5) { ?>
                                                         <p class="prod_price13"><span>$<?= $product['ssPrice'] ?></span></p>
                                                      <?php }
                                                      if ($product['billingModel'] == 6) { ?>
                                                         <p class="prod_price13"><span>$<?= $product['trialShipping'] ?></span></p>
                                                      <?php }
                                                      if ($product['billingModel'] == 7) { ?>
                                                         <p class="prod_price13"><span>$<?= $product['ssPrice'] ?></span></p>
                                                      <?php }
                                                      ?>
                                                   </div>

                                                </div>
                                             </div>
                                          </a>

                                       </div>
                           <?php
                                    }
                                 }
                              }
                           } ?>
                        </div>
                        <div class="ft-prev ft-button-prev3 ft-nav">
                           << /div>
                              <div class="ft-next ft-button-next3 ft-nav">></div>
                        </div>
                     </div>
                  </div>
               </div>
   </section>
<?php } ?>

<!-- popular Section Ends -->

<script>
   let rand1 = Math.floor((Math.random() * 5000) + 3000);
   let rand2 = Math.floor((Math.random() * 5000) + 3000);
   let rand3 = Math.floor((Math.random() * 5000) + 3000);


   var fswiper1 = new Swiper(".popular-slider1", {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      autoplay: {
         delay: rand1,
         disableOnInteraction: false,
      },
      breakpoints: {
         640: {
            slidesPerView: 1,
            spaceBetween: 20,
         },
         768: {
            slidesPerView: 1,
            spaceBetween: 40,
         },
      },
   });
   $(".ft-button-next1").click(function() {
      fswiper1.slideNext();
   });
   $(".ft-button-prev1").click(function() {
      fswiper1.slidePrev();
   });
   var fswiper2 = new Swiper(".popular-slider2", {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      autoplay: {
         delay: rand2,
         disableOnInteraction: false,
      },
      breakpoints: {
         640: {
            slidesPerView: 1,
            spaceBetween: 20,
         },
         768: {
            slidesPerView: 1,
            spaceBetween: 40,
         },
      },
   });
   $(".ft-button-next2").click(function() {
      fswiper2.slideNext();
   });
   $(".ft-button-prev2").click(function() {
      fswiper2.slidePrev();
   });
   var fswiper3 = new Swiper(".popular-slider3", {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      autoplay: {
         delay: rand3,
         disableOnInteraction: false,
      },
      breakpoints: {
         640: {
            slidesPerView: 1,
            spaceBetween: 20,
         },
         768: {
            slidesPerView: 1,
            spaceBetween: 40,
         },
      },
   });
   $(".ft-button-next3").click(function() {
      fswiper3.slideNext();
   });
   $(".ft-button-prev3").click(function() {
      fswiper3.slidePrev();
   });
</script>

<?php $sections['popularProductsection'] = ob_get_clean(); ?>