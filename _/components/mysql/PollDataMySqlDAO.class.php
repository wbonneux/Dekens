<?php
/*
 * Class that operate on table 'poll_data'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class PollDataMySqlDAO implements PollDataDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PollDataMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM poll_data WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM poll_data';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM poll_data ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pollData primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM poll_data WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PollDataMySql pollData
 	 */
	public function insert($pollData){
		$sql = 'INSERT INTO poll_data (pollid, text, hits) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pollData->pollid);
		$sqlQuery->set($pollData->text);
		$sqlQuery->setNumber($pollData->hit);

		$id = $this->executeInsert($sqlQuery);	
		$pollData->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PollDataMySql pollData
 	 */
	public function update($pollData){
		$sql = 'UPDATE poll_data SET pollid = ?, text = ?, hits = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pollData->pollid);
		$sqlQuery->set($pollData->text);
		$sqlQuery->setNumber($pollData->hit);

		$sqlQuery->setNumber($pollData->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM poll_data';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPollid($value){
		$sql = 'SELECT * FROM poll_data WHERE pollid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByText($value){
		$sql = 'SELECT * FROM poll_data WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHits($value){
		$sql = 'SELECT * FROM poll_data WHERE hits = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPollid($value){
		$sql = 'DELETE FROM poll_data WHERE pollid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByText($value){
		$sql = 'DELETE FROM poll_data WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHits($value){
		$sql = 'DELETE FROM poll_data WHERE hits = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PollDataMySql 
	 */
	protected function readRow($row){
		$pollData = new PollData();
		
		$pollData->id = $row['id'];
		$pollData->pollid = $row['pollid'];
		$pollData->text = $row['text'];
		$pollData->hit = $row['hits'];

		return $pollData;
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
	 * @return PollDataMySql 
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