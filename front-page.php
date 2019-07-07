 <!-- FRONTPAGE TEMPLATE -->

<?php get_header(); ?>

<!-- BANNER-BILLEDE -->
	
		<div class="container-fluid">
			
			<div class="row">
				<img class="img-responsive banner" src="http://nikolajstrands.dk/test/eksamen//wp-content/uploads/2015/12/Skærmbillede-2015-12-16-kl.-22.19.04.png" />
				<div class="bannertekst text-center hidden-xs"><h1><?php echo get_bloginfo ( 'description' ) ?></h1></div>	
			</div>
		
		</div>
		
<!-- HOVEDTEKST -->		
		
		<div class="container">
			
			<section class="row">
			
			<?php if(have_posts()) : while(have_posts()): the_post(); ?>
				<article class="col-xs-12 col-sm-12">
					<h2 class="text-center"> <?php the_title(); ?></h2>
					<div><?php the_content(); ?></div>		
				</article>
				
			<?php endwhile; ?>

            <?php else: ?>
                <div>Beklager - kan ikke vise teksten</div>
            <?php endif; ?>
			
			</section>
	       								
<!-- 4 LYDKLIP  -->
				
			<section class="row" id="lydeksempler">
			
				<h1 class="text-center">Lyt til optagelserne</h1>
				
				<?php 
					$args = array(
						'post_type' => 'post',						
						'posts_per_page' => 4,
						'category_name' => 'forside',	
					);
		
					$query = new WP_Query($args);
	
					while($query->have_posts() ) : $query ->the_post();
				?> 
			
				<article class="col-xs-12 col-sm-6 col-md-6 lydteaser">
					<div class="padder-lydteaser">			
					   <div><?php the_content() ?></div>
					   <div class="teasertekst">
					   <div><strong><?php the_title(); ?></strong></div>
					   <div><em>Opført af: <?php echo the_field('udovende_kunstner'); ?></em></div>
					   <div class="clearfix"></div>
					   <a href="<?php the_permalink(); ?>" class="btn btn-warning btn-sm pull-right">Læs mere</a>
					   </div>
					   <div class="clearfix"></div>
				   </div>
				</article>      
				<?php 		
					endwhile;
					wp_reset_query();
				?>
				
				<div class="clearfix"></div>
	
				<div class="text-center">
					<a href="<?php echo get_page_link(24); ?>" class="btn btn-primary">Lyt til flere lydklip</a>
				</div>
							
			</section>
			
			<div class="clearfix"></div>
						
<!-- 6 ARTIKELTEASERS -->
				
			<section class="row">
					
				<h1 class="text-center">Læs om udvalgte optagelser</h1>
							   
				<?php 
				$args = array(
				'post_type' => 'page',
				 'post_parent' => 27,
				'posts_per_page' => 6,
				'order' => 'ASC',
				);
							
				$query = new WP_Query($args);
				while ($query->have_posts() ) : $query ->the_post();
	
				?>
				
				<article class="col-xs-12 col-sm-6 col-md-4 artikelteaser">
					<a href="<?php the_permalink(); ?>">
						<div class="padder">
							<div class="postthumbnail">
								<?php if(has_post_thumbnail()){
									$attributes = array('class' => 'post-thumbnail img-responsive');
									the_post_thumbnail( 'full', $attributes );
									} 
								?>
							</div>
							<p class="teasertekst"><?php the_field('resume'); ?></p>
						</div>
					</a>	 
				</article>
		
				<?php 		
				endwhile;
				wp_reset_query();
				?>		
				
			</section>
										
<!-- HENTER UNDERSIDE MED VIDEO -->				
				
			<?php 
				$args = array(
				   'post_type' => 'page',
				   'post_parent' => 36,
				   'order' => 'ASC',
				   'orderby' => 'menu_order'
				);
   
				$query = new WP_Query($args);
   
				while($query->have_posts() ) : $query ->the_post();
			?> 
                
            <section class="row">
				
				<h1 class="text-center">Se en video om samlingen</h1>

                <div class="col-xs-12">                  
                    <div><?php the_content() ?></div>   
                </div>

            </section>
                
        <?php 		
            endwhile;
            wp_reset_query();
        ?>	
				
		</div> <!-- CONTAINER LUKKER -->	
			  
            
<?php get_footer(); ?>