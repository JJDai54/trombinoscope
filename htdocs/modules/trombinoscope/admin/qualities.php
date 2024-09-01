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
$qualityId = Request::getInt('quality_id');
$start = Request::getInt('start', 0);
$limit = Request::getInt('limit', $helper->getConfig('adminpager'));
$GLOBALS['xoopsTpl']->assign('start', $start);
$GLOBALS['xoopsTpl']->assign('limit', $limit);
//echoArray('gp');

switch ($op) {
    case 'list':
    default:
        // Define Stylesheet
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        $templateMain = 'trombinoscope_admin_qualities.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('qualities.php'));
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_ADD_QUALITY, 'qualities.php?op=new', 'add');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        $qualitiesCount = $qualitiesHandler->getCountQualities();
        $qualitiesAll = $qualitiesHandler->getAllQualities($start, $limit);
        $GLOBALS['xoopsTpl']->assign('qualities_count', $qualitiesCount);
        $GLOBALS['xoopsTpl']->assign('trombinoscope_url', \TROMBINOSCOPE_URL);
        $GLOBALS['xoopsTpl']->assign('trombinoscope_upload_url', \TROMBINOSCOPE_UPLOAD_URL);
        // Table view qualities
        if ($qualitiesCount > 0) {
            foreach (\array_keys($qualitiesAll) as $i) {
                $quality = $qualitiesAll[$i]->getValuesQualities();
                $GLOBALS['xoopsTpl']->append('qualities_list', $quality);
                unset($quality);
            }
            // Display Navigation
            if ($qualitiesCount > $limit) {
                require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($qualitiesCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }
        } else {
            $GLOBALS['xoopsTpl']->assign('error', _AM_TROMBINOSCOPE_THEREARENT_QUALITIES);
        }
        break;
    case 'new':
        $templateMain = 'trombinoscope_admin_qualities.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('qualities.php'));
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_LIST_QUALITIES, 'qualities.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form Create
        $qualitiesObj = $qualitiesHandler->create();
        $form = $qualitiesObj->getFormQualities();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
        
    case 'clone':
        $templateMain = 'trombinoscope_admin_qualities.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('qualities.php'));
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_LIST_QUALITIES, 'qualities.php', 'list');
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_ADD_QUALITY, 'qualities.php?op=new', 'add');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Request source
        $qualityIdSource = Request::getInt('quality_id_source');
        // Get Form
        $qualitiesObjSource = $qualitiesHandler->get($qualityIdSource);
        $qualitiesObj = $qualitiesObjSource->xoopsClone();
        $form = $qualitiesObj->getFormQualities();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'save':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('qualities.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if ($qualityId > 0) {
            $qualitiesObj = $qualitiesHandler->get($qualityId);
        } else {
            $qualitiesObj = $qualitiesHandler->create();
        }
        // Set Vars
        $qualitiesObj->setVar('quality_name', Request::getString('quality_name', ''));
        $qualitiesObj->setVar('quality_weight', Request::getInt('quality_weight', 0));
        // Insert Data
        if ($qualitiesHandler->insert($qualitiesObj)) {
                \redirect_header('qualities.php?op=list&amp;start=' . $start . '&amp;limit=' . $limit, 2, _AM_TROMBINOSCOPE_FORM_OK);
        }
        // Get Form
        $GLOBALS['xoopsTpl']->assign('error', $qualitiesObj->getHtmlErrors());
        $form = $qualitiesObj->getFormQualities();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
        
    case 'edit':
        $templateMain = 'trombinoscope_admin_qualities.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('qualities.php'));
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_ADD_QUALITY, 'qualities.php?op=new', 'add');
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_LIST_QUALITIES, 'qualities.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Get Form
        $qualitiesObj = $qualitiesHandler->get($qualityId);
        $qualitiesObj->start = $start;
        $qualitiesObj->limit = $limit;
        $form = $qualitiesObj->getFormQualities();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'delete':
        $templateMain = 'trombinoscope_admin_qualities.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('qualities.php'));
        $qualitiesObj = $qualitiesHandler->get($qualityId);
        $qualityName = $qualitiesObj->getVar('quality_name');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('qualities.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($qualitiesHandler->delete($qualitiesObj)) {
                \redirect_header('qualities.php', 3, _CO_TROMBINOSCOPE_FORM_DELETE_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $qualitiesObj->getHtmlErrors());
            }
        } else {
            $xoopsconfirm = new XoopsConfirm(
                ['ok' => 1, 'quality_id' => $qualityId, 'start' => $start, 'limit' => $limit, 'op' => 'delete'],
                $_SERVER['REQUEST_URI'],
                \sprintf(_AM_TROMBINOSCOPE_FORM_SURE_DELETE, $qualitiesObj->getVar('quality_name')));
            $form = $xoopsconfirm->getFormXoopsConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;

    case 'weight':
        $action = Request::getString('sens', "down") ;
        $qualitiesHandler->updateWeight($qualityId, $action);
        //$questionsHandler->incrementeWeight($qualityId);
        $url = "qualities.php?op=list&quality_id={$qualityId}";            // ."#question-{$qualityId}";
        //echo "<hr>{$url}<hr>";exit;
        \redirect_header($url, 0, "");
        break;


	case 'set_default':
        $field = Request::getString('field','');
        $value = Request::getInt('value', 1);
        $qualitiesHandler->setDefault($qualityId, $field, $value);
        redirect_header("qualities.php?op=list", 5, "Etat de {$field} Changé");
	break;
        
}
require __DIR__ . '/footer.php';
