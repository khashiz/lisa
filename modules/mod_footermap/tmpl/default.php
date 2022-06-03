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
<section class="uk-padding-large uk-padding-remove-horizontal" id="<?php echo $modId; ?>">
    <div class="<?php if ($params->get('module_width') == 'grid') echo 'uk-container'; ?>">
        <div class="uk-child-width-1-1 uk-child-width-1-2@s" data-uk-grid>
            <div>aaaaaa</div>
            <div>gtrtrgtrgtrrgg</div>
        </div>
    </div>
</section>