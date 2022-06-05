<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<div>
<div class="uk-container blog-featured" itemscope itemtype="https://schema.org/Blog">
	<?php if ($this->params->get('show_page_heading') != 0) : ?>
	<div class="page-header uk-margin-large-bottom">
		<h1 class="uk-text-primary uk-text-center font f900 uk-h2 uk-margin-remove uk-animation-scale-down"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
        <p class="font uk-margin-remove-bottom uk-margin-top font f500 uk-animation-scale-up uk-text-center"><?php echo JText::_('HOME_TEXT'); ?></p>
	</div>
	<?php endif; ?>

	<?php $leadingcount = 0; ?>
	<?php if (!empty($this->lead_items)) : ?>
		<div class="uk-child-width-1-1 uk-child-width-1-3@s blog-items items-leading <?php echo $this->params->get('blog_class_leading'); ?>" data-uk-grid data-uk-scrollspy="cls: uk-animation-slide-bottom-small; target: > *; delay: 250; offset-top: -300;">
			<?php foreach ($this->lead_items as &$item) : ?>
				<div class="blog-item"
					itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
						<?php
						$this->item = & $item;
						echo $this->loadTemplate('item');
						?>
				</div>
				<?php $leadingcount++; ?>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<?php if (!empty($this->intro_items)) : ?>
		<?php $blogClass = $this->params->get('blog_class', ''); ?>
		<?php if ((int) $this->params->get('num_columns') > 1) : ?>
			<?php $blogClass .= (int) $this->params->get('multi_column_order', 0) === 0 ? ' masonry-' : ' columns-'; ?>
			<?php $blogClass .= (int) $this->params->get('num_columns'); ?>
		<?php endif; ?>
		<div class="blog-items <?php echo $blogClass; ?>">
		<?php foreach ($this->intro_items as $key => &$item) : ?>
			<div class="blog-item"
				itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
					<?php
					$this->item = & $item;
					echo $this->loadTemplate('item');
					?>
			</div>
		<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<?php if (!empty($this->link_items)) : ?>
		<div class="items-more">
			<?php echo $this->loadTemplate('links'); ?>
		</div>
	<?php endif; ?>

	<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->pagesTotal > 1)) : ?>
		<div class="w-100">
			<?php if ($this->params->def('show_pagination_results', 1)) : ?>
				<p class="counter float-end pt-3 pe-2">
					<?php echo $this->pagination->getPagesCounter(); ?>
				</p>
			<?php endif; ?>
			<?php echo $this->pagination->getPagesLinks(); ?>
		</div>
	<?php endif; ?>

    <div class="uk-padding-large uk-padding-remove-horizontal">
        <div class="uk-width-1-1 uk-width-1-3@s uk-margin-auto">
            <a href="<?php echo JUri::base().'mag'; ?>" class="uk-button uk-button-secondary uk-button-large uk-width-1-1 uk-border-pill uk-box-shadow-small"><?php echo JText::_('SEE_ALL_ITEMS'); ?></a>
        </div>
    </div>

</div>
</div>
