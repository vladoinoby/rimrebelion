<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://woocommerce.com/document/template-structure/
 * @package    WooCommerce\Templates
 * @version    1.6.4
 */
$product = $args['product'] ?? null;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
} ?>

<h1 class="product_title entry-title notranslate"><?php 
            if(function_exists('icl_object_id')){
                $original_ID = icl_object_id( $product->get_id(), 'product', false, 'en' );

                echo get_the_title( $original_ID );}
                else{
                    echo get_the_title($product->get_id());
                }
            ?></h1>