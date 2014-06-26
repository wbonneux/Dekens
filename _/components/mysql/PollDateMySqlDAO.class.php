<?php
/*
 * Class that operate on table 'poll_date'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class PollDateMySqlDAO implements PollDateDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PollDateMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM poll_date WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM poll_date';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM poll_date ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pollDate primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM poll_date WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PollDateMySql pollDate
 	 */
	public function insert($pollDate){
		$sql = 'INSERT INTO poll_date (date, vote_id, poll_id) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($pollDate->date);
		$sqlQuery->setNumber($pollDate->voteId);
		$sqlQuery->setNumber($pollDate->pollId);

		$id = $this->executeInsert($sqlQuery);	
		$pollDate->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PollDateMySql pollDate
 	 */
	public function update($pollDate){
		$sql = 'UPDATE poll_date SET date = ?, vote_id = ?, poll_id = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($pollDate->date);
		$sqlQuery->setNumber($pollDate->voteId);
		$sqlQuery->setNumber($pollDate->pollId);

		$sqlQuery->setNumber($pollDate->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM poll_date';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDate($value){
		$sql = 'SELECT * FROM poll_date WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVoteId($value){
		$sql = 'SELECT * FROM poll_date WHERE vote_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPollId($value){
		$sql = 'SELECT * FROM poll_date WHERE poll_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDate($value){
		$sql = 'DELETE FROM poll_date WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVoteId($value){
		$sql = 'DELETE FROM poll_date WHERE vote_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPollId($value){
		$sql = 'DELETE FROM poll_date WHERE poll_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PollDateMySql 
	 */
	protected function readRow($row){
		$pollDate = new PollDate();
		
		$pollDate->id = $row['id'];
		$pollDate->date = $row['date'];
		$pollDate->voteId = $row['vote_id'];
		$pollDate->pollId = $row['poll_id'];

		return $pollDate;
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
	 * @return PollDateMySql 
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