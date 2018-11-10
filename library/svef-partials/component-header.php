<header class="site-header" role="banner">
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
				<div class="nav__lang link-text--menu">
					is  en
				</div>
				<div class="nav__suprise">
					o
				</div>
				<button id="btnMenu" class="nav__menu-button link-text--menu" >
					<span class="nav__icon">
						<span class="nav__icon__line"></span>
						<span class="nav__icon__line"></span>
					</span>
					Menu
				</button>
			</div>
		</nav>

		<menu class="side-menu">
			<div class="">
				<?php foundationpress_top_bar_r(); ?>

			</div>
		</menu>

	</header>

