<?php
/**
 * @copyright	Copyright © 2015 - All rights reserved.
 * @license		Copyrighted Commercial Software
 * @generator	hhp://xdsoft/joomla-module-generator/
 */
defined('_JEXEC') or die;
JHtml::_('jquery.framework');

$doc = JFactory::getDocument();
/* Available fields:"sex","date_of_bird","weight","height", */
// Include assets
$doc->addStyleSheet(JURI::root()."modules/mod_your_fitness_bmi_calculator/assets/css/style.css");
$doc->addScript(JURI::root()."modules/mod_your_fitness_bmi_calculator/assets/js/script.js");


require JModuleHelper::getLayoutPath('mod_your_fitness_bmi_calculator', $params->get('layout', 'default'));