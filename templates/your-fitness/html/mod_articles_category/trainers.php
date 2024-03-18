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

<div class="uk-grid">
        <div class="uk-container-center uk-width-medium-10-10" style="margin-bottom: 130px;">
        
        <div class="uk-grid">
            <?php foreach ($list as $item) : ?>
                
                    
                    <div class="uk-width-small-1-2 uk-width-medium-1-4 bw" style="position: relative;  margin-top: 35px;">
                        <div class="uk-panel">
                
                            <div style="background-image: url(
                              <?php
                            $intro_img = json_decode($item->images)->image_intro;
                            if ($intro_img == "") {
                                $intro_img = JURI::base() . "/templates/your-fitness/images/noimg/600x400.jpg";
                            }
                     ?>
                            
                            ); ">
                                <img src="<?php echo $intro_img; ?>"  alt="<?php echo $item->title; ?>" style="width: 100%;" />
                            </div>  
               
                            
                                    <div class="trainers-hover">
                                   
                                             <a class="<?php echo $item->active; ?>" href="<?php echo $item->link; ?>" style="color: white;">
                                                    <?php echo $item->title; ?>
                                             </a>
                                            
                                            <div class="show-intro">
                                                <?php echo $item->introtext; ?>
                                                    <a href="<?php echo $item->link; ?>" style="color: white; font-size: 14px;">
                                                    Read More
                                             </a>
                                            </div>
                                   </div>
                           
                    </div>
            </div> 
        	
        
        
              
        <?php endforeach; ?>
        </div>
        </div>
</div>
