import $ from 'jquery'
import 'owl.carousel'
import Global from '../global-functions'
const OwleByClass = {
  init(){
    this.cacheDom()
    $(this.slider).exists(() => {
      this.setOwlCarousel(this.slider, this.sliderOptions)
    })
  },
  cacheDom(){
    this.body = document.querySelector('body')
    this.slider = this.body.querySelector('.slider')

  },
  setOwlCarousel(el, options) {
    $(el).owlCarousel(options)
  },
  sliderOptions : {
    stagePadding: 0,
    loop: true,
    margin: 0,
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
    lazyLoad: true,

  }

}
module.exports = OwleByClass
