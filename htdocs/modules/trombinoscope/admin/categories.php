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
$catId = Request::getInt('cat_id');
$start = Request::getInt('start', 0);
$limit = Request::getInt('limit', $helper->getConfig('adminpager'));
$GLOBALS['xoopsTpl']->assign('start', $start);
$GLOBALS['xoopsTpl']->assign('limit', $limit);

switch ($op) {
    case 'list':
    default:
        // Define Stylesheet
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        $templateMain = 'trombinoscope_admin_categories.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('categories.php'));
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_ADD_CATEGORY, 'categories.php?op=new', 'add');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        $categoriesCount = $categoriesHandler->getCountCategories();
        $categoriesAll = $categoriesHandler->getAllCategories($start, $limit);
        $GLOBALS['xoopsTpl']->assign('categories_count', $categoriesCount);
        $GLOBALS['xoopsTpl']->assign('trombinoscope_url', \TROMBINOSCOPE_URL);
        $GLOBALS['xoopsTpl']->assign('trombinoscope_upload_url', \TROMBINOSCOPE_UPLOAD_URL);
        // Table view categories
        if ($categoriesCount > 0) {
            foreach (\array_keys($categoriesAll) as $i) {
                $category = $categoriesAll[$i]->getValuesCategories();
                $GLOBALS['xoopsTpl']->append('categories_list', $category);
                unset($category);
            }
            // Display Navigation
            if ($categoriesCount > $limit) {
                require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($categoriesCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }
        } else {
            $GLOBALS['xoopsTpl']->assign('error', _AM_TROMBINOSCOPE_THEREARENT_CATEGORIES);
        }
        break;
    case 'new':
        $templateMain = 'trombinoscope_admin_categories.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('categories.php'));
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_LIST_CATEGORIES, 'categories.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form Create
        $categoriesObj = $categoriesHandler->create();
        $form = $categoriesObj->getFormCategories();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
        
    case 'clone':
        $templateMain = 'trombinoscope_admin_categories.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('categories.php'));
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_LIST_CATEGORIES, 'categories.php', 'list');
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_ADD_CATEGORY, 'categories.php?op=new', 'add');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Request source
        $catIdSource = Request::getInt('cat_id_source');
        // Get Form
        $categoriesObjSource = $categoriesHandler->get($catIdSource);
        $categoriesObj = $categoriesObjSource->xoopsClone();
        $form = $categoriesObj->getFormCategories();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'save':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('categories.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if ($catId > 0) {
            $categoriesObj = $categoriesHandler->get($catId);
        } else {
            $categoriesObj = $categoriesHandler->create();
        }
        // Set Vars
        $categoriesObj->setVar('cat_parent_id', Request::getInt('cat_parent_id', 0));
        $categoriesObj->setVar('cat_name', Request::getString('cat_name', ''));
        $categoriesObj->setVar('cat_comments', Request::getString('cat_comments', ''));
        $categoriesObj->setVar('cat_weight', Request::getInt('cat_weight', 0));
        $categoriesObj->setVar('cat_theme', Request::getString('cat_theme', ''));
        $categoriesObj->setVar('cat_default', Request::getInt('cat_default', 0));
        // Insert Data
        if ($categoriesHandler->insert($categoriesObj)) {
                \redirect_header('categories.php?op=list&amp;start=' . $start . '&amp;limit=' . $limit, 2, _AM_TROMBINOSCOPE_FORM_OK);
        }
        // Get Form
        $GLOBALS['xoopsTpl']->assign('error', $categoriesObj->getHtmlErrors());
        $form = $categoriesObj->getFormCategories();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
        
    case 'edit':
        $templateMain = 'trombinoscope_admin_categories.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('categories.php'));
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_ADD_CATEGORY, 'categories.php?op=new', 'add');
        $adminObject->addItemButton(_AM_TROMBINOSCOPE_LIST_CATEGORIES, 'categories.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Get Form
        $categoriesObj = $categoriesHandler->get($catId);
        $categoriesObj->start = $start;
        $categoriesObj->limit = $limit;
        $form = $categoriesObj->getFormCategories();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'delete':
        $templateMain = 'trombinoscope_admin_categories.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('categories.php'));
        $categoriesObj = $categoriesHandler->get($catId);
        $catName = $categoriesObj->getVar('cat_name');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('categories.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($categoriesHandler->delete($categoriesObj)) {
                \redirect_header('categories.php', 3, _CO_TROMBINOSCOPE_FORM_DELETE_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $categoriesObj->getHtmlErrors());
            }
        } else {
            $xoopsconfirm = new Common\XoopsConfirm(
                ['ok' => 1, 'cat_id' => $catId, 'start' => $start, 'limit' => $limit, 'op' => 'delete'],
                $_SERVER['REQUEST_URI'],
                \sprintf(_AM_TROMBINOSCOPE_FORM_SURE_DELETE, $categoriesObj->getVar('cat_name')));
            $form = $xoopsconfirm->getFormXoopsConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;

    case 'weight':
        $action = Request::getString('sens', "down") ;
        $categoriesHandler->updateWeight($catId, $action);
        //$questionsHandler->incrementeWeight($catId);
        $url = "categories.php?op=list&cat_id={$catId}";            // ."#question-{$catId}";
        //echo "<hr>{$url}<hr>";exit;
        \redirect_header($url, 0, "");
        break;


	case 'set_default':
        $field = Request::getString('field','');
        $value = Request::getInt('value', 1);
        $categoriesHandler->setDefault($catId, $field, $value);
        redirect_header("categories.php?op=list", 5, "Etat de {$field} Changé");
	break;
        
}
require __DIR__ . '/footer.php';
