<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Riema Theme
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<div class="breadcrumb">
			<span class="breadcrumb-text">Voc&ecirc; est&aacute; em:</span>
			<?php if(function_exists('bcn_display')) { bcn_display(); }?>
		</div>
		<div class="site-sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-grupo' ); ?>
		</div>
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
		
			<header class="entry-header">
				<h1 class="entry-title"><?php the_archive_title(); ?></h1>
			</header>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<div class="post-item clear">
					<div class="post-item-image">														
						<a href="<?php echo wp_get_shortlink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail('thumbnail'); ?>
						</a>									
					</div>
					<div class="post-item-content">
						<div class="post-item-date">
							<?php the_time('l\, j \d\e F \d\e Y'); ?>
						</div>
						<h2 class="post-item-title">
							<a href="<?php echo wp_get_shortlink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</h2>
						<div class="post-item-excerpt">
							<?php global $more; $more = 0; the_content('Leia mais'); ?>
						</div>
					</div>
				</div>				

			<?php endwhile; ?>
			<?php wp_pagenavi(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>