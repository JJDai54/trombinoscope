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
// Get all request values
$op = Request::getCmd('op', 'list');
$mbrId = Request::getInt('mbr_id');
$catId = Request::getInt('cat_id',0);
$qualityId = Request::getInt('quality_id',0);
$actif = Request::getInt('mbr_actif',0);
$start = Request::getInt('start', 0);
$limit = Request::getInt('limit', $helper->getConfig('adminpager'));
$GLOBALS['xoopsTpl']->assign('start', $start);
$GLOBALS['xoopsTpl']->assign('limit', $limit);

//  $gp = array_merge($_GET, $_POST);
//  echo "<hr>_GET/_POST<pre>" . print_r($gp, true) . "</pre><hr>";

//----------------------------------------------------
$office = 0;

switch ($op) {
    case 'list':
    default:
        // Define Stylesheet
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        $templateMain = 'trombinoscope_admin_members.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('members.php'));
        $adminObject->addItemButton(_CO_TROMBINOSCOPE_MEMBER_ADD, 'members.php?op=new', 'add');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
    
        $templateMain = 'trombinoscope_admin_members.tpl';
        include_once 'members_list.php';
        break;
        
        
    case 'new':
        $templateMain = 'trombinoscope_admin_members.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('members.php'));
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_MEMBERS_LIST, 'members.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form Create
        include_once 'members_new.php';
        break;
        
    case 'clone':
        $templateMain = 'trombinoscope_admin_members.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('members.php'));
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_MEMBERS_LIST, 'members.php', 'list');
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_MEMBER_ADD, 'members.php?op=new', 'add');
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
        include_once 'members_edit.php';
        break;
        
    case 'delete':
        $templateMain = 'trombinoscope_admin_members.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('members.php'));
        $membersObj = $membersHandler->get($mbrId);
        //$mbrUid = $membersObj->getVar('mbr_uid');
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
            $xoopsconfirm = new XoopsConfirm(
                ['ok' => 1, 'mbr_id' => $mbrId, 'start' => $start, 'limit' => $limit, 'op' => 'delete'],
                $_SERVER['REQUEST_URI'],
                \sprintf(_AM_TROMBINOSCOPE_FORM_SURE_DELETE_MEMBER, $membersObj->getVar('mbr_firstname'),$membersObj->getVar('mbr_lastname'),$mbrId));
            $form = $xoopsconfirm->getFormXoopsConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
	break;
        
	case 'change_etat':
        $field = Request::getString('field','mbr_actif');
        $membersHandler->changeEtat($mbrId, $field);
        redirect_header("members.php?op=list&cat_id={$catId}", 5, "Etat de {$field} Changé");
	break;
        
        break;
}
require __DIR__ . '/footer.php';
