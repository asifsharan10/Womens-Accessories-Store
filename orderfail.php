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
  <title>Orderfail</title>
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
  <!-- <div id="loadingMask" style="width: 100%; height: 100%; position: fixed; background: #fff; z-index:999999999999;">
        <div>
            <img src="./img/loadingGif/<?= $pageConfig['loadingGif'] ?>.gif">
        </div>
      </div> -->


  <?php
  if (file_exists('bp_config/includes/templates/headers/header' . $pageConfig['header_template'] . '.php')) {
    require 'bp_config/includes/templates/headers/header' . $pageConfig['header_template'] . '.php';
  }
  ?>



  <div id="orderfail-page">
    <div class="page-wrapper">
      <div class="page-heading">
        <h1 class="text-center p-0">
          <img src="./img/alert.png" alt="<?= $generalConfig['brand_name'] ?>">
        </h1>
      </div>
      <div class="page-body">
        <div class="text-data">
          <h1 class="error-heading text-center">
            <?= $response->error_message ?>
          </h1>
          <p class="error-text text-center">
            Sorry, your order has failed. We are having trouble processing your payment. <br>
            Please try again or contact customer support for assistance.
          </p>
          <div class="contact-info">
            <h1 class="contact-mail text-center">
              <?= $generalConfig['email']; ?>
            </h1>
            <p class="contact-phone text-center">
              <?= $generalConfig['phone_number']; ?>
            </p>
          </div>
          <div class="button-wrapper">
            <a class="home-btn" href="index.php">Go to Home Page</a>
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
    $(document).ready(function() {
      $('#loadingMask').fadeOut();
    });
  </script>
  <!-- <script type="text/javascript">
          window.onbeforeunload = function(event) {
            event.returnValue = "Do You Want To leave the page ?";
            sessionStorage.clear();
          };
          if(sessionStorage.length===0){
            window.location.href='./index.php';
          }
        </script> -->
</body>

</html>