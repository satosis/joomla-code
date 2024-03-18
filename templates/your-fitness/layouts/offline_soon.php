<?php
/**
 * Gem — Gem Responsive Template for WordPress, exclusively on Envato Market: http://themeforest.net/user/torbara/?ref=torbara
 * @encoding   UTF-8
 * @version    2.0.1
 * @copyright  Copyright ( C ) 2015 torbar (http://torbara.com/). All rights reserved.
 * @license    Copyrighted Commercial Software
 * @support    support@torbara.com
 * @author     Torbara
*/

// add css
$this['asset']->addFile('css', 'css:theme.css');

$app    = JFactory::getApplication();
$path   = JURI::base(true).'/templates/'.$app->getTemplate().'/';

?>

<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>" class="uk-height-1-1 tm-error">
<head>
    <script type="text/javascript" src="<?php echo $path; ?>js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?php echo $path; ?>js/kinetic.js"></script> 
    <script type="text/javascript" src="<?php echo $path; ?>js/jquery.final-countdown.js"></script> 
  <!--  <link rel="stylesheet" href="<?php echo $path; ?>css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo $path; ?>css/theme.css" />-->
    <?php echo $this['template']->render('head', compact('error', 'title')); ?>
</head>
<body class="uk-height-1-1 uk-grid-width-1-1 uk-vertical-align uk-text-center tm-comingsoon-page">

<div class="uk-vertical-align-middle uk-container-center tm-comingsoon" style="color: white; top: 0px; left: 0px!important; position: absolute;">
    <a href="/index.html" title="">
        <img src="<?php echo $path; ?>images/icon/logo.png" class="tt-offline-soon-logo" alt="Site name" />
    </a>

    <div class="tm-text-block" style="margin-top: 40px;">
        <p style="font-size: 50px; color: white; text-transform: uppercase;">Coming soon</p>
    </div>
    <div class="uk-grid uk-text-center feautures-conteiner uk-flex-center" style="margin-top: 10%; margin-left: -35px;">
       

            <!-- days --> 
                <div class="clock-days tt-size-clock">    
                        <div id="canvas_days"></div>
                            
                            <div class="text" style="width: 80%; height: 80%; top:0px;">
                                <p class="val uk-flex-center">0</p>
                                <p class="type-days type-time">DAYS</p>
                            </div>
                                              
                </div>

            <!-- hours --> 
                <div class="clock-hours tt-size-clock">
                              
                            <div id="canvas_hours" class="clock-canvas"></div>
                            <div class="text" style="width: 80%; height: 80%; top:0px;">
                                 <p class="val uk-flex-center">0</p>
                                 <p class="type-hours type-time">HOURS</p>
                            </div>
                       
                </div>
            <!-- minutes --> 
                <div class="clock-minutes tt-size-clock">
                    
                        <div id="canvas_minutes" class="clock-canvas"></div>
                            <div class="text" style="width: 80%; height: 80%; top:0px; ">
                                <p class="val uk-flex-center">0</p>
                                <p class="type-minutes type-time">MINUTES</p>
                            </div>
                            
                      
                </div>
            <!-- seconds --> 
                <div class="clock-seconds tt-size-clock">
                   
                        <div id="canvas_seconds" class="clock-canvas"></div>
                        <div class="text" style="width: 80%; height: 80%; top:0px;">
                            <p class="val">0</p>
                            <p class="type-seconds type-time">SECONDS</p>
                        </div>
                        
                </div>
    </div>

<div class="uk-container-center uk-text-center uk-flex feautures-conteiner uk-width-large-2-10 uk-width-small-2-10 uk-width-medium-2-10 tt-social-soon">	
        <div class="uk-width-large-1-3 uk-width-small-1-3 uk-width-medium-1-3">
          <a href="" target="_parent"><div class="facebook-square"></div></a>
        </div>
        <div class="uk-width-large-1-3 uk-width-small-1-3 uk-width-medium-1-3">
          <a href="" target="_parent"><div class="twitter-square"></div></a>
      	</div>
      	<div class="uk-width-large-1-3 uk-width-small-1-3 uk-width-medium-1-3">
          <a href="" target="_parent"><div class="youtube-square"></div></a>
      	</div>
</div>

</div>        

    
        
<script type="text/javascript">
    // Start date
    var start_date = new Date('2015-12-23').getTime() / 1000;
    // End date
    var end_date = new Date('2016-01-01').getTime() / 1000; 
    // Current date
    var now_date = new Date().getTime() / 1000;
    jQuery('.countdown').final_countdown({start: start_date, end: end_date, now: now_date });
</script>
    
</body>
</html>