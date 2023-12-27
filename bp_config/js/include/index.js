$(document).ready(function(){
    //  $.get("https://ipinfo.io", function(response) {
    //     //console.log(response.ip);
    //     $('#user_ip').val(response.ip);
    // }, "jsonp")

    //  localStorage.setItem('data_user_ip', $('#user_ip').val());

    $('.btn_shop').click(function(){
        var main_cat = $(this).parents('.product-section').attr('data-product-category');
        var product_id = $(this).parents('.product-section').attr('data-prod-id');
        // var billing_model = $(this).parent().parent().attr('data-product-billmodel');
        var billing_model = $(this).parents('.product-section').attr('data-product-billmodel');
        //alert(billing_model);
        $data_product = $(this).parents('.product-section').attr('data-product');
        $data_product_category = $(this).parents('.product-section').attr('data-product-category');
        $data_product_title = $(this).parents('.product-section').attr('data-product-title');
        $data_product_alias = $(this).parents('.product-section').attr('data-product-alias');
        $data_product_description = $(this).parents('.product-section').attr('data-product-description');
        if(billing_model==1){
            $data_product_price = $(this).parents('.product-section').attr('data-product-price');
        }
        if(billing_model==2 || billing_model==8){
            $data_product_price = $(this).parents('.product-section').attr('data-product-trlshipping');
        }
        if(billing_model==3){
            $data_product_price_cont = + $(this).parents('.product-section').attr('data-product-cntntyprice') + + $(this).parents('.product-section').attr('data-product-cntntyshipping');
            $data_product_price = $data_product_price_cont.toFixed(2);
        }
        if(billing_model==4){
            $data_product_price = $(this).parents('.product-section').attr('data-product-trlshipping');
        }
        if(billing_model==5){
            $data_product_price = $(this).parents('.product-section').attr('data-product-price');
        }
        if(billing_model==6){
            $data_product_price = $(this).parents('.product-section').attr('data-product-trlshipping');
        }
        if(billing_model==7){
            $data_product_price = $(this).parents('.product-section').attr('data-product-price');
        }
        $data_product_shipping = $(this).parents('.product-section').attr('data-product-shipping');
        $data_product_rbllprice = $(this).parents('.product-section').attr('data-product-rbllprice');
        $data_product_trlshipping = $(this).parents('.product-section').attr('data-product-trlshipping');
        $data_product_cntntyprice = $(this).parents('.product-section').attr('data-product-cntntyprice');
        $data_product_cntntyshipping = $(this).parents('.product-section').attr('data-product-cntntyshipping');
        $data_product_billing_model = $(this).parents('.product-section').attr('data-product-billmodel');
        $data_product_size_option = $(this).parents('.product-section').attr('data-product-size-option');
        $data_product_MultiPrice = $(this).parents('.product-section').attr('data-product-MultiPrice');
        $data_product_id = $(this).parents('.product-section').attr('data-product-id');
        $data_prod_id = $(this).parents('.product-section').attr('data-prod-id');
        $data_product_link = $(this).parents('.product-section').attr('data-product-image-link');
        $data_product_qty = $(this).parents('.product-section').attr('data-product-quantity');


        //console.log(data_product_title);

        sessionStorage.setItem('data_product', $data_product);
        sessionStorage.setItem('data_product_category', $data_product_category);
        sessionStorage.setItem('data_product_title', $data_product_title);
        sessionStorage.setItem('data_product_alias', $data_product_alias);
        sessionStorage.setItem('data_product_description', $data_product_description);
        sessionStorage.setItem('data_product_price', $data_product_price);
        sessionStorage.setItem('data_product_shipping', $data_product_shipping);
        sessionStorage.setItem('data_product_rbllprice', $data_product_rbllprice);
        sessionStorage.setItem('data_product_trlshipping', $data_product_trlshipping);
        sessionStorage.setItem('data_product_cntntyprice', $data_product_cntntyprice);
        sessionStorage.setItem('data_product_cntntyshipping', $data_product_cntntyshipping);
        sessionStorage.setItem('data_product_billing_model', $data_product_billing_model);
        sessionStorage.setItem('data_product_size_option', $data_product_size_option);
        sessionStorage.setItem('data_product_MultiPrice', $data_product_MultiPrice);
        sessionStorage.setItem('data_product_id', $data_product_id);
        sessionStorage.setItem('data_prod_id', $data_prod_id);
        sessionStorage.setItem('data_product_link', $data_product_link);
        sessionStorage.setItem('addedproduct', 'true');
        sessionStorage.setItem('data_pdt_qty', $data_product_qty);
        sessionStorage.setItem('data_total_price', $data_product_price);
        sessionStorage.setItem('prev_added_pdts', sessionStorage.getItem('cart'));


        if(sessionStorage.getItem('addedproduct') === 'true'){
            window.location = 'product.php?pro_cat='+main_cat+'&pro_id='+product_id;
        }
    })
})