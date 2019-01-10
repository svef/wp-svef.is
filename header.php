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
		<meta name="description" content="Samtök vefiðnaðarins á Íslandi (SVEF) eru samtök einstaklinga sem hafa áhuga á vefmálum og/eða starfa innan vefgeirans. SVEF stendur fyrir ýmsum viðburðum fyrir félagsmenn sína eins og umræðukvöldum, ráðstefnum t.d. ICEWEB. SVEF er jafnframt umsjónaraðili Íslensku vefverðlaunanna sem veitt eru árlega.">
		<meta name="keywords" content="vefsíður, vefir, vefsvæði, vefgeirinn, vefiðnaður, ICEWEB, Íslensku vefverðlaunin, vefverðlaun, veflausnir, vefsíðugerð, vefarar, vefsmiðir, vefforritari, vefforritarar">

		<?php wp_head(); ?>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131131160-1"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-131131160-1');
		</script>

	</head>
	<body <?php body_class($dark_mode); ?>>

	<?php
		svef_partial('library/svef-partials/component-header');

	?>

