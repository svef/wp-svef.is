import Global from '../global-functions'

const Header = {

  init() {
    this.cacheDom()
    this.addEvents()
    this.navBarScrollBehaviour(this.header)

  },
  cacheDom: function () {
    this.body = Global.body;
    // this.body = document.querySelector('body')
    this.header = this.body.querySelector('.site-header')
    this.btnMenu = this.body.querySelector('#btnMenu')
    this.sideMenu = this.body.querySelector('.side-menu')
    this.btnContrast = this.body.querySelector('.nav__suprise')
    this.sideSignupOverlay = this.body.querySelector('.side-signup-overlay')
  },
  addEvents() {
    this.btnMenu.addEventListener('click', this.handleMenuClick.bind(this))
    this.body.addEventListener('click', this.clickedOutSideMenu.bind(this))
    this.body.addEventListener('keyup', this.escapeMenu.bind(this))
    this.btnContrast.addEventListener('click', this.clickSiteContrast.bind(this))
    window.addEventListener('scroll', this.windowScrollHandler.bind(this))
  },
  handleMenuClick(e) {
    if(this.btnMenu.classList.contains('nav__menu-button--clicked')) {
      this.btnMenu.classList.remove('nav__menu-button--clicked')
      this.sideMenu.classList.remove('side-menu--active')
      this.sideSignupOverlay.classList.remove('side-signup-overlay--active')
    } else {
      this.btnMenu.classList.add('nav__menu-button--clicked')
      this.sideMenu.classList.add('side-menu--active')
      this.sideSignupOverlay.classList.add('side-signup-overlay--active')
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
    if (e.target != this.btnMenu && this.sideMenu.classList.contains('side-menu--active') && !this.sideMenu.contains(e.target) && !Global.isDescendant(this.sideMenu, e.target)) {
      this.sideMenu.classList.remove('side-menu--active')
      this.btnMenu.classList.remove('nav__menu-button--clicked')
      this.sideSignupOverlay.classList.remove('side-signup-overlay--active')
    }
  },
  escapeMenu(e) {
    if (this.sideMenu.classList.contains('side-menu--active') && e.code == 'Escape') {
      this.sideMenu.classList.remove('side-menu--active')
      this.btnMenu.classList.remove('nav__menu-button--clicked')
      this.sideSignupOverlay.classList.remove('side-signup-overlay--active')
    }
  },
  clickSiteContrast(e) {
    if (!this.body.classList.contains('body--contrast')) {
      this.body.classList.add('body--contrast')
    } else {
      this.body.classList.remove('body--contrast')
    }
  },
  navBarScrollBehaviour(header) {
    let statPos = 0
    let scrollPos = 0
    let scrollUp
    $(window).scroll(function(event) {
      var st = $(this).scrollTop();
      scrollPos = $(document).scrollTop();
      if (scrollPos > 80) {
        $(header).addClass('scrolledTop');
        if (st < statPos){
          scrollUp = true;
          $(header).removeClass('scrolledTop');
        } else {
          scrollUp = false;
        }
        statPos = st;
      }
    });
  }
}


module.exports = Header;
