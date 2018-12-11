import $ from 'jquery'
import Global from '../global-functions'
import ScrollMagic from 'scrollmagic/scrollmagic/minified/ScrollMagic.min';
import 'scrollmagic/scrollmagic/minified/plugins/animation.gsap.min';
import 'scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min';
// import TweenMax from 'gsap/src/minified/TweenMax.min';
// import TimelineMax from 'gsap/src/minified/TimelineMax.min';
const Statisticslider = {

  init() {
    this.cacheDom()
    $(this.humanSlider).exists(() => {
      this.addEvents()
      this.scrollSchene()
    })

    document.documentElement.classList.add('js')
  },
  cacheDom() {
    this.body = Global.body
    this.humanSlider = this.body.querySelector('#humanSlider')
    this.humanSliderValue = this.body.querySelector('#humanSliderValue')
    this.humanSliderItems = this.body.querySelectorAll('.slider__humans--itemEach')
    // this._R = this.body.querySelector('[type=range]')
  },
  addEvents() {
    this.humanSlider.addEventListener('input', this.handleSliderChange.bind(this), false)
  },
  handleSliderChange(e) {
    this.humanSliderValue.innerHTML = e.target.value;
    this.humanSlider.style.setProperty('--val', +this.humanSlider.value)
    let minValue = e.target.min
    let maxValue = e.target.max
    let currentValue = e.target.value
    let iHumanItems = this.humanSliderItems.length
    let iHumanToPercentRatio = 100/iHumanItems
    let percent = Math.round(((currentValue - minValue) / (maxValue - minValue)) * 100);
    for (let i = 0; i < iHumanItems; i++) {
      if (Math.round(i * iHumanToPercentRatio) < percent) {
        this.humanSliderItems[i].classList.add('slider__humans--itemEach--show')
      } else {
        this.humanSliderItems[i].classList.remove('slider__humans--itemEach--show')
      }
    }
  },
  scrollSchene() {
    let controller = new ScrollMagic.Controller()
    new ScrollMagic.Scene({
      triggerElement: '#humanSlider',
      duration: '50%',
      offset: 0,
      triggerHook: "onEnter",
      // reverse: false
    })
      // .addIndicators({
      // name: 'slider',
      // colorTrigger: 'black',
      // colorStart: 'pink',
      // colorEnd: 'green'
      // })
      .addTo(controller).on('progress', this.scrollProgress.bind(this))
  },
  scrollProgress(e) {
    this.humanSlider.style.setProperty('--val', +this.humanSlider.value)
    this.humanSlider.value = Math.round((e.progress * 100) * 3.3333);
    this.humanSliderValue.innerHTML = this.humanSlider.value
    let iHumanItems = this.humanSliderItems.length
    let iHumanToPercentRatio = 100/iHumanItems
    let percent = Math.round((e.progress * 100))
    for (let i = 0; i < iHumanItems; i++) {
      if (Math.round(i * iHumanToPercentRatio) < percent) {
        this.humanSliderItems[i].classList.add('slider__humans--itemEach--show')
      } else {
        this.humanSliderItems[i].classList.remove('slider__humans--itemEach--show')
      }
    }
}
}


module.exports = Statisticslider;
