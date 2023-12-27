<section class="header_section header_section9" id="header_section">

   <!------ Header-top-bar Starts ------>
   <div class="header-top-bar topbar-background-color topbar-text-color d-lg-block d-none top-bar">
      <div class="container">
         <div class="row align-items-center">
            
            <div class="col-6 col-lg-7">
		         <div class="top-left">
                  <div class="left-phone me-3">
                     <i class="fal fa-phone-volume me-1"></i>
                     <?= $generalConfig['phone_number'] ?>
                  </div>
               </div>
		      </div>

            <div class="col-6 col-lg-5">
               <div class="top-right d-flex align-items-center justify-content-end">
                  <ul class="d-flex top-bar-right m-0 p-0">
                     <li>
                        <a href="checkout.php" class="topbar-text-color">
                        Checkout
                        </a>
                     </li>
                     <li class="ms-4">
                        <a href="cart.php" class="topbar-text-color">
                           Cart
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
  </div>
  <!-----Header-top-bar Ends here----->

  <!-----Header-Main Starts here----->
   <header class="nav-color bottom-header-container align-items-center">
      
      <!-- 1st Nav Starts-->
      <div class="container top-head w-md-100 w-75">
         <div class="row align-items-center">
            <div class="col-lg-7">
               <div class="navbar"> <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a></div>
            </div>
            <div class="col-lg-5 right-header-btn align-items-center justify-content-end">
               <div class="navRight">
                  <ul class="d-flex align-items-center m-0">
                     <li class="">
                        <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
                           <ul class="navbar-nav navbar-nav4 me-auto float-end">
                              <li class="cart_link">
                                 <a href="javascript:void(0);">
                                    <span class="cart_text nav-icon-color">
                                       <i class="fab fa-bitbucket nav-icon-color bucket"></i>
                                    </span>
                                    <span class="cart_amt nav-text-color">
                                       $
                                       <p id="cart_amt" class="subtotalAmount" style="display: inline;"></p>
                                       <i class="fal fa-angle-down arrow"></i>
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
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- 1st Nav Ends-->

      <!-- 2nd Nav Starts-->
      <div class="max-wid primary_color">
         <div class="container">
            <div class="row">
               <!-- <div class="col-8 alooo">
                  <div class="navbar"> <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a></div>
               </div> -->
               <div class=" alooo2 d-flex align-items-center justify-content-start">
                  <button class="navbar-toggler " id="toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <i class="fas fa-bars"></i>
                  </button>
                  <div class="d-lg-flex align-items-center header-content text-center mob-men">
                     <div class="primary-navigation">
                        <nav class="navbar navbar-expand-lg  p-0">
                           <div class="container px-0">
                              <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item pe-2"><a href="index.php" class="nav-link nav-active-color">Home</a></li>
                                    <li class="nav-item pe-2"><a href="shop.php" class="nav-link primary_text_color">Shop</a></li>
                                    <li class="nav-item pe-2"><a href="cart.php" class="nav-link primary_text_color">Cart</a></li>
                                    <li class="nav-item pe-2"><a href="checkout.php" class="nav-link primary_text_color">Checkout</a></li>
                                 </ul>
                              </div>
                           </div>
                        </nav>
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>
      <!-- 2nd Nav Ends-->
  	<!-----Header-navbar ends here----->

   </header>

    <!-- Menu -->
    
         <!-- Menu -->
    
</section>