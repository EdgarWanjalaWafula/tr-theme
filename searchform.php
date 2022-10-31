<?php
/**
 * The template for displaying the search form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Two_Rivers
 */
 ?>
 
<form role="search" method="get" id="searchform" class="tr-search" action="<?php echo home_url( '/' ); ?>">
    <div class="row">
		<div class="col-md-11 col-sm-11 col-xs-11">
			<input type="text" placeholder="<?php _e('Search...', 'tworivers'); ?>" name="s" id="s" />
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1 tr-search-btn">
			<input type="submit" value="" />
		</div>
	 </div>
</form>
