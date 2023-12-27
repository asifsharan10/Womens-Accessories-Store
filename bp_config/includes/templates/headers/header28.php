<section class="header_section header_section28 pt-3" id="header_section">

   <!-----Header-top-bar Starts here----->
   <div class="container topbar topbar-background-color topbar-text-color top-bar">
      <div class="align-content-between px-4">
         <div class="navRight topbar-contact-btn px-1">
            <ul class="d-flex align-items-center m-0 p-0">
               <li class="m-0">
                  <h4 href="" class="header28-contact-btn topbar_text_color m-0">Fast shipping Everday - 30 days Return</h4>
               </li>
            </ul>
            <ul class="d-flex align-items-center m-0 p-0">
               <li class="m-0">
                  <h4 href="" class="header28-contact-btn topbar_text_color m-0">Need Help? Call us at <?= $generalConfig['phone_number'] ?> or email us <?= $generalConfig['email'] ?>.</h4>
               </li>
            </ul>
         </div>
      </div>
   </div>

   <header class="navbar-nav12 nav-color mt-2">
      <div class="primary-navigation">
         <nav class="navbar navbar-expand-lg p-0">
            <div class="container">
               <div class="row w-100">
                  <div class="col-3 d-flex align-items-center justify-content-center navbar-logo">
                     <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a>
                  </div>
                  <div class="col-6 d-lg-flex align-items-center justify-content-center navbar-menu">
                     <div class="collapse navbar-collapse justify-content-center nav-color" id="navbarsExample03">
                        <ul class="w-100 navbar-nav justify-content-center">
                           <li class="nav-item active"> <a class="nav-link nav-active-color" aria-current="page" href="index.php">Home</a> </li>
                           <li class="nav-item"> <a class="nav-link nav-text-color" aria-current="page" href="shop.php">Shop</a> </li>
                           <li class="nav-item"> <a class="nav-link  nav-text-color" aria-current="page" href="cart.php">Cart</a> </li>
                           <li class="nav-item"> <a class="nav-link  nav-text-color" aria-current="page" href="checkout.php">Checkout</a> </li>
                           </li>
                           <li class="mobile-cart">
                              <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
                                 <ul class="w-100 navbar-nav cart-nav ml-auto">

                                    <!-- <li class="cart_link d-none d-lg-inline"><a href="contact.php"><span> <i class="bi bi-person  fs-4 me-3 icuser nav-icon-color"></i> </span></span> </li> -->

                                    <li class="cart_link"> <a href="javascript:void(0);"><span class="cart_text nav-text-color"><i class="bi bi-cart fs-5 nav-icon-color"></i> Shopping Cart</span>
                                          <!-- <span class="cart_amt nav-text-color"> $
                                 <p id="cart_amt" class="subtotalAmount" style="display: inline;"></p>
                              </span>  -->
                                          <!-- <span class="material-icons bag_icon ">shopping_bag 
                                             <span class="bag_count" id="bag_count">
                                                <p id="cart_qty" style="display: inline;"></p>
                                             </span>
                                             </span> -->
                                       </a>
                                       <div class="minibag cart_bag cart-bag-outline" id="minicart">

                                          <!-- class = empty_bag -->
                                          <div class="minicart_inner">
                                             <!-- <p class="empty_cart">
                                                Your cart is empty
                                                </p> -->
                                             <div class="minicart_table table-responsive">
                                                <table class="table minicart_details">
                                                   <tr id="minicartRow">

                                                   </tr>
                                                </table>
                                             </div>
                                             <div class="subtotal_column">
                                                <p> Subtotal: $<span class="subtotalAmount" id="subtotalAmount"></span> </p>
                                             </div>
                                             <div class="minicart_buttons"> <a href="cart.php" class="btn btn-continue"> View Cart </a> <a href="checkout.php" class="btn btn-update"> Checkout </a> </div>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              <?php } ?>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-3 d-flex align-items-center justify-content-end navbar-cart">
                     <button class="navbar-toggler menu-icon" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                           <i class="fas fa-bars"></i>
                        </span>
                     </button>
                     <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
                        <ul class="navbar-nav cart-nav ml-auto desktop-cart">

                           <!-- <li class="cart_link d-none d-lg-inline"><a href="contact.php"><span> <i class="bi bi-person  fs-4 me-3 icuser nav-icon-color"></i> </span></span> </li> -->

                           <li class="cart_link"> <a href="javascript:void(0);"><span class="cart_text nav-text-color"><i class="bi bi-cart fs-5 nav-icon-color"></i> Shopping Cart</span>
                                 <!-- <span class="cart_amt nav-text-color"> $
                                 <p id="cart_amt" class="subtotalAmount" style="display: inline;"></p>
                              </span>  -->
                                 <!-- <span class="material-icons bag_icon ">shopping_bag 
                                             <span class="bag_count" id="bag_count">
                                                <p id="cart_qty" style="display: inline;"></p>
                                             </span>
                                             </span> -->
                              </a>
                              <div class="minibag cart_bag cart-bag-outline" id="minicart">

                                 <!-- class = empty_bag -->
                                 <div class="minicart_inner">
                                    <!-- <p class="empty_cart">
                                                Your cart is empty
                                                </p> -->
                                    <div class="minicart_table table-responsive">
                                       <table class="table minicart_details">
                                          <tr id="minicartRow">

                                          </tr>
                                       </table>
                                    </div>
                                    <div class="subtotal_column">
                                       <p> Subtotal: $<span class="subtotalAmount" id="subtotalAmount"></span> </p>
                                    </div>
                                    <div class="minicart_buttons"> <a href="cart.php" class="btn btn-continue"> View Cart </a> <a href="checkout.php" class="btn btn-update"> Checkout </a> </div>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </nav>
      </div>
   </header>
</section>