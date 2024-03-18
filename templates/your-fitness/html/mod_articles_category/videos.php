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
     
                     
    <div class="uk-margin-top uk-margin-bottom" data-uk-filter="<?php echo "tt-".md5($item->category_title); ?>">
                 
    <?php       
            echo '<div class="videos-text-cat"><p style="font-size: 30px; text-transform: uppercase; font-weight: bold;  line-height: 1.5;">'.$item->title.'</p>';
            echo '<p style="color: #727272; font-size: 14px; text-transform: uppercase;">
            <img src="/templates/your-fitness/images/icon/calendar.png" class="img-calendar" alt="calendar.png" style="margin-right: 5px; padding-top: 2px;"/>';
            echo $item->displayDate.' BY <span style="color: #ff3030; font-size: 14px; text-transform: uppercase;">';
            echo $item->displayAuthorName.'</span><span style="float: right;">'.$item->category_title.'</span></p></div>';
            echo $item->introtext;
    ?>

      <hr class="uk-grid-divider" style="margin-top: 50px; margin-bottom: 0px;"/>
    </div>
      
<?php  endforeach; ?>
</div>
</div>