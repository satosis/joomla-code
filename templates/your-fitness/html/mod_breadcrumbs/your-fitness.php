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

JHtml::_('bootstrap.tooltip');
?>



	<?php
	// Get rid of duplicated entries on trail including home page when using multilanguage
	for ($i = 0; $i < $count; $i++)
	{
		if ($i == 1 && !empty($list[$i]->link) && !empty($list[$i - 1]->link) && $list[$i]->link == $list[$i - 1]->link)
		{
			unset($list[$i]);
		}
	}

	// Find last and penultimate items in breadcrumbs list
	end($list);
	$last_item_key = key($list);
	prev($list);
	$penult_item_key = key($list);

	// Make a link if not the last item in the breadcrumbs
	$show_last = $params->get('showLast', 1); 
    
    $menualias = JFactory::getApplication()->getMenu()->getActive()->alias;

    global $warp;

	foreach ($list as $key => $item) :
       
        
          

                if ($key == "1" and $list[2] == null){
                    echo '<div  style="background: url(../images/breadcrumbs/'.$warp['config']->get('style').'.png) no-repeat 100% 61%, url(/../images/breadcrumbs/'.$menualias.'.jpg) no-repeat 100% 100%;
                     background-blend-mode: overlay; 
                     margin-top: -71px; 
                     padding-top: 210px;
                     ">';
                     echo '<div class="tm-breadcrumbs-header">'.$item->name."</div>";
                     
                } 
             elseif ($key == "2" and $list[3] == null){
                   echo '<div  style="background: url(../images/breadcrumbs/'.$warp['config']->get('style').'.png) no-repeat 100% 61%, url(/../images/breadcrumbs/'.$menualias.'.jpg) no-repeat 100% 100%; 
                     background-blend-mode: overlay;
                     margin-top: -71px; 
                     padding-top: 210px;
                     ">';
                    echo '<div class="tm-breadcrumbs-header" style="text-transform: uppercase;">'.$item->name."</div>";
            }elseif ($key == "3" ){
                   echo '<div  style="background: url(../images/breadcrumbs/'.$warp['config']->get('style').'.png) no-repeat 100% 61%, url(/../images/breadcrumbs/'.$menualias.'.jpg) no-repeat 100% 100%; 
                      background-blend-mode: overlay;
                     margin-top: -71px; 
                     padding-top: 210px;
                     ">';
                    echo '<div class="tm-breadcrumbs-header" style="text-transform: uppercase;">'.$item->name."</div>";
                    
           } 
        ?>
<?php endforeach; ?>
       <ul  class="breadcrumb <?php echo $moduleclass_sfx; ?>">     

        
	<?php // Generate the trail
	foreach ($list as $key => $item) :
		if ($key != $last_item_key) :
			// Render all but last item - along with separator ?>
			<li>
				<?php if (!empty($item->link)) : ?>
					<a href="<?php echo $item->link; ?>" class="link-breadcrumb"><?php echo $item->name; ?></a>
				<?php else : ?>

					<span >
						<?php $item->name; ?>
					</span>
				<?php endif; ?>

				<?php if (($key != $penult_item_key) || $show_last) : ?>
					<span class="link-breadcrumb">
						
					</span>
				<?php endif; ?>
			<!--	<meta itemprop="position" content="<?php echo $key + 1; ?>">-->
			</li>
		<?php elseif ($show_last) :
			// Render last item if reqd. ?>
			<li class="link-breadcrumb">
				
					<?php echo " / ".$item->name; ?>
				
			<!--	<meta itemprop="position" content="<?php echo $key + 1; ?>">-->
			</li>

		<?php endif; endforeach; ?>
            


</ul>
</div>