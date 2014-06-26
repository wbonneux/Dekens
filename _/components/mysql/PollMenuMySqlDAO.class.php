<?php
/*
 * Class that operate on table 'poll_menu'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class PollMenuMySqlDAO implements PollMenuDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PollMenuMySql 
	 */
	public function load($pollid, $menuid){
		$sql = 'SELECT * FROM poll_menu WHERE pollid = ?  AND menuid = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($pollid);
		$sqlQuery->setNumber($menuid);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM poll_menu';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM poll_menu ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pollMenu primary key
 	 */
	public function delete($pollid, $menuid){
		$sql = 'DELETE FROM poll_menu WHERE pollid = ?  AND menuid = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($pollid);
		$sqlQuery->setNumber($menuid);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PollMenuMySql pollMenu
 	 */
	public function insert($pollMenu){
		$sql = 'INSERT INTO poll_menu ( pollid, menuid) VALUES ( ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($pollMenu->pollid);

		$sqlQuery->setNumber($pollMenu->menuid);

		$this->executeInsert($sqlQuery);	
		//$pollMenu->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PollMenuMySql pollMenu
 	 */
	public function update($pollMenu){
		$sql = 'UPDATE poll_menu SET  WHERE pollid = ?  AND menuid = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($pollMenu->pollid);

		$sqlQuery->setNumber($pollMenu->menuid);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM poll_menu';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return PollMenuMySql 
	 */
	protected function readRow($row){
		$pollMenu = new PollMenu();
		
		$pollMenu->pollid = $row['pollid'];
		$pollMenu->menuid = $row['menuid'];

		return $pollMenu;
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
	 * @return PollMenuMySql 
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