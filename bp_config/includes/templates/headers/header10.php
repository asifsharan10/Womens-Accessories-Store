
<section class="header_section header_section10" id="header_section">
   <header>
      <!-- Top Bar Starts -->
      <div class="topbar topbar-background-color top-bar">
         <div class="container d-flex align-items-center h-100">
            <div class="row w-100 justify-content-between align-items-center h-100 mx-auto">
               <div class="col d-flex align-items-center h-100 p-0">      
                  <ul class="list-inline m-0 h-100 d-flex align-items-center">
                     <li class="list-inline-item d-flex align-items-center m-0">
                        <a href="contact.php" class="topbar-text-color">Contact</a>
                     </li>
                     <li class="list-inline-item d-flex align-items-center m-0">
                        <a href="terms.php" class="topbar-text-color">Terms</a>
                     </li>
                     <li class="list-inline-item d-flex align-items-center m-0">
                        <a href="privacy.php" class="topbar-text-color">Privacy Policy</a>
                     </li>
                  </ul>
               </div>
               <div class="col-auto contact-head d-flex align-items-center h-100">
                  <!-- Cart -->
                  <div class="topbar-cart">
                     <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
                        <ul class="navbar-nav navbar-nav10">
                           <li class="cart_link">
                              <a href="javascript:void(0);">
                                 <span class="cart_text">
                                    <i class="fas fa-shopping-cart secondary_text_color"></i>
                                 </span>
                                 <span class="cart_amt secondary_text_color">
                                    $
                                    <p id="cart_amt" class="subtotalAmount" style="display: inline;"></p>
                                 </span>
                              </a>
                              <div class="minibag cart_bag cart-bag-outline" id="minicart">
                                 <div class="minicart_inner">
                                    <div class="minicart_table table-responsive">
                                       <table class="table minicart_details">
                                          <tr id="minicartRow"></tr>
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
      <!-- Top Bar Ends -->

      <!-- Top Bar Starts -->
      <nav class="navbar navbar-expand-lg py-4 nav-color" aria-label="Third navbar example">
         <div class="container"> 
            <a class="header_brand" href="index.php">
               <?= $generalConfig['brand_name'] ?>
            </a>
            <button class="navbar-toggler menu-icon" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
               <i class="fas fa-bars"></i> 
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample03">
               <ul class="navbar-nav ms-auto me-0">
                  <li class="nav-item"> <a class="nav-link nav-active-color" aria-current="page" href="shop.php">Products</a> </li>
                  <li class="nav-item"> <a class="nav-link  nav-text-color" aria-current="page" href="cart.php">Cart</a> </li>
                  <li class="nav-item"> <a class="nav-link  nav-text-color" aria-current="page" href="checkout.php">Checkout</a> </li></li>
                  <li class="nav-item"> <a class="nav-link  nav-text-color" aria-current="page" href="terms.php">Terms</a> </li></li>
               </ul>        
            </div>
         </div>
      </nav>
   </header>  
</section>