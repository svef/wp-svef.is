<script>
	function getCookie(cname) {
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	};
	var isDark = getCookie('isDark');
	var body = document.querySelector('body');
	if (isDark && isDark == 'true' && ! body.classList.contains('body--contrast')) {
		body.classList.add('body--contrast')
	}
	if (isDark && isDark == 'false' && body.classList.contains('body--contrast')) {
		body.classList.remove('body--contrast')
	}
</script>
<header class="site-header">
		<nav class="nav" role="navigation">
				<div class="nav__logo">
					<a class="nav__home" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php
							$aSvg = array('class_name' => 'svef-logo');
						  	svef_partial('library/svef/icons/sveflogo.svg', $aSvg);
						?>
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
					</a>
				</div>

			<div class="nav__items">
				<ul class="nav__lang show-for-medium">

					<?php

						if(function_exists('pll_the_languages') && (get_field('launch_english_site', 'option') || is_super_admin())){
							pll_the_languages( array('display_names_as' => 'slug', 'hide_if_no_translation' => 1) );
						} else {
							echo '';
						}
					?>
				</ul>
				<button class="nav__suprise show-for-medium" aria-label="Change background contrast"></button>
				<button id="btnMenu" class="nav__menu-button link-text--menu"  aria-label="menu">
					<span class="nav__icon">
						<span class="nav__icon__line"></span>
						<span class="nav__icon__line"></span>
					</span>
					<?php pll_e('valm'); ?>
				</button>
			</div>
		</nav>
		<div class="side-menu">
			<div class="side-menu__inner">
				<?php foundationpress_top_bar_r(); ?>
				<div class="nav__items nav__items--mobile">
					<ul class="nav__lang nav__lang--mobile show-for-small-only">

						<?php
							if(function_exists('pll_the_languages') && (get_field('launch_english_site', 'option') || is_super_admin())){
								pll_the_languages( array('display_names_as' => 'slug', 'hide_if_no_translation' => 1) );
							} else {
								echo '';
							}
						?>
					</ul>
					<button class="nav__suprise nav__suprise--mobile show-for-small-only" aria-label="Change background contrast"></button>
				</div>
				<a href="/skraning" class="btnMain btnSignup btnFixedOff show-for-small-only"><?php pll_e('Skráning í svef') ?></a>
			</div>
		</div>
		<a href="/skraning" class="btnMain btnSignup show-for-medium" tabindex="0"><?php pll_e('Skráning í svef') ?></a>
		<?php svef_partial('library/svef-partials/component-signup'); ?>
		<div class="side-signup-overlay"></div>
		<div class="menu-overlay"></div>
		<div class="window-loader">
			<div role="progressbar" aria-busy="true" aria-label="Loading">
				<span role="presentation"></span>
				<span role="presentation"></span>
				<span role="presentation"></span>
				<span role="presentation"></span>
				<span role="presentation"></span>
				<!-- <span role="presentation"></span>
				<span role="presentation"></span> -->
			</div>
		</div>
	</header>
