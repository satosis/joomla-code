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
$app = JFactory::getApplication();

// add css
$this['asset']->addFile('css', 'css:theme.css');

require_once JPATH_ADMINISTRATOR . '/components/com_users/helpers/users.php';
$twofactormethods = UsersHelper::getTwoFactorMethods();

?>

<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>" class="uk-height-1-1">

<head>
<?php echo $this->render('head', compact('error', 'title')); ?>
<style>
.uk-grid > * {
    padding-left: 25px;
}

.spoiler >  input + .box {
	display: none;
}

.spoiler >  input:checked + .box {
	display: block;
}
</style>
</head>




<body class="uk-height-1-1 uk-vertical-align uk-text-center body-background-offline" style="background-color: black;">
    
	<div class="uk-width-large-1-1 uk-vertical-align-middle uk-container-center" style="min-height: 80%;">
        <div class="uk-grid-width-small-1-10 uk-grid-width-medium-1-10 uk-grid-width-large-1-10 uk-grid-width-xlarge-1-10 uk-container-center">
            <div class="logo-offline"></div>
        </div>
          <div class="spoiler">
<p style="color: red; margin-top: 5px; margin-bottom: 5px; font-size: 14pt;">Login offline</p>
     <input type="checkbox" />
        
     <div class="box uk-grid uk-container-center uk-width-medium-1-4 uk-width-small-4-10" style="background-color: rgba(0, 0, 0, 0.7);; position: absolute; z-index: 9999; top: 220px; left: 0px; right: 0px; margin: 0 auto; color: red">
		<jdoc:include type="message" />

		<h1 style="color: red; float: none;"><?php echo $error; ?></h1>

		<p class="uk-text-large uk-text-muted" style="float: none;"><?php echo $title; ?></p>

		<?php if ($app->getCfg('display_offline_message', 1) == 1 && str_replace(' ', '', $app->getCfg('offline_message')) != '') : ?>

			<p><?php echo $app->getCfg('offline_message'); ?></p>

		<?php elseif ($app->getCfg('display_offline_message', 1) == 2 && str_replace(' ', '', $message) != '') : ?>

			<p><?php echo $message; ?></p>

		<?php endif; ?>

		<form class="uk-form tt-margin-form" action="<?php echo JRoute::_('index.php', true); ?>" method="post">

			<div class="uk-form-row">
				<input class="uk-width-medium-1-2" type="text" name="username" placeholder="<?php echo JText::_('JGLOBAL_USERNAME') ?>">
			</div>

			<div class="uk-form-row">
				<input class="uk-width-medium-1-1" type="password" name="password" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD') ?>">
			</div>

			<?php if (count($twofactormethods) > 1) : ?>
			<div class="uk-form-row">
				<input type="text" name="secretkey" tabindex="0" size="18" placeholder="<?php echo JText::_('JGLOBAL_SECRETKEY') ?>" />
			</div>
			<?php endif; ?>

			<div class="uk-form-row">
				<button class="uk-button uk-button-primary" type="submit" name="Submit"><?php echo JText::_('JLOGIN') ?></button>
			</div>

			<div class="uk-form-row">
				<div class="uk-form-controls">
					<input type="checkbox" name="remember" value="yes" placeholder="<?php echo JText::_('JGLOBAL_REMEMBER_ME') ?>">
					<label for="remember"><?php echo JText::_('JGLOBAL_REMEMBER_ME') ?></label>
				</div>
			</div>

			<input type="hidden" name="option" value="com_users">
			<input type="hidden" name="task" value="user.login">
			<input type="hidden" name="return" value="<?php echo base64_encode(JURI::base()) ?>">
			<?php echo JHtml::_('form.token'); ?>

		</form>
        
	</div>
</div>
    		
    <div class="uk-container-center  uk-width-large-8-10" style="margin-top: 155px;">
        <p class="tt-offline-title">our website is temporarily offline</p> 
        <p class="tt-text">please check again soon</p>   
    </div>

<div class="uk-text-center uk-flex 
    uk-flex-center uk-container-center feautures-conteiner uk-width-large-1-10 uk-width-small-2-10 uk-width-medium-2-10" 
    style="margin-top: 250px;">	
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

</body>
</html>