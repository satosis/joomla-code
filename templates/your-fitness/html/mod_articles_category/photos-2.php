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

//JFactory::getDocument()->addScript(Juri::base() . "templates/your-fitness/js/isotope.pkgd.min.js");
?>





<div class="uk-grid uk-grid-collapse <?php echo $moduleclass_sfx; ?>" style="margin-top: 25px; margin-bottom: 70px;">

<?php 

$arr = [];
foreach ($list as $item) {
    $arr[] = $item->category_title;
}
$arr = array_unique($arr);

?><ul id="my-id" class="uk-subnav">

      <li data-uk-filter><form action="#"><button class="button-photos">All</button></form></li>
        <?php foreach($arr as $cat){
            ?><li data-uk-filter="tt-<?php echo md5($cat); ?>"><form action="#">
            <button class="button-photos">
            <?php echo $cat; ?>
            </button>
            </form></li><?php
        }?>
       </ul>

<div class="uk-width-1-1" data-uk-grid="{controls: '#my-id'}" style="margin-top: 100px; margin-bottom: 50px;">
<?php

foreach ($list as $item) : 
            
        $intro_img = json_decode($item->images)->image_intro;
        if ($intro_img == "") {
                        $intro_img = JURI::base() . "/templates/your-fitness/images/noimg/600x400.jpg";
             }
        
    
    ?>
                          
    <div class="uk-width-medium-1-4 uk-width-small-1-2 uk-margin-top" data-uk-filter="<?php echo "tt-".md5($item->category_title); ?>">
            <div class="uk-panel" style="margin-top: 10px; margin-bottom: 10px;">
                <figure class="uk-overlay">
                    <img src="<?php echo $intro_img; ?>" width="257" height="393" alt="<?php echo $item->category_title; ?>" />
                    <a href="<?php echo $item->link; ?>" style=" width: 100%; height: 100%; background-color: yellow;">
                    <div class="uk-flex uk-flex-center uk-flex-middle uk-overlay-panel-gallery uk-overlay-background-gallery uk-overlay-center">
                        <span style="text-transform: uppercase; font-size: 24px; text-align: center; font-weight: bold; color: white;">
                            <?php echo $item->title; ?>
                        </span>
                    </div>
                    </a>
                </figure>	 
            </div>         
    </div>
      
<?php  endforeach; ?>
</div>
</div>