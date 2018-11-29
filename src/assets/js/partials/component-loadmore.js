import $ from 'jquery'
import Global from '../global-functions'

const LoadMorePosts = {
  init(){
    this.cacheDom()
    this.addEvents()

  },
  cacheDom(){
    this.body = Global.body
    this.btnLoad = this.body.querySelector('.btnShowMore')
    this.eventsContainer = this.body.querySelector('.events-container')

  },
  addEvents(){
    $(this.btnLoad).exists( () => {
      this.btnLoad.addEventListener('click', this.getNextPage.bind(this))
    })

  },
  getNextPage() {
    const action = 'get_next_events_page'
    const iPage = this.btnLoad.getAttribute('data-current-page')
    let ajaxRequest = {}
    ajaxRequest.action = action
    ajaxRequest.curr_page = iPage
    Global.postAjax(ajaxRequest).done(this.handleReturnedPosts)
  },
  handleReturnedPosts(posts) {
    // console.log(posts)
    const aPosts = posts.post_data
    let rendered_event = ''
    let post = ''
    let eventOffset = 0
    let directlinkIsSett = false
    let linkHref = ''
    let linkTarget = ''
    let eventDate = ''
    let eventTitle = ''
    let eventLocation = ''
    let eventExcerpt = ''
    let linkArrowClass = 'link_arrow link-arrow--white'
    const maxNumPages = posts.max_num_pages
    const currentPage = posts.new_page_number
    for (let i = 0; i < aPosts.length; i++) {
      post = aPosts[i]
      eventOffset = i % 2 ? 7 : 2
      directlinkIsSett = post.acf.direct_link_off_page
      linkHref = directlinkIsSett ? post.acf.direct_link.url : post.wp.permalink
      linkTarget = directlinkIsSett ? post.acf.direct_link.target : ''
      eventDate = post.acf.event_start_date
      eventTitle = post.wp.post_title
      eventLocation = post.acf.event_location
      eventExcerpt = post.wp.custom_excerpt
      rendered_event += `
      <div class="section__event small-8 small-offset-2 medium-5 medium-offset-${eventOffset} large-5 large-offset-${eventOffset}">
        <a href="${linkHref}" target="${linkTarget}">
          <span class="link-text--menu link-text--dull">${eventDate}</span>
          <h2 class="less-margin--top less-margin--bottom">${eventTitle}${Global.linkArrow(linkArrowClass)}</h2>
          <h3 class="less-margin--top less-margin--bottom">${eventLocation}</h3>
          <p class="section__event--border link-text--menu link-text--menu--normal-case">
            ${eventExcerpt}
          </p>
        </a>
      </div>`
    }
    LoadMorePosts.eventsContainer.insertAdjacentHTML('beforeend', rendered_event)
    console.log(currentPage)
    LoadMorePosts.btnLoad.setAttribute('data-current-page', currentPage)
    if (maxNumPages == currentPage) {
      LoadMorePosts.btnLoad.classList.add('hide')
    }
  }
}
module.exports = LoadMorePosts
