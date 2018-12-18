<?php $signup_title = get_field('signup_title', 'option'); ?>
<section class="side-signup">
<button id="closeSignupMobile" aria-lable="close signup" class="closeSignupMobile show-for-small-only">
    <span class="top"></span>
    <span class="bottom"></span>
</button>
    <div class="side-signup__inner">
        <div class="side-signup__info">
            <h3><?php echo $signup_title; ?></h3>
            <div class="side-signup__steps">
						<?php if( have_rows('signup_options', 'option') ): ?>
						<?php while( have_rows('signup_options', 'option') ): the_row();
							$step_title = get_sub_field('step_title');
							$step_text = get_sub_field('step_text');
						?>
							<div class="step">
									<h4><?php echo $step_title; ?></h4>
									<?php echo $step_text; ?>
							</div>
						<?php endwhile; ?>
						<?php endif; ?>

            </div>
                <div class="side-signup__form" style="padding: 20px 0;">
                <?php echo do_shortcode('[gravityform id="1" title="true" description="true" ajax="true"]'); ?>
            </div>
        </div>
    </div>
</section>

