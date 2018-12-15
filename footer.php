<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>


<?php svef_partial("library/svef-partials/component-footer"); ?>
<?php
	$lang_link = pll_current_language() == 'is' ? get_field('cookie_link', 'option') : get_field('cookie_link_en', 'option');
	$a_cookie_fileds = array(
		'cookie_message' => get_field('cookie_message', 'option'),
		'cookie_link' => $lang_link,
	);
	svef_partial("library/svef-partials/component-coockie-consent", $a_cookie_fileds);

	?>

<?php wp_footer();
# svef_partial("library/sver-partials/component-map-footer-setup");
?>
</body>
</html>
