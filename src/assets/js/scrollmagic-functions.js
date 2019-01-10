import $ from 'jquery'
import Global from './global-functions'
import ScrollMagic from 'scrollmagic/scrollmagic/minified/ScrollMagic.min';
import 'scrollmagic/scrollmagic/minified/plugins/animation.gsap.min';
import 'scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min';
// import TweenMax from 'gsap/src/minified/TweenMax.min';
import TimelineMax from 'gsap/src/minified/TimelineMax.min';

const SectionsApear = {
  init(){
    this.cacheDom()
    this.fadeIn(this.sectionEvent, 40)
    this.fadeIn(this.sectionEventLink, '-300')
    this.fadeIn(this.section, 0)
    this.scaleIn(this.sectionFlip)
    if (window.innerWidth > 640) {
      this.backgroundParalax(this.imgMask)
    }
  },
  cacheDom(){
    this.body = Global.body
    this.sectionEvent = this.body.querySelectorAll('.section__event')
    this.sectionEventLink = this.body.querySelectorAll('.section__link--event')
    this.section = this.body.querySelectorAll('.section--animate')
    this.sectionFlip = this.body.querySelectorAll('.section--animate-flip')
    this.imgMask = this.body.querySelectorAll('.c2a-image--mask')

  },
  fadeIn(el, offset) {
    let controller = new ScrollMagic.Controller()
    $(el).each(function () {
      let self = this
      let movethebox = new TimelineMax()
      .fromTo(self, 1, {y: 90, autoAlpha: 0, }, {y: 0, autoAlpha: 1, ease: Sine.easeInOut})
      new ScrollMagic.Scene({
        triggerElement: self,
        duration: '60%',
        offset: offset,
        triggerHook: "onEnter",
        reverse: false
      }).setTween(movethebox)
      .addTo(controller)
      // .addIndicators({
      // name: 'section',
      // colorTrigger: 'black',
      // colorStart: 'pink',
      // colorEnd: 'green',
      // indent: 100
      // })
    })
  },
  scaleIn(el) {
    let controller = new ScrollMagic.Controller()
    $(el).each(function (i) {
      let self = this
      let delay = i % 2 ? '0.2' : '0.1';
      let movethebox = new TimelineMax()
      .fromTo(self, 0.1, {y: 10, scale: '0.8', opacity: 0 }, {delay: delay, y: 0, scale: '1', opacity: 1, ease: Expo.easeOut,  yoyoEase:true})
      new ScrollMagic.Scene({
        triggerElement: self,
        duration: '30%',
        offset: 0,
        triggerHook: "onEnter",
        reverse: false
      }).setTween(movethebox)
      .addTo(controller)
      // .addIndicators({
      // name: 'section',
      // colorTrigger: 'black',
      // colorStart: 'pink',
      // colorEnd: 'green',
      // indent: 100
      // })
    })
  },

  backgroundParalax(el){
    let controller = new ScrollMagic.Controller()
    $(el).each(function () {
      let self = this
      let movethebox = new TimelineMax()
      .fromTo(self, 1, {backgroundPosition:"50% 500px"}, {backgroundPosition:"50% 0px", ease: Sine.easeInOut})
      new ScrollMagic.Scene({
        triggerElement: self,
        duration: '100%',
        offset: 0,
        triggerHook: 1,
        reverse: true
      }).setTween(movethebox)
      .addTo(controller)
      // .addIndicators({
      // name: 'section',
      // colorTrigger: 'black',
      // colorStart: 'pink',
      // colorEnd: 'green',
      // indent: 100
      // })
    })
  },
  fadeInOnLoadmore(el) {
    let delayTime = 0.3
    $(el).each(function () {
      let self = this
      delayTime += 0.3
      TweenMax.set(self, {y:10, ease: Sine.easeInOut })
      TweenMax.to(self, 0.5, {delay: delayTime, opacity: 1,y:0, ease: Sine.easeInOut })
    })
  }
}
module.exports = SectionsApear
