(function($){
	$(document).ready(function(){

		if ($('.boxed .fullscreen-bg').length>0) {
			$("body").addClass("transparent-page-wrapper");
		};

		$(window).load(function() {
			$("body").removeClass("no-trans");
		});
		// Enable Smooth Scroll only on Chrome and only on Win and Linux Systems
		var platform = navigator.platform.toLowerCase();
		if ((platform.indexOf('win') == 0 || platform.indexOf('linux') == 0) && !Modernizr.touch) {
			if ($.browser.webkit) {
				$.webkitSmoothScroll();
			}
		};
		//Show dropdown on hover only for desktop devices
		//-----------------------------------------------
		var delay=0, setTimeoutConst;
		if ((Modernizr.mq('only all and (min-width: 768px)') && !Modernizr.touch) || $("html.ie8").length>0) {
			$('.main-navigation:not(.onclick) .navbar-nav>li.dropdown, .main-navigation:not(.onclick) li.dropdown>ul>li.dropdown').hover(
			function(){
				var $this = $(this);
				setTimeoutConst = setTimeout(function(){
					$this.addClass('open').slideDown();
					$this.find('.dropdown-toggle').addClass('disabled');
				}, delay);

			},	function(){
				clearTimeout(setTimeoutConst );
				$(this).removeClass('open');
				$(this).find('.dropdown-toggle').removeClass('disabled');
			});
		};

		//Show dropdown on click only for mobile devices
		//-----------------------------------------------
		if (Modernizr.mq('only all and (max-width: 767px)') || Modernizr.touch || $(".main-navigation.onclick").length>0 ) {
			$('.main-navigation [data-toggle=dropdown], .header-top [data-toggle=dropdown]').on('click', function(event) {
			// Avoid following the href location when clicking
			event.preventDefault();
			// Avoid having the menu to close when clicking
			event.stopPropagation();
			// close all the siblings
			$(this).parent().siblings().removeClass('open');
			// close all the submenus of siblings
			$(this).parent().siblings().find('[data-toggle=dropdown]').parent().removeClass('open');
			// opening the one you clicked on
			$(this).parent().toggleClass('open');
			});
		};



		//Revolution Slider 4
		if ($(".slider-banner-container").length>0) {

			$(".tp-bannertimer").show();

			$('body:not(.transparent-header) .slider-banner-container .slider-banner-fullscreen').show().revolution({
				delay:8000,
				startwidth:1140,
				startheight:520,
				fullWidth:"off",
				fullScreen:"on",
				fullScreenOffsetContainer: ".header-container",
				fullScreenOffset: "0",

				navigationArrows:"solo",

				navigationStyle: "preview2",
				navigationHAlign:"center",
				navigationVAlign:"bottom",
				navigationHOffset:0,
				navigationVOffset:20,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:0,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:0,
				soloArrowRightVOffset:0,

				spinner:"spinner2",

				stopLoop:"off",
				stopAfterLoops:-1,
				stopAtSlide:-1,
				onHoverStop: "off",

				shuffle:"off",
				hideTimerBar:"off",

				autoHeight:"off",
				forceFullWidth:"off",

				hideThumbsOnMobile:"off",
				hideNavDelayOnMobile:1500,
				hideBulletsOnMobile:"off",
				hideArrowsOnMobile:"off",
				hideThumbsUnderResolution:0,

				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				startWithSlide:0
			});
			$('.transparent-header .slider-banner-container .slider-banner-fullscreen').show().revolution({
				delay:8000,
				startwidth:1140,
				startheight:520,
				fullWidth:"off",
				fullScreen:"on",
				fullScreenOffsetContainer: ".header-top",
				fullScreenOffset: "",

				navigationArrows:"solo",

				navigationStyle: "preview2",
				navigationHAlign:"center",
				navigationVAlign:"bottom",
				navigationHOffset:0,
				navigationVOffset:20,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:0,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:0,
				soloArrowRightVOffset:0,

				spinner:"spinner2",

				stopLoop:"off",
				stopAfterLoops:-1,
				stopAtSlide:-1,
				onHoverStop: "off",

				shuffle:"off",
				hideTimerBar:"off",

				autoHeight:"off",
				forceFullWidth:"off",

				hideThumbsOnMobile:"off",
				hideNavDelayOnMobile:1500,
				hideBulletsOnMobile:"off",
				hideArrowsOnMobile:"off",
				hideThumbsUnderResolution:0,

				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				startWithSlide:0
			});

			$('.slider-banner-container .slider-banner-fullwidth').show().revolution({
				delay:8000,
				startwidth:1140,
				startheight:450,

				navigationArrows:"solo",

				navigationStyle: "preview2",
				navigationHAlign:"center",
				navigationVAlign:"bottom",
				navigationHOffset:0,
				navigationVOffset:20,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:0,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:0,
				soloArrowRightVOffset:0,

				fullWidth:"on",

				spinner:"spinner2",

				stopLoop:"off",
				stopAfterLoops:-1,
				stopAtSlide:-1,
				onHoverStop: "off",

				shuffle:"off",

				autoHeight:"off",
				forceFullWidth:"off",

				hideThumbsOnMobile:"off",
				hideNavDelayOnMobile:1500,
				hideBulletsOnMobile:"off",
				hideArrowsOnMobile:"off",
				hideThumbsUnderResolution:0,

				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				startWithSlide:0
			});

			$('.slider-banner-container .slider-banner-fullwidth-big-height').show().revolution({
				delay:8000,
				startwidth:1140,
				startheight:650,

				navigationArrows:"solo",

				navigationStyle: "preview2",
				navigationHAlign:"center",
				navigationVAlign:"bottom",
				navigationHOffset:0,
				navigationVOffset:20,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:0,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:0,
				soloArrowRightVOffset:0,

				fullWidth:"on",

				spinner:"spinner2",

				stopLoop:"off",
				stopAfterLoops:-1,
				stopAtSlide:-1,
				onHoverStop: "off",

				shuffle:"off",

				autoHeight:"off",
				forceFullWidth:"off",

				hideThumbsOnMobile:"off",
				hideNavDelayOnMobile:1500,
				hideBulletsOnMobile:"off",
				hideArrowsOnMobile:"off",
				hideThumbsUnderResolution:0,

				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				startWithSlide:0
			});

			$('.banner:not(.dark-bg) .slider-banner-container .slider-banner-boxedwidth').show().revolution({
				delay:8000,
				startwidth:1140,
				startheight:450,

				navigationArrows:"solo",

				navigationStyle: "preview2",
				navigationHAlign:"center",
				navigationVAlign:"bottom",
				navigationHOffset:0,
				navigationVOffset:20,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:0,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:0,
				soloArrowRightVOffset:0,

				fullWidth:"off",

				spinner:"spinner2",
				shadow: 1,

				stopLoop:"off",
				stopAfterLoops:-1,
				stopAtSlide:-1,
				onHoverStop: "off",

				shuffle:"off",

				autoHeight:"off",
				forceFullWidth:"off",

				hideThumbsOnMobile:"off",
				hideNavDelayOnMobile:1500,
				hideBulletsOnMobile:"off",
				hideArrowsOnMobile:"off",
				hideThumbsUnderResolution:0,

				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				startWithSlide:0
			});

			$('.banner.dark-bg .slider-banner-container .slider-banner-boxedwidth').show().revolution({
				delay:8000,
				startwidth:1140,
				startheight:450,

				navigationArrows:"solo",

				navigationStyle: "preview2",
				navigationHAlign:"center",
				navigationVAlign:"bottom",
				navigationHOffset:0,
				navigationVOffset:20,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:0,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:0,
				soloArrowRightVOffset:0,

				fullWidth:"off",

				spinner:"spinner2",
				shadow: 3,

				stopLoop:"off",
				stopAfterLoops:-1,
				stopAtSlide:-1,
				onHoverStop: "off",

				shuffle:"off",

				autoHeight:"off",
				forceFullWidth:"off",

				hideThumbsOnMobile:"off",
				hideNavDelayOnMobile:1500,
				hideBulletsOnMobile:"off",
				hideArrowsOnMobile:"off",
				hideThumbsUnderResolution:0,

				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				startWithSlide:0
			});

			$('.slider-banner-container .slider-banner-boxedwidth-no-shadow').show().revolution({
				delay:8000,
				startwidth:1140,
				startheight:450,

				navigationArrows:"solo",

				navigationStyle: "preview2",
				navigationHAlign:"center",
				navigationVAlign:"bottom",
				navigationHOffset:0,
				navigationVOffset:20,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:0,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:0,
				soloArrowRightVOffset:0,

				fullWidth:"off",

				spinner:"spinner2",
				shadow: 0,

				stopLoop:"off",
				stopAfterLoops:-1,
				stopAtSlide:-1,
				onHoverStop: "off",

				shuffle:"off",

				autoHeight:"off",
				forceFullWidth:"off",

				hideThumbsOnMobile:"off",
				hideNavDelayOnMobile:1500,
				hideBulletsOnMobile:"off",
				hideArrowsOnMobile:"off",
				hideThumbsUnderResolution:0,

				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				startWithSlide:0
			});

			$('.banner:not(.dark-bg) .slider-banner-container .slider-banner-boxedwidth-stopped').show().revolution({
				delay:8000,
				startwidth:1140,
				startheight:450,

				navigationArrows:"solo",

				navigationStyle: "preview2",
				navigationHAlign:"center",
				navigationVAlign:"bottom",
				navigationHOffset:0,
				navigationVOffset:20,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:0,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:0,
				soloArrowRightVOffset:0,

				fullWidth:"off",

				spinner:"spinner2",
				shadow: 1,

				stopLoop:"off",
				stopAfterLoops:0,
				stopAtSlide:1,
				onHoverStop: "off",

				shuffle:"off",

				autoHeight:"off",
				forceFullWidth:"off",

				hideThumbsOnMobile:"off",
				hideNavDelayOnMobile:1500,
				hideBulletsOnMobile:"off",
				hideArrowsOnMobile:"off",
				hideThumbsUnderResolution:0,

				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				startWithSlide:0
			});

			$('.banner.dark-bg .slider-banner-container .slider-banner-boxedwidth-stopped').show().revolution({
				delay:8000,
				startwidth:1140,
				startheight:450,

				navigationArrows:"solo",

				navigationStyle: "preview2",
				navigationHAlign:"center",
				navigationVAlign:"bottom",
				navigationHOffset:0,
				navigationVOffset:20,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:0,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:0,
				soloArrowRightVOffset:0,

				fullWidth:"off",

				spinner:"spinner2",
				shadow: 3,

				stopLoop:"off",
				stopAfterLoops:0,
				stopAtSlide:1,
				onHoverStop: "off",

				shuffle:"off",

				autoHeight:"off",
				forceFullWidth:"off",

				hideThumbsOnMobile:"off",
				hideNavDelayOnMobile:1500,
				hideBulletsOnMobile:"off",
				hideArrowsOnMobile:"off",
				hideThumbsUnderResolution:0,

				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				startWithSlide:0
			});

		};

		//Revolution Slider 5
		if ($(".slider-revolution-5-container").length>0) {
			$(".tp-bannertimer").show();

			$('body:not(.transparent-header) .slider-revolution-5-container .slider-banner-fullscreen').revolution({
				sliderType:"standard",
				sliderLayout:"fullscreen",
				delay:9000,
				autoHeight:"on",
				responsiveLevels:[1199,991,767,480],
				fullScreenOffsetContainer: ".header-container, .offset-container",
				navigation: {
					onHoverStop: "off",
					arrows: {
						style: "hebe",
						enable:true,
						tmp: '<div class="tp-title-wrap"><span class="tp-arr-titleholder">{{title}}</span></div>',
						left : {
							h_align:"left",
							v_align:"center",
							h_offset:0,
							v_offset:0,
						},
						right : {
							h_align:"right",
							v_align:"center",
							h_offset:0,
							v_offset:0
						}
					},
					bullets:{
						style:"",
						enable:true,
						hide_onleave:true,
						direction:"horizontal",
						space: 3,
						h_align:"center",
						v_align:"bottom",
						h_offset:0,
						v_offset:20
					}
				},
				gridwidth:1140,
				gridheight:750
			});
			$('.transparent-header .slider-revolution-5-container .slider-banner-fullscreen').revolution({
				sliderType:"standard",
				sliderLayout:"fullscreen",
				delay:9000,
				autoHeight:"on",
				responsiveLevels:[1199,991,767,480],
				fullScreenOffsetContainer: ".header-top, .offset-container",
				navigation: {
					onHoverStop: "off",
					arrows: {
						style: "hebe",
						enable:true,
						tmp: '<div class="tp-title-wrap"><span class="tp-arr-titleholder">{{title}}</span></div>',
						left : {
							h_align:"left",
							v_align:"center",
							h_offset:0,
							v_offset:0,
						},
						right : {
							h_align:"right",
							v_align:"center",
							h_offset:0,
							v_offset:0
						}
					},
					bullets:{
						style:"",
						enable:true,
						hide_onleave:true,
						direction:"horizontal",
						space: 3,
						h_align:"center",
						v_align:"bottom",
						h_offset:0,
						v_offset:20
					}
				},
				gridwidth:1140,
				gridheight:750
			});
			$('.slider-revolution-5-container .slider-banner-fullwidth').revolution({
				sliderType:"standard",
				sliderLayout:"fullwidth",
				delay:8000,
				gridwidth:1140,
				gridheight:450,
				responsiveLevels:[1199,991,767,480],
				navigation: {
					onHoverStop: "off",
					arrows: {
						style: "hebe",
						enable:true,
						tmp: '<div class="tp-title-wrap"><span class="tp-arr-titleholder">{{title}}</span></div>',
						left : {
							h_align:"left",
							v_align:"center",
							h_offset:0,
							v_offset:0,
						},
						right : {
							h_align:"right",
							v_align:"center",
							h_offset:0,
							v_offset:0
						}
					},
					bullets:{
						style:"",
						enable:true,
						hide_onleave:true,
						direction:"horizontal",
						space: 3,
						h_align:"center",
						v_align:"bottom",
						h_offset:0,
						v_offset:20
					}
				}
			});
			$('.slider-revolution-5-container .slider-banner-fullwidth-big-height').revolution({
				sliderType:"standard",
				sliderLayout:"fullwidth",
				delay:8000,
				gridwidth:1140,
				gridheight:650,
				responsiveLevels:[1199,991,767,480],
				navigation: {
					onHoverStop: "off",
					arrows: {
						style: "hebe",
						enable:true,
						tmp: '<div class="tp-title-wrap"><span class="tp-arr-titleholder">{{title}}</span></div>',
						left : {
							h_align:"left",
							v_align:"center",
							h_offset:0,
							v_offset:0,
						},
						right : {
							h_align:"right",
							v_align:"center",
							h_offset:0,
							v_offset:0
						}
					},
					bullets:{
						style:"",
						enable:true,
						hide_onleave:true,
						direction:"horizontal",
						space: 3,
						h_align:"center",
						v_align:"bottom",
						h_offset:0,
						v_offset:20
					}
				}
			});
			$('.slider-revolution-5-container .slider-banner-boxedwidth').revolution({
				sliderType:"standard",
				sliderLayout:"auto",
				delay:8000,
				gridwidth:1140,
				gridheight:450,
				responsiveLevels:[1199,991,767,480],
				shadow: 1,
				navigation: {
					onHoverStop: "off",
					arrows: {
						style: "hebe",
						enable:true,
						tmp: '<div class="tp-title-wrap"><span class="tp-arr-titleholder">{{title}}</span></div>',
						left : {
							h_align:"left",
							v_align:"center",
							h_offset:0,
							v_offset:0,
						},
						right : {
							h_align:"right",
							v_align:"center",
							h_offset:0,
							v_offset:0
						}
					},
					bullets:{
						style:"",
						enable:true,
						hide_onleave:true,
						direction:"horizontal",
						space: 3,
						h_align:"center",
						v_align:"bottom",
						h_offset:0,
						v_offset:20
					}
				}
			});
			$('.slider-revolution-5-container .slider-banner-fullscreen-hero:not(.dotted)').revolution({
				sliderType:"hero",
				sliderLayout:"fullscreen",
				autoHeight:"on",
				gridwidth:1140,
				gridheight:650,
				responsiveLevels:[1199,991,767,480],
				delay: 9000,
				fullScreenOffsetContainer: ".header-top, .offset-container"
			});
			$('.slider-revolution-5-container .slider-banner-fullscreen-hero.dotted').revolution({
				sliderType:"hero",
				sliderLayout:"fullscreen",
				autoHeight:"on",
				gridwidth:1140,
				gridheight:650,
				dottedOverlay:"twoxtwo",
				delay: 9000,
				responsiveLevels:[1199,991,767,480],
				fullScreenOffsetContainer: ".header-top, .offset-container"
			});
			$('.slider-revolution-5-container .slider-banner-fullwidth-hero:not(.dotted)').revolution({
				sliderType:"hero",
				sliderLayout:"fullwidth",
				gridwidth:1140,
				gridheight:650,
				responsiveLevels:[1199,991,767,480],
				delay: 9000
			});
			$('.slider-revolution-5-container .slider-banner-fullwidth-hero.dotted').revolution({
				sliderType:"hero",
				sliderLayout:"fullwidth",
				gridwidth:1140,
				gridheight:650,
				responsiveLevels:[1199,991,767,480],
				delay: 9000,
				dottedOverlay:"twoxtwo"
			});
		};

		//Full Page
		if ($(".fullpage-site").length>0 || $(".fullpage-site-with-menu").length>0) {
			$('.fullpage-site').fullpage({
				anchors: ['firstPage', 'secondPage', 'thirdPage', 'fourthPage', 'fifthPage'],
				navigation: true,
				navigationPosition: 'right',
				navigationTooltips: ['Intro', 'About', 'Portfolio', 'Clients', 'Contact Us'],
				fixedElements: '.header-container, .subfooter',
				responsiveWidth: 992,
				responsiveHeight: 600
			});
			$('.fullpage-site-with-menu').fullpage({
				anchors: ['firstPage', 'secondPage', 'thirdPage', 'fourthPage', 'fifthPage'],
				navigation: true,
				navigationPosition: 'right',
				navigationTooltips: ['Intro', 'About', 'Menu', 'Reviews', 'Contact Us'],
				fixedElements: '.header-container, .subfooter',
				responsiveWidth: 992,
				responsiveHeight: 600,
				menu: '#fullpage-menu',
			});
		};

		//Owl carousel
		//-----------------------------------------------
		if ($('.owl-carousel').length>0) {
			$(".owl-carousel.carousel").owlCarousel({
				items: 4,
				pagination: false,
				navigation: true,
				navigationText: false
			});
			$(".owl-carousel.carousel-autoplay").owlCarousel({
				items: 4,
				autoPlay: 5000,
				pagination: false,
				navigation: true,
				navigationText: false
			});
			$(".owl-carousel.clients").owlCarousel({
				items: 6,
				autoPlay: true,
				pagination: false,
				itemsDesktopSmall: [992,4],
				itemsTablet: [768,4],
				itemsMobile: [479,3]
			});
			$(".owl-carousel.content-slider").owlCarousel({
				singleItem: true,
				autoPlay: 5000,
				navigation: false,
				navigationText: false,
				pagination: false
			});
			$(".owl-carousel.content-slider-with-controls").owlCarousel({
				singleItem: true,
				autoPlay: false,
				navigation: true,
				pagination: true
			});
			$(".owl-carousel.content-slider-with-large-controls").owlCarousel({
				singleItem: true,
				autoPlay: false,
				navigation: true,
				pagination: true
			});
			$(".owl-carousel.content-slider-with-controls-autoplay").owlCarousel({
				singleItem: true,
				autoPlay: 5000,
				navigation: true,
				pagination: true
			});
			$(".owl-carousel.content-slider-with-large-controls-autoplay").owlCarousel({
				singleItem: true,
				autoPlay: 5000,
				navigation: true,
				pagination: true
			});
			$(".owl-carousel.content-slider-with-controls-autoplay-hover-stop").owlCarousel({
				singleItem: true,
				autoPlay: 5000,
				navigation: true,
				pagination: true,
				stopOnHover: true
			});

			//Synched carousel see shop-product-2.html page
			var sync1 = $(".owl-carousel.content-slider-with-thumbs");
			var sync2 = $(".owl-carousel.content-slider-thumbs");

			sync1.owlCarousel({
				singleItem : true,
				slideSpeed : 1000,
				navigation: true,
				pagination:false,
				afterAction : syncPosition,
				responsiveRefreshRate : 200,
			});

			sync2.owlCarousel({
				items : 4,
				itemsDesktop : [1199,4],
				itemsDesktopSmall : [979,4],
				itemsTablet : [768,4],
				itemsMobile : [479,4],
				pagination: false,
				responsiveRefreshRate : 100,
				afterInit : function(el){
					el.find(".owl-item").eq(0).addClass("synced");
				}
			});

			function syncPosition(el){
				var current = this.currentItem;
				$(".owl-carousel.content-slider-thumbs")
				.find(".owl-item")
				.removeClass("synced")
				.eq(current)
				.addClass("synced")
				if($(".owl-carousel.content-slider-thumbs").data("owlCarousel") !== undefined){
					center(current)
				}
			}

			$(".owl-carousel.content-slider-thumbs").on("click", ".owl-item", function(e){
				e.preventDefault();
				var number = $(this).data("owlItem");
				sync1.trigger("owl.goTo",number);
			});

			function center(number){
				var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
				var num = number;
				var found = false;
				for(var i in sync2visible){
					if(num === sync2visible[i]){
						var found = true;
					}
				}

				if(found===false){
					if(num>sync2visible[sync2visible.length-1]){
						sync2.trigger("owl.goTo", num - sync2visible.length+2)
					}else{
						if(num - 1 === -1){
							num = 0;
						}
						sync2.trigger("owl.goTo", num);
					}
				} else if(num === sync2visible[sync2visible.length-1]){
					sync2.trigger("owl.goTo", sync2visible[1])
				} else if(num === sync2visible[0]){
					sync2.trigger("owl.goTo", num-1)
				}

			}
		};


	
		// Animations
		//-----------------------------------------------
		if ($("[data-animation-effect]").length>0) {
			$("[data-animation-effect]").each(function() {
				if(Modernizr.csstransitions) {
					var waypoints = $(this).waypoint(function(direction) {
						var appearDelay = $(this.element).attr("data-effect-delay"),
						animatedObject = $(this.element);
						setTimeout(function() {
							animatedObject.addClass('animated object-visible ' + animatedObject.attr("data-animation-effect"));
						}, appearDelay);
						this.destroy();
					},{
						offset: '95%'
					});
				} else {
					$(this).addClass('object-visible');
				}
			});
		};

		// Text Rotators
		//-----------------------------------------------
		if ($(".text-rotator").length>0) {
			$(".text-rotator").each(function() {
				var tr_animationEffect = $(this).attr("data-rotator-animation-effect");
				$(this).Morphext({
					animation: ""+tr_animationEffect+"", // Overrides default "bounceIn"
					separator: ",", // Overrides default ","
					speed: 3000 // Overrides default 2000
				});
			});
		};

		// Stats Count To
		//-----------------------------------------------
		if ($(".stats [data-to]").length>0) {
			$(".stats [data-to]").each(function() {
				var stat_item = $(this),
				offset = stat_item.offset().top;
				if($(window).scrollTop() > (offset - 800) && !(stat_item.hasClass('counting'))) {
					stat_item.addClass('counting');
					stat_item.countTo();
				};
				$(window).scroll(function() {
					if($(window).scrollTop() > (offset - 800) && !(stat_item.hasClass('counting'))) {
						stat_item.addClass('counting');
						stat_item.countTo();
					}
				});
			});
		};

		// Isotope filters
		//-----------------------------------------------
		if ($('.isotope-container').length>0 || $('.masonry-grid').length>0 || $('.masonry-grid-fitrows').length>0 || $('.isotope-container-fitrows').length>0) {
			$(window).load(function() {
				$('.masonry-grid').isotope({
					itemSelector: '.masonry-grid-item',
					layoutMode: 'masonry'
				});
				$('.masonry-grid-fitrows').isotope({
					itemSelector: '.masonry-grid-item',
					layoutMode: 'fitRows'
				});
				$('.isotope-container').fadeIn();
				var $container = $('.isotope-container').isotope({
					itemSelector: '.isotope-item',
					layoutMode: 'masonry',
					transitionDuration: '0.6s',
					filter: "*"
				});
				$('.isotope-container-fitrows').fadeIn();
				var $container_fitrows = $('.isotope-container-fitrows').isotope({
					itemSelector: '.isotope-item',
					layoutMode: 'fitRows',
					transitionDuration: '0.6s',
					filter: "*"
				});
				// filter items on button click
				$('.filters').on( 'click', 'ul.nav li a', function() {
					var filterValue = $(this).attr('data-filter');
					$(".filters").find("li.active").removeClass("active");
					$(this).parent().addClass("active");
					$container.isotope({ filter: filterValue });
					$container_fitrows.isotope({ filter: filterValue });
					return false;
				});
			});
			$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				$('.tab-pane .masonry-grid-fitrows').isotope({
					itemSelector: '.masonry-grid-item',
					layoutMode: 'fitRows'
				});
			});
		};

		// Animated Progress Bars
		//-----------------------------------------------
		if ($("[data-animate-width]").length>0) {
			$("[data-animate-width]").each(function() {
				if (Modernizr.touch || !Modernizr.csstransitions) {
					$(this).find("span").hide();
				};
				var waypoints = $(this).waypoint(function(direction) {
					$(this.element).animate({width: $(this.element).attr("data-animate-width")}, 800 );
					this.destroy();
					if (Modernizr.touch || !Modernizr.csstransitions) {
						$(this.element).find("span").show('slow');
					};
				},{
					offset: '90%'
				});
			});
		};

		// Animated Circular Progress Bars
		//-----------------------------------------------
		if ($(".knob").length>0) {

			$(".knob").knob();
			$(".knob").each(function() {
				var animateVal = $(this).attr("data-animate-value");
				$(this).animate({animatedVal: animateVal}, {
					duration: 2000,
					step: function() {
						$(this).val(Math.ceil(this.animatedVal)).trigger("change");
					}
				});
			});
		}

		//Video Background
		//-----------------------------------------------
		if($(".video-background").length>0) {
			if (Modernizr.touch) {
				$(".video-background").vide({
					mp4: "videos/background-video.mp4",
					webm: "videos/background-video.webm",
					poster: "videos/video-fallback.jpg"
				}, {
					volume: 1,
					playbackRate: 1,
					muted: true,
					loop: true,
					autoplay: true,
					position: "50% 100%", // Similar to the CSS `background-position` property.
					posterType: "jpg", // Poster image type. "detect" — auto-detection; "none" — no poster; "jpg", "png", "gif",... - extensions.
					resizing: true
				});
			} else {
				$(".video-background").vide({
					mp4: "videos/background-video.mp4",
					webm: "videos/background-video.webm",
					poster: "videos/video-poster.jpg"
				}, {
					volume: 1,
					playbackRate: 1,
					muted: true,
					loop: true,
					autoplay: true,
					position: "50% 100%", // Similar to the CSS `background-position` property.
					posterType: "jpg", // Poster image type. "detect" — auto-detection; "none" — no poster; "jpg", "png", "gif",... - extensions.
					resizing: true
				});
			};

		};
		if($(".video-background-banner").length>0) {
			if (Modernizr.touch) {
				$(".video-background-banner").vide({
					mp4: "videos/background-video-banner.mp4",
					webm: "videos/background-video-banner.webm",
					poster: "videos/video-fallback.jpg"
				}, {
					volume: 1,
					playbackRate: 1,
					muted: true,
					loop: true,
					autoplay: true,
					position: "50% 50%", // Similar to the CSS `background-position` property.
					posterType: "jpg", // Poster image type. "detect" — auto-detection; "none" — no poster; "jpg", "png", "gif",... - extensions.
					resizing: true
				});
			} else {
				$(".video-background-banner").vide({
					mp4: "videos/background-video-banner.mp4",
					webm: "videos/background-video-banner.webm",
					poster: "videos/video-banner-poster.jpg"
				}, {
					volume: 1,
					playbackRate: 1,
					muted: true,
					loop: true,
					autoplay: true,
					position: "50% 50%", // Similar to the CSS `background-position` property.
					posterType: "jpg", // Poster image type. "detect" — auto-detection; "none" — no poster; "jpg", "png", "gif",... - extensions.
					resizing: true
				});
			};
		};
		//Scroll totop
		//-----------------------------------------------
		$(window).scroll(function() {
			if($(this).scrollTop() != 0) {
				$(".scrollToTop").fadeIn();
			} else {
				$(".scrollToTop").fadeOut();
			}
		});

		$(".scrollToTop").click(function() {
			$("body,html").animate({scrollTop:0},800);
		});

		//Modal
		//-----------------------------------------------
		if($(".modal").length>0) {
			$(".modal").each(function() {
				$(".modal").prependTo( "body" );
			});
		}

		// Pricing tables popovers
		//-----------------------------------------------
		if ($(".pricing-tables").length>0) {
			$(".plan .pt-popover").popover({
				trigger: 'hover',
				container: 'body'
			});
		};

		

		// Affix Menu
		//-----------------------------------------------
		if ($(".affix-menu").length>0) {
			setTimeout(function () {
				var $sideBar = $('.sidebar')

				$sideBar.affix({
					offset: {
						top: function () {
							var offsetTop = $sideBar.offset().top
							return (this.top = offsetTop - 65)
						},
						bottom: function () {
							var affixBottom = $(".footer").outerHeight(true) + $(".subfooter").outerHeight(true)
							if ($(".footer-top").length>0) {
								affixBottom = affixBottom + $(".footer-top").outerHeight(true)
							}
							return (this.bottom = affixBottom+50)
						}
					}
				})
			}, 100)
		}

		//Scroll Spy
		//-----------------------------------------------
		if($(".scrollspy").length>0) {
			$("body").addClass("scroll-spy");
			if($(".fixed.header").length>0) {
				$('body').scrollspy({
					target: '.scrollspy',
					offset: 85
				});
			} else {
				$('body').scrollspy({
					target: '.scrollspy',
					offset: 20
				});
			}
		}

		//Smooth Scroll
		//-----------------------------------------------
		if ($(".smooth-scroll").length>0) {
			if(($(".header.fixed").length>0) && (Modernizr.mq('only all and (min-width: 768px)'))) {
				$('.smooth-scroll a, a.smooth-scroll').click(function() {
					if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
						var target = $(this.hash);
						target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
						if (target.length) {
							$('html,body').animate({
								scrollTop: target.offset().top-63
							}, 1000);
							return false;
						}
					}
				});
			} else {
				$('.smooth-scroll a, a.smooth-scroll').click(function() {
					if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
						var target = $(this.hash);
						target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
						if (target.length) {
							$('html,body').animate({
								scrollTop: target.offset().top
							}, 1000);
							return false;
						}
					}
				});
			}
		}

		// Offcanvas side navbar
		//-----------------------------------------------
		if ($("#offcanvas").length>0) {
			$('#offcanvas').offcanvas({
				canvas: "body",
				disableScrolling: false,
				toggle: false
			});
		};

		if ($("#offcanvas").length>0) {
			$('#offcanvas [data-toggle=dropdown]').on('click', function(event) {
			// Avoid following the href location when clicking
			event.preventDefault();
			// Avoid having the menu to close when clicking
			event.stopPropagation();
			// close all the siblings
			$(this).parent().siblings().removeClass('open');
			// close all the submenus of siblings
			$(this).parent().siblings().find('[data-toggle=dropdown]').parent().removeClass('open');
			// opening the one you clicked on
			$(this).parent().toggleClass('open');
			});
		};

		// Parallax section
		//-----------------------------------------------
		if (($(".parallax").length>0)  && !Modernizr.touch ){
			$(".parallax").parallax("50%", 0.2);
		};
		if (($(".parallax-2").length>0)  && !Modernizr.touch ){
			$(".parallax-2").parallax("50%", 0.3);
		};
		if (($(".parallax-3").length>0)  && !Modernizr.touch ){
			$(".parallax-3").parallax("50%", 0.4);
		};

		// Notify Plugin
		//-----------------------------------------------
		if ($(".btn-alert").length>0){
			$(".btn-alert").on('click', function(event) {
				$.notify({
					// options
					message: 'Great! you have just created this message :-) you can configure this into the template.js file'
				},{
					// settings
					type: 'info',
					delay: 4000,
					offset : {
						y: 100,
						x: 20
					}
				});
				return false;
			});
		};

		// Remove Button
		//-----------------------------------------------
		$(".btn-remove").click(function() {
			$(this).closest(".remove-data").remove();
		});

		// Shipping Checkbox
		//-----------------------------------------------
		if ($("#shipping-info-check").is(':checked')) {
			$("#shipping-information").hide();
		}
		$("#shipping-info-check").change(function(){
			if ($(this).is(':checked')) {
				$("#shipping-information").slideToggle();
			} else {
				$("#shipping-information").slideToggle();
			}
		});

		// Full Width Image Overlay
		//-----------------------------------------------
		if ($(".full-image-overlay").length>0) {
			overlayHeight = $(".full-image-overlay").outerHeight();
			$(".full-image-overlay").css("marginTop",-overlayHeight/2);
		};

		//This will prevent the event from bubbling up and close the dropdown when you type/click on text boxes (Header Top).
		//-----------------------------------------------
		$('.header-top .dropdown-menu input').click(function(e) {
			e.stopPropagation();
		});

	}); // End document ready

})(this.jQuery);

if (jQuery(".btn-print").length>0) {
	function print_window() {
		var mywindow = window;
		mywindow.document.close();
		mywindow.focus();
		mywindow.print();
		mywindow.close();
	}
}
