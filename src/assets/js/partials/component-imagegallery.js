import $ from 'jquery';
import 'owl.carousel';

const Imagegallery = {
    init() {
        this.cacheDom()
        this.addEvents()
        $(this.imageGallery).owlCarousel()
      },
      cacheDom: function () {
        this.body = document.querySelector('body')
        this.imageGallery = this.body.querySelector('.owl-carousel')
      },
      addEvents() {
    
      }
}


module.exports = Imagegallery;