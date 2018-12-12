<section class="section section--margin-bottom section--boardmembers bg-col-partial bg-col-partial--93--default" data-breadcrum="">
    <div class="grid-container">
        <div class="boardmember-cards grid-x grid-padding-x">
            <?php
                $args = array (
                    'post_type'       => 'boardmembers',
                    'posts_per_page'	=>  1,
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
                    <a href="/SVEF/um-svef/stjorn/?member=<?php echo $slug; ?>">
                        <div class="member-image">
                            <div class="member-image">
                                <div class="member-image-jpg" style="background-image: url(<?php echo $boardmember_image['sizes']['large'] ?>)"></div>
                                <div class="member-image-gif" style="background-image: url(<?php echo $boardmember_gif_image['sizes']['large'] ?>)"></div>
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

            <div class="cell board-info small-10 small-offset-1 medium-6 large-7">
                <h2>Stjórnarmeðlimir SVEF árið 2018</h2>
                <p class="board-info-text">SVEF veit hve mikilvægt það fyrir fólkið í bransanum að vera vakandi fyrir nýjungum því í tækniheiminum eru breytingar örar og ný tækni...blablablabal eitthvað meir um það og því höfum við sett inn lestur vikunnar, getur verið bók, grein, video eða annað áhugavert. Ný tækni...blablablabal eitthvað meir um það og því höfum við sett inn lestur vikunnar, getur verið bók, grein, video eða annað áhugavert.</p>
                <a href="#" >Skoða nánar</a>
                <?php svef_partial('library/svef/icons/linkarrow.svg'); ?>
            </div>

                <?php
                // var_dump(get_term_by( 'slug', 'board-director', 'boardmembers_cat'));
                // $termObject = get_term_by( 'slug', 'board-director', 'boardmembers_cat');
                // $board_cat_id = $termObject->term_id;
                $args2 = array (
                    'post_type'       => 'boardmembers',
                    'posts_per_page'	=>  6,
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
                    <a href="/SVEF/um-svef/stjorn/?member=<?php echo $slug; ?>">
                        <div class="member-image">
                            <div class="member-image">
                                <div class="member-image-jpg" style="background-image: url(<?php echo $boardmember_image['sizes']['large'] ?>)"></div>
                                <div class="member-image-gif" style="background-image: url(<?php echo $boardmember_gif_image['sizes']['large'] ?>)"></div>
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
