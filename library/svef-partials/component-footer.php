<footer class="section section--footer section__bg-color--dark grid-container full less-margin--bottom">
    <div class="footer grid-container grid-x">
        <div class="footer__info cell small-10 small-offset-1 medium-10 medium-offset-1 large-4 large-offset-1">
        <?php
            $footer_svef_introtext = get_field('footer_svef_introtext', 'option');
            $footer_svef_email = get_field('footer_svef_email', 'option');
            $footer_svef_phonenumber = get_field('footer_svef_phonenumber', 'option');
            $footer_social_facebook = get_field('footer_social_facebook', 'option');
            $footer_social_instagram = get_field('footer_social_instagram', 'option');
            $footer_social_twitter = get_field('footer_social_twitter', 'option');
        ?>
            <div class="footer__intro">
                <?php svef_partial("library/svef/icons/sveflogo.svg"); ?>
                <p class="text--small"><?php echo $footer_svef_introtext; ?></p>
            </div>
            <div class="grid-x footer__links" >
                <div class="cell small-10 small-offset-0 medium-4 medium-offset-1 large-6 large-offset-0">
								<?php foundationpress_footer(); ?>
                </div>
                <div class="cell small-10 small-offset-0 medium-4 medium-offset-0 large-6 large-offset-0">
                    <div>
                        <ul>
                            <li>
                                <a href="tel:+354 7674400" target="_blank"><?php echo $footer_svef_phonenumber; ?></a>
                            </li>
                            <li>
                                <a href="mailto:svef@svef.is" target="_blank"><?php echo $footer_svef_email; ?></a>
                            </li>
                            <li class="socialmedia">
                                <a href="<?php echo $footer_social_facebook; ?>" target="_blank">
                                    <?php
                                    $classArray = array("facebookIcon" => "icon--white");
                                    svef_partial("library/svef/icons/facebook.svg", $classArray ); ?>
                                </a>
                                <a href="<?php echo $footer_social_instagram; ?>" target="_blank">
                                    <?php
                                    $classArray = array("instagramIcon" => "icon--white");
                                    svef_partial("library/svef/icons/instagram.svg", $classArray ); ?>
                                </a>
                                <a href="<?php echo $footer_social_twitter; ?>" target="_blank">
                                <?php
                                    $classArray = array("twitterIcon" => "icon--white");
                                    svef_partial("library/svef/icons/twitter.svg", $classArray ); ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__newsletter cell small-10 small-offset-1 medium-10 medium-offset-1 large-5 large-offset-1">
            <?php echo do_shortcode('[gravityform id="2" title="true" description="true"]'); ?>
        </div>
    </div>
</footer>
