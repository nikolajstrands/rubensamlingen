<!-- INDEX TEMPLATE -->

<?php get_header(); ?>

        <div class="container">
			
			<section class="row fuldpost">
		
			<?php if(have_posts()) : while(have_posts()): the_post(); ?>
			
				<article class="col-xs-12 col-sm-10 col-sm-offset-1">
					<div class="padder">
						
						<h2><?php the_title(); ?></h2>
						<div><?php the_content(); ?></div>
						
						<div class="teasertekst">
							<br />
							<div><strong>Optagelsen:</strong></div>
							<div>Valsenr.: <?php echo the_field('valse_nr.'); ?></div>
							<div>Valsetitel: <?php the_field('valsetitel'); ?> </div>
							<div>Udøvende kunstner: <?php echo the_field('udovende_kunstner'); ?></div>
							<br />
							<div><strong>Værket:</strong></div>
							<div>Værk: <?php echo the_field('vark'); ?></div>
							<div>Ophav: <?php echo the_field('ophav'); ?></div>
							<div>Titel: <?php echo the_field('titel'); ?></div>
							<br />					
						</div>

					</div>	
				</article>	

				<?php endwhile; ?>

                <?php else: ?>
                    <div>Beklager - kan ikke finde indholdet</div>
                <?php endif; ?>
            
			</section>
		</div>
            
<?php get_footer(); ?>