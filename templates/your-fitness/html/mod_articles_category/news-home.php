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

<ul class="category-module uk-grid <?php echo $moduleclass_sfx; ?>"  data-uk-grid-margin="">

    <?php foreach ($list as $item) : ?>
        <li class="uk-width-medium-1-1 line-opacity" style="margin-bottom: 15px; ">

            <div class="uk-grid uk-container-center uk-grid-width-small-2-10 uk-width-medium-6-10 uk-grid-width-large-6-10 uk-grid-width-xlarge-6-10"
                >
                <div class="uk-width-medium-1-2">
                    <?php
                    $intro_img = json_decode($item->images)->image_intro;
                    if ($intro_img == "") {
                        $intro_img = JURI::base() . "/templates/your-fitness/images/noimg/600x400.jpg";
                    }
                    ?>
                    <div class="uk-cover-background grow" style="background-image: url(<?php echo $intro_img; ?>); margin-left: -30px;">
                        <a href="<?php echo $item->link; ?>"> 
                            <img class="news-page1-img" src="<?php echo $intro_img; ?>"  alt="<?php echo $item->title; ?>"/>
                        </a>
                    </div>
                </div>
                <div class="uk-width-medium-1-2">
                   <p class="header-title-p">
                        <a class="text-heading <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
                            <?php echo $item->title; ?>
                        </a>
                   </p>
                   
                    <p class="text-data">
                        <img src="/templates/your-fitness/images/icon/calendar.png" class="img-calendar" alt="calendar.png"/>
                        <?php echo $item->displayDate; ?> BY 
                        <span class="text-user">                  
                        <?php echo $item->displayAuthorName; ?>
                        </span>
                    </p>
                     
                    <p class="text-privy">
                        <?php echo $item->displayIntrotext; ?>
                    </p>
                   
                <div class="padding-botton">
                    <input type="button" class="read-more-button <?php echo $item->active; ?>" onclick="location.href='<?php echo $item->link; ?>';" value="Read more" />
                </div>
                
                </div>
               
            </div>


        </li>
<?php endforeach; ?>

</ul>