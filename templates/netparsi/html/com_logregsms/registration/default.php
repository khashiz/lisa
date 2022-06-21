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

$email_required = $this->params->get('is_email_required', "1");
$session = JFactory::getSession();
$referer = $session->get('smsregReferer', '');
?>
<div id="logregsms" class="uk-width-1-1 uk-width-1-3@s uk-width-1-4@xl uk-margin-auto registration-form">
    <div class="uk-height-viewport uk-flex uk-flex-column uk-flex-center uk-container">
        <div class="uk-border-rounded uk-padding uk-box-shadow-small uk-background-white">
            <h1 class="uk-text-primary font f700 uk-h4 uk-text-center uk-margin-medium-bottom"><?php echo JText::_('AUTH_REGISTER'); ?></h1>
            <form class="noFieldset" action="<?php echo JRoute::_('index.php?option=com_logregsms&task=registration.step3'); ?>" method="post" name="step2form" id="step2form" onSubmit="return ValidationRegistrationForm()">
                <fieldset class="formContainer uk-form-stacked">
                    <div class="uk-child-width-1-1 uk-child-width-1-@m uk-grid-small" data-uk-grid>
                        <div class="uk-text-center uk-width-1-1">
                            <i class="fal fa-user-plus fa-3x uk-text-secondary"></i>
                        </div>
                        <div class="form-group uk-hidden">
                            <label class="uk-hidden uk-form-label" for="username"><?php echo JText::_('AUTH_USERNAME'); ?></label>
                            <input type="tel" name="username" required class="uk-input" id="username" value="<?php echo $this->mobile;?>" readonly disabled />
                        </div>

                        <div class="form-group">
                            <label class="uk-hidden uk-form-label" for="name"><?php echo JText::_('AUTH_NAME'); ?><strong>*</strong></label>
                            <input type="text" name="name" required class="uk-input uk-form-large" id="name" placeholder="<?php echo JText::_('AUTH_NAME').' ('.JText::_('AUTH_TYPE_PERSIAN').')'; ?>"/>
                        </div>

                        <?php if($email_required == "1" || $email_required == "2") : ?>
                            <div class="form-group">
                                <label class="uk-hidden uk-form-label" for="email"><?php echo JText::_('AUTH_EMAIL'); ?><?php echo $email_required == "1" ? "<strong>*</strong>" : ""; ?> </label>
                                <input type="email" id="email" name="email" <?php echo $email_required == "1" ? 'required="required"' : ""; ?> class="uk-form-large uk-input uk-text-right ltr form-control" placeholder="<?php echo JText::_('AUTH_EMAIL'); ?>" value="<?php echo $email;?>" />
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($this->fields)) { ?>
                            <?php $js = ""; ?>
                            <?php foreach ($this->fields as $key => $value) { ?>
                                <?php if($value->fieldname == "mobile" || $value->fieldname == "cellphone") { ?>
                                    <?php $value->setValue($this->mobile); ?>
                                    <?php $value->readonly = true; ?>
                                    <?php $value->hidden = true; ?>
                                <?php } ?>
                                <?php if ($value->hidden) { ?>
                                    <div class="form-group" style="display: none;">
                                        <?php echo $value->input; ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="form-group">
                                        <?php echo $value->label; ?>
                                        <?php echo $value->input; ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>

                        <div class="form-group uk-width-1-1">
                            <button type="submit" name="submform" id="subform" class="uk-button uk-button-secondary uk-border-rounded uk-button-large uk-width-1-1 formSubmit" ><span><?php echo JText::_('AUTH_REGISTER'); ?></span></button>
                        </div>
                        <div class="uk-text-center uk-width-1-1">
                            <a class="uk-display-inline-block uk-text-muted font f500 uk-text-tiny" href="<?php echo JRoute::_('index.php?option=com_logregsms&task=registration.clear'); ?>"><?php echo JText::_('AUTH_NEW_NUMBER'); ?></a>
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