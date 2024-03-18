<?php
/**
 * @package         Better Preview
 * @version         4.1.3
 * 
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2016 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

include_once __DIR__ . '/helper.php';

class HelperBetterPreviewLinkContentArticle extends HelperBetterPreviewLink
{
	function getLinks()
	{
		$helper = new HelperBetterPreviewHelperContentArticle($this->params);

		if (!$item = $helper->getArticle())
		{
			return;
		}

		$parents = $helper->getArticleParents($item);

		return array_merge(array($item), $parents);
	}
}
