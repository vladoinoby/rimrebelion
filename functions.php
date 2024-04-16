<?php
define("RIMREBELLION_CHILD", get_stylesheet_directory());
define("RIMREBELLION_CHILD_URI", get_stylesheet_directory_uri());
require_once RIMREBELLION_CHILD . "/inc/product-taxonomies.php";
require_once RIMREBELLION_CHILD . "/inc/product-tabs.php";

add_action("inoby_before_footer", "footer_newsletter");
function footer_newsletter() {
    if (!is_checkout() && !is_cart()) {
        rwmb_meta_render_block("newsletter", [
            "newsletter_popup_check" => 0,
        ]);
    }
}

if (RC_ENABLED) {
    function rimrebelion_checkout_settings($settings) {
        $settings["wrp_classes"] = "rimrebelion-checkout-wrp container";
        $settings["tabs_classes"] = "tabs-column";
        $settings["step_classes"] = "col-8 col-lg-12 checkout-left-column";
        $settings["totals_classes"] = "col-4 col-lg-12 checkout-right-column";
        $settings["cross_sell_classes"] = "col-12 col-lg-12 cart-cross-sell-wrp";
        return $settings;
    }

    add_filter("rimrebelion_checkout_settings", "rimrebelion_checkout_settings");
}

add_filter("woocommerce_catalog_orderby", "rimrebellion_change_sorting_options_order", 5);
function rimrebellion_change_sorting_options_order($options) {
    $options = [
        "rating" => __("Najlepšie hodnotené", "rimrebellion"),
        "popularity" => __("Najpredávanejšie", "rimrebellion"),
        "price" => __("Najnižšia cena", "rimrebellion"),
        "price-desc" => __("Najvyššia cena", "rimrebellion"),
    ];
    return $options;
}

/**
 * @snippet WooCommerce Disable Default CSS
 */
add_filter("woocommerce_enqueue_styles", "__return_empty_array");