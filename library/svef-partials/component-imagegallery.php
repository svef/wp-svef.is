<?php if($show_slider): ?>
<section class="section section--imagegallery section__bg-color--dark section--margin-bottom">

<div class="imagesliderContainer">
  <div id="myImageSlider" class="imagesliderContainer__allItems owl-carousel">
    <?php foreach ($image_gallery as $image): ?>
        <div class="imagesliderContainer__allItems__oneItem">
        <img src="<?php echo $image['sizes']['large']; ?>" alt="" />
        </div>
    <?php endforeach; ?>
  </div>
</div>


</section>

<?php endif; ?>