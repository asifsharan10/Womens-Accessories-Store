


<section class="header_section header_section4" id="header_section">
<header>
  <div class="header-top-bar d-lg-block d-none topbar-background-color top-bar">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5 topbar-text-color"><?= $generalConfig["phone_number"]?></div>
        <div class="col-lg-7">
          <ul class="d-flex justify-content-end top-bar-right m-0">
            <li><i class="fas fa-envelope me-2 topbar-text-color"></i> <a href="mailto: <?= $generalConfig['email'] ?>" class="topbar-text-color"> <?= $generalConfig['email'] ?></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="menu-wrapper nav-color">
    <div class="container">
       <div class="navbar"> <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a>
         <button class="navbar-toggler" id="toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
         </button>
         <div class="d-lg-flex align-items-center d-none header-content">
         
           <div class="header-icon  d-none d-xl-flex text-start">
               <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
                   <ul class="navbar-nav navbar-nav4 ml-auto">
                        <li class="cart_link">
                           <a href="javascript:void(0);">
                              <span class="cart_text"><i class="far fa-shopping-bag  fs-1 me-2 nav-icon-color"></i></span>
                           </a>
                           <div class="minibag cart_bag cart-bag-outline" id="minicart">
                              <div class="minicart_inner">
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
    <div class="primary-navigation">
      <nav class="navbar navbar-expand-lg  p-0 primary_color">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item"><a href="index.php" class="nav-link active nav-active-color">Home</a></li>
               <li class="nav-item"><a href="shop.php" class="nav-link primary-text-color">Shop</a></li>
                <li class="nav-item"><a href="cart.php" class="nav-link primary-text-color">Cart</a></li>
                <li class="nav-item"><a href="checkout.php" class="nav-link primary-text-color">Checkout</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link primary-text-color">Contact</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
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