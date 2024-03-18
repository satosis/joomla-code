/* Copyright (C) YOOtheme GmbH, http://www.gnu.org/licenses/gpl.html GNU/GPL */

jQuery(function($) {
    
    jQuery(window).load(function () {
            jQuery(".preloader-wrap").delay(3500).fadeOut("slow", function () {
            jQuery(this).remove();
        });
    });

    var config = $('html').data('config') || {};

    // Social buttons
    $('article[data-permalink]').socialButtons(config);
    
    //Draw animated circular progress bars
    $('div[data-circle-value]').each(function() {
        $(this).circleProgress({
            value: $(this).attr('data-circle-value'),
            size: 116,
            fill: {gradient: ["#008eeb", "#008eeb"]},
            animation: { duration: 3200, easing: 'circleProgressEasing' }
        });
    });
    

});

