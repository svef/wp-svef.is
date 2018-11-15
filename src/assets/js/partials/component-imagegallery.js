import $ from 'jquery';
import 'owl.carousel';

const Imagegallery = {
    init() {
        this.cacheDom()
        this.addEvents()
        $(this.imageGallery).owlCarousel(

        //image slider
        $("#myImageSlider").owlCarousel({
            stagePadding: 340,
            loop: true,
            margin: 35,
            items: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            autoplayTimeout: 10000,
            navigation : false,
            slideSpeed : 500,
   		    paginationSpeed : 800,
    	    rewindSpeed : 1000,
            singleItem: true,
    	    stopOnHover : true,
            lazyLoad: true,
            responsive: {
                // 300: {
                //     items: 1,
                //     stagePadding: 40
                // },
                // 600: {
                //     items: 1,
                //     stagePadding: 60
                // },
                // 1000: {
                //     items: 1,
                //     stagePadding: 100
                // },
                // 1400: {
                //     items: 1,
                //     stagePadding: 140
                // },
                // 1600: {
                //     items: 1,
                //     stagePadding: 350
                // },
                // 1800: {
                //     items: 1,
                //     stagePadding: 400
                // }
            }
        })

        )
      },
      cacheDom: function () {
        this.body = document.querySelector('body')
        this.imageGallery = this.body.querySelector('.owl-carousel')
      },
      addEvents() {
    
      }
}


module.exports = Imagegallery;