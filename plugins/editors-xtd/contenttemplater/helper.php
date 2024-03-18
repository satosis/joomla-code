<?php
/**
 * @package         Content Templater
 * @version         5.3.0
 * 
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2016 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

/**
 ** Plugin that places the button
 */
class PlgButtonContentTemplaterHelper
{
	var $params = null;
	var $items = array();
	var $editor = null;
	var $id = null;

	public function __construct(&$params)
	{
		$this->params = $params;

		require_once JPATH_PLUGINS . '/system/nnframework/helpers/parameters.php';
		$this->parameters = NNParameters::getInstance();
	}

	/**
	 * Display the button
	 *
	 * @return array A two element array of ( imageName, textToInsert )
	 */
	function render($editor)
	{
		JHtml::_('bootstrap.framework');
		JHtml::_('bootstrap.popover');
		require_once JPATH_PLUGINS . '/system/nnframework/helpers/functions.php';

		NNFrameworkFunctions::addScriptVersion(JUri::root(true) . '/media/nnframework/js/script.min.js');
		JHtml::stylesheet('nnframework/style.min.css', false, true);

		JHtml::stylesheet('contenttemplater/button.min.css', false, true);
		JHtml::script('contenttemplater/script.min.js', false, true);


		$this->items  = $this->getItems();
		$this->editor = $editor;
		$this->id     = preg_replace('#[^a-z0-9]#i', '_', $this->editor);

		$html   = array();
		$html[] = $this->getMainButton();

		// needed for the auto load templates to get triggered
		$html[] = '<!-- CT_editor = "' . $this->editor . '" -->';

		$buttons = $this->getButtons();

		if (!empty($buttons))
		{
			$html[] = implode('', $buttons);
		}

		if (!empty($html))
		{
			$html = '" style="display:none;" class="btn"></a>'
				. implode('', $html)
				. '<a style="display:none;" class="btn';
		}
		else
		{
			$html = '" style="display:none;" class="btn';
		}

		$button          = new JObject;
		$button->name    = 'contenttemplater';
		$button->options = $html;

		return $button;
	}

	private function getItems()
	{
		require_once JPATH_ADMINISTRATOR . '/components/com_contenttemplater/models/list.php';
		$list = new ContentTemplaterModelList;

		$items = $list->getItems(true, $this->params->orderby);

		foreach ($items as $i => $item)
		{
			if (!$this->passChecks($item))
			{
				unset($items[$i]);
			}
		}

		return $items;
	}

	function getMainButton()
	{
		$options = $this->getMainOptions();

		if (empty($options))
		{
			return '';
		}

		$text_ini = strtoupper(str_replace(' ', '_', $this->params->button_text));
		$text     = JText::_($text_ini);
		if ($text == $text_ini)
		{
			$text = JText::_($this->params->button_text);
		}

		return $this->getButton($options, $text);
	}

	private function getButton($options, $text, $id = '')
	{
		$html = array();

		if ($this->params->button_icon)
		{
			$text = '<span class="icon-nonumber icon-contenttemplater"></span> ' . $text;
		}

		if ($this->params->open_in_modal == 1 || (count($options) >= $this->params->switch_to_modal && $this->params->open_in_modal == 2))
		{
			JHTML::_('behavior.modal', 'a.modal-button');

			$html[] = '<a class="btn modal-button contenttemplater-button" href="#contenttemplater-modal-' . $this->id . $id . '" rel="">' . $text . '</a>';

			$html[] = '<div style="display:none;">'
				. '<div id="contenttemplater-modal-' . $this->id . $id . '" tabindex="-1">';

			$html[] = '<h3>' . JText::_('INSERT_TEMPLATE') . '</h3>'
				. '<div class="row-fluid">'
				. '<ul class="list list-striped"><li>' . implode('</li><li>', $options) . '</li></ul>'
				. '</div>';

			$html[] = $this->getModalFooterButtons();

			$html[] = '</div>'
				. '</div>';

			return implode('', $html);
		}

		if ($this->params->show_list_below)
		{
			$icon  = 'arrow-down-3';
			$class = 'dropdown-menu';
		}
		else
		{
			$icon  = 'arrow-up-3';
			$class = 'dropdown-menu dropup-menu';
		}

		$html[] = '<div class="dropdown contenttemplater-dropdown">';
		$html[] = '<a class="btn" data-toggle="dropdown" data-position="top" href="#">'
			. $text . ' <span class="icon-' . $icon . '"></span></a>';
		$html[] = '<ul class="' . $class . '" role="menu" aria-labelledby="contenttemplater-dropdown-' . $id . '">'
			. '<li>' . implode('</li><li>', $options) . '</li>'
			. '</ul>';
		$html[] = '</div>';

		return implode('', $html);
	}

	private function getModalFooterButtons()
	{
		if (JFactory::getApplication()->isSite())
		{
			return '';
		}

		require_once JPATH_ADMINISTRATOR . '/components/com_contenttemplater/helpers/helper.php';
		$canDo = ContentTemplaterHelper::getActions();
		if (!$canDo->get('core.create'))
		{
			return '';
		}

		return
			'<a target="_blank" href="index.php?option=com_contenttemplater&view=item&layout=edit" class="btn">'
			. '<span class="icon-save-new"></span> '
			. JText::_('CT_CREATE_NEW_TEMPLATE')
			. '</a>'

			. ' '

			. '<a target="_blank" href="index.php?option=com_contenttemplater" class="btn">'
			. '<span class="icon-nonumber icon-contenttemplater"></span> '
			. JText::_('CT_MANAGE_TEMPLATES')
			. '</a>';
	}

	function getMainOptions()
	{
		$items = array();

		foreach ($this->items as $i => $item)
		{
			// don't show templates if it should show in a separate button
			if (
				$item->button_separate
			)
			{
				continue;
			}

			$items[] = $item;
			unset($this->items[$i]);
		}

		return $this->getOptions($items);
	}

	function getOptions($items)
	{
		if (empty($items))
		{
			return array();
		}

		$options = array();

		$onclick = 'ContentTemplater.getXML( this.rel, \'' . $this->editor . '\' );';
		if ($this->params->show_confirm)
		{
			$onclick = 'if( confirm(\'' . sprintf(JText::_('CT_ARE_YOU_SURE', true), '\n') . '\') ) { ' . $onclick . ' };';
		}

		$previous_category = '';

		foreach ($items as $i => $item)
		{
			if ($this->params->display_categories == 'titled' && $item->category != $previous_category)
			{
				$options[] = '<span><strong>' . $item->category . '</strong></span>';
			}

			$image = $this->getItemImage($item);
			$name  = $this->getItemName($item);

			$options[] = $image . '<a class="hasPopover" data-trigger="hover"'
				. ' title="' . $item->name . '" data-content="' . $item->description . '"'
				. ' href="javascript:;" onclick="' . $onclick . ';return false;" rel="' . $item->id . '"'
				. '>'
				. $name
				. '</a>';
		}

		return $options;
	}

	function getButtons()
	{
		if (empty($this->items))
		{
			return array();
		}



		return $this->getSeparateButtons();
	}


	function getSeparateButtons()
	{
		if (empty($this->items))
		{
			return array();
		}

		$buttons = array();

		$onclick = 'ContentTemplater.getXML( this.rel, \'' . $this->editor . '\' );';
		if ($this->params->show_confirm)
		{
			$onclick = 'if( confirm(\'' . sprintf(JText::_('CT_ARE_YOU_SURE', true), '\n') . '\') ) { ' . $onclick . ' };';
		}

		foreach ($this->items as $i => $item)
		{
			if (!$item->button_separate)
			{
				continue;
			}

			$image = $this->getItemImage($item);
			$name  = $this->getItemName($item);

			$buttons[] = '<a title="' . $item->name . '" class="btn contenttemplater-button" onclick="try{IeCursorFix();}catch(e){}' . $onclick . '" rel="' . $item->id . '">'
				. $image . $name
				. '</a>';

			unset($this->items[$i]);
		}

		return $buttons;
	}

	function getItemName(&$item)
	{
		if ($item->button_separate && !empty($item->button_name))
		{
			$item->name = $item->button_name;
		}

		return $item->name;
	}

	function getItemImage(&$item)
	{
		if (empty($item->button_image))
		{
			return '';
		}

		// template should be displayed as a button
		$icon = str_replace('.png', '', $item->button_image);

		if ($icon == -1)
		{
			return '';
		}

		return '<span class="icon-' . $icon . '"></span> ';
	}

	function passChecks($item)
	{
		if (!$item->published || !$item->button_enabled)
		{
			return false;
		}

		// not enabled if: not active in this area (frontend/backend)
		if (
			(JFactory::getApplication()->isAdmin() && $item->button_enable_in_frontend == 2)
			|| (JFactory::getApplication()->isSite() && $item->button_enable_in_frontend == 0)
		)
		{
			return false;
		}

		$pass = 1;

		return $pass;
	}
}
