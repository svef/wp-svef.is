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
                300: {
                    items: 1,
                    margin: 5,
                    stagePadding: 40
                },
                600: {
                    items: 1,
                    margin: 10,
                    stagePadding: 40
                },
                1000: {
                    items: 1,
                    margin: 20,
                    stagePadding: 200
                },
                1400: {
                    items: 1,
                    margin: 35,
                    stagePadding: 340
                }
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