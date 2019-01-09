<?php

	if($jobfeed_title && $jobfeed_text && $jobfeed_image):
	$a_link_arrow = array('link_arrow' => 'link-arrow link-arrow--white');
?>


<section class="section section--margin-bottom section--jobfeed grid-container">
    <div class="section__jobfeed-inner grid-x grid-margin-x">
        <div class="section__image section__image--job-feed cell small-12 medium-5 large-5">
            <div class="jobfeed-image">
                <img data-interchange="[<?php echo $jobfeed_image['sizes']['medium'];  ?>, small], [<?php echo $jobfeed_image['sizes']['medium_large'];  ?>, medium], [<?php echo $jobfeed_image['sizes']['large'];  ?>, large], [<?php echo $jobfeed_image['sizes']['large'];  ?>, retina]" alt="">
            </div>
        </div>
        <div class="section__info section--animate section__info--center cell small-10 small-offset-1 medium-6 medium-offset-0 large-6 medium-offset-0" >

            <h2 class="section__title"><?php echo $jobfeed_title; ?></h2>
						<p class="section__pragraphTall--off"><?php echo $jobfeed_text; ?></p>

        </div>
    </div>
    <div class="section--jobfeed__feed grid-x grid-margin-x">
				<?php
					for ($i=0; $i <= 3 ; $i++):
						if($i == 0) {	$offset = 2;}
						elseif($i == 1) { $offset = 0; }
						elseif($i > 2 && $i % 2) { $offset = 0; } else { $offset = 1; }
						// $offset = $i < 1 ? 2 : $i == 2 ? 0 : $i > 2 && $i % 2 ? 0 : 1;

				?>
						<div class="section--jobfeed__feed-card cell small-12 small-offset-0 medium-6 medium-offset-0 large-5 large-offset-<?php echo $offset; ?>">
							<div class="card--spinner loader-container">
								<div role="progressbar" aria-busy="true" aria-label="Loading">
									<span role="presentation"></span>
									<span role="presentation"></span>
									<span role="presentation"></span>
									<span role="presentation"></span>
									<span role="presentation"></span>
								</div>
							</div>
						</div>

				<?php endfor; ?>



    </div>
</section>

<?php endif; ?>
