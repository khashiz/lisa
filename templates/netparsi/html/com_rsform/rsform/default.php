<?php
/**
* @package RSForm! Pro
* @copyright (C) 2007-2019 www.rsjoomla.com
* @license GPL, http://www.gnu.org/copyleft/gpl.html
*/

defined('_JEXEC') or die('Restricted access');

$app  = JFactory::getApplication();
$params = $app->getTemplate(true)->params;

?>
<div class="uk-padding-large uk-padding-remove-horizontal">
    <?php if ($this->params->get('show_page_heading', 0)) { ?>
    <?php } ?>
    <div class="uk-container">
        <div class="uk-text-center uk-margin-large-bottom">
            <h1 class="font f700 uk-text-primary uk-margin-remove uk-h3"><?php echo JText::_('NEED_HELP'); ?></h1>
            <p class="uk-margin-remove-bottom uk-margin-top font f500"><?php echo JText::_('CONTACT_TEXT'); ?></p>
        </div>
        <div>
            <div class="uk-grid-large" data-uk-grid>
                <div class="uk-width-1-1 uk-width-expand@s">
                    <div class="uk-box-shadow-medium uk-border-rounded uk-padding"><?php echo RSFormProHelper::displayForm($this->formId); ?></div>
                </div>
                <div class="uk-width-1-1 uk-width-1-3@s contactSide">
                    <h3 class="font uk-h4 uk-text-primary f600 uk-margin-medium-top"><?php echo JText::_('CALL_US'); ?></h3>
                    <ul class="uk-grid-small info" data-uk-grid>
                        <li class="uk-text-small uk-flex uk-flex-middle uk-width-1-1"><i class="fal fa-map-signs fa-fw fa-lg uk-margin-left uk-text-secondary"></i><a href="#" class="uk-text-dark font f500"><?php echo $params->get('address'); ?></a></li>
                        <li class="uk-text-small uk-flex uk-flex-middle uk-width-1-2 uk-width-1-1@m"><i class="fal fa-phone fa-flip-horizontal fa-fw fa-lg uk-margin-left uk-text-secondary"></i><a href="tel:<?php echo $params->get('phone'); ?>" class="uk-text-dark font f500 ltr"><?php echo $params->get('phone'); ?></a></li>
                        <li class="uk-text-small uk-flex uk-flex-middle uk-width-1-2 uk-width-1-1@m"><i class="fal fa-fax fa-flip-horizontal fa-fw fa-lg uk-margin-left uk-text-secondary"></i><a href="<?php echo $params->get('fax'); ?>" class="uk-text-dark font f500 ltr"><?php echo $params->get('fax'); ?></a></li>
                        <li class="uk-text-small uk-flex uk-flex-middle uk-width-1-2 uk-width-1-1@m"><i class="fal fa-envelope-open-text fa-fw fa-lg uk-margin-left uk-text-secondary"></i><a href="mailto:<?php echo $params->get('email'); ?>" class="uk-text-dark font f500 ltr"><?php echo $params->get('email'); ?></a></li>
                    </ul>
                    <hr class="uk-margin-medium-top uk-margin-medium-bottom uk-divider-icon">
                    <h3 class="font uk-h4 uk-text-primary f600 uk-margin-medium-top"><?php echo JText::_('SOCIAL_MEDIA'); ?></h3>
                    <div class="uk-grid-small uk-child-width-expand uk-flex-between" data-uk-grid>
                        <?php foreach ($params->get('socials') as $item) : ?>
                            <?php if ($item->icon != '') { ?>
                                <?php if ($item->icon != 'aparat') { ?>
                                    <div><a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>" class="socialButton uk-button uk-border-rounded uk-box-shadow-small uk-button-social uk-flex uk-flex-center uk-flex-middle uk-padding-small uk-button-<?php echo $item->icon; ?>" target="_blank" id="<?php echo $item->title; ?>"><i class="fab fa-<?php echo $item->icon; ?>"></i></a></div>
                                <?php } else { ?>
                                    <div><a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>" class="socialButton uk-button uk-border-rounded uk-box-shadow-small uk-flex uk-flex-center uk-flex-middle uk-padding-small uk-button-default uk-button-<?php echo $item->icon; ?>" target="_blank" id="<?php echo $item->title; ?>"><img src="<?php echo JUri::base().'images/sprite.svg#'.$item->icon; ?>" width="18" height="18" data-uk-svg></a></div>
                                <?php } ?>
                            <?php } ?>
                        <?php endforeach; ?>
                    </div>
                    <?php if (!empty($params->get('lat')) && !empty($params->get('lng'))) { ?>
                        <hr class="uk-margin-medium-top uk-margin-medium-bottom uk-divider-icon">
                        <div class="uk-hidden@m">
                            <h2 class="bordered uk-margin-bottom uk-text-heavy uk-h4 uk-text-center uk-text-<?php echo JFactory::getLanguage()->isRtl() ? 'right' : 'left'; ?>@m uk-hidden@m font"><?php echo JText::sprintf('PATHFINDER'); ?></h2>
                            <div>
                                <div class="uk-grid-small uk-child-width-1-2" data-uk-grid>
                                    <div><a href="https://waze.com/ul?ll=<?php echo $params->get('lat'); ?>,<?php echo $params->get('lng'); ?>&navigate=yes" class="uk-width-1-1 uk-padding-small uk-button uk-button-default uk-border-rounded uk-box-shadow-small" target="_blank" rel="noreferrer"><img src="<?php echo JURI::base().'images/waze-logo.svg' ?>" width="100" alt=""></a></div>
                                    <div><a href="http://maps.google.com/maps?daddr=<?php echo $params->get('lat'); ?>,<?php echo $params->get('lng'); ?>" class="uk-width-1-1 uk-padding-small uk-button uk-button-default uk-border-rounded uk-box-shadow-small" target="_blank" rel="noreferrer"><img src="<?php echo JURI::base().'images/google-maps-logo.svg'; ?>" width="100" alt=""></a></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<iframe class="uk-width-1-1 uk-box-shadow-medium" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4323.760826751224!2d51.3153946673958!3d35.7222633952195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8dfd12e36b9f47%3A0x1a2d4afee8ee3c2f!2sPizza%20House!5e0!3m2!1sen!2s!4v1654201846330!5m2!1sen!2s" width="1280" height="380" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>