<?php
namespace XoopsModules\Trombinoscope;
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * trombinoscope - Slides management module for xoops
 *
 * @copyright      2020 XOOPS Project (https://xooops.org)
 * @license        GPL 2.0 or later
 * @package        trombinoscope
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         JJDai - Email:<jjdelalandre@orange.fr> - Website:<https://kiolo.fr>
 */
use XoopsModules\Trombinoscope;
use XoopsModules\Trombinoscope\Helper;
use XoopsModules\Trombinoscope\Constants;

require __DIR__ . '/header.php';
$templateMain = 'trombinoscope_admin_about.tpl';

$TrombinoscopeHelper = \XoopsModules\Trombinoscope\Helper::getInstance();

$clAbout = new \About($TrombinoscopeHelper,
                      'MUUZPTPGJSB9G',
                      "https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif",
                      "https://www.paypal.com/en_FR/i/scr/pixel.gif");


/************************************************************************/
$adminObject->displayNavigation('about.php');
$GLOBALS['xoopsTpl']->assign('box', $clAbout->getBox());
$GLOBALS['xoopsTpl']->assign('tplAbout', XOOPS_ROOT_PATH . "/Frameworks/janus/templates/admin_about.tpl");

require __DIR__ . '/footer.php';

