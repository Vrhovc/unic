jQuery(document).ready(function($) {
// Code using $ as usual goes here.
  
  
//Magnific Popup Lightbox for Images
	$('.woocommerce-main-image, .thumbnails a').magnificPopup({
		type:'image',
		closeOnContentClick:true
	});
   
    // Initialize the Lightbox automatically for any links to images with extensions .jpg, .jpeg, .png or .gif
    $("a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']").magnificPopup({
		type:'image',
		closeOnContentClick:true
	});

    // Initialize the Lightbox and add rel="gallery" to all gallery images when the gallery is set up using  so that a Lightbox Gallery exists
    $(".gallery a[href$='.jpg'], .gallery a[href$='.png'], .gallery a[href$='.jpeg'], .gallery a[href$='.gif']").attr('rel','gallery').magnificPopup({
		type:'image',
		closeOnContentClick:true
	});
});