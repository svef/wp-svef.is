import $ from 'jquery'
import Global from '../global-functions'
import ScrollMagic from 'scrollmagic/scrollmagic/minified/ScrollMagic.min';
import 'scrollmagic/scrollmagic/minified/plugins/animation.gsap.min';
import 'scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min';
// import TweenMax from 'gsap/src/minified/TweenMax.min';
import TimelineMax from 'gsap/src/minified/TimelineMax.min';

const SectionsApear = {
  init(){
    this.cacheDom()
    this.fadeIn(this.sectionEvent, 10)
    this.fadeIn(this.section, 30)
    this.flipIn(this.section)
  },
  cacheDom(){
    this.body = Global.body
    this.sectionEvent = this.body.querySelectorAll('.section__event')
    this.section = this.body.querySelectorAll('.section--animate-flip')

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
        // reverse: false
      }).setTween(movethebox)
        // .addIndicators({
        // name: 'section',
        // colorTrigger: 'black',
        // colorStart: 'pink',
        // colorEnd: 'green',
        // indent: 100
        // })
        .addTo(controller)

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
        // reverse: false
      }).setTween(movethebox)
        // .addIndicators({
        // name: 'section',
        // colorTrigger: 'black',
        // colorStart: 'pink',
        // colorEnd: 'green',
        // indent: 100
        // })
        .addTo(controller)

    })
  },


}
module.exports = SectionsApear
