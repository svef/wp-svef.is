import $ from 'jquery'

const GlobalFunctions = {

  cacheBody() {
    this.body = document.querySelector('body')
    return this.body
  },
  isDescendant(parent, child) {
    var node = child.parentNode;
    while (node != null) {
      if (node == parent) {
        return true;
      }
      node = node.parentNode;
    }
    return false;
  },
  postAjax(dataObj) {
    let ajaxOptions = {
      type: 'POST',
      url: myAjax.ajaxurl,
      data: dataObj,
      dataType: 'json',
      error(err) {
        console.log(err);
      }
    }
    if (arguments.length > 2) {
        ajaxOptions.data = arguments[2]
    }
    return $.ajax(ajaxOptions)
  },

  linkArrow(linkClass) {
    let linkArrow = linkClass ? linkClass : 'link-arrow'
    return `
    <svg class="${linkArrow}" width="34" height="12" viewBox="0 0 34 12" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path class="${linkArrow}" fill-rule="evenodd" clip-rule="evenodd" d="M30.7216 6.63761L26.1705 11.0987L27.1352 12L32.8509 6.45094L33.3333 6.00027L32.8509 5.5496L27.1352 -2.53121e-07L26.1705 0.901333L30.7216 5.36293L9.33325 5.39199L9.33325 6.66667L30.7216 6.63761Z" fill="#15202D"/>
      <path class="link-arrow--orange" d="M0 5.33331L5.33333 5.36267V6.63735L0 6.60799V5.33331Z" fill="#FF8811"/>
    </svg>`
  }

}

module.exports = GlobalFunctions
