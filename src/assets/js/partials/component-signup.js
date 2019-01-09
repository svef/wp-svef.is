// import $ from 'jquery'
import Global from '../global-functions'
import Translate from '../dictionary'

const Signup = {
  init() {
    this.cacheDom()
    this.addEvents()
    this.fixFormRequired()
  },
  cacheDom() {
    this.body = Global.body
    this.btnOpenSignup = this.body.querySelector('#btnOpenSignup')
    this.btnOpenSignupMobile = this.body.querySelector('#btnOpenSignupMobile')
    this.btnMenu = this.body.querySelector('#btnMenu')
    this.sideMenu = this.body.querySelector('.side-menu')
    this.menuOverlay = this.body.querySelector('.menu-overlay')
    this.sideSignup = this.body.querySelector('.side-signup')
    this.sideSignupOverlay = this.body.querySelector('.side-signup-overlay')
    this.gfieldRequired = this.body.querySelectorAll('.gfield_required')
    this.btnCloseSignupMobile = this.body.querySelector('#closeSignupMobile')
    this.frmRegisterMember = this.body.querySelector('.frmsignup')
    this.inpRegisterMemberEmail = this.body.querySelector('#input_1_5')
    this.btnSubmitRegistration = this.body.querySelector('#gform_submit_button_1')
    this.checkBoxAddToPostList = this.body.querySelector('#choice_1_17_1')

  },
  addEvents() {
    this.btnOpenSignup.addEventListener('click', this.handleOpenSignup.bind(this))
    this.btnOpenSignupMobile.addEventListener('click', this.handleMobileOpenSignup.bind(this))
    this.btnCloseSignupMobile.addEventListener('click', this.handleMobileCloseSignup.bind(this))
    this.body.addEventListener('click', this.clickedOutSignupForm.bind(this))
    this.body.addEventListener('keyup', this.escapeSignupForm.bind(this))
    this.frmRegisterMember.addEventListener('submit', this.formComplete.bind(this))
  },
  formComplete(event) {
    let boolAddToPostlist = this.checkBoxAddToPostList.checked
    if (boolAddToPostlist) {
      let ajaxObj = {}
      ajaxObj.action = 'submitPostlist'
      ajaxObj.email = this.inpRegisterMemberEmail.value
      ajaxObj.formId = 2
      Global.postAjax(ajaxObj).done(function (response) {
        // console.log(response)
        let is_valid = response.is_valid
        if (!is_valid) {
          console.log('Error, something went wrong');
          return
        }
        console.log('Subscribe success')
      })
    }
  },
  handleOpenSignup(e) {
    if (btnOpenSignup.classList.contains('btnSignup--clicked')) {
      btnOpenSignup.classList.remove('btnSignup--clicked')
      this.sideSignup.classList.remove('side-signup--active')
      this.sideSignupOverlay.classList.remove('side-signup-overlay--active')
      this.body.style.overflow = 'auto'
      btnOpenSignup.blur()
      btnOpenSignup.innerHTML = Translate.languageSwitch('Skráning í SVEF', Translate.currentLanguage())
    } else {
      this.sideMenu.classList.remove('side-menu--active')
      this.btnMenu.classList.remove('nav__menu-button--clicked')
      this.menuOverlay.classList.remove('menu-overlay--active')
      btnOpenSignup.classList.add('btnSignup--clicked')
      this.sideSignup.classList.add('side-signup--active')
      this.sideSignupOverlay.classList.add('side-signup-overlay--active')
      btnOpenSignup.innerHTML = Translate.languageSwitch('Loka', Translate.currentLanguage())
      this.body.style.overflow = 'hidden'
    }
  },
  handleMobileOpenSignup(e) {
    if (btnOpenSignupMobile.classList.contains('btnSignup--clicked')) {
      btnOpenSignupMobile.classList.remove('btnSignup--clicked')
      this.sideSignup.classList.remove('side-signup--active')
    } else {
      this.sideMenu.classList.remove('side-menu--active')
      this.btnMenu.classList.remove('nav__menu-button--clicked')
      this.menuOverlay.classList.remove('menu-overlay--active')
      this.body.style.overflow = 'auto'
      btnOpenSignupMobile.classList.add('btnSignup--clicked')
      this.sideSignup.classList.add('side-signup--active')
    }
  },
  handleMobileCloseSignup(e) {
    btnOpenSignupMobile.classList.remove('btnSignup--clicked')
    this.sideSignup.classList.remove('side-signup--active')
  },
  clickedOutSignupForm(e) {
    if (e.target != this.btnOpenSignup && e.target != this.btnOpenSignupMobile &&
      this.sideSignup.classList.contains('side-signup--active') &&
      !this.sideSignup.contains(e.target) &&
      !Global.isDescendant(this.sideSignup, e.target)
    ) {
      this.btnOpenSignup.classList.remove('btnSignup--clicked')
      this.sideSignup.classList.remove('side-signup--active')
      this.sideSignupOverlay.classList.remove('side-signup-overlay--active')
      this.body.style.overflow = 'auto'
      // this.btnOpenSignup.blur()
      this.btnOpenSignup.innerHTML = Translate.languageSwitch('Skráning í SVEF', Translate.currentLanguage())
    }
  },
  escapeSignupForm(e) {
    if (this.sideSignup.classList.contains('side-signup--active') && e.code == 'Escape') {
      this.btnOpenSignup.classList.remove('btnSignup--clicked')
      this.sideSignup.classList.remove('side-signup--active')
      this.sideSignupOverlay.classList.remove('side-signup-overlay--active')
      this.body.style.overflow = 'auto'
      // this.btnOpenSignup.blur()
      this.body.focus()
      this.btnOpenSignup.innerHTML = Translate.languageSwitch('Skráning í SVEF', Translate.currentLanguage())
    }
  },
  fixFormRequired() {
    for (let i = 0; i < this.gfieldRequired.length; i++) {
      this.gfieldRequired[i].innerHTML = ""
      this.gfieldRequired[i].innerHTML = Translate.languageSwitch('required', Translate.currentLanguage())
    }
  }
}


module.exports = Signup;
