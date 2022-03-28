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
use XoopsModules\Trombinoscope\Common;

require __DIR__ . '/header.php';
// Get all request values
$op = Request::getCmd('op', 'list');
$mbrId = Request::getInt('mbr_id');
$start = Request::getInt('start', 0);
$limit = Request::getInt('limit', $helper->getConfig('adminpager'));
$GLOBALS['xoopsTpl']->assign('start', $start);
$GLOBALS['xoopsTpl']->assign('limit', $limit);

//  $gp = array_merge($_GET, $_POST);
//  echo "<hr>_GET/_POST<pre>" . print_r($gp, true) . "</pre><hr>";

//----------------------------------------------------

switch ($op) {
    case 'list':
    default:
        // Define Stylesheet
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        $templateMain = 'trombinoscope_admin_members.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('members.php'));
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_ADD_MEMBER, 'members.php?op=new', 'add');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        $membersCount = $membersHandler->getCountMembers();
        $membersAll = $membersHandler->getAllMembers($start, $limit, 'mbr_firstname,mbr_lastname,mbr_id');
        $GLOBALS['xoopsTpl']->assign('members_count', $membersCount);
        $GLOBALS['xoopsTpl']->assign('trombinoscope_url', \TROMBINOSCOPE_URL);
        $GLOBALS['xoopsTpl']->assign('trombinoscope_upload_url', \TROMBINOSCOPE_UPLOAD_URL);
        // Table view members
        if ($membersCount > 0) {
            foreach (\array_keys($membersAll) as $i) {
                $member = $membersAll[$i]->getValuesMembers();
                $GLOBALS['xoopsTpl']->append('members_list', $member);
                unset($member);
            }
            // Display Navigation
            if ($membersCount > $limit) {
                require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($membersCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }
        } else {
            $GLOBALS['xoopsTpl']->assign('error', _AM_TROMBINOSCOPE_THEREARENT_MEMBERS);
        }
        break;
    case 'new':
        $templateMain = 'trombinoscope_admin_members.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('members.php'));
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_LIST_MEMBERS, 'members.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form Create
        $membersObj = $membersHandler->create();
        $form = $membersObj->getFormMembers();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'clone':
        $templateMain = 'trombinoscope_admin_members.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('members.php'));
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_LIST_MEMBERS, 'members.php', 'list');
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_ADD_MEMBER, 'members.php?op=new', 'add');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Request source
        $mbrIdSource = Request::getInt('mbr_id_source');
        // Get Form
        $membersObjSource = $membersHandler->get($mbrIdSource);
        $membersObj = $membersObjSource->xoopsClone();
        $form = $membersObj->getFormMembers();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
        
    case 'save':
        $office="backoffice";
        include_once("members_save.php");
        break;
        
    case 'edit':
        $templateMain = 'trombinoscope_admin_members.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('members.php'));
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_ADD_MEMBER, 'members.php?op=new', 'add');
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_LIST_MEMBERS, 'members.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Get Form
        $membersObj = $membersHandler->get($mbrId);
        $membersObj->start = $start;
        $membersObj->limit = $limit;
        $form = $membersObj->getFormMembers();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
        
    case 'delete':
        $templateMain = 'trombinoscope_admin_members.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('members.php'));
        $membersObj = $membersHandler->get($mbrId);
        $mbrUid = $membersObj->getVar('mbr_uid');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('members.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($membersHandler->delete($membersObj)) {
                \redirect_header('members.php', 3, _CO_TROMBINOSCOPE_FORM_DELETE_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $membersObj->getHtmlErrors());
            }
        } else {
            $xoopsconfirm = new Common\XoopsConfirm(
                ['ok' => 1, 'mbr_id' => $mbrId, 'start' => $start, 'limit' => $limit, 'op' => 'delete'],
                $_SERVER['REQUEST_URI'],
                \sprintf(_AM_TROMBINOSCOPE_FORM_SURE_DELETE, $membersObj->getVar('mbr_uid')));
            $form = $xoopsconfirm->getFormXoopsConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        
	case 'change_etat':
        $field = Request::getString('field','mbr_actif');
        $membersHandler->changeEtat($mbrId, $field);
        redirect_header("members.php?op=list&cat_id={$catId}", 5, "Etat de {$field} Changé");
	break;
        
        break;
}
require __DIR__ . '/footer.php';
