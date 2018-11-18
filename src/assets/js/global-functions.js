import $ from 'jquery'

const GlobalFunctions = {
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
  }

}

module.exports = GlobalFunctions
