<section class="header_section header_section8" id="header_section">
  <!-----Header-top-bar Ends here----->
  <header class="navbar-nav8">
    <div class="nav-color">
      <div class="container">
        <div class="navbar">
          <h2><a class="header_brand nav-text-color" href="index.php">
            <?= $generalConfig['brand_name'] ?>
            </a></h2>
          <button class="navbar-toggler" id="toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
          <div class="d-lg-flex align-items-center d-none header-content">
            <!-- <div class="header-icon d-flex  align-items-center"><i class="far fa-envelope fs-1  me-2 nav-icon-color"></i><strong> <span class="cwp-contact-info-content">
              <h5 class="nav-text-color">Send your mail at</h5>
              <div class="cwp-contact-info-title nav-text-color"><?= $generalConfig['email'] ?></div>
              </span></strong> </div> -->
            <div class="header-icon d-flex  align-items-center"><i class="fas fa-phone-alt fs-1  me-2 nav-icon-color"></i><strong><span class="cwp-contact-info-content">
              <h5 class="nav-text-color"> Helpline:</h5>
              <div class="cwp-contact-info-title nav-text-color"><?= $generalConfig['phone_number'] ?> </div>
              </span></strong> </div>
              <div>
              <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
                <ul class="navbar-nav cart-nav ml-auto">
            <li class="cart_link"> <a href="javascript:void(0);"><i class="fas fa-shopping-cart   me-2 nav-icon-color"></i> <span class="cart_text nav-text-color"></span> <span class="cart_amt nav-text-color"> $
              <p id="cart_amt" class="subtotalAmount nav-text-color" style="display: inline;"></p>
              </span> 
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
          </div>
        </div>
      </div>
    </div>
    <div class="primary-navigation">
      <nav class="navbar navbar-expand-lg  p-0 primary_color">
        <div class="container">
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item"><a href="index.php" class="nav-link nav-active-color">Home</a></li>
              <li class="nav-item"><a href="shop.php" class="nav-link primary_text_color">Shop</a></li>
              <li class="nav-item"><a href="cart.php" class="nav-link primary_text_color">Cart</a> </li>
            </ul>
          </div>
            
        </div>
      </nav>
    </div>
  </header>
</section>