$(function(){

    var lazyLazy = new LazyLoad({elements_selector:'.lazy'});

    $('.about-link').click(function(e){
        e.preventDefault();
        $('.about').toggleClass('opened');
    })

    $('.contact-link').click(function(e){
        e.preventDefault();
        $('.contact').addClass('active');
		$('body').addClass('no-scroll');
    })

    $('.works-link').click(function(e){
        e.preventDefault();
        $('.contact,.about').removeClass('active');
    });

    $('.close').click(function(e){
        e.preventDefault();
        $('.contact').removeClass('active');
		$('body').removeClass('no-scroll');
    })

    lightGallery(document.getElementById('lightgallery'), {
        plugins: [lgZoom],
        speed: 800,
        download: false,
        zoom: false,
        allowMediaOverlap: true,
        height: '80%'
        //licenseKey: 'your_license_key',
    });

})