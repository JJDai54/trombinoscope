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

//echo "<rh>members-list.php<hr>";
//echoArray('gp',"actif = {$actif}");
        $utility = new \XoopsModules\Trombinoscope\Utility();            
        $permEdit = $utility->getPermissions();            
        $qualitiesList = $qualitiesHandler->getList();
        $helper = \XoopsModules\Trombinoscope\Helper::getInstance();
        //-----------------------------------
       // ----- /Listes de selection pour filtrage -----        
        $filters = array();
  //echo "<hr>Categories<pre>" . print_r($categoriesHandler->getList(), true) . "</pre><hr>";
        //$catList = $categoriesHandler->getList(new \Criteria('cat_actif',1,'='));
        $catList = $categoriesHandler->getList();
        if ($catId == 0) $catId = $categoriesHandler->getDefault();
                                               
        if (count($catList) > 1){
          $inpCat = new \XoopsFormSelect(_CO_TROMBINOSCOPE_CATEGORIE, 'cat_id', $catId);
          //->addOption(0, _CO_TROMBINOSCOPE_ALL);
          $inpCat->addOptionArray($catList);
          $inpCat->setExtra('onchange="document.trombinoscope_filter.submit();"'); // style="width:150px;"
          $filters['categories']['input'] = $inpCat->render();
          $filters['categories']['caption'] = _CO_TROMBINOSCOPE_CATEGORIE;
        }

        $inpQuality = new \XoopsFormSelect(_CO_TROMBINOSCOPE_QUALITY, 'quality_id', $qualityId);
        $inpQuality->addOption(0, _CO_TROMBINOSCOPE_ALL);
        $inpQuality->addOptionArray($qualitiesList);        
        $inpQuality->setExtra('onchange="document.trombinoscope_filter.submit();"');
        $filters['qualities']['input'] = $inpQuality->render();
        $filters['qualities']['caption'] = _CO_TROMBINOSCOPE_QUALITY;
        
        if($permEdit){
        $inpActif = new \XoopsFormSelect(_CO_TROMBINOSCOPE_ACTIF, 'mbr_actif', $actif);
        $inpActif->addOption(-1, _CO_TROMBINOSCOPE_ALL);
        $inpActif->addOption(0, _NO);
        $inpActif->addOption(1, _YES);
        $inpActif->setExtra('onchange="document.trombinoscope_filter.submit();"');
        $filters['actif']['input'] = $inpActif->render();
        $filters['actif']['caption'] = _CO_TROMBINOSCOPE_ACTIF;
        }else{
            $actif = 1;
        }        
        
  	    $GLOBALS['xoopsTpl']->assign('filters', $filters);
       // ----- /Listes de selection pour filtrage -----        

        $crMembers =  new \CriteriaCompo();
        
        if ($op == 'show' && $mbrId > 0){
            //affiche que le membre selectionné
            $crMembers->add(new \Criteria('mbr_id', $mbrId));
        }else{
            //affiche que tous les membres répondants aux critères
            if ($catId > 0)     $crMembers->add(new \Criteria('mbr_cat_id',     $catId));
            if ($qualityId > 0) $crMembers->add(new \Criteria('mbr_quality_id', $qualityId));
            if($actif >= 0)     $crMembers->add(new \Criteria('mbr_actif',      $actif,'='));        
        };        
        
        
/*
        if ($op != 'show') $crMembers->add(New \Criteria('mbr_cat_id', $catId, '='));

*/        
        
        
        
        
        
        
        
        
        
        

        
        $membersCount = $membersHandler->getCount($crMembers);
        $GLOBALS['xoopsTpl']->assign('membersCount', $membersCount);
        if (0 === $mbrId) {
            $crMembers->setStart($start);
            $crMembers->setLimit($limit);
        }
        
        
        
      $crMembers->setOrder("ASC");
      $crMembers->setSort('mbr_firstname,mbr_lastname,mbr_id');
   
        $membersAll = $membersHandler->getAll($crMembers);

        if ($membersCount > 0) {
            $members = [];
            $mbrUid = '';
            // Get All Members
            foreach (\array_keys($membersAll) as $i) {
                $members[$i] = $membersAll[$i]->getValuesMembers();
                $members[$i]['quality'] = $catList[$members[$i]['quality_id']] ;
                
                $mbrUid = $membersAll[$i]->getVar('mbr_uid');
                $keywords[$i] = $mbrUid;
            }
            $GLOBALS['xoopsTpl']->assign('members_list', $members);
            unset($members);
            // Display Navigation
            if ($membersCount > $limit) {
                require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($membersCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }
            $GLOBALS['xoopsTpl']->assign('table_type', $helper->getConfig('table_type'));
            $GLOBALS['xoopsTpl']->assign('panel_type', $helper->getConfig('panel_type'));
            $GLOBALS['xoopsTpl']->assign('numb_col', $helper->getConfig('numb_col'));
            //$GLOBALS['xoopsTpl']->assign('numb_col',5);
            //$GLOBALS['xoopsTpl']->assign('numb_col', $helper->getConfig('numb_col'));
            $GLOBALS['xoopsTpl']->assign('membersCount', $membersCount);
            $GLOBALS['xoopsTpl']->assign('is_fiche',$mbrId > 0);        
            $GLOBALS['xoopsTpl']->assign('permEdit', $permEdit);
            
            if ('show' == $op && '' != $mbrUid) {
                $GLOBALS['xoopsTpl']->assign('xoops_pagetitle', \strip_tags($mbrUid . ' - ' . $GLOBALS['xoopsModule']->getVar('name')));
            }
        }


