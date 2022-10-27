<?php

// WPPosts Call to action Block Products Template.

// Create id attribute allowing for custom "anchor" value.
$id = 'wppost-products' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'wppost-products';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$productView = get_field('wpposts_view');
$wpposts_products = get_field('wpposts_products');

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo $productView; ?>">
    <?php
    if ($wpposts_products) {

        // Check rows existexists.
        if (have_rows('wpposts_products')) :

            // Loop through rows.
            while (have_rows('wpposts_products')) : the_row();

                // Load sub field value.
                global $product;
                $productPn = get_sub_field('wpposts_products_pn');
                $productId = wc_get_product_id_by_sku($productPn);
                $product = wc_get_product($productId);
                $productTitle = $product->get_title();
                $altText = htmlspecialchars($productTitle, ENT_QUOTES);
                $productShortDescription = $product->get_short_description();
                $productShortDescription = (strlen($productShortDescription) > 200) ? substr($productShortDescription, 0, 200) . '...' : $productShortDescription;
                $productPrice = $product->get_price();
                $productPrice = wc_price($productPrice);
                $productLink = get_permalink($productId);
                $imageSrc = get_post_meta($productId, 'agregator_product_main_image', true);
    ?>

                <div class="wpposts_product-item">
                    <div class="wpposts_product-image">
                        <img loading="lazy" src="<?php echo $imageSrc ?>" alt="<?php echo $altText ?>" />
                    </div>
                    <div class="wpposts_product-text">
                        <h2><?php echo $productTitle ?></h2>

                        <?php if($productShortDescription) { ?>
                        <div class="wpposts_product-description">
                            <?php echo $productShortDescription ?>
                        </div>
                        <?php } ?>

                        <div class="wpposts_product-price"><?php echo $productPrice ?></div>

                        <a href="<?php echo $productLink ?>" title="<?php echo $altText ?>">Vybrat si</a>
                    </div>
                </div>

    <?php
            // End loop.
            endwhile;
        endif;
    }
    ?>
</div>