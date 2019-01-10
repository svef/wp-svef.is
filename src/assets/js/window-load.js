import $ from 'jquery'
import Global from './global-functions';
import 'scrollmagic/scrollmagic/minified/plugins/animation.gsap.min';
import 'scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min';
import TweenMax from 'gsap/src/minified/TweenMax.min';
import TimelineMax from 'gsap/src/minified/TimelineMax.min';

const Loader = {
  init(){
    this.cacheDom()
    this.addEvents()
    this.stopScroll()
    this.signupBtnSetup()
  },
  cacheDom(){
    this.body = Global.body
    this.loaderDiv = this.body.querySelector('.window-loader')
    this.heroImg = this.body.querySelector('.section__image')
    this.heroInfoText = this.body.querySelector('.section__info')
    this.heroBanner = this.body.querySelector('.section--hero')
    this.heroBackCol1 = this.body.querySelector('.back-col-1')
    this.btnOpenSignup = this.body.querySelector('#btnOpenSignup')
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
        TweenMax.to(this.loaderDiv, 0.5, { opacity: 0, ease: Sine.easeInOut, onComplete: this.tweenComplete.bind(this) })
        $(this.heroBanner).exists( () => {
            this.heroBanerSetup()
        })
        this.signupAppears()
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
    this.heroBackCol1.style.opacity = 0
  },

  heroBanerIntro() {
    let tl = new TimelineMax();
        tl.fromTo(this.heroBackCol1, 0.5, {opacity: 0, x:40}, {opacity:1, x: 0, ease: Sine.easeInOut})
        tl.fromTo(this.heroImg,0.4,{opacity: 0, x:-20}, {opacity: 1, x: 0, ease: Sine.easeInOut})
        tl.fromTo(this.heroInfoText,0.7,{opacity: 0, x:20}, {opacity: 1,x: 0, ease: Sine.easeInOut})
  },

  signupBtnSetup() {
    this.btnOpenSignup.style.opacity = 0
  },

  signupAppears() {
    let tl = new TimelineMax();
        tl.fromTo(this.btnOpenSignup,0.5,{opacity: 0, x:-20}, {delay: 2, x: 0, opacity: 1, ease: Sine.easeInOut})
  }
}
module.exports = Loader
