import $ from 'jquery';
import Global from '../global-functions'
const Logowall = {
  init() {
    this.cacheDom()
    $(this.visibleLogo).exists(() => {
      this.randomLogoSwap()
    })
  },
  cacheDom() {
    this.body = Global.body;
    this.allLogos = this.body.querySelectorAll('.client-logo')
    this.visibleLogo = this.body.querySelectorAll('.visible_logo')
    this.hiddenLogo = this.body.querySelectorAll('.hidden_logo')
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
    let aAllLogos = ''
    let aVisibleImageSrc = ''
    let aHiddenImageSrc = ''
    let iRandomVisibleImgSrc = 0
    let iRandomHiddenImgSrc = 0
    // We swap logos on a 5s interval
    setInterval(() => {
      // On each interwal we have rearanged the dom element so we fetch the updated dom so we have the right data
      this.cacheDom()
      // we use our Dom to array function to build the three arrays we need
      // we need ann instanse of all the logos for when we update the hidden logos because we have already contaminated/mutated the hidded logo array
      aAllLogos = this.getImgSrcArray(this.allLogos)
      aVisibleImageSrc = this.getImgSrcArray(this.visibleLogo)
      aHiddenImageSrc = this.getImgSrcArray(this.hiddenLogo)
      //get a random visible image src and choose it
      iRandomVisibleImgSrc = this.getRandomFromRange(0, aVisibleImageSrc.length)
      iRandomHiddenImgSrc = this.getRandomFromRange(0, aHiddenImageSrc.length)
      // we fade out the the logo
      this.visibleLogo[iRandomVisibleImgSrc].classList.add('fade-in-logo')
      // here we find the index of the src that is the same as we just will pass to the hidden DOM then we can use this index to get the same path and pass that to the hidden arr
      // this means that when we update the visible array we have a backup to pass to the hidden array
      let srcIndex = aAllLogos.findIndex(x => x == this.visibleLogo[iRandomVisibleImgSrc].childNodes[1].src)
      // Delay the img swap to give fade out time to happen
      setTimeout(() => {
        // We reset the visible selected DOM element to the one randomly taken from the hidden elements
        this.visibleLogo[iRandomVisibleImgSrc].childNodes[1].src = this.hiddenLogo[iRandomHiddenImgSrc].childNodes[1].src
        // remove the fade out
        this.visibleLogo[iRandomVisibleImgSrc].classList.remove('fade-in-logo')
        // We reset the hiden elements DOM so we are ready for the next itterateion
        this.hiddenLogo[iRandomHiddenImgSrc].childNodes[1].src = aAllLogos[srcIndex]
      }, 550);
    }, 5000);
  },
}
module.exports = Logowall;
