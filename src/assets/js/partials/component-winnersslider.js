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
    /** in the app.js we defined a new function in the $.fn object and can therefore access it from our $ object just like other jQUERY functions stored there */
    $(this.select).exists( () => {
      this.select.addEventListener('change', this.getSelectValue.bind(this))
    })

    /** for demonstration purposes we could use a try/catch to get an soft error instead of calling our exsits function (defined above) in the component-*.js files */
    // try {
    //   this.select.addEventListener('change', this.getSelectValue.bind(this))
    // } catch (error) {
    //   console.log(error.message)
    // }
  },
  setCarousel(slider, sliderOptions) {
    $(slider).owlCarousel(sliderOptions)
  },
  destroyCarousel(slider) {
    $(slider).trigger('destroy.owl.carousel')
  },
  getSelectValue(e) {
    // console.log(e.target.value)
    const ajaxReques = {'action' : 'ajax_request', 'id': e.target.value}
    Global.postAjax(ajaxReques).done(this.changeSlider)

  },

  changeSlider(res) {
    // console.log(res)
    // WinnersSlider.sliderHeader.innerHTML = ''
    WinnersSlider.destroyCarousel(WinnersSlider.slider)
    let newSlider = ''
    const acf = res.acf
    const aWinners = acf.winners_slider
    let winner
    let winnerHasUrl
    let winnerHasUrlBegin
    let winnerHasUrlEnd
    for (let i = 0; i < aWinners.length; i++) {
      winner = aWinners[i]
      winnerHasUrlBegin = winner.winner_url ? `<a class="winners-slide__link" href="${winner.winner_url.url}" target="_blank">` : '';
      winnerHasUrlEnd = winner.winner_url ? `</a>` : '';
      newSlider += `
        <div class="winners-slide">
          ${winnerHasUrlBegin}
          <div class="winners-slide__img" style="background-image: url(${winner.winner_screenshot.sizes.medium});"></div>
          <div class="section__text-color--white winners-slide__category">${winner.winner_category}</div>
          <h3 class="section__text-color--white winners-slide__heading">${winner.winner_name}</h3>
          <div class="section__text-color--white text--small winners-slide__text">
            ${winner.winner_notes}
          </div>
          ${winnerHasUrlEnd}
        </div>`
    }
    // WinnersSlider.sliderHeader.innerHTML = res.post.post_title
    WinnersSlider.slider.innerHTML = ''
    WinnersSlider.slider.insertAdjacentHTML('beforeend', newSlider)
    WinnersSlider.setCarousel(WinnersSlider.slider, WinnersSlider.sliderOptions)
  },

  sliderOptions : {
    stagePadding: 0,
    loop: true,
    margin: 0,
    items: 3,
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
            items: 3,
            margin: 0,
            stagePadding: 0
        }
    }
  }
}

module.exports = WinnersSlider
