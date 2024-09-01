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
 * @author         JJDai - Email:<jjdelalandre@orange.fr> - Website:<https://kiolo.fr>
 */

use XoopsModules\Trombinoscope;

\defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * Class Object Qualities
 */
class Qualities extends \XoopsObject
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
        $this->initVar('quality_id', \XOBJ_DTYPE_INT);
        $this->initVar('quality_name', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('quality_weight', \XOBJ_DTYPE_INT);

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
    public function getNewInsertedIdQualities()
    {
        $newInsertedId = $GLOBALS['xoopsDB']->getInsertId();
        return $newInsertedId;
    }

    /**
     * @public function getForm
     * @param bool $action
     * @return \XoopsThemeForm
     */
    public function getFormQualities($action = false)
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
          $qualityId = 0;
          $title = _AM_TROMBINOSCOPE_QUALITY_ADD ;
        }else{
        // Title
          $qualityId = $this->getVar('quality_id');
          $title = _AM_TROMBINOSCOPE_QUALITY_EDIT;
        }
        

        // Get Theme Form
        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        //-------------------------------
  //exit("qualityId = {$qualityId}")      ;
        // Form Text quality_name
        $form->addElement(new \XoopsFormText(_AM_TROMBINOSCOPE_QUALITY_NAME, 'quality_name', 50, 255, $this->getVar('quality_name')), true);
        // Form Text quality_weight
        $qualityWeight = $this->isNew() ? '0' : $this->getVar('quality_weight');
        $form->addElement(new \XoopsFormText(_AM_TROMBINOSCOPE_QUALITY_WEIGHT, 'quality_weight', 20, 150, $qualityWeight));

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
    public function getValuesQualities($keys = null, $format = null, $maxDepth = null)
    {
        $ret = $this->getValues($keys, $format, $maxDepth);
        $ret['id']        = $this->getVar('quality_id');
        $ret['name']      = $this->getVar('quality_name');
        $ret['weight']    = $this->getVar('quality_weight');
        return $ret;
    }

    /**
     * Returns an array representation of the object
     *
     * @return array
     */
    public function toArrayQualities()
    {
        $ret = [];
        $vars = $this->getVars();
        foreach (\array_keys($vars) as $var) {
            $ret[$var] = $this->getVar('"{$var}"');
        }
        return $ret;
    }
}
