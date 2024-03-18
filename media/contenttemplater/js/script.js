/**
 * @package         Content Templater
 * @version         5.3.0
 * 
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2016 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

var ContentTemplater = null;

(function($) {
	"use strict";

	ContentTemplater = {
		// private property
		keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
		timer  : null,
		overlay: null,

		getXML: function(id, editorname, nocontent) {
			this.overlay = $('<div/>').css({
				backgroundColor: 'black',
				position       : 'absolute',
				left           : 0,
				top            : 0,
				width          : '100%',
				height         : '100%',
				zIndex         : 5000,
				opacity        : .4
			}).hide().on('click', function() {
				window.parent.SqueezeBox.close();
			}).appendTo('#sbox-content');

			this.overlay.css('cursor', 'wait').fadeIn();

			if (!nocontent) {
				nocontent = 0;
			}
			var self = this;

			var url = 'index.php?nn_qp=1&folder=plugins.editors-xtd.contenttemplater&file=popup.php&id=' + id + '&nocontent=' + nocontent;
			nnScripts.loadajax(url, 'ContentTemplater.insertTexts( data, \'' + editorname + '\' )');
		},

		fixTop: function() {
			this.overlay.style.top = document.documentElement.scrollTop + 'px';
		},

		insertTexts: function(data, editorname) {
			var data = this.decode(data);
			data = data.split('[/CT]');

			var params = {};
			for (var i = 0; i < data.length; i++) {
				if (data[i].indexOf('[CT]') != -1) {
					var values = data[i].split('[CT]');
					var key = values[1].trim();
					params[key] = {};
					params[key]['default'] = values[2].trim();
					params[key]['value'] = values[3].trim();
				}
			}

			var override = 0;
			var has_content = 0;

			// check if settings override is set and if template has content
			for (key in params) {
				var param = params[key];
				if (key == 'override_settings') {
					override = param['value'];
				} else if (key == 'content' && param['value'].length != 0) {
					has_content = 1;
				}
			}

			// set all content settings
			for (key in params) {
				if (key != 'content') {
					var param = params[key];
					var field_val = this.getValue(key);
					if (field_val == null) {
						field_val = '';
					}
					var pass = (field_val != null
						&& param['value'] != -1
						&& field_val != param['value']
						&& (override == 1
							|| field_val == param['default']
						)
					);
					if (pass == 1) {
						this.setValue(key, param['value']);
						if (key == 'sectionid' && document.adminForm && document.adminForm.sectionid && sectioncategories) {
							changeDynaList('catid', sectioncategories, document.adminForm.sectionid.options[document.adminForm.sectionid.selectedIndex].value, 0, 0);
						}
					}
				}
			}

			// insert content
			if (has_content) {
				for (key in params) {
					if (key == 'content' && params[key]['value'].length) {
						this.jInsertEditorText(params[key]['value'], editorname);
					}
				}
			}

			this.overlay.remove();
			window.parent.SqueezeBox.close();
		},

		jInsertEditorText: function(value, editor, count) {
			var self = this;
			var ed = document.getElementById(editor);
			var count = ( count == null ) ? 1 : ++count;
			var success = 0;
			// check id the editor is finished loading for max 17.5 seconds
			// 5 * 500ms
			// 5 * 1000ms
			// 5 * 2000ms
			if (count < 15) {
				var wait = ( count > 10 ) ? 2000 : ( count > 5 ) ? 1000 : 500;
				try {
					var text = value;
					if (ed) {
						if (ed.className != '' && ed.className == 'mce_editable'
							&& text.substr(0, 3) == '<p>' && text.substr(text.length - 4, 4) == '</p>'
						) {
							text = text.substr(3, text.length - 7);
						}
						jInsertEditorText(text, editor);
						if (typeof( window['tinyMCE'] ) != "undefined") {
							var ed = tinyMCE.get(editor);
							if (ed) {
								ed.hide();
								window.parent.setTimeout(function() {
									ed.show();
								}, 5);
							}
						}
						success = 1;
					}
				} catch (err) {
				}
				if (success) {
					window.clearTimeout(this.timer);
				} else {
					this.timer = window.setTimeout(function() {
						self.jInsertEditorText(value, editor, count)
					}, wait);
				}
			} else {
				window.clearTimeout(this.timer);
				if (ed) {
					ed.value += value;
				} else {
					alert('Could not find the editor!');
				}
			}
		},

		getValue: function(key) {
			var element = document.getElementById(key);
			if (!element && typeof(document.adminForm) != "undefined" && typeof(document.adminForm.elements) != "undefined") {
				element = document.adminForm.elements[key];
			}
			if (!element) {
				return null;
			}
			var elementLength = element.length;
			if (element.type == 'select-one' || !elementLength) {
				if (element.type == 'checkbox' && !element.checked) {
					return '';
				}
				return element.value;
			} else {
				for (var i = 0; i < elementLength; i++) {
					if (( element.type == 'checkbox' && element[i].checked ) || ( element.type != 'checkbox' && element[i].selected )) {
						return element[i].value;
					}
				}
			}
			return '';
		},

		setValue: function(key, value) {
			if (value == '-empty-') {
				value = '';
			}

			var $els = this.getElements(key);

			$els.each(function(i, el) {
				var $el = $(el);

				if (el.type != 'text' && el.type != 'textarea' && el.type != 'url') {
					$el.removeAttr("selected").removeAttr("checked");
					$el.find("option:selected").removeAttr("selected");
				}
			});
			$els.each(function(i, el) {
				var $el = $(el);

				if (el.type == 'text' || el.type == 'textarea' || el.type == 'url') {
					$el.val(value.toString());
				} else {
					value = value.replace('\\,', '[:COMMA:]');
					var values = value.split(',');
					var valuesLength = values.length;
					for (var i = 0; i < valuesLength; i++) {
						var val = values[i].toString().replace('[:COMMA:]', ',');
						if (el.type.substr(0, 6) == 'select') {
							$el.find('option[value="' + val + '"]').attr("selected", "selected");
							$el.trigger('liszt:updated');
						} else {
							if ($el.val() == val) {
								$('label[for="' + $el.attr('id') + '"]').trigger('click');
								$el.attr("checked", "checked");
							}
						}
					}
				}
				$el.change();
			});
		},

		getElements: function(key) {
			var types = ['input', 'select', 'textarea'];
			var names = [key.replace(/\[/g, '\\[').replace(/\]/g, '\\]')];

			var frontendkey = this.getFrontendKey(key);
			if (frontendkey != key) {
				names.push(frontendkey.replace(/\[/g, '\\[').replace(/\]/g, '\\]'));
			}

			var cleankey = frontendkey.replace(/^.*\[(.*)\]$/g, '$1');
			if (cleankey != key && cleankey != frontendkey) {
				names.push(cleankey);
			}

			var selects = [];
			for (var t = 0, tlen = types.length; t < tlen; t++) {
				for (var n = 0, nlen = names.length; n < nlen; n++) {
					selects.push(types[t] + '[name=' + names[n] + ']');
					selects.push(types[t] + '[name=' + names[n] + '\\[\\]]');
				}
			}

			return $(selects.join(','));
		},

		getFrontendKey: function(key) {

			return key.replace('details', '');
		},

		decode: function(input) {
			var output = "";
			var chr1, chr2, chr3;
			var enc1, enc2, enc3, enc4;
			var i = 0;

			var input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

			while (i < input.length) {
				enc1 = this.keyStr.indexOf(input.charAt(i++));
				enc2 = this.keyStr.indexOf(input.charAt(i++));
				enc3 = this.keyStr.indexOf(input.charAt(i++));
				enc4 = this.keyStr.indexOf(input.charAt(i++));

				chr1 = (enc1 << 2) | (enc2 >> 4);
				chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
				chr3 = ((enc3 & 3) << 6) | enc4;

				output = output + String.fromCharCode(chr1);

				if (enc3 != 64) {
					output = output + String.fromCharCode(chr2);
				}
				if (enc4 != 64) {
					output = output + String.fromCharCode(chr3);
				}

			}

			return this.utf8_decode(output);
		},

		utf8_decode: function(utftext) {
			var string = "";
			var i = 0;

			while (i < utftext.length) {
				var c = utftext.charCodeAt(i);
				i++;

				if (c < 128) {
					string += String.fromCharCode(c);
					continue;
				}

				var c2 = utftext.charCodeAt(i);
				i++;

				if ((c > 191) && (c < 224)) {
					string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
					continue;
				}

				var c3 = utftext.charCodeAt(i);
				i++;

				string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
			}

			return string;
		}
	}
})(jQuery);
