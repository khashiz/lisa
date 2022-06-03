<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

if (!$list)
{
	return;
}

?>
<ul class="mod-articleslatest latestnews mod-list uk-list uk-list-divider sideList">
    <?php foreach ($list as $item) : ?>
        <li itemscope itemtype="https://schema.org/Article"><?php require ModuleHelper::getLayoutPath('mod_articles_news', '_sideservicesitem'); ?></li>
    <?php endforeach; ?>
</ul>