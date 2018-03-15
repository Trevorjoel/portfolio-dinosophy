jQuery(document).ready( function($) {
	    
    $('.main-navigation').meanmenu({
    	meanScreenWidth: 767,
    	meanRevealPosition: "center"
    });

    $("#lightSlider").lightSlider({
        item: 1,
        slideMargin: 0,
        gallery: false,
        pager: true,
        currentPagerPosition: 'middle',
        enableDrag:false,
        freeMove:true,
        keyPress: true,
    });
    
    /* Masonry for faq */
    if( $('.page-template-template-home').length > 0 ){
        $('.services .row').imagesLoaded(function(){ 
            $('.services .row').masonry({
                itemSelector: '.col-3'
            }); 
        });
    }

});