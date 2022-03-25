<?php

//declare(strict_types=1);


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
 * Trombinoscope module for xoops
 *
 * @copyright      2021 XOOPS Project (https://xoops.org)
 * @license        GPL 2.0 or later
 * @package        trombinoscope
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         JJDai - Email:<jjdelalandre@orange.fr> - Website:<http://jubile.fr>
 */

use XoopsModules\Trombinoscope;
use JJD;
\defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * Class Object Members
 */
class Members extends \XoopsObject
{
    /**
     * @var int
     */
    public $start = 0;

    /**
     * @var int
     */
    public $limit = 0;

    /**
     * Constructor
     *
     * @param null
     */
    public function __construct()
    {
        $this->initVar('mbr_id', \XOBJ_DTYPE_INT);
        $this->initVar('mbr_cat_id', \XOBJ_DTYPE_INT);
        $this->initVar('mbr_uid', \XOBJ_DTYPE_INT);
        $this->initVar('mbr_civilite', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('mbr_firstname', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('mbr_lastname', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('mbr_sexe', \XOBJ_DTYPE_INT);
        $this->initVar('mbr_fonctions', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('mbr_photo', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('mbr_birthday', \XOBJ_DTYPE_OTHER); //XOBJ_DTYPE_LTIME // XOBJ_DTYPE_DATE
        $this->initVar('mbr_email', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('mbr_fixe', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('mbr_mobile', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('mbr_status', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('mbr_address', \XOBJ_DTYPE_TXTAREA);
        $this->initVar('mbr_comments', \XOBJ_DTYPE_TXTAREA);
        $this->initVar('mbr_actif', \XOBJ_DTYPE_INT);
        $this->initVar('mbr_creation', \XOBJ_DTYPE_OTHER);
        $this->initVar('mbr_update', \XOBJ_DTYPE_OTHER);
    }

    /**
     * @static function &getInstance
     *
     * @param null
     */
    public static function getInstance()
    {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }
    }

    /**
     * The new inserted $Id
     * @return inserted id
     */
    public function getNewInsertedIdMembers()
    {
        $newInsertedId = $GLOBALS['xoopsDB']->getInsertId();
        return $newInsertedId;
    }

    /**
     * @public function getForm
     * @param bool $action
     * @return \XoopsThemeForm
     */
    public function getFormMembers($action = false)
    {
        global $categoriesHandler;

        $helper = \XoopsModules\Trombinoscope\Helper::getInstance();
        if (!$action) {
            $action = $_SERVER['REQUEST_URI'];
        }
        $isAdmin = $GLOBALS['xoopsUser']->isAdmin($GLOBALS['xoopsModule']->mid());
        // Title
        $title = $this->isNew() ? \sprintf(\_AM_TROMBINOSCOPE_MEMBER_ADD) : \sprintf(\_AM_TROMBINOSCOPE_MEMBER_EDIT);
        // Get Theme Form
        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        // Members Handler
        $membersHandler = $helper->getHandler('Members');
        //--------------------------------------------------------
        // Form Select mbrCat_id
        $mbrCat_idSelect = new \XoopsFormSelect(\_AM_TROMBINOSCOPE_CATEGORIE, 'mbr_cat_id', $this->getVar('mbr_cat_id'), 1);
//         $allCat = $categoriesHandler->getAll($criteria);
//         foreach($allCat as $cat){
//             $mbrCat_idSelect->addOption($cat->getVar('cat_id'), $cat->getVar('cat_name'));        
//         }
        $criteria = new \criteriaCompo();
        $criteria->setOrder("ASC");
        $criteria->setSort("cat_weight");
        $mbrCat_idSelect->addOptionArray($categoriesHandler->getList($criteria));
        $form->addElement($mbrCat_idSelect);
        //--------------------------------------------------------
        // Form Table members
        //membersHandler = $helper->getHandler('Members');
        $mbrUidSelect = new \XoopsFormSelectUser(_AM_TROMBINOSCOPE_MEMBER_UID, 'mbr_uid', true, $this->getVar('mbr_uid'));
        //$mbrUidSelect->addOptionArray($membersHandler->getList());
        $form->addElement($mbrUidSelect);
        //-------------------------------
        // Form Text mbr_civilite
        $form->addElement(new \XoopsFormText(\_AM_TROMBINOSCOPE_MEMBER_CIVILITE, 'mbr_civilite', 20, 20, $this->getVar('mbr_civilite')), true);
        // Form Text mbrFirstname
        $form->addElement(new \XoopsFormText(\_AM_TROMBINOSCOPE_MEMBER_FIRSTNAME, 'mbr_firstname', 50, 255, $this->getVar('mbr_firstname')), true);
        // Form Text mbrLastname
        $form->addElement(new \XoopsFormText(\_AM_TROMBINOSCOPE_MEMBER_LASTNAME, 'mbr_lastname', 50, 255, $this->getVar('mbr_lastname')), true);
        
        
        // Form Text mbr_sexe
        $inpSexe = new \XoopsFormRadio(\_AM_TROMBINOSCOPE_MEMBER_SEXE, 'mbr_sexe', $this->getVar('mbr_sexe'));
        $inpSexe->addOption(1,_AM_TROMBINOSCOPE_MEMBER_HOMME);
        $inpSexe->addOption(2,_AM_TROMBINOSCOPE_MEMBER_FEMME);
        $form->addElement($inpSexe, true);
        
        // Form Text mbrFonction
        $form->addElement(new \XoopsFormText(\_AM_TROMBINOSCOPE_MEMBER_FONCTION, 'mbr_fonctions', 50, 255, $this->getVar('mbr_fonctions')));
        
        // Form Image mbrPhoto
        // Form Image mbrPhoto: Select Uploaded Image 
        $getMbrPhoto = $this->getVar('mbr_photo');
        $mbrPhoto = $getMbrPhoto ?: TROMBINOSCOPE_NO_PICTURE; //blank.gif
        $imageDirectory = '/uploads/trombinoscope/images/members';
        $imageTray = new \XoopsFormElementTray(_AM_TROMBINOSCOPE_MEMBRE_PHOTO, '<br>');
//         $imageSelect = new \XoopsFormSelect(\sprintf(\_AM_TROMBINOSCOPE_MEMBRE_PHOTO_UPLOADS, ".{$imageDirectory}/"), 'mbr_photo', $mbrPhoto, 5);
//         $imageArray = \XoopsLists::getImgListAsArray( \XOOPS_ROOT_PATH . $imageDirectory );
//         foreach ($imageArray as $image1) {
//             $imageSelect->addOption(($image1), $image1);
//         }
//         $imageSelect->setExtra("onchange='showImgSelected(\"imglabel_mbr_photo\", \"mbr_photo\", \"" . $imageDirectory . '", "", "' . \XOOPS_URL . "\")'");
//         $imageTray->addElement($imageSelect, false);
        $fImg = \XOOPS_URL . '/' . $imageDirectory . '/' . $mbrPhoto ;
//         echo "<hr>{$fImg}<hr>";
         $imageTray->addElement(new \XoopsFormLabel('', "<br><img src='" . $fImg . "' id='imglabel_mbr_photo' alt='' style='max-width:100px' >"));
        
        // Form Image mbrPhoto: Upload new image
            $maxsize = $helper->getConfig('maxsize_image');
            $imageTray->addElement(new \XoopsFormFile('<br>' . \_AM_TROMBINOSCOPE_FORM_UPLOAD_NEW, 'mbr_photo', $maxsize));
            $imageTray->addElement(new \XoopsFormLabel(\_AM_TROMBINOSCOPE_FORM_UPLOAD_SIZE, ($maxsize / 1048576) . ' '  . \_AM_TROMBINOSCOPE_FORM_UPLOAD_SIZE_MB));
            $imageTray->addElement(new \XoopsFormLabel(\_AM_TROMBINOSCOPE_FORM_UPLOAD_IMG_WIDTH, $helper->getConfig('maxwidth_image') . ' px'));
            $imageTray->addElement(new \XoopsFormLabel(\_AM_TROMBINOSCOPE_FORM_UPLOAD_IMG_HEIGHT, $helper->getConfig('maxheight_image') . ' px'));
        if ($permissionUpload) {
        } else {
            $imageTray->addElement(new \XoopsFormHidden('mbr_photo', $mbrPhoto));
        }
        $form->addElement($imageTray);
        //-------------------------------------------------
        // Form Text Date Select mbrBirthday
//        $mbrBirthday = $this->isNew() ? \time() : $this->getVar('mbr_birthday');
//        $form->addElement(new \XoopsFormTextDateSelect(\, 'mbr_birthday', '', $mbrBirthday));
        
		// Form Check Box quizDateBegin
         $mbrBirthday= \JJD\xoopsformDateSimple(_AM_TROMBINOSCOPE_MEMBER_BIRTHDAY, 'mbr_birthday', $this->getVar('mbr_birthday'));
		$form->addElement($mbrBirthday);
        
        
        
        
        
        
        
        // Form Text mbrEmail
        $form->addElement(new \XoopsFormText(\_AM_TROMBINOSCOPE_MEMBER_EMAIL, 'mbr_email', 50, 255, $this->getVar('mbr_email')));
        // Form Text mbrFixe
        $form->addElement(new \XoopsFormText(\_AM_TROMBINOSCOPE_MEMBER_FIXE, 'mbr_fixe', 50, 255, $this->getVar('mbr_fixe')));
        // Form Text mbrMobile
        $form->addElement(new \XoopsFormText(\_AM_TROMBINOSCOPE_MEMBER_MOBILE, 'mbr_mobile', 50, 255, $this->getVar('mbr_mobile')));
        // Members Handler
        $membersHandler = $helper->getHandler('Members');
        
        /* pas utilisé pour l'instant
        // Form Select mbrStatus
        $mbrStatusSelect = new \XoopsFormSelect(\_AM_TROMBINOSCOPE_MEMBER_STATUS, 'mbr_status', $this->getVar('mbr_status'), 5);
        $mbrStatusSelect->addOption('0', \_NONE);
        $mbrStatusSelect->addOption('1', \_AM_TROMBINOSCOPE_LIST_1);
        $mbrStatusSelect->addOption('2', \_AM_TROMBINOSCOPE_LIST_2);
        $mbrStatusSelect->addOption('3', \_AM_TROMBINOSCOPE_LIST_3);
        $form->addElement($mbrStatusSelect, true);
        */
        // Form Editor TextArea mbr_address
        $form->addElement(new \XoopsFormTextArea(\_AM_TROMBINOSCOPE_MEMBER_ADDRESS, 'mbr_address', $this->getVar('mbr_address', 'e'), 4, 47));
        
        // Form Editor TextArea mbrComments
        $form->addElement(new \XoopsFormTextArea(\_AM_TROMBINOSCOPE_MEMBER_COMMENTS, 'mbr_comments', $this->getVar('mbr_comments', 'e'), 4, 47));
        // Form Radio Yes/No mbrActif
        $mbrActif = $this->isNew() ?: $this->getVar('mbr_actif');
        $form->addElement(new \XoopsFormRadioYN(\_AM_TROMBINOSCOPE_MEMBER_ACTIF, 'mbr_actif', $mbrActif));
        
        /* mis à jour lors de l'enregistrement
        // Form Text Date Select mbrCreation
        $mbrCreation = $this->isNew() ? \time() : $this->getVar('mbr_creation');
        $form->addElement(new \XoopsFormDateTime(\_AM_TROMBINOSCOPE_MEMBER_CREATION, 'mbr_creation', '', $mbrCreation));
        // Form Text Date Select mbrUpdate
        $mbrUpdate = $this->isNew() ? \time() : $this->getVar('mbr_update');
        $form->addElement(new \XoopsFormDateTime(\_AM_TROMBINOSCOPE_MEMBER_UPDATE, 'mbr_update', '', $mbrUpdate));
        */
        // To Save
        $form->addElement(new \XoopsFormHidden('op', 'save'));
        $form->addElement(new \XoopsFormHidden('start', $this->start));
        $form->addElement(new \XoopsFormHidden('limit', $this->limit));
        $form->addElement(new \XoopsFormButtonTray('', \_SUBMIT, 'submit', '', false));
        return $form;
    }

    /**
     * Get Values
     * @param null $keys
     * @param null $format
     * @param null $maxDepth
     * @return array
     */
    public function getValuesMembers($keys = null, $format = null, $maxDepth = null)
    {
        global $categoriesHandler;
        $cat = $categoriesHandler->getList();
        $member_handler = xoops_getHandler('member');
//                 $groups         = empty($_POST['mail_to_group']) ? array() : array_map('intval', $_POST['mail_to_group']);
//                 $getusers       = $member_handler->getUsersByGroupLink($groups, $criteria_object, true);
//                 $count_criteria = $member_handler->getUserCountByGroupLink($groups, $criteria_object);
$user=$member_handler->getUser($this->getVar('mbr_uid'));

        
        $helper  = \XoopsModules\Trombinoscope\Helper::getInstance();
        $utility = new \XoopsModules\Trombinoscope\Utility();
        $ret = $this->getValues($keys, $format, $maxDepth);
        $ret['id']             = $this->getVar('mbr_id');
        $ret['cat_id']         = $this->getVar('mbr_cat_id');
        $ret['cat_name']         = $cat[$this->getVar('mbr_cat_id')];
        $membersHandler = $helper->getHandler('Members');
        //$membersObj = $membersHandler->get($this->getVar('mbr_uid'));
        $ret['uid']            = $this->getVar('mbr_uid');
        $ret['pseudo']         = $user->getVar('uname');
        $ret['civilite']       = $this->getVar('mbr_civilite');
        $ret['firstname']      = $this->getVar('mbr_firstname');
        $ret['lastname']       = $this->getVar('mbr_lastname');
        $ret['fullname']       = $this->getVar('mbr_civilite') . " " . $this->getVar('mbr_firstname') . " " . $this->getVar('mbr_lastname');
        $ret['sexe']           = $this->getVar('mbr_sexe');
        
        
        $ret['fonctions']      = $this->getVar('mbr_fonctions');
        $ret['fonctionsTA']    = str_replace(",", "<br>", $this->getVar('mbr_fonctions'));
        $ret['photo']          = $this->getVar('mbr_photo');
        if($ret['photo'] == '') $ret['photo'] = TROMBINOSCOPE_NO_PICTURE;
        //$ret['birthday']       = \formatTimestamp($this->getVar('mbr_birthday'), 's');
        if($this->getVar('mbr_birthday')=='1900-01-01'){
      		$ret['birthday']   = '';
        }else{
        setlocale(LC_ALL, 'fr_FR');
      		$ret['birthday']   = \JJD\getDateSql2Str($this->getVar('mbr_birthday'), 'd-F');//'d-m-Y'
        }
        
        $ret['email']          = $this->getVar('mbr_email');
        $ret['fixe']           = $this->getVar('mbr_fixe');
        $ret['mobile']         = $this->getVar('mbr_mobile');
        $ret['status']         = $this->getVar('mbr_status');
        $ret['address']        = \strip_tags($this->getVar('mbr_address', 'e'));
        $ret['comments']       = \strip_tags($this->getVar('mbr_comments', 'e'));
        $editorMaxchar = $helper->getConfig('editor_maxchar');
        $ret['comments_short'] = $utility::truncateHtml($ret['comments'], $editorMaxchar);
        $ret['actif']          = (int)$this->getVar('mbr_actif') > 0 ? _YES : _NO;
//         $ret['creation']       = \formatTimestamp($this->getVar('mbr_creation'), 'm');
//         $ret['update']         = \formatTimestamp($this->getVar('mbr_update'), 'm');

		$ret['creation']          = \JJD\getDateSql2Str($this->getVar('mbr_creation'));
		$ret['update']            = \JJD\getDateSql2Str($this->getVar('mbr_update'));
        
        return $ret;
    }

    /**
     * Returns an array representation of the object
     *
     * @return array
     */
    public function toArrayMembers()
    {
        $ret = [];
        $vars = $this->getVars();
        foreach (\array_keys($vars) as $var) {
            //$ret[$var] = $this->getVar('"{$var}"');
            $ret[$var] = $this->getVar($var); 
        }
        return $ret;
    }
}
