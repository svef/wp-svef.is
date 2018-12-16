<?php if($show_slider): ?>

<section class="section section--imagegallery section__bg-color--dark section--margin-bottom">

<div class="imagesliderContainer">
  <div id="myImageSlider" class="imagesliderContainer__allItems owl-carousel">
    <?php foreach ($image_gallery as $image): ?>
        <div class="imagesliderContainer__allItems__oneItem"  data-interchange="[<?php echo $image['sizes']['medium_large'];  ?>, small], [<?php echo $image['sizes']['medium_large'];  ?>, medium], [<?php echo $image['sizes']['large'];  ?>, large], [<?php echo $image['sizes']['large'];  ?>, retina]" >
        </div>
    <?php endforeach; ?>
  </div>
</div>


</section>

<?php endif; ?>
