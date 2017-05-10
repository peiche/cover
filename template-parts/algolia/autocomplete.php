<?php
/**
 * The template for Algolia autocomplete
 *
 * @package Cover
 */

?>

<script type="text/html" id="tmpl-autocomplete-header">
  <div class="autocomplete-header">
    <div class="autocomplete-header-title">{{{ data.label }}}</div>
    <div class="clear"></div>
  </div>
</script>

<script type="text/html" id="tmpl-autocomplete-post-suggestion">
  <a class="suggestion-link" href="{{ data.permalink }}" title="{{ data.post_title }}">
        <div class="suggestion-post-attributes">
          <span class="suggestion-post-title">{{{ data._highlightResult.post_title.value }}}</span>
          <# if ( data._snippetResult['content'] ) { #>
            <span class="suggestion-post-content">{{{ data._snippetResult['content'].value }}}</span>
            <# } #>
        </div>
  </a>
</script>

<script type="text/html" id="tmpl-autocomplete-term-suggestion">
  <a class="suggestion-link" href="{{ data.permalink }}" title="{{ data.name }}">
    <span class="suggestion-post-title">{{{ data._highlightResult.name.value }}}</span>
  </a>
</script>

<script type="text/html" id="tmpl-autocomplete-user-suggestion">
  <a class="suggestion-link user-suggestion-link" href="{{ data.posts_url }}" title="{{ data.display_name }}">
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
      <?php esc_html_e('No results matched your query ', 'cover'); ?>
    <span class="empty-query">"{{ data.query }}"</span>
  </div>
</script>

<script type="text/javascript">
  jQuery(function () {
    /* init Algolia client */
    var client = algoliasearch(algolia.application_id, algolia.search_api_key);

    /* setup default sources */
    var sources = [];
    jQuery.each(algolia.autocomplete.sources, function (i, config) {
      var suggestion_template = wp.template(config['tmpl_suggestion']);
      sources.push({
        source: algoliaAutocomplete.sources.hits(client.initIndex(config['index_name']), {
          hitsPerPage: config['max_suggestions'],
          attributesToSnippet: [
            'content:10'
          ],
          highlightPreTag: '__ais-highlight__',
          highlightPostTag: '__/ais-highlight__'
        }),
        templates: {
          header: function () {
            return wp.template('autocomplete-header')({
              label: _.escape(config['label'])
            });
          },
          suggestion: function (hit) {
            for (var key in hit._highlightResult) {
              // We do not deal with arrays.
              if (typeof hit._highlightResult[key].value !== 'string') {
                continue;
              }
              hit._highlightResult[key].value = _.escape(hit._highlightResult[key].value);
              hit._highlightResult[key].value = hit._highlightResult[key].value.replace(/__ais-highlight__/g, '<em>').replace(/__\/ais-highlight__/g, '</em>');
            }

            for (var key in hit._snippetResult) {
              // We do not deal with arrays.
              if (typeof hit._snippetResult[key].value !== 'string') {
                continue;
              }

              hit._snippetResult[key].value = _.escape(hit._snippetResult[key].value);
              hit._snippetResult[key].value = hit._snippetResult[key].value.replace(/__ais-highlight__/g, '<em>').replace(/__\/ais-highlight__/g, '</em>');
            }

            return suggestion_template(hit);
          }
        }
      });

    });

    /* Setup dropdown menus */
    jQuery("input[name='s']:not('.no-autocomplete')").each(function (i) {
      var $searchInput = jQuery(this);

      var config = {
        debug: algolia.debug,
        hint: false, // Required given we use appendTo feature.
        openOnFocus: true,
        appendTo: '#search-overlay .search-form',
        templates: {
          empty: wp.template('autocomplete-empty')
        }
      };

      if (algolia.powered_by_enabled) {
        config.templates.footer = wp.template('autocomplete-footer');
      }

      /* Instantiate autocomplete.js */
      algoliaAutocomplete($searchInput[0], config, sources)
      .on('autocomplete:selected', function (e, suggestion) {
        /* Redirect the user when we detect a suggestion selection. */
        window.location.href = suggestion.permalink;
      });
    });

    jQuery(document).on("click", ".algolia-powered-by-link", function (e) {
      e.preventDefault();
      window.location = "https://www.algolia.com/?utm_source=WordPress&utm_medium=extension&utm_content=" + window.location.hostname + "&utm_campaign=poweredby";
    });
  });
</script>
