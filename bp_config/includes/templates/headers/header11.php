<section class="header_section header_section11 container" id="header_section">

   
   <!-----Header-top-bar Starts here----->
   <div class="header-top-bar topbar-background-color topbar-text-color d-lg-flex d-none top-bar">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-sm-6 col-lg-7">
               <div class="top-left">
                  <div class="me-3">
                     <a href="mailto:<?= $generalConfig['email'] ?>"class="topbar-text-color">
                        <?= $generalConfig['email'] ?>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-lg-5">
               <div class="top-right d-flex align-items-center justify-content-end">
               <ul class="d-flex m-0 p-0">
                     <li>
                        <a href="cart.php" class="topbar-text-color">
                           Shopping Cart
                        </a>
                     </li>
                     <li class="ms-4">
                        <a href="checkout.php" class="topbar-text-color">
                           Checkout
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

      <!-----Header-navbar starts here----->
      <div class="container-fluid top-head d-none d-lg-flex nav-text-color">
         <div class="row align-items-center">
            <!-- <div class="col-lg-7">
               Search Bar Here
            </div> -->
            <div class="col-lg-7">
               <div class="navbar"> <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a></div>
            </div>
            <div class="col-lg-5 d-flex align-items-center justify-content-end">
               <div class="navRight">
                  <ul class="d-flex align-items-center m-0">
                     <li class="ms-4">
                        <a href="contact.php" class="shop-btn">
                           <i class="fas fa-user-headset me-2 nav-icon-color"></i>
                           <span class="nav-text-color">About</span>
                        </a>
                     </li>   
                     <li class="ms-4">
                        <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
                           <ul class="navbar-nav navbar-nav4 me-auto float-end header-cart">
                              <li class="cart_link">
                                 <a href="javascript:void(0);">
                                    <span class="cart_text"><i class="far fa-shopping-bag me-2 cart-icon nav-icon-color"></i></span>
                                    <span class="cart_amt nav-text-color">
                                       $
                                       <p id="cart_amt" class="subtotalAmount me-1" style="display: inline;"></p>
                                       <i class="fas fa-caret-down"></i>
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

      <!-- 2nd Nav -->
      <div class="bottom-head">
         <div class="container-fluid">
            <div class="row position-relative">
               <div class="col-10 alooo ps-4 d-lg-none d-flex align-items-center">
                  <div class="navbar"> <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a></div>
               </div>
               <div class="col-3 left-col d-none d-lg-flex"></div>
               <div class="col-2 col-lg-6 alooo2 d-flex align-items-center center-col">
                  <button class="navbar-toggler" id="toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <i class="fas fa-bars"></i>
                  </button>
                  <div class="align-items-center header-content text-center">
                     <div class="primary-navigation">
                        <nav class="navbar navbar-expand-lg  p-0">
                           <div class="container">
                              <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item pe-2"><a href="index.php" class="nav-link nav-active-color">Home</a></li>
                                    <li class="nav-item pe-2"><a href="shop.php" class="nav-link secondary_text_color">Shop</a></li>
                                    <li class="nav-item pe-2"><a href="cart.php" class="nav-link secondary_text_color">Cart</a></li>
                                    <li class="nav-item pe-2"><a href="checkout.php" class="nav-link secondary_text_color">Checkout</a></li>
                                    <li class="nav-item pe-2"><a href="contact.php" class="nav-link secondary_text_color">Contact</a></li>
                                 </ul>
                              </div>
                           </div>
                        </nav>
                     </div>
                  </div>

               </div>
               <div class="col-3 right-col d-none d-lg-flex">
                  <a href="tel:<?= $generalConfig['phone_number'] ?>">
                     <span class="left me-1 secondary_text_color">
                        <i class="fas fa-phone-alt me-2"></i>
                        Contact Us:
                     </span>
                     <span class="right primary_text_color">
                        <?= $generalConfig['phone_number'] ?>
                     </span>
                  </a>
               </div>
            </div>
         </div>
      </div>
      <!-----Header-navbar ends here----->
   </header>
   <!-----Main Header Ends here----->
   
    
</section>