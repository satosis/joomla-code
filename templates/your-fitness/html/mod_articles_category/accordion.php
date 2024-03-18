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
?>

<div class="uk-accordion <?php echo $moduleclass_sfx; ?>" data-uk-accordion="{duration: 300"> 
    <?php foreach ($list as $item) : ?>

    <h3 class="uk-accordion-title accordion-title" style="text-transform: uppercase;"><?php echo $item->title; ?></h3>
    <div class="uk-accordion-content"> <?php echo $item->introtext;  ?></div>

    <?php endforeach; ?>
</div>