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
<section class="uk-padding-large uk-padding-remove-horizontal uk-padding-remove-top" id="<?php echo $modId; ?>">
    <div class="<?php if ($params->get('module_width') == 'grid') echo 'uk-container'; ?>">
        <div class="uk-child-width-1-1 uk-child-width-1-2@s <?php echo $params->get('module_width') == 'grid' ? 'uk-grid-column-large uk-grid-row-medium' : 'uk-grid-collapse'; ?>" data-uk-grid>
            <div class="<?php if ($params->get('direction') == 'media_first') echo 'uk-flex-first'; ?>">
                <?php if ($params->get('media_type') == 'photo') { ?>
                    <div class="uk-cover-container <?php echo $params->get('module_width') == 'grid' ? 'uk-border-rounded uk-box-shadow-medium uk-overflow-hidden' : ''; ?>">
                        <canvas width="800" height="445"></canvas>
                        <img src="<?php echo (HTMLHelper::cleanImageURL( $params->get('photo')))->url; ?>" width="<?php echo (HTMLHelper::cleanImageURL( $params->get('photo')))->width; ?>" height="<?php echo (HTMLHelper::cleanImageURL( $params->get('photo')))->height; ?>" class="uk-width-1-1" data-uk-cover>
                    </div>
                <?php } else { ?>
                    <div class="uk-box-shadow-medium uk-border-rounded uk-overflow-hidden">
                        <video class="uk-width-1-1 player" id="player" controls crossOrigin="anonymous" poster="<?php echo (HTMLHelper::cleanImageURL( $params->get('photo')))->url; ?>">
                            <source src="<?php echo $params->get('video_url'); ?>" type="video/mp4">
                        </video>
                    </div>
                <?php } ?>
            </div>
            <div class="uk-flex uk-flex-middle <?php if ($params->get('direction') == 'content_first') echo 'uk-flex-first'; ?>">
                <div class="uk-flex-1">
                    <h3 class="font f700 uk-text-primary uk-h3"><?php echo $module->title; ?></h3>
                    <div class="uk-text-justify font f400 uk-line-height-normal"><?php echo $module->content; ?></div>
                    <div>
                        <a href="<?php echo $params->get('btn_href'); ?>" class="uk-button uk-button-large uk-button-secondary uk-border-pill uk-box-shadow-small"><?php echo $params->get('btn_label'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>