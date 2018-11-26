<section class="section section--margin-bottom section--logowall">
    <div class="grid-container">
        <div class="introtext" >
            <div class="grid-x grid-padding-x">
                <h2 class="section__title cell medium-8 medium-offset-1 large-10 large-offset-1">Styrktaraðilar SVEF</h2>
                <p class="section__paragraph cell medium-8 medium-offset-2 large-8 large-offset-2">SVEF á sér marga góða styrktaraðila sem eitthvað um það meira. Það er ein af blabla ástæðum þess að við getum haldið blabla og blal. Eitthvað meira mögulega og enn meira. Vera með! email linkur</p>
                </div>
            </div>
        </div>
    </div>
    <div class="grid-container">
        <div class="supportors-logos" >
            <div class="logos-all grid-x grid-padding-x medium-8 medium-offset-2 cell large-10 large-offset-2">
                <?php 
                $a_supporter_logos = get_field('supporter_logo', 'option');
                shuffle($a_supporter_logos);
                for( $i=0; $i < count($a_supporter_logos); $i++ ) : 
                  
                        $visability = $i>5 ? 'hidden_logo' : 'visible_logo';
                    
                ?>
                <div class="client-logo logo-each logo-each cell small-6 medium-6 large-4 <?php echo $visability; ?>"> 
                    <img src="<?php echo $a_supporter_logos[$i]['sizes']['large']; ?>" alt="">
                </div>
                <?php endfor; ?> 

            </div>
        </div>
    </div>
</section>
