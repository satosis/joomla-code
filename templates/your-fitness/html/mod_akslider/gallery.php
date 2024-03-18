<?php
/**
 * Torbara Your Fitness Theme for Joomla, exclusively on Envato Market: http://themeforest.net/user/torbara
 * @encoding     UTF-8
 * @version      0.1
 * @copyright    Copyright ( C ) 2015 Torbara (http://torbara.com). All rights reserved.
 * @license      GNU General Public License version 2 or later, see http://www.gnu.org/licenses/gpl-2.0.html
 * @author       Nemirovskiy Vitaliy (support@torbara.com)
 */

defined('_JEXEC') or die;

JHtml::_('jquery.framework'); ?>

<div data-uk-slideset="{small: 2, medium: 4, large: 6}">
    <div class="uk-slidenav-position">
        <ul class="uk-grid uk-slideset">
             <?php foreach ($list as $item) : ?>
                <li class="uk-flex uk-flex-center"><?php echo $item->introtext; ?></li>     
            <?php endforeach; ?>
        </ul>
         
    </div>
        <ul class="uk-slideset-nav uk-dotnav uk-flex-center" style="margin-top: 30px; margin-bottom: 55px;"></ul>
</div>