<section class="header_section header_section20" id="header_section">

  <!-----Header-top-bar Starts here----->
  <div class="topbar topbar-background-color topbar-text-color top-bar">
    <div class="container">
      <div class="row align-content-between">
        <div class="navRight topbar-contact-btn">
          <ul class="d-flex align-items-center m-0">
            <li class="ms-4">
              <a href="contact.php" class="header20-contact-btn primary_color primary_text_color">Contact Us</a>
            </li>
          </ul>
        </div>
        <div class="col icons topbar-icons-content">
          <span class="d-lg-inline me-4 pe-4 topbar20-content">
            <i class="fas fa-phone-alt"></i><span><?= $generalConfig['phone_number'] ?></span>
          </span>
          <span class="d-lg-inline me-4 pe-4 topbar20-content">
            <i class="fas fa-envelope"></i><span><?= $generalConfig['email'] ?></span>
          </span>
        </div>
      </div>
    </div>
  </div>
  <!-----Header-top-bar Ends here----->

  <!-----Main Header Starts here----->
  <header class="nav-color main-header p-3">

    <!-----Top Header----->
    <div class="container top-head d-none d-lg-flex">
      <div class="row align-items-center">
        <div class="p-0 header20-navbar-brand">
          <div class="navbar"> <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a></div>
        </div>
      </div>
    </div>

    <!----Bottom Header---->
    <div class="container header20-bottom-header">
      <div class="bottom-head nav-txt-color-bottom position-relative">
        <div class="navbarMobile me-auto d-flex d-lg-none header20-mobile-content-1"> <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a></div>
        <div class="col-2 col-lg-12 d-flex align-items-center p-0 w-100 header20-mobile-content-2">
          <button class="navbar-toggler" id="toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
          <div class="primary-navigation nav-color">
            <nav class="navbar navbar-expand-lg  p-0">
              <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 main-menu">
                  <li class="nav-item pe-3"><a href="index.php" class="nav-link nav-active-color">Home</a></li>
                  <li class="nav-item pe-3"><a href="shop.php" class="nav-link nav-text-color">Shop</a></li>
                  <li class="nav-item pe-3"><a href="cart.php" class="nav-link nav-text-color">Cart</a></li>
                  <li class="nav-item pe-3"><a href="checkout.php" class="nav-link nav-text-color">Checkout</a></li>
                  <li class="nav-item pe-3"><a href="contact.php" class="nav-link nav-text-color">Contact</a></li>
                </ul>
                <ul class="header-cart">
                  <li class="ms-4">
                    <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
                      <ul class="navbar-nav cart-nav ml-auto flex-row ms-3">
                        <li class="cart_link d-none d-sm-inline">
                          <a href="javascript:void(0);">
                            <span class="cart_text nav-text-color">
                              <i class="bi bi-cart fs-5 nav-icon-color"></i>
                            </span>
                            <span class="cart_amt nav-text-color">
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
            </nav>
          </div>

        </div>
      </div>
    </div>

  </header>
  <!-----Main Header Ends here----->

</section>