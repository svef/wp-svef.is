<?php if($jobfeed_title && $jobfeed_text && $jobfeed_image): ?>
<?php $a_link_arrow = array('link_arrow' => 'link-arrow link-arrow--white'); ?>


<section class="section section--margin-bottom section--jobfeed grid-container">
    <div class="section__jobfeed-inner grid-x grid-margin-x">
        <div class="section__image cell large-5">
            <div class="jobfeed-image">
                <img src="<?php echo $jobfeed_image['sizes']['large']; ?>" alt="">
            </div>
        </div>
        <div class="section__info cell large-6" >
            <h2 class="section__title"><?php echo $jobfeed_title; ?></h2>
            <p class="section__pragraphTall"><?php echo $jobfeed_text; ?></p>
        </div>
    </div>
    <div class="section--jobfeed__feed grid-x grid-margin-x">
        <div class="section--jobfeed__feed-card cell large-5 large-offset-2">
            <a href="#">
                <p class="text--small">19. okt 2018</p>
                <div class="card-title-arrow">
                    <p class="text--card">Vefhönnuður <?php svef_partial('library/svef/icons/linkarrow.svg', $a_link_arrow); ?></p>
                </div>
                <p class="text--large">Avista</p>       
            </a>
         </div>
         <div class="section--jobfeed__feed-card cell large-5">
            <a href="#">
                <p class="text--small">19. okt 2018</p>
                <div class="card-title-arrow">
                    <p class="text--card">Frammenda forritari <?php svef_partial('library/svef/icons/linkarrow.svg', $a_link_arrow); ?></p>
                </div>
                <p class="text--large">Hugsmiðjan</p>      
            </a>
         </div>
         <div class="section--jobfeed__feed-card cell large-5 large-offset-1">
            <a href="#">
                <p class="text--small">15. okt 2018</p>
                <div class="card-title-arrow">
                    <p class="text--card">Sérfræðingur á sviði... <?php svef_partial('library/svef/icons/linkarrow.svg', $a_link_arrow); ?></p>
                </div>
                <p class="text--large">Póst- og fjarskiptastofnun</p>    
            </a>
         </div>
         <div class="section--jobfeed__feed-card cell large-5">
            <a href="#">
                <p class="text--small">12. okt 2018</p>
                <div class="card-title-arrow">
                    <p class="text--card">Viðmótsforritari  <?php svef_partial('library/svef/icons/linkarrow.svg', $a_link_arrow); ?></p>
                </div>
                <p class="text--large">Kolibri</p>    
            </a>
         </div>

        
    </div>
</section>

<?php endif; ?>