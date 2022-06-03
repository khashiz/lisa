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
<section class="uk-padding-large uk-padding-remove-horizontal uk-position-relative uk-margin-large-bottom <?php echo $params->get('moduleclass_sfx') ?>">
    <div class="uk-position-relative">
        <div class="uk-container">
            <div class="uk-text-center uk-margin-large-bottom">
                <h3 class="font f700 uk-text-primary uk-margin-remove uk-h3 moduleTitle"><?php echo $module->title; ?></h3>
                <p class="uk-margin-remove-bottom uk-margin-top font f500"><?php echo JText::_('SERVICES_ICONS_TEXT'); ?></p>
            </div>
            <div class="uk-position-relative">
                <div class="uk-slider-container-offset services " data-uk-slider="autoplay: true; autoplay-interval: 2000; velocity: 5;">
                    <div class="uk-position-relative">
                        <ul class="uk-slider-items uk-child-width-1-4@s uk-grid">
                            <?php foreach ($list as $item) : ?>
                                <li>
                                    <?php require ModuleHelper::getLayoutPath('mod_articles_news', '_iconitem'); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <span class="uk-position-center-left-out uk-position-medium uk-flex uk-flex-middle uk-flex-center sliderArrow previous uk-border-circle cursorPointer" data-uk-slider-item="previous"><i class="far fa-chevron-left"></i></span>
                    <span class="uk-position-center-right-out uk-position-medium uk-flex uk-flex-middle uk-flex-center sliderArrow next uk-border-circle cursorPointer" data-uk-slider-item="next"><i class="far fa-chevron-right"></i></span>
                    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-remove-bottom uk-margin-medium-top"></ul>
                </div>
            </div>
        </div>
    </div>
</section>