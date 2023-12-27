<section class="header_section header_section13" id="header_section">

   <!-----Header-top-bar Starts here----->
   <div class="header-top-bar topbar-background-color topbar-text-color d-flex top-bar">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-7 col-lg-7">
               <div class="top-left">
                  <div class="me-3">
                     Returns and Shipping.
                  </div>
               </div>
            </div>
            <div class="col-5 col-lg-5">
               <div class="top-right d-flex align-items-center justify-content-end">
                  <ul class="d-flex m-0 p-0">
                     <li>
                        <a href="contact.php" class="topbar-text-color">
                           Contact Us
                        </a>
                     </li>
                     <li class="ms-4">
                        <a href="terms.php" class="topbar-text-color">
                           Terms
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-----Header-top-bar Ends here----->

   <!-----Main Header Starts here----->
   <header class="nav-color main-header">

      <!-----Top Header----->
      <div class="container top-head d-none d-lg-flex">
         <div class="row align-items-center">
            <div class="col-lg-7 p-0">
               <div class="navbar"> <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a></div>
            </div>
            <div class="col-lg-5 d-flex align-items-center justify-content-end">
               <div class="navRight">
                  <ul class="d-flex align-items-center m-0">
                     <li class="ms-4">
                        <div class="header-icon pe-4 h-100">
                           <i class="far fa-phone-alt nav-icon-color"></i>
                           <span class="text-left ms-3 nav-text-color">
                              <div class="top-text nav-text-color">CALL US NOW</div>
                              <div class="bottom-text nav-text-color">
                                 <?= $generalConfig['phone_number'] ?>
                              </div>
                           </span>
                        </div>
                     </li>
                     <li class="ms-4">
                        <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
                           <ul class="navbar-nav navbar-nav4 me-auto float-end header-cart">
                              <li class="cart_link">
                                 <a href="javascript:void(0);">
                                    <span class="cart_text"><i class="far fa-shopping-bag me-2 cart-icon nav-icon-color"></i></span>
                                    <span class="cart_amt">

                                       <p id="cart_amt" class="subtotalAmount me-1" style="display: none;"></p>
                                       <i class="fas fa-caret-down nav-icon-color"></i>
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
                                          <a href="cart.php" class="btn btn-continue  shop-btn-outline">
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

      <!----Bottom Header---->
      <div class="container">
         <div class="bottom-head nav-color-bottom nav-txt-color-bottom position-relative">
            <div class="navbarMobile me-auto d-flex d-lg-none"> <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a></div>
            <div class="row">
               <div class="col-2 col-lg-12 d-flex align-items-center p-0 w-100">
                  <button class="navbar-toggler" id="toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <i class="fas fa-bars"></i>
                  </button>
                  <div class="align-items-center header-content text-center">
                     <div class="primary-navigation">
                        <nav class="navbar navbar-expand-lg  p-0">
                           <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                 <li class="nav-item pe-3"><a href="index.php" class="nav-link nav-active-color">Home</a></li>
                                 <li class="nav-item pe-3"><a href="shop.php" class="nav-link primary_text_color">Shop</a></li>
                                 <li class="nav-item pe-3"><a href="cart.php" class="nav-link primary_text_color">Cart</a></li>
                                 <li class="nav-item pe-3"><a href="checkout.php" class="nav-link primary_text_color">Checkout</a></li>
                                 <li class="nav-item pe-3"><a href="contact.php" class="nav-link primary_text_color">Contact</a></li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>

   </header>
   <!-----Main Header Ends here----->

</section>