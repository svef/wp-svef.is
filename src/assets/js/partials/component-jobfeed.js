import $ from 'jquery'
import Global from '../global-functions'

const JobFeed = {
  init() {
    this.cacheDOM()
    $(this.jobFeed).exists(() => {
      this.getJobFeed()
    })

  },
  cacheDOM() {
    this.body = Global.body;
    this.jobFeed = this.body.querySelector('.section--jobfeed')
    this.jobFeedContaier = this.body.querySelector('.section--jobfeed__feed')
  },

  getJobFeed() {
    // Here we call the action we defined in library/svef/custom-scraper.php but only if we are on a page with the member section loaded
      const ajaxReques = { 'action': 'ajax_scrape_rss' }
      // instead of using a success function inside out $.ajax function in the Global functins file we can tag a done() function and wait for the promize to resolve and then run our handleDataFeed function
      Global.postAjax(ajaxReques).done(this.handleDataFeed.bind(this))
  },
  handleDataFeed(feed) {
    // console.log(feed)
    // here we have some fun with the data that just got returned to us from our scraper/rss feed
    // first we make shure the container is empty
    this.jobFeedContaier.innerHTML = ''
    let cards = ''
    let cardTitle = ''
    let cardCompany = ''
    let cardLink = ''
    let cardDate = ''
    let feedData
    let offset
    // we make a for loop that loops 4 times (4 card on page) and stor the string in a variable
    for (let i = 0; i <= 3; i++) {
      // we are using a css grid and our cards are offest in a different way. We use an extended ternary to set the correct large-offset-(n)
      offset = i < 1 ? 2 : i == 1 ? 0 : i > 1 && i % 2 ? 0 : 1
      // Who likes writint square brackets and i over and oever again
      feedData = feed[i]
      cardTitle = feedData.rss.title
      // some titles are to long and we cant realy controll that. but we can shorten them a little
      cardTitle = cardTitle.length < 20 ? cardTitle : cardTitle.substring(0, 20) + ' ...'
      cardCompany = feedData.scrape.company
      cardLink = feedData.rss.link
      cardDate = feedData.scrape.date
      cards += `<div class="section--jobfeed__feed-card cell small-12 small-offset-0 medium-6 medium-offset-0 large-5 large-offset-${offset}">
                  <a href="${cardLink}" target="_blank">
                    <p class="text--small">${cardDate}</p>
                    <div class="card-title-arrow">
                      <p class="text--card section__link">${cardTitle} ${Global.svgLibrary('linkArrow',' link-arrow--white ')}</p>
                    </div>
                    <p class="text--large">${cardCompany}</p>
                  </a>
                </div>`
    }
    // and then we insert our newly produced html to the container
    this.jobFeedContaier.insertAdjacentHTML('beforeend', cards)
  }
}


module.exports = JobFeed
