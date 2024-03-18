<?php
/**
 * Torbara Your Fitness Theme for Joomla, exclusively on Envato Market: http://themeforest.net/user/torbara
 * @encoding     UTF-8
 * @version      0.1
 * @copyright    Copyright ( C ) 2015 Torbara (http://torbara.com). All rights reserved.
 * @license      GNU General Public License version 2 or later, see http://www.gnu.org/licenses/gpl-2.0.html
 * @author       Nemirovskiy Vitaliy (support@torbara.com)
 */

// get theme configuration
include($this['path']->path('layouts:theme.config.php'));
JHtml::_('behavior.framework');
?>
<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>"  data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>

<head>
<?php echo $this['template']->render('head'); ?>
</head>

<body class="<?php echo $this['config']->get('body_classes'); ?>">
        <?php 
        if($this['config']->get('loading_page') == 1){
        ?>
        <div class="preloader-wrap uk-height-1-1">
                    <div class="tt-loading" style="position: relative; top: 47%;">
                        <img src="/templates/your-fitness/images/yf_loading.gif" style="width: 70%;" alt="" />
                    </div>
        </div>
        <?php } ?>
        <?php $menualias = JFactory::getApplication()->getMenu()->getActive()->alias; ?>
        
		<?php if ($this['widgets']->count('toolbar-l + toolbar-r')) : ?>
		<div class="tm-toolbar uk-clearfix uk-hidden-small">

			<?php if ($this['widgets']->count('toolbar-l')) : ?>
			<div class="uk-float-left"><?php echo $this['widgets']->render('toolbar-l'); ?></div>
			<?php endif; ?>

			<?php if ($this['widgets']->count('toolbar-r')) : ?>
			<div class="uk-float-right"><?php echo $this['widgets']->render('toolbar-r'); ?></div>
			<?php endif; ?>

		</div>
		<?php endif; ?>      
                
		<?php if ($this['widgets']->count('menu + search + logo')) : ?>
                <div class="tm-navbar-box <?php echo $this['config']->get('menu_align') ?>" <?php if ($this['config']->get('sticky_menu') == '1') { ?>data-uk-sticky=""<?php  } ?>>
                    <div class="uk-container uk-container-center">
                        <nav class="tm-navbar uk-navbar tt-menu-blog">
                                
                                <?php if ($this['widgets']->count('logo')) : ?>
                                <a class="tm-logo" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo'); ?></a>
                                <?php endif; ?>
                                    
                                <?php if ($this['widgets']->count('menu')) : ?>
                                <?php echo $this['widgets']->render('menu'); ?>
                                <?php endif; ?>

                                <?php if ($this['widgets']->count('offcanvas')) : ?>
                                <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
                                <?php endif; ?>

                                <?php if ($this['widgets']->count('search')) : ?>
                                <div class="uk-navbar-flip">
                                        <div class="uk-navbar-content uk-hidden-small"><?php echo $this['widgets']->render('search'); ?></div>
                                </div>
                                <?php endif; ?>

                                <?php if ($this['widgets']->count('logo-small')) : ?>
                                <div class="uk-navbar-content uk-navbar-center uk-visible-small"><a class="tm-logo-small" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo-small'); ?></a></div>
                                <?php endif; ?>

                        </nav>
                    </div>
                </div>
		<?php endif; ?>
        
                
                
                
                <?php  
               function top_position($top, $menualias, $full_width, $sectionbg, $sectionbgone, $section_padding, $collapse){
                global $warp;
                $url_background = './images/'.$menualias.'/'.$top.'.jpg';
                if ($warp['widgets']->count($top)) {
                echo "<div "; 
                
                if ($warp['config']->get('grid.'.$top.'.sectionbg') == '1' or $warp['config']->get('grid.'.$top.'.sectionbgone') == '1'){
                echo  $top_classes_bg = 'class="'.$top.'-box ';
                echo  $full_width.' ';
                echo  $sectionbg.' ';
                echo  $sectionbgone.' ';
                echo  $section_padding.'"';
                
                }else{
                    if(file_exists($url_background)){
                            echo $top_classes_bg = ' class="'.$top.'-box '.' ';
                            echo $full_width.' ';
                            echo $section_padding;
                            echo '" '.'style="background-repeat: no-repeat; background-position: center top; background-size: cover; background-image: url('.$url_background.')"';
                          } else{
                            echo  $top_classes_bg = ' class="'.$top.'-box '.' ';
                            echo  $full_width.' ';
                            echo $sectionbg.' ';
                            echo  $sectionbgone.' ';
                            echo $section_padding.'" ';
                          }
                }
                echo ">";
            
                echo '<div class="uk-container uk-container-center">';
                echo '<section id="tm-'.$top.'" class=" '; 
                echo $grid_classes[$top]; 
                echo $display_classes[$top];
                echo "\" data-uk-grid-match=\"{target:'> div > .uk-panel'}\""; 
                echo $collapse; 
                echo ">";
                
                echo $warp['widgets']->render($top, array('layout'=>$warp['config']->get('grid.'.$top.'.layout'))); 
               
                echo "</section></div></div>";
                 } 
                
                }  
            
                top_position('top-a', $menualias, $full_width_top_A, $sectionbg_top_A, $sectionbgone_top_A, $section_padding_top_A, $collapse_top_A);
                top_position('top-b', $menualias, $full_width_top_B, $sectionbg_top_B, $sectionbgone_top_B, $section_padding_top_B, $collapse_top_B);
                top_position('top-c', $menualias, $full_width_top_C, $sectionbg_top_C, $sectionbgone_top_C, $section_padding_top_C, $collapse_top_C);
                top_position('top-d', $menualias, $full_width_top_D, $sectionbg_top_D, $sectionbgone_top_D, $section_padding_top_D, $collapse_top_D);
                top_position('top-e', $menualias, $full_width_top_E, $sectionbg_top_E, $sectionbgone_top_E, $section_padding_top_E, $collapse_top_E);
                top_position('top-f', $menualias, $full_width_top_F, $sectionbg_top_F, $sectionbgone_top_F, $section_padding_top_F, $collapse_top_F);
                top_position('top-g', $menualias, $full_width_top_G, $sectionbg_top_G, $sectionbgone_top_G, $section_padding_top_G, $collapse_top_G);
                top_position('top-h', $menualias, $full_width_top_H, $sectionbg_top_H, $sectionbgone_top_H, $section_padding_top_H, $collapse_top_H);
                top_position('top-i', $menualias, $full_width_top_I, $sectionbg_top_I, $sectionbgone_top_I, $section_padding_top_I, $collapse_top_I);
                top_position('top-j', $menualias, $full_width_top_J, $sectionbg_top_J, $sectionbgone_top_J, $section_padding_top_J, $collapse_top_J);
                ?>
                    
                

		<?php if ($this['widgets']->count('main-top + main-bottom + sidebar-a + sidebar-b') || $this['config']->get('system_output', true)) : ?>
<div class="tt-midle-box">
<div class="uk-container uk-container-center"> 
		<div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

			<?php if ($this['widgets']->count('main-top + main-bottom') || $this['config']->get('system_output', true)) : ?>
			<div class="<?php echo $columns['main']['class'] ?>">

				<?php if ($this['widgets']->count('main-top')) : ?>
				<section id="tm-main-top" class="<?php echo $grid_classes['main-top']; echo $display_classes['main-top']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-top', array('layout'=>$this['config']->get('grid.main-top.layout'))); ?></section>
				<?php endif; ?>

				<?php if ($this['config']->get('system_output', true)) : ?>
				<main id="tm-content" class="tm-content">

					<?php if ($this['widgets']->count('breadcrumbs')) : ?>
					<?php echo $this['widgets']->render('breadcrumbs'); ?>
					<?php endif; ?>

					<?php echo $this['template']->render('content'); ?>

				</main>
				<?php endif; ?>

				<?php if ($this['widgets']->count('main-bottom')) : ?>
				<section id="tm-main-bottom" class="<?php echo $grid_classes['main-bottom']; echo $display_classes['main-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-bottom', array('layout'=>$this['config']->get('grid.main-bottom.layout'))); ?></section>
				<?php endif; ?>

			</div>
			<?php endif; ?>

            <?php foreach($columns as $name => &$column) : ?>
            <?php if ($name != 'main' && $this['widgets']->count($name)) : ?>
            <aside class="<?php echo $column['class'] ?>"><?php echo $this['widgets']->render($name) ?></aside>
            <?php endif ?>
            <?php endforeach ?>

		</div>
        </div>
        </div>
		<?php endif; ?>
            
             
                <?php if ($this['widgets']->count('bottom-a')) : ?>
                    <div class="bottom-a-box <?php echo implode (" ", $bottomAclasses) ?>">
                        <div class="uk-container uk-container-center">
                            <section id="tm-bottom-a" class="<?php echo $grid_classes['bottom-a']; echo $display_classes['bottom-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" <?php echo $bottom_A_classes; ?>  data-uk-grid-margin><?php echo $this['widgets']->render('bottom-a', array('layout'=>$this['config']->get('grid.bottom-a.layout'))); ?></section>
                        </div>
                    </div>    
                <?php endif; ?>
            
        <?php if ($this['widgets']->count('bottom-b')) : ?>
                <div class="bottom-b-box <?php echo implode (" ", $bottomBclasses) ?>">
                    <div class="uk-container uk-container-center">
		                  <section id="tm-bottom-b" class="<?php echo $grid_classes['bottom-b']; echo $display_classes['bottom-b']; ?>"  data-uk-grid-match="{target:'> div > .uk-panel'}" <?php echo $bottom_B_classes; ?> data-uk-grid-margin>
    <?php echo $this['widgets']->render('bottom-b', array('layout'=>$this['config']->get('grid.bottom-b.layout'))); ?>
                        </section>
		            </div>
                </div>
        <?php endif; ?>
    
     
		

		<?php if ($this['widgets']->count('footer + debug') || $this['config']->get('warp_branding', true) || $this['config']->get('totop_scroller', true)) : ?>
	

			<?php if ($this['config']->get('totop_scroller', true)) : ?>
			<a class="tm-totop-scroller" data-uk-smooth-scroll href="#"></a>
			<?php endif; ?>

                <?php if ($this['widgets']->count('footer')) : ?>
                        <footer class="footer-box <?php echo implode (" ", $footerclasses) ?>">
                            <div class="uk-container uk-container-center">
        		                  <div id="tm-footer" class="<?php echo $grid_classes['footer']; echo $display_classes['footer']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" <?php echo $footer_end_classes; ?>><?php echo $this['widgets']->render('footer', array('layout'=>$this['config']->get('grid.footer.layout'))); ?></div>
        		            </div>
                        </footer>
                <?php endif; ?>
				
				<?php echo $this['widgets']->render('debug'); ?>
		<?php endif; ?>



	<?php echo $this->render('footer'); ?>

	<?php if ($this['widgets']->count('offcanvas')) : ?>
	<div id="offcanvas" class="uk-offcanvas">
		<div class="uk-offcanvas-bar"><?php echo $this['widgets']->render('offcanvas'); ?></div>
	</div>
	<?php endif; ?>

</body>
</html>