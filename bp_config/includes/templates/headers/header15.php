<section class="header_section header_section15" id="header_section">
  <header>
    <!-- Top Bar Starts Here -->
    <div class="header-top-bar topbar-background-color topbar-text-color top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-lg-5 "><i class="fad fa-bags-shopping me-2 topbar-text-color"></i><?= $updateContent["slogan"]?></div>
          <div class="col-6 col-lg-7">
            <ul class="d-flex justify-content-end top-bar-right m-0">
              <li><a href="mailto: <?= $generalConfig['email'] ?>" class="topbar-text-color"><i class="fas fa-mail-bulk top-nav-icon-color me-2 topbar-text-color"></i><?= $generalConfig['email'] ?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Top Bar Ends Here -->

    <!-- Header Starts Here -->
    <div class="menu-wrapper nav-color">
      <!-- Upper Header Starts here -->
      <div class="container top-header">
        <div class="navbar"> <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a>
          <button class="navbar-toggler" id="toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
          <div class="d-lg-flex align-items-center d-none header-content">
            <div class="d-none d-md-flex text-start">
              <div class="call me-4 icon_text">
                <div class="d-flex align-items-center">
                  <a href="tel:<?= $generalConfig['phone_number'] ?>" class="call-icon nav-text-color"><i class="far fa-phone-alt nav-icon-color me-2"></i>Call Us</a>
                </div>
              </div>
                <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
                  <ul class="navbar-nav navbar-nav4 ml-auto">
                    <li class="cart_link">
                      <a href="javascript:void(0);">
                          <span class="cart_text nav-text-color icon_text"><i class="far fa-shopping-cart me-2 nav-icon-color"></i>Cart</span>
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
      <!-- Upper Header Ends here -->

      <!-- Bottom Header Starts here -->
      <div class="primary-navigation bottom-header primary_color">
        <nav class="navbar navbar-expand-lg  p-0  container">
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item"><a href="index.php" class="nav-link active nav-active-color">Home</a></li>
                <li class="nav-item"><a href="shop.php" class="nav-link primary_text_color">Shop</a></li>
                  <li class="nav-item"><a href="cart.php" class="nav-link primary_text_color">Cart</a></li>
                  <li class="nav-item"><a href="checkout.php" class="nav-link primary_text_color">Checkout</a></li>
                  <li class="nav-item"><a href="contact.php" class="nav-link primary_text_color">Contact</a></li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- Bottom Header Ends here -->

    </div>
    <!-- Header Ends Here -->

  </header>
</section>

<!-- Badge Counter Check -->
<script>
   jQuery(document).ready(function($){
      var a=0;
      $("#minicartRow > tr").each((b)=>{
         if($("#minicartRow > tr").hasClass("emptyRow")){
            console.log("cart is empty");
            a=0;
         }
         else{
            console.log("cart not empty");
            a++;
         }
         console.log("Length is : ");
         console.log($(b).length);
      });
      console.log("A is = ");
      console.log(a);
      $(".badge-pill").html(a);
   })
</script>