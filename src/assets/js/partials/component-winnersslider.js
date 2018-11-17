import $ from 'jquery'
import 'owl.carousel'
import Global from '../global-functions'

const WinnersSlider = {
  init() {
    this.cacheDOM()
    this.addEvent()
    this.setCarousel(this.slider, this.sliderOptions)
  },
  cacheDOM() {
    this.body = document.querySelector('body')
    this.slider = this.body.querySelector('#winnersSlider')
    this.select = this.body.querySelector('#selectWinnerYear')
    this.sliderHeader = this.body.querySelector('#sliderHeading')

  },
  addEvent() {
    this.select.addEventListener('change', this.getSelectValue.bind(this))
  },
  setCarousel(slider, sliderOptions) {
    $(slider).owlCarousel(sliderOptions)
  },
  destroyCarousel(slider) {
    $(slider).trigger('destroy.owl.carousel')
  },
  getSelectValue(e) {
    const ajaxReques = {'action' : 'ajax_request', 'id': e.target.value}
    Global.postAjax(ajaxReques).done(this.changeSlider)

  },

  changeSlider(res) {
    console.log(res)
    WinnersSlider.sliderHeader.innerHTML = ''
    WinnersSlider.destroyCarousel(WinnersSlider.slider)
    let newSlider = ''
    const acf = res.acf
    const aWinners = acf.winners_slider
    let winner
    for (let i = 0; i < aWinners.length; i++) {
      winner = aWinners[i]
      newSlider += `<div class="winners-slide">
                      <div class="winners-slide__img" style="background-image: url(${winner.winner_screenshot.sizes.medium});"></div>
                      <div class="section__text-color--white winners-slide__category">${winner.winner_category}</div>
                      <h3 class="section__text-color--white winners-slide__heading">${winner.winner_name}</h3>
                      <div class="section__text-color--white text--small winners-slide__text">
                        ${winner.winner_notes}
                      </div>
                    </div>`

    }
    WinnersSlider.sliderHeader.innerHTML = res.post.post_title
    WinnersSlider.slider.innerHTML = ''
    WinnersSlider.slider.insertAdjacentHTML('beforeend', newSlider)
    WinnersSlider.setCarousel(WinnersSlider.slider, WinnersSlider.sliderOptions)
  },

  sliderOptions : {
    stagePadding: 0,
    loop: true,
    // margin: 0,
    // items: -1,
    autoplay: true,
    autoplaySpeed: 1500,
    autoplayTimeout: 10000,
    navigation : false,
    slideSpeed : 500,
    paginationSpeed : 800,
    rewindSpeed : 1000,
    singleItem: true,
    stopOnHover : true,
    lazyLoad: true,
    responsive: {
        0: {
            items: 2,
            margin: 166,
            stagePadding: 0
        },
        640: {
            items: 3,
            margin: 0,
            stagePadding: 0
        },
        910: {
            items: 3,
            margin: 0,
            stagePadding: 0
        },
        1200: {
            items: 4,
            margin: 0,
            stagePadding: 0
        }
    }
  }
}

module.exports = WinnersSlider
