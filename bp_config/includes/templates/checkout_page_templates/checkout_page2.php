            <div class="checkout-page2">
                <div class="container-fluid bg-only">
                    <div class="row">
                        <div class="leftbg"></div>
                        <div class="rightbg"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form class="w-100 order-form p-0" id="order_form" name="checkout_form" method="POST">
                                <div class="row">
                                    <!-- Left Column -->
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 left order-md-1 order-2">
                                        <!-- <form id="stepForm" action=""> -->
                                        <div class="col-12">
                                            <h1 class="mt-4">Checkout</h1>
                                        </div>

                                        <!-- Circles which indicates the steps of the form: -->
                                        <div class="checkout-breadcrumb">
                                            <span class="step">Information</span>
                                            <i class="fas fa-chevron-right mx-3"></i>
                                            <span class="step">Payment</span>
                                        </div>

                                        <!-- One "tab" for each step in the form: -->

                                        <div class="tab">
                                            <h2 class="subHeading">Contact information</h2>
                                            <div class="field-wrapper email">
                                                <div class="label">Email Address</div>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    placeholder="Email Address" value="">
                                            </div>
                                            <div class="field-wrapper phone">
                                                <div class="label">Phone Number</div>
                                                <input type="tel" class="form-control" name="phone" id="phone"
                                                    placeholder="Phone Number" data-min-length="10" data-max-length="15"
                                                    onkeyup="javascript:this.value=this.value.replace(/[^0-9]/g,'');"
                                                    maxlength="10" value="">
                                            </div>


                                            <h2 class="subHeading mt-5">Shipping address</h2>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="field-wrapper country">
                                                        <div class="label">Country/Region</div>
                                                        <input type="text" class="form-control" name="shippingCountry"
                                                            id="shippingCountry" placeholder="Country" value="US"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="field-wrapper state">
                                                        <div class="label">State</div>
                                                        <select name="shippingState" id="shipping_state"
                                                            class="form-control " autocomplete="address-level1"
                                                            data-placeholder="State / Province" data-input-classes=""
                                                            placeholder="State / Province" tabindex="-1"
                                                            aria-hidden="true">
                                                            <option value="AL" <?php if ($_POST['shippingState'] == 'AL') {
                                                                                    echo 'selected';
                                                                                } ?>>Alabama
                                                            </option>
                                                            <option value="AK" <?php if ($_POST['shippingState'] == 'AK') {
                                                                                    echo 'selected';
                                                                                } ?>>Alaska
                                                            </option>
                                                            <option value="AZ" <?php if ($_POST['shippingState'] == 'AZ') {
                                                                                    echo 'selected';
                                                                                } ?>>Arizona
                                                            </option>
                                                            <option value="AR" <?php if ($_POST['shippingState'] == 'AR') {
                                                                                    echo 'selected';
                                                                                } ?>>Arkansas
                                                            </option>
                                                            <option value="CA" <?php if ($_POST['shippingState'] == 'CA') {
                                                                                    echo 'selected';
                                                                                } ?>>California
                                                            </option>
                                                            <option value="CO" <?php if ($_POST['shippingState'] == 'CO') {
                                                                                    echo 'selected';
                                                                                } ?>>Colorado
                                                            </option>
                                                            <option value="CT" <?php if ($_POST['shippingState'] == 'CT') {
                                                                                    echo 'selected';
                                                                                } ?>>Connecticut
                                                            </option>
                                                            <option value="DE" <?php if ($_POST['shippingState'] == 'DE') {
                                                                                    echo 'selected';
                                                                                } ?>>Delaware
                                                            </option>
                                                            <option value="FL" <?php if ($_POST['shippingState'] == 'FL') {
                                                                                    echo 'selected';
                                                                                } ?>>Florida
                                                            </option>
                                                            <option value="GA" <?php if ($_POST['shippingState'] == 'GA') {
                                                                                    echo 'selected';
                                                                                } ?>>Georgia
                                                            </option>
                                                            <option value="HI" <?php if ($_POST['shippingState'] == 'HI') {
                                                                                    echo 'selected';
                                                                                } ?>>Hawaii
                                                            </option>
                                                            <option value="ID" <?php if ($_POST['shippingState'] == 'ID') {
                                                                                    echo 'selected';
                                                                                } ?>>Idaho
                                                            </option>
                                                            <option value="IL" <?php if ($_POST['shippingState'] == 'IL') {
                                                                                    echo 'selected';
                                                                                } ?>>Illinois
                                                            </option>
                                                            <option value="IN" <?php if ($_POST['shippingState'] == 'IN') {
                                                                                    echo 'selected';
                                                                                } ?>>Indiana
                                                            </option>
                                                            <option value="IA" <?php if ($_POST['shippingState'] == 'IA') {
                                                                                    echo 'selected';
                                                                                } ?>>Iowa
                                                            </option>
                                                            <option value="KS" <?php if ($_POST['shippingState'] == 'KS') {
                                                                                    echo 'selected';
                                                                                } ?>>Kansas
                                                            </option>
                                                            <option value="KY" <?php if ($_POST['shippingState'] == 'KY') {
                                                                                    echo 'selected';
                                                                                } ?>>Kentucky
                                                            </option>
                                                            <option value="LA" <?php if ($_POST['shippingState'] == 'LA') {
                                                                                    echo 'selected';
                                                                                } ?>>Louisiana
                                                            </option>
                                                            <option value="ME" <?php if ($_POST['shippingState'] == 'ME') {
                                                                                    echo 'selected';
                                                                                } ?>>Maine
                                                            </option>
                                                            <option value="MD" <?php if ($_POST['shippingState'] == 'MD') {
                                                                                    echo 'selected';
                                                                                } ?>>Maryland
                                                            </option>
                                                            <option value="MA" <?php if ($_POST['shippingState'] == 'MA') {
                                                                                    echo 'selected';
                                                                                } ?>>Massachusetts
                                                            </option>
                                                            <option value="MI" <?php if ($_POST['shippingState'] == 'MI') {
                                                                                    echo 'selected';
                                                                                } ?>>Michigan
                                                            </option>
                                                            <option value="MN" <?php if ($_POST['shippingState'] == 'MN') {
                                                                                    echo 'selected';
                                                                                } ?>>Minnesota
                                                            </option>
                                                            <option value="MS" <?php if ($_POST['shippingState'] == 'MS') {
                                                                                    echo 'selected';
                                                                                } ?>>Mississippi
                                                            </option>
                                                            <option value="MO" <?php if ($_POST['shippingState'] == 'MO') {
                                                                                    echo 'selected';
                                                                                } ?>>Missouri
                                                            </option>
                                                            <option value="MT" <?php if ($_POST['shippingState'] == 'MT') {
                                                                                    echo 'selected';
                                                                                } ?>>Montana
                                                            </option>
                                                            <option value="NE" <?php if ($_POST['shippingState'] == 'NE') {
                                                                                    echo 'selected';
                                                                                } ?>>Nebraska
                                                            </option>
                                                            <option value="NV" <?php if ($_POST['shippingState'] == 'NV') {
                                                                                    echo 'selected';
                                                                                } ?>>Nevada
                                                            </option>
                                                            <option value="NH" <?php if ($_POST['shippingState'] == 'NH') {
                                                                                    echo 'selected';
                                                                                } ?>>New Hampshire
                                                            </option>
                                                            <option value="NJ" <?php if ($_POST['shippingState'] == 'NJ') {
                                                                                    echo 'selected';
                                                                                } ?>>New Jersey
                                                            </option>
                                                            <option value="NM" <?php if ($_POST['shippingState'] == 'NM') {
                                                                                    echo 'selected';
                                                                                } ?>>New Mexico
                                                            </option>
                                                            <option value="NY" <?php if ($_POST['shippingState'] == 'NY') {
                                                                                    echo 'selected';
                                                                                } ?>>New York
                                                            </option>
                                                            <option value="NC" <?php if ($_POST['shippingState'] == 'NC') {
                                                                                    echo 'selected';
                                                                                } ?>>North Carolina
                                                            </option>
                                                            <option value="ND" <?php if ($_POST['shippingState'] == 'ND') {
                                                                                    echo 'selected';
                                                                                } ?>>North Dakota
                                                            </option>
                                                            <option value="OH" <?php if ($_POST['shippingState'] == 'OH') {
                                                                                    echo 'selected';
                                                                                } ?>>Ohio
                                                            </option>
                                                            <option value="OK" <?php if ($_POST['shippingState'] == 'OK') {
                                                                                    echo 'selected';
                                                                                } ?>>Oklahoma
                                                            </option>
                                                            <option value="OR" <?php if ($_POST['shippingState'] == 'OR') {
                                                                                    echo 'selected';
                                                                                } ?>>Oregon
                                                            </option>
                                                            <option value="PA" <?php if ($_POST['shippingState'] == 'PA') {
                                                                                    echo 'selected';
                                                                                } ?>>Pennsylvania
                                                            </option>
                                                            <option value="RI" <?php if ($_POST['shippingState'] == 'RI') {
                                                                                    echo 'selected';
                                                                                } ?>>Rhode Island
                                                            </option>
                                                            <option value="SC" <?php if ($_POST['shippingState'] == 'SC') {
                                                                                    echo 'selected';
                                                                                } ?>>South Carolina
                                                            </option>
                                                            <option value="SD" <?php if ($_POST['shippingState'] == 'SD') {
                                                                                    echo 'selected';
                                                                                } ?>>South Dakota
                                                            </option>
                                                            <option value="TN" <?php if ($_POST['shippingState'] == 'TN') {
                                                                                    echo 'selected';
                                                                                } ?>>Tennessee
                                                            </option>
                                                            <option value="TX" <?php if ($_POST['shippingState'] == 'TX') {
                                                                                    echo 'selected';
                                                                                } ?>>Texas
                                                            </option>
                                                            <option value="UT" <?php if ($_POST['shippingState'] == 'UT') {
                                                                                    echo 'selected';
                                                                                } ?>>Utah
                                                            </option>
                                                            <option value="VT" <?php if ($_POST['shippingState'] == 'VT') {
                                                                                    echo 'selected';
                                                                                } ?>>Vermont
                                                            </option>
                                                            <option value="VA" <?php if ($_POST['shippingState'] == 'VA') {
                                                                                    echo 'selected';
                                                                                } ?>>Virginia
                                                            </option>
                                                            <option value="WA" <?php if ($_POST['shippingState'] == 'WA') {
                                                                                    echo 'selected';
                                                                                } ?>>Washington
                                                            </option>
                                                            <option value="WV" <?php if ($_POST['shippingState'] == 'WV') {
                                                                                    echo 'selected';
                                                                                } ?>>West Virginia
                                                            </option>
                                                            <option value="WI" <?php if ($_POST['shippingState'] == 'WI') {
                                                                                    echo 'selected';
                                                                                } ?>>Wisconsin
                                                            </option>
                                                            <option value="WY" <?php if ($_POST['shippingState'] == 'WY') {
                                                                                    echo 'selected';
                                                                                } ?>>Wyoming
                                                            </option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="field-wrapper fname">
                                                        <div class="label">First Name</div>
                                                        <input type="text" class="form-control" name="firstName"
                                                            id="firstName" placeholder="First Name" value="">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="field-wrapper lname">
                                                        <div class="label">Last Name</div>
                                                        <input type="text" class="form-control" name="lastName"
                                                            id="lastName" placeholder="Last Name" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="field-wrapper address">
                                                <div class="label">Street Address</div>
                                                <input type="text" class="form-control" name="shippingAddress1"
                                                    id="shippingAddress1" placeholder="Street Address" value="">
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="field-wrapper city">
                                                        <div class="label">Town/City</div>
                                                        <input type="text" class="form-control" name="shippingCity"
                                                            id="shippingCity" placeholder="Town/City" value="">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="field-wrapper zip">
                                                        <div class="label">Zip Code</div>
                                                        <input type="text" class="form-control" name="shippingZip"
                                                            id="shippingZip" placeholder="Zip Code" maxlength="5"
                                                            onKeyUp="javascript:this.value=this.value.replace(/[^0-9]/g,'');"
                                                            value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <h2 class="subHeading mt-5">Additional Information</h2>
                                            <div class="field-wrapper notes">
                                                <div class="label">Order Notes(Optional)</div>
                                                <textarea id="order-notes" name="notes"
                                                    placeholder="Order Notes(Optional)"></textarea>
                                            </div>
                                        </div>

                                        <div class="tab">
                                            <h2 class="subHeading mb-1">Payment</h2>
                                            <h3 class="heading-info"> All transactions are secure and encrypted.</h3>
                                            <div class="payment mb-4">
                                                <div
                                                    class="payment-header d-flex justify-content-between px-3 py-3 align-items-center">
                                                    <div class="d-flex payment-title">
                                                        <input type="radio" checked="checked">
                                                        <label class="mb-0">
                                                            Credit Card
                                                        </label>
                                                    </div>
                                                    <div class="d-inline-flex">
                                                        <?php if ($card_type['master'] == 'yes') { ?> <img
                                                            src="./bp_config/images/payment/CardSet<?= $pageConfig['creditCardIcons'] ?>/mastercard.png">
                                                        <?php } ?>
                                                        <?php if ($card_type['discover'] == 'yes') { ?><img
                                                            src="./bp_config/images/payment/CardSet<?= $pageConfig['creditCardIcons'] ?>/discover.png">
                                                        <?php } ?>
                                                        <?php if ($card_type['visa'] == 'yes') { ?><img
                                                            src="./bp_config/images/payment/CardSet<?= $pageConfig['creditCardIcons'] ?>/visa.png">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="payment-form px-3 py-3 row m-0">
                                                    <div class="col-12">
                                                        <div class="field-wrapper card-num">
                                                            <div class="label">Card Number</div>
                                                            <input type="tel" class="form-control" name="cc_no"
                                                                id="cc_no" maxlength="16"
                                                                onkeyup="javascript:this.value=this.value.replace(/[^0-9]/g,'');"
                                                                value="" placeholder="Card Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="field-wrapper card-month">
                                                            <div class="label">Month(MM)</div>
                                                            <select class="form-control" name="cc_month" id="cc_month"
                                                                maxlength="2" placeholder="Month(MM)">
                                                                <option value="" selected="selected">Month(MM)</option>
                                                                <?php for ($month = 01; $month < 13; $month = $month + 1) { ?>
                                                                <option value=<?= $month ?>>
                                                                    <?= sprintf("%02d", $month); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="field-wrapper card-year">
                                                            <div class="label">Year(YYYY)</div>
                                                            <select class="form-control" name="cc_year" id="cc_year"
                                                                maxlength="4" placeholder="Year(YYYY)">
                                                                <option value="" selected="selected">Year(YYYY)</option>
                                                                <?php $c_year = date('Y');
                                                                for ($year = $c_year; $year < ($c_year + 11); $year = $year + 1) { ?>
                                                                <option value=<?= $year ?>> <?= $year ?> </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="field-wrapper card-cvv">
                                                            <div class="label">CVV</div>
                                                            <input type="tel" class="form-control" name="CVV" id="cvv"
                                                                maxlength="3"
                                                                onkeyup="javascript:this.value=this.value.replace(/[^0-9]/g,'');"
                                                                placeholder="CVV" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="javascript:void(0)" onClick="popop_cvv()"
                                                            class="ml-4 cvv">
                                                            What is This?
                                                        </a>
                                                    </div>
                                                    <div class="col-6"></div>
                                                    <div class="col-6">
                                                        <img id="cvv-img" src="bp_config/images/payment/cvv.jpg"
                                                            style="display: none;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="btn-wrapper mt-5">
                                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                            <button type="button" class="btn btn-order" id="btnPlaceOrder"
                                                onclick="formStep2Validation()">Place Order</button>
                                        </div>

                                    </div>
                                    <!-- Left Column -->

                                    <!-- Right Column -->
                                    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 right order-md-2 order-1">
                                        <div class="row">
                                            <div class="col-12 cart-inner">
                                                <div class="table-responsive">
                                                    <table class="table  table-cart" style="width: 100%;"
                                                        id="table-cart">
                                                        <tbody id="cartRow">
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                        <table class="table" id="total-cost">
                                            <tfoot>
                                                <tr>
                                                    <td colspan="2">Subtotal</td>
                                                    <td>$<span id="product_subtotal" value='0.00'>0.00</span></td>
                                                </tr>
                                                <?php if ($pageConfig['displayShippingPrice'] == "yes") { ?>
                                                <tr>
                                                    <td colspan="2">Shipping</td>
                                                    <td>$<span id="shipping_subtotal" value='0.00'>0.00</span></td>
                                                </tr>
                                                <?php } ?>
                                                <tr id="shipping-insurance-tr" style="display: none;">
                                                    <td colspan="2">
                                                        <?= $pageConfig['shippingOption']['shippingOptionName']; ?></td>
                                                    <td>$<span id="shipping-insurance-price"
                                                            value='0.00'><?= $pageConfig['shippingOption']['shippingOptionPrice']; ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Total</td>
                                                    <td>$<span id="final_price" value='0.00'>0.00</span></td>
                                                    <input type="hidden" name="order_total_value" value="" />
                                                </tr>
                                            </tfoot>
                                        </table>

                                        <div class="form-btn py-4 px-0 terms-btn">

                                            <!--showing or not showing checkout page generic text terms based on require_generic_text_terms = yes or no-->
                                            <?php if ($pageConfig['checkoutPage']['require_generic_text_terms'] == "yes") { ?>
                                            <label for="vehicle1" class="agree" style="font-size: 16px;">
                                                <input type="checkbox" id="iagree" name="agree" value="agree">
                                                You agree with <a href="terms.php" target="_blank">Terms
                                                    and Conditions</a> and <a href="privacy.php" target="_blank">Privacy
                                                    Policy.</a>
                                            </label>
                                            <?php } ?>

                                            <!-- //check if checkoutPage_prod_terms set to yes then show checkout page products terms checkboxes, if set to no then disable it -->
                                            <?php if ($pageConfig['checkoutPage']['require_product_terms'] == "yes") { ?>
                                            <div id="prodTerms">
                                                <!-- <input type="checkbox" id="prod_agree" name="prod_agree" class="agree" value="agree">
                                    By placing an order you will be billed $<span class="total_price"></span> ($<span class="total_price"></span> + $<span id="ship_price"></span> for shipping) for <span id="prod_name"></span>. This is a one-time purchase. Shipment via <?php echo $generalConfig['shipping_carrier']; ?> typically takes <?php echo $generalConfig['shipping_period']; ?> business days. Your credit card will be billed as “<?php echo $generalConfig['descriptor']; ?>” on your statement. -->
                                            </div>
                                            <?php } ?>
                                            <?php if ($pageConfig['checkoutPage']['require_total_price_terms'] == "yes") { ?>
                                            <div id="totalTerms"></div>
                                            <?php } ?>

                                            <?php if ($pageConfig['shippingOption']['enableShippingOption'] == "yes") { ?>
                                            <label class="agree" style="font-size: 16px;">
                                                <input type="checkbox" id="shipping-insurance-checkbox"
                                                    name="shipping-insurance">
                                                <?= $pageConfig['shippingOption']['shippingOptionName']; ?> -
                                                $<?= $pageConfig['shippingOption']['shippingOptionPrice']; ?>
                                            </label>
                                            <script>
                                            $(document).ready(function() {
                                                $('#shipping-insurance-checkbox').change(function() {
                                                    if (this.checked) {
                                                        $('#shipping-insurance-tr').show();
                                                        $('#final_price').text(($('#final_price')
                                                        .text() * 1) + ($(
                                                                '#shipping-insurance-price')
                                                            .text() * 1));
                                                    } else {
                                                        $('#shipping-insurance-tr').hide();
                                                        $('#final_price').text(($('#final_price')
                                                        .text() * 1) - ($(
                                                                '#shipping-insurance-price')
                                                            .text() * 1));
                                                    }

                                                    $('.total_price').text($('#final_price').text());
                                                });
                                            });
                                            </script>
                                            <?php } ?>

                                            <input type="hidden" id="products" name="products" value="">

                                        </div>
                                    </div>
                                    <!-- Right Column -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- New Error Popup Modal -->
            <div class="popup-bg-overly" id="error_modal">
                <div class="modal1">
                    <img src="./img/alert.png" width="44" height="38" />
                    <span class="title">Oh snap!</span>
                    <span class="mb-2">Error has occured while submitting your request.</span>
                    <p class="errors-here" id="error_pop">
                    </p>
                    <div class="button">Dismiss</div>
                </div>
            </div>
            <script>
$('.button').bind('click', function() {
    $('.popup-bg-overly').fadeOut();
});
            </script>
            <!-- New Error Popup Modal -->


            <!-- Step Form JS -->
            <script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = $(".tab");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
        $("#prevBtn").css("display", "none");
        $("#nextBtn").css("display", "inline");
        $("#btnPlaceOrder").css("display", "none");
        $("#nextBtn").html("Continue to payment");
    } else {
        $("#prevBtn").css("display", "inline");
        $("#btnPlaceOrder").css("display", "unset");
        $("#nextBtn").css("display", "none");
    }
    if (n == (x.length - 1)) {
        $("#nextBtn").html("Submit");
        $("#prevBtn").html('<i class="fas fa-chevron-left me-2"></i>Return to information');
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var cart = sessionStorage.getItem('cartPdtArr');
    console.log("Next Pressed");
    console.log(cart);
    if (!cart) {
        $('#error_modal').show(function() {
            $('#error_pop').html("");
            $('#error_pop').append(
                '<div class="alert alert-danger d-flex align-items-center justify-content-start my-2" role="alert">' +
                '<i class="fas fa-times me-2"></i>' +
                '<p class="error-msg p-0 m-0">' +
                "Cart is Empty. Please add a product to continue" +
                '</p>' +
                '</div>'
            );
        });
        return false;
    }
    var x = $(".tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !formStep1Validation()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
        //...the form gets submitted:
        document.getElementById("stepForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var tab, data, i, valid = true;
    tab = $(".tab");
    data = tab[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < data.length; i++) {
        // If a field is empty...
        if (data[i].value == "") {
            // add an "invalid" class to the field:
            data[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function formStep1Validation() {
    var errors = new Array();

    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var firstName = $('#firstName').val();
    var lastName = $('#lastName').val();
    var shippingAddress1 = $('#shippingAddress1').val();
    var shippingCity = $('#shippingCity').val();
    var shippingCountry = $('#shippingCountry').val();
    var shipping_state = $('#shipping_state').val();
    var shippingZip = $('#shippingZip').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var orderNotes = $('#order-notes').val();

    let userData = {
        firstName: firstName,
        lastName: lastName,
        phone: phone,
        email: email
    };
    sessionStorage.setItem('userData', JSON.stringify(userData));

    if (firstName == '') {
        $('#firstName').addClass('invalid');
        if ($('#firstName + .error').length == 0)
            $('#firstName').after('<div class="error mt-1">Please enter your first name</div>');
        errors.push('Please enter your first name<br>');
    } else {
        $('#firstName').removeClass('invalid');
        $('#firstName + .error').remove();
    }
    if (lastName == '') {
        $('#lastName').addClass('invalid');
        if ($('#lastName + .error').length == 0)
            $('#lastName').after('<div class="error mt-1">Please enter your last name</div>');
        errors.push('Please enter your last name<br>');
    } else {
        $('#lastName').removeClass('invalid');
        $('#lastName + .error').remove();
    }
    if (shippingAddress1 == '') {
        $('#shippingAddress1').addClass('invalid');
        if ($('#shippingAddress1 + .error').length == 0)
            $('#shippingAddress1').after('<div class="error mt-1">Please enter your shipping address</div>');
        errors.push('Please enter your shipping address<br>');
    } else {
        $('#shippingAddress1').removeClass('invalid');
        $('#shippingAddress1 + .error').remove();
    }
    if (shippingCity == '') {
        $('#shippingCity').addClass('invalid');
        if ($('#shippingCity + .error').length == 0)
            $('#shippingCity').after('<div class="error mt-1">Please enter your shipping city</div>');
        errors.push('Please enter your shiping city<br>');
    } else {
        $('#shippingCity').removeClass('invalid');
        $('#shippingCity + .error').remove();
    }
    if (shippingCountry == '') {
        $('#shippingCountry').addClass('invalid');
        if ($('#shippingCountry + .error').length == 0)
            $('#shippingCountry').after('<div class="error mt-1">Please enter your shipping country</div>');
        errors.push('Please enter your shipping country<br>');
    } else {
        $('#shippingCountry').removeClass('invalid');
        $('#shippingCountry + .error').remove();
    }
    if (shipping_state == '') {
        $('#shipping_state').addClass('invalid');
        if ($('#shipping_state + .error').length == 0)
            $('#shipping_state').after('<div class="error mt-1">Please enter your shipping state</div>');
        errors.push('Please enter your shipping state<br>');
    } else {
        $('#shipping_state').removeClass('invalid');
        $('#shipping_state + .error').remove();
    }
    if (shippingZip == '') {
        $('#shippingZip').addClass('invalid');
        if ($('#shippingZip + .error').length == 0)
            $('#shippingZip').after('<div class="error mt-1">Please enter your shipping zip</div>');
        errors.push('Please enter your shipping zip<br>');
    } else {
        $('#shippingZip').removeClass('invalid');
        $('#shippingZip + .error').remove();
    }
    if (phone == '') {
        $('#phone').addClass('invalid');
        if ($('#phone + .error').length == 0)
            $('#phone').after('<div class="error mt-1">Please enter your phone number</div>');
        errors.push('Please enter your phone number<br>');
    } else {
        $('#phone').removeClass('invalid');
        $('#phone + .error').remove();
    }
    if (!regex.test(email) || email == '') {
        $('#email').addClass('invalid');
        if ($('#email + .error').length == 0)
            $('#email').after('<div class="error mt-1">Please enter valid email</div>');
        errors.push('Please enter valid email<br>');
    } else {
        $('#email').removeClass('invalid');
        $('#email + .error').remove();
    }
    if (errors.length != 0) return false;
    else return true;
}

function formStep2Validation() {
    var errors = new Array();

    var cc_no = $('#cc_no').val();
    var cc_month = $('#cc_month').val();
    var cc_year = $('#cc_year').val();
    var cvv = $('#cvv').val();

    if (cc_no == '') {
        $('#cc_no').addClass('invalid');
        if ($('#cc_no + .error').length == 0)
            $('#cc_no').after('<div class="error mt-1">Please enter your credit card number</div>');
        errors.push('Please enter your credit card number<br>');
    } else {
        $('#cc_no').removeClass('invalid');
        $('#cc_no + .error').remove();
    }
    if (cc_month == '') {
        $('#cc_month').addClass('invalid');
        if ($('#cc_month + .error').length == 0)
            $('#cc_month').after('<div class="error mt-1">Please enter your credit card month</div>');
        errors.push('Please enter your credit card month<br>');
    } else {
        $('#cc_month').removeClass('invalid');
        $('#cc_month + .error').remove();
    }
    if (cc_year == '') {
        $('#cc_year').addClass('invalid');
        if ($('#cc_year + .error').length == 0)
            $('#cc_year').after('<div class="error mt-1">Please enter your credit card year</div>');
        errors.push('Please enter your credit card year<br>');
    } else {
        $('#cc_year').removeClass('invalid');
        $('#cc_year + .error').remove();
    }
    if (cvv == '') {
        $('#cvv').addClass('invalid');
        if ($('#cvv + .error').length == 0)
            $('#cvv').after('<div class="error mt-1">Please enter your CVV</div>');
        errors.push('Please enter your CVV<br>');
    } else {
        $('#cvv').removeClass('invalid');
        $('#cvv + .error').remove();
    }

    // Terms and Conditions Validation

    //showing or not showing checkoutpage Total price agree terms based on site-info file's require_generic_text_terms key
    var require_generic_text_terms = "<?php echo $pageConfig['checkoutPage']['require_generic_text_terms']; ?>";
    if (require_generic_text_terms == "yes") {
        if ($('#iagree').prop("checked") == false) {
            if ($('.terms-btn .error1').length == 0)
                $('.terms-btn').prepend('<div class="error1 mt-1">Please agree to the terms and conditions</div>');
            errors.push('Please agree to the terms and conditions<br>');
        } else {
            $('.terms-btn .error1').remove();
        }
    }

    //showing or not showing checkoutpage prod agree terms based on site-info file's require_product_terms key

    var checkoutPage_prod_terms = "<?php echo $pageConfig['checkoutPage']['require_product_terms']; ?>";
    var cartPdtArr = [];
    var tot_pdt_count = <?= $generalConfig['product_count'] ?>;
    for (i = 1; i <= tot_pdt_count; i++) {
        var cartpdt = JSON.parse(sessionStorage.getItem('product-' + i));
        var cartpdtTotal = cartPdtArr.push(cartpdt);
    }

    var cartPdtArrNew = cartPdtArr.filter(function(el) {
        return el != null && el != "";
    });
    if (checkoutPage_prod_terms == "yes") {
        cartPdtArrNew.forEach(function(b) {
            if (b.Saletype == 1 && $('.ss_agree-' + b.Id).is(":checked") == false) {
                if ($('.terms-btn .error2' + b.Id + '').length == 0)
                    $('.terms-btn').prepend('<div class="error error2' + b.Id + ' mt-1">Please agree to the ' +
                        b.Name + ' terms<br></div>');
                errors.push('Please agree to the ' + b.Name + ' terms<br>');
            } else {
                $('.terms-btn .error2' + b.Id + '').remove();
            }
            <?php if ($showTrialContinuityVerbiage) { ?>
            if (b.Saletype == 2 && $('.trial_agree-' + b.Id).is(":checked") == false) {
                if ($('.terms-btn .error2' + b.Id + '').length == 0)
                    $('.terms-btn').prepend('<div class="error error2' + b.Id + ' mt-1">Please agree to the ' +
                        b.Name + ' terms<br></div>');
                errors.push('Please agree to the ' + b.Name + ' terms<br>');
            } else {
                $('.terms-btn .error2' + b.Id + '').remove();
            }
            if (b.Saletype == 3 && $('.cont_agree-' + b.Id).is(":checked") == false) {
                if ($('.terms-btn .error2' + b.Id + '').length == 0)
                    $('.terms-btn').prepend('<div class="error error2' + b.Id + ' mt-1">Please agree to the ' +
                        b.Name + ' terms<br></div>');
                errors.push('Please agree to the ' + b.Name + ' terms<br>');
            } else {
                $('.terms-btn .error2' + b.Id + '').remove();
            }
            <?php } ?>
        });
    }

    //showing or not showing checkoutpage prod agree terms based on site-info file's require_total_price_terms key
    var require_total_price_terms = "<?php echo $pageConfig['checkoutPage']['require_total_price_terms']; ?>";
    if (require_total_price_terms == "yes") {
        if ($(".total_agree").prop('checked') == false) {
            if ($('.terms-btn .error3').length == 0)
                $('.terms-btn').prepend('<div class="error3 mt-1">Please agree to the Terms<br></div>');
            errors.push('Please agree to the Terms<br>');
        } else {
            $('.terms-btn .error3').remove();
        }
    }

    if (errors.length == 0) {
        $("#loading-indicator").show();
        $('#order_form').submit();
        return true;
    } else return false;
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = $(".step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
}
            </script>

            <!-- Basic JS for Form and Input Design -->
            <script>
$(document).ready(function() {
    $(".field-wrapper input , .field-wrapper select , .field-wrapper textarea").each(function() {
        if ($(this).val().length === 0) {
            $(this).prev().fadeOut();
            $(this).css("padding-top", "0px");
        } else {
            $(this).prev().fadeIn();
            $(this).css("padding-top", "18px");
        }
    });
});
$(".field-wrapper input , .field-wrapper select , .field-wrapper textarea").keyup(function() {
    if ($(this).val().length === 0) {
        $(this).prev().fadeOut();
        $(this).css("padding-top", "0px");
    } else {
        $(this).prev().fadeIn();
        $(this).css("padding-top", "18px");
    }
});
$(".field-wrapper input , .field-wrapper select , .field-wrapper textarea").change(function() {
    if ($(this).val().length === 0) {
        $(this).prev().fadeOut();
        $(this).css("padding-top", "0px");
    } else {
        $(this).prev().fadeIn();
        $(this).css("padding-top", "18px");
    }
});
            </script>