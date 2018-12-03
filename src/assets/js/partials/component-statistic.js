import Global from '../global-functions';


const Statisticslider = {

    init() {
        this.cacheDom()
        this.addEvents()
        document.documentElement.classList.add('js')
    },
    cacheDom(){
        this.body = Global.body
        this.humanSlider = this.body.querySelector('#humanSlider')
        this.humanSliderValue = this.body.querySelector('#humanSliderValue')
        this.humanSliderItem = this.body.querySelectorAll('.slider__humans--itemEach')
        this._R = this.body.querySelector('[type=range]')
    },
    addEvents(){
        this.humanSlider.addEventListener('input', this.handleSliderChange.bind(this))
        this._R.addEventListener('input', function(e){
            Statisticslider._R.style.setProperty('--val', +Statisticslider._R.value)
        }, false)
    },
    handleSliderChange(e){
        this.humanSliderValue.value = e.target.value;
        let minValue = e.target.min
        let maxValue = e.target.max
        let currentValue = e.target.value

        let percent = Math.round(((currentValue - minValue) / (maxValue - minValue)) * 100);
        for (let i = 0; i < this.humanSliderItem.length; i++) {
            if( Math.round(i*3.3) < percent ) {
                this.humanSliderItem[i].classList.add('slider__humans--itemEach--show')
            } else {
                this.humanSliderItem[i].classList.remove('slider__humans--itemEach--show')
            }

        
        }

        
        console.dir(percent);
    }
}


module.exports = Statisticslider;