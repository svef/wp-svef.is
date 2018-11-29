import $ from 'jquery'
import Global from './global-functions'
import whatInput from 'what-input'
import Header from './partials/component-header'
import Signup from './partials/component-signup'
import Imagegallery from './partials/component-imagegallery'
import WinnersSlider from './partials/component-winnersslider'
import JobFeed from './partials/component-jobfeed'
import HeroSlider from './partials/component-hero-slider'
import Logowall from './partials/component-logowall'
import LoadMorePosts from './partials/component-loadmore'
import Textticker from './partials/component-textticker'
window.$ = $;

// import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
import './lib/foundation-explicit-pieces'
Global.cacheBody();
// A function that checks if a element exists, Comes in handy when we dont want to load scripts that run on other pages than are currently loaded
$.fn.exists = function (callback) {
  var args = [].slice.call(arguments, 1);
  if (this.length) {
      callback.call(this, args);
  }
  return this;
}

/** invoke our scipts */
// Global.init()
Header.init()
Signup.init()


HeroSlider.init()
Imagegallery.init()
WinnersSlider.init()
JobFeed.init()
Logowall.init()
LoadMorePosts.init()
Textticker.init()

/** invoke foundation */
$(document).foundation()
