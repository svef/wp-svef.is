<?php 
    $quotetext = get_field('quotetext');
?>
<?php if($quotetext) : ?>
<section class="section section--quotetext grid-container">
    <div class="quotetext grid-x" >
        <p class="section__text text--quote cell large-9 large-offset-2"><?php echo $quotetext; ?></p>
	</div>
</section>                       
<?php endif; ?>
