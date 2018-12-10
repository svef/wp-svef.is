import $ from 'jquery'
import Global from '../global-functions'
const MemberPage = {
  init() {
    this.cacheDom()
    this.addEvents()
  },

  selectedParameter: Global.getUrlParam('member')[0],

  cacheDom(){
    this.body = Global.body
    this.boardBodyClass = this.body.querySelector('.page-template-board')
    this.selectedMember = this.body.querySelector('#'+this.selectedParameter)
  },

  addEvents() {
    $(this.selectedMember).exists(() => {
      window.addEventListener('DOMContentLoaded', this.scrollToId.bind(this))
    })
  },

  scrollToId(e) {
    $([document.documentElement, this.body])
      .animate({scrollTop: $(this.selectedMember).offset().top}, 1000);
  }
}
module.exports = MemberPage
