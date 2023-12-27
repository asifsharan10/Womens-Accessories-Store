<!-- popular Section Starts -->
<?php ob_start(); ?>

<?php if ($pageConfig['popularProducts']['displaypopularProducts'] == 'yes') { ?>
   <section class="pdt-section pdt-section10 popular_section10 position-relative p-0 my50" id="products">
      <div class="container" id="products">
         <div class="pdtHeading pb-5">
            <h3 class="m-auto text-center "><?= $updateContent['popularTitle'] ?></h3>
            <div class="popular-navigation-wrapper d-flex flex-row justify-content-center">
               <div class="ft-button-prev ft-nav">
                  << /div>
                     <div class="ft-button-next ft-nav">></div>
               </div>
            </div>
            <div class="product-wrapper row gx-3">
               <input type="hidden" name="user_ip" id="user_ip" value="" />
               <div class="swiper popular-slider">
                  <div class="swiper-wrapper">
                     <?php
                     // To randomize the products on the home page
                     // uksort($products, function() { return rand() > rand(); });
                     $i = 0;
                     foreach ($products as $key => $value) {
                        $i++;
                        foreach ($value as $k => $v) {
                           if ($v == 'active' && $i <= $pageConfig['popularProducts']['popularProducts']) {
                              $p = $key;
                              $product = $products[$p];
                              if ($product['status'] == 'active') {
                                 $priceMin = $product['ssPrice'];
                                 if ($product['straightSaleMultiPrice'] == 'yes' && $product['billingModel'] == '1')
                                    $priceMin = $product['shop_option']['shop_option1']['option_price'];
                                 else if ($product['billingModel'] == '2' || $product['billingModel'] == '6' || $product['billingModel'] == '7' || $product['billingModel'] == '8')
                                    $priceMin = $product['trialPrice'];
                                 else if ($product['billingModel'] == '3')
                                    $priceMin = $product['continuityPrice'];
                     ?>
                                 <div class="product-section product-section10 swiper-slide" data-product="product<?php echo $i; ?>" data-prod-id="<?= $product['id'] ?>" data-product-category="<?= $product['category'] ?>" data-product-title="<?= $product['name'] ?>" data-product-alias="<?= $product['alias'] ?>" data-product-description="<?= $product['description'] ?>" data-product-price="<?= $priceMin ?>" data-product-shipping="<?= $product['ssShipping'] ?>" <?php if ($product['billingModel'] != 1) { ?> data-product-rbllprice="<?= $product['trialRebillPrice'] ?>" data-product-trlshipping="<?= $product['trialShipping'] ?>" data-product-cntntyprice="<?= $product['continuityPrice'] ?>" data-product-cntntyshipping="<?= $product['continuityShipping'] ?>" <?php } ?> data-product-billmodel="<?= $product['billingModel'] ?>" data-product-MultiPrice="<?= $product['straightSaleMultiPrice'] ?>" data-product-id="product-<?php echo $i; ?>" data-product-size-option="<?= $product['sizeOption'] ?>" data-product-image-link="<?= preg_match('/^(http\:\/\/|https\:\/\/)/', $product['image']) ? $product['image'] : $path['images'] . '/' . $product['image']; ?>">
                                    <div class="product-block">
                                       <div class="pdtImageWrapper position-relative">
                                          <img class="prod_img10" src="<?= preg_match('/^(http\:\/\/|https\:\/\/)/', $product['image']) ? $product['image'] : $path['images'] . '/' . $product['image']; ?>">
                                          <div class="pdt-overlay"></div>
                                          <!-- <a href="javascript:void(0);" class="btn_shop btn_shop10 shop-btn-color" id="btn_shop"><i class="fas fa-shopping-cart"></i></i></a> -->
                                       </div>
                                       <div class="product-details">
                                          <?php if ($pageConfig['displayBillingModel'] == 'yes') { ?>
                                             <p class="prod_category10">
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
                                          <h5 class="product-title product-name10"><?= $product['name'] ?></h5>
                                          <div class="pdt-price-wrapper">
                                             <?php
                                             if ($product['billingModel'] == 1 && $product['straightSaleMultiPrice'] == 'no') { ?>
                                                <p class="prod_price10"><span>$<?= $product['ssPrice'] ?></span></p>
                                             <?php }
                                             if ($product['billingModel'] == 1 && $product['straightSaleMultiPrice'] == 'yes') {
                                                $prod_variant_count = count($product['shop_option']);
                                             ?>
                                                <p class="prod_price10">
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
                                                <p class="prod_price10"><span>$<?= $product['trialPrice']; ?> + <?= $product['trialShipping']; ?> for shipping</p>
                                             <?php }
                                             if ($product['billingModel'] == 3) { ?>
                                                <p class="prod_price10"><span>$<?= $product['continuityPrice']; ?> <?php if ($pageConfig['displayShippingPrice'] == "yes") { ?>+ <?= $product['continuityShipping']; ?> for shipping<?php } ?></span></p>
                                             <?php }
                                             if ($product['billingModel'] == 4) { ?>
                                                <p class="prod_price10"><span>$<?= $product['trialShipping'] ?></span></p>
                                             <?php }
                                             if ($product['billingModel'] == 5) { ?>
                                                <p class="prod_price10"><span>$<?= $product['ssPrice'] ?></span></p>
                                             <?php }
                                             if ($product['billingModel'] == 6) { ?>
                                                <p class="prod_price10"><span>$<?= $product['trialShipping'] ?></span></p>
                                             <?php }
                                             if ($product['billingModel'] == 7) { ?>
                                                <p class="prod_price10"><span>$<?= $product['ssPrice'] ?></span></p>
                                             <?php }
                                             ?>
                                          </div>

                                          <div class="popular-btn-grp d-flex">
                                             <span class="ft-btn1 shop-btn-color"><a href="javascript:void(0);" class="btn_shop btn_shop10 " id="btn_shop"><?= $updateContent['buttonName'] ?></a></span>
                                             <span class="ft-btn2 ms-auto "><a href="cart.php">View Cart</a></span>
                                          </div>

                                       </div>
                                    </div>

                                 </div>
                     <?php
                              }
                           }
                        }
                     } ?>
                  </div>

               </div>
            </div>
         </div>
   </section>
<?php } ?>

<!-- popular Section Ends -->


<script src="bp_config/js/swiper-bundle.min.js"></script>
<script>
   var swiper3 = new Swiper(".popular-slider", {
      slidesPerView: 2,
      spaceBetween: 20,
      breakpoints: {
         640: {
            slidesPerView: 2,
            spaceBetween: 20,
         },
         768: {
            slidesPerView: 4,
            spaceBetween: 40,
         },
      },
   });
   $(".ft-button-next").click(function() {
      swiper3.slideNext();
   });
   $(".ft-button-prev").click(function() {
      swiper3.slidePrev();
   });
</script>

<?php $sections['popularProductsection'] = ob_get_clean(); ?>