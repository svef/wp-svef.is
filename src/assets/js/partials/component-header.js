import Global from '../global-functions'
import TimelineMax from 'gsap/src/minified/TimelineMax.min';
import { Sine } from 'gsap';

const Header = {
  init() {
    this.cacheDom()
    this.addEvents()
    this.navBarScrollBehaviour(this.header)
    this.checkForBrowserType()
    Global.addAriaLabel(this.languageLinkIs, 'aria-label', 'Túngumála tengill til að velja Íslensku')
    Global.addAriaLabel(this.languageLinkEn, 'aria-label', 'language selector for English')
    // this.checkForDarkmode()
  },
  cacheDom() {
    this.body = Global.body;
    this.body = document.querySelector('body')
    this.header = this.body.querySelector('.site-header')
    this.btnMenu = this.body.querySelector('#btnMenu')
    this.sideMenu = this.body.querySelector('.side-menu')
    this.btnContrast = this.body.querySelector('.nav__suprise')
    this.btnContrastMobile = this.body.querySelector('.nav__suprise--mobile')
    this.menuOverlay = this.body.querySelector('.menu-overlay')
    this.btnOpenSignup = this.body.querySelector('#btnOpenSignup')
    this.btnOpenSignupMobile = this.body.querySelector('#btnOpenSignupMobile')
    this.sideSignup = this.body.querySelector('.side-signup')
    this.sideSignupOverlay = this.body.querySelector('.side-signup-overlay')
    this.languageLinkIs = this.body.querySelectorAll('.lang-item-is a')
    this.languageLinkEn = this.body.querySelectorAll('.lang-item-en a')
    this.menuListItems = this.body.querySelectorAll('.menu-item')
  },

  addEvents() {
    this.btnMenu.addEventListener('click', this.handleMenuClick.bind(this))
    this.body.addEventListener('click', this.clickedOutSideMenu.bind(this))
    this.body.addEventListener('keyup', this.escapeMenu.bind(this))
    this.btnContrast.addEventListener('click', this.clickSiteContrast.bind(this))
    this.btnContrastMobile.addEventListener('click', this.clickSiteContrast.bind(this))
    window.addEventListener('scroll', this.windowScrollHandler.bind(this))
  },

  animateMenuItems(element){
    let delayTime = 0
    $(element).each(function (){
      let self = this
      let tl = new TimelineMax();
      tl.fromTo(self, 0.8, {opacity: 0, x: 120},{delay: delayTime, opacity: 1, x: 0, ease: Expo.easeOut})
      delayTime += 0.04
    })
  },
  handleMenuClick(e) {
    if(this.btnMenu.classList.contains('nav__menu-button--clicked')) {
      this.btnMenu.classList.remove('nav__menu-button--clicked')
      this.sideMenu.classList.remove('side-menu--active')
      this.menuOverlay.classList.remove('menu-overlay--active')
      this.body.style.overflow = 'auto'
    } else if (this.sideSignup.classList.contains('side-signup--active')) {
      btnOpenSignup.classList.remove('btnSignup--clicked')
      btnOpenSignupMobile.classList.remove('btnSignup--clicked')
      this.sideSignup.classList.remove('side-signup--active')
      this.sideSignupOverlay.classList.remove('side-signup-overlay--active')
      this.btnMenu.classList.add('nav__menu-button--clicked')
      this.sideMenu.classList.add('side-menu--active')
      this.menuOverlay.classList.add('menu-overlay--active')
      this.body.style.overflow = 'hidden'
      btnOpenSignup.blur()
      btnOpenSignup.innerHTML = 'Skráning í SVEF'
    } else {
      this.btnMenu.classList.add('nav__menu-button--clicked')
      this.animateMenuItems(this.menuListItems)
      this.sideMenu.classList.add('side-menu--active')
      this.menuOverlay.classList.add('menu-overlay--active')
      this.body.style.overflow = 'hidden'
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
      this.menuOverlay.classList.remove('menu-overlay--active')
      this.body.style.overflow = 'auto'
    }
  },
  escapeMenu(e) {
    if (this.sideMenu.classList.contains('side-menu--active') && e.code == 'Escape') {
      this.sideMenu.classList.remove('side-menu--active')
      this.btnMenu.classList.remove('nav__menu-button--clicked')
      this.menuOverlay.classList.remove('menu-overlay--active')
      this.body.style.overflow = 'auto'
    }
  },
  clickSiteContrast(e) {
    let ajaxObj = {}
    ajaxObj.action = "set_darkmode"
    if (!this.body.classList.contains('body--contrast')) {
      this.body.classList.add('body--contrast')
      Global.setCookie('isDark', 'true', 1)
      ajaxObj.isDark = true
      Global.setCookie('isDark', 'true', 1)
      Global.postAjax(ajaxObj).done(function (jData) {
        // we could add some kind of easter egg when darkmode is turned on here
        return true
      })
    } else {
      this.body.classList.remove('body--contrast')
      Global.setCookie('isDark', 'false', 1)
      ajaxObj.isDark = false
      Global.setCookie('isDark', 'false', 1)
      Global.postAjax(ajaxObj).done(function (jData) {
        // same with easter egg when darkmod is turned off
        return false
      })
    }
  },
/*   checkForDarkmode() {
    let isDark = Global.getCookie('isDark')
    if (isDark && isDark == 'true' && ! this.body.classList.contains('body--contrast')) {
      this.body.classList.add('body--contrast')
    }
    if (isDark && isDark == 'false' && this.body.classList.contains('body--contrast')) {
      this.body.classList.remove('body--contrast')
    }
  }, */
  navBarScrollBehaviour(header) {
    let statPos = 0
    let scrollPos = 0
    let scrollUp
    $(window).scroll(function(event) {
      let st = $(this).scrollTop();
      scrollPos = $(document).scrollTop();
      if (scrollPos > 80) {
        $(header).addClass('scrolledTop');
        if (st < statPos){
          scrollUp = true;
          $(header).removeClass('scrolledTop');
          // $(this.btnOpenSignup).css('margin-top', '0px')
          $(this.btnOpenSignup).css('margin-top', '-'+$(header).height()+'px')
        } else {
          scrollUp = false;
          $(this.btnOpenSignup).css('margin-top','0')
        }
        statPos = st;
      }
    });
  },
  checkForBrowserType() {

    const browsers = {
      // Opera 8.0+
      isOpera: (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0 ? 'opera' : false,
      // Firefox 1.0+
      isFirefox: typeof InstallTrigger !== 'undefined' ? 'fireFox' : false,
      // Safari 3.0+ "[object HTMLElementConstructor]"
      isSafari:  /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification)) ? 'safari' : false,
      // Internet Explorer 6-11
      isIE: !!document.documentMode ? 'ie' : false,
      // Edge 20+
      isEdge: !this.isIE && !!window.StyleMedia ? 'edge' : false,
      // Chrome 1 - 68
      isChrome: !!window.chrome ? 'chrome' : false,
      // Blink engine detection
      isBlink: (this.isChrome || this.isOpera) && !!window.CSS ? 'blink' : false
    }

    Object.keys(browsers).forEach( (item) => {
      if (browsers[item]) {
        this.body.classList.add(browsers[item])
      }
    })
  }
}

module.exports = Header;
