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


<?php $menualias = JFactory::getApplication()->getMenu()->getActive()->alias; ?>
<!--<div class="custom <?php echo $moduleclass_sfx ?>" <?php if ($params->get('backgroundimage')) : ?> style="background-image:url(<?php echo $params->get('backgroundimage');?>)"<?php endif;?> >-->

	<?php 
    echo '<div  style="background-image: url(../images/footer-bg/'.$menualias.'.jpg); 
                     background-position: center top; 
                     background-repeat: no-repeat;  background-size: cover;">';    
    echo $module->content; ?>
    
    
</div>
