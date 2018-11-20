import $ from 'jquery'
import Global from '../global-functions'


const Members = {
  init() {
    this.cacheDOM()
    this.addEvent()
    this.getJobFeed()

  },
  cacheDOM() {
    this.body = document.querySelector('body');
    this.jobFeed = this.body.querySelector('.section--jobfeed')
    this.jobFeedContaier = this.body.querySelector('.section--jobfeed__feed')
  },
  addEvent() {
    $(this.jobFeed).exists(() => {
      this.jobFeed.addEventListener('load', this.getJobFeed.bind(this))
    })

  },
  getJobFeed() {
    $(this.jobFeed).exists(() => {
      const ajaxReques = { 'action': 'ajax_scrape_rss' }
      Global.postAjax(ajaxReques).done(this.handleDataFeed)
    })
  },
  handleDataFeed(feed) {
    console.log(feed)
    let theFeed = feed
    Members.jobFeedContaier.innerHTML = ''
    let cards = ''
    let cardTitle = ''
    let cardCompany = ''
    let cardLink = ''
    let cardDate = ''
    let feedData
    let offset

    for (let i = 0; i <= 3; i++) {
      offset = i < 1 ? 2 : i == 1 ? 0 : i > 1 && i % 2 ? 0 : 1
      feedData = feed[i]
      cardTitle = feedData.rss.title
      cardCompany = feedData.scrape.company
      cardLink = feedData.rss
      cardDate = feedData.scrape.date
      cards += `<div class="section--jobfeed__feed-card cell large-5 large-offset-${offset}">
                  <a href="${cardLink}">
                      <p class="text--small">${cardDate}</p>
                      <div class="card-title-arrow">
                          <p class="text--card">${cardTitle} ${Global.linkArrow('link-arrow link-arrow--white')}</p>
                      </div>
                      <p class="text--large">${cardCompany}</p>
                  </a>
              </div>`

    }
    console.log(cards)
    Members.jobFeedContaier.insertAdjacentHTML('beforeend', cards)
  }
}


module.exports = Members
