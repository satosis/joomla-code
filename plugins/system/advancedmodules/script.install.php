<?php
/**
 * @package         Advanced Module Manager
 * @version         5.3.10
 * 
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2016 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

require_once __DIR__ . '/script.install.helper.php';

class PlgSystemAdvancedModulesInstallerScript extends PlgSystemAdvancedModulesInstallerScriptHelper
{
	public $name = 'ADVANCED_MODULE_MANAGER';
	public $alias = 'advancedmodulemanager';
	public $extname = 'advancedmodules';
	public $extension_type = 'plugin';

	public function uninstall($adapter)
	{
		$this->uninstallComponent($this->extname);
	}

	public function onAfterInstall()
	{
		$this->setPluginOrdering();
	}

	private function setPluginOrdering()
	{
		$query = $this->db->getQuery(true)
			->update('#__extensions')
			->set($this->db->quoteName('ordering') . ' = -1')
			->where($this->db->quoteName('type') . ' = ' . $this->db->quote('plugin'))
			->where($this->db->quoteName('element') . ' = ' . $this->db->quote('advancedmodules'))
			->where($this->db->quoteName('folder') . ' = ' . $this->db->quote('system'));
		$this->db->setQuery($query);
		$this->db->execute();

		JFactory::getCache()->clean('_system');
	}
}
