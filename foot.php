<!-- BEGIN: LAYOUT/BASE/BOTTOM -->
<!-- BEGIN: CORE PLUGINS -->
<!--[if lt IE 9]>
	<script src="../assets/global/plugins/excanvas.min.js"></script>
	<![endif]-->
<script src="assets/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- END: CORE PLUGINS -->

<!-- BEGIN: LAYOUT PLUGINS -->
<script src="assets/plugins/revo-slider/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
<script src="assets/plugins/revo-slider/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
<script src="assets/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
<script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<script src="assets/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="assets/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="assets/plugins/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-scrollto/lib/jquery-scrollto.js" type="text/javascript"></script>

<!-- END: LAYOUT PLUGINS -->
<!-- BEGIN: THEME SCRIPTS -->
<script src="assets/base/js/components.js" type="text/javascript"></script>
<script src="assets/base/js/app.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
		/*
		var mobile = navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile|IEMobile/i);

		if(!mobile){
			$('.rotate-phone').hide();
			$('.home-page-wrapper').show();
			$('header').show();
			$('.footer').show();
		}else{
			function widthHeight() {
				var windowWidth = $(window).width();
				var windowHeight = $(window).height();
					if (windowWidth < windowHeight) {
						$('.rotate-phone').show();
						$('.home-page-wrapper').hide();
						$('header').hide();
						$('.footer').hide();
					} else {
						$('.rotate-phone').hide();
						$('.home-page-wrapper').show();
						$('header').show();
						$('.footer').show();
					}
			};

			$(window).bind('orientationchange', widthHeight);
			$(window).resize(widthHeight);
			widthHeight();
		}*/

		App.init(); // init core

		//init main slider
		var slider = $('.c-layout-revo-slider .tp-banner');
	    var cont = $('.c-layout-revo-slider .tp-banner-container');
	    var api = slider.show().revolution({
	        delay: 15000,
	        startwidth:1170,
	        startheight: 620,
	        navigationType: "hide",
	        navigationArrows: "solo",
	        touchenabled: "on",
	        onHoverStop: "on",
	        keyboardNavigation: "off",
	        navigationStyle: "circle",
	        navigationHAlign: "center",
	        navigationVAlign: "bottom",
	        spinner: "spinner2",
	        fullScreen: "on",
	        fullScreenAlignForce:"on",
	        fullScreenOffsetContainer: (App.getViewPort().width < App.getBreakpoint('md') ? '.c-layout-header' : ''),
	        shadow: 0,
	        fullWidth: "off",
	        forceFullWidth: "off",
	        hideTimerBar:"on",
	        hideThumbsOnMobile: "on",
	        hideNavDelayOnMobile: 1500,
	        hideBulletsOnMobile: "on",
	        hideArrowsOnMobile: "on",
	        hideThumbsUnderResolution: 0
	    });
		});

		jQuery(document).ready(function($) {
	    $(".scrollto").click(function(event) {
	        event.preventDefault();

	        var defaultAnchorOffset = 0;

	        var anchor = $(this).attr('data-attr-scroll');

	        var anchorOffset = $('#'+anchor).attr('data-scroll-offset');
	        if (!anchorOffset)
	            anchorOffset = defaultAnchorOffset;

	        $('html,body').animate({
	            scrollTop: $('#'+anchor).offset().top - anchorOffset
	        }, 500);
	    });
	});

	</script>

<!-- END: THEME SCRIPTS -->
<!-- END: LAYOUT/BASE/BOTTOM -->
