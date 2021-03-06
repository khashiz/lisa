<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;
use Joomla\Component\Tags\Site\Helper\RouteHelper;
use Joomla\Registry\Registry;

$authorised = Factory::getUser()->getAuthorisedViewLevels();

?>
<?php if (!empty($displayData)) : ?>
    <div class="uk-width-1-1 uk-width-expand@s tagspopular">
        <ul class="uk-child-width-auto uk-grid-small uk-flex-center uk-flex-right@s" data-uk-grid>
            <?php foreach ($displayData as $i => $tag) : ?>
                <?php if (in_array($tag->access, $authorised)) : ?>
                    <?php $tagParams = new Registry($tag->params); ?>
                    <?php $link_class = $tagParams->get('tag_link_class', 'btn-info'); ?>
                    <li class="list-inline-item tag-<?php echo $tag->tag_id; ?> tag-list<?php echo $i; ?>" itemprop="keywords">
                        <a href="<?php echo Route::_(RouteHelper::getTagRoute($tag->tag_id . ':' . $tag->alias)); ?>" class="uk-label uk-label-default tag uk-flex uk-flex-middle uk-border-pill f500 font <?php echo $link_class; ?>">
                            <?php echo $this->escape($tag->title); ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>