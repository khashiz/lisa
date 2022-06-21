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
<a href="<?php echo $item->link; ?>" class="uk-border-rounded uk-box-shadow-small uk-box-shadow-hover-medium uk-overflow-hidden uk-height-1-1 uk-text-zero uk-display-block uk-padding serviceItem">
    <span class="uk-display-block uk-margin-bottom uk-text-center">
        <img src="<?php echo JURI::base().'images/sprite.svg#hair'; ?>" width="" height="100" data-uk-svg>
    </span>
    <div class="page-header">
        <h3 class="uk-h5 uk-text-center font f700 uk-margin-remove" itemprop="name"><?php echo $item->title; ?></h3>
    </div>
</a>