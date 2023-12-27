<?php
error_reporting(0);
$configFilePath = 'site-info.php';
if (file_exists($configFilePath)) {
    require_once $configFilePath;
}
else {
    echo 'General configuration error';
}
$product_name   = "";
$billing_module = $_REQUEST['mod'];
$pid            = $_REQUEST['pid'];
$p_qty          = $_REQUEST['p_qty'];


//$billing_module = 1;
foreach ($products as $key => $value) {
    foreach ($value as $k => $v) {
        if ($v == 'active') {
            $p = $key;

            $product = $products[$p];
            if ($product['billingModel'] == 1 && $billing_module == 1 && $product['id'] == $pid) { ?>
                <div id="pid<?= $pid ?>"
                     class="cart-product"
                     data-konId="<?= $product['konnective_id'] ?>"
                     data-quantity="<?= $p_qty ?>"
                     data-price="<?= $product['ssPrice'] ?>"
                     data-shipping="<?= $product['ssShipping'] ?>">
                    <?= $product['name']; ?> - Straight Sale x <?= $p_qty ?>
                </div>
            <?php }
            if ($product['billingModel'] == 2 && $billing_module == 2 && $product['id'] == $pid) { ?>
                <div id="pid<?= $pid ?>"
                     class="cart-product"
                     data-konId="<?= $product['konnective_id'] ?>"
                     data-quantity="<?= $p_qty ?>"
                     data-price="<?= $product['trialPrice'] ?>"
                     data-shipping="<?= $product['trialShipping'] ?>">
                    <?= $product['name']; ?> - Trial x <?= $p_qty ?>
                </div>
            <?php }
            if ($product['billingModel'] == 3 && $billing_module == 3 && $product['id'] == $pid) { ?>
                <div id="pid<?= $pid ?>"
                     class="cart-product"
                     data-konId="<?= $product['konnective_id'] ?>"
                     data-quantity="<?= $p_qty ?>"
                     data-price="<?= $product['continuityPrice'] ?>"
                     data-shipping="<?= $product['continuityShipping'] ?>">
                    <?= $product['name']; ?> - Continuity x <?= $p_qty ?>
                </div>
            <?php }
            if ($product['billingModel'] == 4 && $billing_module == 1 && $product['id'] == $pid) { ?>
                <div id="pid<?= $pid ?>"
                     class="cart-product"
                     data-konId="<?= $product['konnective_id'] ?>"
                     data-quantity="<?= $p_qty ?>"
                     data-price="<?= $product['ssPrice'] ?>"
                     data-shipping="<?= $product['ssShipping'] ?>">
                    <?= $product['name']; ?> - Straight Sale x <?= $p_qty ?> </div>
            <?php }
            if ($product['billingModel'] == 4 && $billing_module == 2 && $product['id'] == $pid) { ?>
                <div id="pid<?= $pid ?>"
                     class="cart-product"
                     data-konId="<?= $product['konnective_id'] ?>"
                     data-quantity="<?= $p_qty ?>"
                     data-price="<?= $product['trialPrice'] ?>"
                     data-shipping="<?= $product['trialShipping'] ?>">
                    <?= $product['name']; ?> - Trial x <?= $p_qty ?>
                </div>
            <?php }
            if ($product['billingModel'] == 5 && $billing_module == 1 && $product['id'] == $pid) { ?>
                <div id="pid<?= $pid ?>"
                     class="cart-product"
                     data-konId="<?= $product['konnective_id'] ?>"
                     data-quantity="<?= $p_qty ?>"
                     data-price="<?= $product['ssPrice'] ?>"
                     data-shipping="<?= $product['ssShipping'] ?>">
                    <?= $product['name']; ?> - Straight Sale x <?= $p_qty ?> </div>
            <?php }
            if ($product['billingModel'] == 5 && $billing_module == 3 && $product['id'] == $pid) { ?>
                <div id="pid<?= $pid ?>"
                     class="cart-product"
                     data-konId="<?= $product['konnective_id'] ?>"
                     data-quantity="<?= $p_qty ?>"
                     data-price="<?= $product['continuityPrice'] ?>"
                     data-shipping="<?= $product['continuityShipping'] ?>">
                    <?= $product['name']; ?> - Continuity x <?= $p_qty ?> </div>
            <?php }
            if ($product['billingModel'] == 6 && $billing_module == 2 && $product['id'] == $pid) { ?>
                <div id="pid<?= $pid ?>"
                     class="cart-product"
                     data-konId="<?= $product['konnective_id'] ?>"
                     data-quantity="<?= $p_qty ?>"
                     data-price="<?= $product['trialPrice'] ?>"
                     data-shipping="<?= $product['trialShipping'] ?>">
                    <?= $product['name']; ?> - Trial x <?= $p_qty ?>
                </div>
            <?php }
            if ($product['billingModel'] == 6 && $billing_module == 3 && $product['id'] == $pid) { ?>
                <div id="pid<?= $pid ?>"
                     class="cart-product"
                     data-konId="<?= $product['konnective_id'] ?>"
                     data-quantity="<?= $p_qty ?>"
                     data-price="<?= $product['continuityPrice'] ?>"
                     data-shipping="<?= $product['continuityShipping'] ?>">
                    <?= $product['name']; ?> - Continuity x <?= $p_qty ?> </div>
            <?php }
            if ($product['billingModel'] == 7 && $billing_module == 1 && $product['id'] == $pid) { ?>
                <div id="pid<?= $pid ?>"
                     class="cart-product"
                     data-konId="<?= $product['konnective_id'] ?>"
                     data-quantity="<?= $p_qty ?>"
                     data-price="<?= $product['ssPrice'] ?>"
                     data-shipping="<?= $product['ssShipping'] ?>">
                    <?= $product['name']; ?> - Straight Sale x <?= $p_qty ?> </div>
            <?php }
            if ($product['billingModel'] == 7 && $billing_module == 2 && $product['id'] == $pid) { ?>
                <div id="pid<?= $pid ?>"
                     class="cart-product"
                     data-konId="<?= $product['konnective_id'] ?>"
                     data-quantity="<?= $p_qty ?>"
                     data-price="<?= $product['trialPrice'] ?>"
                     data-shipping="<?= $product['trialShipping'] ?>">
                    <?= $product['name']; ?> - Trial x <?= $p_qty ?>
                </div>
            <?php }
            if ($product['billingModel'] == 7 && $billing_module == 3 && $product['id'] == $pid) { ?>
                <div id="pid<?= $pid ?>"
                     class="cart-product"
                     data-konId="<?= $product['konnective_id'] ?>"
                     data-quantity="<?= $p_qty ?>"
                     data-price="<?= $product['continuityPrice'] ?>"
                     data-shipping="<?= $product['continuityShipping'] ?>">
                    <?= $product['name']; ?> - Continuity x <?= $p_qty ?> </div>
            <?php }

        }
    }
}
?>