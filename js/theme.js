(function($) {
    "use strict";
    
    
    $(document).ready(function(){
        
        /*----------------------------------------------------*/
        /*  Preloader
        /*----------------------------------------------------*/
        $(".preloader").fadeOut();
        
        /*----------------------------------------------------*/
        /*  RTL
        /*----------------------------------------------------*/
		var $drtl;
		if( $('body').hasClass('rtl') ){
			$drtl = true
		}else{
			$drtl = false
		}
		
		
		//alert($drtl);
		
        /*----------------------------------------------------*/
        /*  Main Slider
        /*----------------------------------------------------*/
        $('.home_slider').owlCarousel({
			rtl: $drtl,
            loop:true,
            margin:0,
            nav:true,
            autoplay:true,
            dots: false,
            navText: [
              "<span class='lnr lnr-chevron-left'></span>",
              "<span class='lnr lnr-chevron-right'></span>"
              ],
            items: 1
        });
        
        
        /*----------------------------------------------------*/
        /*  Find Domain Form Dropdown
        /*----------------------------------------------------*/
        $('.domain_search_drop').on("click",function(){
            $(this).toggleClass('rotate')
        });
        
        
        /*----------------------------------------------------*/
        /*  Project Slideshow
        /*----------------------------------------------------*/
        $('.pricing_plan').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            autoplay:true,
            navContainer: "#pricing_nav",
            navText: [
              "<span class='lnr lnr-arrow-left'></span>",
              "<span class='lnr lnr-arrow-right'></span>"
              ],
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    center: true
                },
                992:{
                    items:3,
                    center: true
                }
            }
        });
        
        
        /*----------------------------------------------------*/
        /*  Pricing Slider
        /*----------------------------------------------------*/        
        $('.pricing_slider').owlCarousel({
			rtl: $drtl,
            loop:true,
            margin:0,
            nav:false,
            dots: true,
            autoplay:true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1
                },
                700:{
                    items:2
                },
                992:{
                    items:3
                },
                1501:{
                    items:4
                }
            }
        });

        /*----------------------------------------------------*/
        /*  Pricing Slider
         /*----------------------------------------------------*/
      
	  $('.table-slick').slick({
            infinite: true,
            slidesToShow: 3,
            dots: false,
            //centerMode: true,
            //centerPadding: '0px',
			slidesToScroll: 1,
            arrows: false,
			/*
            customPaging: function(slider, i) {
                //console.log(slider);
                //console.log(i);
                var bullettext=slider.$slides.eq(i).find('input').val();
                return '<button type="button" data-role="none">' + bullettext + '</button>';
            },*/
            responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: true,
                    //centerMode: true,
                   // centerPadding: '0px',
                    slidesToShow: 2,
					slidesToScroll: 1,
                    dots: true
                }
            }, {
                breakpoint: 480,
                settings: {
                    arrows: true,
                   // centerMode: true,
                   // centerPadding: '0px',
                    slidesToShow: 1,
					slidesToScroll: 1,
                    dots: true
                }
            }]


        });

        $("#owl-demo").slick({
			rtl: $drtl,
            infinite: true,
            slidesToShow: 1,
            dots: false,
            variableWidth: true,
        });

       /* $('.table-slick').on('click', '.slick-slide', function (e) {
            e.stopPropagation();
            var index = $(this).data("slick-index");
            if ($('.table-slick').slick('slickCurrentSlide') !== index) {
                $('.table-slick').slick('slickGoTo', index);
            }
        });*/
        
        
        /*----------------------------------------------------*/
        /*  Testimonial Slider
        /*----------------------------------------------------*/        
        $('.testimonial_slider').owlCarousel({
			rtl: $drtl,
            loop:true,
            margin:0,
            nav:true,
            navText: [
              "<span class='lnr lnr-arrow-left'></span>",
              "<span class='lnr lnr-arrow-right'></span>"
              ],
            autoplay:true,
            items: 1,
			
			autoplayTimeout:10000
        });      
        $('.testimonial_slider2').owlCarousel({
	    rtl: $drtl,
            loop:true,
            margin:0,
            nav:true,
            navText: [
              "<span class='lnr lnr-arrow-left'></span>",
              "<span class='lnr lnr-arrow-right'></span>"
              ],
            autoplay:true,            
            responsive:{
                0:{
                    items:1
                },
                800:{
                    items:2
                }
            }
        });
        
        /*----------------------------------------------------*/
        /*  Domain Search Filter
        /*----------------------------------------------------*/        
        $('.searchFilters .dropdown-menu').find('a').click(function(e) {
            e.preventDefault();
            var param = $(this).attr("href").replace("#","");
            var concept = $(this).text();
            $('.searchFilters span#searchFilterValue').text(concept);
            $('.input-group #search_param').val(param)
        });

        $('#find_your_domain').submit(function(e){

            try {
                var domain = $(this).find('input[name=domain]').val();
                if(domain.length < 1)
                {
                    throw "Domain name must be required.";
                }

                var ext = $(this).find('.searchFilters button span#searchFilterValue').text();
                if(ext.length < 1)
                {
                    throw "Domain extension must be required.";
                }

                /*$.post(MyAjax.ajaxurl, {domain: domain+ext, action:'check_domain'}, function(data){
                 console.log(data);
                 //e.preventDefault();
                 });*/
                $(this).find('input[name=domain]').val(domain+ext);

            } catch (err)
            {
                e.preventDefault();
            }

        });
        
        /*----------------------------------------------------*/
        /*  Counter Up - Fun Facts
        /*----------------------------------------------------*/
        $('.fact strong').counterUp({
            delay: 10,
            time: 1000
        });
        
        /*----------------------------------------------------*/
        /*  Counter Up - Fun Facts
        /*----------------------------------------------------*/
        $('.we_used .progress-bar').each(function(){
            var $this = $(this);
            var width = $(this).data('skill');
            $this.css({
                'transition' : 'width 2s'
            });
            
            setTimeout(function() {
                $this.waypoint(function(direction) {
                    if( direction === 'down' ) {
                        $this.css({
                            'width' : width + '%'
                        })
                    }
                } , { offset: '100%' } )
            }, 500)
        });
        
        /*----------------------------------------------------*/
        /*  PopUps
        /*----------------------------------------------------*/
        $('.portfolio-link').magnificPopup({
            type: 'image'
        });
        
        
        
        /*----------------------------------------------------*/
        /*  Contact Form Height
        /*----------------------------------------------------*/
        $('#success, #error').each(function(){
            var line_height = $(this).height();
            $(this).find('p').css( "line-height", function(){
                return line_height + 'px'
            })
        })




        if($("#main_navigation .menu-top-navigation-container").length <=0 )
        {

            $(".fluid_header.centered .navbar-header .navbar-toggle").css("display", "none");
        }
		//alert(window.location.hash);
		var url = window.location;
		if(url.toString().indexOf("#") > 0)
		{
			var hash = url.toString().substring(url.toString().indexOf("#")+1);
			//alert(hash);
			if(hash != '')
			{
				$('html,body,.scroll_tab').animate({
								scrollTop: $("#"+hash).offset().top - 100
				}, 1000);
			}
		}
       /*$("#owl-demo").owlCarousel({
			rtl: $drtl,
            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items : 7,
            //itemsDesktop : [1199,3],
            //itemsDesktopSmall : [979,3]
            margin:30,
            autoWidth:true,
            loop:true


        });*/

        $('a[href*="#"]:not([href="#"])').click(function() {

            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
                || location.hostname == this.hostname) {
                var target = $(this.hash);
                var ulClass = $(this).closest('ul').attr('class');
                
                target = $(target);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				
                if(ulClass != 'undefined' && ulClass == 'nav nav-tabs scroll_tab') {
					
                    if (target.length) {
                        $('html,body,.scroll_tab').animate({
                            scrollTop: target.offset().top - 100
                        }, 1000);
                    }
                }
            }
        });



        /*----------------------------------------------------*/
        /*  Qty spinner start
         /*----------------------------------------------------*/
        $('.btn-number').click(function(e){
            e.preventDefault();

            var fieldName = $(this).attr('data-field');
            var type      = $(this).attr('data-type');
            var input = $("input[name='"+fieldName+"']");
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if(type == 'minus') {
                    var minValue = parseInt(input.attr('min'));
                    if(!minValue) minValue = 0;
                    if(currentVal > minValue) {
                        input.val(currentVal - 1).change();
                    }
                    if(parseInt(input.val()) == minValue) {
                        $(this).attr('disabled', true);
                    }

                } else if(type == 'plus') {
                    var maxValue = parseInt(input.attr('max'));
                    if(!maxValue) maxValue = 9999999999999;
                    if(currentVal < maxValue) {
                        input.val(currentVal + 1).change();
                    }
                    if(parseInt(input.val()) == maxValue) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });
        $('.input-number').focusin(function(){
            $(this).data('oldValue', $(this).val());
        });
        $('.input-number').change(function() {

            var minValue =  parseInt($(this).attr('min'));
            var maxValue =  parseInt($(this).attr('max'));
            if(!minValue) minValue = 0;
            if(!maxValue) maxValue = 9999999999999;
            var valueCurrent = parseInt($(this).val());

            var name = $(this).attr('name');
            if(valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if(valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }


        });
        $(".input-number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                    // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                    // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

        $('.spinner .btn:first-of-type').on('click', function() {
            var btn = $(this);
            var input = btn.closest('.spinner').find('input');
            if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {
                input.val(parseInt(input.val(), 10) + 1);
            } else {
                btn.next("disabled", true);
            }
        });
        $('.spinner .btn:last-of-type').on('click', function() {
            var btn = $(this);
            var input = btn.closest('.spinner').find('input');
            if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {
                input.val(parseInt(input.val(), 10) - 1);
            } else {
                btn.prev("disabled", true);
            }
        });
        /*----------------------------------------------------*/
        /*  Qty spinner  End
         /*----------------------------------------------------*/


       /* $('.product-slide').each(function(){
            if( $(this).find("div").length > 1 ) $(this).owlCarousel({
                loop:true,
                margin:0,
                nav:false,
                items:1
            })
        });*/
		
		$('#uncapped-products').uncappedSlider();






        /*    $(".navbar").affix({
                offset: {
                    top: jQuery('.top_header').height()
                }
            });
*/

        
    })
    
})(jQuery)
