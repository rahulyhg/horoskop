<?php

get_header(); ?>

<div class="container">
	<div class="clearfix">
		<div class="row">

			<div id="content">	
				<?php 
				// WP_Query arguments
				$args = array (
					'post_type' => 'horoscope',
					'posts_per_archive_page' => 1,					
					'orderby' => 'date',
					'paged' => $paged 
				
					
					
				);

				// The Query
				$query = new WP_Query( $args );

				// The Loop
				if ( $query->have_posts() ) { 
					$taxonomyObject[] = get_term_by( 'name', 'vodnar' ,'horoskopy');
					$taxonomyObject[] = get_term_by( 'name', 'baran' ,'horoskopy');
					$taxonomyObject[] = get_term_by( 'name', 'rak' ,'horoskopy');
					$taxonomyObject[] = get_term_by( 'name', 'kozorozec' ,'horoskopy');
					$taxonomyObject[] = get_term_by( 'name', 'blizenci' ,'horoskopy');
					$taxonomyObject[] = get_term_by( 'name', 'lev' ,'horoskopy');
					$taxonomyObject[] = get_term_by( 'name', 'vahy' ,'horoskopy');
					$taxonomyObject[] = get_term_by( 'name', 'ryby' ,'horoskopy');
					$taxonomyObject[] = get_term_by( 'name', 'strelec' ,'horoskopy');
					$taxonomyObject[] = get_term_by( 'name', 'skorpion' ,'horoskopy');
					$taxonomyObject[] = get_term_by( 'name', 'byk' ,'horoskopy');
					$taxonomyObject[] = get_term_by( 'name', 'panna' ,'horoskopy');


					while ( $query->have_posts() ) {
						$query->the_post();

						?>
						
						<div class="horoDayBox">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="header-title"><h1>Horoskopy na <?php // echo get_the_date(); 
						    the_title(); ?></h1></div>
				  			</div>

				  			<?php 


							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_vodnar',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_baran',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_rak',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_kozorozec',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_blizenci',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_lev',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_vahy',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_ryby',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_strelec',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_skorpion',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_byk',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_panna',true);

							for ($i=0; $i < 12; $i++) {  ?>
								<div class="horoBox rollover boxCorners col-lg-4 col-md-4 col-sm-4 col-xs-12">

									<div class="inn">
										<div class="cube">
											<div class="front">
												<img class="img_front" src="<?php echo z_taxonomy_image_url($taxonomyObject[$i]->term_id); ?>" />
											</div>
											<div class="back">
												<img class="img_back" src="<?php echo z_taxonomy_image_url($taxonomyObject[$i]->term_id); ?>" />
											</div>
										</div>
										<h3><?php echo $taxonomyObject[$i]->name; ?></h3>
										<p class="horo_zodiak_descr"><?php echo $taxonomyHoro_descr_Object[$i]; ?></p>
									</div>	
								</div>	

							<?php } ?>
						</div> 	
						<?php 
					}	

				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata();  
				?>
			</div><!--#content-->

			<?php get_template_part('includes/post-formats/post-nav'); ?>

		</div>
	</div>
</div>
	
<?php get_footer(); ?>