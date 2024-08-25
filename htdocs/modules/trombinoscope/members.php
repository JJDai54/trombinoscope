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

switch ($op) {
    case 'show':
    case 'list':
    default:
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_MA_TROMBINOSCOPE_MEMBERS_LIST];


        //-----------------------------------
       // ----- /Listes de selection pour filtrage -----        
        $filters = array();
  //echo "<hr>Categories<pre>" . print_r($categoriesHandler->getList(), true) . "</pre><hr>";
        //$catList = $categoriesHandler->getList(new \Criteria('cat_actif',1,'='));
        $catList = $categoriesHandler->getList();
        if ($catId == 0) $catId = $categoriesHandler->getDefault();
                                               
        if (count($catList) > 1){
          $inpCat = new \XoopsFormSelect(_CO_TROMBINOSCOPE_CATEGORIE, 'cat_id', $catId);
          //->addOption(0, _AM_TROMBINOSCOPE_ALL);
          $inpCat->addOptionArray($catList);
          $inpCat->setExtra('onchange="document.trombinoscope_filter.submit();"'); // style="width:150px;"
          $filters['categories']['input'] = $inpCat->render();
          $filters['categories']['caption'] = _CO_TROMBINOSCOPE_CATEGORIE;
        }
        
  	    $GLOBALS['xoopsTpl']->assign('filters', $filters);
       // ----- /Listes de selection pour filtrage -----        

        $crMembers =  new \CriteriaCompo(new \Criteria('mbr_actif', 1,'='));
        $crMembers->add(New \Criteria('mbr_cat_id', $catId, '='));

        if ($mbrId > 0) {
            $crMembers->add(new \Criteria('mbr_id', $mbrId));
        }
        
        
        $membersCount = $membersHandler->getCount($crMembers);
        $GLOBALS['xoopsTpl']->assign('membersCount', $membersCount);
        if (0 === $mbrId) {
            $crMembers->setStart($start);
            $crMembers->setLimit($limit);
        }
      $crMembers->setOrder("ASC");
      $crMembers->setSort('mbr_firstname,mbr_lastname,mbr_id');
 $helper = \XoopsModules\Trombinoscope\Helper::getInstance();   
        $membersAll = $membersHandler->getAll($crMembers);
        if ($membersCount > 0) {
            $members = [];
            $mbrUid = '';
            // Get All Members
            foreach (\array_keys($membersAll) as $i) {
                $members[$i] = $membersAll[$i]->getValuesMembers();
                $mbrUid = $membersAll[$i]->getVar('mbr_uid');
                $keywords[$i] = $mbrUid;
            }
            $GLOBALS['xoopsTpl']->assign('members', $members);
            unset($members);
            // Display Navigation
            if ($membersCount > $limit) {
                require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($membersCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }
            $GLOBALS['xoopsTpl']->assign('table_type', $helper->getConfig('table_type'));
            $GLOBALS['xoopsTpl']->assign('panel_type', $helper->getConfig('panel_type'));
            $GLOBALS['xoopsTpl']->assign('divideby', $helper->getConfig('divideby'));
            //$GLOBALS['xoopsTpl']->assign('divideby',5);
            $GLOBALS['xoopsTpl']->assign('numb_col', $helper->getConfig('numb_col'));
            $GLOBALS['xoopsTpl']->assign('membersCount', $membersCount);
            $GLOBALS['xoopsTpl']->assign('is_fiche',$mbrId > 0);        
            $utility = new \XoopsModules\Trombinoscope\Utility();            
            $GLOBALS['xoopsTpl']->assign('permEdit', $utility->getPermissions());
            
            
            if ('show' == $op && '' != $mbrUid) {
                $GLOBALS['xoopsTpl']->assign('xoops_pagetitle', \strip_tags($mbrUid . ' - ' . $GLOBALS['xoopsModule']->getVar('name')));
            }
        }
        break;
    case 'save':
                $office="frontoffice";
                include_once("admin/members_save.php");
                break;
//         // Security Check
//         if (!$GLOBALS['xoopsSecurity']->check()) {
//             \redirect_header('members.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
//         }
//         if ($mbrId > 0) {
//             $membersObj = $membersHandler->get($mbrId);
//         } else {
//             $membersObj = $membersHandler->create();
//         }
//         $uploaderErrors = '';
//         $membersObj->setVar('mbr_cat_id', Request::getInt('mbr_cat_id', 0));
//         $membersObj->setVar('mbr_uid', Request::getInt('mbr_uid', 0));
//         $membersObj->setVar('mbr_civilite', Request::getString('mbr_civilite', ''));
//         $membersObj->setVar('mbr_firstname', Request::getString('mbr_firstname', ''));
//         $membersObj->setVar('mbr_lastname', Request::getString('mbr_lastname', ''));
//         $membersObj->setVar('mbr_fonctions', Request::getString('mbr_fonctions', ''));
//         // Set Var mbr_photo
//         require_once \XOOPS_ROOT_PATH . '/class/uploader.php';
//         $filename       = $_FILES['mbr_photo']['name'];
//         $imgMimetype    = $_FILES['mbr_photo']['type'];
//         $imgNameDef     = Request::getString('mbr_uid');
//         $uploader = new \XoopsMediaUploader(\TROMBINOSCOPE_UPLOAD_IMAGE_PATH . '/members/', 
//                                                     $helper->getConfig('mimetypes_image'), 
//                                                     $helper->getConfig('maxsize_image'), null, null);
//         if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
//             $extension = \preg_replace('/^.+\.([^.]+)$/sU', '', $filename);
//             $imgName = \str_replace(' ', '', $imgNameDef) . '.' . $extension;
//             $uploader->setPrefix($imgName);
//             $uploader->fetchMedia($_POST['xoops_upload_file'][0]);
//             if ($uploader->upload()) {
//                 $savedFilename = $uploader->getSavedFileName();
//                 $maxwidth  = (int)$helper->getConfig('maxwidth_image');
//                 $maxheight = (int)$helper->getConfig('maxheight_image');
//                 if ($maxwidth > 0 && $maxheight > 0) {
//                     // Resize image
//                     $imgHandler                = new Trombinoscope\Common\Resizer();
//                     $imgHandler->sourceFile    = \TROMBINOSCOPE_UPLOAD_IMAGE_PATH . '/members/' . $savedFilename;
//                     $imgHandler->endFile       = \TROMBINOSCOPE_UPLOAD_IMAGE_PATH . '/members/' . $savedFilename;
//                     $imgHandler->imageMimetype = $imgMimetype;
//                     $imgHandler->maxWidth      = $maxwidth;
//                     $imgHandler->maxHeight     = $maxheight;
//                     $result                    = $imgHandler->resizeImage();
//                 }
//                 $membersObj->setVar('mbr_photo', $savedFilename);
//             } else {
//                 $uploaderErrors .= '<br>' . $uploader->getErrors();
//             }
//         } else {
//             if ($filename > '') {
//                 $uploaderErrors .= '<br>' . $uploader->getErrors();
//             }
//             $membersObj->setVar('mbr_photo', Request::getString('mbr_photo'));
//         }
//         $memberBirthdayObj = \DateTime::createFromFormat(\_SHORTDATESTRING, Request::getString('mbr_birthday'));
//         $membersObj->setVar('mbr_birthday', $memberBirthdayObj->getTimestamp());
//         $membersObj->setVar('mbr_email', Request::getString('mbr_email', ''));
//         $membersObj->setVar('mbr_fixe', Request::getString('mbr_fixe', ''));
//         $membersObj->setVar('mbr_mobile', Request::getString('mbr_mobile', ''));
//         $membersObj->setVar('mbr_status', Request::getString('mbr_status', ''));
//         $membersObj->setVar('mbr_address', Request::getString('mbr_address', ''));
//         $membersObj->setVar('mbr_comments', Request::getString('mbr_comments', ''));
//         $membersObj->setVar('mbr_actif', Request::getInt('mbr_actif', 0));
//         $memberCreationArr = Request::getArray('mbr_creation');
//         $memberCreationObj = \DateTime::createFromFormat(\_SHORTDATESTRING, $memberCreationArr['date']);
//         $memberCreationObj->setTime(0, 0, 0);
//         $memberCreation = $memberCreationObj->getTimestamp() + (int)$memberCreationArr['time'];
//         $membersObj->setVar('mbr_creation', $memberCreation);
//         $memberUpdateArr = Request::getArray('mbr_update');
//         $memberUpdateObj = \DateTime::createFromFormat(\_SHORTDATESTRING, $memberUpdateArr['date']);
//         $memberUpdateObj->setTime(0, 0, 0);
//         $memberUpdate = $memberUpdateObj->getTimestamp() + (int)$memberUpdateArr['time'];
//         $membersObj->setVar('mbr_update', $memberUpdate);
//         // Insert Data
//         if ($membersHandler->insert($membersObj)) {
//             $newMbrId = $mbrId > 0 ? $mbrId : $membersObj->getNewInsertedIdMembers();
//             // redirect after insert
//             if ('' !== $uploaderErrors) {
//                 \redirect_header('members.php?op=edit&mbr_id=' . $newMbrId, 5, $uploaderErrors);
//             } else {
//                 \redirect_header('members.php?op=list&amp;start=' . $start . '&amp;limit=' . $limit, 2, \_MA_TROMBINOSCOPE_FORM_OK);
//             }
//         }
//         // Get Form Error
//         $GLOBALS['xoopsTpl']->assign('error', $membersObj->getHtmlErrors());
//         $form = $membersObj->getFormMembers();
//         $GLOBALS['xoopsTpl']->assign('form', $form->render());
//         break;

    case 'new':
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_MA_TROMBINOSCOPE_MEMBER_ADD];
        // Form Create
        $membersObj = $membersHandler->create();
        $form = $membersObj->getFormMembers();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'edit':
        // Breadcrumbs
        $xoBreadcrumbs[] = ['title' => \_MA_TROMBINOSCOPE_MEMBER_EDIT];
        // Check params
        if (0 == $mbrId) {
            \redirect_header('members.php?op=list', 3, \_MA_TROMBINOSCOPE_INVALID_PARAM);
        }
        // Get Form
        $membersObj = $membersHandler->get($mbrId);
        $membersObj->start = $start;
        $membersObj->limit = $limit;
        $form = $membersObj->getFormMembers();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
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
