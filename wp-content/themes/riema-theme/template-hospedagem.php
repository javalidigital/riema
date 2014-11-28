 <?php
/*
Template Name: Hospedagem
*/

get_header(); ?>
	<div id="primary" class="content-area">
		<div class="breadcrumb">
			<span class="breadcrumb-text">Voc&ecirc; est&aacute; em:</span>
			<?php if(function_exists('bcn_display')) { bcn_display(); }?>
		</div>
		<div class="site-sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-hospedagem' ); ?>
		</div>
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>