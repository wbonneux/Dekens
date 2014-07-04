<?php
/*
 * Class that operate on table 'session'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class SessionMySqlDAO implements SessionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return SessionMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM session WHERE session_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM session';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM session ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param session primary key
 	 */
	public function delete($session_id){
		$sql = 'DELETE FROM session WHERE session_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($session_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SessionMySql session
 	 */
	public function insert($session){
		$sql = 'INSERT INTO session (username, time, guest, userid, usertype, gid) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($session->username);
		$sqlQuery->set($session->time);
		$sqlQuery->setNumber($session->guest);
		$sqlQuery->setNumber($session->userid);
		$sqlQuery->set($session->usertype);
		$sqlQuery->setNumber($session->gid);

		$id = $this->executeInsert($sqlQuery);	
		$session->sessionId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param SessionMySql session
 	 */
	public function update($session){
		$sql = 'UPDATE session SET username = ?, time = ?, guest = ?, userid = ?, usertype = ?, gid = ? WHERE session_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($session->username);
		$sqlQuery->set($session->time);
		$sqlQuery->setNumber($session->guest);
		$sqlQuery->setNumber($session->userid);
		$sqlQuery->set($session->usertype);
		$sqlQuery->setNumber($session->gid);

		$sqlQuery->setNumber($session->sessionId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM session';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUsername($value){
		$sql = 'SELECT * FROM session WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTime($value){
		$sql = 'SELECT * FROM session WHERE time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGuest($value){
		$sql = 'SELECT * FROM session WHERE guest = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUserid($value){
		$sql = 'SELECT * FROM session WHERE userid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsertype($value){
		$sql = 'SELECT * FROM session WHERE usertype = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGid($value){
		$sql = 'SELECT * FROM session WHERE gid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUsername($value){
		$sql = 'DELETE FROM session WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTime($value){
		$sql = 'DELETE FROM session WHERE time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGuest($value){
		$sql = 'DELETE FROM session WHERE guest = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUserid($value){
		$sql = 'DELETE FROM session WHERE userid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsertype($value){
		$sql = 'DELETE FROM session WHERE usertype = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGid($value){
		$sql = 'DELETE FROM session WHERE gid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return SessionMySql 
	 */
	protected function readRow($row){
		$session = new Session();
		
		$session->username = $row['username'];
		$session->time = $row['time'];
		$session->sessionId = $row['session_id'];
		$session->guest = $row['guest'];
		$session->userid = $row['userid'];
		$session->usertype = $row['usertype'];
		$session->gid = $row['gid'];

		return $session;
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
	 * @return SessionMySql 
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