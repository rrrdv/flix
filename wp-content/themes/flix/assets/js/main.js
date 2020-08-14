(function($) {

    "use strict";

    $(document).ready(function() {

        if (vlog_js_settings.login_label_placeholder) {
            $("#loginform label").not(".forgetmenot label").each(function() {
                var label = $(this);
                var placeholder = label.text();
                //placeholder = placeholder.replace(/\s/g, '');
                label.contents().first().remove();
                label.find("input").attr("placeholder", placeholder).val("").focus().blur();
            });
        }

        /* Logo check */

        vlog_logo_setup();

        /* Sticky header */

        if (vlog_js_settings.header_sticky) {

            var vlog_last_top;

            if ($('.vlog-top-bar').length && $('.vlog-top-bar').is(':visible')) {
                $('.vlog-responsive-header').css('top', $('.vlog-top-bar').height());
            }

            $(window).scroll(function() {

                var top = $(window).scrollTop();
                var price_info = $('.vlog-top-bar');

                if (vlog_js_settings.header_sticky_up) {
                    if (vlog_last_top > top && top >= vlog_js_settings.header_sticky_offset) {
                        if (!$("body").hasClass('vlog-header-sticky-on')) {
                            $("body").addClass("vlog-sticky-header-on");
                        }
                    } else {
                        $("body").removeClass("vlog-sticky-header-on");
                        $('.vlog-sticky-header .vlog-action-search.active i').addClass('fv-search').removeClass('fv-close');
                        $('.vlog-sticky-header .vlog-actions-button').removeClass('active');

                    }
                } else {
                    if (top >= vlog_js_settings.header_sticky_offset) {
                        if (!$("body").hasClass('vlog-header-sticky-on')) {
                            $("body").addClass("vlog-sticky-header-on");
                            if (price_info.length && price_info.is(':visible') && $(window).width() > 768) {
                                price_info.css('position', 'fixed').css('top', 0);
                                $('.vlog-sticky-header').css('top', price_info.height());
                            }
                        }
                    } else {
                        $("body").removeClass("vlog-sticky-header-on");
                        $('.vlog-sticky-header .vlog-action-search.active i').addClass('fv-search').removeClass('fv-close');
                        $('.vlog-sticky-header .vlog-actions-button').removeClass('active');
                        if( $(window).width() > 768) {
                            price_info.css('position', 'static');
                        }
                    }
                }

                vlog_last_top = top;
            });
        }

        /* Top bar height check and admin bar fixes*/

        var vlog_admin_top_bar_height = 0;
        vlog_top_bar_check();

        function vlog_top_bar_check() {
            if ($('.vlog-top-bar').length && $('.vlog-top-bar').is(':visible')) {
                vlog_admin_top_bar_height = $('.vlog-top-bar').height();

            }

            vlog_responsive_header();

        }

        function vlog_responsive_header() {

            if ($('.vlog-responsive-header').length) {

                $('.vlog-responsive-header').css('top', vlog_admin_top_bar_height);



                if (vlog_admin_top_bar_height > 0 && $('.vlog-top-bar').css('position') == 'absolute') {

                    if ($(window).scrollTop() <= vlog_admin_top_bar_height) {
                        $('.vlog-responsive-header').css('position', 'absolute');
                    } else {
                        $('.vlog-responsive-header').css('position', 'fixed').css('top', 0);
                    }

                }

            }
        }

        $(window).scroll(function() {

            vlog_responsive_header();

        });

         /* Check if Device is android and hide self-hosted player */

        if (/Android/i.test(navigator.userAgent)) {

            $('body').on('click', '.mejs-playpause-button button, .mejs-overlay-play', function(event) {
            var target = $( event.target );

                if ( target.is( "button" ) || target.is( "div" ) ) {
                    $('body').toggleClass('player-android-on');
                }

            });
        }

        /* Responsive menu */

        $('#dl-menu').dlmenu({
            animationClasses: {
                classin: 'dl-animate-in-2',
                classout: 'dl-animate-out-2'
            }
        });

        var vlog_cover_slider;

        /* Featured area sliders */
        $(".vlog-featured-slider").each(function() {
            vlog_cover_slider = $(this);
            vlog_cover_slider.owlCarousel({
                loop: true,
                autoHeight: false,
                autoWidth: false,
                items: 1,
                margin: 0,
                nav: true,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                center: false,
                fluidSpeed: 100,
                mouseDrag: false,
                autoplay: parseInt(vlog_js_settings.cover_autoplay) ? true : false,
                autoplayTimeout: parseInt(vlog_js_settings.cover_autoplay_time) * 1000,
                autoplayHoverPause: true,
                onChanged: function(elem) {

                    var current = this.$element.find('.owl-item.active');
                    var format_content = current.find('.vlog-format-content');

                    if (format_content !== undefined && format_content.children().length !== 0) {

                        var item_wrap = current.find('.vlog-featured-item');
                        var cover = item_wrap.find('.vlog-cover');

                        if (cover.attr('data-action') == 'audio' || cover.attr('data-action') == 'video') {

                            var cover_bg = current.find('.vlog-cover-bg');
                            var inplay = item_wrap.find('.vlog-format-inplay');

                            format_content.html('');
                            format_content.fadeOut(300);
                            inplay.fadeOut(300);
                            cover.fadeIn(300);
                            item_wrap.find('.vlog-f-hide').fadeIn(300);
                            cover_bg.removeAttr('style');


                        }
                    }

                },
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
            });

        });


        $('.vlog-featured-slider-4').owlCarousel({
            stagePadding: 200,
            loop: true,
            margin: 0,
            items: 1,
            center: true,
            nav: true,
            autoWidth: true,
            autoplay: parseInt(vlog_js_settings.cover_autoplay) ? true : false,
            autoplayTimeout: parseInt(vlog_js_settings.cover_autoplay_time) * 1000,
            autoplayHoverPause: true,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                    stagePadding: 200
                },
                600: {
                    items: 1,
                    stagePadding: 200
                },
                990: {
                    items: 1,
                    stagePadding: 200
                },
                1200: {
                    items: 1,
                    stagePadding: 250
                },
                1400: {
                    items: 1,
                    stagePadding: 300
                },
                1600: {
                    items: 1,
                    stagePadding: 350
                },
                1800: {
                    items: 1,
                    stagePadding: 768
                }
            }
        });

        /* Module slider */

        $(".vlog-slider").each(function() {
            var controls = $(this).closest('.vlog-module').find('.vlog-slider-controls');
            var module_columns = $(this).closest('.vlog-module').attr('data-col');
            var layout_columns = controls.attr('data-col');
            var slider_items = module_columns / layout_columns;
            var autoplay = parseInt(controls.attr('data-autoplay')) ? true : false;
            var autoplay_time = parseInt(controls.attr('data-autoplay-time')) * 1000;

            $(this).owlCarousel({
                rtl: (vlog_js_settings.rtl_mode === "true"),
                loop: true,
                autoHeight: false,
                autoWidth: false,
                items: slider_items,
                margin: 40,
                nav: true,
                center: false,
                fluidSpeed: 100,
                autoplay: autoplay,
                autoplayTimeout: autoplay_time,
                autoplayHoverPause: true,
                navContainer: controls,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        margin: 0,
                        items: (layout_columns <= 2) ? 2 : 1
                    },
                    1023: {
                        margin: 36,
                        items: slider_items
                    }
                }
            });
        });

        /* Widget slider */

        $(".vlog-widget-slider").each(function() {
            var $controls = $(this).closest('.widget').find('.vlog-slider-controls');

            $(this).owlCarousel({
                rtl: (vlog_js_settings.rtl_mode === "true"),
                loop: true,
                autoHeight: false,
                autoWidth: false,
                items: 1,
                nav: true,
                center: false,
                fluidSpeed: 100,
                margin: 0,
                navContainer: $controls,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
            });
        });


        /* On window resize-events */

        $(window).resize(function() {
            // Don't do anything in full screen mode
            if(document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement || document.msFullscreenElement){
                return;
            }
            vlog_sticky_sidebar();
            vlog_logo_setup();
            vlog_sidebar_switch();
            vlog_cover_height_fix();
        });


        /* Check if there is colored section below featured area */

        $(".vlog-featured-1").each(function() {
            var $featured = $(this);
            var $vlog_bg = $(this).next();
            var $vlog_bg_color = $vlog_bg.css('background-color');

            if ($vlog_bg.hasClass('vlog-bg')) {
                $featured.css('background-color', $vlog_bg_color);
            }
        });



        /* Fitvidjs functionality on single posts */

        vlog_fit_videos($('.vlog-single-content .entry-media, .entry-content-single, .vlog-single-cover .vlog-popup-wrapper'));


        /* Highlight area hovers */

        $(".vlog-featured .vlog-highlight .entry-title a,.vlog-featured .vlog-highlight .action-item,.vlog-active-hover .entry-title,.vlog-active-hover .action-item").hover(function() {
                $(this).siblings().stop().animate({
                    opacity: 0.4
                }, 150);
                $(this).parent().siblings().stop().animate({
                    opacity: 0.4
                }, 150);
                $(this).parent().parent().siblings().stop().animate({
                    opacity: 0.4
                }, 150);
            },
            function() {
                $(this).siblings().stop().animate({
                    opacity: 1
                }, 150);
                $(this).parent().siblings().stop().animate({
                    opacity: 1
                }, 150);
                $(this).parent().parent().siblings().stop().animate({
                    opacity: 1
                }, 150);
            });


        /* Header search */

        $('body').on('click', '.vlog-action-search span', function() {

            $(this).find('i').toggleClass('fv-close', 'fv-search');
            $(this).closest('.vlog-action-search').toggleClass('active');
            setTimeout(function() {
                $('.active input[type="text"]').focus();
            }, 150);

        });

        $('body').on('click', '.vlog-responsive-header .vlog-listen-later span', function() {

            $(this).closest('.vlog-listen-later').toggleClass('active');
            $('.vlog-responsive-header .vlog-action-search').removeClass('active').find('i').removeClass('fv-close').addClass('fv-search');
            $('.vlog-responsive-header .vlog-listen-later.active .sub-menu').css('width', $(window).width()).css('height', $(window).height());


        });

        $(document).on('click', function(evt) {
            if (!$(evt.target).is('.vlog-responsive-header .vlog-action-search')) {
                if ($('.vlog-responsive-header').hasClass('vlog-res-open')) {
                    $(".vlog-responsive-header .dl-trigger").trigger("click");
                }

                $('.vlog-responsive-header .vlog-action-search.active .sub-menu').css('width', $(window).width());
            }
        });

        /* On images loaded events */

        $('body').imagesLoaded(function() {
            vlog_sticky_sidebar();
            vlog_sidebar_switch();

        });


        $('.vlog-cover-bg:first').imagesLoaded(function() {
            $('.vlog-cover').animate({
                opacity: 1
            }, 300);
        });

        /* Share buttons click */

        $('body').on('click', '.vlog-share-item', function(e) {
            e.preventDefault();
            var data = $(this).attr('data-url');
            vlog_social_share(data);
        });


        /* Handling url on ajax call for load more and infinite scroll case */
        if ($('.vlog-infinite-scroll').length || $('.vlog-load-more').length) {

            var vlog_url_pushes = [];
            var vlog_pushes_up = 0;
            var vlog_pushes_down = 0;

            var push_obj = {
                prev: window.location.href,
                next: '',
                offset: $(window).scrollTop(),
                prev_title: window.document.title,
                next_title: window.document.title
            };

            vlog_url_pushes.push(push_obj);
            window.history.pushState(push_obj, '', window.location.href);

            var last_up, last_down = 0;

            $(window).scroll(function() {
                if (vlog_url_pushes[vlog_pushes_up].offset != last_up && $(window).scrollTop() < vlog_url_pushes[vlog_pushes_up].offset) {

                    last_up = vlog_url_pushes[vlog_pushes_up].offset;
                    last_down = 0;
                    window.document.title = vlog_url_pushes[vlog_pushes_up].prev_title;
                    window.history.replaceState(vlog_url_pushes, '', vlog_url_pushes[vlog_pushes_up].prev); //1

                    vlog_pushes_down = vlog_pushes_up;
                    if (vlog_pushes_up != 0) {
                        vlog_pushes_up--;
                    }
                }
                if (vlog_url_pushes[vlog_pushes_down].offset != last_down && $(window).scrollTop() > vlog_url_pushes[vlog_pushes_down].offset) {

                    last_down = vlog_url_pushes[vlog_pushes_down].offset;
                    last_up = 0;

                    window.document.title = vlog_url_pushes[vlog_pushes_down].next_title;
                    window.history.replaceState(vlog_url_pushes, '', vlog_url_pushes[vlog_pushes_down].next);

                    vlog_pushes_up = vlog_pushes_down;
                    if (vlog_pushes_down < vlog_url_pushes.length - 1) {
                        vlog_pushes_down++;
                    }

                }
            });

        }


        /* Load more button handler */
        var vlog_load_ajax_new_count = 0;

        $("body").on('click', '.vlog-load-more a', function(e) {

            e.preventDefault();
            var start_url = window.location.href;
            var prev_title = window.document.title;
            var $link = $(this);
            var page_url = $link.attr("href");

            $link.addClass('vlog-loader-active');
            $('.vlog-loader').show();
            $("<div>").load(page_url, function() {
                var n = vlog_load_ajax_new_count.toString();
                var $wrap = $link.closest('.vlog-module').find('.vlog-posts');
                var $new = $(this).find('.vlog-module:last article').addClass('vlog-new-' + n);
                var $this_div = $(this);

                $new.imagesLoaded(function() {

                    $new.hide().appendTo($wrap).fadeIn(400);

                    if ($this_div.find('.vlog-load-more').length) {
                        $('.vlog-load-more').html($this_div.find('.vlog-load-more').html());
                        $('.vlog-loader').hide();
                        $link.removeClass('vlog-loader-active');
                    } else {
                        $('.vlog-load-more').fadeOut('fast').remove();
                    }

                    vlog_sticky_sidebar();

                    if (page_url != window.location) {

                        vlog_pushes_up++;
                        vlog_pushes_down++;
                        var next_title = $this_div.find('title').text();

                        var push_obj = {
                            prev: start_url,
                            next: page_url,
                            offset: $(window).scrollTop(),
                            prev_title: prev_title,
                            next_title: next_title
                        };

                        vlog_url_pushes.push(push_obj);
                        window.document.title = next_title;
                        window.history.pushState(push_obj, '', page_url);

                    }

                    vlog_load_ajax_new_count++;

                    return false;
                });

            });

        });


        /* Infinite scroll handler */
        var vlog_infinite_allow = true;

        if ($('.vlog-infinite-scroll').length) {
            $(window).scroll(function() {
                if (vlog_infinite_allow && $('.vlog-infinite-scroll').length && ($(this).scrollTop() > ($('.vlog-infinite-scroll').offset().top) - $(this).height() - 200)) {

                    var $link = $('.vlog-infinite-scroll a');
                    var page_url = $link.attr("href");
                    var start_url = window.location.href;
                    var prev_title = window.document.title;

                    if (page_url != undefined) {
                        vlog_infinite_allow = false;
                        $('.vlog-loader').show();
                        $("<div>").load(page_url, function() {
                            var n = vlog_load_ajax_new_count.toString();
                            var $wrap = $link.closest('.vlog-module').find('.vlog-posts');
                            var $new = $(this).find('.vlog-module:last article').addClass('vlog-new-' + n);
                            var $this_div = $(this);

                            $new.imagesLoaded(function() {

                                $new.hide().appendTo($wrap).fadeIn(400);

                                if ($this_div.find('.vlog-infinite-scroll').length) {
                                    $('.vlog-infinite-scroll').html($this_div.find('.vlog-infinite-scroll').html());
                                    $('.vlog-loader').hide();
                                    vlog_infinite_allow = true;
                                } else {
                                    $('.vlog-infinite-scroll').fadeOut('fast').remove();
                                }

                                vlog_sticky_sidebar();

                                if (page_url != window.location) {

                                    vlog_pushes_up++;
                                    vlog_pushes_down++;
                                    var next_title = $this_div.find('title').text();

                                    var push_obj = {
                                        prev: start_url,
                                        next: page_url,
                                        offset: $(window).scrollTop(),
                                        prev_title: prev_title,
                                        next_title: next_title
                                    };

                                    vlog_url_pushes.push(push_obj);
                                    window.document.title = next_title;
                                    window.history.pushState(push_obj, '', page_url);

                                }

                                vlog_load_ajax_new_count++;

                                return false;
                            });

                        });
                    }
                }
            });
        }

        /**
         * Check if is set some other laguage and return his language key to fix ajax request
         * @type mixed Sting or Null
         */
        var wpml_current_lang = vlog_js_settings.ajax_wpml_current_lang !== null ? '?wpml_lang='+vlog_js_settings.ajax_wpml_current_lang : '';

        /* Cover format actions */
        $("body").on('click touch', '.vlog-cover', function(e) {

            var action = $(this).attr('data-action');
            var container = $(this).closest('.vlog-cover-bg').find('.video-wrap');
            var item_wrap = $(this).closest('.vlog-featured-item');
            var cover_bg = $(this).closest('.vlog-cover-bg');
            var inplay = item_wrap.find('.vlog-format-inplay');

            if (action == 'video') {

                if (item_wrap.parent().hasClass('owl-item')) {
                    vlog_cover_slider.trigger('stop.owl.autoplay');
                    if ($(window).width() < 768) {
                        $('.owl-nav').hide();
                    }
                }

                var data = {
                    action: 'vlog_format_content',
                    format: 'video',
                    display_playlist: $('.vlog-single-cover').length ? true : false,
                    id: $(this).attr('data-id')
                };

                var opener = $(this);

                opener.fadeOut(300, function() {
                    container.append('<div class="vlog-format-loader"><div class="uil-ripple-css"><div></div><div></div></div></div>');
                    container.fadeIn(300);

                    inplay.find('.container').html('');
                    inplay.find('.container').append(item_wrap.find('.entry-header').clone()).append(item_wrap.find('.entry-actions').clone());

                    vlog_try_autoplay(container);
                    vlog_fit_videos(container);

                    container.find('.vlog-format-loader').remove();
                    item_wrap.find('.vlog-f-hide').fadeOut(300);

                    $('body').addClass('vlog-in-play');
                    inplay.slideDown(300);
                    if ($(window).width() > 768) {

                        var set_height = cover_bg.get(0).scrollHeight;

                        if (!$('.vlog-popup-wrapper > .vlog-cover-playlist-active').length) {
                            set_height = set_height < 690 ? 690 : set_height;
                            cover_bg.animate({
                                height: set_height
                            }, 300);
                        } else {
                            cover_bg.css('height', 'auto');
                            cover_bg.addClass('vlog-cover-playlist-active');
                            item_wrap.addClass('vlog-playlist-mode-acitve');
                        }

                        var $video = cover_bg.find('.vlog-playlist-video iframe'),
                        $script = cover_bg.find('.vlog-playlist-video script');

                        if (!$video.length && !$script.length) {
                            $video = cover_bg.find('.vlog-playlist-video video');
                        }

                    } else {
                        cover_bg.css('height', 'auto');
                        cover_bg.parent().css('height', 'auto');
                    }

                });

            }

        });

        /* Cinema mode */

        var vlog_before_cinema_height;
        var vlog_before_cinema_width;

        $("body").on('click', '.action-item.cinema-mode', function(e) {
            e.preventDefault();

            var current_video = $(this).closest('.vlog-featured-item').find('.vlog-format-content');

            $(window).scrollTop(0);

            $('body').addClass('vlog-popup-on');
            current_video.addClass('vlog-popup');


            if ($('.vlog-featured-slider').length) {
                vlog_before_cinema_height = current_video.height();
                vlog_before_cinema_width = current_video.width();



                if ($(window).width() > 990) {
                    current_video.height($(window).height()).width($(window).width()).css('top', -$('.vlog-site-header').height()).css('marginTop', -$('.vlog-site-header').height() / 2);
                } else {
                    current_video.height($(window).height()).width($(window).width()).css('top', -50).css('marginTop', -$('.vlog-site-header').height() / 2);
                    $('.vlog-responsive-header').css('z-index', 0);
                }


                var current_slide = $('.vlog-popup').parent().parent().parent();
                current_slide.attr('data-width', current_slide.width()).height($(window).height()).width($(window).width());



                $('.vlog-header-wrapper').css('z-index', 0);

            }

            if ($('.vlog-single-content .vlog-format-content').length && $(window).width() < 1367) {
                vlog_before_cinema_height = current_video.height();
                vlog_before_cinema_width = current_video.width();
                current_video.height($(window).height()).width($(window).width());
            }

            if (!current_video.find('.vlog-popup-wrapper').length) {
                current_video.closest('.vlog-cover-bg').find('.vlog-cover').click();
            }

            current_video.append('<a class="vlog-popup-close" href="javascript:void(0);"><i class="fv fv-close"></i></a>');
            if ($('.vlog-featured-slider').length) {
                $('.vlog-popup-close').css('top', $('.vlog-site-header').height() - 20);
            }

        });

        /* Video no download attribute */
        $(".single video").each(function(){
            $(this).attr('controlsList','nodownload');
            $(this).load();
        });

        /* Close popup */

        $("body").on('click', '.vlog-popup-close', function(e) {

            var cover_bg = $(this).closest('.vlog-cover-bg');

            if ($('.vlog-featured-slider').length) {

                $(this).closest('.vlog-format-content').removeAttr('style');
                $('.vlog-header-wrapper').css('z-index', 10);
                var current_slide = $('.vlog-popup').parent().parent().parent();
                current_slide.removeAttr('style').css('width', current_slide.attr('data-width'));

            }

            if ($('.vlog-single-content .vlog-format-content').length && $(window).width() < 1367) {
                $(this).closest('.vlog-format-content').removeAttr('style');
            }

            $(this).closest('.vlog-format-content').removeClass('vlog-popup');

            $('body').removeClass('vlog-popup-on');
            $('.action-item, .entry-header').removeAttr('style');
            $(this).remove();

            setTimeout(function() {
                var isFF = !!window.sidebar;
                if (isFF == true) {
                    cover_bg.removeAttr('style');
                }

                cover_bg.animate({
                    height: cover_bg.get(0).scrollHeight
                }, 300);



            }, 50);

            if ($(window).width() < 990) {
                $('.vlog-responsive-header').removeAttr('style');
            }


        });

        /* Close popup on Escape */

        $(document).keyup(function(ev) {
            if (ev.keyCode == 27 && $('body').hasClass('vlog-popup-on')) {

                $('.vlog-popup-close').click();

            }
        });


        /* Cover in play mode */
        if ((vlog_js_settings.cover_inplay && $('.vlog-cover-bg').length && $('.vlog-cover-bg').hasClass('video')) || (vlog_js_settings.cover_inplay_audio && $('.vlog-cover-bg').length && $('.vlog-cover-bg').hasClass('audio'))) {

            var cover_bg = $('.vlog-cover-bg');
            vlog_fit_videos($('.vlog-format-content'));
            vlog_disable_related_videos(cover_bg);



            var $playlist_list = $('.vlog-playlist');

            if ($playlist_list.length) {

                setTimeout(function() {
                    var $video = cover_bg.find('.vlog-playlist-video iframe'),
                        $script = cover_bg.find('.vlog-playlist-video script');

                    if (!$video.length && !$script.length) {
                        $video = cover_bg.find('.vlog-playlist-video video');
                    }

                    // Fix for playwire
                    if (!$script.length) {
                        $playlist_list.find('.vlog-posts').css('height', $video.height() - $playlist_list.find('.vlog-mod-head').height() - 25);
                    }else{
                        $playlist_list.find('.vlog-posts').css('height', $script.parent().height() - $playlist_list.find('.vlog-mod-head').height() - 25 ); // Fix for margin bottom
                    }

                    $('.vlog-cover-bg').animate({
                        height: cover_bg.get(0).scrollHeight
                    }, 300);
                    $('.vlog-format-inplay').slideDown(300);

                }, 500);
            } else {
                $('.vlog-cover-bg').animate({
                    height: cover_bg.get(0).scrollHeight
                }, 300);
                $('.vlog-format-inplay').slideDown(300);
            }

            /* playwire support */
            setTimeout(function() {
                if (cover_bg.find('iframe').hasClass('zeus_iframe') && $(window).width() > 1240) {
                    var h = cover_bg.find('.vlog-popup-wrapper div').height();
                    if (h > 500) {
                        cover_bg.css('height', h + 70);
                    }
                }
            }, 1000);
        }


        $(document).on('playwire-ready', function() {
            //console.log(6);

            $('.vlog-cover-playlist-active').css('margin-bottom', '40px');
            $playlist_list.find('.vlog-posts').css('height', $script.parent().height() - $playlist_list.find('.vlog-mod-head').height() ); // Fix for margin bottom
        });
        /* Reverse submenu ul if out of the screen */

        $('.vlog-main-nav li').hover(function(e) {
            if ($(this).closest('body').width() < $(document).width()) {

                $(this).find('ul').addClass('vlog-rev');
            }
        }, function() {
            $(this).find('ul').removeClass('vlog-rev');
        });

        /* Sticky sidebar */

        function vlog_sticky_sidebar() {
            if ($(window).width() >= 1024) {
                if ($('.vlog-sticky').length) {
                    $('.vlog-sidebar').each(function() {
                        var $section = $(this).closest('.vlog-section');
                        if ($section.find('.vlog-ignore-sticky-height').length) {
                            var section_height = $section.height() - $section.find('.vlog-ignore-sticky-height').height();
                        } else {
                            var section_height = $section.height();
                        }

                        $(this).css('min-height', section_height);
                    });
                }
            } else {
                $('.vlog-sidebar').each(function() {
                    $(this).css('height', 'auto');
                    $(this).css('min-height', '1px');
                });
            }
            $(".vlog-sticky").stick_in_parent({
                parent: ".vlog-sidebar",
                inner_scrolling: false,
                offset_top: 99
            });
            if ($(window).width() < 1024) {
                $(".vlog-sticky").trigger("sticky_kit:detach");
            }
        }

        /* Put sidebars below content in responsive mode */
        function vlog_sidebar_switch() {
            $('.vlog-sidebar-left').each(function() {
                if ($(window).width() < 992) {
                    $(this).insertAfter($(this).next());
                } else {
                    $(this).insertBefore($(this).prev());
                }
            });
        }


        /* Share popup function */

        function vlog_social_share(data) {
            window.open(data, "Share", 'height=500,width=760,top=' + ($(window).height() / 2 - 250) + ', left=' + ($(window).width() / 2 - 380) + 'resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0');
        }


        /* Switch to retina logo */

        var vlog_retina_logo_done = false,
            vlog_retina_mini_logo_done = false;

        function vlog_logo_setup() {

            //Retina logo
            if (window.devicePixelRatio > 1) {

                if (vlog_js_settings.logo_retina && !vlog_retina_logo_done && $('.vlog-logo').length) {
                    $('.vlog-logo').imagesLoaded(function() {

                        $('.vlog-logo').each(function() {
                            if ($(this).is(':visible')) {
                                var width = $(this).width();
                                $(this).attr('src', vlog_js_settings.logo_retina).css('width', width + 'px');
                            }
                        });
                    });

                    vlog_retina_logo_done = true;
                }

                if (vlog_js_settings.logo_mini_retina && !vlog_retina_mini_logo_done && $('.vlog-logo-mini').length) {
                    $('.vlog-logo-mini').imagesLoaded(function() {
                        $('.vlog-logo-mini').each(function() {
                            if ($(this).is(':visible')) {
                                var width = $(this).width();
                                $(this).attr('src', vlog_js_settings.logo_mini_retina).css('width', width + 'px');
                            }
                        });
                    });

                    vlog_retina_mini_logo_done = true;
                }
            }
        }

        /* Fitvidjs function */
        function vlog_fit_videos(obj) {
            //obj.find('iframe').removeAttr('width').removeAttr('height');
            obj.fitVids({
                customSelector: "iframe[src^='https://www.dailymotion.com'], iframe[src^='https://player.twitch.tv'], iframe[src^='https://vine.co'], iframe[src^='https://videopress.com'], iframe[src^='https://www.facebook.com'],iframe[src^='//content.jwplatform.com'],iframe[src^='//fast.wistia.net'],iframe[src^='//www.vooplayer.com'], iframe[src^='http://content.zetatv.com.uy'], iframe[src^='//embed.wirewax.com'], iframe[src^='https://eventopedia.navstream.com'], iframe[src^='http://cdn.playwire.com'], iframe[src*='//www.liveleak.com'], iframe[src^='https://drive.google.com'],iframe[src*='wistia.com'],iframe[src*='//videos.sproutvideo.com']"
            });
        }

        /* Video tweaks to force autoplay if possible */
        function vlog_try_autoplay(container) {

            if (container.find('video').length) {
                var video = container.find('video');
                video.attr('autoplay', 'true');
                video[0].play();

            } else if (container.find('.flowplayer').length) {
                var video = container.find('.flowplayer');
                video.attr('data-fvautoplay', 'true');

            } else if (container.find('iframe').length) {
                var video = container.find('iframe');
                if (video.attr('src').match(/\?/gi)) {
                    video.attr('src', video.attr('src') + '&autoplay=1&auto_play=1');
                } else {
                    video.attr('src', video.attr('src') + '?autoplay=1&auto_play=1');
                }

            } else if (container.find('script').length) {
                var video = container.find('script');
                video.attr('data-onready', 'vlog_playwire');
                video.attr('data-id', 'vlog_playwire');

            } else if (container.find('audio').length) {
                container.find('audio').attr('autoplay', 'true');
            }

        }

        function vlog_disable_related_videos(container) {
            if (vlog_js_settings.video_disable_related && container.find('iframe').length) {
                var video = container.find('iframe');
                if (video.attr('src').match(/\?/gi)) {
                    video.attr('src', video.attr('src') + '&rel=0');
                } else {
                    video.attr('src', video.attr('src') + '?rel=0');
                }
            }
        }


        if (vlog_js_settings.video_display_sticky && $('.vlog-format-content.video').length) {

            var $formatContent = $('.vlog-format-content.video');
            $formatContent.prepend(
                '<div class="vlog-video-sticky-header clearfix">\n' +
                '    <span class="widget-title h5">' + vlog_js_settings.video_sticky_title + '</span>\n' +
                '    <a id="vlog-video-sticky-close" href="javascript:void(0)"><span class="fv fv-close"></span></a>\n' +
                '</div>');

            var sticky_video_state = false;

            $(window).scroll(function() {

                var $iframe = $('.vlog-format-content.video iframe, .vlog-format-content.video video');
                if ($iframe.length < 1 || $(window).width() < 1200 || $formatContent.hasClass('vlog-ignore-sticky')) return;

                var bottom = $iframe.position().top + $iframe.outerHeight(true),
                    scroll = $(window).scrollTop();

                if (!sticky_video_state && bottom < scroll) {
                    $formatContent.addClass('vlog-sticky-video');
                    sticky_video_state = true;
                    setTimeout(function() {
                        $formatContent.addClass('vlog-sticky-animation');
                    }, 300);
                }

                if (sticky_video_state && bottom > scroll) {
                    $formatContent.removeClass('vlog-sticky-video').removeClass('vlog-sticky-animation');
                    sticky_video_state = false;
                }
            });
        }

        $('body').on('click', '#vlog-video-sticky-close', function(e) {
            e.preventDefault();
            $('.vlog-format-content').removeClass('vlog-sticky-video').addClass('vlog-ignore-sticky');
        });


        /* Cover Area - custom content layout wrapper height improvements */

        vlog_cover_height_fix();

        function vlog_cover_height_fix(){

            if ( !$('.vlog-featured-custom').length ) return;

            var custom_area = $('.vlog-featured-custom .vlog-featured-item');
            var custom_area_height = custom_area.height();
            var custom_content_height = custom_area.find('.vlog-featured-info-custom').height();

            if ( custom_content_height > custom_area_height ) {
                custom_area.attr('style', 'height: ' + ( custom_content_height ) + 'px !important');
                custom_area.find('.vlog-cover-bg').attr('style', 'height: ' + custom_content_height + 'px !important');
           }
        }

        /* Image shadow */
        function flix_image_shadow(){
            $('.flix-shadow').closest('.module-cats').addClass('flix-shadow-wrap');
            var imgs = $(".flix-shadow"),
                id = 0;
            var style = "";

            for (var i = 0, j = imgs.length; i < j; ++i) {
            var img = imgs[i],
                src = img.src;

            var container = document.createElement("div");
            container.className = "flix-shadow-container flix-shadow";
            container.id = "flix-shadow-"+(++id);
            img.classList.remove("flix-shadow");

            img.parentNode.insertBefore(container, img);
            container.appendChild(img);

            style += "#flix-shadow-"+id+"::after {"+
                    "  background-image: url('"+src+"');"+
                    "  content: '';"+
                    "}";
            }

            var $style = document.createElement("style");
            $style.appendChild(document.createTextNode(style));
            document.head.appendChild($style);
        };
        flix_image_shadow();

        if (vlog_js_settings.um_italian_regulation) {
            $('.open_abo_details a').on("click touchstart", function () {
                $('.abo').trigger('click');
            });
        }

        var settings = {
            //Model Popup
            objModalPopupBtn: ".modalButton",
            objModalCloseBtn: ".overlay, .closeBtn",
            objModalDataAttr: "data-popup"
        }
        $(settings.objModalPopupBtn).bind("click", function () {
            if ($(this).attr(settings.objModalDataAttr)) {

                var strDataPopupName = $(this).attr(settings.objModalDataAttr);

                //Fade In Modal Pop Up
                $(".overlay, #" + strDataPopupName).fadeIn();

            }
        });
        
        $(window).on('load',function(){
            $('.modal').fadeIn();
        });
        //When modal is closed, can be triggered from play icon
        $('.vlog-cover-bg').on('click',function(){
            $('.modal').fadeIn();
        });

        //Wifi scroll to form
        $(".wifi-overlay a[href^='#']").click(function(e) {
        	e.preventDefault();
            if ($(window).width() < 768) {
                var position = $($(this).attr("href")).offset().top - 90;
            } else {
                var position = $($(this).attr("href")).offset().top - 135;
            }
        	$("body, html").animate({
                scrollTop: position + 'px'
        	});
        });

        /* add shadows */
        if ($('.vlog-featured-item .imgsh').parents('.vlog-featured-1').length ||
            $('.vlog-featured-item .imgsh').parents('.vlog-featured-2').length ||
            $('.vlog-featured-item .imgsh').parents('.vlog-featured-3').length) {
            $('.vlog-featured-item .imgsh').wrap( "<span class='shadowgr'></span>" );
        }

        /* padding bottom for #wrap = height of footer */
        footer_padding();

        /* set image width and height for Post Layouts - Layout F */
        var aspect_layout_f = vlog_js_settings.img_size_lay_f_ratio;
        var dim = aspect_layout_f.split('_');
        var prc_width = dim[0];
        var prc_height = dim[1];

        var img_width = $('.vlog-post .entry-image').width();
        var img_height = parseInt(prc_height * img_width / prc_width);

        $('.vlog-lay-f .entry-image img').css({
            'min-width': '100%',
            'min-height': '100%',
            'object-fit': 'contain',
        });
        $('.vlog-lay-f .entry-image').css({
            'height': img_height,
            'background': '#000',
            'text-align': 'center',
        });

    }); //document ready end
})(jQuery);

//calculate padding when changing from portrait to landscape on tablet
jQuery(window).on('resize', function() {
    footer_padding();
});

function footer_padding() {
    var footer_height = jQuery('#footer').height();
    jQuery('#content').css('padding-bottom', footer_height);
}

function vlog_playwire() {
    Bolt.playMedia('vlog_playwire');
    jQuery(document).trigger('playwire-ready');
}
