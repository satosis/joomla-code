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
<div class="uk-container-center uk-grid-width-small-2-10 uk-width-medium-1-1 uk-width-large-6-10 uk-width-xlarge-6-10">
<ul class="category-module uk-grid uk-grid-collapse <?php echo $moduleclass_sfx; ?>"  data-uk-grid-margin="">

    <?php foreach ($list as $item) : ?>
        <li class="uk-width-medium-1-2">
            <figure class="uk-overlay view2 view-eighth2 section-box">
        
             <?php
                    $intro_img = json_decode($item->images)->image_intro;
                    if ($intro_img == "") {
                        $intro_img = JURI::base() . "/templates/your-fitness/images/noimg/600x400.jpg";
                    }
                    ?>
                    <div class="uk-cover-background uk-position-relative" style="background-image: url(<?php echo $intro_img; ?>); height: 400px; position: relative;">
                        <img class="uk-invisible" src="<?php echo $intro_img; ?>" width="600" height="400" alt="<?php echo $item->title; ?>" />
                        <div class="all-hover-bottom"><a href="classes/sign-up.html" style="text-decoration: none;"><span class="text-title-bottom">sign up</span></a></div>
                        <div class="out-box">
                            <div class="triangle-box-inner"><span class="babos"><?php echo  json_decode($item->urls)->urlatext; ?></span></div>
                            <div class="triangle-bottomleft"></div>
                        </div>
                    </div>  
            
    
  <figcaption class="uk-overlay-panel-news uk-overlay-background-all-classes uk-overlay-center mask2">
    
                    <p style="font-size: 24px; text-align: left; padding-top: 45px; padding-left: 40px; padding-right: 30px; text-transform: uppercase; line-height: 1.5;  font-weight: bold;">
                        <a class="<?php echo $item->active; ?>" href="<?php echo $item->link; ?>" style="color: white;">
                            <?php echo $item->title; ?>
                        </a>
                    </p>
                   
                    
                     
                    <p style="color: white; text-align: left; padding-left: 40px; padding-right: 30px; font-size: 16px; font-weight: lighter; line-height: 1.5;">
                        <?php echo $item->displayIntrotext; ?>
                    </p>
                   
                <p style="margin-top: 1%; text-align: left; padding-left: 40px; text-transform: uppercase; font-size: 14px; ">
                
                 TRAINER <span class="tt-autor-classes"><?php echo $item->displayAuthorName; ?></span>
                
                 </p>
    
  </figcaption>
    
</figure>	
              
        </li>
<?php endforeach; ?>

</ul>
</div>

</div>