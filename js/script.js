/*global window */
/*global document */
!function ($) {
    "use strict";

    $(document).ready(function () {
        $('#homeCarousel').carousel('cycle');

        $('.nav').on('click', function (e) {
            var $target = $(e.target),
                $menuItem = $target.parent('li'),
                $submenu = $menuItem.find('.sub-menu');

            if ($submenu.length) {
                e.preventDefault();

                if ($submenu.is(':visible')) {
                    $submenu.slideUp('fast');
                } else {
                    $submenu.slideDown('fast');
                }
            }
        });

        $('#homeCarousel').touchwipe({
            wipeLeft: function () {
                $('#homeCarousel').carousel('next');
            },

            wipeRight: function () {
                $('#homeCarousel').carousel('prev');
            }
        })
    });
}(window.jQuery);

/**
 * jQuery Plugin to obtain touch gestures from iPhone, iPod Touch and iPad, should also work with Android mobile phones (not tested yet!)
 * Common usage: wipe images (left and right to show the previous or next image)
 * 
 * @author Andreas Waltl, netCU Internetagentur (http://www.netcu.de)
 * @version 1.1.1 (9th December 2010) - fix bug (older IE's had problems)
 * @version 1.1 (1st September 2010) - support wipe up and wipe down
 * @version 1.0 (15th July 2010)
 */
(function($){$.fn.touchwipe=function(settings){var config={min_move_x:20,min_move_y:20,wipeLeft:function(){},wipeRight:function(){},wipeUp:function(){},wipeDown:function(){},preventDefaultEvents:true};if(settings)$.extend(config,settings);this.each(function(){var startX;var startY;var isMoving=false;function cancelTouch(){this.removeEventListener('touchmove',onTouchMove);startX=null;isMoving=false}function onTouchMove(e){if(config.preventDefaultEvents){e.preventDefault()}if(isMoving){var x=e.touches[0].pageX;var y=e.touches[0].pageY;var dx=startX-x;var dy=startY-y;if(Math.abs(dx)>=config.min_move_x){cancelTouch();if(dx>0){config.wipeLeft()}else{config.wipeRight()}}else if(Math.abs(dy)>=config.min_move_y){cancelTouch();if(dy>0){config.wipeDown()}else{config.wipeUp()}}}}function onTouchStart(e){if(e.touches.length==1){startX=e.touches[0].pageX;startY=e.touches[0].pageY;isMoving=true;this.addEventListener('touchmove',onTouchMove,false)}}if('ontouchstart'in document.documentElement){this.addEventListener('touchstart',onTouchStart,false)}});return this}})(jQuery);

!function ($) {

    "use strict";

    /* SLIDING PANEL CLASS DEFINITION
     * ============================== */

    var SlidingPanel = function (element, options) {
        this.options  = options;
        this.$element = $(element);
        this.$page    = $(this.options.page);

        if (this.options.stylize) this._stylize();
        this._initEventHandlers();
    };

    SlidingPanel.prototype = {

        constructor: SlidingPanel,

        _initEventHandlers: function () {
            var self = this;

            this.$element.delegate('[data-dismiss="panel"]', 'click.dismiss.panel', $.proxy(this.hide, this));
            this.$page.on('click', function (e) { if (!$(e.target).is('[data-toggle="panel"]')) self.hide(); });
        },

        _stylize: function () {
            var transitionPrefix = this._getPrefix('transition'),
                transformPrefix = this._getPrefix('transform');

            if (Modernizr.csstransforms3d) {
                this.$element.css(transitionPrefix + 'transition', transformPrefix + 'transform ' + this.options.speed + 'ms ease-in-out');
                this.$page.css(transitionPrefix + 'transition', transformPrefix + 'transform '+ this.options.speed + 'ms ease-in-out');
            } else if (Modernizr.csstransitions) {
                this.$element.css(transitionPrefix + 'transition', 'left ' + this.options.speed + 'ms ease-in-out');
                this.$page.css(transitionPrefix + 'transition', 'left '+ this.options.speed + 'ms ease-in-out');
            }
        },

        _getPrefix: function (prop) {
            var prefixes = ['Moz', 'Webkit', 'Khtml', 'O', 'ms'],
                elem = document.createElement('div'),
                upper = prop.charAt(0).toUpperCase() + prop.slice(1),
                pref = "";
            for (var len = prefixes.length; len--;) {
                if ((prefixes[len] + upper) in elem.style) {
                    pref = (prefixes[len]);
                }
            }
            if (prop in elem.style) {
                return '';
            }

            return '-' + pref.toLowerCase() + '-';
        },

        toggle: function () {
            return this[this.isShown ? 'hide' : 'show']();
        },

        show: function () {
            var e = $.Event('show');

            this.$element.trigger(e);

            if (this.isShown || e.isDefaultPrevented()) {
                return;
            }

            this.isShown = true;

            if (Modernizr.csstransforms3d) {
                var prefix = this._getPrefix('transform');
                this.$element.css(prefix + 'transform', 'translate3d(' + this.$element.width() + 'px, 0px, 0px)');
                this.$page.css(prefix + 'transform', 'translate3d(' + this.$element.width() + 'px, 0px, 0px)');
            } else if (Modernizr.csstransitions) {
                this.$element.css({left: 0});
                this.$page.css({left: this.$element.width()});
            } else {
                this.$element.stop().animate({left: 0}, this.options.speed);
                this.$page.stop().animate({left: this.$element.width()}, this.options.speed);
            }

            this.$element.focus().trigger('shown');
        },

        hide: function () {
            var e = $.Event('hide');

            this.$element.trigger(e);

            if (!this.isShown || e.isDefaultPrevented()) {
                return;
            }

            this.isShown = false;

            if (Modernizr.csstransforms3d) {
                var prefix = this._getPrefix('transform');
                this.$element.css(prefix + 'transform', 'translate3d(0px, 0px, 0px)');
                this.$page.css(prefix + 'transform', 'translate3d(0px, 0px, 0px)')
            } else if (Modernizr.csstransitions) {

            } else {

            }

            this.$element.stop().animate({left: (0 - this.$element.width())}, this.options.speed);
            this.$page.stop().animate({left: 0}, this.options.speed);

            this.$element.focus().trigger('hidden');
        }
    }

    $.fn.slidingPanel = function (option) {
        return this.each(function () {
            var $this = $(this),
                data = $this.data('panel'),
                options = $.extend({}, $.fn.slidingPanel.defaults, $this.data(), typeof option == 'object' && option);

            if (!data) $this.data('panel', (data = new SlidingPanel(this, options)));

            if (typeof option == 'string') data[option]();
            else if (options.show) data.show();
        });
    }

    $.fn.slidingPanel.defaults = {
        speed: 150,
        page: '#wrapper',
        show: true,
        stylize: true
    }

    $(document).on('click.panel.data-api', '[data-toggle="panel"]', function (e) {
        var $this = $(this),
            href = $this.attr('href'),
            $target = $($this.attr('data-target') || (href && href.replace(/.*(?=#[^\s]+$)/, ''))), //strip for ie7
            option = $target.data('panel') ? 'toggle' : $.extend({}, $target.data(), $this.data());

        e.preventDefault();

        $target.slidingPanel(option);
    });
}(jQuery);