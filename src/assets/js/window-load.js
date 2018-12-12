import $ from 'jquery'
import Global from './global-functions';
// import ScrollMagic from 'scrollmagic/scrollmagic/minified/ScrollMagic.min';
import 'scrollmagic/scrollmagic/minified/plugins/animation.gsap.min';
import 'scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min';
import TweenMax from 'gsap/src/minified/TweenMax.min';
import TimelineMax from 'gsap/src/minified/TimelineMax.min';

const Loader = {
  init(){
    this.cacheDom()
    this.addEvents()
    this.stopScroll()
  },
  cacheDom(){
    this.body = Global.body
    this.loaderDiv = this.body.querySelector('.window-loader')
    this.heroImg = this.body.querySelector('.section__image')
    this.heroInfoText = this.body.querySelector('.section__info')
    this.heroBanner = this.body.querySelector('.section--hero')

  },
  addEvents(){
    document.addEventListener("DOMContentLoaded", this.loadReadyHandler.bind(this))
  },

  stopScroll() {
      this.body.style.overflow = 'hidden'
  },
  loadReadyHandler(e) {
    window.onload = () => {
      // OPTIONAL - waits til next tick render to run code (prevents running in the middle of render tick)
      window.requestAnimationFrame(() => {
         // GSAP custom code goes here
         let loaderTween = TweenMax.to(this.loaderDiv, 2, { opacity: 0, ease: Sine.easeInOut, onComplete: this.tweenComplete.bind(this) })
         $(this.heroBanner).exists( () => {
           this.heroBanerSetup()
        })
      })
    }
  },
  tweenComplete() {
    this.loaderDiv.style.display = 'none'
    this.body.style.overflow = 'auto'
    $(this.heroBanner).exists(() => {
      this.heroBanerIntro()
    })
  },
  heroBanerSetup() {
    this.heroImg.style.opacity = 0
    this.heroInfoText.style.opacity = 0
  },
  heroBanerIntro() {
    let tl = new TimelineMax();
        tl.fromTo(Loader.heroImg,1,{opacity: 0, x:-20}, {x: 0, opacity: 1, ease: Sine.easeInOut})
        tl.fromTo(Loader.heroInfoText,1,{opacity: 0, x:20}, {x: 0, opacity: 1, ease: Sine.easeInOut})
  }

}
module.exports = Loader
