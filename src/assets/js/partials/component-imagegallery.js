import $ from 'jquery';
import 'owl.carousel';
import Global from '../global-functions'
const Imagegallery = {
  init() {
    this.cacheDom()
    this.carouselOptions.dotsEach = this.imageSliderCount
    $(this.slider).owlCarousel(this.carouselOptions)
  },
  cacheDom: function () {
    this.body = Global.body
    // this.body = document.querySelector('body')
    this.slider = this.body.querySelector('#myImageSlider')
    this.slides = this.body.querySelectorAll('.imagesliderContainer__allItems__oneItem')
    this.imageSliderCount = Global.calculateDots(this.slides.length)
  },

  carouselOptions: {
    stagePadding: 340,
    loop: true,
    margin: 35,
    items: 1,
    autoplay: true,
    autoplaySpeed: 1500,
    autoplayTimeout: 10000,
    navigation : false,
    slideSpeed : 500,
    paginationSpeed : 800,
    rewindSpeed : 1000,
    singleItem: true,
    stopOnHover : true,
    dotsEach: 1,
    lazyLoad: true,
    onDrag(e) {
      let owl = $(e.target)
      owl.trigger('stop.owl.autoplay')
    },
    onDragged(e) {
      let owl = $(e.target)
      setTimeout(() => {
        owl.trigger('play.owl.autoplay', [10000])
      }, 10000);
    },
    responsive: {
      0: {
        margin: 0,
        stagePadding: 0
      },
      641: {
        margin: 20,
        stagePadding: 60
      },
      911: {
        margin: 20,
        stagePadding: 180
      },
      1201: {
        margin: 35,
        stagePadding: 320
      },
      1441: {
        margin: 35,
        stagePadding: 360
      }
    }
  }
}

module.exports = Imagegallery;
