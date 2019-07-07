<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
	<div class="col-xs-12">
		<label>
			<div class="input-group input-group-lg">
				<input type="text" class="form-control" value="<?php the_search_query(); ?>" maxlength="100" placeholder="<?php echo esc_attr_x( 'Søg i Ruben-samlingen', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Søg efter:', 'label' ) ?>" />
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary btn-search">Søg</button>
				</span>
			</div>
			<input type="hidden" value="post" name="post_type" id="post" /> <!-- Der skal kun søges i poster/indlæg, ikke sider -->
		</label>
	</div>
</form>

