<?php 

/**
 * Plugin Name:       Custom WP posts call to action blocks
 * Plugin URI:        https://xevos.eu/
 * Description:       Custom call to actions product block in WP POSTS.
 * Version:           1.0
 * Author URI:        https://xevos.eu/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       news-calltoaction
 */

defined( 'ABSPATH' ) or die( 'No authorized access!' );

add_action( 'acf/init', 'wpposts_calltoaction_block', 9 );
add_action( 'acf/init', 'wpposts_calltoaction_block_settings', 10);

function wpposts_calltoaction_block() {

    // Check function exists.
    if( function_exists( 'acf_register_block_type' ) ) {

        // register a Call to action blocks - Category.
        acf_register_block_type( array(
            'name'              => 'wppostcategory',
            'title'             => __('Call to action - Category'),
            'description'       => __(''),
            'render_template'   => plugin_dir_path( __FILE__ ) .'template-parts/news-category.php',
            'category'          => 'text',
            'icon'              => 'format-gallery',
            'keywords'          => array( 'Product', 'Category', 'Xevos' ),
            'enqueue_assets'    => function() {
                wp_enqueue_style( 'travel-it-block', plugin_dir_url( __FILE__ ) . 'assets/css/style.css', '', filemtime(plugin_dir_url(__FILE__) . 'assets/css/style.css'), 'all' );
            }            
        ) );

        // register a Call to action block - Product.
        acf_register_block_type( array(
            'name'              => 'wppostproducts',
            'title'             => __('Call to action - Product'),
            'description'       => __(''),
            'render_template'   => plugin_dir_path( __FILE__ ) .'template-parts/news-products.php',
            'category'          => 'text',
            'icon'              => 'format-gallery',
            'keywords'          => array( 'Product', 'Category', 'Xevos' ),
            'enqueue_assets'    => function() {
                wp_enqueue_style( 'travel-it-block', plugin_dir_url( __FILE__ ) . 'assets/css/style.css', '', filemtime(plugin_dir_url(__FILE__) . 'assets/css/style.css'), 'all' );
            }            
        ) );
    }
}

// Default ACF PRO plugin settings (export from admin)
function wpposts_calltoaction_block_settings() {

    if (function_exists('acf_add_local_field_group')) :

        acf_add_local_field_group(array(
            'key' => 'group_634d0f733fb0f',
            'title' => 'WPPost - Call to Category',
            'fields' => array(
                array(
                    'key' => 'field_634d0f844b4d0',
                    'label' => 'Název',
                    'name' => 'wppost_category_name',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 'Kategorie',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_634d0fab4b4d1',
                    'label' => 'Krátký text',
                    'name' => 'wppost_category_text',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 'Nakupte více v kategorii',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_634d0fbf4b4d2',
                    'label' => 'Odkaz',
                    'name' => 'wppost_category_link',
                    'type' => 'link',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'array',
                ),
                array(
                    'key' => 'field_634d0fda4b4d3',
                    'label' => 'Obrázek pozadí',
                    'name' => 'wppost_category_background',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/wppostcategory',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => 0,
        ));

        acf_add_local_field_group(array(
            'key' => 'group_634d2ef63b929',
            'title' => 'WPPost – Call to Products',
            'fields' => array(
                array(
                    'key' => 'field_634d32e52714f',
                    'label' => 'Typ zobrazení',
                    'name' => 'wpposts_view',
                    'type' => 'radio',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'horizontal' => 'Horizontal',
                        'vertical' => 'Vertical',
                    ),
                    'allow_null' => 0,
                    'other_choice' => 0,
                    'default_value' => 'horizontal',
                    'layout' => 'horizontal',
                    'return_format' => 'value',
                    'save_other_choice' => 0,
                ),
                array(
                    'key' => 'field_634d3b9327150',
                    'label' => 'Products',
                    'name' => 'wpposts_products',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'collapsed' => '',
                    'min' => 0,
                    'max' => 0,
                    'layout' => 'table',
                    'button_label' => 'Přidat produkt',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_634d3bb827151',
                            'label' => 'P/N',
                            'name' => 'wpposts_products_pn',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 1,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/wppostproducts',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => 0,
        ));

    endif;		
}

?>