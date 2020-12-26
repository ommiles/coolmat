<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coolmat
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php query_posts('posts_per_page=1&category_name=menu&orderby=rand'); ?>
	<?php if ( have_posts()) : while ( have_posts()) : the_post(); ?>
		<div class="hero site">
			<body <?php body_class(); ?>>
			<?php wp_body_open(); ?>
			<div id="page" class="">
				<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'coolmat' ); ?></a>

				<header id="masthead" class="site-header">
					<div class="header-inner container">
						<div class="site-branding">
							<img src="<?php bloginfo( 'template_url' ); ?>/assets/coolmat_logo.svg" alt="" class="logo">
						</div><!-- .site-branding -->
						<nav id="site-navigation" class="main-navigation">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
						</nav><!-- #site-navigation -->

						<div class="language-select">
							<a lang="ko-KR" hreflang="ko-KR" href="<?php echo site_url('/ko'); ?>">KR</a> | <a lang="en-US" hreflang="en-US" href="<?php echo site_url(); ?>">EN</a>

						</div>
					</div>
				</header><!-- #masthead -->
				<h1 class="hero-text container lowercase">
					<span class="hero-sitename"><?php bloginfo( 'name' ); ?></span> <?php the_title(); ?>
				</h1>
				<p class="hero-description container lowercase">
					<span class="magenta"><?php bloginfo( 'name' ); ?></span> <?php bloginfo('description') ?>.
				</p>
			</div>
			<?php 
			endwhile;
			endif;
		?>
		</div>
		<?php query_posts('posts_per_page=1&post_type=intro'); ?>
		<?php if ( have_posts()) : while ( have_posts()) : the_post(); ?>
			<div class="intro" id="intro">
				<div class="intro-inner">
					<h2 class="intro-title"><?php the_title(); ?></h2>
					<div class="intro-description">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		<?php 
			endwhile;
			endif;
		?>
		<div class="section-title" id="food">
			<?php get_category_description('category_name=menu'); ?>
		</div>
		<div class="grid">
			<?php
			query_posts('posts_per_page=20&category_name=menu');
			if ( have_posts() ) :
				$item_number = 1;
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() );
					$item_number++;
				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		</div>
		<div>
			<div class="section-title" id="directions">
				<?php get_category_description('post_type=location'); ?>
			</div>
			<?php query_posts('post_type=location'); ?>
			<?php if ( have_posts()) : while ( have_posts()) : the_post(); ?>
			<div class="grid">
				<div class="map">
					<div class="map-inner">
					<?php if( get_field('map') ): ?>
						<h2><?php the_field('map'); ?></h2>
					<?php endif; ?>
					</div>
				</div>
				<div class="directions-item">
					<?php the_content(); ?>
				</div>
			</div>
			<?php 
				endwhile;
				endif;
			?>
		</div>
	</main><!-- #main -->

<?php
get_footer();
