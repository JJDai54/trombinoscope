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
 * Class Object Handler Members
 */
class MembersHandler extends \XoopsPersistableObjectHandler
{
    /**
     * Constructor
     *
     * @param \XoopsDatabase $db
     */
    public function __construct(\XoopsDatabase $db)
    {
        parent::__construct($db, 'trombinoscope_members', Members::class, 'mbr_id', 'mbr_uid');
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
     * Get Count Members in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    public function getCountMembers($start = 0, $limit = 0, $sort = 'mbr_id ASC, mbr_uid', $order = 'ASC')
    {
        $crCountMembers = new \CriteriaCompo();
        $crCountMembers = $this->getMembersCriteria($crCountMembers, $start, $limit, $sort, $order);
        return $this->getCount($crCountMembers);
    }

    /**
     * Get All Members in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return array
     */
    public function getAllMembers($start = 0, $limit = 0, $sort = 'mbr_id ASC, mbr_uid', $order = 'ASC')
    {
        $crAllMembers = new \CriteriaCompo();
        $crAllMembers = $this->getMembersCriteria($crAllMembers, $start, $limit, $sort, $order);
        return $this->getAll($crAllMembers);
    }

    /**
     * Get Criteria Members
     * @param        $crMembers
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    private function getMembersCriteria($crMembers, $start, $limit, $sort, $order)
    {
        $crMembers->setStart($start);
        $crMembers->setLimit($limit);
        $crMembers->setSort($sort);
        $crMembers->setOrder($order);
        return $crMembers;
    }
    // JJDai --------------------------------------
/* ******************************
 * Change l'etat du champ passer en parametre
 * @$quizId : id du quiz
 * @$field : nom du champ à changer
 * *********************** */
    public function changeEtat($mbrId, $field)
    {
        $sql = "UPDATE " . $this->table . " SET {$field} = not {$field} WHERE mbr_id ={$mbrId};";
        $ret = $this->db->queryf($sql);
        return $ret;
    }

    
}
