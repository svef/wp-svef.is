import $ from 'jquery'
import 'owl.carousel'

const WinnersSlider = {
  init() {
    this.cacheDOM()
    this.setCarousel()
  },
  cacheDOM() {
    this.body = document.querySelector('body')
    this.slider = this.body.querySelector('#winnersSlider')
  },

  setCarousel() {
    $(this.slider).owlCarousel(this.sliderOptions)
  },

  sliderOptions : {
    stagePadding: 0,
    loop: true,
    // margin: 0,
    // items: -1,
    autoplay: true,
    autoplaySpeed: 1500,
    autoplayTimeout: 10000,
    navigation : false,
    slideSpeed : 500,
    paginationSpeed : 800,
    rewindSpeed : 1000,
    singleItem: true,
    stopOnHover : true,
    lazyLoad: true,
    responsive: {
        300: {
            items: 1,
            margin: 0,
            stagePadding: 0
        },
        600: {
            items: 1,
            margin: 0,
            stagePadding: 0
        },
        1000: {
            items: 4,
            margin: 0,
            stagePadding: 0
        },
        1400: {
            items: 4,
            margin: 0,
            stagePadding: 0
        }
    }
}
}

module.exports = WinnersSlider
