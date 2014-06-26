<?php
/*
 * Class that operate on table 'core_acl_groups_aro_map'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class CoreAclGroupsAroMapMySqlDAO implements CoreAclGroupsAroMapDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CoreAclGroupsAroMapMySql 
	 */
	public function load($groupId, $sectionValue, $aroId){
		$sql = 'SELECT * FROM core_acl_groups_aro_map WHERE group_id = ?  AND section_value = ?  AND aro_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($groupId);
		$sqlQuery->setNumber($sectionValue);
		$sqlQuery->setNumber($aroId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM core_acl_groups_aro_map';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM core_acl_groups_aro_map ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param coreAclGroupsAroMap primary key
 	 */
	public function delete($groupId, $sectionValue, $aroId){
		$sql = 'DELETE FROM core_acl_groups_aro_map WHERE group_id = ?  AND section_value = ?  AND aro_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($groupId);
		$sqlQuery->setNumber($sectionValue);
		$sqlQuery->setNumber($aroId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CoreAclGroupsAroMapMySql coreAclGroupsAroMap
 	 */
	public function insert($coreAclGroupsAroMap){
		$sql = 'INSERT INTO core_acl_groups_aro_map ( group_id, section_value, aro_id) VALUES ( ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($coreAclGroupsAroMap->groupId);

		$sqlQuery->setNumber($coreAclGroupsAroMap->sectionValue);

		$sqlQuery->setNumber($coreAclGroupsAroMap->aroId);

		$this->executeInsert($sqlQuery);	
		//$coreAclGroupsAroMap->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CoreAclGroupsAroMapMySql coreAclGroupsAroMap
 	 */
	public function update($coreAclGroupsAroMap){
		$sql = 'UPDATE core_acl_groups_aro_map SET  WHERE group_id = ?  AND section_value = ?  AND aro_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($coreAclGroupsAroMap->groupId);

		$sqlQuery->setNumber($coreAclGroupsAroMap->sectionValue);

		$sqlQuery->setNumber($coreAclGroupsAroMap->aroId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM core_acl_groups_aro_map';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return CoreAclGroupsAroMapMySql 
	 */
	protected function readRow($row){
		$coreAclGroupsAroMap = new CoreAclGroupsAroMap();
		
		$coreAclGroupsAroMap->groupId = $row['group_id'];
		$coreAclGroupsAroMap->sectionValue = $row['section_value'];
		$coreAclGroupsAroMap->aroId = $row['aro_id'];

		return $coreAclGroupsAroMap;
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
	 * @return CoreAclGroupsAroMapMySql 
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