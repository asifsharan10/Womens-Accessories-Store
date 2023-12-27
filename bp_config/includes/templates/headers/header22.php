<section class="header_section header_section22" id="header_section">
    <!-----Header-top-bar Ends here----->

    <header class="nav-color">

        <!-----Header-navbar starts here----->
        <div class="top-head">
            <div class="row align-items-center navbar-logo p-3">
                <div class="navbar"> <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a></div>
                <div class="top-left">
                    <ul class="d-flex top-bar-right m-0 p-0 align-items-center">
                        <li>
                            <div class="d-flex align-items-center navbar-icons-content">
                                <i class="fas fa-map"></i>
                                <h6 class="nav-text-color"><?= $generalConfig['address'] ?></h6>
                            </div>
                        </li>
                        <li class="ms-4">
                            <div class="d-flex align-items-center navbar-icons-content">
                                <i class="fas fa-envelope"></i>
                                <h6 class="nav-text-color"><?= $generalConfig['email'] ?></h6>
                            </div>
                        </li>
                        <li class="ms-4">
                            <div class="d-flex align-items-center navbar-icons-content">
                                <i class="fas fa-phone-alt"></i>
                                <h6 class="nav-text-color"><?= $generalConfig['phone_number'] ?></h6>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- 2nd Nav -->
        <div class="max-wid p-2">
            <div class="header-navbar">
                <div class="row">
                    <div class="col-8 alooo">
                        <div class="navbar"> <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a></div>
                    </div>
                    <div class="col-4 alooo2 d-flex align-items-center justify-content-end">
                        <button class="navbar-toggler" id="toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="primary-navigation align-items-center header-content text-center nav-color">
                            <nav class="navbar navbar-expand-lg  p-0">
                                <div class="container">
                                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-menu">
                                            <li class="nav-item pe-2"><a href="index.php" class="nav-link nav-active-color">Home</a></li>
                                            <li class="nav-item pe-2"><a href="shop.php" class="nav-link nav-text-color">Shop</a></li>
                                            <li class="nav-item pe-2"><a href="cart.php" class="nav-link nav-text-color">Cart</a></li>
                                            <li class="nav-item pe-2"><a href="checkout.php" class="nav-link nav-text-color">Checkout</a></li>
                                            <li class="nav-item pe-2"><a href="contact.php" class="nav-link nav-text-color">Contact</a></li>
                                        </ul>
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-menu">
                                            <li class="ms-5">
                                                <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
                                                    <ul class="navbar-nav navbar-nav4 me-auto float-end">
                                                        <li class="cart_link">
                                                            <a href="javascript:void(0);">
                                                                <span class="cart_text"><i class="far fa-shopping-bag nav-icon-color"></i></span>
                                                                <span class="cart_amt nav-text-color">
                                                                    $
                                                                    <p id="cart_amt" class="subtotalAmount" style="display: inline;"></p>
                                                                </span>
                                                            </a>
                                                            <div class="minibag cart_bag" id="minicart">
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
                                                                        <a href="cart.php" class="btn btn-continue  shop-btn-outline" style="color:#000 !important;">
                                                                            View Cart
                                                                        </a>
                                                                        <a href="checkout.php" class="btn btn-update  shop-btn-color">
                                                                            Checkout
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                <?php } ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-----Header-navbar ends here----->

    </header>

    <!-- Menu -->

    <!-- Menu -->

</section>