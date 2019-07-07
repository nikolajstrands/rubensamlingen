<?php get_header(); ?>

<!-- INDEX TEMPLATE -->	
       
	
	<div class="container">
 							
		<section class="row" id="nyheder">
					
			<div class="col-xs-12">
				<h1>Lydklip fra Ruben-samlingen</h1>
				<p>Din søgning gav <?php echo $wp_query->found_posts ?> resultater.</p>
			</div>
			<hr />
				
			<?php if(have_posts()) : while(have_posts()): the_post(); ?>

				<article class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 lydpost">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<div class="padder">
							<div><strong><?php the_title(); ?></strong></div>
							<div><em>Opført af: <?php echo the_field('udovende_kunstner'); ?></em></div>
							<div class="clearfix"></div>
						</div>
					</a>
				</article>
         
			<?php 		
				endwhile;
				else: ?>
                    <div>Beklager - kan ikke finde indholdet</div>
                <?php endif; ?>
				
				<div class="clearfix"></div>
				
				<div class="text-center">				
								
					<div><?php next_posts_link( 'Næste side' ); ?></div>
					<div><?php previous_posts_link( 'Forrige side' ); ?></div>
			
				</div>

         </section>
   </div>
            
<?php get_footer(); ?>