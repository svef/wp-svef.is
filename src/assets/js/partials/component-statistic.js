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
      duration: '30%',
      offset: -0.7,
      triggerHook: "onEnter",
      reverse: false
    })
    .addTo(controller).on('progress', this.scrollProgress.bind(this))
    // .addIndicators({
    //   name: 'slider',
    //   colorTrigger: 'black',
    //   colorStart: 'pink',
    //   colorEnd: 'green'
    //   })
  },
  scrollProgress(e) {
    let scrollValue = Math.round(e.progress * this.humanSlider.max);
    this.humanSlider.style.setProperty('--val', scrollValue)
    this.humanSlider.value = scrollValue
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
