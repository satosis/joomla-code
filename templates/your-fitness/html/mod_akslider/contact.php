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


<div class="uk-grid uk-flex-center" data-uk-slider="{infinite: true, autoplay: true, autoplayInterval: '7000'}" >
            
    <div class="uk-grid-width-small-1-1 uk-width-medium-1-1 uk-grid-width-large-1-1 uk-grid-width-xlarge-1-1 hover-img-classes">
        <div class="uk-slider-container uk-grid-width-small-1-1">
            <ul class="uk-slider uk-grid-width-small-1-4 uk-grid-width-medium-1-4 uk-grid-width-xlarge-1-4">
               <?php foreach ($list as $item) : ?>
                        <li class="uk-grid-width-small-1-1 uk-grid-width-medium-1-1 uk-grid-width-xlarge-1-1"><?php echo $item->introtext; ?></li>     
               <?php endforeach; ?> 
            </ul>
        </div> 
    </div>
        
</div>