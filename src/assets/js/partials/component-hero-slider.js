import $ from 'jquery'
import 'owl.carousel'
import Global from '../global-functions'

const HeroSlider = {
  init(){
    this.cacheDom()
    this.sliderOptions.dotsEach = this.imageSliderCount
    this.setOwlCarousel(this.heroSlider, this.sliderOptions)
    this.cacheAfterSliderSet()
    Global.addNegativeTabIndex(this.owlDots)
    Global.addAriaLabel(this.owlDots, 'aria-hidden', 'true')
  },
  cacheAfterSliderSet() {
    this.owlDots = this.body.querySelectorAll('.owl-dot')
  },
  cacheDom(){
    this.body = Global.body
    this.heroSlider = this.body.querySelector('#heroSlider')
    this.slides = this.body.querySelectorAll('.hero-image')
    this.imageSliderCount = Global.calculateDots(this.slides.length)
  },

  setOwlCarousel(slider, options) {
    $(slider).owlCarousel(options);
  },
  sliderOptions : {
    stagePadding: 0,
    loop: true,
    margin: 0,
    items: 1,
    autoplay: true,
    autoplaySpeed: 1500,
    autoplayTimeout: 20000,
    navigation : false,
    slideSpeed: 1200,
    paginationSpeed : 1200,
    rewindSpeed : 1200,
    singleItem: true,
    dotsEach: 1,
    stopOnHover : true,
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
          items: 1,
          margin: 100,
          stagePadding: -28
      },
      641: {
          items: 1,
          margin: 100,
          stagePadding: -42
      },
      911: {
          items: 1,
          margin: 100,
          stagePadding: 0
      },
      1201: {
          items: 1,
          margin: 100,
          stagePadding: 0
      }
    }
  }
}
module.exports =  HeroSlider

