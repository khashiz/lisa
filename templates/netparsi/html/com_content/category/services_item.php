<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use Joomla\Component\Content\Site\Helper\RouteHelper;

// Create a shortcut for params.
$params = $this->item->params;
$canEdit = $this->item->params->get('access-edit');
$info    = $params->get('info_block_position', 0);

// Check if associations are implemented. If they are, define the parameter.
$assocParam = (Associations::isEnabled() && $params->get('show_associations'));

$currentDate   = Factory::getDate()->format('Y-m-d H:i:s');
$isUnpublished = ($this->item->state == ContentComponent::CONDITION_UNPUBLISHED || $this->item->publish_up > $currentDate)
	|| ($this->item->publish_down < $currentDate && $this->item->publish_down !== null);

?>
<?php if ($isUnpublished) : ?><div class="system-unpublished"><?php endif; ?>
<?php // @todo Not that elegant would be nice to group the params ?>
<?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date') || $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author') || $assocParam); ?>

<a href="<?php echo Route::_(RouteHelper::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)); ?>" class="uk-border-rounded uk-box-shadow-small uk-box-shadow-hover-medium uk-overflow-hidden uk-height-1-1 uk-text-zero uk-display-block uk-padding serviceItem">
    <?php // echo LayoutHelper::render('joomla.content.weblog_intro_image', $this->item); ?>
    <span class="uk-display-block uk-margin-bottom uk-text-center">
        <img src="<?php echo JUri::base().'images/sprite.svg#'.json_decode($this->item->urls)->urlatext; ?>" width="" height="100" data-uk-svg>
    </span>
    <?php echo LayoutHelper::render('joomla.content.service_listitem_title', $this->item); ?>
    <?php /* if ($params->get('show_readmore') && $this->item->readmore) :
                if ($params->get('access-view')) :
                    $link = Route::_(RouteHelper::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language));
                else :
                    $menu = Factory::getApplication()->getMenu();
                    $active = $menu->getActive();
                    $itemId = $active->id;
                    $link = new Uri(Route::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false));
                    $link->setVar('return', base64_encode(RouteHelper::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)));
                endif; ?>
                <?php echo LayoutHelper::render('joomla.content.service_readmore', array('item' => $this->item, 'params' => $params, 'link' => $link)); ?>
            <?php endif; */ ?>

        <?php /* if ($canEdit) : ?>
            <?php echo LayoutHelper::render('joomla.content.icons', array('params' => $params, 'item' => $this->item)); ?>
        <?php endif; */ ?>

        <?php /* if ($info == 0 && $params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
		<?php echo LayoutHelper::render('joomla.content.tags', $this->item->tags->itemTags); ?>
	<?php endif; */ ?>

        <?php /* if (!$params->get('show_intro')) : ?>
            <?php // Content is generated by content plugin event "onContentAfterTitle" ?>
            <?php echo $this->item->event->afterDisplayTitle; ?>
        <?php endif; */ ?>

        <?php // Content is generated by content plugin event "onContentBeforeDisplay" ?>
        <?php // echo $this->item->event->beforeDisplayContent; ?>

        <?php /* if ($info == 1 || $info == 2) : ?>
            <?php if ($useDefList) : ?>
                <?php echo LayoutHelper::render('joomla.content.info_block', array('item' => $this->item, 'params' => $params, 'position' => 'below')); ?>
            <?php endif; ?>
            <?php if ($params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
                <?php echo LayoutHelper::render('joomla.content.tags', $this->item->tags->itemTags); ?>
            <?php endif; ?>
        <?php endif; */ ?>

    <?php // Content is generated by content plugin event "onContentAfterDisplay" ?>
    <?php // echo $this->item->event->afterDisplayContent; ?>
</a>
<?php if ($isUnpublished) : ?></div><?php endif; ?>