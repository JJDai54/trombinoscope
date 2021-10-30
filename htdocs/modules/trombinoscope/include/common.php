<?php

//declare(strict_types=1);

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * Trombinoscope module for xoops
 *
 * @copyright      2021 XOOPS Project (https://xoops.org)
 * @license        GPL 2.0 or later
 * @package        trombinoscope
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         JJDai - Email:<jjdelalandre@orange.fr> - Website:<http://jubile.fr>
 */
if (!\defined('XOOPS_ICONS32_PATH')) {
    \define('XOOPS_ICONS32_PATH', \XOOPS_ROOT_PATH . '/Frameworks/moduleclasses/icons/32');
}
if (!\defined('XOOPS_ICONS32_URL')) {
    \define('XOOPS_ICONS32_URL', \XOOPS_URL . '/Frameworks/moduleclasses/icons/32');
}

\define('TROMBINOSCOPE_SHOW_TPL_NAME', false);


\define('TROMBINOSCOPE_DIRNAME', 'trombinoscope');
\define('TROMBINOSCOPE_PATH', \XOOPS_ROOT_PATH . '/modules/' . \TROMBINOSCOPE_DIRNAME);
\define('TROMBINOSCOPE_URL', \XOOPS_URL . '/modules/' . \TROMBINOSCOPE_DIRNAME);
\define('TROMBINOSCOPE_ICONS_PATH', \TROMBINOSCOPE_PATH . '/assets/icons');
\define('TROMBINOSCOPE_ICONS_URL', \TROMBINOSCOPE_URL . '/assets/icons');
\define('TROMBINOSCOPE_IMAGE_PATH', \TROMBINOSCOPE_PATH . '/assets/images');
\define('TROMBINOSCOPE_IMAGE_URL', \TROMBINOSCOPE_URL . '/assets/images');
\define('TROMBINOSCOPE_UPLOAD_PATH', \XOOPS_UPLOAD_PATH . '/' . \TROMBINOSCOPE_DIRNAME);
\define('TROMBINOSCOPE_UPLOAD_URL', \XOOPS_UPLOAD_URL . '/' . \TROMBINOSCOPE_DIRNAME);
\define('TROMBINOSCOPE_UPLOAD_FILES_PATH', \TROMBINOSCOPE_UPLOAD_PATH . '/files');
\define('TROMBINOSCOPE_UPLOAD_FILES_URL', \TROMBINOSCOPE_UPLOAD_URL . '/files');
\define('TROMBINOSCOPE_UPLOAD_IMAGE_PATH', \TROMBINOSCOPE_UPLOAD_PATH . '/images');
\define('TROMBINOSCOPE_UPLOAD_IMAGE_URL', \TROMBINOSCOPE_UPLOAD_URL . '/images');
\define('TROMBINOSCOPE_UPLOAD_SHOTS_PATH', \TROMBINOSCOPE_UPLOAD_PATH . '/images/shots');
\define('TROMBINOSCOPE_UPLOAD_SHOTS_URL', \TROMBINOSCOPE_UPLOAD_URL . '/images/shots');
\define('TROMBINOSCOPE_ADMIN', \TROMBINOSCOPE_URL . '/admin/index.php');
$localLogo = \TROMBINOSCOPE_IMAGE_URL . '/jjdai_logo.png';
// Module Information
$copyright = "<a href='http://jubile.fr' title='Jubile' target='_blank'><img src='" . $localLogo . "' alt='Jubile' ></a>";
require_once \XOOPS_ROOT_PATH . '/class/xoopsrequest.php';
require_once \TROMBINOSCOPE_PATH . '/include/functions.php';
