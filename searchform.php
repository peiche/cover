<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text">Search...</span>
		<input type="search" class="search-field" placeholder="Search..." value="<?php the_search_query(); ?>" name="s" title="Search" autocomplete="off" />
	</label>
</form>