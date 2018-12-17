import Global from "../global-functions"
const CookieConsent = {
  init(){
    this.cacheDom()
    this.addEvents()
    this.checkIfConsentExists()
  },
  cacheDom(){
    this.body = Global.body
    this.btnOk = this.body.querySelector('#btnCookieConsent')
    this.sectionCookie = this.body.querySelector('.section__cookie')
  },
  addEvents(){
    this.btnOk.addEventListener('click', this.handleBtnOkClick.bind(this))
  },
  handleBtnOkClick(e) {
    this.sectionCookie.classList.remove('section__cookie--active')
    Global.setCookie('consent', 'true', 30)
  },
  checkIfConsentExists() {
    const sCookieState = Global.getCookie('consent')
    if (sCookieState != 'true') {
      this.sectionCookie.classList.add('section__cookie--active')
    }
  }
}
module.exports = CookieConsent
