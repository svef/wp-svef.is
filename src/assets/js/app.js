import $ from 'jquery'
import whatInput from 'what-input'
import Header from './partials/component-header'
import Signup from './partials/component-signup'
import Imagegallery from './partials/component-imagegallery'
import WinnersSlider from './partials/component-winnersslider'
import Members from './partials/component-members'
window.$ = $;

// import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
import './lib/foundation-explicit-pieces'

// A function that checks if a element exists, Comes in handy when we dont want to load scripts that run on other pages than are currently loaded
$.fn.exists = function (callback) {
  var args = [].slice.call(arguments, 1);
  if (this.length) {
      callback.call(this, args);
  }
  return this;
}



/** invoke our scipts */
Header.init()
Signup.init()



Imagegallery.init()
WinnersSlider.init()
Members.init()


/** invoke foundation */
$(document).foundation()
