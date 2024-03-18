<?php
/**
 * Torbara Your Fitness Theme for Joomla, exclusively on Envato Market: http://themeforest.net/user/torbara
 * @encoding     UTF-8
 * @version      0.1
 * @copyright    Copyright ( C ) 2015 Torbara (http://torbara.com). All rights reserved.
 * @license      GNU General Public License version 2 or later, see http://www.gnu.org/licenses/gpl-2.0.html
 * @author       Nemirovskiy Vitaliy (support@torbara.com)
 */

include($this['path']->path('layouts:theme.config.php'));
JHtml::_('behavior.framework');

if($this['config']->get('maintenance_page') == 0){
    include('offline_offline.php');
}elseif($this['config']->get('maintenance_page') == 1){
    include('offline_soon.php');   
}