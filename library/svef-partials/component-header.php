<header class="site-header">
		<nav class="nav grid-container" role="navigation">
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
				<ul class="nav__lang">

					<?php
						if(function_exists('pll_the_languages')){
							pll_the_languages( array('display_names_as' => 'slug', 'hide_if_no_translation' => 1) );
						} else {
							echo '';
						}
					?>
				</ul>
				<button class="nav__suprise"></button>
				<button id="btnMenu" class="nav__menu-button link-text--menu" >
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
			</div>
		</menu>

	</header>

