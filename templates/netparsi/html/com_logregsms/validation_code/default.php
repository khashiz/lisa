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

date_default_timezone_set('Iran');
$session = JFactory::getSession();
$code_session = $session->get('smsregCode', '');
$mobile = $session->get('smsregMobile', '');
$referer = $session->get('smsregReferer', '');
$helper = new LRSHelper();

if(empty($code_session)){
    $helper::$_app->enqueueMessage('همه session ها منقضی شده اند', 'error');
    $app->redirect('index.php?option=com_logregsms&view=validation_mobile');
}

$params = $helper::getParams(); 
$resend = (int)$params->get('resend', ''); 
$resend_second = $resend*60; 

$confirm = LRSHelper::getConfirm('', $code_session, -1); 
$time = $confirm->time;
$current = time();
$resend_time = strtotime($time) + $resend_second;


$holding = $resend_time - $current ;

if($current > $resend_time){
    $can_send_display = 'style="display:block"';
    $holding_display = 'style="display:none"';
}
else{
    $can_send_display = 'style="display:none"';
    $holding_display = 'style="display:block"';	
} 
?>

<div id="logregsms" class="uk-width-1-1 uk-width-1-4@m uk-margin-auto validation-code">
    <div class="uk-height-viewport uk-flex uk-flex-column uk-flex-center uk-container">
        <div class="uk-border-rounded uk-padding uk-box-shadow-small uk-background-white">
            <h1 class="uk-text-primary font f700 uk-h4 uk-text-center uk-margin-medium-bottom"><?php echo JText::_('AUTH_HEADING'); ?></h1>
            <form class="noFieldset" action="<?php echo JRoute::_('index.php?option=com_logregsms&task=validation_code.step2'); ?>" method="post" name="step2form" id="step2form" onSubmit="return ValidationCodeForm()">
            <fieldset class="formContainer uk-form-stacked">
                <div class="uk-child-width-1-1 uk-grid-small" data-uk-grid>
                    <div class="uk-text-center">
                        <i class="fal fa-mobile fa-3x uk-text-secondary"></i>
                        <span class="uk-text-accent" data-uk-icon="icon: phone; ratio: 3;"></span>
                    </div>
                    <div>
                        <label class="uk-hidden uk-form-label uk-text-center uk-margin-small-bottom" for="mobilenum"><?php echo JText::_('AUTH_ENTER_CODE'); ?></label>
                        <div>
                            <input type="tel" name="codenum" autocomplete="off" class="uk-input uk-text-center uk-form-large ltr f600 pureNumber" placeholder="<?php echo JText::_('AUTH_ENTER_CODE'); ?>" id="codenum" autofocus onKeyPress="numberValidate(event)" maxlength="5">
                        </div>
                    </div>
                    <div>
                        <div id="holding" <?php echo $holding_display?>>
                            <div class="uk-child-width-1-1 uk-grid-small" data-uk-grid>
                                <div>
                                    <button type="submit" class="uk-button uk-button-secondary uk-border-rounded uk-button-large uk-width-1-1 formSubmit"><span><?php echo JText::_('AUTH_CHECK_CODE'); ?></span></button>
                                </div>
                                <div>
                                    <progress class="uk-progress uk-margin-remove" id="timeLeft" value="60" max="60"></progress>
                                </div>
                                <div class="font f500 uk-text-muted uk-text-tiny">
                                    <?php echo '<span id="counter" ></span>&ensp;'.JText::_('AUTH_TIME_REMAINING'); ?>
                                </div>
                            </div>
                        </div>
                        <div id="can_send" <?php echo $can_send_display?> >
                            <div class="uk-child-width-1-1 uk-grid-small" data-uk-grid>
                                <div>
                                    <a class="uk-button uk-button-default uk-border-rounded uk-button-large uk-width-1-1" href="<?php echo JRoute::_('index.php?option=com_logregsms&view=validation_code&task=validation_code.sendCode'); ?>"><?php echo JText::_('AUTH_SEND_NEW_CODE'); ?></a>
                                </div>
                                <div class="uk-text-center">
                                    <a class="uk-display-inline-block uk-text-muted font f500 uk-text-tiny" href="<?php echo JUri::base().'auth'; ?>"><?php echo JText::_('AUTH_NEW_NUMBER'); ?></a>
                                </div>
                            </div>
                        </div>
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


<script>
var timeleft = <?php echo $holding;?>;
var bar = document.getElementById('timeLeft');
var counter = document.getElementById('counter');
var timerId = setInterval(countdown, 1000);

function countdown() {
    if (timeleft == -1) {  
        clearTimeout(timerId);
        doSomething();
    } else {
        counter.innerHTML = timeleft;
        bar.setAttribute("value", timeleft);
        timeleft--;
    }
}

function doSomething() {
	document.getElementById('can_send').style.display="block";
	document.getElementById('holding').style.display="none";
}
</script>