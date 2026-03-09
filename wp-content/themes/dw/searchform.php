<form role="search" method="get" class="search-form" action="<?= esc_url(home_url('/')) ?>">
  <label>
					<span class="sro">
					<!-- translators: Hidden accessibility text. -->
					<?= _x('Search for:', 'hepl-trad') ?>
					</span>
    <input type="search" class="search-field" placeholder="<?= esc_attr_x('Search &hellip;', 'placeholder') ?>"
           value="<?= get_search_query() ?>" name="s"/>
  </label>
  <button type="submit" class="search-submit"><?= esc_attr_x( 'Search', 'submit button' ) ?></button>
</form>
