import Global from '../global-functions';


const Statisticslider = {

  init() {
    this.cacheDom()
    this.addEvents()
    document.documentElement.classList.add('js')
  },
  cacheDom() {
    this.body = Global.body
    this.humanSlider = this.body.querySelector('#humanSlider')
    this.humanSliderValue = this.body.querySelector('#humanSliderValue')
    this.humanSliderItems = this.body.querySelectorAll('.slider__humans--itemEach')
    this._R = this.body.querySelector('[type=range]')
  },
  addEvents() {
    this.humanSlider.addEventListener('input', this.handleSliderChange.bind(this), false)
  },
  handleSliderChange(e) {
    this.humanSliderValue.innerHTML = e.target.value;
    Statisticslider._R.style.setProperty('--val', +Statisticslider._R.value)
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
  }
}


module.exports = Statisticslider;
