<?php
/**
 * @package    logregsms
 * @subpackage C:
 * @author     Mohammad Hosein Mir {@link https://joomina.ir}
 * @author     Created on 22-Feb-2019
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') || die('=;)');

$session = JFactory::getSession(); 
$referer = $session->get('smsregReferer', ''); //die(var_dump($referer));
if($referer){
    $referer = $referer;
}
else{
   $referer = $_SERVER['HTTP_REFERER'];
}
?>
<div id="logregsms" class="uk-width-1-1 uk-width-1-3@s uk-width-1-4@xl uk-margin-auto validation-mobile">
    <div class="uk-height-viewport uk-flex uk-flex-column uk-flex-center uk-container">
        <div class="uk-border-rounded uk-padding uk-box-shadow-small uk-background-white">
            <h1 class="uk-text-primary font f700 uk-h4 uk-text-center uk-margin-medium-bottom"><?php echo JText::_('AUTH_HEADING'); ?></h1>
            <form class="noFieldset" action="<?php echo JRoute::_('index.php?option=com_logregsms&task=validation_mobile.step1'); ?>" method="post" name="step1form" id="step1form" onSubmit="return ValidationMobileForm()">
                <fieldset class="formContainer uk-form-stacked">
                    <div class="uk-child-width-1-1 uk-grid-small" data-uk-grid>
                        <div class="uk-text-center">
                            <i class="fal fa-mobile fa-3x uk-text-secondary"></i>
                        </div>
                        <div>
                            <label class="uk-hidden uk-form-label uk-text-center uk-margin-small-bottom" for="mobilenum"><?php echo JText::_('AUTH_ENTER_YOUR_MONILE'); ?></label>
                            <div>
                                <input type="tel" name="mobilenum" autocomplete="off" class="uk-input uk-text-center uk-form-large ltr f600 pureNumber" placeholder="<?php echo JText::_('MOBILE_NUMBER'); ?>" id="mobilenum" onKeyPress="numberValidate(event)" autofocus maxlength="11">
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="uk-button uk-button-secondary uk-border-rounded uk-button-large uk-width-1-1 formSubmit"><span><?php echo JText::_('AUTH_CHECK_NUMBER'); ?></span></button>
                        </div>
                    </div>
                </fieldset>
                <input type="hidden" name="referer" value="<?php echo $referer; ?>">
            </form>
        </div>
        <a href="<?php echo JUri::base(); ?>" class="uk-display-inline-block uk-margin-top font f500 uk-text-tiny uk-text-muted uk-text-center uk-text-right@s">
            <i class="fas fa-arrow-turn-right uk-margin-small-left"></i>
            <span><?php echo JText::_('BACK_TO_HOME'); ?></span>
        </a>
    </div>
</div>