
<section class="header_section header_section1" id="header_section">

<header>
<div class="topbar topbar-background-color top-bar">
    <div class="container">
      <div class="row align-content-between">
       
      <div class="col text-sm contact-head topbar-text-color">WELCOME TO <?= $generalConfig['brand_name'] ?></div>

        <div class="col-auto">      
      <ul class="list-inline m-0">
     <li class="list-inline-item  ms-3"><a href="contact.php" class="topbar-text-color">Contact Us</a></li>
      </ul>
      
      </div>
      </div>
    </div>
  </div>
  


  <nav class="navbar navbar-expand-lg py-4 nav-color" aria-label="Third navbar example">
    <div class="container"> <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a>
      <button class="navbar-toggler menu-icon" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav mb-2 mb-sm-0  me-auto ms-0 ms-xl-5">
          <li class="nav-item active"> <a class="nav-link nav-active-color" aria-current="page" href="index.php">Home</a> </li>
          <li class="nav-item"> <a class="nav-link nav-text-color" aria-current="page" href="shop.php">Shop</a> </li>
          <li class="nav-item"> <a class="nav-link  nav-text-color" aria-current="page" href="cart.php">Cart</a> </li>
          <li class="nav-item"> <a class="nav-link  nav-text-color" aria-current="page" href="checkout.php">Checkout</a> </li></li>
         </ul>

         <div class="call-us d-flex align-items-center me-4">
            <div class="me-2"> <i class="bi bi-telephone fs-2 nav-icon-color"></i></div>
            <div class="call-txt me-3"> <span class="ct nav-text-color">Call Us:</span> <br/>
              <span class="pht">
              <a href="tel:<?= $generalConfig['phone_number'] ?>" class="nav-text-color">
            <?= $generalConfig['phone_number'] ?>
            </a>
              </span> </div>
          </div>
                   
                   
            <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
                   <ul class="navbar-nav navbar-nav1">
                     <li class="cart_link">
                        <a href="javascript:void(0);" class="nav-text-color">
                           <span class="cart_text">
                              <i class="bi bi-bag fs-2 nav-icon-color"></i>
                         
                        </span>
                           <span class="cart_amt">
                              $
                              <p id="cart_amt" class="subtotalAmount" style="display: inline;"></p>
                           </span>
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
  </nav>
  </div>
</header>  

</section>