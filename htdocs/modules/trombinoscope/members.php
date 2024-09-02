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
 * @author         JJDai - Email:<jjdelalandre@orange.fr> - Website:<https://kiolo.fr>
 */

use Xmf\Request;
use XoopsModules\Trombinoscope;
use XoopsModules\Trombinoscope\Constants;
use XoopsModules\Trombinoscope\Common;

require __DIR__ . '/header.php';
$GLOBALS['xoopsOption']['template_main'] = 'trombinoscope_members.tpl';
require_once \XOOPS_ROOT_PATH . '/header.php';

$op    = Request::getCmd('op', 'list');
$mbrId = Request::getInt('mbr_id', 0);
$catId = Request::getInt('cat_id', 0);
$qualityId = Request::getInt('quality_id', 0);
$actif = Request::getInt('mbr_actif',1);
$start = Request::getInt('start', 0);
$limit = Request::getInt('limit', $helper->getConfig('userpager'));
$GLOBALS['xoopsTpl']->assign('start', $start);
$GLOBALS['xoopsTpl']->assign('limit', $limit);

// Define Stylesheet
$GLOBALS['xoTheme']->addStylesheet($style, null);
// Paths
$GLOBALS['xoopsTpl']->assign('xoops_icons32_url', \XOOPS_ICONS32_URL);
$GLOBALS['xoopsTpl']->assign('trombinoscope_url', \TROMBINOSCOPE_URL);
// Keywords
$keywords = [];
// Breadcrumbs
$xoBreadcrumbs[] = ['title' => \_MA_TROMBINOSCOPE_INDEX, 'link' => 'index.php'];
// Permissions
$GLOBALS['xoopsTpl']->assign('showItem', $mbrId > 0);
// $gp = array_merge($_GET, $_POST);
// echo "<hr>_GET/_POST<pre>" . print_r($gp, true) . "</pre><hr>";
$office = 1;

switch ($op) {
    case 'show':
    case 'list':
    default:
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_CO_TROMBINOSCOPE_MEMBERS_LIST];
        include_once 'admin/members_list.php';
        break;

    case 'save':
        $office="frontoffice";
        include_once("admin/members_save.php");
        break;

    case 'new':
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_MA_TROMBINOSCOPE_MEMBER_ADD];
        // Form Create
        include_once("admin/members_new.php");
        break;
    case 'edit':
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_MA_TROMBINOSCOPE_MEMBER_EDIT];
        // Check params
        if (0 == $mbrId) {
            \redirect_header('members.php?op=list', 3, \_MA_TROMBINOSCOPE_INVALID_PARAM);
        }
        include_once("admin/members_edit.php");
        break;

    case 'clone':
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_MA_TROMBINOSCOPE_MEMBER_CLONE];
        // Request source
        $mbrIdSource = Request::getInt('mbr_id_source');
        // Check params
        if (0 == $mbrIdSource) {
            \redirect_header('members.php?op=list', 3, \_MA_TROMBINOSCOPE_INVALID_PARAM);
        }
        // Get Form
        $membersObjSource = $membersHandler->get($mbrIdSource);
        $membersObj = $membersObjSource->xoopsClone();
        $form = $membersObj->getFormMembers();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'delete':
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_MA_TROMBINOSCOPE_MEMBER_DELETE];
        // Check params
        if (0 == $mbrId) {
            \redirect_header('members.php?op=list', 3, \_MA_TROMBINOSCOPE_INVALID_PARAM);
        }
        $membersObj = $membersHandler->get($mbrId);
        $mbrUid = $membersObj->getVar('mbr_uid');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('members.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($membersHandler->delete($membersObj)) {
                \redirect_header('members.php', 3, \_MA_TROMBINOSCOPE_FORM_DELETE_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $membersObj->getHtmlErrors());
            }
        } else {
            $xoopsconfirm = new XoopsConfirm(
                ['ok' => 1, 'mbr_id' => $mbrId, 'start' => $start, 'limit' => $limit, 'op' => 'delete'],
                $_SERVER['REQUEST_URI'],
                \sprintf(\_MA_TROMBINOSCOPE_FORM_SURE_DELETE, $membersObj->getVar('mbr_uid')));
            $form = $xoopsconfirm->getFormXoopsConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;
        
	case 'change_etat':
        $field = Request::getString('field','mbr_actif');
        $membersHandler->changeEtat($mbrId, $field);
        \redirect_header('members.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
        break;
}

// Keywords
trombinoscopeMetaKeywords($helper->getConfig('keywords') . ', ' . \implode(',', $keywords));
unset($keywords);

// Description
trombinoscopeMetaDescription(\_MA_TROMBINOSCOPE_MEMBERS_DESC);
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', \TROMBINOSCOPE_URL.'/members.php');
$GLOBALS['xoopsTpl']->assign('trombinoscope_upload_url', \TROMBINOSCOPE_UPLOAD_URL);

require __DIR__ . '/footer.php';
