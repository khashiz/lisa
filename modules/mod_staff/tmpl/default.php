<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;

$modId = 'mod-custom' . $module->id;

if ($params->get('backgroundimage'))
{
	/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
	$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
	$wa->addInlineStyle('
#' . $modId . '{background-image: url("' . Uri::root(true) . '/' . HTMLHelper::_('cleanImageURL', $params->get('backgroundimage'))->url . '");}
', ['name' => $modId]);
}
?>
<section class="uk-position-relative uk-margin-large-bottom uk-overflow-hidden">
    <div class="uk-container">
        <div class="uk-text-center uk-margin-large-bottom">
            <h4 class="font f700 uk-text-primary uk-margin-remove uk-h3"><?php echo $module->title; ?></h4>
            <p class="uk-margin-remove-bottom uk-margin-top font f500"><?php echo $params->get('text'); ?></p>
        </div>
        <div id="<?php echo $modId; ?>">
            <div class="uk-position-relative">
                <div class="uk-slider-container-offset services uk-slider uk-slider-container" data-uk-slider="autoplay: true; autoplay-interval: 2000; velocity: 5;">
                    <div class="uk-position-relative">
                        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-4@s uk-grid" data-uk-scrollspy="cls: uk-animation-slide-bottom-small; target: > *; delay: 250; offset-top: -300;">
					        <?php foreach ($params->get('staff') as $item) : ?>
						        <?php if ($item->img != '') { ?>
                                    <li>
                                        <span title="<?php echo $item->title; ?>" class="uk-position-relative uk-border-rounded uk-box-shadow-small uk-box-shadow-hover-medium uk-overflow-hidden uk-height-1-1 uk-text-zero uk-display-block serviceItem">
                                            <img src="<?php echo (HTMLHelper::cleanImageURL($item->img))->url; ?>" width="<?php echo (HTMLHelper::cleanImageURL($item->background))->width; ?>" height="<?php echo (HTMLHelper::cleanImageURL($item->background))->height; ?>" alt="<?php echo $item->title; ?>" class="uk-display-inline-block uk-width-1-1">
                                            <div class="uk-position-bottom-center uk-text-center staffTitle">
                                                <h3 class="uk-h4 font f700 uk-margin-remove uk-text-white" itemprop="name"><?php echo $item->title; ?></h3>
                                                <span class="font f500 uk-text-small subtitle"><?php echo $item->subtitle; ?></span>
                                            </div>
                                        </span>
                                    </li>
						        <?php } ?>
					        <?php endforeach; ?>
                        </ul>
                    </div>
                    <span class="uk-position-center-left-out uk-position-medium uk-flex uk-flex-middle uk-flex-center sliderArrow previous uk-border-circle cursorPointer uk-visible@s" data-uk-slider-item="previous"><i class="far fa-chevron-left"></i></span>
                    <span class="uk-position-center-right-out uk-position-medium uk-flex uk-flex-middle uk-flex-center sliderArrow next uk-border-circle cursorPointer uk-visible@s" data-uk-slider-item="next"><i class="far fa-chevron-right"></i></span>
                    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-remove-bottom uk-margin-medium-top"></ul>
                </div>
            </div>
        </div>
    </div>
</section>