import $ from 'jquery';
import whatInput from 'what-input';
import Header from './partials/component-header';
import Signup from './partials/component-signup';
import Imagegallery from './partials/component-imagegallery';

window.$ = $;

// import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
import './lib/foundation-explicit-pieces';

Header.init();
Signup.init();
Imagegallery.init();

$(document).foundation();

