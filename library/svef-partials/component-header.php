<header class="site-header" role="banner">
		<nav class="nav" role="navigation">

				<div class="nav__logo">
					<?php svef_partial('library/svef/icons/sveflogo.svg') ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>

				</a>
				</div>

			<div class="nav__items">
				<div class="nav__lang link-text--menu">
					is en
				</div>
				<div class="nav__suprise">
					0
				</div>
				<div class="nav__menu" >

					<span class="link-text--menu">Menu</span>
				</div>
			</div>
		</nav>

		<menu style="side-menu">
			<div class="">
				<?php foundationpress_top_bar_r(); ?>
				<?php foundationpress_footer(); ?>
			</div>
		</menu>

	</header>

