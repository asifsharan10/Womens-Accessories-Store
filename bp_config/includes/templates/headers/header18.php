<section class="header_section header_section18" id="header_section">
  <header class="navbar-nav18">

    <!-- Main Nav Starts -->
    <div class="primary-navigation py-lg-2">
      <nav class="navbar navbar-expand-lg p-0 ">
        <div class="header18-container">
          <a class="nav-text-color" href="index.php">
            <?= $generalConfig['brand_name'] ?>
          </a>
          <button class="navbar-toggler menu-icon ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample18" aria-controls="navbarsExample18" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
              <i class="fas fa-bars"></i>
            </span>
          </button>
          <div class="collapse navbar-collapse header18-menu-container" id="navbarsExample18">
            <ul class="navbar-nav mx-auto mb-lg-0 nav-color">
              <li class="nav-item active">
                <a class="nav-link nav-active-color" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-text-color" aria-current="page" href="shop.php">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  nav-text-color" aria-current="page" href="cart.php">Cart</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  nav-text-color" aria-current="page" href="checkout.php">Checkout</a>
              </li>
              <li>
                <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
                  <ul class="navbar-nav cart-nav ml-auto flex-row ms-3">
                    <li class="cart_link d-none d-sm-inline">
                      <a href="javascript:void(0);">
                        <span class="cart_text nav-text-color">
                          <i class="bi bi-cart fs-5 nav-icon-color"></i>
                        </span>
                        <span class="cart_amt">
                          $<p id="cart_amt" class="subtotalAmount" style="display: inline;"></p>
                        </span>
                      </a>
                      <div class="minibag cart_bag cart-bag-outline" id="minicart">
                        <!-- class = empty_bag -->
                        <div class="minicart_inner">
                          <div class="minicart_table table-responsive">
                            <table class="table minicart_details">
                              <tr id="minicartRow"> </tr>
                            </table>
                          </div>
                          <div class="subtotal_column">
                            <p> Subtotal: $<span class="subtotalAmount" id="subtotalAmount"></span> </p>
                          </div>
                          <div class="minicart_buttons">
                            <a href="cart.php" class="btn btn-continue shop-btn-outline"> View Cart </a>
                            <a href="checkout.php" class="btn btn-update shop-btn-color"> Checkout </a>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                <?php } ?>
              </li>
            </ul>
          </div>
          <!-- Cart Starts Here -->

          <!-- Cart Ends Here -->
        </div>
      </nav>
    </div>
    <!-- Main Nav Ends -->

  </header>
</section>