<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

	$dark_mode = isset($_COOKIE['isDark']) && $_COOKIE['isDark'] == 'true' ? 'body--contrast' : '';
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />


		<?php wp_head(); ?>

	</head>
	<body <?php body_class($dark_mode); ?>>

	<?php
		svef_partial('library/svef-partials/component-header');

	?>

