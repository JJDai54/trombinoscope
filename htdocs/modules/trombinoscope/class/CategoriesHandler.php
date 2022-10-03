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


/**
 * Class Object Handler Categories
 */
class CategoriesHandler extends \XoopsPersistableObjectHandler
{
    /**
     * Constructor
     *
     * @param \XoopsDatabase $db
     */
    public function __construct(\XoopsDatabase $db)
    {
        parent::__construct($db, 'trombinoscope_categories', Categories::class, 'cat_id', 'cat_name');
    }

    /**
     * @param bool $isNew
     *
     * @return object
     */
    public function create($isNew = true)
    {
        return parent::create($isNew);
    }

    /**
     * retrieve a field
     *
     * @param int $i field id
     * @param null fields
     * @return \XoopsObject|null reference to the {@link Get} object
     */
    public function get($i = null, $fields = null)
    {
        return parent::get($i, $fields);
    }

    /**
     * get inserted id
     *
     * @param null
     * @return int reference to the {@link Get} object
     */
    public function getInsertId()
    {
        return $this->db->getInsertId();
    }

    /**
     * Get Count Categories in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    public function getCountCategories($start = 0, $limit = 0, $sort = 'cat_id ASC, cat_name', $order = 'ASC')
    {
        $crCountCategories = new \CriteriaCompo();
        $crCountCategories = $this->getCategoriesCriteria($crCountCategories, $start, $limit, $sort, $order);
        return $this->getCount($crCountCategories);
    }

    /**
     * Get All Categories in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return array
     */
    public function getAllCategories($start = 0, $limit = 0, $sort = 'cat_weight ASC, cat_name', $order = 'ASC')
    {
        $crAllCategories = new \CriteriaCompo();
        $crAllCategories = $this->getCategoriesCriteria($crAllCategories, $start, $limit, $sort, $order);
        return $this->getAll($crAllCategories);
    }

    /**
     * Get Criteria Categories
     * @param        $crCategories
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    private function getCategoriesCriteria($crCategories, $start, $limit, $sort, $order)
    {
        $crCategories->setStart($start);
        $crCategories->setLimit($limit);
        $crCategories->setSort($sort);
        $crCategories->setOrder($order);
        return $crCategories;
    }

    /**
     * Returns the Category from id
     *
     * @return string
     */
    public function getCategoryFromId($categoryId)
    {
        $categoryId = (int)( $categoryId );
        $category = '';
        if ($categoryId > 0) {
            $categoriesHandler = $helper->getHandler('Categories');
            $categoriesObj = $categoriesHandler->get($categoryId);
            if (\is_object( $categoryObj )) {
                $category = $categoryObj->getVar('cat_name');
            }
        }
        return $category;
    }

/* ******************************
 * renvoi l'Id de la catégorie par default
 * *********************** */
    public function getDefault()
    {
        $criteria = new \Criteria('cat_default', 1, '=');
        $t = $this->getList($criteria);
        return (count($t > 0)) ? array_key_first($t) : 0;
    }
/* ******************************
 * renvoi un tableu de toutes les catégorie avev le nombre de membres
 * *********************** */
     public function getStatistiques()
    {
        global $membersHandler;
        
        $statMembers = $membersHandler->getStatistiques();
        $catList = $this->getList();

        foreach($catList AS $catId=>$name){
            if (isset($statMembers[$catId])) {
                $statMembers[$catId]['name'] = $name;
            }else{
                $statMembers[$catId] = array('catId'    =>  $catId,
                                             'name'     =>  $name,
                                             'actifs'   =>  0,
                                             'inactifs' =>  0);
            }
            
        }
//echo "<hr>Statistiques : <pre>" . print_r($statMembers, true) . "</pre><hr>";        
        return $statMembers;
    }
     public function getStatistiques2()
    {
        global $membersHandler;
        
        $statMember = $membersHandler->getStatistiques();
        $catList = $this->getList();
        $stat = array();
        foreach($catList AS $catId=>$name){
            $stat[$catId]['id'] = $catId;
            $stat[$catId]['name'] = $name;
            if (isset($statMember[$catId])) $stat[$catId]['nbMembers'] = $statMember[$catId];
        }
        return $stat;
    }
/* ******************************
 * Change l'etat du champ passer en parametre
 * *********************** */
    public function changeEtat($catId, $field, $modulo = 2)
    {
        if($field == 'cat_default'){
          $sql = "UPDATE " . $this->table . " SET {$field} = 0;";
          $ret = $this->db->queryf($sql);
        }
        $sql = "UPDATE " . $this->table . " SET {$field} = mod({$field}+1,{$modulo}) WHERE cat_id={$catId};";
        $ret = $this->db->queryf($sql);
        return $ret;
    }
    
/* ******************************
 * Change l'etat du champ passer en parametre
 * *********************** */
    public function setDefault($catId, $field, $value)
    {
        $sql = "UPDATE " . $this->table . " SET {$field} = 0;";
        $ret = $this->db->queryf($sql);

        $sql = "UPDATE " . $this->table . " SET {$field} = {$value} WHERE cat_id={$catId};";
        $ret = $this->db->queryf($sql);
        return $ret;
    }
    
 /* ******************************
 * Update weight
 * *********************** */
 public function updateWeight($cat_id, $action){
 
          $currentEnr = $this->get($cat_id); 
          $cat_weight = $currentEnr->getVar('cat_weight');
          $cat_parent_id  = $currentEnr->getVar('cat_parent_id');
          
//exit ("===>cat_id = {$cat_id}<br>Action = {$action}");          
         switch ($action){
            case 'up'; 
              $sens =  '<';
              $ordre = "DESC";
              break;

            case 'down'; 
              $sens =  '>';
              $ordre = "ASC";
            break;

            case 'first'; 
              $sens =  '<=';
              $ordre = "DESC";
            break;

            case 'last'; 
              $sens =  '>=';
              $ordre = "ASC";
            break;
            
         }
         
        $criteria = new \CriteriaCompo();
        $criteria->add(new \Criteria('cat_weight', $cat_weight, $sens));
        
        // selection du parent ou du groupe des enfants
        $selectParent = ($cat_parent_id == 0) ? '=' : '>';
        $criteria->add(new \Criteria('cat_parent_id', 0, $selectParent));
        
        $criteria->setSort("cat_weight");
		$criteria->setOrder( $ordre );
        $limit = 0;
        $start = 0;
        //$allObjects = $this->getAllQuestions($criteria, $start, $limit, "cat_weight {$ordre}, quest_question {$ordre}, cat_id");
        $allObjects = $this->getObjects($criteria, true);
        if(count($allObjects) == 0  ){
            return true;
        }
        

         switch ($action){
            case 'up'; 
            case 'down'; 
              $key = array_key_first($allObjects);
              echo "===> count = " . count($allObjects) . "<br>key={$key}"; 
              $enr2 = $allObjects[$key]->getValuesCategories();
              $cat_id2 = $enr2['id'];
              $cat_weight2 = $enr2['weight'];
        
              $tbl = $this->table;
              $sql = "UPDATE {$tbl} SET cat_weight={$cat_weight2} WHERE cat_id={$cat_id}";
              $this->db->queryf($sql);
              
              $sql = "UPDATE {$tbl} SET cat_weight={$cat_weight} WHERE cat_id={$cat_id2}";
              $this->db->queryf($sql);
            break;

            case 'first'; 
            case 'last'; 
              
                $keys = array_keys($allObjects);
              
//echo "<hr>cat_id = {$cat_id}<br>cat_weight = {$cat_weight}<br>quiz_id = {$quiz_id}<br><pre>" . print_r($keys, true) . "</pre><hr>";              
              
              for ($h = 0; $h < count($keys); $h++){
                if($h == 0){
                    $key = array_key_last($allObjects);
                    $newWeight = $allObjects[$key]->getVar('cat_weight');
                    $key2update = $keys[$h];
                }else{
                    $key = $keys[$h-1];
                    $newWeight = $allObjects[$key]->getVar('cat_weight');
                    $key2update = $keys[$h];
                }
                $sql = "UPDATE {$this->table} SET cat_weight = {$newWeight} WHERE cat_id = {$key2update}" ;               
                $this->db->queryf($sql);
              }
              
            break;
            
         }

         return true;
 }


   

    
} // ---------------- FIN de la CLASSE -------------
