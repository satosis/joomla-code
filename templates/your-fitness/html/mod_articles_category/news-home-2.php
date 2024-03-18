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
<div class="uk-width-small-1-1 uk-width-medium-8-10 uk-width-large-8-10 uk-width-xlarge-6-10 uk-container-center">
<ul class="uk-grid uk-grid-collapse category-module <?php echo $moduleclass_sfx; ?>"  data-uk-grid-margin="">

    <?php foreach ($list as $item) : ?>
        <li class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
        
            
            <figure class="uk-overlay view view-eighth">
        
             <?php
                    $intro_img = json_decode($item->images)->image_intro;
                    if ($intro_img == "") {
                        $intro_img = JURI::base() . "/templates/your-fitness/images/noimg/600x400.jpg";
                    }
                    ?>
                    <div class="uk-cover-background uk-position-relative" style="background-image: url(<?php echo $intro_img; ?>); height: 400px;">
                        <img class="uk-invisible" src="<?php echo $intro_img; ?>" width="600" height="400" alt="<?php echo $item->title; ?>" />
                    </div>  
       
    
  <figcaption class="uk-overlay-panel-news uk-overlay-background-news uk-overlay-center mask">
    
                    <p style="font-size: 24px; text-align: left; padding-top: 40px; padding-left: 30px; padding-right: 30px; text-transform: uppercase; line-height: 1.5;  font-weight: bold;">
                        <a class="<?php echo $item->active; ?>" href="<?php echo $item->link; ?>" style="color: white;">
                            <?php echo $item->title; ?>
                        </a>
                    </p>
                   
                    <p style="font-size: 14px; font-weight: lighter; text-transform: uppercase; text-align: left; padding-left: 30px;">
                        <img src="/templates/your-fitness/images/icon/calendar-white.png" style="margin-right: 5px; margin-top: 2px; float: left;" alt="calendar-white.png"/>
                        <?php echo $item->displayDate; ?>  
                        <span style="color: white;">                  
                        <?php echo $item->displayAuthorName; ?>
                        </span>
                    </p>
                     
                    <p style="color: white; text-align: left; padding-left: 30px; padding-right: 30px; font-size: 16px; font-weight: lighter; line-height: 1.5;">
                        <?php echo $item->displayIntrotext; ?>
                    </p>
                   
                <p style="padding-top: 5px;  text-transform: uppercase; font-size: 14px;  text-align: left;">
                <a href="<?php echo $item->link; ?>" 
                style="font-family: roboto; 
                       color: white;
                       border: 1px solid white; 
                       border-radius: 3px; 
                       padding-top: 15px;
                       padding-bottom: 15px;
                       padding-left: 30px;
                       padding-right: 30px;
                       margin-left: 30px;
                       display: inline-block;
                       text-decoration: none;">Read more</a>
                 </p>
    
  </figcaption>
    
</figure>	


        </li>
<?php endforeach; ?>

</ul>
</div>
</div>