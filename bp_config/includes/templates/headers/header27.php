<section class="header_section header_section27" id="header_section">
   <header>
    <!-----Header-navbar starts here----->
   <div class="header-wrap">
      <div class="navbar nav-color py-4">
         <div class="container w-100 d-flex justify-content-start align-items-center nav-text-color">
            <div class="col col-lg-auto h-100">
               <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a>
            </div>
            <div class="col-2 col-lg-auto d-flex h-100">
               <button class="navbar-toggler m-auto" id="toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fas fa-bars"></i>
               </button>
               <div class="primary-navigation nav-color">
                  <nav class="navbar navbar-expand-lg p-0 nav-color">
                     <div class="container p-0">
                           <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                 <li class="nav-item"><a href="index.php" class="nav-link nav-active-color">Home</a></li>
                                 <li class="nav-item"><a href="shop.php" class="nav-link nav-text-color">Shop</a></li>
                                 <li class="nav-item"><a href="cart.php" class="nav-link nav-text-color">Cart</a></li>
                                 <li class="nav-item"><a href="contact.php" class="nav-link nav-text-color">Contact</a></li>
                              </ul>
                           </div>
                     </div>
                  </nav>
               </div>    
            </div>
            <div class="col-auto h-100 d-none d-xl-flex contact-btns-main ms-auto">
               <div class="d-lg-flex align-items-center d-none header-content text-left px-2">
                  <div class="header-icon">
                    <a href="tel:<?= $generalConfig['phone_number'] ?>" class="bottom-text primary_color primary_text_color px-4 py-2">
                        <i class="bi bi-telephone nav-icon-color"></i>
                        <?= $generalConfig['phone_number'] ?>
                    </a>
                </div>
                  
                  <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
                      <ul class="navbar-nav navbar-nav4 ms-2">
                           <li class="cart_link">
                              <a href="javascript:void(0);">
                                 <div class="d-flex primary_color primary_text_color px-4 py-2 shopping-cart-btn">
                                    <span class="cart_text nav-text-color"><i class="far fa-shopping-bag nav-icon-color"></i></span>
                                    <div class="cart-text-wrap d-flex flex-column ms-3 align-items-start">
                                       <span class="cart_amt nav-text-color bottom-text">
                                          <!-- <p id="cart_amt" class="subtotalAmount bottom-text" style="display: inline;"></p> -->
                                          <p class="bottom-text primary_text_color" style="display: inline;">Shopping Cart</p>
                                       </span>
                                    </div>
                                 </div>
                                 <!-- <span class="material-icons bag_icon ">shopping_bag 
                                    <span class="bag_count" id="bag_count">
                                       <p id="cart_qty" style="display: inline;"></p>
                                    </span>
                                    </span> -->
                              </a>
                              <div class="minibag cart_bag" id="minicart">
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
                                       <p>
                                          Subtotal: $<span class="subtotalAmount" id="subtotalAmount"></span>
                                       </p>
                                    </div>
                                    <div class="minicart_buttons">
                                       <a href="cart.php" class="btn btn-continue shop-btn-outline">
                                       View Cart
                                       </a>
                                       <a href="checkout.php" class="btn btn-update shop-btn-color">
                                       Checkout
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        </ul>
                  <?php } ?>
               </div>
            </div>
         </div>
    </div>
  </div>
  	<!-----Header-navbar ends here----->

<!----==========================================------->

	<!-----Header-primary-navigation starts here----->
  <!-- <div class="primary-navigation">
      <nav class="navbar navbar-expand-lg  p-0 nav-color">
         <div class="container">
               <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                     <li class="nav-item"><a href="index.php" class="nav-link nav-text-color nav-active-color">Home</a></li>
                     <li class="nav-item"><a href="contact.php" class="nav-link nav-text-color">Contact</a></li>
                     <li class="nav-item"><a href="terms.php" class="nav-link nav-text-color">Terms</a></li>
                     <li class="nav-item"><a href="privacy.php" class="nav-link nav-text-color">Privacy</a></li>
                     <li class="nav-item"><a href="shop.php" class="nav-link nav-text-color">Order Now</a></li>
                  </ul>
               </div>
         </div>
      </nav>
   </div> -->
  <!-----Header-primary-navigation Ends here----->

</header>

</section>