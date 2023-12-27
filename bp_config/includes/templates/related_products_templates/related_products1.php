      <?php 
          $product_cat_main = "<script>document.write(sessionStorage.getItem('data_product_category'))</script>";
          ?>   
          </script>
          <?php
            $products = Helper::sortProducts($products, $pageConfig['sortProducts']);
               foreach ($products as $key => $value){
                  foreach ($value as $k => $v){
                     if($v == 'active'){
                        $p = $key;
                        $product = $products[$p];
                        if ($product['id'] == $_GET['pro_id']) { ?>
                           <input type="hidden" id="product-sticky-id" value="<?= $product['stickyId'] ?>">
                           <?php if ($showTrialContinuityVerbiage) { ?>
                              <input type="hidden" id="product-trl-price" value="<?= $product['trialPrice'] ?>">
                              <input type="hidden" id="trl-rbll-shipping-price" value="<?= $product['trialRebillShippingPrice'] ?>">
                           <?php } ?>
                        <?php } ?>
                  <?php } ?>
               <?php } ?>
          <?php } ?>



<?php if($pageConfig['displayRelatedProducts'] == 'yes') { ?>
   <div class="container pdt-section-popular" id="related_prods">
         <div class="product-wrapper  row">
               <div class="product-section col-lg-12 col-12 pdt-col">
                  <h2>Related Products</h2>
               </div>
         </div>
      <div class="product-wrapper  row">
         <?php
         // $main_pdt_categor = "";
            $i = 0;
            foreach ($products as $key => $value){
            $i++;
               foreach ($value as $k => $v){

                  if($v == 'active'){
                     $p = $key;
                     $product = $products[$p];
                     // echo "<pre>";
                     // print_r($product);
                     // echo "product ".$product['category'];

            if($product['status']=='active' && $product['category']==$_GET['pro_cat'] && $product['id']!=$_GET['pro_id'])
            {
         ?>
         <div class="product-section   col-lg-4 col-12"
                  data-product="product<?php echo $i;?>"
                  data-prod-id="<?= $product['id'] ?>"
                  data-product-sticky-id="<?= $product['stickyId'] ?>"
                  data-product-category="<?= $product['category'] ?>"
                  data-product-title="<?= $product['name'] ?>"
                  data-product-alias="<?= $product['alias'] ?>"
                  data-product-description="<?= $product['description'] ?>"
                  data-product-price="<?= $product['ssPrice'] ?>"
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
                  data-product-image-link="<?= preg_match('/^(http\:\/\/|https\:\/\/)/', $product['image']) ? $product['image'] : $path['images'] . '/' . $product['image']; ?>"
                  >
            <div class="product-block">
               <img class="prod_img" src="<?= preg_match('/^(http\:\/\/|https\:\/\/)/', $product['image']) ? $product['image'] : $path['images'] . '/' . $product['image']; ?>">

               <?php
                  if($product['billingModel']==1 && $product['straightSaleMultiPrice']=='no'){ ?>
                     <p class="prod_price"><span class="primary-text-color">$<?= $product['ssPrice'] ?></span></p>
                  <?php }
                  if($product['billingModel']==1 && $product['straightSaleMultiPrice']=='yes'){
                        $prod_variant_count = count($product['shop_option']);
                  ?>
                     <p class="prod_price"><span class="primary-text-color">
                     $<?= $product['shop_option']['shop_option1']['option_price'] ?> - $<?= $product['shop_option']['shop_option'.$prod_variant_count]['option_price'] ?>
                     </span></p>
                  <?php }
                  if($product['billingModel']==2 || $product['billingModel']==8){ ?>
                     <p class="prod_price"><span class="primary-text-color">$<?= $product['trialShipping'] ?></span></p>
                  <?php }
                  if($product['billingModel']==3){ ?>
                     <p class="prod_price"><span class="primary-text-color">$<?php echo sprintf('%.2f', $product['continuityPrice'] +  $product['continuityShipping']); ?></span></p>
                  <?php }
                  if($product['billingModel']==4){ ?>
                     <p class="prod_price"><span class="primary-text-color">$<?= $product['trialShipping'] ?></span></p>
                  <?php }
                  if($product['billingModel']==5){ ?>
                     <p class="prod_price"><span class="primary-text-color">$<?= $product['ssPrice'] ?></span></p>
                  <?php }
                  if($product['billingModel']==6){ ?>
                     <p><span class="primary-text-color">$<?= $product['trialShipping'] ?></span></p>
                  <?php }
                  if($product['billingModel']==7){ ?>
                     <p class="prod_price"><span class="primary-text-color">$<?= $product['ssPrice'] ?></span></p>
                  <?php }
               ?>


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


               <a href="javascript:void(0);" class="btn_shop btn_shop" id="btn_shop"><button class="btn btn-primary btn-shop btn_releted_pdt pdt-page-btn-color"><i class="fas fa-shopping-cart me-2"></i> Order Now</button></a>

            </div>
         </div>
         <?php
         }}}}
         ?>
      </div>
   </div>
<?php } ?>