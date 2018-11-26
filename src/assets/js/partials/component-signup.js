import Global from '../global-functions'
import Translate from './component-translate'

const Signup = {
    init() {
      this.cacheDom()
      this.addEvents()
      this.fixFormRequired()
    },
    cacheDom() {
      this.body = Global.body
      this.btnOpenSignup = this.body.querySelector('#btnOpenSignup')
      this.sideSignup = this.body.querySelector('.side-signup')
      this.sideSignupOverlay = this.body.querySelector('.side-signup-overlay')
      this.gfieldRequired = this.body.querySelectorAll('.gfield_required')
    },
    addEvents() {
      this.btnOpenSignup.addEventListener('click', this.handleOpenSignup.bind(this))
    },
    handleOpenSignup(e) {
      if(this.btnOpenSignup.classList.contains('btnSignup--clicked')) {
        this.btnOpenSignup.classList.remove('btnSignup--clicked')
        this.sideSignup.classList.remove('side-signup--active')
        this.sideSignupOverlay.classList.remove('side-signup-overlay--active')
        this.btnOpenSignup.blur()
        this.btnOpenSignup.innerHTML = 'Skráning í SVEF'
      } else {
        this.btnOpenSignup.classList.add('btnSignup--clicked')
        this.sideSignup.classList.add('side-signup--active')
        this.sideSignupOverlay.classList.add('side-signup-overlay--active')
        this.btnOpenSignup.innerHTML = 'Loka'
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
