<?php
/*
Plugin Name: MCSearchbox
Version: 1.0
Description: Creates a shortcode to place MCSearch box
Author: David Baker (original code by Jack Weinbender)
Author URI: https://github.com/dbaker3
Plugin URI: https://github.com/dbaker3/mssearchbox
License: GPL 2.0
*/

function mcsearchbox_make( $atts ){ // Makes shortcode for MCSearchbox
	// Script from EBSCO
	wp_enqueue_script( 'ebsco', 'http://supportforms.epnet.com/eit/scripts/ebscohostsearch.js' , false , '20120626', true );

	ob_start(); ?>
	<div id="eds">
		<form action="" onsubmit="return ebscoHostSearchGo(this);" method="post">
			<div id="eds-search">
				<img src="http://library.milligan.edu/wp-content/uploads/images/mcsearch_150px.png" alt="MCSearch" /><!--

				--><input id="ebscohostwindow" name="ebscohostwindow" type="hidden" value="1" /><!--
				--><input id="ebscohosturl" name="ebscohosturl" type="hidden" value="https://milligan.idm.oclc.org/login?url=https://milligan.idm.oclc.org/login?url=ttp://search.ebscohost.com/login.aspx?direct=true&site=eds-live&scope=site&type=0&custid=s8886565&groupid=main&profid=edsmain&mode=and&lang=en&authtype=ip,guest" /><!--
				--><input id="ebscohostsearchsrc" name="ebscohostsearchsrc" type="hidden" value="db" /><!--
				--><input id="ebscohostsearchmode" name="ebscohostsearchmode" type="hidden" value="+AND+" /><!--
				--><input id="ebscohostkeywords" name="ebscohostkeywords" type="hidden" value="" /><!--
				--><input id="ebscohostsearchtext" name="ebscohostsearchtext" type="text" size="23"/><!--
				--><input type="submit" value="&#xe00f;" id="ebscohostsubmit" />
			</div>
			<div id="eds-more">
			<input type="checkbox" id="chkCatalogOnly" name="chkCatalogOnly" />
			<label for="chkCatalogOnly">Limit to Items in Milligan's Catalog</label></div>
			<div id="eds-more-toggle">&nbsp;</div>
		</form>
	</div><!-- #eds --><?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'mcsearchbox', 'mcsearchbox_make' );
?>