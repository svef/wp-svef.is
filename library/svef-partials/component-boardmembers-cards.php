
<section class="section section--boardmembers bg-col-partial bg-col-partial--93--default" data-breadcrum="">
    <div class="grid-container">
        <div class="boardmember-cards grid-x grid-padding-x">
            <?php
                $args = array (
                    'post_type'       => 'boardmembers',
										'posts_per_page'	=>  1,
										'orderby' => 'title',
                    'order'						=> 'ASC',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'boardmembers_year',
                            'field'    => 'slug',
                            'terms' => '2017'
                        ),
                        array(
                            'taxonomy' => 'boardmembers_cat',
                            'field'    => 'slug',
                            'terms' => 'board-director'
                        )
                    )

                    );
                    $the_query = new WP_Query( $args );
            ?>
            <?php
                $boardmember_count = 0;
                if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
										global $post;
										$slug = $post->post_name;
                    $boardmember_fullname = get_field('boardmember_fullname');
                    $boardmember_role = get_field('boardmember_role');
                    $boardmember_job_title = get_field('boardmember_job_title');
                    $boardmember_image = get_field('boardmember_image');
                    $use_gif_image = get_field('use_gif_image');
                    $boardmember_gif_image = get_field('boardmember_gif_image');
										$boardmember_gif_image = $boardmember_gif_image ? $boardmember_gif_image : $boardmember_image;

			?>
            <div class="cell medium-6 large-4">
                <div class="card section--animate-flip">
                    <a href="<?php echo $board_link . '?member=' . $slug; ?>"  aria-label="read more about boardmember">
                        <div class="member-image">
                            <div class="member-image">
                                <div class="member-image-jpg" data-interchange="[<?php echo $boardmember_image['sizes']['medium_large'];  ?>, small], [<?php echo $boardmember_image['sizes']['medium_large'];  ?>, medium], [<?php echo $boardmember_image['sizes']['large'];  ?>, large], [<?php echo $boardmember_image['sizes']['large'];  ?>, retina]" ></div>
                                <div class="member-image-gif" data-interchange="[<?php echo $boardmember_image['sizes']['medium_large'];  ?>, small], [<?php echo $boardmember_gif_image['sizes']['medium_large'];  ?>, medium], [<?php echo $boardmember_gif_image['sizes']['large'];  ?>, large]"></div>
                            </div>
                        </div>
                        <div class="card-section">
                            <p class="text--cardsmall"><?php echo $boardmember_fullname; ?></p>
                            <div class="card-line"></div>
                            <p><?php echo $boardmember_role; ?></p>
                            <p class="text--small"><?php echo $boardmember_job_title; ?></p>
                        </div>
                    </a>
                </div>
            </div>

            <?php endwhile; endif; wp_reset_query(); ?>

            <div class="cell board-info small-10 small-offset-1 medium-6 medium-offset-0 large-6 large-offset-">
                <h2><?php echo $board_title; ?></h2>
								<p><?php echo $board_text; ?></p>

                <a href="<?php echo $board_link; ?>" class="section__link" ><?php pll_e('Skoða nánar', 'SVEF'); ?><?php svef_partial('library/svef/icons/linkarrow.svg'); ?> </a>

            </div>

                <?php

                $args2 = array (
                    'post_type'       => 'boardmembers',
										'posts_per_page'	=>  6,
										'orderby' => 'title',
                    'order'						=> 'ASC',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'boardmembers_year',
                            'field'    => 'slug',
                            'terms' => '2017'
                        ),
                        array(
                            'taxonomy' => 'boardmembers_cat',
                            'field'    => 'slug',
                            'terms'    => 'board-director',
                            'operator' => 'NOT IN'
                        )
                    )

                    );
                    $the_second_query = new WP_Query( $args2 );
            ?>
            <?php
                $boardmember_count = 0;
                if ($the_second_query->have_posts()) : while ($the_second_query->have_posts()) : $the_second_query->the_post();
										global $post;
										$slug = $post->post_name;
                    $boardmember_fullname = get_field('boardmember_fullname');
                    $boardmember_role = get_field('boardmember_role');
                    $boardmember_job_title = get_field('boardmember_job_title');

                    $boardmember_image = get_field('boardmember_image');
                    $use_gif_image = get_field('use_gif_image');
                    $boardmember_gif_image = get_field('boardmember_gif_image');
                    $boardmember_gif_image = $boardmember_gif_image ? $boardmember_gif_image : $boardmember_image;
			?>
            <div class="cell medium-6 large-4">
                <div class="card section--animate-flip">
                    <a href="<?php echo $board_link . '?member=' . $slug; ?>"  aria-label="read more about boardmember">
                        <div class="member-image">
                            <div class="member-image">
                                <div class="member-image-jpg" data-interchange="[<?php echo $boardmember_image['sizes']['medium_large'];  ?>, small], [<?php echo $boardmember_image['sizes']['medium_large'];  ?>, medium], [<?php echo $boardmember_image['sizes']['large'];  ?>, large], [<?php echo $boardmember_image['sizes']['large'];  ?>, retina]" ></div>
                                <div class="member-image-gif" data-interchange="[<?php echo $boardmember_image['sizes']['medium_large'];  ?>, small], [<?php echo $boardmember_gif_image['sizes']['medium_large'];  ?>, medium], [<?php echo $boardmember_gif_image['sizes']['large'];  ?>, large], [<?php echo $boardmember_gif_image['sizes']['large'];  ?>, retina]"  ></div>
                            </div>
                        </div>
                        <div class="card-section">
                            <p class="text--cardsmall"><?php echo $boardmember_fullname; ?></p>
                            <div class="card-line"></div>
                            <p><?php echo $boardmember_role; ?></p>
                            <p class="text--small"><?php echo $boardmember_job_title; ?></p>
                        </div>
                    </a>
                </div>
            </div>

            <?php endwhile; endif;  wp_reset_query(); ?>


        </div>
    </div>


</section>
