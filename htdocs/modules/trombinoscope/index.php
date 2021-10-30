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

use Xmf\Request;
use XoopsModules\Trombinoscope;
use XoopsModules\Trombinoscope\Constants;

require __DIR__ . '/header.php';
$GLOBALS['xoopsOption']['template_main'] = 'trombinoscope_index.tpl';
require_once \XOOPS_ROOT_PATH . '/header.php';
// Define Stylesheet
$GLOBALS['xoTheme']->addStylesheet($style, null);
// Keywords
$keywords = [];
// Breadcrumbs
$xoBreadcrumbs[] = ['title' => \_MA_TROMBINOSCOPE_INDEX];
// Paths
$GLOBALS['xoopsTpl']->assign('xoops_icons32_url', \XOOPS_ICONS32_URL);
$GLOBALS['xoopsTpl']->assign('trombinoscope_url', \TROMBINOSCOPE_URL);
$categoriesCount = $categoriesHandler->getCountCategories();
// If there are  categories
$count = 1;
if ($categoriesCount > 0) {
    $categoriesAll = $categoriesHandler->getAllCategories(0);
    require_once XOOPS_ROOT_PATH . '/class/tree.php';
        $categories = [];
    foreach (\array_keys($categoriesAll) as $cat) {
        $categoryValues = $categoriesAll[$cat]->getValuesCategories();
        $acount = ['count', $count];
        $categories[] = \array_merge($categoryValues, $acount);
        ++$count;
    }
    $GLOBALS['xoopsTpl']->assign('categories', $categories);
    unset($categories);
    $GLOBALS['xoopsTpl']->assign('numb_col', $helper->getConfig('numb_col'));
}
unset($count);
// Tables
$membersCount = $membersHandler->getCountMembers();
$GLOBALS['xoopsTpl']->assign('membersCount', $membersCount);
$count = 1;
if ($membersCount > 0) {
    $start = Request::getInt('start', 0);
    $limit = Request::getInt('limit', $helper->getConfig('userpager'));
    $membersAll = $membersHandler->getAllMembers($start, $limit);
    // Get All Members
    $members = [];
    foreach (\array_keys($membersAll) as $i) {
        $member = $membersAll[$i]->getValuesMembers();
        $acount = ['count', $count];
        $members[] = \array_merge($member, $acount);
        $keywords[] = $membersAll[$i]->getVar('evt_field');
        ++$count;
    }
    $GLOBALS['xoopsTpl']->assign('members', $members);
    unset($members);
    // Display Navigation
    if ($membersCount > $limit) {
        require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
        $pagenav = new \XoopsPageNav($membersCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
        $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
    }
    $GLOBALS['xoopsTpl']->assign('lang_thereare', \sprintf(\_MA_TROMBINOSCOPE_INDEX_THEREARE, $membersCount));
    $GLOBALS['xoopsTpl']->assign('divideby', $helper->getConfig('divideby'));
    $GLOBALS['xoopsTpl']->assign('numb_col', $helper->getConfig('numb_col'));
}
unset($count);
$GLOBALS['xoopsTpl']->assign('table_type', $helper->getConfig('table_type'));
// Tables
// Keywords
trombinoscopeMetaKeywords($helper->getConfig('keywords') . ', ' . \implode(',', $keywords));
unset($keywords);
// Description
trombinoscopeMetaDescription(\_MA_TROMBINOSCOPE_INDEX_DESC);
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', \TROMBINOSCOPE_URL.'/index.php');
$GLOBALS['xoopsTpl']->assign('xoops_icons32_url', \XOOPS_ICONS32_URL);
$GLOBALS['xoopsTpl']->assign('trombinoscope_upload_url', \TROMBINOSCOPE_UPLOAD_URL);
require __DIR__ . '/footer.php';
