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

use XoopsModules\Trombinoscope;
use XoopsModules\Trombinoscope\Helper;
use XoopsModules\Trombinoscope\Constants;

require_once \XOOPS_ROOT_PATH . '/modules/trombinoscope/include/common.php';

/**
 * Function show block
 * @param  $options
 * @return array
 */
function b_trombinoscope_categories_show($options)
{
    require_once \XOOPS_ROOT_PATH . '/modules/trombinoscope/class/categories.php';
    $GLOBALS['xoopsTpl']->assign('trombinoscope_upload_url', \TROMBINOSCOPE_UPLOAD_URL);
    $block       = [];
    $typeBlock   = $options[0];
    $limit       = $options[1];
    $lenghtTitle = $options[2];
    $helper      = Helper::getInstance();
    $categoriesHandler = $helper->getHandler('Categories');
    $crCategories = new \CriteriaCompo();
    \array_shift($options);
    \array_shift($options);
    \array_shift($options);

    switch ($typeBlock) {
        case 'last':
        default:
            // For the block: categories last
            $crCategories->setSort('');
            $crCategories->setOrder('DESC');
            break;
        case 'new':
            // For the block: categories new
            // new since last week: 7 * 24 * 60 * 60 = 604800
            $crCategories->add(new \Criteria('', \time() - 604800, '>='));
            $crCategories->add(new \Criteria('', \time(), '<='));
            $crCategories->setSort('');
            $crCategories->setOrder('ASC');
            break;
        case 'hits':
            // For the block: categories hits
            $crCategories->setSort('cat_hits');
            $crCategories->setOrder('DESC');
            break;
        case 'top':
            // For the block: categories top
            $crCategories->setSort('cat_top');
            $crCategories->setOrder('ASC');
            break;
        case 'random':
            // For the block: categories random
            $crCategories->setSort('RAND()');
            break;
    }

    $crCategories->setLimit($limit);
    $categoriesAll = $categoriesHandler->getAll($crCategories);
    unset($crCategories);
    if (\count($categoriesAll) > 0) {
        foreach (\array_keys($categoriesAll) as $i) {
            $block[$i]['id'] = $categoriesAll[$i]->getVar('cat_id');
            $block[$i]['parent_id'] = $categoriesAll[$i]->getVar('cat_parent_id');
            $block[$i]['name'] = \htmlspecialchars($categoriesAll[$i]->getVar('cat_name'), ENT_QUOTES | ENT_HTML5);
            $block[$i]['comments'] = \htmlspecialchars($categoriesAll[$i]->getVar('cat_comments'), ENT_QUOTES | ENT_HTML5);
            $block[$i]['weight'] = \htmlspecialchars($categoriesAll[$i]->getVar('cat_weight'), ENT_QUOTES | ENT_HTML5);
            $block[$i]['theme'] = $categoriesAll[$i]->getVar('cat_theme');
            $block[$i]['default'] = $categoriesAll[$i]->getVar('cat_default');
        }
    }

    return $block;

}

/**
 * Function edit block
 * @param  $options
 * @return string
 */
function b_trombinoscope_categories_edit($options)
{
    require_once \XOOPS_ROOT_PATH . '/modules/trombinoscope/class/categories.php';
    $helper = Helper::getInstance();
    $categoriesHandler = $helper->getHandler('Categories');
    $GLOBALS['xoopsTpl']->assign('trombinoscope_upload_url', \TROMBINOSCOPE_UPLOAD_URL);
    $form = \_MB_TROMBINOSCOPE_DISPLAY;
    $form .= "<input type='hidden' name='options[0]' value='".$options[0]."' >";
    $form .= "<input type='text' name='options[1]' size='5' maxlength='255' value='" . $options[1] . "' >&nbsp;<br>";
    $form .= \_MB_TROMBINOSCOPE_TITLE_LENGTH . " : <input type='text' name='options[2]' size='5' maxlength='255' value='" . $options[2] . "' ><br><br>";
    \array_shift($options);
    \array_shift($options);
    \array_shift($options);

    $crCategories = new \CriteriaCompo();
    $crCategories->add(new \Criteria('cat_id', 0, '!='));
    $crCategories->setSort('cat_id');
    $crCategories->setOrder('ASC');
    $categoriesAll = $categoriesHandler->getAll($crCategories);
    unset($crCategories);
    $form .= \_MB_TROMBINOSCOPE_CATEGORIES_TO_DISPLAY . "<br><select name='options[]' multiple='multiple' size='5'>";
    $form .= "<option value='0' " . (!\in_array(0, $options) && !\in_array('0', $options) ? '' : "selected='selected'") . '>' . \_MB_TROMBINOSCOPE_ALL_CATEGORIES . '</option>';
    foreach (\array_keys($categoriesAll) as $i) {
        $cat_id = $categoriesAll[$i]->getVar('cat_id');
        $form .= "<option value='" . $cat_id . "' " . (!\in_array($cat_id, $options) ? '' : "selected='selected'") . '>' . $categoriesAll[$i]->getVar('cat_name') . '</option>';
    }
    $form .= '</select>';

    return $form;

}
