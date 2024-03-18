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
        
    $size = getimagesize ($intro_img);
   // echo $size[0];
    ?>
     <?php 
      if($size[0] < $size[1]){
        
      
      ?>
                     
    <div class="uk-width-1-3" data-uk-filter="<?php echo "tt-".md5($item->category_title); ?>" style="position: relative;"> 
      <a href="<?php echo $intro_img; ?>" data-uk-lightbox="{group:'group1'}">
                <img src="<?php echo $intro_img; ?>"  alt="<?php echo $item->category_title ?>" class="blur" />
      </a>
      
    </div>
      <?php }else{ ?>          
                     
    <div class="uk-width-1-2" data-uk-filter="<?php echo "tt-".md5($item->category_title); ?>" style="position: relative;">
     <a href="<?php echo $intro_img; ?>" data-uk-lightbox="{group:'group1'}">
                <img src="<?php echo $intro_img; ?>"  alt="<?php echo $item->category_title ?>" class="blur"/>
     </a>
    
    </div> 
      
<?php } endforeach; ?>
</div>
</div>