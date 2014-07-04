<?php
/*
 * Class that operate on table 'core_acl_aro_groups'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class CoreAclAroGroupsMySqlDAO implements CoreAclAroGroupsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CoreAclAroGroupsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM core_acl_aro_groups WHERE group_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM core_acl_aro_groups';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM core_acl_aro_groups ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param coreAclAroGroup primary key
 	 */
	public function delete($group_id){
		$sql = 'DELETE FROM core_acl_aro_groups WHERE group_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($group_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CoreAclAroGroupsMySql coreAclAroGroup
 	 */
	public function insert($coreAclAroGroup){
		$sql = 'INSERT INTO core_acl_aro_groups (parent_id, name, lft, rgt) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($coreAclAroGroup->parentId);
		$sqlQuery->set($coreAclAroGroup->name);
		$sqlQuery->setNumber($coreAclAroGroup->lft);
		$sqlQuery->setNumber($coreAclAroGroup->rgt);

		$id = $this->executeInsert($sqlQuery);	
		$coreAclAroGroup->groupId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CoreAclAroGroupsMySql coreAclAroGroup
 	 */
	public function update($coreAclAroGroup){
		$sql = 'UPDATE core_acl_aro_groups SET parent_id = ?, name = ?, lft = ?, rgt = ? WHERE group_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($coreAclAroGroup->parentId);
		$sqlQuery->set($coreAclAroGroup->name);
		$sqlQuery->setNumber($coreAclAroGroup->lft);
		$sqlQuery->setNumber($coreAclAroGroup->rgt);

		$sqlQuery->setNumber($coreAclAroGroup->groupId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM core_acl_aro_groups';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByParentId($value){
		$sql = 'SELECT * FROM core_acl_aro_groups WHERE parent_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM core_acl_aro_groups WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLft($value){
		$sql = 'SELECT * FROM core_acl_aro_groups WHERE lft = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRgt($value){
		$sql = 'SELECT * FROM core_acl_aro_groups WHERE rgt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByParentId($value){
		$sql = 'DELETE FROM core_acl_aro_groups WHERE parent_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByName($value){
		$sql = 'DELETE FROM core_acl_aro_groups WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLft($value){
		$sql = 'DELETE FROM core_acl_aro_groups WHERE lft = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRgt($value){
		$sql = 'DELETE FROM core_acl_aro_groups WHERE rgt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CoreAclAroGroupsMySql 
	 */
	protected function readRow($row){
		$coreAclAroGroup = new CoreAclAroGroup();
		
		$coreAclAroGroup->groupId = $row['group_id'];
		$coreAclAroGroup->parentId = $row['parent_id'];
		$coreAclAroGroup->name = $row['name'];
		$coreAclAroGroup->lft = $row['lft'];
		$coreAclAroGroup->rgt = $row['rgt'];

		return $coreAclAroGroup;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return CoreAclAroGroupsMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>