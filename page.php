<?php get_header(); ?>
 
 <!-- PAGE TEMPLATE -->	 
    
		<div class="container">

			<section class="row">
            				
				<?php if(have_posts()) : while(have_posts()): the_post(); ?>
				<article class="col-xs-12 col-sm-10 col-sm-offset-1">
					
					<h1><?php the_title(); ?> </h1>
					<div><?php the_content(); ?></div>
					
				</article>
				
				<?php endwhile; ?>

                <?php else: ?>
                    <div>Beklager - kan ikke finde indholdet</div>
                <?php endif; ?>
                
			</section>
			
		</div>
            
<?php get_footer(); ?>