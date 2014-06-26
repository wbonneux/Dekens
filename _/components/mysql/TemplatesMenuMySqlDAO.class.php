<?php
/*
 * Class that operate on table 'templates_menu'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class TemplatesMenuMySqlDAO implements TemplatesMenuDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TemplatesMenuMySql 
	 */
	public function load($template, $menuid){
		$sql = 'SELECT * FROM templates_menu WHERE template = ?  AND menuid = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($template);
		$sqlQuery->setNumber($menuid);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM templates_menu';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM templates_menu ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param templatesMenu primary key
 	 */
	public function delete($template, $menuid){
		$sql = 'DELETE FROM templates_menu WHERE template = ?  AND menuid = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($template);
		$sqlQuery->setNumber($menuid);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TemplatesMenuMySql templatesMenu
 	 */
	public function insert($templatesMenu){
		$sql = 'INSERT INTO templates_menu (client_id, template, menuid) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($templatesMenu->clientId);

		
		$sqlQuery->setNumber($templatesMenu->template);

		$sqlQuery->setNumber($templatesMenu->menuid);

		$this->executeInsert($sqlQuery);	
		//$templatesMenu->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TemplatesMenuMySql templatesMenu
 	 */
	public function update($templatesMenu){
		$sql = 'UPDATE templates_menu SET client_id = ? WHERE template = ?  AND menuid = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($templatesMenu->clientId);

		
		$sqlQuery->setNumber($templatesMenu->template);

		$sqlQuery->setNumber($templatesMenu->menuid);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM templates_menu';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByClientId($value){
		$sql = 'SELECT * FROM templates_menu WHERE client_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByClientId($value){
		$sql = 'DELETE FROM templates_menu WHERE client_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TemplatesMenuMySql 
	 */
	protected function readRow($row){
		$templatesMenu = new TemplatesMenu();
		
		$templatesMenu->template = $row['template'];
		$templatesMenu->menuid = $row['menuid'];
		$templatesMenu->clientId = $row['client_id'];

		return $templatesMenu;
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
	 * @return TemplatesMenuMySql 
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