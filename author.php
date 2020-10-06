<?php
/**
 * The template for displaying an author's postss
 *
 * @package Brass Tacks
 */

get_header();
?>

	<main role="main">
		<!-- section -->
		<section>

		<?php
		if ( have_posts() ) :
			the_post();
			?>

			<h1>
			<?php
			esc_html_e( 'Author Archives for ', 'bt' );
			echo get_the_author();
			?>
			</h1>

			<?php if ( get_the_author_meta( 'description' ) ) : ?>

				<?php echo get_avatar( get_the_author_meta( 'useresc_html_email' ) ); ?>

			<h2>
				<?php
				esc_html_e( 'About ', 'bt' );
				echo get_the_author();
				?>
			</h2>

		<?php endif; ?>

			<?php
			rewind_posts();
			while ( have_posts() ) :
				the_post();
				?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<!-- post thumbnail -->
				<?php if ( has_post_thumbnail() ) : // Check if Thumbnail exists. ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail( array( 120, 120 ) ); // Declare pixel size you need inside the array. ?>
					</a>
				<?php endif; ?>
				<!-- /post thumbnail -->

				<!-- post title -->
				<h2>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h2>
				<!-- /Post title -->

				<!-- post details -->
				<span class="date">
					<time datetime="<?php the_time( 'Y-m-d' ); ?> <?php the_time( 'H:i' ); ?>">
						<?php the_date(); ?> <?php the_time(); ?>
					</time>
				</span>
				<span class="author"><?php esc_html_e( 'Published by', 'bt' ); ?> <?php the_author_posts_link(); ?></span>
				<span class="comments"><?php comments_popup_link( __( 'Leave your thoughts', 'bt' ), __( '1 Comment', 'bt' ), __( '% Comments', 'bt' ) ); ?></span>
				<!-- /post details -->

				<?php btesc_html_excerpt( 'bt_index' ); // Build your custom callback length in functions.php. ?>

				<br class="clear">

				<?php edit_post_link(); ?>

			</article>
			<!-- /article -->

					<?php endwhile; ?>

		<?php else : ?>

			<!-- article -->
			<article>

				<h2><?php esc_html_e( 'Sorry, nothing to display.', 'bt' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

			<?php get_template_part( 'pagination' ); ?>

		</section>
		<!-- /section -->
	</main>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
