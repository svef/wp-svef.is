import GlobalFunctions from '../global-functions'
const Header = {
  init() {
    this.cacheDom()
    this.addEvents()
  },
  cacheDom: function () {
    this.body = document.querySelector('body')
    this.header = this.body.querySelector('.site-header')
    this.btnMenu = this.body.querySelector('#btnMenu')
    this.sideMenu = this.body.querySelector('.side-menu')
    this.btnContrast = this.body.querySelector('.nav__suprise')
  },
  addEvents() {
    this.btnMenu.addEventListener('click', this.handleMenuClick.bind(this))
    this.body.addEventListener('click', this.clickedOutSideMenu.bind(this))
    this.body.addEventListener('keyup', this.escapeMenu.bind(this))
    this.btnContrast.addEventListener('click', this.clickSiteContrast.bind(this))
    window.addEventListener('scroll', this.windowScrollHandler.bind(this))
  },
  handleMenuClick(e) {
    e.preventDefault()
    if(this.btnMenu.classList.contains('nav__menu-button--clicked')) {
      this.btnMenu.classList.remove('nav__menu-button--clicked')
      this.sideMenu.classList.remove('side-menu--active')
    } else {
      this.btnMenu.classList.add('nav__menu-button--clicked')
      this.sideMenu.classList.add('side-menu--active')
    }
  },
  windowScrollHandler(e) {
    if (e.target.scrollingElement.scrollTop > 160) {
      this.header.classList.add('site-header--shadow')
    } else {
      this.header.classList.remove('site-header--shadow')
    }
  },
  clickedOutSideMenu(e) {
    if (e.target != this.btnMenu && this.sideMenu.classList.contains('side-menu--active') && !this.sideMenu.contains(e.target) && !GlobalFunctions.isDescendant(this.sideMenu, e.target)) {
      this.sideMenu.classList.remove('side-menu--active')
      this.btnMenu.classList.remove('nav__menu-button--clicked')
    }
  },
  escapeMenu(e) {
    if (this.sideMenu.classList.contains('side-menu--active') && e.code == 'Escape') {
      this.sideMenu.classList.remove('side-menu--active')
      this.btnMenu.classList.remove('nav__menu-button--clicked')
    }
  },
  clickSiteContrast(e) {
    if (!this.body.classList.contains('body--contrast')) {
      this.body.classList.add('body--contrast')
    } else {
      this.body.classList.remove('body--contrast')
    }
  }
}

module.exports = Header;
