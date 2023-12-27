<?php 
error_reporting(0);
$configFilePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'site-info.php';
if (file_exists($configFilePath )) {
   require_once $configFilePath;
}else{
echo 'General configuration error';
}
?>

<style>
    :root {
        --primary: <?= $pageConfig['primary_color'] ?>;
        --secondary: <?= $pageConfig['secondary_color'] ?>;
        --primary_text_color: <?= $pageConfig['primary_text_color'] ?>;
        --secondary_text_color: <?= $pageConfig['secondary_text_color'] ?>;
    }
    .topbar-background-color {
        background-color: <?= $pageConfig['topbar_bg_color'] ?> !important;
    }
    .topbar-text-color {
        color: <?= $pageConfig['topbar_text_color'] ?> !important;
    }
    .nav-color {
        background-color: <?= $pageConfig['header_bg_color'] ?> !important;
    }
    .nav-text-color {
        color: <?= $pageConfig['header_text_color'] ?> !important;
    }
    .nav-icon-color {
        color: <?= $pageConfig['header_icon_color'] ?> !important;
    }
    .overlay-background:before {
        background-color: <?= $pageConfig['banner_overly_color'] ?> !important;
    }
    .slide1-overly::before {
        background-color: <?= $pageConfig['banner_overly_color'] ?> !important;
    }
    .slide2-overly::before {
        background-color: <?= $pageConfig['banner_overly_color'] ?> !important;
    }
    .banner-slogan-color {
        color: <?= $pageConfig['banner_text_color'] ?> !important;
    }
    .banner-heading-color {
        color: <?= $pageConfig['banner_text_color'] ?> !important;
    }
    .banner-tagline-color {
        color: <?= $pageConfig['banner_text_color'] ?> !important;
    }
    .banner-btn-color {
        background-color: <?= $pageConfig['button_bg_color'] ?> !important;
        color: <?= $pageConfig['button_text_color'] ?> !important;
        border: 2px solid <?= $pageConfig['button_bg_color'] ?> !important;
    }
    .banner-btn-color:hover {
        background-color: <?= $pageConfig['button_bg_color_hover'] ?> !important;
        color: <?= $pageConfig['button_text_color_hover'] ?> !important;
        border: 2px solid <?= $pageConfig['button_bg_color_hover'] ?> !important;
    }
    .footer-background-color {
        background-color: <?= $pageConfig['footer_bg_color'] ?> !important;
        color: <?= $pageConfig['footer_text_color'] ?> !important;
    }
    .footer-background-color a {
        color: <?= $pageConfig['footer_text_color'] ?> !important;
    }

    /* Variables CSS Classes */
    .primary_color {
        background-color: <?= $pageConfig['primary_color'] ?> !important;
    }
    .secondary_color {
        background-color: <?= $pageConfig['secondary_color'] ?> !important;
    }
    .primary_text_color {
        color: <?= $pageConfig['primary_text_color'] ?> !important;
    }
    .secondary_text_color {
        color: <?= $pageConfig['secondary_text_color'] ?> !important;
    }

    /* Slider Button Colors Adjust */
    .slide1 .btn1 {
        background-color: <?= $pageConfig['button_bg_color'] ?> !important;
        border-color: <?= $pageConfig['button_bg_color'] ?> !important;
    }
    .slide1 .btn1:hover {
        background-color: <?= $pageConfig['button_bg_color_hover'] ?> !important;
        border-color: <?= $pageConfig['button_bg_color_hover'] ?> !important;
    }
    .slide1 .btn2 {
        background-color: transparent !important;
        border-color: #fff !important;
    }
    .slide1 .btn2:hover {
        background-color: var(--primary) !important;
        border-color: #fff !important;
    }
    .slide2 .btn1 {
        background-color: var(--primary) !important;
        border-color: var(--primary) !important;
    }
    .slide2 .btn1:hover {
        background-color: <?= $pageConfig['button_bg_color'] ?> !important;
        border-color: <?= $pageConfig['button_bg_color'] ?> !important;
    }
    .slide2 .btn2 {
        background-color: transparent !important;
        border-color: #fff !important;
    }
    .slide2 .btn2:hover {
        background-color: var(--secondary) !important;
        border-color: #fff !important;
    }
    .banner-section10 .btn-group a {
        color: <?= $pageConfig['button_text_color'] ?>;
    }

    /* Shop Buttons */
    .product-block .shop-btn-color{
        background-color: <?= $pageConfig['button_bg_color'] ?> !important;
        border-color: <?= $pageConfig['button_bg_color'] ?> !important;
        color: <?= $pageConfig['button_text_color'] ?> !important;
    }
    .product-block .shop-btn-color:hover{
        background-color: <?= $pageConfig['button_bg_color_hover'] ?> !important;
        border-color: <?= $pageConfig['button_bg_color_hover'] ?> !important;
        color: <?= $pageConfig['button_text_color_hover'] ?> !important;
    }
    .shop-btn-color{
        background-color: var(--primary) !important;
        border-color: var(--primary) !important;
        color: var(--primary_text_color) !important;
    }
    .shop-btn-color:hover{
        background-color: var(--secondary) !important;
        border-color: var(--secondary) !important;
        color: var(--secondary_text_color) !important;
    }
    .pdt-section6 .bottom-btn i{
        color: <?= $pageConfig['button_bg_color'] ?> !important;
    }
    .pdt-section6 .bottom-btn:hover i{
        background-color: <?= $pageConfig['button_bg_color'] ?> !important;
        color: <?= $pageConfig['button_text_color'] ?> !important;
    }
    .pdt-section6 .bottom-btn a{
        color: <?= $pageConfig['button_bg_color'] ?> !important
    }
</style>
