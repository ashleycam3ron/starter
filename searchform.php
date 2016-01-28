<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<label>
		<i class="glyphicon glyphicon-search"></i>
		<input type="search" class="search-field" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s" title="Search">
	</label>
	<input type="submit" class="search-submit" value="Search">
	<input type="hidden" name="post_type" value="product" />
</form>