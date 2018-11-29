import $ from 'jquery';
import Global from '../global-functions'
const Logowall = {
  init() {
    this.cacheDom()

    $(this.visibleLogo).exists(() => {
      this.randomLogoSwap()
      this.addEvent()
    })
  },
  cacheDom() {
    this.body = document.querySelector('body');
    this.allLogos = this.body.querySelectorAll('.client-logo')
    this.visibleLogo = this.body.querySelectorAll('.visible_logo')
    this.hiddenLogo = this.body.querySelectorAll('.hidden_logo')
  },
  addEvent() {

  },
  getRandomFromRange(min, max) {
    return Math.floor(Math.random() * (max - min) + min);
  },
  getImgSrcArray( array ) {
    //make array of visible img scr
    let aImageSrc = [];
    for (let i = 0; i < array.length; i++) {
      let imageSrc = array[i].childNodes[1].src
      aImageSrc.push(imageSrc)
    }
    return aImageSrc
  },
  randomLogoSwap() {
      //setInterval every 5s
    setInterval(() => {
      this.cacheDom()
      let aAllLogos = this.getImgSrcArray(this.allLogos)
      let aVisibleImageSrc = this.getImgSrcArray(this.visibleLogo)
      let aHiddenImageSrc = this.getImgSrcArray(this.hiddenLogo)
      //get a random visible image src and choose it
      let iRandomVisibleImgSrc = this.getRandomFromRange(0, aVisibleImageSrc.length)
      let iRandomHiddenImgSrc = this.getRandomFromRange(0, aHiddenImageSrc.length)
      this.visibleLogo[iRandomVisibleImgSrc].classList.add('fade-in-logo')
      let srcIndex = aAllLogos.findIndex(x => x == this.visibleLogo[iRandomVisibleImgSrc].childNodes[1].src)
      setTimeout(() => {
        this.visibleLogo[iRandomVisibleImgSrc].childNodes[1].src = this.hiddenLogo[iRandomHiddenImgSrc].childNodes[1].src
        this.visibleLogo[iRandomVisibleImgSrc].classList.remove('fade-in-logo')
        this.hiddenLogo[iRandomHiddenImgSrc].childNodes[1].src = aAllLogos[srcIndex]
      }, 1500);
    }, 5000); // <- 1000ms = 1s
  },


    //  shuffle(o) {
    //     for (var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    //     return o;
    // }


}
module.exports = Logowall;
