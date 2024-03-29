<?php
/**
 * @package         Advanced Template Manager
 * @version         1.6.6
 * 
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2016 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

/**
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Advanced Template Manager component helper.
 */
class AdvancedTemplatesHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param   string $vName The name of the active view.
	 *
	 * @return  void
	 */
	public static function addSubmenu($vName)
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_TEMPLATES_SUBMENU_STYLES'),
			'index.php?option=com_templates&view=styles',
			$vName == 'styles'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_TEMPLATES_SUBMENU_TEMPLATES'),
			'index.php?option=com_templates&view=templates',
			$vName == 'templates'
		);
	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return  JObject
	 *
	 * @deprecated  3.2  Use JHelperContent::getActions() instead
	 */
	public static function getActions()
	{
		// Log usage of deprecated function
		JLog::add(__METHOD__ . '() is deprecated, use JHelperContent::getActions() with new arguments order instead.', JLog::WARNING, 'deprecated');

		// Get list of actions
		$result = JHelperContent::getActions('com_templates');

		return $result;
	}

	/**
	 * Get a list of filter options for the application clients.
	 *
	 * @return  array  An array of JHtmlOption elements.
	 */
	public static function getClientOptions()
	{
		// Build the filter options.
		$options   = array();
		$options[] = JHtml::_('select.option', '0', JText::_('JSITE'));
		$options[] = JHtml::_('select.option', '1', JText::_('JADMINISTRATOR'));

		return $options;
	}

	/**
	 * Get a list of filter options for the templates with styles.
	 *
	 * @param   mixed $clientId The CMS client id (0:site | 1:administrator) or '*' for all.
	 *
	 * @return  array  An array of JHtmlOption elements.
	 */
	public static function getTemplateOptions($clientId = '*')
	{
		// Build the filter options.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);

		if ($clientId != '*')
		{
			$query->where('client_id=' . (int) $clientId);
		}

		$query->select('element as value, name as text, extension_id as e_id')
			->from('#__extensions')
			->where('type = ' . $db->quote('template'))
			->where('enabled = 1')
			->order('client_id')
			->order('name');
		$db->setQuery($query);
		$options = $db->loadObjectList();

		return $options;
	}

	/**
	 * TODO
	 *
	 * @param   string $templateBaseDir TODO
	 * @param   string $templateDir     TODO
	 *
	 * @return  boolean|JObject
	 */
	public static function parseXMLTemplateFile($templateBaseDir, $templateDir)
	{
		$data = new JObject;

		// Check of the xml file exists
		$filePath = JPath::clean($templateBaseDir . '/templates/' . $templateDir . '/templateDetails.xml');

		if (is_file($filePath))
		{
			$xml = JInstaller::parseXMLInstallFile($filePath);

			if ($xml['type'] != 'template')
			{
				return false;
			}

			foreach ($xml as $key => $value)
			{
				$data->set($key, $value);
			}
		}

		return $data;
	}

	/**
	 * TODO
	 *
	 * @param   integer $clientId    TODO
	 * @param   string  $templateDir TODO
	 *
	 * @return  boolean|array
	 */
	public static function getPositions($clientId, $templateDir)
	{
		$positions = array();

		$templateBaseDir = $clientId ? JPATH_ADMINISTRATOR : JPATH_SITE;
		$filePath        = JPath::clean($templateBaseDir . '/templates/' . $templateDir . '/templateDetails.xml');

		if (is_file($filePath))
		{
			// Read the file to see if it's a valid component XML file
			$xml = simplexml_load_file($filePath);

			if (!$xml)
			{
				return false;
			}

			// Check for a valid XML root tag.

			// Extensions use 'extension' as the root tag.  Languages use 'metafile' instead

			if ($xml->getName() != 'extension' && $xml->getName() != 'metafile')
			{
				unset($xml);

				return false;
			}

			$positions = (array) $xml->positions;

			if (isset($positions['position']))
			{
				$positions = (array) $positions['position'];
			}
			else
			{
				$positions = array();
			}
		}

		return $positions;
	}
}
