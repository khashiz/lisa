<?php
/**
 * @version 3.0.0
 * @package RSForm! Pro
 * @copyright (C) 2007-2021 www.rsjoomla.com
 * @license GPL, https://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

$app  = JFactory::getApplication();
$params = $app->getTemplate(true)->params;
?>
<div id="rsfp-thankyou-scroll5"></div>
<section class="uk-background-accent uk-padding-large uk-padding-remove-horizontal reserve" id="reserve">
    <div class="uk-container">
        <div class="uk-text-center uk-margin-large-bottom">
            <h4 class="font f700 uk-text-primary uk-margin-remove uk-h3"><?php echo $module->title; ?></h4>
            <p class="uk-margin-remove-bottom uk-margin-top font f500"><?php echo JText::_('RESERVE_TEXT'); ?></p>
        </div>
        <div class="uk-child-width-1-1 uk-child-width-1-2@s" data-uk-grid>
            <div>
                <div class="uk-background-white uk-border-rounded uk-box-shadow-medium uk-padding uk-height-1-1"><?php echo RSFormProHelper::displayForm($formId, true); ?></div>
            </div>
            <div>
                <div class="uk-background-white uk-border-rounded uk-box-shadow-medium uk-padding uk-height-1-1">
                    <h4 class="font f700 uk-text-primary uk-h5 uk-text-center uk-text-right@s"><?php echo $params->get('hours_title'); ?></h4>
                    <p class="font f500 uk-text-small uk-text-center uk-text-right@s"><?php echo $params->get('hours_text'); ?></p>
                    <div class="uk-padding-small uk-background-muted uk-border-rounded uk-text-zero">
                        <div class="uk-grid-small uk-child-width-1-1" data-uk-grid>
                            <?php foreach ($params->get('hours') as $item) : ?>
                                <?php if ($item->title != '') { ?>
                                    <div>
                                        <div class="uk-grid-small" data-uk-grid>
                                            <div class="uk-width-expand uk-text-small font f500 uk-text-muted" data-uk-leader><?php echo $item->title; ?></div>
                                            <div class="uk-text-small font f500 uk-text-primary"><?php echo $item->value; ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>