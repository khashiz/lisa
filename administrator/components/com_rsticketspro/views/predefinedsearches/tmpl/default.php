<?php
/**
 * @package    RSTickets! Pro
 *
 * @copyright  (c) 2010 - 2016 RSJoomla!
 * @link       https://www.rsjoomla.com
 * @license    GNU General Public License http://www.gnu.org/licenses/gpl-3.0.en.html
 */

defined('_JEXEC') or die('Restricted access');

$listOrder 	= $this->escape($this->state->get('list.ordering'));
$listDirn 	= $this->escape($this->state->get('list.direction'));
$saveOrder	= $listOrder == 'ordering';
if ($saveOrder)
{
	$saveOrderingUrl = 'index.php?option=com_rsticketspro&task=predefinedsearches.saveOrderAjax&tmpl=component';
	JHtml::_('sortablelist.sortable', 'articleList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
}
?>
<form action="<?php echo JRoute::_('index.php?option=com_rsticketspro&view=predefinedsearches'); ?>" method="post" name="adminForm" id="adminForm">
	<?php
	echo RsticketsproAdapterGrid::sidebar();

	echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this));

	if (empty($this->items))
	{
		?>
		<div class="alert alert-info">
			<span class="fa fa-info-circle" aria-hidden="true"></span><span class="sr-only"><?php echo JText::_('INFO'); ?></span>
			<?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
		</div>
		<?php
	}
	else
	{
		?>
		<table class="table table-striped" id="articleList">
			<thead>
			<tr>
				<th width="1%" nowrap="nowrap"><?php echo JHtml::_('grid.checkall'); ?></th>
				<th><?php echo JHtml::_('searchtools.sort', 'RST_SEARCH_NAME', 'name', $listDirn, $listOrder); ?></th>
				<th width="1%" nowrap="nowrap"><?php echo JText::_('RST_DEFAULT_SEARCH_SHORT'); ?></th>
				<th width="1%" nowrap="nowrap"><?php echo JHtml::_('searchtools.sort', 'JPUBLISHED', 'published', $listDirn, $listOrder); ?></th>
				<th width="1%" class="nowrap center"><?php echo JHtml::_('searchtools.sort', '', 'ordering', $listDirn, $listOrder, null, 'asc', 'JGRID_HEADING_ORDERING', 'icon-menu-2'); ?></th>
				<th width="1%"><?php echo JHtml::_('searchtools.sort', 'ID', 'id', $listDirn, $listOrder); ?></th>
			</tr>
			</thead>
			<tbody <?php if ($saveOrder) { ?> class="js-draggable" data-url="<?php echo $saveOrderingUrl; ?>" data-direction="<?php echo strtolower($listDirn); ?>" data-nested="false"<?php } ?>>
		<?php
		foreach ($this->items as $i => $item)
		{
			?>
			<tr data-draggable-group="1">
				<td width="1%" nowrap="nowrap"><?php echo JHtml::_('grid.id', $i, $item->id); ?></td>
				<td>
					<a href="<?php echo JRoute::_('index.php?option=com_rsticketspro&task=predefinedsearch.edit&id='.(int) $item->id); ?>"><?php echo $this->escape($item->name); ?></a>
				</td>
				<td width="1%" nowrap="nowrap" align="center"><?php echo JHtml::_('jgrid.published', $item->default, $i, 'predefinedsearches.', false); ?></td>
				<td width="1%" nowrap="nowrap" align="center"><?php echo JHtml::_('jgrid.published', $item->published, $i, 'predefinedsearches.'); ?></td>
				<td class="order center">
					<?php
					$disableClassName = '';
					$disabledLabel	  = '';

					if (!$saveOrder)
					{
						$disabledLabel    = JText::_('JORDERINGDISABLED');
						$disableClassName = 'inactive';
					}
					?>
					<span class="sortable-handler <?php echo $disableClassName; ?>">
						<i class="icon-menu"></i>
					</span>
					<input type="text" style="display:none" name="order[]" size="5" value="<?php echo $item->ordering; ?>" class="width-20 text-area-order" />
				</td>
				<td width="1%"><?php echo $this->escape($item->id); ?></td>
			</tr>
			<?php
		}
		?>
			</tbody>
		</table>
		<?php
		echo $this->pagination->getListFooter();
	}
	?>
	
	<div>
		<?php echo JHtml::_( 'form.token' ); ?>
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="task" value="" />
	</div>
	</div>
</form>