<?php
/*
 * Class that operate on table 'modules_menu'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class ModulesMenuMySqlDAO implements ModulesMenuDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ModulesMenuMySql 
	 */
	public function load($moduleid, $menuid){
		$sql = 'SELECT * FROM modules_menu WHERE moduleid = ?  AND menuid = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($moduleid);
		$sqlQuery->setNumber($menuid);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM modules_menu';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM modules_menu ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param modulesMenu primary key
 	 */
	public function delete($moduleid, $menuid){
		$sql = 'DELETE FROM modules_menu WHERE moduleid = ?  AND menuid = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($moduleid);
		$sqlQuery->setNumber($menuid);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ModulesMenuMySql modulesMenu
 	 */
	public function insert($modulesMenu){
		$sql = 'INSERT INTO modules_menu ( moduleid, menuid) VALUES ( ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($modulesMenu->moduleid);

		$sqlQuery->setNumber($modulesMenu->menuid);

		$this->executeInsert($sqlQuery);	
		//$modulesMenu->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ModulesMenuMySql modulesMenu
 	 */
	public function update($modulesMenu){
		$sql = 'UPDATE modules_menu SET  WHERE moduleid = ?  AND menuid = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($modulesMenu->moduleid);

		$sqlQuery->setNumber($modulesMenu->menuid);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM modules_menu';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return ModulesMenuMySql 
	 */
	protected function readRow($row){
		$modulesMenu = new ModulesMenu();
		
		$modulesMenu->moduleid = $row['moduleid'];
		$modulesMenu->menuid = $row['menuid'];

		return $modulesMenu;
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
	 * @return ModulesMenuMySql 
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