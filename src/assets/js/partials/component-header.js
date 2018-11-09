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
  },
  addEvents() {
    this.btnMenu.addEventListener('click', this.handleMenuClick.bind(this))
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
  }
}

module.exports = Header;
