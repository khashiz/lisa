<?php
/**
* @package RSForm! Pro
* @copyright (C) 2007-2019 www.rsjoomla.com
* @license GPL, http://www.gnu.org/copyleft/gpl.html
*/

defined('_JEXEC') or die('Restricted access');
?>
<div class="uk-padding-large uk-padding-remove-horizontal">
    <?php if ($this->params->get('show_page_heading', 0)) { ?>
        <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php } ?>
    <div class="uk-container"><?php echo RSFormProHelper::displayForm($this->formId); ?></div>
</div>