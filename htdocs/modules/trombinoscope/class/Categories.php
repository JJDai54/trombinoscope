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

\defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * Class Object Categories
 */
class Categories extends \XoopsObject
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
        $this->initVar('cat_id', \XOBJ_DTYPE_INT);
        $this->initVar('cat_parent_id', \XOBJ_DTYPE_INT);
        $this->initVar('cat_name', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('cat_comments', \XOBJ_DTYPE_TXTAREA);
        $this->initVar('cat_weight', \XOBJ_DTYPE_INT);
        $this->initVar('cat_theme', \XOBJ_DTYPE_TXTBOX);
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
    public function getNewInsertedIdCategories()
    {
        $newInsertedId = $GLOBALS['xoopsDB']->getInsertId();
        return $newInsertedId;
    }

    /**
     * @public function getForm
     * @param bool $action
     * @return \XoopsThemeForm
     */
    public function getFormCategories($action = false)
    {
        $helper = \XoopsModules\Trombinoscope\Helper::getInstance();
        if (!$action) {
            $action = $_SERVER['REQUEST_URI'];
        }
        $isAdmin = $GLOBALS['xoopsUser']->isAdmin($GLOBALS['xoopsModule']->mid());
        // Title
        $isNew = $this->isNew();
        if($isNew){
          // Title
          $catId = 0;
          $title = _AM_TROMBINOSCOPE_CATEGORY_ADD ;
        }else{
        // Title
          $catId = $this->getVar('cat_id');
          $title = _AM_TROMBINOSCOPE_CATEGORY_EDIT;
        }
        

        // Get Theme Form
        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        // Categories Handler
        $categoriesHandler = $helper->getHandler('Categories');
        /* pas géré pour le moment
        // Form Select catParent_id
        $catParent_idSelect = new \XoopsFormSelect(_AM_TROMBINOSCOPE_CATEGORY_PARENT_ID, 'cat_parent_id', $this->getVar('cat_parent_id'), 1);
        $criteria = new \CriteriaCompo(new \Criteria('cat_id',0,'='));
        $criteria->add(new \Criteria('cat_id', $catId, '<>'), 'AND');
        $allCat = $categoriesHandler->getAll($criteria);
        $catParent_idSelect->addOption('0', \_NONE);
        foreach($allCat as $cat){
            $catParent_idSelect->addOption($cat->getVar('cat_id'), $cat->getVar('cat_name'));        
        }
        $form->addElement($catParent_idSelect);
        */
        //-------------------------------
        
        // Form Text catName
        $form->addElement(new \XoopsFormText(_AM_TROMBINOSCOPE_CATEGORY_NAME, 'cat_name', 50, 255, $this->getVar('cat_name')), true);
        // Form Text catWeight
        $catWeight = $this->isNew() ? '0' : $this->getVar('cat_weight');
        $form->addElement(new \XoopsFormText(_AM_TROMBINOSCOPE_CATEGORY_WEIGHT, 'cat_weight', 20, 150, $catWeight));
        // Categories Handler
        $categoriesHandler = $helper->getHandler('Categories');

        // Form Editor TextArea mbrComments
        $form->addElement(new \XoopsFormTextArea(_CO_TROMBINOSCOPE_MEMBER_COMMENTS, 'cat_comments', $this->getVar('cat_comments', 'e'), 4, 47));

/* pas géré pour l'instant 
        // Form Select catTheme
        $catThemeSelect = new \XoopsFormSelect(_AM_TROMBINOSCOPE_CATEGORY_THEME, 'cat_theme', $this->getVar('cat_theme'), 5);
        $catThemeSelect->addOption('0', \_NONE);
        $catThemeSelect->addOption('1', _AM_TROMBINOSCOPE_LIST_1);
        $catThemeSelect->addOption('2', _AM_TROMBINOSCOPE_LIST_2);
        $catThemeSelect->addOption('3', _AM_TROMBINOSCOPE_LIST_3);
        $form->addElement($catThemeSelect);
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
    public function getValuesCategories($keys = null, $format = null, $maxDepth = null)
    {
        $ret = $this->getValues($keys, $format, $maxDepth);
        $ret['id']        = $this->getVar('cat_id');
        $ret['parent_id'] = $this->getVar('cat_parent_id');
        $ret['name']      = $this->getVar('cat_name');
        $ret['comments']  = \strip_tags($this->getVar('cat_comments', 'e'));
        $ret['weight']    = $this->getVar('cat_weight');
        $ret['theme']     = $this->getVar('cat_theme');
        return $ret;
    }

    /**
     * Returns an array representation of the object
     *
     * @return array
     */
    public function toArrayCategories()
    {
        $ret = [];
        $vars = $this->getVars();
        foreach (\array_keys($vars) as $var) {
            $ret[$var] = $this->getVar('"{$var}"');
        }
        return $ret;
    }
}
