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
$GLOBALS['xoopsOption']['template_main'] = 'trombinoscope_categories.tpl';
require_once \XOOPS_ROOT_PATH . '/header.php';

$op    = Request::getCmd('op', 'list');
$catId = Request::getInt('cat_id', 0);
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
$GLOBALS['xoopsTpl']->assign('showItem', $catId > 0);

switch ($op) {
    case 'show':
    case 'list':
    default:
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_MA_TROMBINOSCOPE_CATEGORIES_LIST];
        $crCategories = new \CriteriaCompo();
        if ($catId > 0) {
            $crCategories->add(new \Criteria('cat_id', $catId));
        }
        $categoriesCount = $categoriesHandler->getCount($crCategories);
        $GLOBALS['xoopsTpl']->assign('categoriesCount', $categoriesCount);
        if (0 === $catId) {
            $crCategories->setStart($start);
            $crCategories->setLimit($limit);
        }
        $categoriesAll = $categoriesHandler->getAll($crCategories);
        if ($categoriesCount > 0) {
            $categories = [];
            $catName = '';
            // Get All Categories
            foreach (\array_keys($categoriesAll) as $i) {
                $categories[$i] = $categoriesAll[$i]->getValuesCategories();
                $catName = $categoriesAll[$i]->getVar('cat_name');
                $keywords[$i] = $catName;
            }
            $GLOBALS['xoopsTpl']->assign('categories', $categories);
            unset($categories);
            // Display Navigation
            if ($categoriesCount > $limit) {
                require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($categoriesCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }
            $GLOBALS['xoopsTpl']->assign('table_type', $helper->getConfig('table_type'));
            $GLOBALS['xoopsTpl']->assign('panel_type', $helper->getConfig('panel_type'));
            $GLOBALS['xoopsTpl']->assign('numb_col', $helper->getConfig('numb_col'));
            //$GLOBALS['xoopsTpl']->assign('numb_col', $helper->getConfig('numb_col'));
            if ('show' == $op && '' != $catName) {
                $GLOBALS['xoopsTpl']->assign('xoops_pagetitle', \strip_tags($catName . ' - ' . $GLOBALS['xoopsModule']->getVar('name')));
            }
        }
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
        $categoriesObj->setVar('cat_parent_id', Request::getInt('cat_parent_id', 0));
        $categoriesObj->setVar('cat_name', Request::getString('cat_name', ''));
        $categoriesObj->setVar('cat_comments', Request::getString('cat_comments', ''));
        $categoriesObj->setVar('cat_weight', Request::getInt('cat_weight', 0));
        $categoriesObj->setVar('cat_theme', Request::getString('cat_theme', ''));
        $categoriesObj->setVar('cat_default', Request::getString('cat_default', ''));
        // Insert Data
        if ($categoriesHandler->insert($categoriesObj)) {
            // redirect after insert
                \redirect_header('categories.php?op=list&amp;start=' . $start . '&amp;limit=' . $limit, 2, \_MA_TROMBINOSCOPE_FORM_OK);
        }
        // Get Form Error
        $GLOBALS['xoopsTpl']->assign('error', $categoriesObj->getHtmlErrors());
        $form = $categoriesObj->getFormCategories();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'new':
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_MA_TROMBINOSCOPE_CATEGORY_ADD];
        // Form Create
        $categoriesObj = $categoriesHandler->create();
        $form = $categoriesObj->getFormCategories();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'edit':
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_MA_TROMBINOSCOPE_CATEGORY_EDIT];
        // Check params
        if (0 == $catId) {
            \redirect_header('categories.php?op=list', 3, \_MA_TROMBINOSCOPE_INVALID_PARAM);
        }
        // Get Form
        $categoriesObj = $categoriesHandler->get($catId);
        $categoriesObj->start = $start;
        $categoriesObj->limit = $limit;
        $form = $categoriesObj->getFormCategories();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'clone':
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_MA_TROMBINOSCOPE_CATEGORY_CLONE];
        // Request source
        $catIdSource = Request::getInt('cat_id_source');
        // Check params
        if (0 == $catIdSource) {
            \redirect_header('categories.php?op=list', 3, \_MA_TROMBINOSCOPE_INVALID_PARAM);
        }
        // Get Form
        $categoriesObjSource = $categoriesHandler->get($catIdSource);
        $categoriesObj = $categoriesObjSource->xoopsClone();
        $form = $categoriesObj->getFormCategories();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'delete':
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_MA_TROMBINOSCOPE_CATEGORY_DELETE];
        // Check params
        if (0 == $catId) {
            \redirect_header('categories.php?op=list', 3, \_MA_TROMBINOSCOPE_INVALID_PARAM);
        }
        $categoriesObj = $categoriesHandler->get($catId);
        $catName = $categoriesObj->getVar('cat_name');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('categories.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($categoriesHandler->delete($categoriesObj)) {
                \redirect_header('categories.php', 3, \_MA_TROMBINOSCOPE_FORM_DELETE_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $categoriesObj->getHtmlErrors());
            }
        } else {
            $xoopsconfirm = new XoopsConfirm(
                ['ok' => 1, 'cat_id' => $catId, 'start' => $start, 'limit' => $limit, 'op' => 'delete'],
                $_SERVER['REQUEST_URI'],
                \sprintf(\_MA_TROMBINOSCOPE_FORM_SURE_DELETE, $categoriesObj->getVar('cat_name')));
            $form = $xoopsconfirm->getFormXoopsConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;
}

// Keywords
trombinoscopeMetaKeywords($helper->getConfig('keywords') . ', ' . \implode(',', $keywords));
unset($keywords);

// Description
trombinoscopeMetaDescription(\_MA_TROMBINOSCOPE_CATEGORIES_DESC);
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', \TROMBINOSCOPE_URL.'/categories.php');
$GLOBALS['xoopsTpl']->assign('trombinoscope_upload_url', \TROMBINOSCOPE_UPLOAD_URL);

require __DIR__ . '/footer.php';
