<section class="header_section header_section30">

   <header>
      <div class="topbar topbar-background-color top-bar">
         <div class="d-flex">
            <div class="row align-content-between px-4 topbar-contact-details-main">
               <div class="col text-sm p-0">
                  <span class="d-inline contact-details">
                     <i class="bi bi-telephone-fill topbar-text-color"></i>
                     <a href="tel:<?= $generalConfig['phone_number'] ?>" class="topbar-text-color"><?= $generalConfig['phone_number'] ?></a>
                  </span>

                  <span class="ms-3 ms-lg-4 d-inline contact-details">
                     <i class="bi bi-envelope-fill topbar-text-color"></i>
                     <a href="mailto:<?= $generalConfig['email'] ?>" class="topbar-text-color"><?= $generalConfig['email'] ?></a>
                  </span>

                  <span class="ms-3 ms-lg-4 d-inline contact-details">
                     <i class="fas fa-map-marker-alt topbar-text-color"></i>
                     <a href="mailto:<?= $generalConfig['address'] ?>" class="topbar-text-color"><?= $generalConfig['address'] ?></a>
                  </span>
               </div>
            </div>
         </div>
      </div>



      <nav class="navbar navbar-expand-lg nav-color">
         <div class="w-100">

            <div class="brand-name-box brand-name px-2 navbar-logo">
               <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a>
            </div>

            <div class="collapse navbar-collapse nav-menu desktop-menu justify-content-center" id="navbarSupportedContent">
               <ul class="navbar-nav m-0">
                  <li class="nav-item">
                     <a class="nav-link active nav-active-color me-4 px-2" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link nav-text-color me-4 px-2" href="shop.php">Shop</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link nav-text-color me-4 px-2" href="checkout.php">Checkout</a>
                  </li>
               </ul>
            </div>


            <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon d-flex align-items-center"><i class="fas fa-bars"></i></span>
            </button>


            <!-- Cart Button  -->
            <div class="brand-name-box cart d-flex justify-content-center">
               <div class="header-icon pe-4 h-100">
                  <i class="fas fa-comments nav-color nav-icon-color header30-marker"></i>
                  <span class="text-left ms-3 nav-text-color">
                     <div class="top-text nav-text-color">Have Any Questions?</div>
                     <div class="bottom-text nav-text-color">
                        Free <?= $generalConfig['phone_number'] ?>
                     </div>
                  </span>
               </div>
               <ul class="navbar-cart">
                  <li class="cart_link">
                     <a href="javascript:void(0);" class="">
                        <span class="cart_text"><i class="fas fa-shopping-cart nav-icon-color"></i></span>
                        <span class="cart_amt nav-text-color">

                           <p id="cart_amt" class="subtotalAmount" style="display: inline;"></p>
                           <!-- <p class="nav-text-color" style="display: inline;">Shopping Cart</p> -->
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
            </div>
         </div>
      </nav>
      <!-- Mobile Menu -->
      <div class="mobile-menu">
         <div class="collapse navbar-collapse nav-menu" id="navbarSupportedContent">
            <ul class="navbar-nav m-0 nav-color">
               <li class="nav-item">
                  <a class="nav-link active nav-active-color px-3" aria-current="page" href="index.php">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link nav-text-color px-3" href="shop.php">Shop</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link nav-text-color px-3" href="checkout.php">Checkout</a>
               </li>
               <ul class="p-0">
                  <li class="cart_link">
                     <a href="javascript:void(0);" class="">
                        <span class="cart_text"><i class="fas fa-shopping-cart nav-icon-color"></i></span>
                        <span class="cart_amt nav-text-color">
                           $
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
            </ul>
         </div>
      </div>
   </header>
</section>











<script type="text/javascript">
   $(function() {
      // var total = sessionStorage.getItem('cartTotal');
      // var qty = sessionStorage.getItem('qty');
      // console.log(qty);
      // // $('#cart_amt').html(total);
      // $('#cart_qty').html(qty);
      var productCart = [];
      var tot_pdt_count = <?= $generalConfig['product_count'] ?>;
      for (i = 1; i <= tot_pdt_count; i++) { //total pdt count

         var shoppingCart = JSON.parse(sessionStorage.getItem('product-' + i));
         var cartpdtTotal = productCart.push(shoppingCart);

      }
      //console.log(productCart);
      var cartPdtArrNew = productCart.filter(function(el) {
         return el != null && el != "";
      });

      console.log(cartPdtArrNew);
      sessionStorage.setItem("cartPdtArr", JSON.stringify(cartPdtArrNew));

      let table = document.getElementById("minicartRow");

      //let table = '<thead><tr><th>id</th><th>name</th><th>age</th></tr></thead><tbody>';

      // let table = $('#cartRO');


      var TotalPrice = {};

      var showCartNumber = false;
      cartPdtArrNew.forEach(function(d) {
         if (d.EnableMaxqty > 1) {
            showCartNumber = true;
            return;
         }
      });

      cartPdtArrNew.forEach(function(d) {
         if (d.billModel == '2' || d.billModel == '8') {
            <?php if ($showTrialContinuityVerbiage) { ?>
               table += '<tr id="row-' + d.Id + '" data-product-id="' + d.Id + '" data-product-name="' + d.Name + '">'
               table += '<td><img src="' + d.Image + '" class="img-fluid  mini-pdt-image" id="mini-image-' + d.Id + '"></td>';
               table += '<td><p>' + d.Name + '</p><p class="cart_amount"><span class="cartNumber" id="cartNumber">' + (showCartNumber ? d.Qty : '') + '</span> X <span class="cartPrice" id="cartPrice">$' + d.trlPrice + '</span></p><p class="cart_amount" style="display:none;"> = <span class="cartTotal" id="cartTotal" data-total="' + (d.Qty * d.trlPrice) + '">$' + (d.Qty * d.trlPrice) + '</span></p></td>';
               table += '<td><span class="material-icons close_button close-button" id="close-' + d.Id + '">close</span></td></tr>';
            <?php } ?>
         } else {
            table += '<tr id="row-' + d.Id + '" data-product-id="' + d.Id + '" data-product-name="' + d.Name + '">'
            table += '<td><img src="' + d.Image + '" class="img-fluid  mini-pdt-image" id="mini-image-' + d.Id + '"></td>';
            table += '<td><p>' + d.Name + '</p><p class="cart_amount"><span class="cartNumber" id="cartNumber">' + (showCartNumber ? d.Qty : '') + '</span> X <span class="cartPrice" id="cartPrice">$' + d.Price + '</span></p><p class="cart_amount" style="display:none;"> = <span class="cartTotal" id="cartTotal" data-total="' + d.Total + '">$' + d.Total + '</span></p></td>';
            table += '<td><span class="material-icons close_button close-button" id="close-' + d.Id + '">close</span></td></tr>';
         }
      })

      $('#minicartRow').empty().html(table);

      var miniTotal = sessionStorage.getItem('cartTotal');

      $('.subtotalAmount').html(miniTotal);

      var total = 0;
      $('.cartTotal').each(function() {

         total += parseFloat($(this).data('total'), 10);
         //console.log($(this).attr('data-total'));
         //console.log(total)
         $('#subtotalAmount').html(total.toFixed(2));
         $('#cart_amt').html(total.toFixed(2));
      })

      var qtyCol = 0;
      $('.cartNumber').each(function() {

         qtyCol += parseFloat($(this).data('qty'), 10);
         $('#cart_qty').html(qtyCol);
      })
      $('.close-button').click(function() {

         console.log($(this).parents('tr').data('product-id'));

         sessionStorage.removeItem($(this).parents('tr').data('product-id'));

         var removeItem = $(this).parents('tr').data('product-id');

         var ar = sessionStorage.getItem("cartPdtArr");

         for (var i = 0; i < ar.length; i++) {
            if (ar[i].Id == removeItem) {
               ar.splice(i, 1);

            }
            if (sessionStorage.getItem('cartPdtArrNew') == '[]' || sessionStorage.getItem('cartPdtArrNew') == '') {
               $('.subtotalAmount').html('0.00');
               $('#cart_amt').html('0.00');
               $('.bag_icon').removeClass('active');
            }
         }
         location.reload(true);
         //            $('#cart_amt').html(total);
         // $('#cart_qty').html(qty);
         // $('.subtotalAmount').html(total);
      })

      if (sessionStorage.getItem('cartPdtArr') == '[]' || sessionStorage.getItem('cartPdtArr') == '') {
         //alert('hello');
         $('#minicartRow')
            .empty()
            .html('<tr class="emptyRow"><td colspan="3"><p class="cart_empty">Cart is Empty</p></td></tr>');
         $('#cart_amt').html('0.00');
         $('#cart_qty').html('0');
         $('.subtotalAmount').html('0.00');
         $('.cart_bag').addClass('empty_bag');
         $('.bag_icon').removeClass('active');
      }
   })
</script>