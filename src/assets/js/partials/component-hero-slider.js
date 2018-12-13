import $ from 'jquery'
import 'owl.carousel'
import Global from '../global-functions'

const HeroSlider = {
  init(){
    this.cacheDom()
    this.setOwlCarousel(this.heroSlider, this.sliderOptions)
  },
  cacheDom(){
    this.body = Global.body
    this.heroSlider = this.body.querySelector('#heroSlider')
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
    slideSpeed : 1200,
    paginationSpeed : 1200,
    rewindSpeed : 1200,
    singleItem: true,
    stopOnHover : true,
    lazyLoad: true,
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

