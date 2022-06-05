<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.cassiopeia
 *
 * @copyright   (C) 2017 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;
JHtml::_('jquery.framework');

/** @var Joomla\CMS\Document\HtmlDocument $this */

$app = Factory::getApplication();
$wa  = $this->getWebAssetManager();

$app  = JFactory::getApplication();
$user = JFactory::getUser();
$params = $app->getTemplate(true)->params;
$menu = $app->getMenu();
$active = $menu->getActive();

$pageparams = $menu->getParams( $active->id );
$pageclass = $pageparams->get( 'pageclass_sfx' );

// Add CSS
JHtml::_('stylesheet', 'fontawesome.min.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'brands.min.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'light.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'regular.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'solid.min.css', array('version' => 'auto', 'relative' => true));

JHtml::_('stylesheet', 'uikit-rtl.min.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'netparsi.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'plyr.css', array('version' => 'auto', 'relative' => true));

// Add js
JHtml::_('script', 'uikit.min.js', array('version' => 'auto', 'relative' => true));
JHtml::_('script', 'uikit-icons.min.js', array('version' => 'auto', 'relative' => true));
JHtml::_('script', 'particles.min.js', array('version' => 'auto', 'relative' => true));
JHtml::_('script', 'plyr.min.js', array('version' => 'auto', 'relative' => true));
JHtml::_('script', 'custom.js', array('version' => 'auto', 'relative' => true));

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
$menu     = $app->getMenu()->getActive();
$pageclass = $menu !== null ? $menu->getParams()->get('pageclass_sfx', '') : '';
$netparsi = "<a href='https://netparsi.com' class='uk-text-secondary netparsi' target='_blank' rel='nofollow'>".JTEXT::sprintf('NETPARSI')."</a>";

$this->setMetaData('viewport', 'width=device-width, initial-scale=1');
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="<?php echo $params->get('presetcolor'); ?>">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#000000">
	<jdoc:include type="metas" />
	<jdoc:include type="styles" />
	<jdoc:include type="scripts" />
</head>
<body class="<?php echo $option . ' view-' . $view . ($layout ? ' layout-' . $layout : ' no-layout') . ($task ? ' task-' . $task : ' no-task') . ($itemid ? ' itemid-' . $itemid : '') . ($pageclass ? ' ' . $pageclass : '') . ($this->direction == 'rtl' ? ' rtl' : ''); ?> <?php if ($pageclass == 'auth') echo 'uk-height-viewport uk-background-muted'; ?>">
    <?php if ($pageclass != 'auth') { ?>
        <header class="uk-background-muted uk-padding uk-padding-remove-horizontal uk-padding-remove-bottom uk-position-relative uk-background-center-center uk-background-cover uk-position-z-index <?php echo $pageclass; if ($pageclass != 'home') echo 'uk-box-shadow-large'; ?>" style="background-image: url('<?php echo $pageparams->get('headerbg') ? (HTMLHelper::cleanImageURL($pageparams->get('headerbg')))->url : (HTMLHelper::cleanImageURL($params->get('default_header_bg')))->url; ?>');">
            <div class="uk-container uk-position-relative">
                <nav class="uk-background-primary uk-margin-remove uk-border-rounded main" data-uk-sticky="start: 300; animation: uk-animation-slide-top;">
                    <div class="uk-container">
                        <div class="uk-grid-small" data-uk-grid>
                            <div class="uk-width-1-5 uk-hidden@s uk-flex uk-flex-middle uk-text-white">
                                <a href="#hamMenu" data-uk-toggle class="uk-border-rounded uk-flex uk-link-reset"><i class="far fa-bars fa-fw fa-2x icon"></i></a>
                            </div>
                            <div class="uk-width-1-5 uk-flex uk-flex-middle uk-flex-center uk-visible@s">
                                <a href="<?php echo JUri::base(); ?>" title="<?php echo $sitename; ?>" class="uk-display-inline-block logo"><img src="" width="50" height="50" alt="<?php echo $sitename; ?>" data-uk-svg></a>
                            </div>
                            <div class="uk-width-expand uk-flex uk-flex-middle uk-flex-center uk-hidden@s">
                                <a href="<?php echo JUri::base(); ?>" title="<?php echo $sitename; ?>" class="uk-display-inline-block uk-padding-small logo"><img src="" width="50" height="50" alt="<?php echo $sitename; ?>" data-uk-svg></a>
                            </div>
                            <div class="uk-width-expand uk-flex uk-flex-center uk-visible@s"><jdoc:include type="modules" name="nav" style="html5" /></div>
                            <div class="uk-width-1-5 uk-flex uk-flex-middle uk-flex-left">
                                <div class="uk-child-width-auto uk-grid-divider uk-grid-small" data-uk-grid>
                                    <div class="uk-width-auto uk-visible@s">
                                        <a href="<?php echo JUri::base().'services#reserve'; ?>" class="uk-button uk-button-secondary uk-border-rounded uk-box-shadow-small uk-button-small uk-animation-slide-right-small">نوبت دهی آنلاین</a>
                                    </div>
                                    <div class="uk-width-auto uk-text-white uk-flex uk-flex-middle">
                                        <a href="<?php echo JUri::base().'search'; ?>" class="uk-border-rounded uk-flex uk-link-reset">
                                            <i class="mobileSearchToggle uk-animation-fade far fa-search fa-fw icon"></i>
                                            <i class="mobileSearchToggle uk-animation-fade far fa-times fa-fw icon" hidden></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <?php if ($pageclass != 'home') { ?>
                    <div class="uk-padding-large uk-padding-remove-horizontal">
                        <h2 class="font uk-text-center uk-text-white uk-animation-slide-bottom-small"><?php echo !empty($pageparams->get('page_heading')) ? $pageparams->get('page_heading') : $active->title; ?></h2>
                        <jdoc:include type="modules" name="breadcrumbs" style="html5" />
                    </div>
                <?php } ?>
            </div>
        </header>
        <jdoc:include type="message" />
    <?php } ?>
    <?php if ($this->countModules('topout', true)) : ?>
        <jdoc:include type="modules" name="topout" style="html5" />
    <?php endif; ?>
    <main class="<?php if ($pageclass == 'tickets') { echo 'uk-padding-large uk-padding-remove-horizontal';} ?>">
        <?php if ($this->countModules('topin', true)) : ?>
            <jdoc:include type="modules" name="topin" style="html5" />
        <?php endif; ?>
        <div class="<?php echo $pageclass == 'tickets' ? 'uk-container' : ''; ?>">
            <div class="uk-grid-divider" data-uk-grid>
                <?php if ($this->countModules('sidestart', true)) : ?>
                    <aside class="uk-width-1-1 uk-width-1-4@m uk-visible@m">
                        <div data-uk-sticky="offset: 92; bottom: true;">
                            <div class="uk-child-width-1-1" data-uk-grid><jdoc:include type="modules" name="sidestart" style="none" /></div>
                        </div>
                    </aside>
                <?php endif; ?>
                <article class="uk-width-1-1 uk-width-expand@m">
                    <jdoc:include type="component" />
                </article>
                <?php if ($this->countModules('sideend', true)) : ?>
                    <aside class="uk-width-1-1 uk-width-1-4@s uk-visible@s"><jdoc:include type="modules" name="sideend" style="none" /></aside>
                <?php endif; ?>
            </div>
        </div>
    </main>
    <?php if ($this->countModules('bottomout', true)) : ?>
        <jdoc:include type="modules" name="bottomout" style="html5" />
    <?php endif; ?>
    <?php if ($this->countModules('reserve', true)) : ?>
        <jdoc:include type="modules" name="reserve" style="html5" />
    <?php endif; ?>
    <?php if ($pageclass != 'auth') { ?>
        <footer class="uk-background-primary uk-overflow-hidden uk-position-relative">
            <span class="uk-position-absolute curves"><img src="<?php echo JUri::base().'images/sprite.svg#curves'; ?>" data-uk-svg></span>
            <?php if ($pageclass != 'contact' && $this->countModules('newsletter', true)) { ?>
                <section class="uk-position-relative newsletter <?php if ($this->countModules('reserve', true)) echo 'accent'; ?>">
                    <div class="uk-container">
                        <div>
                            <div class="uk-background-secondary uk-box-shadow-large uk-border-rounded uk-padding uk-position-relative">
                                <jdoc:include type="modules" name="newsletter" style="none" />
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
            <div class="uk-padding-large uk-padding-remove-horizontal modules uk-position-relative">
                <div class="uk-container">
                    <div class="uk-position-relative particles">
                        <span class="particle circle red"></span>
                        <span class="particle circle blue"></span>
                        <span class="particle circle green"></span>
                        <span class="particle triangle yellow"></span>
                        <div class="uk-grid-large uk-child-width-1-5 uk-flex-between" data-uk-grid>
                            <div class="uk-width-1-1 uk-width-1-4@s">
                                <h5 class=" uk-text-center uk-text-right@s"><?php echo JText::_('FULL_TITLE'); ?></h5>
                                <p class="font text uk-text-small uk-text-center uk-text-right@s"><?php echo JText::_('FOOTER_TEXT'); ?></p>
                                <ul class="uk-grid-small uk-child-width-auto uk-flex-center uk-flex-right@m socials" data-uk-grid>
                                    <?php foreach ($params->get('socials') as $item) : ?>
                                        <?php if ($item->icon != '') { ?>
                                            <li><a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>" data-uk-tooltip class="uk-flex uk-flex-center uk-flex-middle" target="_blank" id="<?php echo $item->title; ?>"><i class="fab fa-<?php echo $item->icon; ?>"></i></a></li>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="uk-width-1-1 uk-width-1-3@s contact uk-visible@s">
                                <h5><?php echo JText::_('CALL_US'); ?></h5>
                                <ul class="uk-grid-small" data-uk-grid>
                                    <li class="uk-text-small uk-flex uk-flex-middle uk-width-1-1"><i class="fal fa-map-signs fa-fw fa-lg uk-margin-left uk-text-secondary"></i><a href="#" class="uk-text-white font f500"><?php echo $params->get('address'); ?></a></li>
                                    <li class="uk-text-small uk-flex uk-flex-middle uk-width-1-2 uk-width-1-1@m"><i class="fal fa-phone fa-flip-horizontal fa-fw fa-lg uk-margin-left uk-text-secondary"></i><a href="tel:<?php echo $params->get('phone'); ?>" class="uk-text-white font f500 ltr"><?php echo $params->get('phone'); ?></a></li>
                                    <li class="uk-text-small uk-flex uk-flex-middle uk-width-1-2 uk-width-1-1@m"><i class="fal fa-fax fa-flip-horizontal fa-fw fa-lg uk-margin-left uk-text-secondary"></i><a href="<?php echo $params->get('fax'); ?>" class="uk-text-white font f500 ltr"><?php echo $params->get('fax'); ?></a></li>
                                    <li class="uk-text-small uk-flex uk-flex-middle uk-width-1-2 uk-width-1-1@m"><i class="fal fa-envelope-open-text fa-fw fa-lg uk-margin-left uk-text-secondary"></i><a href="mailto:<?php echo $params->get('email'); ?>" class="uk-text-white font f500 ltr"><?php echo $params->get('email'); ?></a></li>
                                </ul>
                            </div>
                            <jdoc:include type="modules" name="footer" style="html5" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-padding-small uk-padding-remove-horizontal copyright">
                <div class="uk-container">
                    <div class="uk-grid-row-small uk-grid-column-medium uk-text-center uk-text-right@s" data-uk-grid>
                        <div class="uk-width-1-1 uk-width-expand@m">
                            <p class="uk-margin-remove uk-text-tiny uk-text-white font"><?php echo JText::sprintf('COPYRIGHT', $sitename); ?></p>
                        </div>
                        <div class="uk-width-1-1 uk-width-auto@m">
                            <p class="uk-margin-remove uk-text-tiny uk-text-white font"><?php echo JText::sprintf('DEVELOPER', $netparsi); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div id="hamMenu" data-uk-offcanvas="overlay: true">
            <div class="uk-offcanvas-bar uk-card uk-card-default uk-padding-remove bgWhite">
                <div class="uk-flex uk-flex-column uk-height-1-1">
                    <div class="uk-width-expand">
                        <div class="offcanvasTop uk-box-shadow-small uk-position-relative uk-flex-stretch">
                            <div class="uk-grid-collapse uk-height-1-1" data-uk-grid>
                                <div class="uk-flex uk-width-1-4 uk-flex uk-flex-center uk-flex-middle"><a onclick="UIkit.offcanvas('#hamMenu').hide();" class="uk-flex uk-flex-center uk-flex-middle uk-height-1-1 uk-width-1-1 uk-margin-remove uk-text-black"><i class="far fa-chevron-<?php echo $this->direction == 'rtl' ? 'right' : 'left'; ?>"></i></a></div>
                                <div class="logo uk-flex uk-flex-center uk-flex-column uk-width-expand">
                                    <span class="f700 font uk-display-block uk-text-black"><?php echo $sitename; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="uk-padding-small"><jdoc:include type="modules" name="offcanvas" style="xhtml" /></div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>