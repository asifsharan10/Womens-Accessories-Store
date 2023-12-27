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
      <title>Terms</title>
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

     <div class="py-5">   <div class="container">
         <h1>Terms & Conditions</h1>
         <p>This website is operated by <?= $generalConfig['brand_name'] ?>. Throughout the site, the terms “we”, “us” and “our” refer to <?= $generalConfig['brand_name'] ?>. <?= $generalConfig['brand_name'] ?> offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.</p>
         <p>By visiting our site and/ or purchasing something from us, you engage in our “Service” and agree to be bound by the following terms and conditions (“Terms of Service”, “Terms”), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.</p>
         <p>Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these Terms of Service are considered an offer, acceptance is expressly limited to these Terms of Service.</p>
         <p>Any new features or tools which are added to the current store shall also be subject to the Terms of Service. You can review the most current version of the Terms of Service at any time on this page. We reserve the right to update, change or replace any part of these Terms of Service by posting updates and/or changes to our website. It is your responsibility to check this page periodically for changes. Your continued use of or access to the website following the posting of any changes constitutes acceptance of those changes.</p>
         <p>ONLINE STORE TERMS</p>
         <p>By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.<br />
            You may not use our products for any illegal or unauthorized purpose nor may you, in the use of the Service, violate any laws in your jurisdiction (including but not limited to copyright laws).<br />
            You must not transmit any worms or viruses or any code of a destructive nature.<br />
            A breach or violation of any of the Terms will result in an immediate termination of your Services.
         </p>
         <p>GENERAL CONDITIONS</p>
         <p>We reserve the right to refuse service to anyone for any reason at any time.<br />
            You understand that your content (not including credit card information), may be transferred unencrypted and involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks.<br />
            You agree not to reproduce, duplicate, copy, sell, resell or exploit any portion of the Service, use of the Service, or access to the Service or any contact on the website through which the service is provided, without express written permission by us.<br />
            The headings used in this agreement are included for convenience only and will not limit or otherwise affect these Terms.
         </p>
         <p>ACCURACY, COMPLETENESS AND TIMELINESS OF INFORMATION</p>
         <p>We are not responsible if information made available on this site is not accurate, complete or current. The material on this site is provided for general information only and should not be relied upon or used as the sole basis for making decisions without consulting primary, more accurate, more complete or more timely sources of information. Any reliance on the material on this site is at your own risk.<br />
            This site may contain certain historical information. Historical information, necessarily, is not current and is provided for your reference only. We reserve the right to modify the contents of this site at any time, but we have no obligation to update any information on our site. You agree that it is your responsibility to monitor changes to our site.
         </p>
         <p> MODIFICATIONS TO THE SERVICE</p>
         <p>We reserve the right at any time to modify or discontinue the Service (or any part or content thereof) without notice at any time.<br />
            We shall not be liable to you or to any third-party for any modification, suspension or discontinuance of the Service.
         </p>
         <p> PRODUCTS OR SERVICES (if applicable)</p>
         <p>Certain products or services may be available exclusively online through the website. These products or services may have limited quantities and are subject to return or exchange only according to our Return Policy.<br />
            We have made every effort to display as accurately as possible the colors and images of our products that appear at the store. We cannot guarantee that your computer monitor&#8217;s display of any color will be accurate.<br />
            We reserve the right, but are not obligated, to limit the sales of our products or Services to any person, geographic region or jurisdiction. We may exercise this right on a case-by-case basis. We reserve the right to limit the quantities of any products or services that we offer. All descriptions of products or product pricing are subject to change at anytime without notice, at the sole discretion of us. We reserve the right to discontinue any product at any time. Any offer for any product or service made on this site is void where prohibited.<br />
            We do not warrant that the quality of any products, services, information, or other material purchased or obtained by you will meet your expectations, or that any errors in the Service will be corrected.
         </p>

         <?php
            foreach ($products as $key => $value){
               foreach ($value as $k => $v){
                  if($v == 'active'){
                     $p = $key;
                     $product = $products[$p];
            
            if($product['billingModel']==2 or $product['billingModel']==4 or $product['billingModel']==6 or $product['billingModel']==7 ){ ?>
         <p>TRIAL POLICY</p>
         
         <p>During times when trial memberships are offered, you agree to accept the trial membership to the Site, which gives you a 30-day supply of our product, and by accessing the <?= $generalConfig['brand_name']; ?> Services you authorize the charges set forth below and agree to the following terms and conditions: </p>
                      
         <ol>
             <li>Your trial membership will entitle you a 30 day supply of our product, for <?= $generalConfig['trial_period']; ?> day program starting on the day you receive your supply. Shipping may take <?= $generalConfig['shipping_period']; ?>
                 business days, and we ship via <?= $generalConfig['shipping_carrier']; ?>.</li>
             </br>
             <li>You agree that if you do not send us notice of cancellation of your trial membership within the <?= $generalConfig['trial_period']; ?> day period starting from the receipt of your order, starting from the expiration of your trial membership term, we
                 shall automatically and without further notice: convert your trial membership to a standard RECURRING MONTHLY SUBSCRIPTION to <?= $generalConfig['brand_name']; ?> Services,
                 our auto-shipment program, at the standard one month membership rate; renew your monthly membership to the <?= $generalConfig['brand_name']; ?> Services for successive
                 periods of one month each at the then current standard one-month membership rate, which on our auto-shipment program will have a new 30-day supply
                 sent to you every month.</li>
             </br>
             </br>
             <li>To cancel automatic renewal, you must notify <?= $generalconfig['brand_name']; ?> prior to the end of the paid trial period or by filling out our <a href="cancellation.php">cancellation form</a>.</li>
             </br>
             <li>To cancel your monthly membership you must notify <?= $generalconfig['brand_name']; ?> of your cancellation by filling out our <a href="cancellation.php">cancellation form</a>.</li>
             </br>
             <li>All cancellations received by <?= $generalConfig['brand_name']; ?> will be effective upon receipt, UNLESS in the <?= $generalConfig['trial_period']; ?> day program period. </li>
             </br>
             <li>You hereby acknowledge and agree that if you cancel your monthly membership, or if your membership is cancelled by us, your User ID will be removed from
                 the system at the end of the then current monthly membership period and that you will be entitled to receive the full benefits of your monthly membership
                 until the end of such period. You shall not be entitled to any pro-rated or partial refund if you cancel your monthly membership before the end of
                 the then current monthly membership period. You agree that if you cancel at any time after purchasing a monthly membership to the Site, you will
                 still be charged the full months membership fee.</li>
             </br>
             <li>You hereby authorize <?= $generalConfig['brand_name']; ?> to charge your credit card (which you hereby acknowledge was entered by you into the checkout page) to pay for your
                 trial membership fee and all monthly membership fees to the Site / our auto-shipment program at the then current standard monthly membership rate. You further authorize us to charge your credit card for any and all purchases of products,
                 services and entertainment available through, at, in or on, or provided by, the Site. You agree to be personally liable for all charges incurred
                 by you during or through the use of the <?= $generalConfig['brand_name']; ?> Services. </li>
             </br>
             <li>Payment for the services provided to you at, and/or through the Site may be made by automatic credit card debit and you hereby authorize <?= $generalConfig['brand_name']; ?>
                 and its agents to transact such payments on your behalf.</li>
             </br>
             <li>Unless and until you notify us that you wish to cancel or terminated your membership to the Site, you hereby agree and authorize <?= $generalConfig['brand_name']; ?> or its designated agent or assignee to automatically renew your membership to the Site on a continuing monthly basis and to charge your credit card
                 (or other approved facility) to pay for the ongoing cost of your membership. You hereby further
                 authorize <?= $generalConfig['brand_name']; ?> or its designated agent or assignee to charge your credit card (or other approved facility) for any and all purchases
                 of products, services and entertainment provided to you by or though the Site.</li>
             </br>
             <li>You further agree that as a Member, you must promptly inform us of any and all the following: loss or theft of the credit card used to pay for membership to the Site or other <?= $generalConfig['brand_name']; ?> Services; changes in the expiration date of the credit card; changes in home or billing address; apparent breaches
                 of security regarding your membership, such as loss, theft, unauthorized disclosure or use of a User ID; and all other changes pertaining to your
                 credit card account used to pay for services pursuant to this Agreement which may affect our ability to expeditiously obtain payments due to <?= $generalConfig['brand_name']; ?>.
                 You agree that you will remain liable for any unauthorized use of the <?= $generalConfig['brand_name']; ?> Services, until you have notified us by calling us at <?= $generalConfig['phone_number']; ?>.
             </li>
             </br>
             <li>You hereby agree that any fraudulent reporting of a lost or stolen credit card used to obtain goods or services from the Site or any fraudulent reporting
                 of an unauthorized charge to the Site on your credit card which has been made by you or anyone under your authority, at a time when a charge or other
                 obligation for payment for goods and/or services to the Site remains outstanding at the time of such fraudulent reporting, you shall be liable to
                 <?= $generalConfig['brand_name']; ?> for liquidated damages of $25,000.00. The liability for liquidated damages specified in this Paragraph shall not limit any other
                 liability you may have for breach(es) of any other terms, conditions, promises and warranties set forth in this Agreement.</li>
             </br>
             <li>You further acknowledge and agree that you will remain liable to <?= $generalConfig['brand_name']; ?> for any unauthorized use of the <?= $generalConfig['brand_name']; ?> Services associated
                 with your membership.</li>
         </ol>         

         <?php
            } 
            }
            }
            }
            
            ?>                     

         <p>SHIPPING TERMS</p>

         <p>Orders are generally shipped within 2 business days (Monday through Friday) using <?= $generalConfig['shipping_carrier']; ?> standard mail service. Shipping time is estimated to be  <?= $generalConfig['shipping_period']; ?> business days. Please be advised that shipments are not sent on Saturdays, Sundays, or any Holidays. <?= $generalConfig['brand_name']; ?> does not guarantee specific arrival dates or times. </p>

         <?php if ($pageConfig['shippingOption']['enableShippingOption'] == 'yes') { ?>
             <p><?= $pageConfig['shippingOption']['shippingOptionName']; ?></p>
             <p>Adding shipping insurance can provide additional coverage to your shipments. The cost of this insurance is $<?= $pageConfig['shippingOption']['shippingOptionPrice']; ?></p>
         <?php } ?>

         <p>PRODUCTS OFFERED</p>
         <br>
         <div id="prodTerms"></div>
         <?php 
            $path = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']);
            // echo "<pre>";
            // print_r($_SERVER);
            // echo $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
            // die;
            require "$path/bp_config/verbiage.php";
            foreach ($products as $key => $value){
                foreach ($value as $k => $v){
                    // echo "$key => $value<br>";
                    if($v == 'active'){
                        $p = $key;
                        $product = $products[$p];
                        // echo "<pre>";
                        // print_r($product);
                        if($product['billingModel']==1 ){ ?>
                            <!-- <p><?= $product['name']; ?> - Straight Sale</p> -->
                            <?php 
                            if($product['straightSaleMultiPrice']=='yes'){ 
                                // echo $typeA_multiprice;
                            }
                            else{
                                // echo "$typeA";
                            }
                        } if ($product['billingModel']==2){ ?>
                            <!-- <p><?= $product['name']; ?> - Trial</p> -->
                            <?php //echo "$typeB";
                        } if ($product['billingModel']==3){ ?>
                            <!-- <p><?= $product['name']; ?> - Continuity <p/> -->
                            <?php //echo "$typeC";
                        }
                    }
                }
            }
            // echo "$typeA";
            // echo "$typeB";
            // echo "$typeC";
        ?>
         <p>CONTACTING CUSTOMER CARE / BILLING:</p>
         <p>You may contact our customer care department by using our toll free phone number. Toll Free Customer Care phone: <?= $generalConfig['phone_number'] ?>.</p>

         <div id="returns_wrapper">
            <div class="im_before"></div>
            <p id="returns">RETURNS</p>
            <p>To return an item, please email customer service at <?= $generalConfig['email'] ?> to obtain a Return Merchandise Authorization (RMA) number. After receiving a RMA number, place the item securely in its original packaging [and include your proof of purchase], and mail your return the following address:</p>
            <p><?= $generalConfig['fulfillment'] ?></p>
            <p><?= $generalConfig['return_address'] ?></p>
         </div>
         <p>Please note, you will be responsible for all return shipping charges.</p>
         <p>REFUNDS</p>
         <p>We will credit the customer when the received package containing the originally ordered product(s), either opened or unopened, postmarked within 30 days of the received date and the included RMA number obtained from customer service. We refund all cases of fraud and unauthorized transactions included shipping and handling charges. We will credit one order per customer. Repetitive refunds are not permitted unless the product, as delivered to you, is defective. We reserve the right to refuse a refund to any customer who repeatedly requests refunds or who, in our judgment, requests refunds in bad faith. In order to process your refund, you must supply us with your name and delivery address. If you provide us with insufficient or incorrect information your refund will be delayed. Once a refund has been approved please allow for up to 5 business days for refund to apply. Depending on the bank that issued the credit card, your refund can take up to 5 business days to appears on your credit card statement. If you have any questions about whether a refund has been issued by us, please call our customer service department. Shipping and handling costs are not refundable.</p>
         <p> ACCURACY OF BILLING AND ACCOUNT INFORMATION</p>
         <p>We reserve the right to refuse any order you place with us. We may, in our sole discretion, limit or cancel quantities purchased per person, per household or per order. These restrictions may include orders placed by or under the same customer account, the same credit card, and/or orders that use the same billing and/or shipping address. In the event that we make a change to or cancel an order, we may attempt to notify you by contacting the e-mail and/or billing address/phone number provided at the time the order was made. We reserve the right to limit or prohibit orders that, in our sole judgment, appear to be placed by dealers, resellers or distributors.</p>
         <p>You agree to provide current, complete and accurate purchase and account information for all purchases made at our store. You agree to promptly update your account and other information, including your email address and credit card numbers and expiration dates, so that we can complete your transactions and contact you as needed.</p>
         <p>For more detail, please review our <a id="return_btn" href="#returns_wrapper">Returns Policy</a>.</p>
         <p> OPTIONAL TOOLS</p>
         <p>We may provide you with access to third-party tools over which we neither monitor nor have any control nor input.<br />
            You acknowledge and agree that we provide access to such tools ”as is” and “as available” without any warranties, representations or conditions of any kind and without any endorsement. We shall have no liability whatsoever arising from or relating to your use of optional third-party tools.<br />
            Any use by you of optional tools offered through the site is entirely at your own risk and discretion and you should ensure that you are familiar with and approve of the terms on which tools are provided by the relevant third-party provider(s).</p>
         <p> THIRD-PARTY LINKS</p>
         <p>Certain content, products and services available via our Service may include materials from third-parties.<br />
            Third-party links on this site may direct you to third-party websites that are not affiliated with us. We are not responsible for examining or evaluating the content or accuracy and we do not warrant and will not have any liability or responsibility for any third-party materials or websites, or for any other materials, products, or services of third-parties.<br />
            We are not liable for any harm or damages related to the purchase or use of goods, services, resources, content, or any other transactions made in connection with any third-party websites. Please review carefully the third-party&#8217;s policies and practices and make sure you understand them before you engage in any transaction. Complaints, claims, concerns, or questions regarding third-party products should be directed to the third-party.
         </p>
         <p> USER COMMENTS, FEEDBACK AND OTHER SUBMISSIONS</p>
         <p>If, at our request, you send certain specific submissions (for example contest entries) or without a request from us you send creative ideas, suggestions, proposals, plans, or other materials, whether online, by email, by postal mail, or otherwise (collectively, &#8216;comments&#8217;), you agree that we may, at any time, without restriction, edit, copy, publish, distribute, translate and otherwise use in any medium any comments that you forward to us. We are and shall be under no obligation (1) to maintain any comments in confidence; (2) to pay compensation for any comments; or (3) to respond to any comments.<br />
            We may, but have no obligation to, monitor, edit or remove content that we determine in our sole discretion are unlawful, offensive, threatening, libelous, defamatory, pornographic, obscene or otherwise objectionable or violates any party’s intellectual property or these Terms of Service.<br />
            You agree that your comments will not violate any right of any third-party, including copyright, trademark, privacy, personality or other personal or proprietary right. You further agree that your comments will not contain libelous or otherwise unlawful, abusive or obscene material, or contain any computer virus or other malware that could in any way affect the operation of the Service or any related website. You may not use a false e-mail address, pretend to be someone other than yourself, or otherwise mislead us or third-parties as to the origin of any comments. You are solely responsible for any comments you make and their accuracy. We take no responsibility and assume no liability for any comments posted by you or any third-party.
         </p>
         <p> PERSONAL INFORMATION</p>
         <p>Your submission of personal information through the store is governed by our Privacy Policy. View our <a href="privacy.php">Privacy Policy</a>.</p>
         <p> ERRORS, INACCURACIES AND OMISSIONS</p>
         <p>Occasionally there may be information on our site or in the Service that contains typographical errors, inaccuracies or omissions that may relate to product descriptions, pricing, promotions, offers, product shipping charges, transit times and availability. We reserve the right to correct any errors, inaccuracies or omissions, and to change or update information or cancel orders if any information in the Service or on any related website is inaccurate at any time without prior notice (including after you have submitted your order).<br />
            We undertake no obligation to update, amend or clarify information in the Service or on any related website, including without limitation, pricing information, except as required by law. No specified update or refresh date applied in the Service or on any related website, should be taken to indicate that all information in the Service or on any related website has been modified or updated.
         </p>
         <p> PROHIBITED USES</p>
         <p>In addition to other prohibitions as set forth in the Terms of Service, you are prohibited from using the site or its content: (a) for any unlawful purpose; (b) to solicit others to perform or participate in any unlawful acts; (c) to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances; (d) to infringe upon or violate our intellectual property rights or the intellectual property rights of others; (e) to harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual orientation, religion, ethnicity, race, age, national origin, or disability; (f) to submit false or misleading information; (g) to upload or transmit viruses or any other type of malicious code that will or may be used in any way that will affect the functionality or operation of the Service or of any related website, other websites, or the Internet; (h) to collect or track the personal information of others; (i) to spam, phish, pharm, pretext, spider, crawl, or scrape; (j) for any obscene or immoral purpose; or (k) to interfere with or circumvent the security features of the Service or any related website, other websites, or the Internet. We reserve the right to terminate your use of the Service or any related website for violating any of the prohibited uses.</p>
         <p> DISCLAIMER OF WARRANTIES; LIMITATION OF LIABILITY</p>
         <p>We do not guarantee, represent or warrant that your use of our service will be uninterrupted, timely, secure or error-free.<br />
            We do not warrant that the results that may be obtained from the use of the service will be accurate or reliable.<br />
            You agree that from time to time we may remove the service for indefinite periods of time or cancel the service at any time, without notice to you.<br />
            You expressly agree that your use of, or inability to use, the service is at your sole risk. The service and all products and services delivered to you through the service are (except as expressly stated by us) provided &#8216;as is&#8217; and &#8216;as available&#8217; for your use, without any representation, warranties or conditions of any kind, either express or implied, including all implied warranties or conditions of merchantability, merchantable quality, fitness for a particular purpose, durability, title, and non-infringement.<br />
            In no case shall <?= $generalConfig['brand_name'] ?>, our directors, officers, employees, affiliates, agents, contractors, interns, suppliers, service providers or licensors be liable for any injury, loss, claim, or any direct, indirect, incidental, punitive, special, or consequential damages of any kind, including, without limitation lost profits, lost revenue, lost savings, loss of data, replacement costs, or any similar damages, whether based in contract, tort (including negligence), strict liability or otherwise, arising from your use of any of the service or any products procured using the service, or for any other claim related in any way to your use of the service or any product, including, but not limited to, any errors or omissions in any content, or any loss or damage of any kind incurred as a result of the use of the service or any content (or product) posted, transmitted, or otherwise made available via the service, even if advised of their possibility. Because some states or jurisdictions do not allow the exclusion or the limitation of liability for consequential or incidental damages, in such states or jurisdictions, our liability shall be limited to the maximum extent permitted by law.
         </p>
         <p> INDEMNIFICATION</p>
         <p>You agree to indemnify, defend and hold harmless <?= $generalConfig['brand_name'] ?> and our parent, subsidiaries, affiliates, partners, officers, directors, agents, contractors, licensors, service providers, subcontractors, suppliers, interns and employees, harmless from any claim or demand, including reasonable attorneys’ fees, made by any third-party due to or arising out of your breach of these Terms of Service or the documents they incorporate by reference, or your violation of any law or the rights of a third-party.</p>
         <p> SEVERABILITY</p>
         <p>In the event that any provision of these Terms of Service is determined to be unlawful, void or unenforceable, such provision shall nonetheless be enforceable to the fullest extent permitted by applicable law, and the unenforceable portion shall be deemed to be severed from these Terms of Service, such determination shall not affect the validity and enforceability of any other remaining provisions.</p>
         <p> TERMINATION</p>
         <p>The obligations and liabilities of the parties incurred prior to the termination date shall survive the termination of this agreement for all purposes.<br />
            These Terms of Service are effective unless and until terminated by either you or us. You may terminate these Terms of Service at any time by notifying us that you no longer wish to use our Services, or when you cease using our site.<br />
            If in our sole judgment you fail, or we suspect that you have failed, to comply with any term or provision of these Terms of Service, we also may terminate this agreement at any time without notice and you will remain liable for all amounts due up to and including the date of termination; and/or accordingly may deny you access to our Services (or any part thereof).
         </p>
         <p> ENTIRE AGREEMENT</p>
         <p>The failure of us to exercise or enforce any right or provision of these Terms of Service shall not constitute a waiver of such right or provision.<br />
            These Terms of Service and any policies or operating rules posted by us on this site or in respect to The Service constitutes the entire agreement and understanding between you and us and govern your use of the Service, superseding any prior or contemporaneous agreements, communications and proposals, whether oral or written, between you and us (including, but not limited to, any prior versions of the Terms of Service).<br />
            Any ambiguities in the interpretation of these Terms of Service shall not be construed against the drafting party.
         </p>
         <p> CHANGES TO TERMS OF SERVICE</p>
         <p>You can review the most current version of the Terms of Service at any time at this page.<br />
         </p>
         <p> CONTACT INFORMATION</p>
         <p>Questions about the Terms of Service should be sent to us at <?= $generalConfig['email'] ?></p>
      </div> </div>
      <script type="text/javascript">
          $("div#prodTerms").remove();
          $('.terms_cond').show();
          $("#return_btn").click(function(){
            $("#returns_wrapper .im_before").fadeIn();
              setTimeout(() => {
                  $("#returns_wrapper .im_before").fadeOut();
            }, 3000);
          });
      </script>
      <style>
        html{
            scroll-behavior: smooth;
        }
        #returns_wrapper{
            position: relative;
            z-index: 1;
        }
        #returns_wrapper .im_before{
            background-color: #d9d9d9;
            content: "";
            width: 103%;
            height: 118%;
            position: absolute;
            top: 0;
            left: -10%;
            z-index: -1;
            right: -10%;
            bottom: 0;
            margin: auto;
            border-radius: 25px;
            transform: all 0.3 ease;
            display: none;
        }
      </style>
      
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