import $ from 'jquery';
import Global from '../global-functions'
const Logowall = {
    init() {
      this.cacheDom()

      $(this.visibleLogo).exists(()=>this.randomLogoSwap())
    },
    cacheDom() {
        this.body = Global.body
        this.visibleLogo = this.body.querySelectorAll('.visible_logo')
        this.hiddenLogo = this.body.querySelectorAll('.hidden_logo')
        this.aVisibleImageSrc = []
        this.aHiddenImageSrc = []
    },
    getRand(min, max) {
        return Math.floor(Math.random() * (max - min) + min);
    },
    getImgSrcArray( array ) {
        //make array of visible img scr
        let aImageSrc = [];
        for (let i = 0; i < array.length; i++) {
            let imageSrc = array[i].childNodes[1].getAttribute('src')
            aImageSrc.push(imageSrc)
        }
        return aImageSrc
    },
    randomLogoSwap() {


        //get visible image src array
         this.aVisibleImageSrc = this.getImgSrcArray(this.visibleLogo)
         console.log(this.aVisibleImageSrc)
        //get a hidden image src array
         this.aHiddenImageSrc = this.getImgSrcArray(this.hiddenLogo)


        //setInterval every 5s
        // setInterval(() => {
            // do something

            //get a random visible image src and choose it
            let iRandomVisibleImgSrc = this.getRand(0, this.aVisibleImageSrc.length )
            let choosenVisibleLogo = this.visibleLogo[iRandomVisibleImgSrc].childNodes[1]

            //get a random hidden image src and choose it
            let iRandomHiddenImgSrc = this.getRand(0, this.aHiddenImageSrc.length)
            let choosenHiddenLogo = this.hiddenLogo[iRandomHiddenImgSrc].childNodes[1]

            //put hidden logo src into visible logo src

            this.aVisibleImageSrc.filter(x => x != choosenHiddenLogo.src)
            console.log(this.aVisibleImageSrclo)
            this.aVisibleImageSrc.push(this.aHiddenImageSrc[iRandomHiddenImgSrc])
            console.log(this.aVisibleImageSrc)

            // //console.log(aVisibleImageSrc);
            // let arrHiddIndex = aVisibleImageSrc.findIndex(i => i == choosenHiddenLogo.src)
            // aHiddenImageSrc.splice(arrHiddIndex, 1)
            // aHiddenImageSrc.push(aVisibleImageSrc[iRandomVisibleImgSrc])

            //console.log(aHiddenImageSrc);

            // choosenVisibleLogo.src = choosenHiddenLogo.src
        // }, 10000); // <- 1000ms = 1s
    }

    //  shuffle(o) {
    //     for (var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    //     return o;
    // }


}
module.exports = Logowall;
