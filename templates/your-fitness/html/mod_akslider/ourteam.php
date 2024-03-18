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
    
    <div class="uk-flex uk-flex-center uk-flex-middle uk-hidden-small uk-width-medium-2-10 uk-grid-width-large-2-10 uk-grid-width-xlarge-2-10">
        <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
    </div>
        
        <div class="uk-grid-width-small-1-1 uk-width-medium-6-10 uk-grid-width-large-6-10 uk-grid-width-xlarge-6-10">
    <div class="uk-slider-container uk-grid-width-small-1-1">
        <ul class="uk-slider uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-xlarge-1-4">
           <?php foreach ($list as $item) : ?>
                    <li class="uk-grid-width-small-1-1 uk-grid-width-medium-1-1 uk-grid-width-xlarge-1-1"><?php echo $item->introtext; ?></li>     
           <?php endforeach; ?> 
        </ul>
    </div> 
        </div> 
    <div class="uk-flex uk-flex-center uk-flex-middle uk-hidden-small uk-width-medium-2-10 uk-grid-width-large-2-10 uk-grid-width-xlarge-2-10">
        <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
    </div>
</div>