<?php
/*
 * Class that operate on table 'messages_cfg'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class MessagesCfgMySqlDAO implements MessagesCfgDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MessagesCfgMySql 
	 */
	public function load($userId, $cfgName){
		$sql = 'SELECT * FROM messages_cfg WHERE user_id = ?  AND cfg_name = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($userId);
		$sqlQuery->setNumber($cfgName);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM messages_cfg';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM messages_cfg ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param messagesCfg primary key
 	 */
	public function delete($userId, $cfgName){
		$sql = 'DELETE FROM messages_cfg WHERE user_id = ?  AND cfg_name = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($userId);
		$sqlQuery->setNumber($cfgName);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MessagesCfgMySql messagesCfg
 	 */
	public function insert($messagesCfg){
		$sql = 'INSERT INTO messages_cfg (cfg_value, user_id, cfg_name) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($messagesCfg->cfgValue);

		
		$sqlQuery->setNumber($messagesCfg->userId);

		$sqlQuery->setNumber($messagesCfg->cfgName);

		$this->executeInsert($sqlQuery);	
		//$messagesCfg->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MessagesCfgMySql messagesCfg
 	 */
	public function update($messagesCfg){
		$sql = 'UPDATE messages_cfg SET cfg_value = ? WHERE user_id = ?  AND cfg_name = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($messagesCfg->cfgValue);

		
		$sqlQuery->setNumber($messagesCfg->userId);

		$sqlQuery->setNumber($messagesCfg->cfgName);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM messages_cfg';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCfgValue($value){
		$sql = 'SELECT * FROM messages_cfg WHERE cfg_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCfgValue($value){
		$sql = 'DELETE FROM messages_cfg WHERE cfg_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MessagesCfgMySql 
	 */
	protected function readRow($row){
		$messagesCfg = new MessagesCfg();
		
		$messagesCfg->userId = $row['user_id'];
		$messagesCfg->cfgName = $row['cfg_name'];
		$messagesCfg->cfgValue = $row['cfg_value'];

		return $messagesCfg;
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
	 * @return MessagesCfgMySql 
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