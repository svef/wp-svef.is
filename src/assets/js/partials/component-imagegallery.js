import $ from 'jquery';
import 'owl.carousel';

const Imagegallery = {
    init() {
        this.cacheDom()
        this.addEvents()
        $(this.imageGallery).owlCarousel(

        //image slider
        $('#myImageSlider').owlCarousel({
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
                0: {
                    items: 1,
                    margin: 0,
                    stagePadding: 0
                },
                641: {
                    items: 1,
                    margin: 20,
                    stagePadding: 60
                },
                911: {
                    items: 1,
                    margin: 20,
                    stagePadding: 180
                },
                1201: {
                    items: 1,
                    margin: 35,
                    stagePadding: 320
                },
                1441: {
                    items: 1,
                    margin: 35,
                    stagePadding: 360
                },
                2000: {
                    items: 2,
                    margin: 35,
                    stagePadding: 400
                }
            }
        })

        )
      },
      cacheDom: function () {
        this.body = document.querySelector('body')
        this.imageGallery = this.body.querySelector('.owl-carousel')
        this.slider = this.body.querySelector('#myImageSlider')
      },
      addEvents() {

      }
}


module.exports = Imagegallery;
