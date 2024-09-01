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


/**
 * Class Object Handler Qualities
 */
class QualitiesHandler extends \XoopsPersistableObjectHandler
{
    /**
     * Constructor
     *
     * @param \XoopsDatabase $db
     */
    public function __construct(\XoopsDatabase $db)
    {
        parent::__construct($db, 'trombinoscope_qualities', Qualities::class, 'quality_id', 'quality_name');
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
     * Get Count Qualities in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    public function getCountQualities($start = 0, $limit = 0, $sort = 'quality_id ASC, quality_name', $order = 'ASC')
    {
        $crCountQualities = new \CriteriaCompo();
        $crCountQualities = $this->getQualitiesCriteria($crCountQualities, $start, $limit, $sort, $order);
        return $this->getCount($crCountQualities);
    }

    /**
     * Get All Qualities in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return array
     */
    public function getAllQualities($start = 0, $limit = 0, $sort = 'quality_weight ASC, quality_name', $order = 'ASC')
    {
        $crAllQualities = new \CriteriaCompo();
        $crAllQualities = $this->getQualitiesCriteria($crAllQualities, $start, $limit, $sort, $order);
        return $this->getAll($crAllQualities);
    }

    /**
     * Get Criteria Qualities
     * @param        $crQualities
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    private function getQualitiesCriteria($crQualities, $start, $limit, $sort, $order)
    {
        $crQualities->setStart($start);
        $crQualities->setLimit($limit);
        $crQualities->setSort($sort);
        $crQualities->setOrder($order);
        return $crQualities;
    }

    /**
     * Returns the Quality from id
     *
     * @return string
     */
    public function getQualityFromId($qualityId)
    {
        $qualityId = (int)( $qualityId );
        $quality = '';
        if ($qualityId > 0) {
            $qualitiesHandler = $helper->getHandler('Qualities');
            $qualitiesObj = $qualitiesHandler->get($qualityId);
            if (\is_object( $qualityObj )) {
                $quality = $qualityObj->getVar('quality_name');
            }
        }
        return $quality;
    }

/* ******************************
 * renvoi l'Id de la qualité par default
 * *********************** */
    public function getDefault()
    {
        $criteria = new \Criteria('quality_default', 1, '=');
        $t = $this->getList($criteria);
        return (is_array($t) && count($t) > 0) ? array_key_first($t) : 0;
    }

/* ******************************
 * Change l'etat du champ passer en parametre
 * *********************** */
    public function changeEtat($QualiyId, $field, $modulo = 2)
    {
        if($field == 'quality_default'){
          $sql = "UPDATE " . $this->table . " SET {$field} = 0;";
          $ret = $this->db->queryf($sql);
        }
        $sql = "UPDATE " . $this->table . " SET {$field} = mod({$field}+1,{$modulo}) WHERE quality_id={$QualiyId};";
        $ret = $this->db->queryf($sql);
        return $ret;
    }
    
/* ******************************
 * Change l'etat du champ passer en parametre
 * *********************** */
    public function setDefault($QualiyId, $field, $value)
    {
        $sql = "UPDATE " . $this->table . " SET {$field} = 0;";
        $ret = $this->db->queryf($sql);

        $sql = "UPDATE " . $this->table . " SET {$field} = {$value} WHERE quality_id={$QualiyId};";
        $ret = $this->db->queryf($sql);
        return $ret;
    }
    
 /* ******************************
 * Update weight
 * *********************** */
 public function updateWeight($quality_id, $action){
 
          $currentEnr = $this->get($quality_id); 
          $quality_weight = $currentEnr->getVar('quality_weight');
          $quality_parent_id  = $currentEnr->getVar('quality_parent_id');
          
//exit ("===>quality_id = {$quality_id}<br>Action = {$action}");          
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
        $criteria->add(new \Criteria('quality_weight', $quality_weight, $sens));
        
        // selection du parent ou du groupe des enfants
        $selectParent = ($quality_parent_id == 0) ? '=' : '>';
        $criteria->add(new \Criteria('quality_parent_id', 0, $selectParent));
        
        $criteria->setSort("quality_weight");
		$criteria->setOrder( $ordre );
        $limit = 0;
        $start = 0;
        //$allObjects = $this->getAllQuestions($criteria, $start, $limit, "quality_weight {$ordre}, quest_question {$ordre}, quality_id");
        $allObjects = $this->getObjects($criteria, true);
        if(count($allObjects) == 0  ){
            return true;
        }
        

         switch ($action){
            case 'up'; 
            case 'down'; 
              $key = array_key_first($allObjects);
              echo "===> count = " . count($allObjects) . "<br>key={$key}"; 
              $enr2 = $allObjects[$key]->getValuesQualities();
              $quality_id2 = $enr2['id'];
              $quality_weight2 = $enr2['weight'];
        
              $tbl = $this->table;
              $sql = "UPDATE {$tbl} SET quality_weight={$quality_weight2} WHERE quality_id={$quality_id}";
              $this->db->queryf($sql);
              
              $sql = "UPDATE {$tbl} SET quality_weight={$quality_weight} WHERE quality_id={$quality_id2}";
              $this->db->queryf($sql);
            break;

            case 'first'; 
            case 'last'; 
              
                $keys = array_keys($allObjects);
              
//echo "<hr>quality_id = {$quality_id}<br>quality_weight = {$quality_weight}<br>quiz_id = {$quiz_id}<br><pre>" . print_r($keys, true) . "</pre><hr>";              
              
              for ($h = 0; $h < count($keys); $h++){
                if($h == 0){
                    $key = array_key_last($allObjects);
                    $newWeight = $allObjects[$key]->getVar('quality_weight');
                    $key2update = $keys[$h];
                }else{
                    $key = $keys[$h-1];
                    $newWeight = $allObjects[$key]->getVar('quality_weight');
                    $key2update = $keys[$h];
                }
                $sql = "UPDATE {$this->table} SET quality_weight = {$newWeight} WHERE quality_id = {$key2update}" ;               
                $this->db->queryf($sql);
              }
              
            break;
            
         }

         return true;
 }


   

    
} // ---------------- FIN de la CLASSE -------------
