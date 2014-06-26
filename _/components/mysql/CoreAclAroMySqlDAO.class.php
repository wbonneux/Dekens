<?php
/*
 * Class that operate on table 'core_acl_aro'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class CoreAclAroMySqlDAO implements CoreAclAroDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CoreAclAroMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM core_acl_aro WHERE aro_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM core_acl_aro';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM core_acl_aro ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param coreAclAro primary key
 	 */
	public function delete($aro_id){
		$sql = 'DELETE FROM core_acl_aro WHERE aro_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($aro_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CoreAclAroMySql coreAclAro
 	 */
	public function insert($coreAclAro){
		$sql = 'INSERT INTO core_acl_aro (section_value, value, order_value, name, hidden) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($coreAclAro->sectionValue);
		$sqlQuery->set($coreAclAro->value);
		$sqlQuery->setNumber($coreAclAro->orderValue);
		$sqlQuery->set($coreAclAro->name);
		$sqlQuery->setNumber($coreAclAro->hidden);

		$id = $this->executeInsert($sqlQuery);	
		$coreAclAro->aroId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CoreAclAroMySql coreAclAro
 	 */
	public function update($coreAclAro){
		$sql = 'UPDATE core_acl_aro SET section_value = ?, value = ?, order_value = ?, name = ?, hidden = ? WHERE aro_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($coreAclAro->sectionValue);
		$sqlQuery->set($coreAclAro->value);
		$sqlQuery->setNumber($coreAclAro->orderValue);
		$sqlQuery->set($coreAclAro->name);
		$sqlQuery->setNumber($coreAclAro->hidden);

		$sqlQuery->setNumber($coreAclAro->aroId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM core_acl_aro';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryBySectionValue($value){
		$sql = 'SELECT * FROM core_acl_aro WHERE section_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValue($value){
		$sql = 'SELECT * FROM core_acl_aro WHERE value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrderValue($value){
		$sql = 'SELECT * FROM core_acl_aro WHERE order_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM core_acl_aro WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHidden($value){
		$sql = 'SELECT * FROM core_acl_aro WHERE hidden = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySectionValue($value){
		$sql = 'DELETE FROM core_acl_aro WHERE section_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValue($value){
		$sql = 'DELETE FROM core_acl_aro WHERE value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrderValue($value){
		$sql = 'DELETE FROM core_acl_aro WHERE order_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByName($value){
		$sql = 'DELETE FROM core_acl_aro WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHidden($value){
		$sql = 'DELETE FROM core_acl_aro WHERE hidden = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CoreAclAroMySql 
	 */
	protected function readRow($row){
		$coreAclAro = new CoreAclAro();
		
		$coreAclAro->aroId = $row['aro_id'];
		$coreAclAro->sectionValue = $row['section_value'];
		$coreAclAro->value = $row['value'];
		$coreAclAro->orderValue = $row['order_value'];
		$coreAclAro->name = $row['name'];
		$coreAclAro->hidden = $row['hidden'];

		return $coreAclAro;
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
	 * @return CoreAclAroMySql 
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