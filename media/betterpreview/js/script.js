/**
 * @package         Better Preview
 * @version         4.1.3
 * 
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2016 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

(function($) {
	"use strict";

	$(document).ready(function() {
		$('.betterpreview-dropdown .dropdown-toggle').hover(function() {
			var el = $(this).parent();
			var menu = el.find('.dropdown-menu');

			menu.stop(true, true).show();
			el.addClass('open');

			var hide = function() {
				menu.stop(true, true).hide();
				el.removeClass('open');
			};

			$('html').click(function() {
				hide();
			});
			menu.hover(function() {}, function() {
				hide();
			});
			$('#menu').hover(function() {
				hide();
			});
		});

	});
})(jQuery);

