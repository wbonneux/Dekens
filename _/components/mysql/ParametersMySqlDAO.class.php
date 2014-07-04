<?php
/*
 * Class that operate on table 'parameters'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class ParametersMySqlDAO implements ParametersDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ParametersMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM parameters WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM parameters';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM parameters ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param parameter primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM parameters WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ParametersMySql parameter
 	 */
	public function insert($parameter){
		$sql = 'INSERT INTO parameters (param_name, param_file, param_version, params) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($parameter->paramName);
		$sqlQuery->set($parameter->paramFile);
		$sqlQuery->set($parameter->paramVersion);
		$sqlQuery->set($parameter->param);

		$id = $this->executeInsert($sqlQuery);	
		$parameter->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ParametersMySql parameter
 	 */
	public function update($parameter){
		$sql = 'UPDATE parameters SET param_name = ?, param_file = ?, param_version = ?, params = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($parameter->paramName);
		$sqlQuery->set($parameter->paramFile);
		$sqlQuery->set($parameter->paramVersion);
		$sqlQuery->set($parameter->param);

		$sqlQuery->setNumber($parameter->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM parameters';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByParamName($value){
		$sql = 'SELECT * FROM parameters WHERE param_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParamFile($value){
		$sql = 'SELECT * FROM parameters WHERE param_file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParamVersion($value){
		$sql = 'SELECT * FROM parameters WHERE param_version = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParams($value){
		$sql = 'SELECT * FROM parameters WHERE params = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByParamName($value){
		$sql = 'DELETE FROM parameters WHERE param_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParamFile($value){
		$sql = 'DELETE FROM parameters WHERE param_file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParamVersion($value){
		$sql = 'DELETE FROM parameters WHERE param_version = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParams($value){
		$sql = 'DELETE FROM parameters WHERE params = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ParametersMySql 
	 */
	protected function readRow($row){
		$parameter = new Parameter();
		
		$parameter->id = $row['id'];
		$parameter->paramName = $row['param_name'];
		$parameter->paramFile = $row['param_file'];
		$parameter->paramVersion = $row['param_version'];
		$parameter->param = $row['params'];

		return $parameter;
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
	 * @return ParametersMySql 
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