<?php
/*
 * Class that operate on table 'core_acl_aro_sections'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class CoreAclAroSectionsMySqlDAO implements CoreAclAroSectionsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CoreAclAroSectionsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM core_acl_aro_sections WHERE section_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM core_acl_aro_sections';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM core_acl_aro_sections ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param coreAclAroSection primary key
 	 */
	public function delete($section_id){
		$sql = 'DELETE FROM core_acl_aro_sections WHERE section_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($section_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CoreAclAroSectionsMySql coreAclAroSection
 	 */
	public function insert($coreAclAroSection){
		$sql = 'INSERT INTO core_acl_aro_sections (value, order_value, name, hidden) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($coreAclAroSection->value);
		$sqlQuery->setNumber($coreAclAroSection->orderValue);
		$sqlQuery->set($coreAclAroSection->name);
		$sqlQuery->setNumber($coreAclAroSection->hidden);

		$id = $this->executeInsert($sqlQuery);	
		$coreAclAroSection->sectionId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CoreAclAroSectionsMySql coreAclAroSection
 	 */
	public function update($coreAclAroSection){
		$sql = 'UPDATE core_acl_aro_sections SET value = ?, order_value = ?, name = ?, hidden = ? WHERE section_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($coreAclAroSection->value);
		$sqlQuery->setNumber($coreAclAroSection->orderValue);
		$sqlQuery->set($coreAclAroSection->name);
		$sqlQuery->setNumber($coreAclAroSection->hidden);

		$sqlQuery->setNumber($coreAclAroSection->sectionId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM core_acl_aro_sections';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByValue($value){
		$sql = 'SELECT * FROM core_acl_aro_sections WHERE value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrderValue($value){
		$sql = 'SELECT * FROM core_acl_aro_sections WHERE order_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM core_acl_aro_sections WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHidden($value){
		$sql = 'SELECT * FROM core_acl_aro_sections WHERE hidden = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByValue($value){
		$sql = 'DELETE FROM core_acl_aro_sections WHERE value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrderValue($value){
		$sql = 'DELETE FROM core_acl_aro_sections WHERE order_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByName($value){
		$sql = 'DELETE FROM core_acl_aro_sections WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHidden($value){
		$sql = 'DELETE FROM core_acl_aro_sections WHERE hidden = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CoreAclAroSectionsMySql 
	 */
	protected function readRow($row){
		$coreAclAroSection = new CoreAclAroSection();
		
		$coreAclAroSection->sectionId = $row['section_id'];
		$coreAclAroSection->value = $row['value'];
		$coreAclAroSection->orderValue = $row['order_value'];
		$coreAclAroSection->name = $row['name'];
		$coreAclAroSection->hidden = $row['hidden'];

		return $coreAclAroSection;
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
	 * @return CoreAclAroSectionsMySql 
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