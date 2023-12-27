<?php
   error_reporting(0);
   $configFilePath = __DIR__ . DIRECTORY_SEPARATOR . 'bp_config' . DIRECTORY_SEPARATOR . 'site-info.php';
   if (file_exists($configFilePath )) {
   require_once $configFilePath;
   }else{
   echo 'General configuration error';
   }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Privacy Policy</title>
      <?= $generalConfig['add_stylesheet'] ?>
       <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/bootstrap.min.css?v=<?= time() ?>">
      <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/custom.css?v=<?= time() ?>">
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
      <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/style.css?v=<?= time() ?>">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   </head>
   <body>
    <div id="loadingMask" style="width: 100%; height: 100%; position: fixed; background: #fff; z-index:99999999999;">
        <div>
            <img src="./img/loadingGif/<?= $pageConfig['loadingGif'] ?>.gif">
        </div>
    </div>

   <?php
   $showTrialContinuityVerbiage = false;

   foreach ($products as $product) {
       if ($product['status'] == 'active' && $product['billingModel'] != 1) {
           $showTrialContinuityVerbiage = true;
       }
   }
   ?>

<?php
if (file_exists('bp_config/includes/templates/headers/header' . $pageConfig['header_template'] . '.php')) {
    require 'bp_config/includes/templates/headers/header' . $pageConfig['header_template'] . '.php';
}
?>

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

<div class="py-5">
<div class="container">
         <h1>Privacy Policy</h1>
         <p>Welcome to the <?= $generalConfig['brand_name'] ?> website (www.<?= $generalConfig['website_url'] ?> or the "Website"). This written policy (the "Privacy Policy") is designed to tell you about our practices regarding collection, use, and disclosure of information that you may provide via this Website and certain related services. Please be sure to read this entire Privacy Policy before using, or submitting information, to this Website.</p>
         <p>POLICY</p>
         <p>The policy of the Website is to respect and protect the privacy of our users. To fulfill this policy, the Website agrees to exercise the precautions set forth in this Privacy Policy to maintain the confidentiality of information provided by you in connection with accessing and using the Website.</p>
         <p>YOUR CONSENT</p>
         <p>This Privacy Policy sets forth the Website's current policies and practices with respect to nonpublic personal information of the users of the Website. By using this Website, you agree with the terms of this Privacy Policy. Whenever you submit information via this Website, you consent to the collection, use, and disclosure of that information in accordance with this Privacy Policy.</p>
         <p>ACTIVE INFORMATION COLLECTION</p>
         <p>Like many websites, this Website actively collects information from its visitors both by asking you specific questions and by permitting you to communicate directly with us via e-mail and/or feedback forms. Some of the information that you submit may be personally identifiable information (that is, information that can be uniquely identified with you, such as your full name, e-mail address, mailing address, phone number and sales delivery, billing and credit card information).
            Some areas of this Website may require you to submit information in order for you to benefit from the specified features (such as newsletter subscriptions, tips/pointers, order processing) or to participate in a particular activity (such as other promotions). You will be informed at each information collection point what information is required and what information is optional.
         </p>
         <p>DISCLOSURE OF INFORMATION</p>
         <p>Except as otherwise stated, we may use your information to improve the content of our Website, customize the Website to your preferences, communicate information to you (if you have requested it), for our marketing and research purposes, and for the purposes specified in this Privacy Policy.
            If you provide personally identifiable information to this Website, we may combine such information with other actively collected information unless we specify otherwise at the point of collection. We may combine your personally identifiable information with passively collected information.
            We may disclose your personally identifiable information to other affiliates worldwide that agree to treat it in accordance with this Privacy Policy. In addition, we may disclose your personally identifiable information to third parties, located in the United States and/or any other country, but only:
            to contractors we use to support our business (e.g., fulfillment services, technical support, delivery services, and financial institutions), in which case we will require such third parties to agree to treat it in accordance with this Privacy Policy; in connection with the sale, assignment, or other transfer of the business of this site to which the information relates, in which case we will require any such buyer to agree to treat it in accordance with this Privacy Policy; or where required by applicable laws, court orders, or government regulations. In addition, we will make full use of all information acquired through this site that is not in personally identifiable form.
         </p>
         <p>SECURITY OF INFORMATION</p>
         <p>You can be assured that personal information collected through the Website is secure and is maintained in a manner consistent with current industry standards. The importance of security for all personal information associated with our customers is of utmost concern to us. Your personal information is protected in several ways. Your personal information resides on a secure server that only selected <?= $generalConfig['brand_name'] ?> employees and contractors have access to via password. In order to most efficiently serve you, credit card transactions and order fulfillment are handled by established third-party banking, processing agents and distribution institutions. They receive the information needed to verify and authorize your credit card or other payment information and to process and ship your order. Unfortunately, no data transmission over the internet or any wireless network can be guaranteed to be 100% secure.
         </p>
         <p>PASSIVE INFORMATION COLLECTION</p>
         <p>As you navigate through a website, certain information can be passively collected (that is, gathered without you actively providing the information) using various technologies and means, such as Internet Protocol addresses, cookies, Internet tags, and navigational data collection.
            This Website may use Internet Protocol (IP) addresses. An IP Address is a number assigned to your computer by your Internet service provider so you can access the Internet and is generally considered to be non-personally identifiable information, because in most cases an IP address is dynamic (changing each time you connect to the Internet), rather than static (unique to a particular user's computer). We use your IP address to diagnose problems with our server, report aggregate information, determine the fastest route for your computer to use in connecting to our Website, and administer and improve services to our consumers.
            A "cookie" is a bit of information that a website sends to your web browser that helps the site remember information about you and your preferences.
            "Session cookies" are temporary bits of information that are erased once you exit your web browser window or otherwise turn your computer off. Session cookies are used to improve navigation on websites and to collect aggregate statistical information. This Website uses session cookies.
            "Persistent cookies" are more permanent bits of information that are placed on the hard drive of your computer and stay there unless you delete the cookie. Persistent cookies store information on your computer for a number of purposes, such as retrieving certain information you have previously provided (e.g., username), helping to determine what areas of the website visitors find most valuable, and customizing the website based on your preferences. This Website uses persistent cookies.
            "Internet tags" (also known as single-pixel GIFs, clear GIFs, invisible GIFs, and 1-by-1 GIFs) are smaller than cookies and tell the website server information such as the IP address and browser type related to the visitor's computer. This Website uses Internet tags.
            "Navigational data" ("log files," "server logs," and "clickstream" data) and "Internet Tags" are used for system management, to improve the content of the site, market research purposes, and to communicate information to visitors. This Website uses navigational data.
         </p>
         <p>Data Security</p>
         <p>We have put in place certain physical, electronic, and managerial procedures to help prevent unauthorized access and maintain data security. Payments are processed using secure 256-bit SSL Encryption. We will not share, trade or sell credit card information or personal information to any third party providers.</p>         
         <p>OUR COMMITMENT TO CHILDREN'S PRIVACY</p>
         <p>Protecting the privacy of the very young is especially important. This Website is not intended for people under the age of 18. We never collect or maintain information at the Website from persons we know to be under age 18, and no part of our Website is designed to attract anyone under age 18. We encourage parents to talk to their children about their use of the Internet and the information they disclose to websites.</p>
         <p>CHANGES TO THIS PRIVACY POLICY</p>
         <p>This Privacy Policy may change over time. We will notify you by e-mail to the e-mail address associated with your account whenever we make any substantive changes to this Privacy Policy. If you do not accept the changed version (for example, if you do not approve of a different way that we intend to use personal information) you may let us know by letter or e-mail. If you do not respond with any objections, we will assume that you consent to changes in the Privacy Policy. Changes will not apply retroactively to personal information that was collected before the changes to the Privacy Policy, except as may be required by law.</p>
      </div> </div>
      
      <?php
      if (file_exists('bp_config/includes/templates/footer/footer' . $pageConfig['footer_template'] . '.php')) {
          require 'bp_config/includes/templates/footer/footer' . $pageConfig['footer_template'] . '.php';
      }
   ?>
   
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" ></script>  
      <?php
            $dynamicFont = __DIR__ . DIRECTORY_SEPARATOR . 'bp_config' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'fonts.php';
            if (file_exists($dynamicFont)) {
                require_once $dynamicFont;
            }
        ?>
        <?php
            $dynamicColors = __DIR__ . DIRECTORY_SEPARATOR . 'bp_config' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'colors.php';
            if (file_exists($dynamicColors)) {
                require_once $dynamicColors;
            }
        ?>
        <script>
            $(document).ready(function(){
                $('#loadingMask').fadeOut();
            });
        </script>
   </body>
</html>