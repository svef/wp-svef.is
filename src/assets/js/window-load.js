import $ from 'jquery'
import Global from './global-functions';
import ScrollMagic from 'scrollmagic/scrollmagic/minified/ScrollMagic.min';
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
        let loaderTween = TweenMax.to(this.loaderDiv, 2, { delay: 1, opacity: 0, ease: Sine.easeInOut, onComplete: tweenComplete })
        function tweenComplete() {
          Loader.loaderDiv.style.display = 'none'
          Loader.body.style.overflow = 'auto'
          loaderTween.kill()
        }
      })
    }
  }

}
module.exports = Loader
