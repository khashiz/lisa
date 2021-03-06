<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_finder
 *
 * @copyright   (C) 2011 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

/*
* This segment of code sets up the autocompleter.
*/
if ($this->params->get('show_autosuggest', 1))
{
	$this->document->getWebAssetManager()->usePreset('awesomplete');
	$this->document->addScriptOptions('finder-search', array('url' => Route::_('index.php?option=com_finder&task=suggestions.suggest&format=json&tmpl=component', false)));
}

?>

<form action="<?php echo Route::_($this->query->toUri()); ?>" method="get" class="js-finder-searchform">
	<?php echo $this->getFields(); ?>
	<fieldset class="com-finder__search word mb-3">
		<div class="form-inline">
			<label for="q" class="uk-hidden uk-form-label">
				<?php echo Text::_('COM_FINDER_SEARCH_TERMS'); ?>
			</label>
			<div class="input-group uk-grid-small uk-child-width-1-1 uk-child-width-expand@s" data-uk-grid>
                <div class="uk-width-expand">
                    <input type="text" name="q" autofocus id="q" class="uk-input uk-form-large js-finder-search-query form-control" value="<?php echo $this->escape($this->query->input); ?>" placeholder="<?php echo Text::_('COM_FINDER_SEARCH_TERMS'); ?>">
                </div>
                <div class="uk-width-1-1 uk-width-1-4@s">
                    <button type="submit" class="uk-button uk-button-secondary uk-border-rounded uk-button-large uk-height-1-1 uk-width-1-1">
                        <span class="icon-search icon-white" aria-hidden="true"></span>
                        <?php echo Text::_('JSEARCH_FILTER_SUBMIT'); ?>
                    </button>
                </div>
				<?php if ($this->params->get('show_advanced', 1)) : ?>
					<?php HTMLHelper::_('bootstrap.collapse'); ?>
					<button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#advancedSearch" aria-expanded="<?php echo ($this->params->get('expand_advanced', 0) ? 'true' : 'false'); ?>">
						<span class="icon-search-plus" aria-hidden="true"></span>
						<?php echo Text::_('COM_FINDER_ADVANCED_SEARCH_TOGGLE'); ?></button>
				<?php endif; ?>
			</div>
		</div>
	</fieldset>

	<?php if ($this->params->get('show_advanced', 1)) : ?>
		<fieldset id="advancedSearch" class="com-finder__advanced js-finder-advanced collapse<?php if ($this->params->get('expand_advanced', 0)) echo ' show'; ?>">
			<legend class="com-finder__search-advanced visually-hidden">
				<?php echo Text::_('COM_FINDER_SEARCH_ADVANCED_LEGEND'); ?>
			</legend>
			<?php if ($this->params->get('show_advanced_tips', 1)) : ?>
				<div class="com-finder__tips card card-outline-secondary mb-3">
					<div class="card-body">
						<?php echo Text::_('COM_FINDER_ADVANCED_TIPS_INTRO'); ?>
						<?php echo Text::_('COM_FINDER_ADVANCED_TIPS_AND'); ?>
						<?php echo Text::_('COM_FINDER_ADVANCED_TIPS_NOT'); ?>
						<?php echo Text::_('COM_FINDER_ADVANCED_TIPS_OR'); ?>
						<?php if ($this->params->get('tuplecount', 1) > 1) : ?>
						<?php echo Text::_('COM_FINDER_ADVANCED_TIPS_PHRASE'); ?>
						<?php endif; ?>
						<?php echo Text::_('COM_FINDER_ADVANCED_TIPS_OUTRO'); ?>
					</div>
				</div>
			<?php endif; ?>
			<div id="finder-filter-window" class="com-finder__filter">
				<?php echo HTMLHelper::_('filter.select', $this->query, $this->params); ?>
			</div>
		</fieldset>
	<?php endif; ?>
</form>
