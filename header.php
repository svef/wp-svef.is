<?php
 if(!session_id()) {
	session_start();
}
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

	$dark_mode = isset($_SESSION['isDark']) && $_SESSION['isDark'] == 'true' ? 'body--contrast' : '';
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Samtök vefiðnaðarins á Íslandi (SVEF) eru samtök einstaklinga sem hafa áhuga á vefmálum og/eða starfa innan vefgeirans. SVEF stendur fyrir ýmsum viðburðum fyrir félagsmenn sína eins og umræðukvöldum, ráðstefnum t.d. ICEWEB. SVEF er jafnframt umsjónaraðili Íslensku vefverðlaunanna sem veitt eru árlega.">
		<meta name="keywords" content="vefsíður, vefir, vefsvæði, vefgeirinn, vefiðnaður, ICEWEB, Íslensku vefverðlaunin, vefverðlaun, veflausnir, vefsíðugerð, vefarar, vefsmiðir, vefforritari, vefforritarar">

		<?php wp_head(); ?>

		<?php
			$analytics_gtag_code = get_field('analytics_gtag_code', 'option');
		?>
		<!-- Global site tag gtag.js - Google Analytics -->
		<?php if($analytics_gtag_code) : ?>
			<?php echo $analytics_gtag_code; ?>
        <?php endif; ?>

	</head>
	<body <?php body_class($dark_mode); ?>>

	<?php
		svef_partial('library/svef-partials/component-header');

	?>

