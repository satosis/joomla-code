<article class="uk-article" <?php if ($permalink) echo 'data-permalink="'.$permalink.'"'; ?>>

	<?php if ($image && $image_alignment == 'none') : ?>
		<?php if ($url) : ?>
			<a href="<?php echo $url; ?>" title="<?php echo $image_caption; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"></a>
		<?php else : ?>
			<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
		<?php endif; ?>
	<?php endif; ?>

	<?php if ($title) : ?>
	 <h3 class="uk-panel-title" style="margin-top: 60px;"><span class="title-span">
		<?php if ($url && $title_link) : ?>
			<a href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
		<?php else : ?>
			<?php echo $title; ?>
		<?php endif; ?>
	</span></h3>
	<?php endif; ?>

	<?php echo $hook_aftertitle; ?>

	<?php if ($author || $date || $category) : ?>
	<p class="uk-article-meta">

		<?php

			$author   = ($author && $author_url) ? '<a href="'.$author_url.'">'.$author.'</a>' : $author;
			$date     = ($date) ? ($datetime ? '<time datetime="'.$datetime.'">'.JHtml::_('date', $date, JText::_('DATE_FORMAT_LC3')).'</time>' : JHtml::_('date', $date, JText::_('DATE_FORMAT_LC3'))) : '';
			$category = ($category && $category_url) ? '<a href="'.$category_url.'">'.$category.'</a>' : $category;

			if($author && $date) {
				printf(JText::_('TPL_WARP_META_AUTHOR_DATE'), $author, $date);
			} elseif ($author) {
				printf(JText::_('TPL_WARP_META_AUTHOR'), $author);
			} elseif ($date) {
				printf(JText::_('TPL_WARP_META_DATE'), $date);
			}

			if ($category) {
				echo ' ';
				printf(JText::_('TPL_WARP_META_CATEGORY'), $category);
			}

		?>

	</p>
	<?php endif; ?>

	<?php if ($image && $image_alignment != 'none') : ?>
		<?php if ($url) : ?>
            <?php 
            echo '<div class="tt-width-title uk-align-center" style="margin-top: 40px; margin-bottom: 30px;">
                <p style="font-size: 30px; text-transform: uppercase; font-weight: bold; line-height: 1.2;"><a href="'
                .$url.'" style="color: #303030;" title="'.$title.'">'.$title.'</a></p>';
            echo '<p style="color: #727272; font-size: 14px; text-transform: uppercase;">
            <img src="/templates/your-fitness/images/icon/calendar.png" class="img-calendar" alt="calendar.png" style="margin-right: 5px; padding-top: 2px;"/>';
            echo $date.' BY <span style="color: #ff3030; font-size: 14px; text-transform: uppercase;">';
            echo $author.'</span><span style="float: right;">'.$category.'</span></p></div>';
            
            ?>
            
    
			<a class="uk-align-<?php echo $image_alignment; ?> uk-cover-background" style="background-image: url(<?php echo $image; ?>);" href="<?php echo $url; ?>" title="<?php echo $image_caption; ?>"><img class="img-page uk-invisible" width="600" height="400" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"></a>
           
            <?php if ($article) { ?>
        	<div class="page-content">
        		<?php echo $article; ?>
            <hr class="uk-grid-divider" />
            </div>
        	<?php } ?>

        <?php else : ?>
            <?php 
            echo '<div class="uk-width-8-10 uk-align-center" style="margin-top: 40px; margin-bottom: 30px;">
                <p style="font-size: 30px; text-transform: uppercase; font-weight: bold; line-height: 1.2;"><a href="'
                .$url.'" style="color: #303030;" title="'.$title.'">'.$title.'</a></p>';
            echo '<p style="color: #727272; font-size: 14px; text-transform: uppercase;">
            <img src="/templates/your-fitness/images/icon/calendar.png" class="img-calendar" alt="calendar.png" style="margin-right: 5px; padding-top: 2px;"/>';
            echo $date.' BY <span style="color: #ff3030; font-size: 14px; text-transform: uppercase;">';
            echo $author.'</span><span style="float: right;">'.$category.'</span></p></div>';
            
            ?>

            <a class="uk-align-<?php echo $image_alignment; ?> uk-cover-background" style="background-image: url(<?php echo $image; ?>);" href="<?php echo $url; ?>" title="<?php echo $image_caption; ?>"><img class="img-page uk-invisible" width="600" height="400" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"></a>
	       
            <?php if ($article) { ?>
        	<div class="page-content-next">
        		<?php echo $article; ?>
            
            </div>
        	<?php } ?>  
        	
    <?php endif; ?>
         
	<?php endif; ?>

    <?php if ($article) : ?>
        	<div class="page-content-tr">
        		<?php echo $article; ?>
            <hr class="uk-grid-divider" />
            </div>
    <?php endif;  ?>    

	<?php echo $hook_beforearticle; ?>

	<?php if ($tags) : ?>
	<p><?php echo JText::_('TPL_WARP_TAGS').': '.$tags; ?></p>
	<?php endif; ?>

	<?php if ($more) : ?>
	<p>
		<a href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $more; ?></a>
	</p>
	<?php endif; ?>

	<?php if ($edit) : ?>
	<p><?php echo $edit; ?></p>
	<?php endif; ?>

	<?php if ($previous || $next) : ?>
	<ul class="uk-pagination">
		<?php if ($previous) : ?>
		<li class="uk-pagination-previous">
			<a href="<?php echo $previous; ?>"><i class="uk-icon-angle-double-left"></i> <?php echo JText::_('JPREV'); ?></a>
		</li>
		<?php endif; ?>

		<?php if ($next) : ?>
		<li class="uk-pagination-next">
			<a href="<?php echo $next; ?>"><?php echo JText::_('JNEXT'); ?> <i class="uk-icon-angle-double-right"></i></a>
		</li>
		<?php endif; ?>
	</ul>
	<?php endif; ?>

	<?php echo $hook_afterarticle; ?>

</article>