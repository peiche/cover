<script type="text/html" id="tmpl-autocomplete-header">
	<div class="autocomplete-header">
		<div class="autocomplete-header-title">{{ data.label }}</div>
		<div class="clear"></div>
	</div>
</script>

<script type="text/html" id="tmpl-autocomplete-post-suggestion">
	<a class="suggestion-link" href="{{ data.permalink }}" title="{{ data.post_title }}">
		<div class="suggestion-post-attributes">
			<span class="suggestion-post-title">{{{ data._highlightResult.post_title.value }}}</span>

			<#
			var attributes = ['content', 'title6', 'title5', 'title4', 'title3', 'title2', 'title1'];
			var attribute_name;
			var relevant_content = '';
			for ( var index in attributes ) {
			attribute_name = attributes[ index ];
			if ( data._highlightResult[ attribute_name ].matchedWords.length > 0 ) {
			relevant_content = data._snippetResult[ attribute_name ].value;
			break;
			} else if( data._snippetResult[ attribute_name ].value !== '' ) {
			relevant_content = data._snippetResult[ attribute_name ].value;
			}
			}
			#>
			<span class="suggestion-post-content">{{{ relevant_content }}}</span>
		</div>
	</a>
</script>

<script type="text/html" id="tmpl-autocomplete-term-suggestion">
	<a class="suggestion-link" href="{{ data.permalink }}"  title="{{ data.name }}">
		<span class="suggestion-post-title">{{{ data._highlightResult.name.value }}}</span>
	</a>
</script>

<script type="text/html" id="tmpl-autocomplete-user-suggestion">
	<a class="suggestion-link user-suggestion-link" href="{{ data.posts_url }}"  title="{{ data.display_name }}">
		<span class="suggestion-post-title">{{{ data._highlightResult.display_name.value }}}</span>
	</a>
</script>

<script type="text/html" id="tmpl-autocomplete-footer">
	<div class="autocomplete-footer">
		<div class="autocomplete-footer-branding">
			<?php esc_html_e( 'Powered by', 'cover' ); ?>
			<a href="#" class="algolia-powered-by-link" title="Algolia">
				<div class="algolia-logo"></div>
			</a>
		</div>
	</div>
</script>

<script type="text/html" id="tmpl-autocomplete-empty">
	<div class="autocomplete-empty">
		<?php esc_html_e( 'No results matched your query ', 'cover' ); ?>
		<span class="empty-query">{{ data.query }}"</span>
	</div>
</script>

<script type="text/javascript">
	jQuery(function () {
		// init Algolia client
		var client = algoliasearch(algolia.application_id, algolia.search_api_key);

		// setup default sources
		var sources = [];
		jQuery.each(algolia.autocomplete.sources, function(i, config) {
			sources.push({
				source: algoliaAutocomplete.sources.hits(client.initIndex(config['index_name']), {
					hitsPerPage: config['max_suggestions'],
					attributesToSnippet: [
						'content:10',
						'title1:10',
						'title2:10',
						'title3:10',
						'title4:10',
						'title5:10',
						'title6:10'
					]
				}),
				templates: {
					header: function() {
						return wp.template('autocomplete-header')({
							label: config['label']
						});
					},
					suggestion: wp.template(config['tmpl_suggestion'])
				}
			});

		});

		// Setup dropdown menus
		jQuery("input[name='s']").each(function(i) {
			var $searchInput = jQuery(this);

			var config = {
				debug: algolia.debug,
				hint: false,
				openOnFocus: true,
				templates: {}
			};
			//Todo: Add empty template when we fixed https://github.com/algolia/autocomplete.js/issues/109

			if(algolia.powered_by_enabled) {
				config.templates.footer = wp.template('autocomplete-footer');
			}

			// Instantiate autocomplete.js
			algoliaAutocomplete($searchInput[0], config, sources)
			.on('autocomplete:selected', function(e, suggestion, datasetName) {
				// Redirect the user when we detect a suggestion selection.
				window.location.href = suggestion.permalink;
			});

			var $autocomplete = $searchInput.parent();

			// Remove autocomplete.js default inline input search styles.
			$autocomplete.removeAttr('style');
		});

		jQuery(document).on("click", ".algolia-powered-by-link", function(e) {
			e.preventDefault();
			window.location = "https://www.algolia.com/?utm_source=WordPress&utm_medium=extension&utm_content=" + window.location.hostname + "&utm_campaign=poweredby";
		});
	});
</script>
