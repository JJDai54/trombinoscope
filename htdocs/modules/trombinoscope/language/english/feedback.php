<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * feedback plugin for xoops modules
 *
 * @copyright      module for xoops
 * @license        GPL 2.0 or later
 * @package        general
 * @since          1.0
 * @min_xoops      2.5.11
 * @author         XOOPS - Website:<https://xoops.org>
 */
$moduleDirName      = \basename(\dirname(__DIR__, 2));
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);

\define('CO_TROMBINOSCOPE_' . 'FB_FORM_TITLE', 'Send a feedback');
\define('CO_TROMBINOSCOPE_' . 'FB_RECIPIENT', 'Recipient');
\define('CO_TROMBINOSCOPE_' . 'FB_NAME', 'Name');
\define('CO_TROMBINOSCOPE_' . 'FB_NAME_PLACEHOLER', 'Please enter your name');
\define('CO_TROMBINOSCOPE_' . 'FB_SITE', 'Website');
\define('CO_TROMBINOSCOPE_' . 'FB_SITE_PLACEHOLER', 'Please enter your website');
\define('CO_TROMBINOSCOPE_' . 'FB_MAIL', 'Email');
\define('CO_TROMBINOSCOPE_' . 'FB_MAIL_PLACEHOLER', 'Please enter your email');
\define('CO_TROMBINOSCOPE_' . 'FB_TYPE', 'Type of feedback');
\define('CO_TROMBINOSCOPE_' . 'FB_TYPE_SUGGESTION', 'Suggestions');
\define('CO_TROMBINOSCOPE_' . 'FB_TYPE_BUGS', 'Bugs');
\define('CO_TROMBINOSCOPE_' . 'FB_TYPE_TESTIMONIAL', 'Testimonials');
\define('CO_TROMBINOSCOPE_' . 'FB_TYPE_FEATURES', 'Features');
\define('CO_TROMBINOSCOPE_' . 'FB_TYPE_OTHERS', 'Misc');
\define('CO_TROMBINOSCOPE_' . 'FB_TYPE_CONTENT', 'Feedback content');
\define('CO_TROMBINOSCOPE_' . 'FB_SEND_FOR', 'Feedback for module ');
\define('CO_TROMBINOSCOPE_' . 'FB_SEND_SUCCESS', 'Feedback successfully sent');
\define('CO_TROMBINOSCOPE_' . 'FB_SEND_ERROR', 'An errror occured when feedback was sent!');
