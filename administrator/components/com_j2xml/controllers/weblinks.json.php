<?php/** * @version		3.2.135 administrator/components/com_j2xml/controllers/weblinks.json.php *  * @package		J2XML * @subpackage	com_j2xml * @since		3.1.112 *  * @author		Helios Ciancio <info@eshiol.it> * @link		http://www.eshiol.it * @copyright	Copyright (C) 2010-2015 Helios Ciancio. All Rights Reserved * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL v3 * J2XML is free software. This version may have been modified pursuant * to the GNU General Public License, and as distributed it includes or * is derivative of works licensed under the GNU General Public License or * other free or open source software licenses. */ // no direct accessdefined('_JEXEC') or die('Restricted access.');jimport('joomla.application.component.controller');jimport('eshiol.j2xml.exporter');jimport('eshiol.j2xml.sender');
if (class_exists('JPlatform') && version_compare(JPlatform::RELEASE, '12', 'ge'))	jimport('cms.response.json');else	require_once(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_languages'.DS.'helpers'.DS.'jsonresponse.php');require_once __DIR__.'/json.php';/** * Content controller class. */class J2XMLControllerWeblinks extends J2XMLControllerJson {}?>