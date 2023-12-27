<?php
$configFilePath = __DIR__ . DIRECTORY_SEPARATOR . 'bp_config' . DIRECTORY_SEPARATOR . 'site-info.php';
if (file_exists($configFilePath)) {
  require_once $configFilePath;
} else {
  echo 'General configuration error';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Confirm</title>
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!-- Fonts -->
  <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/bootstrap.min.css?v=<?= time() ?>">
  <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/custom.css?v=<?= time() ?>">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="stylesheet" href="<?= $path['css']; ?>/checkout_custom.css?v=<?= time() ?>">
  <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/style.css?v=<?= time() ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
  <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/animate.css?v=<?= time() ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="bp_config/css/swiper-bundle.min.css" />
  <!-- <script src="bp_config/js/swiper-bundle.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


  <style>
    .cart_link {
      display: none !important;
    }

    a[href="cart.php"] {
      display: none !important;
    }

    a[href="checkout.php"] {
      display: none !important;
    }
  </style>
</head>

<body>
  <div id="loadingMask" style="width: 100%; height: 100%; position: fixed; background: #fff; z-index:999999999999;">
    <div>
      <img src="./img/loadingGif/<?= $pageConfig['loadingGif'] ?>.gif">
    </div>
  </div>


  <?php
  if (file_exists('bp_config/includes/templates/headers/header' . $pageConfig['header_template'] . '.php')) {
    require 'bp_config/includes/templates/headers/header' . $pageConfig['header_template'] . '.php';
  }
  ?>



  <div id="confirm-page">
    <div class="page-wrapper">
      <div class="page-heading">
        <h1 class="text-center p-0">
          <img src="./img/thanks.png" alt="<?= $generalConfig['brand_name'] ?>">
        </h1>
      </div>
      <div class="page-body">
        <div class="text-data">
          <h1 class="confirmation-heading text-center">
            Order Confirmation
          </h1>
          <p class="confirmation-text text-center">
            Hey <span class="customer-name"></span>,<br>
            We've got your order! Your world is about to look a whole lot better.<br>
            We'll drop you another email when your order ships.
          </p>
          <div class="order-info">
            <h1 class="order-id text-center">
              <?= $_GET['order_id']; ?>
            </h1>
            <p class="order-date text-center"></p>
          </div>
        </div>
        <div class="order-items">
          <h3 class="items-heading">Items ordered</h3>
          <div class="item-container"></div>
        </div>
        <div class="order-ammount">
          <div class="ammount-wrapper">
            <div class="subtotal-ammount d-flex justify-content-space-between">
              <div class="sub-heading">
                Subtotal
              </div>
              <div class="sub-common sub-price"></div>
            </div>
            <?php if ($pageConfig['displayShippingPrice'] == "yes") { ?>
              <div class="subtotal-ammount d-flex justify-content-space-between">
                <div class="sub-heading">
                  Shipping
                </div>
                <div class="sub-common ship-price"></div>
              </div>
            <?php } ?>
            <div class="subtotal-ammount tprice d-flex justify-content-space-between">
              <div class="sub-heading">
                Total
              </div>
              <div class="sub-common confirm-tprice"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php
  if (file_exists('bp_config/includes/templates/footer/footer' . $pageConfig['footer_template'] . '.php')) {
    require 'bp_config/includes/templates/footer/footer' . $pageConfig['footer_template'] . '.php';
  }
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>


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
    var userData = JSON.parse(sessionStorage.getItem('userData'));
    var orderItem = JSON.parse(sessionStorage.getItem('cartPdtArrNew'));
    var subtotal = 0;
    var shipping = 0;
    $(".customer-name").html(userData.firstName + ' ' + userData.lastName);
    const date = new Date();
    $(".order-date").html(date.getDate() + '/' + date.getMonth() + '/' + date.getFullYear());
    orderItem.forEach(function(item) {
      $(".item-container").append(`
              <div class="item">
                  <div class="item-img">
                    <img src="` + item.Image + `" alt="item-img">
                  </div>
                  <div class="item-data">
                    <div class="container">
                      <div class="row">
                        <div class="col-8">
                          <div class="item-name">
                            <h5>` + item.Name + `</h5>
                          </div>
                          <div class="item-category">
                            <p>Subtotal: ` + item.Price + `</p>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="item-price text-right">
                            <span class="item-quantity">× ` + item.Type + `</span>
                            <p>` + item.Total + `</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            `);
      subtotal += parseFloat(item.Price);
      shipping += parseFloat(item.Ship);
      $(".sub-price").html("$" + subtotal.toFixed(2));
      $(".ship-price").html("$" + shipping.toFixed(2));
      $(".confirm-tprice").html("$" + (subtotal + shipping).toFixed(2));
    });
    console.log(orderItem);
  </script>
  <script>
    $(document).ready(function() {
      $('#loadingMask').fadeOut();
    });
  </script>
  <script type="text/javascript">
    window.onbeforeunload = function(event) {
      event.returnValue = "Do You Want To leave the page ?";
      sessionStorage.clear();
    };
    if (sessionStorage.length === 0) {
      window.location.href = './index.php';
    }
  </script>
</body>

</html>