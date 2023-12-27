<section class="header_section header_section6" id="header_section">
   <div class="header-top-bar topbar-background-color d-lg-block d-none top-bar">
      <div class="container-fluid">
         <div class="row align-items-center topbar-text-color">
            
            <div class="col-sm-6 col-lg-7">
		         <div class="top-left">
                  <ul class="d-flex top-bar-right m-0 p-0">
                         <li>
                            <a>
                               <i class="far fa-truck me-1"></i>
                              Fast Delivery
                            </a>
                         </li>
                         <li class="ms-4">
                            <a>
                               <i class="far fa-usd-circle  me-1"></i>
                               Great Prices
                            </a>
                         </li>
                         <li class="ms-4">
                            <a>
                               <i class="fal fa-user-headset me-1"></i>
                               Best Customer Support
                            </a>
                         </li>
                      </ul>
               </div>
		      </div>

            <div class="col-sm-6 col-lg-5">
               <div class="top-right d-flex align-items-center justify-content-end">
                  <div class="right-phone me-3">
                     <i class="fal fa-phone-volume me-1"></i>
                     <?= $generalConfig['phone_number'] ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
  </div>
  <!-----Header-top-bar Ends here----->

<header class="nav-color">

    <!-----Header-navbar starts here----->
   <div class="container-fluid top-head">
      <div class="row align-items-center">
         <div class="col-lg-7">
            <div class="navbar"> <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a></div>
         </div>
         <div class="col-lg-5 d-flex align-items-center justify-content-end">
            <div class="navRight">
               <ul class="d-flex align-items-center m-0">
                  <li class="ms-5">
                     <a href="contact.php" class="nav-text-color">
                     <i class="fal fa-question-circle me-1 nav-icon-color"></i>
                        Need Help
                     </a>
                  </li>
                  <li class="ms-5">
                     <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
                        <ul class="navbar-nav navbar-nav4 me-auto float-end">
                           <li class="cart_link">
                              <a href="javascript:void(0);">
                                 <span class="cart_text"><i class="far fa-shopping-bag nav-icon-color"></i></span>
                                 <span class="cart_amt nav-text-color">
                                    $
                                    <p id="cart_amt" class="subtotalAmount" style="display: inline;"></p>
                                 </span>
                              </a>
                              <div class="minibag cart_bag" id="minicart">
                                 <div class="minicart_inner">
                                    <div class="minicart_table table-responsive">
                                       <table class="table minicart_details">
                                          <tr id="minicartRow">
                                          </tr>
                                       </table>
                                    </div>
                                    <div class="subtotal_column">
                                       <p>
                                          Subtotal: $<span class="subtotalAmount" id="subtotalAmount"></span>
                                       </p>
                                    </div>
                                    <div class="minicart_buttons">
                                       <a href="cart.php" class="btn btn-continue  shop-btn-outline" style="color:#000 !important;">
                                          View Cart
                                       </a>
                                       <a href="checkout.php" class="btn btn-update  shop-btn-color">
                                          Checkout
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     <?php } ?>
                  </li>
                  <li class="ms-5">
                     <a href="shop.php" class="shop-btn banner-btn-color">
                        <i class="fas fa-shopping-bag me-1"></i>
                        <span >Shop</span>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>

   <!-- 2nd Nav -->
   <div class="max-wid primary_color">
      <div class="container-fluid">
         <div class="row">
            <div class="col-8 alooo">
               <div class="navbar"> <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a></div>
            </div>
            <div class="col-4 alooo2 d-flex align-items-center justify-content-center">
               <button class="navbar-toggler" id="toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fas fa-bars"></i>
               </button>
               <div class="primary-navigation align-items-center header-content text-center">
                  <nav class="navbar navbar-expand-lg  p-0">
                     <div class="container">
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                           <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                              <li class="nav-item pe-2"><a href="index.php" class="nav-link nav-active-color">Home</a></li>
                              <li class="nav-item pe-2"><a href="shop.php" class="nav-link primary_text_color">Shop</a></li>
                              <li class="nav-item pe-2"><a href="cart.php" class="nav-link primary_text_color">Cart</a></li>
                              <li class="nav-item pe-2"><a href="checkout.php" class="nav-link primary_text_color">Checkout</a></li>
                              <li class="nav-item pe-2"><a href="contact.php" class="nav-link primary_text_color">Contact</a></li>
                           </ul>
                        </div>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </div>
  	<!-----Header-navbar ends here----->

</header>

    <!-- Menu -->
    
         <!-- Menu -->
    
</section>