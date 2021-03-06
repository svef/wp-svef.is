<footer class="section section--footer section__bg-color--dark grid-container full less-margin--bottom">
    <div class="footer grid-container grid-x">
        <div class="footer__info cell small-10 small-offset-1 medium-10 medium-offset-1 large-4 large-offset-1">
        <?php
            $footer_svef_introtext = get_field('footer_svef_introtext', 'option');
            $footer_svef_email = get_field('footer_svef_email', 'option');
            $footer_svef_phonenumber = get_field('footer_svef_phonenumber', 'option');
            $footer_svef_phonenumber_fancy = substr_replace($footer_svef_phonenumber," ", 4, -strlen($footer_svef_phonenumber));
						$footer_svef_phonenumber_fancyer = substr_replace($footer_svef_phonenumber_fancy," ", 8, -strlen($footer_svef_phonenumber_fancy));
						$footer_svef_phonenumber_sweetspot = substr( $footer_svef_phonenumber, 0, 4 ) === "+354" ? $footer_svef_phonenumber_fancyer : substr_replace($footer_svef_phonenumber," ", 3, -strlen($footer_svef_phonenumber));
            $footer_social_facebook = get_field('footer_social_facebook', 'option');
            $footer_social_instagram = get_field('footer_social_instagram', 'option');
            $footer_social_twitter = get_field('footer_social_twitter', 'option');
        ?>
            <div class="footer__intro">
                <?php svef_partial("library/svef/icons/sveflogo.svg"); ?>
                <p class="text--small"><?php pll_e($footer_svef_introtext) ; ?></p>
            </div>
            <div class="grid-x footer__links" >
                <div class="cell small-10 small-offset-0 medium-4 medium-offset-1 large-6 large-offset-0">
								<?php foundationpress_footer(); ?>
                </div>
                <div class="cell small-10 small-offset-0 medium-4 medium-offset-0 large-6 large-offset-0">
                    <div>
                        <ul>
                            <li>
                                <a href="tel:<?php echo $footer_svef_phonenumber; ?>" target="_blank" aria-lable="svefs phonenumber"><?php echo $footer_svef_phonenumber_sweetspot; ?></a>
                            </li>
                            <li>
                                <a href="mailto:<?php echo $footer_svef_email; ?>" target="_blank" aria-lable="svefs email"><?php echo $footer_svef_email; ?></a>
                            </li>
                            <li class="socialmedia">
                                <a href="<?php echo $footer_social_facebook; ?>"  aria-label="svef on facebook" target="_blank">
                                    <?php
                                    $classArray = array("facebookIcon" => "icon--white");
                                    svef_partial("library/svef/icons/facebook.svg", $classArray ); ?>
                                </a>
                                <a href="<?php echo $footer_social_instagram; ?>"  aria-label="svef on instagram" target="_blank">
                                    <?php
                                    $classArray = array("instagramIcon" => "icon--white");
                                    svef_partial("library/svef/icons/instagram.svg", $classArray ); ?>
                                </a>
                                <a href="<?php echo $footer_social_twitter; ?>"  aria-label="svef on twitter" target="_blank">
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
            <?php echo do_shortcode('[gravityform id="2" title="true" description="true" ajax="true"]'); ?>
        </div>
    </div>
    <div class="footer__copyright grid-container grid-x">
        <div class="cell small-10 small-offset-1 medium-10 medium-offset-1 large-10 large-offset-1"><p class="text--small">&copy; SVEF <?php echo date('Y'); ?></p></div>
    </div>
</footer>
