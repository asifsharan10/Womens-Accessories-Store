<section class="header_section header_section7">
   <header>

      <nav class="navbar navbar-expand-lg nav-color">
         <div class="container-fluid">
            
            <span class="brand-name-box brand-name">
               <a class="header_brand secondary_text_color" href="index.php"><?= $generalConfig['brand_name'] ?></a>
            </span>
            
            <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon d-flex align-items-center"><i class="fas fa-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse nav-menu" id="navbarSupportedContent">
               <ul class="navbar-nav m-auto">
                  <li class="nav-item">
                     <a class="nav-link active nav-active-color me-3 px-3" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link nav-text-color me-3 px-3" href="shop.php">Shop</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link nav-text-color me-3 px-3" href="checkout.php">Checkout</a>
                  </li>
               
               </ul>

               <!-- Cart Button  -->
               <span  class="brand-name-box cart">
                  <ul class="">
                     <li class="cart_link">
                        <a href="javascript:void(0);" class="">
                           <span class="cart_text"><i class="fas fa-shopping-cart nav-icon-color"></i></span>
                           <span class="cart_amt secondary_text_color">
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
               </span>
               
               <span class="brand-name-box contact primary-background-color text-center">
                  <a class="header_brand primary_text_color" href="contact.php">Contact</a>
               </span>
            </div>
         </div>
      </nav>

   </header>  
</section>
















            




<script type="text/javascript">
   $(function(){
      // var total = sessionStorage.getItem('cartTotal');
      // var qty = sessionStorage.getItem('qty');
      // console.log(qty);
      // // $('#cart_amt').html(total);
      // $('#cart_qty').html(qty);
      var productCart = []; 
         var tot_pdt_count = <?=$generalConfig['product_count']?>;
        for(i=1;i<=tot_pdt_count;i++){       //total pdt count
           
           var shoppingCart = JSON.parse(sessionStorage.getItem( 'product-'+i ));
           var cartpdtTotal = productCart.push(shoppingCart);
        
        }
         //console.log(productCart);
         var cartPdtArrNew = productCart.filter(function (el) {
                return el != null && el != "";
               });  
   
         console.log(cartPdtArrNew);
         sessionStorage.setItem( "cartPdtArr", JSON.stringify(cartPdtArrNew));
   
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

            cartPdtArrNew.forEach(function(d){
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
               $('.cartTotal').each(function(){
   
                  total += parseFloat($(this).data('total'),10);
                  //console.log($(this).attr('data-total'));
                  //console.log(total)
                  $('#subtotalAmount').html(total.toFixed(2));
                  $('#cart_amt').html(total.toFixed(2));
               })
   
               var qtyCol = 0;
               $('.cartNumber').each(function(){
   
                  qtyCol += parseFloat($(this).data('qty'),10);
                  $('#cart_qty').html(qtyCol);
               })
            $('.close-button').click(function(){
   
               console.log($(this).parents('tr').data('product-id'));
   
               sessionStorage.removeItem($(this).parents('tr').data('product-id'));
   
               var removeItem = $(this).parents('tr').data('product-id');
   
               var ar = sessionStorage.getItem( "cartPdtArr");
               
               for(var i=0; i < ar.length; i++) {
                     if(ar[i].Id == removeItem)
                     {
                     ar.splice(i,1);
                     
                     }
                     if(sessionStorage.getItem('cartPdtArrNew') == '[]' || sessionStorage.getItem('cartPdtArrNew') == ''){
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
   
            if(sessionStorage.getItem('cartPdtArr') == '[]' || sessionStorage.getItem('cartPdtArr') == ''){
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