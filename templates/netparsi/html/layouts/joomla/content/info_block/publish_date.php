<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

?>
<dd class="uk-text-tiny uk-text-muted font f500">
    <i class="fas fa-fw fa-calendar-alt uk-text-secondary"></i>
	<time class="uk-display-inline-block" datetime="<?php echo HTMLHelper::_('date', $displayData['item']->publish_up, 'c'); ?>" itemprop="datePublished">
		<?php echo HTMLHelper::_('date', $displayData['item']->publish_up, Text::_('DATE_FORMAT_LC3')); ?>
	</time>
</dd>