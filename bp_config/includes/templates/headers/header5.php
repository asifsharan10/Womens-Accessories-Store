<section class="header_section header_section5" id="header_section">
   <header>
    <!-----Header-navbar starts here----->
   <div class="header-wrap">
      <div class="navbar">
         <div class="row w-100 d-flex justify-content-start align-items-center nav-color nav-text-color">
            <div class="col col-lg-auto primary_color h-100">
               <a class="header_brand primary_text_color" href="index.php"><?= $generalConfig['brand_name'] ?></a>
            </div>
            <div class="col-2 col-lg-auto d-flex h-100">
               <button class="navbar-toggler m-auto" id="toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fas fa-bars"></i>
               </button>
               <div class="primary-navigation nav-color">
                  <nav class="navbar navbar-expand-lg  p-0 nav-color">
                     <div class="container">
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
            <div class="col-auto h-100 d-none d-xl-flex ms-auto">
               <div class="d-lg-flex align-items-center d-none header-content text-left">
                  <div class="header-icon pe-4 h-100"> <i class="bi bi-telephone nav-icon-color"></i><span class="text-left ms-3 nav-text-color"><div class="top-text">Call Us</div><div class="bottom-text"><?= $generalConfig['phone_number'] ?></div></span></div>
                  
                  <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
                      <ul class="navbar-nav navbar-nav4 ms-4">
                           <li class="cart_link">
                              <a href="javascript:void(0);">
                                 <div class="d-flex">
                                    <span class="cart_text nav-text-color"><i class="far fa-shopping-bag nav-icon-color"></i></span>
                                    <div class="cart-text-wrap d-flex flex-column ms-3 align-items-start">
                                       <span class="nav-text-color top-text">
                                          Shopping Cart:
                                       </span>
                                       <span class="cart_amt nav-text-color bottom-text">
                                          $
                                          <p id="cart_amt" class="subtotalAmount bottom-text" style="display: inline;"></p>
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