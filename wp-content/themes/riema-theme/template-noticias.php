 <?php
/*
Template Name: Notícias
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
			<header class="entry-header">
				<h1 class="entry-title">Not&iacute;cias</h1>
			</header>
			<?php 			
			$args = array(								
				'category_name' => 'noticias',
				'paged' => get_query_var('paged')
			);
			// the query
			$the_query = new WP_Query( $args ); ?>


			<?php if ( $the_query->have_posts() ) : ?>

				<!-- the loop -->
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
				<!-- end of the loop -->

				<!-- pagination here -->
				<?php wp_pagenavi( array( 'query' => $the_query ) ); ?>


				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>