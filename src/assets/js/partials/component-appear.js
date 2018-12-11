import $ from 'jquery'
import Global from '../global-functions'
import ScrollMagic from 'scrollmagic/scrollmagic/minified/ScrollMagic.min';
import 'scrollmagic/scrollmagic/minified/plugins/animation.gsap.min';
import 'scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min';
import TweenMax from 'gsap/src/minified/TweenMax.min';
import TimelineMax from 'gsap/src/minified/TimelineMax.min';

const SectionsApear = {
  init(){
    this.cacheDom()
    this.fadeIn(this.sectionEvent)
    this.fadeIn(this.section)
  },
  cacheDom(){
    this.body = Global.body
    this.sectionEvent = this.body.querySelectorAll('.section__event')
    this.section = this.body.querySelectorAll('.section--animate')

  },
  fadeIn(el,) {
    let controller = new ScrollMagic.Controller()

    $(el).each(function () {
      let self = this
      console.dir(self);
      let movethebox = new TimelineMax()
      .fromTo(self, 1, {y: 90, autoAlpha: 0, }, {y: 0, autoAlpha: 1, ease: Sine.easeInOut})
      new ScrollMagic.Scene({
        triggerElement: self,
        duration: '80%',
        offset: 200,
        triggerHook: "onEnter",
        // reverse: false
      }).setTween(movethebox)
        .addIndicators({
        name: 'section',
        colorTrigger: 'black',
        colorStart: 'pink',
        colorEnd: 'green',
        indent: 100
      }).addTo(controller)

    })
  },

}
module.exports = SectionsApear
