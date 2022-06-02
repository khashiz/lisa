CREATE TABLE IF NOT EXISTS `#__rsform_forms` (
  `FormId` int(11) NOT NULL auto_increment,
  `FormName` text NOT NULL,
  `FormLayout` longtext NOT NULL,
  `GridLayout` mediumtext NOT NULL,
  `FormLayoutName` text NOT NULL,
  `LoadFormLayoutFramework` tinyint(1) NOT NULL default '1',
  `FormLayoutAutogenerate` tinyint(1) NOT NULL default '1',
  `FormLayoutFlow` tinyint(1) NOT NULL default '0',
  `DisableSubmitButton` tinyint(1) NOT NULL default '0',
  `RemoveCaptchaLogged` tinyint(1) NOT NULL default '0',
  `CSS` mediumtext NOT NULL,
  `JS` mediumtext NOT NULL,
  `FormTitle` text NOT NULL,
  `ShowFormTitle` tinyint(1) NOT NULL default '1',
  `Published` tinyint(1) NOT NULL default '1',
  `Lang` varchar(255) NOT NULL default '',
  `ReturnUrl` text NOT NULL,
  `ShowSystemMessage` tinyint(1) NOT NULL default '1',
  `ShowThankyou` tinyint(1) NOT NULL default '1',
  `ScrollToThankYou` tinyint(1) NOT NULL default '0',
  `ThankYouMessagePopUp` tinyint(1) NOT NULL default '0',
  `Thankyou` mediumtext NOT NULL,
  `ShowContinue` tinyint(1) NOT NULL default '1',
  `UserEmailText` mediumtext NOT NULL,
  `UserEmailTo` text NOT NULL,
  `UserEmailCC` varchar(255) NOT NULL,
  `UserEmailBCC` varchar(255) NOT NULL,
  `UserEmailFrom` varchar(255) NOT NULL default '',
  `UserEmailReplyTo` varchar(255) NOT NULL,
  `UserEmailReplyToName` varchar(255) NOT NULL,
  `UserEmailFromName` varchar(255) NOT NULL default '',
  `UserEmailSubject` varchar(255) NOT NULL default '',
  `UserEmailMode` tinyint(1) NOT NULL default '1',
  `UserEmailAttach` tinyint(1) NOT NULL,
  `UserEmailAttachFile` varchar(255) NOT NULL,
  `UserEmailGenerate` tinyint(1) NOT NULL default '0',
  `AdminEmailText` mediumtext NOT NULL,
  `AdminEmailTo` text NOT NULL,
  `AdminEmailCC` varchar(255) NOT NULL,
  `AdminEmailBCC` varchar(255) NOT NULL,
  `AdminEmailFrom` varchar(255) NOT NULL default '',
  `AdminEmailReplyTo` varchar(255) NOT NULL,
  `AdminEmailReplyToName` varchar(255) NOT NULL,
  `AdminEmailFromName` varchar(255) NOT NULL default '',
  `AdminEmailSubject` varchar(255) NOT NULL default '',
  `AdminEmailMode` tinyint(1) NOT NULL default '1',
  `AdminEmailGenerate` tinyint(1) NOT NULL default '0',
  `DeletionEmailText` mediumtext NOT NULL,
  `DeletionEmailTo` text NOT NULL,
  `DeletionEmailCC` varchar(255) NOT NULL,
  `DeletionEmailBCC` varchar(255) NOT NULL,
  `DeletionEmailFrom` varchar(255) NOT NULL default '',
  `DeletionEmailReplyTo` varchar(255) NOT NULL,
  `DeletionEmailReplyToName` varchar(255) NOT NULL,
  `DeletionEmailFromName` varchar(255) NOT NULL default '',
  `DeletionEmailSubject` varchar(255) NOT NULL default '',
  `DeletionEmailMode` tinyint(1) NOT NULL default '1',
  `ScriptProcess` mediumtext NOT NULL,
  `ScriptProcess2` mediumtext NOT NULL,
  `ScriptBeforeDisplay` mediumtext NOT NULL,
  `ScriptBeforeValidation` mediumtext NOT NULL,
  `ScriptDisplay` mediumtext NOT NULL,
  `UserEmailScript` mediumtext NOT NULL,
  `AdminEmailScript` mediumtext NOT NULL,
  `AdditionalEmailsScript` mediumtext NOT NULL,
  `MetaTitle` tinyint(1) NOT NULL,
  `MetaDesc` text NOT NULL,
  `MetaKeywords` text NOT NULL,
  `Required` varchar(255) NOT NULL default '(*)',
  `ErrorMessage` text NOT NULL,
  `MultipleSeparator` varchar(64) NOT NULL default '\\n',
  `TextareaNewLines` tinyint(1) NOT NULL default '1',
  `CSSClass` varchar(255) NOT NULL,
  `CSSId` varchar(255) NOT NULL default 'userForm',
  `CSSName` varchar(255) NOT NULL,
  `CSSAction` text NOT NULL,
  `CSSAdditionalAttributes` text NOT NULL,
  `AjaxValidation` tinyint(1) NOT NULL,
  `ScrollToError` tinyint(1) NOT NULL,
  `Keepdata` tinyint(1) NOT NULL default '1',
  `KeepIP` tinyint(1) NOT NULL default '1',
  `DeleteSubmissionsAfter` int(11) NOT NULL default '0',
  `Backendmenu` tinyint(1) NOT NULL,
  `ConfirmSubmission` tinyint(1) NOT NULL DEFAULT '0',
  `ConfirmSubmissionUrl` text NOT NULL,
  `Access` varchar(5) NOT NULL,
  `LimitSubmissions` int(11) NOT NULL default '0',
  PRIMARY KEY  (`FormId`)
) DEFAULT CHARSET=utf8;