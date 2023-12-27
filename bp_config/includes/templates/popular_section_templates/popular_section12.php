

<!-- popular Section Start -->
<?php ob_start(); ?>

<section class="popular_section popular_section12 about-bg-color m-0 py50">
  <?php if($pageConfig['popularProducts']['displaypopularProducts'] == 'yes') { ?>
      <div class="container pdt-section-popular" id="related_prods">
          <div class="product-wrapper  row">
            <div class="text-center pb-5">
               <p class="secondary-text-color fdt-slogan">See Our popular Products</p>
               <h2 class="primary-text-color fdt-title"><?= $updateContent['popularTitle'] ?></h2>
            </div>
          </div>
          <div class="product-wrapper  row">
              <?php
              // $main_pdt_categor = "Diet";
              uksort($products, function() { return rand() > rand(); });
              $i = 0;
              foreach ($products as $key => $value){
                  $i++;
                  foreach ($value as $k => $v){
  
                      if($v == 'active' && $i <= $pageConfig['popularProducts']['popularProducts']){
                          $p = $key;
                          $product = $products[$p];
                          // echo "<pre>";
                          // print_r($product);
                          // echo "product ".$product['category'];
  
                          if($product['status']=='active')
                          {
                            $priceMin = $product['ssPrice'];
                            if($product['straightSaleMultiPrice']=='yes' && $product['billingModel']=='1')
                              $priceMin = $product['shop_option']['shop_option1']['option_price'];
                            else if($product['billingModel']=='2' || $product['billingModel']=='6' || $product['billingModel']=='7' || $product['billingModel']=='8')
                              $priceMin = $product['trialPrice'];
                            else if($product['billingModel']=='3')
                              $priceMin = $product['continuityPrice'];
                              ?>
                              <div class="product-section   col-lg-3 col-12"
                                   data-product="<?= $key;?>"
                                   data-prod-id="<?= $product['id'] ?>"
                                   data-product-sticky-id="<?= $product['stickyId'] ?>"
                                   data-product-category="<?= $product['category'] ?>"
                                   data-product-title="<?= $product['name'] ?>"
                                   data-product-alias="<?= $product['alias'] ?>"
                                   data-product-description="<?= $product['description'] ?>"
                                   data-product-price="<?= $priceMin ?>"
                                   data-product-shipping="<?= $product['ssShipping'] ?>"
                                  <?php if($product['billingModel'] != 1) { ?>
                                      data-product-rbllprice="<?= $product['trialRebillPrice'] ?>"
                                      data-product-trlPrice="<?= $product['trialPrice'] ?>"
                                      data-product-trlshipping="<?= $product['trialShipping'] ?>"
                                      data-product-cntntyprice="<?= $product['continuityPrice'] ?>"
                                      data-product-cntntyshipping="<?= $product['continuityShipping'] ?>"
                                  <?php } ?>
                                   data-product-billmodel="<?= $product['billingModel'] ?>"
                                   data-product-MultiPrice="<?= $product['straightSaleMultiPrice'] ?>"
                                   data-product-id="product-<?php echo $i;?>" 
                                   data-product-size-option="<?= $product['sizeOption'] ?>"
                                   data-product-image-link="<?= $path['images'] ?>/<?= $product['image'] ?>"
                              >
                                  <div class="product-block">
                                      <img class="prod_img"  src="<?= $path['images'] ?>/<?= $product['image'] ?>">
  
                                      <div class="product-info">
                                        <?php if ($pageConfig['displayBillingModel'] == 'yes') { ?>
                                            <p class="prod_category">
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
                                        <h5 class="product-title product-name"><?= $product['name'] ?></h5>    
                                        <a href="javascript:void(0);" class="btn_shop btn_shop" id="btn_shop"><button class="btn btn-primary btn-shop btn_releted_pdt shop-btn-color"><?= $updateContent['buttonName'] ?></button></a>
                                      </div>
                                  </div>
                              </div>
                              <?php
                          }}}}
              ?>
          </div>
      </div>
  <?php } ?>
</section>

<?php $sections['popularProductsection'] = ob_get_clean(); ?>
<!-- popular Section Ends -->
