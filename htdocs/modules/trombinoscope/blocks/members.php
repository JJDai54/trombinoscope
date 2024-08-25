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

use XoopsModules\Trombinoscope;
use XoopsModules\Trombinoscope\Helper;
use XoopsModules\Trombinoscope\Constants;

require_once \XOOPS_ROOT_PATH . '/modules/trombinoscope/include/common.php';

/**
 * Function show block
 * @param  $options
 * @return array
 */
function b_trombinoscope_members_show($options)
{
    require_once \XOOPS_ROOT_PATH . '/modules/trombinoscope/class/members.php';
    $GLOBALS['xoopsTpl']->assign('trombinoscope_upload_url', \TROMBINOSCOPE_UPLOAD_URL);
    $block       = [];
    $typeBlock   = $options[0];
    $limit       = $options[1];
    $lenghtTitle = $options[2];
    $helper      = Helper::getInstance();
    $membersHandler = $helper->getHandler('Members');
    $crMembers = new \CriteriaCompo();
    \array_shift($options);
    \array_shift($options);
    \array_shift($options);

    switch ($typeBlock) {
        case 'last':
        default:
            // For the block: members last
            $crMembers->setSort('');
            $crMembers->setOrder('DESC');
            break;
        case 'new':
            // For the block: members new
            // new since last week: 7 * 24 * 60 * 60 = 604800
            $crMembers->add(new \Criteria('', \time() - 604800, '>='));
            $crMembers->add(new \Criteria('', \time(), '<='));
            $crMembers->setSort('');
            $crMembers->setOrder('ASC');
            break;
        case 'hits':
            // For the block: members hits
            $crMembers->setSort('mbr_hits');
            $crMembers->setOrder('DESC');
            break;
        case 'top':
            // For the block: members top
            $crMembers->setSort('mbr_top');
            $crMembers->setOrder('ASC');
            break;
        case 'random':
            // For the block: members random
            $crMembers->setSort('RAND()');
            break;
    }

    $crMembers->setLimit($limit);
    $membersAll = $membersHandler->getAll($crMembers);
    unset($crMembers);
    if (\count($membersAll) > 0) {
        foreach (\array_keys($membersAll) as $i) {
            $block[$i]['id'] = $membersAll[$i]->getVar('mbr_id');
            $block[$i]['cat_id'] = $membersAll[$i]->getVar('mbr_cat_id');
            $block[$i]['uid'] = $membersAll[$i]->getVar('mbr_uid');
            $block[$i]['civilite'] = \htmlspecialchars($membersAll[$i]->getVar('mbr_civilite'), ENT_QUOTES | ENT_HTML5);
            $block[$i]['firstname'] = \htmlspecialchars($membersAll[$i]->getVar('mbr_firstname'), ENT_QUOTES | ENT_HTML5);
            $block[$i]['lastname'] = \htmlspecialchars($membersAll[$i]->getVar('mbr_lastname'), ENT_QUOTES | ENT_HTML5);
            $block[$i]['mbr_sexe'] = \htmlspecialchars($membersAll[$i]->getVar('mbr_sexe'), ENT_QUOTES | ENT_HTML5);
            $block[$i]['fonction'] = \htmlspecialchars($membersAll[$i]->getVar('mbr_fonctions'), ENT_QUOTES | ENT_HTML5);
        }
    }

    return $block;

}

/**
 * Function edit block
 * @param  $options
 * @return string
 */
function b_trombinoscope_members_edit($options)
{
    require_once \XOOPS_ROOT_PATH . '/modules/trombinoscope/class/members.php';
    $helper = Helper::getInstance();
    $membersHandler = $helper->getHandler('Members');
    $GLOBALS['xoopsTpl']->assign('trombinoscope_upload_url', \TROMBINOSCOPE_UPLOAD_URL);
    $form = \_MB_TROMBINOSCOPE_DISPLAY;
    $form .= "<input type='hidden' name='options[0]' value='".$options[0]."' >";
    $form .= "<input type='text' name='options[1]' size='5' maxlength='255' value='" . $options[1] . "' >&nbsp;<br>";
    $form .= \_MB_TROMBINOSCOPE_TITLE_LENGTH . " : <input type='text' name='options[2]' size='5' maxlength='255' value='" . $options[2] . "' ><br><br>";
    \array_shift($options);
    \array_shift($options);
    \array_shift($options);

    $crMembers = new \CriteriaCompo();
    $crMembers->add(new \Criteria('mbr_id', 0, '!='));
    $crMembers->setSort('mbr_id');
    $crMembers->setOrder('ASC');
    $membersAll = $membersHandler->getAll($crMembers);
    unset($crMembers);
    $form .= \_MB_TROMBINOSCOPE_MEMBERS_TO_DISPLAY . "<br><select name='options[]' multiple='multiple' size='5'>";
    $form .= "<option value='0' " . (!\in_array(0, $options) && !\in_array('0', $options) ? '' : "selected='selected'") . '>' . \_MB_TROMBINOSCOPE_ALL_MEMBERS . '</option>';
    foreach (\array_keys($membersAll) as $i) {
        $mbr_id = $membersAll[$i]->getVar('mbr_id');
        $form .= "<option value='" . $mbr_id . "' " . (!\in_array($mbr_id, $options) ? '' : "selected='selected'") . '>' . $membersAll[$i]->getVar('mbr_uid') . '</option>';
    }
    $form .= '</select>';

    return $form;

}
