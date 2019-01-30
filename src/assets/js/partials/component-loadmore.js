import $ from 'jquery'
import Global from '../global-functions'
import Animation from '../scrollmagic-functions'
const LoadMorePosts = {
  init(){
    this.cacheDom()
    this.addEvents()

  },
  cacheDom(){
    this.body = Global.body
    this.btnLoad = this.body.querySelector('.btnShowMore')
    this.eventsContainer = this.body.querySelector('.events-container')
    this.btnGetMoreNews = this.body.querySelector('#btnGetMoreNews')
    this.newsContainer = this.body.querySelector('.section__news__inner')
  },
  addEvents(){
    $(this.btnLoad).exists( () => {
      this.btnLoad.addEventListener('click', this.getNextEventsPage.bind(this))
    })

    $(this.btnGetMoreNews).exists(() => {
      this.btnGetMoreNews.addEventListener('click', this.getNextNewsPage.bind(this))
    })
  },
  getNextNewsPage() {
    const action = 'get_next_page'
    const iPage = this.btnGetMoreNews.getAttribute('data-current-page')
    let ajaxRequest = {}
    ajaxRequest.action = action
    ajaxRequest.curr_page = iPage
    ajaxRequest.post_type = 'post'
    Global.postAjax(ajaxRequest).done(this.handleReturnedNews.bind(this))
  },
  handleReturnedNews(jPostData) {
    let posts = jPostData.post_data
    let rendered_post = ''
    let postLink = ''
    let newsImgGallery = false
    let infoContainerClasses = ''
    let date = ''
    let postTitle = ''
    let excerpt = ''
    const maxNumPages = posts.max_num_pages
    const currentPage = posts.new_page_number
    for (let i = 0; i < posts.length; i++) {
      const post = posts[i];
      postLink = post.wp.permalink
      newsImgGallery = post.acf.news_image_gallery && post.acf.news_image_gallery.length > 0 ? `<div class="img small-11 medium-4">
      <img src="${post.acf.news_image_gallery[0].sizes.medium}" alt=""></div>` : ''
      infoContainerClasses = post.acf.news_image_gallery && post.acf.news_image_gallery.length > 0 ? 'small-12 medium-6' : 'small-12 medium-10'
      date = post.wp.localised_date
      postTitle = post.wp.post_title
      excerpt = post.wp.custom_excerpt
      rendered_post += `
        <div class="loadmore grid-x">
          <a href="${postLink}" class="section__news--item grid-x small-10 small-offset-1 medium-10 medium-offset-2">
          ${newsImgGallery}
            <div class="${infoContainerClasses}">
              <span class="text--date text-color--black-40">${date}</span>
              <h2 class="text--under-title text--collapse-top less-margin--bottom">${postTitle}${Global.svgLibrary('linkArrow', 'link-arrow link-arrow--black')}</h2>
              <p class="text--padding-left section__news--p">${excerpt}</p>
            </div>
          </a>
        </div>`
    }
    this.newsContainer.insertAdjacentHTML('beforeend', rendered_post)
    // console.log(rendered_post)
    this.btnGetMoreNews.setAttribute('data-current-page', currentPage)
    if (maxNumPages == currentPage) {
      this.btnGetMoreNews.classList.add('hide')
    }
    this.loadedNews = this.body.querySelectorAll('.loadmore')
    Animation.fadeInOnLoadmore(this.loadedNews)

  },
  getNextEventsPage() {
    const action = 'get_next_page'
    const iPage = this.btnLoad.getAttribute('data-current-page')
    let ajaxRequest = {}
    ajaxRequest.action = action
    ajaxRequest.curr_page = iPage
    ajaxRequest.post_type = 'events'
    Global.postAjax(ajaxRequest).done(this.handleReturnedEvents.bind(this))
  },
  handleReturnedEvents(posts) {
    // console.log(posts)
    const aPosts = posts.post_data
    let rendered_event = ''
    let post = ''
    let eventOffset = 0
    // let directlinkIsSett = false
    let linkHref = ''
    let linkTarget = ''
    let eventDate = ''
    let eventTitle = ''
    let eventLocation = ''
    let eventExcerpt = ''
    let eventHasPassed = ''
    let eventHasPassedClass = ''
    let renderLink = ''
    let linkArrowClass = 'link-arrow--white'
    let linkStart = ''
    let linkEnd = ''
    const maxNumPages = posts.max_num_pages
    const currentPage = posts.new_page_number
    for (let i = 0; i < aPosts.length; i++) {
      post = aPosts[i]
      eventOffset = i % 2 ? 7 : 2
      // directlinkIsSett = post.acf.direct_link_off_page
      linkHref = post.wp.permalink
      // linkTarget = directlinkIsSett ? post.acf.direct_link.target : ''
      eventDate = post.wp.local_date
      eventTitle = post.wp.post_title
      eventLocation = post.acf.event_location
      eventExcerpt = post.wp.custom_excerpt
      eventHasPassed = post.wp.event_is_over
      renderLink = eventHasPassed ? '' : linkHref
      eventHasPassedClass = post.wp.event_is_over_class
      linkStart = !eventHasPassed ? `<a href="${renderLink}">` : ''
      linkEnd = !eventHasPassed ? `</a>` : ''
      rendered_event += `
      <div class="section__event ${eventHasPassedClass} loadmore small-10 small-offset-1 medium-5 medium-offset-${eventOffset} large-5 large-offset-${eventOffset}">
        ${linkStart}
          <span class="link-text--menu link-text--dull">${eventDate}</span>
          <h2 class="less-margin--top less-margin--bottom">${eventTitle}${Global.svgLibrary('linkArrow', linkArrowClass)}</h2>
          <h3 class="less-margin--top less-margin--bottom">${eventLocation}</h3>
          <p class="section__event--border link-text--menu link-text--menu--normal-case">
            ${eventExcerpt}
          </p>
        ${linkEnd}
      </div>`
    }
    this.eventsContainer.insertAdjacentHTML('beforeend', rendered_event)
    this.btnLoad.setAttribute('data-current-page', currentPage)
    if (maxNumPages == currentPage) {
      this.btnLoad.classList.add('hide')
    }
    this.loadedEvents = this.body.querySelectorAll('.loadmore')
    Animation.fadeInOnLoadmore(this.loadedEvents)
  }
}
module.exports = LoadMorePosts
