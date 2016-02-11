jQuery(document).ready(function($) {
 

	/** Classes used for the plugin
		.js-posts__container - the containing <div> that contains all of the posts, and that the plugin loads posts into.
		.js-posts__content - the class that's applied to each post object that is being loaded in.
		.js-posts__load{} - the LOAD MORE button container.
		.js-posts__load a{} - the LOAD MORE button.
	*/

	// ** Set variables

		// The number of the next page to load
		var pageNum = parseInt(posts_alp.startPage) + 1;
		
		// The maximum number of pages the current query can return
		var max = parseInt(posts_alp.maxPages);
		
		// The link of the next page of posts.
		var nextLink = posts_alp.nextLink;
	

	// ** Add a container to load new posts into
	if(pageNum <= max) {
		$('.js-posts__container').append('<div class="js-posts__placeholder-'+ pageNum +'"></div>')
	}
	
	
	// ** BUTTON CLICKED
	$('.js-posts__load a').click(function() {
	
		// Check to see if there's more posts to load in
		if(pageNum <= max) {
		
			// Change the button to show that we're loading in posts
			$('.js-posts__load a').text('Loading');
			$('.js-posts__load a').addClass('loading');
			
			$('.js-posts__placeholder-'+ pageNum).load(nextLink + ' .js-posts__content',
				function() {

					// Increment pageNum and nextLink
					pageNum++;
					nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/'+ pageNum);
					
					// Add a new placeholder, for when user clicks again
					$('.js-posts__load').before('<div class="js-posts__placeholder-'+ pageNum +'"></div>')
					
					if(pageNum <= max) {
						// If there's more to load, reset the button
						$('.js-posts__load a').text('Load More Articles');
						$('.js-posts__load a').removeClass('loading');
					} else {
						// If there's no more to load, hide the button
						$('.js-posts__load').hide();
					}
				}
			);
		}	
		
		return false;
	});
});