<?php wp_enqueue_script( 'listings-ajax-filters' ); ?>

<?php do_action( 'listings_jobs_job_filters_before', $atts ); ?>

<form class="job_filters">
	<?php do_action( 'listings_jobs_job_filters_start', $atts ); ?>

	<div class="search_jobs">
		<?php do_action( 'listings_jobs_job_filters_search_jobs_start', $atts ); ?>

		<div class="search_keywords">
			<label for="search_keywords"><?php _e( 'Keywords', 'listings-jobs' ); ?></label>
			<input type="text" name="search_keywords" id="search_keywords" placeholder="<?php esc_attr_e( 'Keywords', 'listings-jobs' ); ?>" value="<?php echo esc_attr( $keywords ); ?>" />
		</div>

		<div class="search_location">
			<label for="search_location"><?php _e( 'Location', 'listings-jobs' ); ?></label>
			<input type="text" name="search_location" id="search_location" placeholder="<?php esc_attr_e( 'Location', 'listings-jobs' ); ?>" value="<?php echo esc_attr( $location ); ?>" />
		</div>

		<?php if ( $categories ) : ?>
			<?php foreach ( $categories as $category ) : ?>
				<input type="hidden" name="search_categories[]" value="<?php echo sanitize_title( $category ); ?>" />
			<?php endforeach; ?>
		<?php elseif ( $show_categories && ! is_tax( 'job_listing_category' ) && get_terms( 'job_listing_category' ) ) : ?>
			<div class="search_categories">
				<label for="search_categories"><?php _e( 'Category', 'listings-jobs' ); ?></label>
				<?php if ( $show_category_multiselect ) : ?>
					<?php listings_dropdown_categories( array( 'taxonomy' => 'job_listing_category', 'hierarchical' => 1, 'name' => 'search_categories', 'orderby' => 'name', 'selected' => $selected_category, 'hide_empty' => false ) ); ?>
				<?php else : ?>
					<?php listings_dropdown_categories( array( 'taxonomy' => 'job_listing_category', 'hierarchical' => 1, 'show_option_all' => __( 'Any category', 'listings-jobs' ), 'name' => 'search_categories', 'orderby' => 'name', 'selected' => $selected_category, 'multiple' => false ) ); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php do_action( 'listings_jobs_job_filters_search_jobs_end', $atts ); ?>
	</div>

	<?php do_action( 'listings_jobs_job_filters_end', $atts ); ?>
</form>

<?php do_action( 'listings_jobs_job_filters_after', $atts ); ?>

<noscript><?php _e( 'Your browser does not support JavaScript, or it is disabled. JavaScript must be enabled in order to view listings.', 'listings-jobs' ); ?></noscript>