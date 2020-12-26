<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coolmat
 */
global $item_number;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<!-- 1. Title on the left -->
	<h1 class="entry-title">
		<?php 
		the_title();
		?>
	</h1>
	<div class="entry-number">
		<?php echo $item_number; ?>
	</div>
	<!-- 2. Price on the right -->
	<div class="entry-price">
		<?php 
		the_content();
		?>
	</div>
	</header><!-- .entry-header -->

	<?php coolmat_post_thumbnail(); ?>

<!-- .entry-content -->

<!-- .entry-footer can be re-added here -->

</article><!-- #post-<?php the_ID(); ?> -->
