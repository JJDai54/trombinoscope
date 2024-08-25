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


/**
 * search callback functions
 *
 * @param $queryarray
 * @param $andor
 * @param $limit
 * @param $offset
 * @param $userid
 * @return array $itemIds
 */
function trombinoscope_search($queryarray, $andor, $limit, $offset, $userid)
{
    $ret = [];
    $helper = \XoopsModules\Trombinoscope\Helper::getInstance();
    // search in table members
    // search keywords
    $elementCount = 0;
    $membersHandler = $helper->getHandler('Members');
    if (\is_array($queryarray)) {
        $elementCount = \count($queryarray);
    }
    if ($elementCount > 0) {
        $crKeywords = new \CriteriaCompo();
        for ($i = 0; $i  <  $elementCount; $i++) {
            $crKeyword = new \CriteriaCompo();
            $crKeyword->add(new \Criteria('mbr_firstname', '%' . $queryarray[$i] . '%', 'LIKE'), 'OR');
            $crKeyword->add(new \Criteria('mbr_lastname', '%' . $queryarray[$i] . '%', 'LIKE'), 'OR');
            $crKeywords->add($crKeyword, $andor);
            unset($crKeyword);
        }
    }
    // search user(s)
    if ($userid && \is_array($userid)) {
        $userid = array_map('\intval', $userid);
        $crUser = new \CriteriaCompo();
        $crUser->add(new \Criteria('mbr_submitter', '(' . \implode(',', $userid) . ')', 'IN'), 'OR');
    } elseif (is_numeric($userid) && $userid > 0) {
        $crUser = new \CriteriaCompo();
        $crUser->add(new \Criteria('mbr_submitter', $userid), 'OR');
    }
    $crSearch = new \CriteriaCompo();
    if (isset($crKeywords)) {
        $crSearch->add($crKeywords, 'AND');
    }
    if (isset($crUser)) {
        $crSearch->add($crUser, 'AND');
    }
    $crSearch->setStart($offset);
    $crSearch->setLimit($limit);
    $crSearch->setSort('mbr_update');
    $crSearch->setOrder('DESC');
    $membersAll = $membersHandler->getAll($crSearch);
    foreach (\array_keys($membersAll) as $i) {
        $ret[] = [
            'image'  => 'assets/icons/16/members.png',
            'link'   => 'members.php?op=show&amp;mbr_id=' . $membersAll[$i]->getVar('mbr_id'),
            'title'  => $membersAll[$i]->getVar('mbr_uid'),
            'time'   => $membersAll[$i]->getVar('mbr_update')
        ];
    }
    unset($crKeywords);
    unset($crKeyword);
    unset($crUser);
    unset($crSearch);

    // search in table categories
    // search keywords
    $elementCount = 0;
    $categoriesHandler = $helper->getHandler('Categories');
    if (\is_array($queryarray)) {
        $elementCount = \count($queryarray);
    }
    if ($elementCount > 0) {
        $crKeywords = new \CriteriaCompo();
        for ($i = 0; $i  <  $elementCount; $i++) {
            $crKeyword = new \CriteriaCompo();
            $crKeyword->add(new \Criteria('cat_parent_id', '%' . $queryarray[$i] . '%', 'LIKE'), 'OR');
            $crKeywords->add($crKeyword, $andor);
            unset($crKeyword);
        }
    }
    // search user(s)
    /* pas de champ cat_submitter, pas utile il n'y aurap beaucoup de categories
    if ($userid && \is_array($userid)) {
        $userid = array_map('\intval', $userid);
        $crUser = new \CriteriaCompo();
        $crUser->add(new \Criteria('cat_submitter', '(' . \implode(',', $userid) . ')', 'IN'), 'OR');
    } elseif (is_numeric($userid) && $userid > 0) {
        $crUser = new \CriteriaCompo();
        $crUser->add(new \Criteria('cat_submitter', $userid), 'OR');
    }
    */
    
    
    
    
    $crSearch = new \CriteriaCompo();
    if (isset($crKeywords)) {
        $crSearch->add($crKeywords, 'AND');
    }
    if (isset($crUser)) {
        $crSearch->add($crUser, 'AND');
    }
    $crSearch->setStart($offset);
    $crSearch->setLimit($limit);
    // $crSearch->setSort('cat_id_date'); // pas utile de gere des dates sur les categories
    $crSearch->setSort('cat_name');
    $crSearch->setOrder('DESC');
    $categoriesAll = $categoriesHandler->getAll($crSearch);
    foreach (\array_keys($categoriesAll) as $i) {
        $ret[] = [
            'image'  => 'assets/icons/16/categories.png',
            'link'   => 'categories.php?op=show&amp;cat_id=' . $categoriesAll[$i]->getVar('cat_id'),
            'title'  => $categoriesAll[$i]->getVar('cat_name'),
        ];
    }

    unset($crKeywords);
    unset($crKeyword);
    unset($crUser);
    unset($crSearch);

    return $ret;

}
