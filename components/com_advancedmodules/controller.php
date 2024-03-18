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

class AdvancedModulesController extends JControllerLegacy
{
	protected $default_view = 'edit';

	public function display($cachable = false, $urlparams = false)
	{
		return parent::display();
	}
}
