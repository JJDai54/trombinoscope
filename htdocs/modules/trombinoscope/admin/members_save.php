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

//require __DIR__ . '/header.php';
// Get all request values

$mbrId = Request::getInt('mbr_id');

//  $gp = array_merge($_GET, $_POST);
//  echo "<hr>_GET/_POST<pre>" . print_r($gp, true) . "</pre><hr>";
//exit ("ici");

//----------------------------------------------------
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('members.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if ($mbrId > 0) {
            $membersObj = $membersHandler->get($mbrId);
            $isNew = false;
            $oldMember = $membersObj->toArrayMembers();
        } else {
            $membersObj = $membersHandler->create();
    		$membersObj->setVar('mbr_creation', \JJD\getSqlDate());
            $isNew = true;
        }
		$membersObj->setVar('mbr_update', \JJD\getSqlDate());
        //---------------------------------------------------        
        
        // Set Vars
        $uploaderErrors = '';
        $membersObj->setVar('mbr_cat_id', Request::getInt('mbr_cat_id', 0));
        $membersObj->setVar('mbr_uid', Request::getInt('mbr_uid', 0));
        $membersObj->setVar('mbr_civilite', Request::getString('mbr_civilite', ''));
        $membersObj->setVar('mbr_firstname', Request::getString('mbr_firstname', ''));
        $membersObj->setVar('mbr_lastname', Request::getString('mbr_lastname', ''));
        $membersObj->setVar('mbr_sexe', Request::getString('mbr_sexe', ''));
        $membersObj->setVar('mbr_fonctions', Request::getString('mbr_fonctions', ''));
        // Set Var mbr_photo
        require_once \XOOPS_ROOT_PATH . '/class/uploader.php';
        $filename       = $_FILES['mbr_photo']['name'];
        $imgMimetype    = $_FILES['mbr_photo']['type'];
        $imgNameDef     = Request::getString('mbr_uid');
        $uploader = new \XoopsMediaUploader(\TROMBINOSCOPE_UPLOAD_IMAGE_PATH . '/members/', 
                                                    $helper->getConfig('mimetypes_image'), 
                                                    $helper->getConfig('maxsize_image'), null, null);
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
            $extension = \preg_replace('/^.+\.([^.]+)$/sU', '', $filename);
            $imgName = \str_replace(' ', '', $imgNameDef) . '.' . $extension;
            $uploader->setPrefix($imgName);
            $uploader->fetchMedia($_POST['xoops_upload_file'][0]);
            if ($uploader->upload()) {
                $savedFilename = $uploader->getSavedFileName();
                $maxwidth  = (int)$helper->getConfig('maxwidth_image');
                $maxheight = (int)$helper->getConfig('maxheight_image');
                if ($maxwidth > 0 && $maxheight > 0) {
                    // Resize image
                    $imgHandler                = new Trombinoscope\Common\Resizer();
                    $imgHandler->sourceFile    = \TROMBINOSCOPE_UPLOAD_IMAGE_PATH . '/members/' . $savedFilename;
                    $imgHandler->endFile       = \TROMBINOSCOPE_UPLOAD_IMAGE_PATH . '/members/' . $savedFilename;
                    $imgHandler->imageMimetype = $imgMimetype;
                    $imgHandler->maxWidth      = $maxwidth;
                    $imgHandler->maxHeight     = $maxheight;
                    $result                    = $imgHandler->resizeImage();
                }
                $membersObj->setVar('mbr_photo', $savedFilename);
            } else {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
        } else {
            if ($filename > '') {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
            $membersObj->setVar('mbr_photo', Request::getString('mbr_photo'));
        }
        //$memberBirthdayObj = \DateTime::createFromFormat(\_SHORTDATESTRING, Request::getString('mbr_birthday'));
        //$membersObj->setVar('mbr_birthday', $memberBirthdayObj->getTimestamp());
// 		$memberBirthdayObj = Request::getArray('mbr_birthday');		
//         $membersObj->setVar('mbr_birthday', \JJD\getSqlDate($memberBirthdayObj));
        $membersObj->setVar('mbr_birthday', \JJD\getSqlDate(Request::getString('mbr_birthday'), 'Y-m-d', _CO_TROMBINOSCOPE_FORMAT_DATE_SHORT));
        
        $membersObj->setVar('mbr_email', Request::getString('mbr_email', ''));
        $membersObj->setVar('mbr_fixe', Request::getString('mbr_fixe', ''));
        $membersObj->setVar('mbr_mobile', Request::getString('mbr_mobile', ''));
        $membersObj->setVar('mbr_status', Request::getString('mbr_status', ''));
        $membersObj->setVar('mbr_address', Request::getString('mbr_address', ''));
        $membersObj->setVar('mbr_comments', Request::getString('mbr_comments', ''));
        $membersObj->setVar('mbr_actif', Request::getInt('mbr_actif', 0));
        
                
        // Insert Data
        if ($membersHandler->insert($membersObj)) {
            if ('' !== $uploaderErrors) {
                  \redirect_header('members.php?op=edit&mbr_id=' . $mbrId, 5, $uploaderErrors);
            } else {
                if ($office == "frontoffice")
                {
                  \redirect_header("members.php?op=list&mbr_id={$mbrId}&start={$start}&limit={$limit}" , 2, _AM_TROMBINOSCOPE_FORM_OK);
                }else{
                  \redirect_header("members.php?op=list&start={$start}&limit={$limit}" , 2, _AM_TROMBINOSCOPE_FORM_OK);
                  //\redirect_header('members.php?op=list&amp;start=' . $start . '&amp;limit=' . $limit, 2, _AM_TROMBINOSCOPE_FORM_OK);
                }

            }
        }

        // Get Form
        $GLOBALS['xoopsTpl']->assign('error', $membersObj->getHtmlErrors());
        $form = $membersObj->getFormMembers();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());

        


