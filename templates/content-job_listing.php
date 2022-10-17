<?php
/**
 * Job listing in the loop.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @since       1.0.0
 * @version     1.34.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;
?>




<li <?php job_listing_class(); ?> data-longitude="<?php echo esc_attr( $post->geolocation_long ); ?>" data-latitude="<?php echo esc_attr( $post->geolocation_lat ); ?>">
	<a href="<?php the_job_permalink(); ?>">
		<?php the_company_logo(); ?>
		<div class="position">
			<h3><?php wpjm_the_job_title(); ?></h3>
				<div class="locationset">
			<?php the_job_location( false ); ?>
		</div>
		</div>
		<div class="requirementheading">
			<?php echo "Requirements"; ?>
		</div>
		<div class="requirementdesc">
			<?php echo htmlspecialchars(wpjm_the_job_description());   ?>
		</div>
		<ul class="meta">
			<?php do_action( 'job_listing_meta_start' ); ?>

			<?php if ( get_option( 'job_manager_enable_types' ) ) { ?>
				<?php $types = wpjm_get_the_job_types(); ?>
				<?php if ( ! empty( $types ) ) : foreach ( $types as $type ) : ?>
					
					<button type="hidden" class="job-teeype" value="">Apply</button>
					<button class="job-type" value=""></button>

				<?php endforeach; endif; ?>
			<?php } ?>

			<li class="date"><?php the_job_publish_date(); ?></li>

			<?php do_action( 'job_listing_meta_end' ); ?>
		</ul>
	</a>
</li>
