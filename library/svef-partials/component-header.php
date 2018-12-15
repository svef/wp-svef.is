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
						if(function_exists('pll_the_languages') &&  (get_field('launch_english_version', 'option') || is_super_admin())){
							pll_the_languages( array('display_names_as' => 'slug', 'hide_if_no_translation' => 1) );
						} else {
							echo '';
						}
					?>
				</ul>
				<button class="nav__suprise show-for-medium" arial-lable="Change backround contrast"></button>
				<button id="btnMenu" class="nav__menu-button link-text--menu" aria-lable="menu">
					<span class="nav__icon">
						<span class="nav__icon__line"></span>
						<span class="nav__icon__line"></span>
					</span>
					<?php pll_e('valm'); ?>
				</button>
			</div>
		</nav>
		<menu class="side-menu">
			<div class="side-menu__inner">
				<?php foundationpress_top_bar_r(); ?>
				<div class="nav__items nav__items--mobile">
					<ul class="nav__lang nav__lang--mobile show-for-small-only">

						<?php
							if(function_exists('pll_the_languages') && (get_field('launch_english_version', 'option') || is_super_admin())){
								pll_the_languages( array('display_names_as' => 'slug', 'hide_if_no_translation' => 1) );
							} else {
								echo '';
							}
						?>
					</ul>
					<button class="nav__suprise nav__suprise--mobile show-for-small-only" arial-lable="Change backround contrast"></button>
				</div>
				<button id="btnOpenSignupMobile" class="btnMain btnSignup btnFixedOff show-for-small-only">
					Skráning í svef
				</button>
			</div>

		</menu>
		<button id="btnOpenSignup" class="btnMain btnSignup show-for-medium" tabindex="0">Skráning í svef</button>
		<?php svef_partial('library/svef-partials/component-signup'); ?>
		<div class="side-signup-overlay"></div>
		<div class="menu-overlay"></div>
		<div class="window-loader">
			<div role="progressbar", aria-busy="true", aria-label="Loading">
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
