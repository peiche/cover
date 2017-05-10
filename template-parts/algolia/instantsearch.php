<?php
/**
 * The template for Algolia instant search
 *
 * @package Cover
 */

?>

<?php get_header(); ?>

	<div id="ais-wrapper">
		<main id="ais-main">

			<div class="cover">
				<header class="cover-header">

			<div id="algolia-search-box">
				<div id="algolia-stats"></div>
			</div>

				</div>
			</div>

			<div id="algolia-hits"></div>
			<div id="algolia-pagination"></div>

		</main>
		<aside id="ais-facets">
			<section class="ais-facets" id="facet-post-types"></section>
			<section class="ais-facets" id="facet-categories"></section>
			<section class="ais-facets" id="facet-tags"></section>
			<section class="ais-facets" id="facet-users"></section>
		</aside>
	</div>
	<script type="text/html" id="tmpl-instantsearch-hit">
		<article class="hentry" itemtype="http://schema.org/Article">
			<div class="ais-hits--content">
                               <header class="entry-header">
					<h1 class="entry-title" itemprop="name headline">
						<a href="{{ data.permalink }}" title="{{ data.post_title }}" itemprop="url">{{{ data._highlightResult.post_title.value }}}</a>
					</h1>
				</header>				
                                <div class="entry-summary">
					<p>
            <# if ( data._snippetResult['content'] ) { #>
              <span class="suggestion-post-content">{{{ data._snippetResult['content'].value }}}</span>
            <# } #>
					</p>
				</div>
			</div>
			<div class="ais-clearfix"></div>
		</article>
	</script>


	<script type="text/javascript">
		jQuery(function() {
			if(jQuery('#algolia-search-box').length > 0) {

				if (algolia.indices.searchable_posts === undefined && jQuery('.admin-bar').length > 0) {
					alert('It looks like you haven\'t indexed the searchable posts index. Please head to the Indexing page of the Algolia Search plugin and index it.');
				}

				/* Instantiate instantsearch.js */
				var search = instantsearch({
					appId: algolia.application_id,
					apiKey: algolia.search_api_key,
					indexName: algolia.indices.searchable_posts.name,
					urlSync: {
						mapping: {'q': 's'},
						trackedParameters: ['query']
					},
					searchParameters: {
						facetingAfterDistinct: true,
            highlightPreTag: '__ais-highlight__',
            highlightPostTag: '__/ais-highlight__'
					}
				});

				/* Search box widget */
				search.addWidget(
					instantsearch.widgets.searchBox({
						container: '#algolia-search-box',
						placeholder: 'Search for...',
						wrapInput: false,
						poweredBy: algolia.powered_by_enabled
					})
				);

				/* Stats widget */
				search.addWidget(
					instantsearch.widgets.stats({
						container: '#algolia-stats'
					})
				);

				/* Hits widget */
				search.addWidget(
					instantsearch.widgets.hits({
						container: '#algolia-hits',
						hitsPerPage: 10,
						templates: {
							empty: 'No results were found for "<strong>{{query}}</strong>".',
							item: wp.template('instantsearch-hit')
						},
            transformData: {
						  item: function (hit) {
                for(var key in hit._highlightResult) {
                  // We do not deal with arrays.
                  if(typeof hit._highlightResult[key].value !== 'string') {
                    continue;
                  }
                  hit._highlightResult[key].value = _.escape(hit._highlightResult[key].value);
                  hit._highlightResult[key].value = hit._highlightResult[key].value.replace(/__ais-highlight__/g, '<em>').replace(/__\/ais-highlight__/g, '</em>');
                }

                for(var key in hit._snippetResult) {
                  // We do not deal with arrays.
                  if(typeof hit._snippetResult[key].value !== 'string') {
                    continue;
                  }

                  hit._snippetResult[key].value = _.escape(hit._snippetResult[key].value);
                  hit._snippetResult[key].value = hit._snippetResult[key].value.replace(/__ais-highlight__/g, '<em>').replace(/__\/ais-highlight__/g, '</em>');
                }

                return hit;
              }
            }
					})
				);

				/* Pagination widget */
				search.addWidget(
					instantsearch.widgets.pagination({
						container: '#algolia-pagination'
					})
				);

				/* Post types refinement widget */
				search.addWidget(
					instantsearch.widgets.menu({
						container: '#facet-post-types',
						attributeName: 'post_type_label',
						sortBy: ['isRefined:desc', 'count:desc', 'name:asc'],
						limit: 10,
						templates: {
							header: '<h3 class="widgettitle">Post Type</h3>'
						},
					})
				);

				/* Categories refinement widget */
				search.addWidget(
					instantsearch.widgets.hierarchicalMenu({
						container: '#facet-categories',
						separator: ' > ',
						sortBy: ['count'],
						attributes: ['taxonomies_hierarchical.category.lvl0', 'taxonomies_hierarchical.category.lvl1', 'taxonomies_hierarchical.category.lvl2'],
						templates: {
							header: '<h3 class="widgettitle">Categories</h3>'
						}
					})
				);

				/* Tags refinement widget */
				search.addWidget(
					instantsearch.widgets.refinementList({
						container: '#facet-tags',
						attributeName: 'taxonomies.post_tag',
						operator: 'and',
						limit: 15,
						sortBy: ['isRefined:desc', 'count:desc', 'name:asc'],
						templates: {
							header: '<h3 class="widgettitle">Tags</h3>'
						}
					})
				);

				/* Users refinement widget */
				search.addWidget(
					instantsearch.widgets.menu({
						container: '#facet-users',
						attributeName: 'post_author.display_name',
						sortBy: ['isRefined:desc', 'count:desc', 'name:asc'],
						limit: 10,
						templates: {
							header: '<h3 class="widgettitle">Authors</h3>'
						}
					})
				);

				/* Start */
				search.start();

				jQuery('#algolia-search-box input').attr('type', 'search').select();
			}
		});
	</script>

<?php get_footer(); ?>
