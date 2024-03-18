<?php
/**
 * Torbara Your Fitness Theme for Joomla, exclusively on Envato Market: http://themeforest.net/user/torbara
 * @encoding     UTF-8
 * @version      0.1
 * @copyright    Copyright ( C ) 2015 Torbara (http://torbara.com). All rights reserved.
 * @license      GNU General Public License version 2 or later, see http://www.gnu.org/licenses/gpl-2.0.html
 * @author       Nemirovskiy Vitaliy (support@torbara.com)
 */

/*
 * Generate 3-column layout
 */
$config          = $this['config'];
$sidebars        = $config->get('sidebars', array());
$columns         = array('main' => array('width' => 60, 'alignment' => 'right'));
$sidebar_classes = '';
$menualias = JFactory::getApplication()->getMenu()->getActive()->alias;

$gcf = function($a, $b = 60) use(&$gcf) {
    return (int) ($b > 0 ? $gcf($b, $a % $b) : $a);
};

$fraction = function($nominator, $divider = 60) use(&$gcf) {
    return $nominator / ($factor = $gcf($nominator, $divider)) .'-'. $divider / $factor;
};

foreach ($sidebars as $name => $sidebar) {
	if (!$this['widgets']->count($name)) {
        unset($sidebars[$name]);
        continue;
    }

    $columns['main']['width'] -= @$sidebar['width'];
    $sidebar_classes .= " tm-{$name}-".@$sidebar['alignment'];
}

if ($count = count($sidebars)) {
	$sidebar_classes .= ' tm-sidebars-'.$count;
}

$columns += $sidebars;
foreach ($columns as $name => &$column) {

    $column['width']     = isset($column['width']) ? $column['width'] : 0;
    $column['alignment'] = isset($column['alignment']) ? $column['alignment'] : 'left';

    $shift = 0;
    foreach (($column['alignment'] == 'left' ? $columns : array_reverse($columns, true)) as $n => $col) {
        if ($name == $n) break;
        if (@$col['alignment'] != $column['alignment']) {
            $shift += @$col['width'];
        }
    }
    $column['class'] = sprintf('tm-%s uk-width-medium-%s%s', $name, $fraction($column['width']), $shift ? ' uk-'.($column['alignment'] == 'left' ? 'pull' : 'push').'-'.$fraction($shift) : '');
}

/*
 * Add grid classes
 */
$positions = array_keys($config->get('grid', array()));
$displays  = array('small', 'medium', 'large');
$grid_classes = array();
$display_classes = array();
foreach ($positions as $position) {

    $grid_classes[$position] = array();
    $grid_classes[$position][] = "tm-{$position} uk-grid";
    $display_classes[$position][] = '';

    if ($this['config']->get("grid.{$position}.divider", false)) {
        $grid_classes[$position][] = 'uk-grid-divider';
    }

    $widgets = $this['widgets']->load($position);

    foreach($displays as $display) {
        if (!array_filter($widgets, function($widget) use ($config, $display) { return (bool) $config->get("widgets.{$widget->id}.display.{$display}", true); })) {
            $display_classes[$position][] = "uk-hidden-{$display}";
        }
    }

    $display_classes[$position] = implode(" ", $display_classes[$position]);
    $grid_classes[$position] = implode(" ", $grid_classes[$position]);

}


/*
 * Add Section classes
 */

/* TOP */

function full_width($top){
    global $warp; 
    if ($warp['config']->get('grid.'.$top.'.fullwidth') == '1') { 
      return $topclasses = "tm-full-width";
    }
}

function sectionbg ($top){
    global $warp;
    if ($warp['config']->get('grid.'.$top.'.sectionbg')){
        return "tm-section-bg-5";
    }
}

function sectionbgone ($top){
    global $warp;
    if ($warp['config']->get('grid.'.$top.'.sectionbgone')){
        return "tm-section-bg-one";
    }
}

function section_padding($top){
    global $warp;
    return $topclasses = $warp['config']->get('grid.'.$top.'.section_padding');
}

function collapse($top){
    global $warp;
    if ($warp['config']->get('grid.'.$top.'.collapse') == '1') { 
    return $topcollapse = "data-uk-grid-margin";
    }else { return $topcollapse = ""; }
}
    

$full_width_top_A      = full_width('top-a');
$sectionbg_top_A       = sectionbg('top-a');
$sectionbgone_top_A    = sectionbgone('top-a');
$section_padding_top_A = section_padding('top-a');
$collapse_top_A        = collapse('top-a');       

$full_width_top_B      = full_width('top-b');
$sectionbg_top_B       = sectionbg('top-b');
$sectionbgone_top_B    = sectionbgone('top-b');
$section_padding_top_B = section_padding('top-b');
$collapse_top_B        = collapse('top-b');

$full_width_top_C      = full_width('top-c');
$sectionbg_top_C       = sectionbg('top-c');
$sectionbgone_top_C    = sectionbgone('top-c');
$section_padding_top_C = section_padding('top-c');
$collapse_top_C        = collapse('top-c');

$full_width_top_D      = full_width('top-d');
$sectionbg_top_D       = sectionbg('top-d');
$sectionbgone_top_D    = sectionbgone('top-d');
$section_padding_top_D = section_padding('top-d');
$collapse_top_D        = collapse('top-d');

$full_width_top_E      = full_width('top-e');
$sectionbg_top_E       = sectionbg('top-e');
$sectionbgone_top_E    = sectionbgone('top-e');
$section_padding_top_E = section_padding('top-e');
$collapse_top_E        = collapse('top-e');

$full_width_top_F      = full_width('top-f');
$sectionbg_top_F       = sectionbg('top-f');
$sectionbgone_top_F    = sectionbgone('top-f');
$section_padding_top_F = section_padding('top-f');
$collapse_top_F        = collapse('top-f');

$full_width_top_G      = full_width('top-g');
$sectionbg_top_G       = sectionbg('top-g');
$sectionbgone_top_G    = sectionbgone('top-g');
$section_padding_top_G = section_padding('top-g');
$collapse_top_G        = collapse('top-g');

$full_width_top_H      = full_width('top-h');
$sectionbg_top_H       = sectionbg('top-h');
$sectionbgone_top_H    = sectionbgone('top-h');
$section_padding_top_H = section_padding('top-h');
$collapse_top_H        = collapse('top-h');

$full_width_top_I      = full_width('top-i');
$sectionbg_top_I       = sectionbg('top-i');
$sectionbgone_top_I    = sectionbgone('top-i');
$section_padding_top_I = section_padding('top-i');
$collapse_top_I        = collapse('top-i');

$full_width_top_J      = full_width('top-j');
$sectionbg_top_J       = sectionbg('top-j');
$sectionbgone_top_J    = sectionbgone('top-j');
$section_padding_top_J = section_padding('top-j');
$collapse_top_J        = collapse('top-j');

/* End TOP */



$bottomAclasses = array(); 
if ($this['config']->get('grid.bottom-a.fullwidth') == '1') { 
    $bottomAclasses [] = "tm-full-width";
}
$bottomAclasses [] = $this['config']->get('grid.bottom-a.sectionbg');
$bottomAclasses [] = $this['config']->get('grid.bottom-a.section_padding');

if ($this['config']->get('grid.bottom-a.collapse') == '1') { 
    $bottom_A_classes = "data-uk-grid-margin";
}else { $bottom_A_classes = ""; }



$bottomBclasses = array(); 
if ($this['config']->get('grid.bottom-b.fullwidth') == '1') { 
    $bottomBclasses [] = "tm-full-width";
}
$bottomBclasses [] = $this['config']->get('grid.bottom-b.sectionbg');
$bottomBclasses [] = $this['config']->get('grid.bottom-b.section_padding');

if ($this['config']->get('grid.bottom-b.collapse') == '1') { 
    $bottom_B_classes = "data-uk-grid-margin";
}else { $bottom_B_classes = ""; }


$footerclasses = array(); 
if ($this['config']->get('grid.footer.fullwidth') == '1') { 
    $footerclasses [] = "tm-full-width";
}
$footerclasses [] = $this['config']->get('grid.footer.sectionbg');
$footerclasses [] = $this['config']->get('grid.footer.section_padding');

if ($this['config']->get('grid.footer.collapse') == '1') { 
    $footer_end_classes = "data-uk-grid-margin";
}else { $footer_end_classes = ""; }

/*
 * Add body classes
 */

$body_classes  = $sidebar_classes;
$body_classes .= $this['system']->isBlog() ? ' tm-isblog' : ' tm-noblog';
$body_classes .= ' '.$config->get('page_class');
$body_classes .= ' tt-'.JFactory::getApplication()->input->get('view');

$config->set('body_classes', trim($body_classes));

/*
 * Add social buttons
 */

$body_config = array();
$body_config['twitter']  = (int) $config->get('twitter', 0);
$body_config['plusone']  = (int) $config->get('plusone', 0);
$body_config['facebook'] = (int) $config->get('facebook', 0);
$body_config['style']    = $config->get('style');

$config->set('body_config', json_encode($body_config));

/*
 * Add assets
 */

// add css
$this['asset']->addFile('css', 'css:theme.css');
$this['asset']->addFile('css', 'css:custom.css');

// add scripts
$this['asset']->addFile('js', 'js:uikit.js');


$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/lightbox.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/tooltip.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/slideshow.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/grid.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/sticky.js');

if ($this['config']->get('autocomplete') == '1') { 
      $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/autocomplete.js');
}

if ($this['config']->get('datepicker') == '1') { 
      $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/datepicker.js');
}

if ($this['config']->get('html_editor') == '1') { 
      $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/htmleditor.js');
}

if ($this['config']->get('search') == '1') { 
      $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/search.js');
}

if ($this['config']->get('slider') == '1') { 
      $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/slider.js');
}

if ($this['config']->get('slideset') == '1') { 
      $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/slideset.js');
}

if ($this['config']->get('accordion') == '1') { 
      $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/accordion.js');
}

if ($this['config']->get('notify') == '1') { 
      $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/notify.js');
}

if ($this['config']->get('nestable') == '1') { 
      $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/nestable.js');
}

if ($this['config']->get('sortable') == '1') { 
      $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/sortable.js');
}

if ($this['config']->get('parallax') == '1') { 
      $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/parallax.js');
}

if ($this['config']->get('upload') == '1') { 
      $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/upload.js');
}

$this['asset']->addFile('js', 'js:social.js');
$this['asset']->addFile('js', 'js:theme.js');
//$this['asset']->addFile('js', 'js:isotope.pkgd.min.js');
$this['asset']->addFile('js', 'js:circle-progress.js');

// internet explorer
if ($this['useragent']->browser() == 'msie') {
	$head[] = sprintf('<!--[if IE 8]><link rel="stylesheet" href="%s"><![endif]-->', $this['path']->url('css:ie8.css'));
    $head[] = sprintf('<!--[if lte IE 8]><script src="%s"></script><![endif]-->', $this['path']->url('js:html5.js'));
}

if (isset($head)) {
	$this['template']->set('head', implode("\n", $head));
}
