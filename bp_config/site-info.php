<?php
// <!--********************
//     Version 3.4
// ********************-->
require_once __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'helper.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'verbiage.php';

$products = array(
        'product1' => array(
        'id' => '11',
        'stickyId' => 329,
        'name' => 'Baseball Earrings',
        'description' => '
        Women Jewelry Beaded Baseball Earrings.
        <br /><br />
        Color : White<br>
        Weight : 20g<br>
        Material: Bead, Alloy / Leather<br />
        Size: 10X10X5 cm<br>
        ',
        'image' => 'products/Baseball Earrings.png',
        'show_ingredients' => 'no',
        'ingredients_image' => 'ingredients/keto.jpg',
        'category' => 'Womens Accessories',
        'billingModel' => '1',              // 1=ss|2=trial|3=con|4=SS+trial|5=SS+con|6=trial+con|7= SS+trial+con
        'ssPrice' => '91.95',               //if ss
        'ssShipping' => '0.00',             //if ss
        'ssMaxqty' => '1',                  // 1 for disable qty, 2 for enable qty
        'trialPrice' => '0.00',             //if trial
        'trialShipping' => '5.45',          //if trial
        'trialRebillPrice' => '91.95',       //Rebill price - if trial(after 14 days)s
        'trialMaxqty' => '1',               // 1 for disable qty, 2 for enable qty
        'continuityPrice' => '91.95',       //if continuity
        'continuityShipping' => '3.95',     //if continuity
        'continuityMaxqty' => '1',          // 1 for disable qty, 2 for enable qty
        'straightSaleMultiPrice' => 'yes',  // if yes, only then it take price from below
        'shop_option' =>  $optionPrices['product1'] ??array(
          'shop_option1' => array(
            'option_quantity' => '1',
            'option_price' => '3.99'
            ),
            'shop_option2' => array(
            'option_quantity' => '2',
            'option_price' => '6.99'
            ),
            'shop_option3' => array(
            'option_quantity' => '3',
            'option_price' => '8.99'
            ),
            'shop_option4' => array(
            'option_quantity' => '4',
            'option_price' => '10.99'
            )
        ),
        'enableMaxqty' => '1',               //1 for not display quantity increase/decrease button, any other number is the maximum qty customer can buy
        'sizeOption' => 'no',              //if yes then how size options in product page
        'size_option' => array(
            '0' => 'S',
            '1' => 'M',
            '2' => 'L',
            '3' => 'XL',
            '4' => '2XL',
            '5' => '3XL',
        ),
        'status' => 'active',               //active or inactive
    ),
    'product2' => array(
        'id' => '12',
        'stickyId' => 329,
        'name' => 'Sun Moon Bracelet',
        'description' => '
        925 Sterling Silver Sun Moon Bracelet.
        <br><br>
        Color : Gold<br>
        Material: 925 Sterling Silver<br />
        Weight : 35 g<br>
        Size: 10X80X2 cm<br />
        ',
        'image' => 'products/Sun Moon Bracelet.png',
        'show_ingredients' => 'no',
        'ingredients_image' => 'ingredients/keto.jpg',
        'category' => 'Womens Accessories',
        'billingModel' => '1',              // 1=ss|2=trial|3=con|4=SS+trial|5=SS+con|6=trial+con|7= SS+trial+con
        'ssPrice' => '91.95',               //if ss
        'ssShipping' => '0.00',             //if ss
        'ssMaxqty' => '1',                  // 1 for disable qty, 2 for enable qty
        'trialPrice' => '0.00',             //if trial
        'trialShipping' => '5.45',          //if trial
        'trialRebillPrice' => '91.95',       //Rebill price - if trial(after 14 days)
        'trialMaxqty' => '1',               // 1 for disable qty, 2 for enable qty
        'continuityPrice' => '91.95',       //if continuity
        'continuityShipping' => '3.95',     //if continuity
        'continuityMaxqty' => '1',          // 1 for disable qty, 2 for enable qty
        'straightSaleMultiPrice' => 'yes',  // if yes, only then it take price from below
        'shop_option' => $optionPrices['product2'] ??array(
            'shop_option1' => array(
                'option_quantity' => '1',
                'option_price' => '4.99'
            ),
            'shop_option2' => array(
                'option_quantity' => '2',
                'option_price' => '7.99'
            ),
            'shop_option3' => array(
                'option_quantity' => '3',
                'option_price' => '11.99'
            ),
            'shop_option4' => array(
                'option_quantity' => '4',
                'option_price' => '13.99'
            )
        ),
        'enableMaxqty' => '1',               //1 for not display quantity increase/decrease button, any other number is the maximum qty customer can buy
        'sizeOption' => 'no',              //if yes then how size options in product page
        'size_option' => array(
            '0' => 'S',
            '1' => 'M',
            '2' => 'L',
            '3' => 'XL',
            '4' => '2XL',
            '5' => '3XL',
        ),
        'status' => 'active',               //active or inactive
    ),
    'product3' => array(
        'id' => '13',
        'stickyId' => 329,
        'name' => 'Bouquet Earrings',
        'description' => '
        Rose Flower Bouquet Earrings.
        <br><br>
        Color : Pink<br>
        Material: Ceramic,Clay, Porcelain<br />
        Weight : 40g<br>
        Size: 5X5X5 cm<br />
        ',
        'image' => 'products/Bouquet Earrings.png',
        'show_ingredients' => 'no',
        'ingredients_image' => 'ingredients/keto.jpg',
        'category' => 'Womens Accessories',
        'billingModel' => '1',              // 1=ss|2=trial|3=con|4=SS+trial|5=SS+con|6=trial+con|7= SS+trial+con
        'ssPrice' => '91.95',               //if ss
        'ssShipping' => '0.00',             //if ss
        'ssMaxqty' => '1',                  // 1 for disable qty, 2 for enable qty
        'trialPrice' => '0.00',             //if trial
        'trialShipping' => '5.45',          //if trial
        'trialRebillPrice' => '91.95',       //Rebill price - if trial(after 14 days)
        'trialMaxqty' => '1',               // 1 for disable qty, 2 for enable qty
        'continuityPrice' => '91.95',       //if continuity
        'continuityShipping' => '3.95',     //if continuity
        'continuityMaxqty' => '1',          // 1 for disable qty, 2 for enable qty
        'straightSaleMultiPrice' => 'yes',  // if yes, only then it take price from below
        'shop_option' => $optionPrices['product3'] ??array(
           'shop_option1' => array(
                'option_quantity' => '1',
                'option_price' => '5.99'
            ),
            'shop_option2' => array(
                'option_quantity' => '2',
                'option_price' => '10.99'
            ),
            'shop_option3' => array(
                'option_quantity' => '3',
                'option_price' => '13.99'
            ),
            'shop_option4' => array(
                'option_quantity' => '4',
                'option_price' => '15.99'
            )
        ),
        'enableMaxqty' => '1',               //1 for not display quantity increase/decrease button, any other number is the maximum qty customer can buy
        'sizeOption' => 'no',              //if yes then how size options in product page
        'size_option' => array(
            '0' => 'S',
            '1' => 'M',
            '2' => 'L',
            '3' => 'XL',
            '4' => '2XL',
            '5' => '3XL',
        ),
        'status' => 'active',               //active or inactive
    ),
    'product4' => array(
        'id' => '14',
        'stickyId' => 330,
        'name' => 'Rhinestone Crystal Necklace',
        'description' => '
        Long Tassel Rhinestone Crystal Necklace.
        <br><br>
        Material : Crystal, Rhinestone<br>
        Color : Silver<br>
        Weight : 65g<br>
        Size : 10X7X0.5 cm<br>
        ',
        'image' => 'products/Rhinestone Crystal Necklace.png',
        'show_ingredients' => 'no',
        'ingredients_image' => 'ingredients/keto.jpg',
        'category' => 'Womens Accessories',
        'billingModel' => '1',              // 1=ss|2=trial|3=con|4=SS+trial|5=SS+con|6=trial+con|7= SS+trial+con
        'ssPrice' => '91.95',               //if ss
        'ssShipping' => '0.00',             //if ss
        'ssMaxqty' => '1',                  // 1 for disable qty, 2 for enable qty
        'trialPrice' => '0.00',             //if trial
        'trialShipping' => '5.45',          //if trial
        'trialRebillPrice' => '91.95',       //Rebill price - if trial(after 14 days)
        'trialMaxqty' => '1',               // 1 for disable qty, 2 for enable qty
        'continuityPrice' => '91.95',       //if continuity
        'continuityShipping' => '3.95',     //if continuity
        'continuityMaxqty' => '1',          // 1 for disable qty, 2 for enable qty
        'straightSaleMultiPrice' => 'yes',  // if yes, only then it take price from below
        'shop_option' => $optionPrices['product4'] ??array(
            'shop_option1' => array(
                'option_quantity' => '1',
                'option_price' => '6.99'
            ),
            'shop_option2' => array(
                'option_quantity' => '2',
                'option_price' => '11.98'
            ),
            'shop_option3' => array(
                'option_quantity' => '3',
                'option_price' => '15.99'
            ),
        'shop_option4' => array(
            'option_quantity' => '4',
            'option_price' => '17.99'
        )
        ),
        'enableMaxqty' => '1',               //1 for not display quantity increase/decrease button, any other number is the maximum qty customer can buy
        'sizeOption' => 'no',              //if yes then how size options in product page
        'size_option' => array(
            '0' => 'S',
            '1' => 'M',
            '2' => 'L',
            '3' => 'XL',
            '4' => '2XL',
            '5' => '3XL',
        ),
        'status' => 'active',               //active or inactive
    ),
    'product5' => array(
        'id' => '15',
        'stickyId' => 330,
        'name' => 'Diamond Proposal Wedding Ring',
        'description' => '
        925 Sterling Silver Diamond Proposal Wedding Ring.
        <br><br>
        Material : 925 sterling silver<br>
        Color : Silver<br>
        Weight : 50g<br>
        Size : 6x6x6 cm<br>
        ',
        'image' => 'products/Diamond Proposal Wedding Ring.png',
        'show_ingredients' => 'no',
        'ingredients_image' => 'ingredients/keto.jpg',
        'category' => 'Womens Accessories',
        'billingModel' => '1',              // 1=ss|2=trial|3=con|4=SS+trial|5=SS+con|6=trial+con|7= SS+trial+con
        'ssPrice' => '91.95',               //if ss
        'ssShipping' => '0.00',             //if ss
        'ssMaxqty' => '1',                  // 1 for disable qty, 2 for enable qty
        'trialPrice' => '0.00',             //if trial
        'trialShipping' => '5.45',          //if trial
        'trialRebillPrice' => '91.95',       //Rebill price - if trial(after 14 days)
        'trialMaxqty' => '1',               // 1 for disable qty, 2 for enable qty
        'continuityPrice' => '91.95',       //if continuity
        'continuityShipping' => '3.95',     //if continuity
        'continuityMaxqty' => '1',          // 1 for disable qty, 2 for enable qty
        'straightSaleMultiPrice' => 'yes',  // if yes, only then it take price from below
        'shop_option' => $optionPrices['product5'] ??array(
            'shop_option1' => array(
                'option_quantity' => '1',
                'option_price' => '11.99'
            ),
            'shop_option2' => array(
                'option_quantity' => '2',
                'option_price' => '19.99'
            ),
            'shop_option3' => array(
                'option_quantity' => '3',
                'option_price' => '24.99'
            )
        ),
        'enableMaxqty' => '1',               //1 for not display quantity increase/decrease button, any other number is the maximum qty customer can buy
        'sizeOption' => 'no',              //if yes then how size options in product page
        'size_option' => array(
            '0' => 'S',
            '1' => 'M',
            '2' => 'L',
            '3' => 'XL',
            '4' => '2XL',
            '5' => '3XL',
        ),
        'status' => 'active',               //active or inactive
    ),
    'product6' => array(
        'id' => '16',
        'stickyId' => 330,
        'name' => 'Luxury Tassels Pearl Earring',
        'description' => '
        Luxury Celebrity Temperament Tassels Pearl Earring.
        <br><br>
        Color : White Pearl<br>
        Material: Zinc Alloy<br />
        Weight : 15g<br>
        Size : 7X7X1 cm<br>
        ',
        'image' => 'products/Luxury Tassels Pearl Earring.png',
        'show_ingredients' => 'no',
        'ingredients_image' => 'ingredients/keto.jpg',
        'category' => 'Womens Accessories',
        'billingModel' => '1',              // 1=ss|2=trial|3=con|4=SS+trial|5=SS+con|6=trial+con|7= SS+trial+con
        'ssPrice' => '91.95',               //if ss
        'ssShipping' => '0.00',             //if ss
        'ssMaxqty' => '1',                  // 1 for disable qty, 2 for enable qty
        'trialPrice' => '0.00',             //if trial
        'trialShipping' => '5.45',          //if trial
        'trialRebillPrice' => '91.95',       //Rebill price - if trial(after 14 days)
        'trialMaxqty' => '1',               // 1 for disable qty, 2 for enable qty
        'continuityPrice' => '91.95',       //if continuity
        'continuityShipping' => '3.95',     //if continuity
        'continuityMaxqty' => '1',          // 1 for disable qty, 2 for enable qty
        'straightSaleMultiPrice' => 'yes',  // if yes, only then it take price from below
        'shop_option' =>  $optionPrices['product6'] ??array(
            'shop_option1' => array(
                'option_quantity' => '1',
                'option_price' => '24.99'
            ),
            'shop_option2' => array(
                'option_quantity' => '2',
                'option_price' => '39.99'
            ),
            'shop_option3' => array(
                'option_quantity' => '3',
                'option_price' => '49.99'
            )
        ),
        'enableMaxqty' => '1',               //1 for not display quantity increase/decrease button, any other number is the maximum qty customer can buy
        'sizeOption' => 'no',              //if yes then how size options in product page
        'size_option' => array(
            '0' => 'S',
            '1' => 'M',
            '2' => 'L',
            '3' => 'XL',
            '4' => '2XL',
            '5' => '3XL',
        ),
        'status' => 'active',               //active or inactive
    ),
    'product7' => array(
        'id' => '17',
        'stickyId' => 330,
        'name' => 'Infinity Charm Bracelet',
        'description' => '
        Women Adjustable Infinity Charm Bracelet.
        <br><br>
        Color : Gold<br>
        Material: Crystal, Rhinestone<br />
        Weight : 10g<br>
        Size : 2X3X5 cm<br>
        ',
        'image' => 'products/Infinity Charm Bracelet.png',
        'show_ingredients' => 'no',
        'ingredients_image' => 'ingredients/keto.jpg',
        'category' => 'Womens Accessories',
        'billingModel' => '1',              // 1=ss|2=trial|3=con|4=SS+trial|5=SS+con|6=trial+con|7= SS+trial+con
        'ssPrice' => '91.95',               //if ss
        'ssShipping' => '0.00',             //if ss
        'ssMaxqty' => '1',                  // 1 for disable qty, 2 for enable qty
        'trialPrice' => '0.00',             //if trial
        'trialShipping' => '5.45',          //if trial
        'trialRebillPrice' => '91.95',       //Rebill price - if trial(after 14 days)
        'trialMaxqty' => '1',               // 1 for disable qty, 2 for enable qty
        'continuityPrice' => '91.95',       //if continuity
        'continuityShipping' => '3.95',     //if continuity
        'continuityMaxqty' => '1',          // 1 for disable qty, 2 for enable qty
        'straightSaleMultiPrice' => 'yes',  // if yes, only then it take price from below
        'shop_option' => $optionPrices['product7'] ??array(
            'shop_option1' => array(
                'option_quantity' => '1',
                'option_price' => '34.99'
            ),
            'shop_option2' => array(
                'option_quantity' => '2',
                'option_price' => '49.99'
            ),
            'shop_option3' => array(
                'option_quantity' => '3',
                'option_price' => '66.97'
            )
        ),
        'enableMaxqty' => '1',               //1 for not display quantity increase/decrease button, any other number is the maximum qty customer can buy
        'sizeOption' => 'no',              //if yes then how size options in product page
        'size_option' => array(
            '0' => 'S',
            '1' => 'M',
            '2' => 'L',
            '3' => 'XL',
            '4' => '2XL',
            '5' => '3XL',
        ),
        'status' => 'active',               //active or inactive
    ),
    'product8' => array(
        'id' => '18',
        'stickyId' => 329,
        'name' => 'Diamond Gold Engagement Ring',
        'description' => '
        Diamond Gold Engagement Ring.
        <br><br>
        Color: Gold<br />
        Material: Copper Alloy<br />
        Weight : 12g<br>
        Size : 4X6X5 cm<br>
        ',
        'image' => 'products/Diamond Gold Engagement Ring.png',
        'show_ingredients' => 'no',
        'ingredients_image' => 'ingredients/keto.jpg',
        'category' => 'Womens Accessories',
        'billingModel' => '1',              // 1=ss|2=trial|3=con|4=SS+trial|5=SS+con|6=trial+con|7= SS+trial+con
        'ssPrice' => '91.95',               //if ss
        'ssShipping' => '0.00',             //if ss
        'ssMaxqty' => '1',                  // 1 for disable qty, 2 for enable qty
        'trialPrice' => '0.00',             //if trial
        'trialShipping' => '5.45',          //if trial
        'trialRebillPrice' => '91.95',       //Rebill price - if trial(after 14 days)
        'trialMaxqty' => '1',               // 1 for disable qty, 2 for enable qty
        'continuityPrice' => '91.95',       //if continuity
        'continuityShipping' => '3.95',     //if continuity
        'continuityMaxqty' => '1',          // 1 for disable qty, 2 for enable qty
        'straightSaleMultiPrice' => 'yes',  // if yes, only then it take price from below
        'shop_option' =>  $optionPrices['product8'] ??array(
            'shop_option1' => array(
                'option_quantity' => '1',
                'option_price' => '39.99'
            ),
            'shop_option2' => array(
                'option_quantity' => '3',
                'option_price' => '66.97'
            ),
            'shop_option3' => array(
                'option_quantity' => '4',
                'option_price' => '71.97'
            )
        ),
        'enableMaxqty' => '1',               //1 for not display quantity increase/decrease button, any other number is the maximum qty customer can buy
        'sizeOption' => 'no',              //if yes then how size options in product page
        'size_option' => array(
            '0' => 'S',
            '1' => 'M',
            '2' => 'L',
            '3' => 'XL',
            '4' => '2XL',
            '5' => '3XL',
        ),
        'status' => 'active',               //active or inactive
    )        
);

//Website Information
$generalConfig =  array(
    'brand_name' => 'Authentic Womens Accessories Store',
    'website_url' => 'AuthenticWomensAccessoriesStore.com',
    'email' => 'support@AuthenticWomensAccessoriesStore.com',
    'descriptor' => 'AuthenticWomensAccesso',
    'corp_name' => 'Harsun Media Visions Inc',
    'phone_number' => '1-844-212-4991',
    'address' => '5665 W Wilshire Blvd #1641, Los Angeles, CA 90036, USA',
    'fulfillment' => '',
    'return_address' => '10802 Capital Ave Unit 6A, Garden Grove, CA, 92843, USA',

    'trial_period' => '14',
    'trial_period_breakdown' => '',
    'shipping_period' => '3-5',
    'shipping_carrier' => 'USPS',
    'customer_service_hours' => '5:00 am - 5:00 pm PST Monday through Sunday',
    'add_stylesheet' => '',
    'maximum_ticket_value' => '500',
    'naming_convention' => array(       //this is the billing model name 
        '1' => 'One Time Sale',              //this is for SS
        '2' => 'Trial',            //this is for trial
        '3' => 'Continuity'        //this is for continuity
    ),
    'product_count' => count($products), //total products count
);

//Website Content
$updateContent = array(
    'slogan'        => Info::$slogan[4],            // choose 1-70   
    'tagline'       => Info::$tagline[25],           // choose 1-70
    'aboutUsTitle'  => Info::$aboutUsTitle[34],      // choose 1-40
    'aboutUs'       => Info::$aboutUs[63],           // choose 1-70
    'shopTitle'     => Info::$shopTitle[11],         // choose 1-40
    'buttonName'    => Info::$buttonName[5],        // choose 1-40
    'popularTitle'  => Info::$popularTitle[33],      // choose 1-40
    'contactTitle'  => Info::$contactTitle[21],      // choose 1-40
    'contactContent'  => Info::$contactContent[66]   // choose 1-70
);

//Website Theme
$pageConfig =  array(
    'header_template' => 5,             // choose 1-30
    'hero_section' => 9,                // choose 1-30
    'product_section' => 30,            // choose 1-30
    'about_section' => 3,               // choose 1-12
    'contact_section' => 9,             // choose 1-10
    'popularProducts_section' => 1,     // choose 1-13
    'cta_section' => 0,                 // choose 1-2
    'features_section' => 7,            // choose 1-9
    'footer_template' => 23,             // choose 1-30

    'product_page' => 1,                // choose 1-2
    'contact_page' => 3,                // choose 1-10
    'cart_page' => 10,                   // choose 1-10
    'checkout_page' => 8,               // choose 1-10

    'relatedProducts_section' => 1,      // choose 1
    // If you want to hide any section select 0

    'indexSectionsOrder' => [ //just order the lines like you want it to be ordered
        'aboutSection',
        'productSection',
        'contactSection',
        'popularProductsection',
        'ctaSection',
        'featuresSection',
    ],

    'font' => 12, // 1-Open Sans ; 2-Alegreya ; 3-Poppins ; 4-Roboto ; 5-Montserrat ; 6-Lato ; 7-Oswald ; 8-Raleway ; 
    // 9-Mulish ; 10-Nunito ; 11-Assistant ; 12-Barlow ; 13-Rubik ; 14-Work Sans ; 15-Mukta

    // CSS Colors for theme using HEX or rgba (Can also write Transparent, white, red or basic colors)
    'primary_color' => '#4FC0D0',      //Accent Color on most elements like buttons bottom header
    'primary_text_color' => '#fff',    //Text to be used on Primary background color
    'secondary_color' => '#4FC0D0',    //Elements which dont have primary color will use this
    'secondary_text_color' => '#fff',  //Text to be used on secondary background color
    // Header Colors
    'topbar_bg_color' => '#4b3f8330',
    'topbar_text_color' => '#222',
    'header_bg_color' => '#fff',
    'header_text_color' => '#222',
    'header_icon_color' => '#4b3f83',
    // Banner and Button Colors
    'banner_overly_color' => 'rgb(0 0 0 / 20%)',
    'banner_text_color' => '#fff',
    'button_bg_color' => '#4FC0D0',
    'button_text_color' => '#fff',
    'button_bg_color_hover' => '#000',
    'button_text_color_hover' => '#fff',
    // Footer Colors
    'footer_bg_color' => '#4FC0D0',
    'footer_text_color' => '#fff',

    'displayCategory' => 'no', //this toggles the category on the index and product page

    'displayBillingModel' => 'yes', //this show/hide the billing model on entire site

    'displayShippingPrice' => 'yes', //this show/hide the shipping price on entire site

    'displayRelatedProducts' => 'yes', //this toggles the related products on the product page

    'onlyShowFirstPrice' => 'no', //this only applies when the multi price is enabled. if set to 'yes' it will only show the first price from the array for the product on the index and shop page

    'creditCardIcons' => 1, // Icons set Pick between 1 - 4

    'loadingGif' => 10, // Preloader Animation sitewide. Select from 1 - 10

    'sortProducts' => 5, //1 - alphabetical, 2 - reverse alphabetical, 3 - lowest to highest price, 4 - highest to lowest price, 5 - first to last product array, 6 - last to first product, 7 - shortest product name to longest product name, 8 - longest product name to shortest product name

    'showNavigationCart' => 'yes', //yes displays it, no hides it

    'showBillingColumnCheckoutPage' => 'no', //yes displays it, no hides it

    'popularProducts' => [ //this toggles the popular products on the landing page
        'displaypopularProducts' => 'yes',
        'popularProducts' => 3
    ],

    'oneProductCartLimit' => 'no', //this limits one product in the shopping cart

    'shippingOption' => array(
        'enableShippingOption' => 'no', //enables shipping option to checkout page and add description to terms page
        'shippingOptionName' => 'Shipping Insurance', //name that will be displayed in the checkout and terms page
        'shippingOptionPrice' => '1.00',   //price of the shipping option
    ),



    //Terms 
    'checkoutPage' => array(
        'require_generic_text_terms' => 'yes',   //if set to no, then disable checkout page product terms checkboxes
        'require_product_terms' => 'yes',   //if set to no, then disable checkout page product terms checkboxes
        'require_total_price_terms' => 'no'   //if set to no, then disable checkout page product terms checkboxes
    )
);

//Credit Card 

$card_type = array(
    'visa' => 'yes', //yes or no
    'discover' => 'yes', //yes or no 
    'master' => 'yes', //yes or no
);

//CRM settings
$CRM = [
    'url'                       => 'https://dcconsulting.sticky.io/api/v1/new_order',
    'username'                  => 'dc_consulting_bp',
    'password'                  => '6XYJvHVXUepd',
    'shippingId'                => 3,
    'campaignId'                => 262,
    'tranType'                  => 'Sale',
    'offerId'                   => 25,
    'billingModelId'            => 2,
    'gatewayId'                 => 959,

    //'shippingInsurancePrice'    => 1.00,
    //'shippingInsuranceProductId'=> 123
];

// all ajax and other css,images/js file path moved on this file => design_and_ajax.php
require 'design_and_ajax.php';