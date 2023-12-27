<?php
// DO NOT EDIT ANYTHING UNDER THIS LINE 

$path = array(
    'css' => '.' . DIRECTORY_SEPARATOR . 'bp_config' . DIRECTORY_SEPARATOR . 'css',
    'images' => '.' . DIRECTORY_SEPARATOR . 'bp_config' . DIRECTORY_SEPARATOR . 'images',
    'js' => '.' . DIRECTORY_SEPARATOR . 'bp_config' . DIRECTORY_SEPARATOR . 'js',
    'root' => '.',
);

// for bill model 1 if it set to multiprc= yes then fetch dropdown qty and each pricing
if ($_POST['type'] == 1) {
    $prod_id = $_POST['prod_id'];
    $selected_product = $products[$prod_id]['shop_option'];
    $option_quantity = array_column($selected_product, 'option_quantity');
    // echo "<pre>";
    // print_r($option_quantity);
    echo '<br><div>Select Bundle</div>';
    echo '<select class="select-qty" id="qty_dropdown">';
    foreach ($option_quantity as $key => $value) {
        echo '<option value="' . $value . '">' . $value . '</option>';
    }
    echo '<select>';
}

//fetch price for dropdown
if ($_POST['type'] == 2) {
    $prod_id = $_POST['prod_id'];
    $quant = $_POST['quant'];

    switch ($products[$prod_id]['billingModel']) {
        case '2';
            echo $products[$prod_id]['trialPrice'];
            break;

        default:
            $selected_product = $products[$prod_id]['shop_option'];
            $option_quantity = array_column($selected_product, 'option_quantity');
            $option_price = array_column($selected_product, 'option_price');
            // echo "<pre>";
            // print_r($option_price);
            $quant_key = array_search($quant, $option_quantity);
            echo $option_price[$quant_key]; //this is the price for selected quantity
    }
}

//enable & disble qty in product & cart page depend on enableMaxqty key
if ($_POST['type'] == 3) {
    $prod_id = $_POST['prod_id'];

    switch ($products[$prod_id]['billingModel']) {
        case '2';
            $selected_product_enableMaxqty = $products[$prod_id]['trialMaxqty'];
            break;

        default:
            $selected_product_enableMaxqty = $products[$prod_id]['enableMaxqty'];
    }

    echo $selected_product_enableMaxqty;
}

//if billing model set to 4,5,6,7 then pass proper price to the next page
if ($_POST['type'] == 4) {
    $model_id = $_POST['model_id'];
    $prod_id = $_POST['prod_id'];
    $multiPrice = $_POST['multiPrice'];
    // echo ("Helloooooooooooooooooooo");
    $selected_product = $products[$prod_id];
    if ($model_id == 1 && $multiPrice == "no") {
        $shipping_price = $selected_product['ssShipping'];
        $ss_price = $selected_product['ssPrice'];
        $pdt_price = sprintf('%.2f', $ss_price);
    }
    if ($model_id == 1 && $multiPrice == "yes") {
        $shipping_price = $selected_product['ssShipping'];
        $ss_multi_price = $selected_product['shop_option']['shop_option1']['option_price'];
        $pdt_price = sprintf('%.2f', $ss_multi_price);
    }
    if ($model_id == 2) {
        $shipping_price = $selected_product['trialShipping'];
        $trl_price = $selected_product['trialPrice'];
        $pdt_price = sprintf('%.2f', $trl_price);
    }
    if ($model_id == 3) {
        $shipping_price = $selected_product['continuityShipping'];
        $cont_price = $selected_product['continuityPrice'];
        $pdt_price = sprintf('%.2f', $cont_price);
    }
    $response = array(
        'status' => 'success',
        'message' => 'Selected Product Values are Product Price and Product Shipping',
        'pdt_price' => $pdt_price,
        'shipping_price' => $shipping_price,
    );
    echo json_encode($response);
}

//fectch size options in product page
if ($_POST['type'] == 5) {
    $prod_id = $_POST['prod_id_inner'];
    foreach ($products as $product) {
        if ($product['id'] == $prod_id) {
            $selected_product = $product['size_option'];
        }
    }

    //need to cut 1st element bcz need to add another extra class to it. To show it selected when page ready
    $first_element = array_shift($selected_product);
    echo '<li><label><input type="radio" name="prod-sizes" class="prod-sizes first-size-option" value="' . $first_element . '" checked="checked"><span>' . $first_element . '</span></label></li>';

    //print other size options
    foreach ($selected_product as $key => $value) {
        echo '<li><label><input type="radio" name="prod-sizes" class="prod-sizes" value="' . $value . '"><span>' . $value . '</span></label></li>';
    }
    array_push($selected_product, "$first_element");

    //now showing unavailable size options checking the difference
    if (count($selected_product) < 6) {
        $allsizes = array(
            '0' => 'S',
            '1' => 'M',
            '2' => 'L',
            '3' => 'XL',
            '4' => '2XL',
            '5' => '3XL',
        );
        $result = array_diff($allsizes, $selected_product);
        //now showing the unavailable sizes
        foreach ($result as $key => $value) {
            echo '<li class="unavailable"><label><input type="radio" name="prod-sizes" class="prod-sizes" value="' . $value . '"><span>' . $value . '</span></label></li>';
        }
    }
}
