<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<a href="<?php echo $item->link; ?>" itemprop="url" class="uk-text-tiny font f600 uk-flex">
    <i class="fas fa-caret-left"></i>
    <span itemprop="name"><?php echo $item->title; ?></span>
</a>