/* JCE Editor - 2.5.14 | 30 January 2016 | http://www.joomlacontenteditor.net | Copyright (C) 2006 - 2016 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
(function(){var blocks='H1,H2,H3,H4,H5,H6,P,DIV,ADDRESS,PRE,FORM,TABLE,OL,UL,CAPTION,BLOCKQUOTE,CENTER,DL,DIR,FIELDSET,NOSCRIPT,NOFRAMES,MENU,ISINDEX,SAMP,SECTION,ARTICLE,HGROUP,ASIDE,FIGURE';var VK=tinymce.VK,BACKSPACE=VK.BACKSPACE,DELETE=VK.DELETE;tinymce.create('tinymce.plugins.HorizontalRulePlugin',{init:function(ed,url){var self=this;this.editor=ed;ed.addCommand('InsertHorizontalRule',function(ui,v){var se=ed.selection,n=se.getNode();if(/^(H[1-6]|P)$/.test(n.nodeName)){ed.execCommand('mceInsertContent',false,'<span id="mce_hr_marker" data-mce-type="bookmark">\uFEFF</span>',{skip_undo:1});var marker=ed.dom.get('mce_hr_marker'),hr=ed.dom.create('hr');var p=ed.dom.getParent(marker,blocks,'BODY');ed.dom.split(p,marker);var ns=marker.nextSibling;if(!ns){var el=ed.getParam('forced_root_block')||'br';ns=ed.dom.create(el);if(el!='br'){ns.innerHTML='\u00a0';}
ed.dom.insertAfter(ns,marker);ed.dom.remove(ns);ns=marker.previousSibling;}
ed.selection.setCursorLocation(ns,ns.childNodes.length);ed.dom.replace(hr,marker);}else{ed.execCommand('mceInsertContent',false,'<hr />');}});ed.addButton('hr',{title:'advanced.hr_desc',cmd:'InsertHorizontalRule'});function isHR(n){return n.nodeName==="HR"&&/mceItem(PageBreak|ReadMore)/.test(n.className)===false;}
ed.onNodeChange.add(function(ed,cm,n){var s=isHR(n);cm.setActive('hr',s);ed.dom.removeClass(ed.dom.select('hr.mceItemSelected:not(.mceItemPageBreak,.mceItemReadMore)'),'mceItemSelected');if(s){ed.dom.addClass(n,'mceItemSelected');}});ed.onKeyDown.add(function(ed,e){if(e.keyCode==BACKSPACE||e.keyCode==DELETE){var s=ed.selection,n=s.getNode();if(isHR(n)){var sib=n.previousSibling;ed.dom.remove(n);e.preventDefault();if(!ed.dom.isBlock(sib)){sib=n.nextSibling;if(!ed.dom.isBlock(sib)){sib=null;}}
if(sib){ed.selection.setCursorLocation(sib,sib.childNodes.length);}}}});},getInfo:function(){return{longname:'HR',author:'Ryan Demmer',authorurl:'http://www.joomlacontenteditor.net',infourl:'http://www.joomlacontenteditor.net',version:'2.5.14'};}});tinymce.PluginManager.add('hr',tinymce.plugins.HorizontalRulePlugin);})();