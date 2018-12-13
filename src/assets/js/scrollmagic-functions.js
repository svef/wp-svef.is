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
    this.flipIn(this.sectionFlip)
    this.backgroundParalax(this.imgMask)
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
  flipIn(el) {
    let controller = new ScrollMagic.Controller()
    $(el).each(function (i) {
      let self = this
      let direction = i % 3 ? '90_cw' : '90_ccw';
      let movethebox = new TimelineMax()
      .fromTo(self, 1, {y: 90, rotationY: direction }, {y: 0, rotationY: 0, ease: Sine.easeInOut,  yoyoEase:true})
      new ScrollMagic.Scene({
        triggerElement: self,
        duration: '60%',
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
  }

}
module.exports = SectionsApear
