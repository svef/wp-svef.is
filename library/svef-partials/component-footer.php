<footer class="section section--footer section__bg-color--dark grid-container full">
    <div class="footer grid-container grid-x">
        <div class="footer__info cell large-4">
            <div class="footer__intro">
                <?php svef_partial("library/svef/icons/sveflogo.svg"); ?>
                <p class="text--small">Samtök vefiðnaðarins (SVEF) eru fagsamtök þeirra er starfa að vefmálum á Íslandi. Samtökin hafa það að markmiði að miðla þekkingu og efla fagleg vinnubrögð í greininni.</p>
            </div>
            <div class="grid-x footer__links" >
                <div class="cell large-6">
					<?php foundationpress_footer(); ?>
                </div>
                <div class="cell large-6">
                    <div>
                        <ul>
                            <li>
                                <a href="tel:+354 7674400" target="_blank">+354 767-4400</a>
                            </li>
                            <li>
                                <a href="mailto:svef@svef.is" target="_blank">svef@svef.is</a>
                            </li>
                            <li class="socialmedia">
                                <a href="#" target="_blank">
                                    <?php 
                                    $classArray = array("facebookIcon" => "icon--white");
                                    svef_partial("library/svef/icons/facebook.svg", $classArray ); ?>
                                </a>
                                <a href="#" target="_blank">
                                    <?php 
                                    $classArray = array("instagramIcon" => "icon--white");
                                    svef_partial("library/svef/icons/instagram.svg", $classArray ); ?>
                                </a>
                                <a href="#" target="_blank">
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
        <div class="footer__newsletter cell large-8">
            <p style="text-align: center;">Newsletter here</p>
        </div>
    </div>
</footer>
