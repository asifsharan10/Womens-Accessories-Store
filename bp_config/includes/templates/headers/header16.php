<section class="header_section header_section16" id="header_section">
  <!-----Header-top-bar Ends here----->
  <header class="navbar-nav16 nav-color">
    <div class="">
      <div class="container">
        <div class="navbar">
          <h2><a class="header_brand nav-text-color" href="index.php">
            <?= $generalConfig['brand_name'] ?>
            </a></h2>
          <button class="navbar-toggler" id="toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
        </div>
      </div>
    </div>
    <div class="primary-navigation">
      <nav class="navbar navbar-expand-lg  p-0">
        <div class="container">
          <div class="collapse navbar-collapse header16-menu-1" id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item"><a href="index.php" class="nav-link nav-active-color">Home</a></li>
              <li class="nav-item"><a href="shop.php" class="nav-link nav-text-color">Shop</a></li>
              <li class="nav-item"><a href="cart.php" class="nav-link nav-text-color">Cart</a> </li>
            </ul>
          </div>
          <div class="header16-add-to-cart">
              <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
                <ul class="navbar-nav cart-nav ml-auto">
                <li class="cart_link"> <a href="javascript:void(0);">
                    <i class="fas fa-shopping-cart me-2 nav-icon-color header16-add-to-cart-icon"></i>
                 
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
                    <p> Subtotal: $<span class="subtotalAmount" id="subtotalAmount"></span> </p>
                  </div>
                  <div class="minicart_buttons"> <a href="cart.php" class="btn btn-continue shop-btn-outline"> View Cart </a> <a href="checkout.php" class="btn btn-update shop-btn-color"> Checkout </a> </div>
                </div>
              </div>
            </li>
          </ul>
            <?php } ?>
              </div>
          <div class="collapse navbar-collapse header16-menu-2" id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item"><a href="terms.php" class="nav-link nav-text-color">Terms</a></li>
              <li class="nav-item"><a href="privacy.php" class="nav-link nav-text-color">Privacy</a></li>
              <li class="nav-item"><a href="contact.php" class="nav-link nav-text-color">contact</a> </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
</section>