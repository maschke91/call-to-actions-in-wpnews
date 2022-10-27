<?php

// WPPosts Call to action Block Category Template.

// Create id attribute allowing for custom "anchor" value.
$id = 'wppost-category' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'wppost-category';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title            = get_field( 'wppost_category_name' );
$description      = get_field( 'wppost_category_text' );
$link      		  = get_field( 'wppost_category_link' );
$image            = get_field( 'wppost_category_background' );
$size 			  = 'full'; // (thumbnail, medium, large, full or custom size)

?>


<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="wppost-category-content">
		<span class="h2"><?php echo $title ?></span>
		<p><?php echo $description ?></p>
		<?php if ($link) { ?>
		<a href="<?php echo $link['url'] ?>" title="<?php echo $link['title'] ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title'] ?></a>
		<?php } // if link ?>
	</div>
	<?php if ($image) { ?>
	<style type="text/css">
        #<?php echo $id; ?> {
            background-image: url("<?php echo $image['url']; ?>");
        }
    </style>
	<?php } // if image ?>
</div>

