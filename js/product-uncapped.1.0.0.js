/*
 * uncapped-slider.js v1.0.0
 * Copyright © 2015 Afrihost
 * Written By: Gavin McCleland | @mrmaddotta
 *
 */

(function ($) {

    $.fn.uncappedSlider = function (options) {

        var settings = {};

        // Establish our default settings
        settings = $.extend({
            groups:             1,
            activeGroup:        1,
            listHolder:         $(this).find('.slider-speeds'),
            slider:             null,
            rangeItem:          $(this).find('.range-slider .inner'),
            mask:               $(this).find('.range-slider .mask'),
            productHolder:      $(this).find('.product-holder'),
            productHolderInner: $(this).find('.product-holder-inner'),
            arrow:              $(this).find('.arrow'),
            timer:              null,
            isBouncing:         false,
            firstSlide:         false
        }, options);

        setup();

        // click on descriptors
        settings.listHolder.find('li').click(function(){
            settings.activeGroup = $(this).data('group');
            slide();

        });

        // click on arrow
        settings.arrow.click(function(){

            var direction = $(this).data('direction');

            switch (direction) {

                case 'left':
                    if(settings.activeGroup !== 1) {
                        settings.activeGroup--;
                        slide();
                    } else {bounce('left');}

                    break;
                case 'right':
                    if(settings.activeGroup !== settings.groups) {
                        settings.activeGroup++;
                        slide();
                    } else {bounce('right');}

                    break;
            }

            //console.log(settings.activeGroup);

        });

        // swipe on product inner
        $('html.touch').find(settings.productHolderInner).swipeleft(function(){

            if(settings.activeGroup !== settings.groups) {
                settings.activeGroup++;
                slide();
            } else {bounce('right');}

        });

        $('html.touch').find(settings.productHolderInner).swiperight(function(){

            if(settings.activeGroup !== 1) {
                settings.activeGroup--;
                slide();
            } else {bounce('left');}

        });

        function setup() {

            // check for touch screen
            if(is_touch_device()) {$('html').addClass('touch');}

            // update the default swipe threshold
            $.event.special.swipe.horizontalDistanceThreshold = '250';

            // get group count
            settings.groups = settings.listHolder.find('li').size();
            settings.listHolder.addClass('s'+settings.groups);

            // create the slider
            settings.slider = settings.rangeItem.slider({
                min: 1,
                max: settings.groups,
                value: settings.activeGroup,
                slide: function(event, ui) {
                    settings.activeGroup = ui.value;
                    slide();
                }
            });

            // add some padding
            var containerWidth = settings.listHolder.outerWidth(),
                padding = (containerWidth/(settings.groups))/2;

            settings.rangeItem.css({
                'left': padding,
                'right': padding
            });

            // add data-group to each slider li
            var count = 1;
            settings.listHolder.find('li').each(function(){
                $(this).attr('data-group', count);
                count++;
            });

            // update the mask css
            settings.mask.css('left', 0-(padding-3));

            // set the height on all the things
            var groupHeight = settings.productHolder.find('.product-group').outerHeight();
            settings.productHolder.css('height', groupHeight);

            // add the range slider dividers
            var rangeHolder = $('.range-slider .dividers');
            var divider     = '<span class="divider" style="width: ' + ((1/settings.groups)*100).toFixed(2) + '%;"></span>';
            for(var d = 1; d < settings.groups; d++) {rangeHolder.append(divider);}

            settings.listHolder.find('li').eq(settings.activeGroup-1).addClass('active');

            slide();

            // waypoint
            settings.productHolder.waypoint(function() {settings.productHolder.removeClass('waypoint');}, {
                offset: '80%',
                triggerOnce: true
            });

        }

        function is_touch_device() {
            return 'ontouchstart' in window // works on most browsers
                || 'onmsgesturechange' in window; // works on ie10
        }

        function is_mobile_device() {
            return ( $(window).outerWidth() <= 520 ) ? true : false;
        }

        function slide() {

            // calculate the sliders new position
            var holderWidth             = settings.productHolder.outerWidth(),
                descriptorHolderWidth   = settings.listHolder.outerWidth(),
                position                = 0-((settings.activeGroup-1)*holderWidth),
                currentPosition         = parseInt(settings.productHolderInner.css('left'), 10),
                descriptorWidth         = descriptorHolderWidth/settings.groups,
                maskPosition            = descriptorWidth*(settings.groups-(settings.activeGroup));

            // slide the products
            settings.productHolderInner.css('left', position);

            // update the slider mask
            settings.mask.css('right', maskPosition);

            // update the ui-slider
            settings.slider.slider("value", settings.activeGroup);

            // update the slider descriptors
            if(!is_mobile_device()) {settings.listHolder.find('li').removeClass('active').eq(settings.activeGroup-1).addClass('active');} else {

                if(settings.firstSlide) {
                    // what direction we going in?
                    var direction = (currentPosition <= position) ? 'left' : 'right';

                    // animate current out
                    settings.listHolder.find('li.active').addClass('out-' + direction).one('webkitAnimationEnd oanimationend oAnimationEnd msAnimationEnd animationend', function(){

                        console.log('out animation complete');
                        $(this).attr('class', '');

                        // animate new in
                        settings.listHolder.find('li').eq(settings.activeGroup-1).addClass('in-' + direction + ' active').one('webkitAnimationEnd oanimationend oAnimationEnd msAnimationEnd animationend', function() {
                            $(this).attr('class', 'active');
                        });

                    });
                }

            }

            settings.firstSlide = true;

        }

        function bounce(direction) {

            if(!settings.isBouncing) {

                settings.isBouncing = true;
                var currentPosition = parseInt(settings.productHolderInner.css('left'), 10);
                switch (direction) {

                    case 'right':
                        settings.productHolderInner.css('left', currentPosition-50);
                        break;
                    default:
                        settings.productHolderInner.css('left', currentPosition+50);
                        break;
                }

                settings.timer = setTimeout(function() {
                    settings.productHolderInner.css('left', currentPosition).one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend", function() {
                        settings.isBouncing = false;
                    });

                }, 200);
            }

        }

    };
}(jQuery));
