
<section class="header_section header_section3" id="header_section">

  <header class="navbar-nav3">
  
    <div class="topbar topbar-background-color top-bar">
      <div class="container">
        <div class="row align-content-between">
         
          <div class="col text-sm">
            <li class="list-inline-item"><a href="terms.php" class="topbar-text-color">Terms</a></li>
            <li class="list-inline-item  ms-3"><a href="privacy.php" class="topbar-text-color">Privacy</a></li>
            <li class="list-inline-item  ms-3"><a href="contact.php" class="topbar-text-color">Contact Us</a></li>
            </ul>
          </div>
          
          
          <div class="col-auto lang-right d-none d-lg-block">
            <ul class="list-inline m-0">
              <li class="list-inline-item ms-3 topbar-text-color">Contact Us: <?= $generalConfig['email'] ?></li>
            </ul>
          </div>
          
          
        </div>
      </div>
    </div>
    
    
    
    
    
    
    <div class="primary-navigation  px-4 py-lg-2 nav-color">
      <div class="container">
        <div class="d-flex align-items-center"> 
        
        <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a>
        
       
          
        
          <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
          <ul class="navbar-nav cart-nav ms-auto">
            <li class="cart_link"> <a href="javascript:void(0);"><span class="cart_text nav-text-color"><i class="bi bi-basket fs-2 nav-icon-color"></i> </span> <span class="cart_amt nav-text-color"> $
              <p id="cart_amt" class="subtotalAmount" style="display: inline;"></p>
              </span> 
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
                    <p> Subtotal: $<span class="subtotalAmount" id="subtotalAmount"></span> </p>
                  </div>
                  <div class="minicart_buttons"> <a href="cart.php" class="btn btn-continue shop-btn-outline"> View Cart </a> <a href="checkout.php" class="btn btn-update shop-btn-color"> Checkout </a> </div>
                </div>
              </div>
            </li>
          </ul>
          <?php } ?>
             <button class="navbar-toggler menu-icon ms-4 d-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
                <i class="fas fa-bars"></i>
              </span>
            </button>
        </div>
      </div>
      
      
      <div class="container">
      
      
        <nav class="navbar navbar-expand-lg p-0 pb-1 ">
          <div class="collapse navbar-collapse" id="navbarsExample03">
            <ul class="navbar-nav me-auto mb-lg-0">
              <li class="nav-item active"> <a class="nav-link nav-active-color" aria-current="page" href="index.php">Home</a> </li>
              <li class="nav-item"> <a class="nav-link nav-text-color" aria-current="page" href="shop.php">Shop</a> </li>
              <li class="nav-item"> <a class="nav-link  nav-text-color" aria-current="page" href="cart.php">Cart</a> </li>
              <li class="nav-item"> <a class="nav-link  nav-text-color" aria-current="page" href="checkout.php">Checkout</a> </li>
              </li>
            </ul>
          </div>
        </nav>
        
        
      </div>
    </div>
    
    
    
    
    
    
  </header>
  
  
  
</section>