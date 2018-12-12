<section class="section section--margin-bottom section--boardmembersMax">
    <div class="grid-container">
        <div class="introtext" >
            <div class="grid-x grid-padding-x">
                <h2 class="section__title cell small-10 small-offset-1 medium-8 medium-offset-1 large-10 large-offset-1">Stjórn SVEF árið 2018</h2>
                <p class="section__paragraph cell small-10 small-offset-1 medium-8 medium-offset-2 large-8 large-offset-2">Markmið morgunverðarfunda SVEF eru miðlun sérfræðiþekkingar innan vébanda vefiðnaðarins, fengnir eru aðilar sem starfa innan vefgeirans og haldin eru erindi um ýmis mál tengd vefjum og verkefnum tengd þeim. Eitthvað meira mögulega eða kannski á ekki að vera neinn intro texti fyrir fréttir...</p>
            </div>
        </div>
    </div>
    <div class="grid-container">
        <div class="boardmembersMax-all grid-x">
        <?php

                $args = array (
                    'post_type'       => 'boardmembers',
                    'posts_per_page'	=>  7,
                    'order'						=> 'ASC',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'boardmembers_year',
                            'field'    => 'slug',
                            'terms' => '2017'
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
                    $boardmember_text = get_field('boardmember_text');
                    $email = get_field('email');
                    $website = get_field('website');
                    $facebook = get_field('facebook');
                    $instagram = get_field('instagram');
                    $linkedin = get_field('linkedin');
                    $twitter = get_field('twitter');
                    $behance = get_field('behance');
                    $dribble = get_field('dribble');

                    $boardmember_image = get_field('boardmember_image');
                    $use_gif_image = get_field('use_gif_image');
                    $boardmember_gif_image = get_field('boardmember_gif_image');
                    $boardmember_gif_image = $boardmember_gif_image ? $boardmember_gif_image : $boardmember_image;

                    $boardmember_count++;
                    $boardmember_order1 = $boardmember_count % 2 ? 1 : 2;
                    $boardmember_order2 = $boardmember_count % 2 ? 2 : 1;
                    $grid_offset1 = $boardmember_count % 2 ? 1 : 0;
                    $grid_offset2 = $boardmember_count % 2 ? 0 : 2;

            ?>

            <div id="<?php echo $slug;?>" class="boardmembersMax-each cell small-12 small-offset-0 medium-11 medium-offset-1 large-12 large-offset-0">
							<div class="section__bg-fix section__bg-fix--default section__bg-fix--color grid-contianer fluid" aria-hidden="true"></div>


                <div class="member_inner grid-x grid-padding-x">
                    <div class="section__bg-color--default section__bg-color--absolute section__bg-height--normal small-12 small-offset-0 medium-10 medium-offset-1 large-10 large-offset-2 xlarge-10 xlarge-offset-2" >
                    </div>
                    <div class="cell medium-6 medium-offset-0 large-4 large-offset-<?php echo $grid_offset1; ?> medium-order-<?php echo $boardmember_order1; ?> large-order-<?php echo $boardmember_order1; ?>">
                        <div class="member-image">
                            <div class="member-image-jpg" style="background-image: url(<?php echo $boardmember_image['sizes']['large'] ?>)"></div>
                            <div class="member-image-gif" style="background-image: url(<?php echo $boardmember_gif_image['sizes']['large'] ?>)"></div>
                        </div>
                    </div>
                    <div class="member-info-section cell medium-6 medium-offset-0 large-6 large-offset-<?php echo $grid_offset2; ?> medium-order-<?php echo $boardmember_order2; ?> large-order-<?php echo $boardmember_order2; ?>">
                        <h3><?php echo $boardmember_fullname; ?></h3>
                        <p class="text--card-undertitle"><?php echo $boardmember_role; ?> - <?php echo $boardmember_job_title; ?></p>
                        <div class="member-social">

                            <?php if($email) : ?>
                                <a href="mailto:<?php echo $email; ?>" target="_blank">
                                    <?php
                                    $classArray = array("emailIcon" => "icon--dark40");
                                    svef_partial("library/svef/icons/email.svg", $classArray ); ?>
                                </a>
                            <?php endif; ?>
                            <?php if($website) : ?>
                                <a href="<?php echo $website; ?>" target="_blank">
                                    <?php
                                    $classArray = array("websiteIcon" => "icon--dark40");
                                    svef_partial("library/svef/icons/website.svg", $classArray ); ?>
                                </a>
                            <?php endif; ?>
                            <?php if($facebook) : ?>
                                <a href="<?php echo $facebook; ?>" target="_blank">
                                    <?php
                                    $classArray = array("facebookIcon" => "icon--dark40");
                                    svef_partial("library/svef/icons/facebook.svg", $classArray ); ?>
                                </a>
                            <?php endif; ?>
                            <?php if($instagram) : ?>
                                <a href="<?php echo $instagram; ?>" target="_blank">
                                    <?php
                                    $classArray = array("instagramIcon" => "icon--dark40");
                                    svef_partial("library/svef/icons/instagram.svg", $classArray ); ?>
                                </a>
                            <?php endif; ?>
                            <?php if($twitter) : ?>
                                <a href="<?php echo $twitter; ?>" target="_blank">
                                    <?php
                                    $classArray = array("twitterIcon" => "icon--dark40");
                                    svef_partial("library/svef/icons/twitter.svg", $classArray ); ?>
                                </a>
                            <?php endif; ?>
                            <?php if($linkedin) : ?>
                                <a href="<?php echo $linkedin; ?>" target="_blank">
                                    <?php
                                    $classArray = array("linkedinIcon" => "icon--dark40");
                                    svef_partial("library/svef/icons/linkedin.svg", $classArray ); ?>
                                </a>
                            <?php endif; ?>
                            <?php if($behance) : ?>
                                <a href="<?php echo $behance; ?>" target="_blank">
                                    <?php
                                    $classArray = array("behanceIcon" => "icon--dark40");
                                    svef_partial("library/svef/icons/behance.svg", $classArray ); ?>
                                </a>
                            <?php endif; ?>
                            <?php if($dribble) : ?>
                                <a href="<?php echo $dribble; ?>" target="_blank">
                                    <?php
                                    $classArray = array("dribbleIcon" => "icon--dark40");
                                    svef_partial("library/svef/icons/dribble.svg", $classArray ); ?>
                                </a>
                            <?php endif; ?>

                        </div>
                        <p><?php echo $boardmember_text; ?></p>
                    </div>
                </div>
            </div>

            <?php endwhile; endif;  wp_reset_query(); ?>


        </div>
    </div>


</section>
