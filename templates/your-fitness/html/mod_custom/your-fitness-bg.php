<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>


<div class="custom <?php echo $moduleclass_sfx ?>" <?php if ($params->get('backgroundimage')) : ?> style="background-repeat: no-repeat; background-position: center top; background-size: cover; background-image:url(<?php echo $params->get('backgroundimage');?>)"<?php endif;?> >
	<?php echo $module->content;?>
</div>
