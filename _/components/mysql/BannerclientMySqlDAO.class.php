<?php
/*
 * Class that operate on table 'bannerclient'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class BannerclientMySqlDAO implements BannerclientDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return BannerclientMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM bannerclient WHERE cid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM bannerclient';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM bannerclient ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param bannerclient primary key
 	 */
	public function delete($cid){
		$sql = 'DELETE FROM bannerclient WHERE cid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($cid);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param BannerclientMySql bannerclient
 	 */
	public function insert($bannerclient){
		$sql = 'INSERT INTO bannerclient (name, contact, email, extrainfo, checked_out, checked_out_time, editor) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($bannerclient->name);
		$sqlQuery->set($bannerclient->contact);
		$sqlQuery->set($bannerclient->email);
		$sqlQuery->set($bannerclient->extrainfo);
		$sqlQuery->setNumber($bannerclient->checkedOut);
		$sqlQuery->set($bannerclient->checkedOutTime);
		$sqlQuery->set($bannerclient->editor);

		$id = $this->executeInsert($sqlQuery);	
		$bannerclient->cid = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param BannerclientMySql bannerclient
 	 */
	public function update($bannerclient){
		$sql = 'UPDATE bannerclient SET name = ?, contact = ?, email = ?, extrainfo = ?, checked_out = ?, checked_out_time = ?, editor = ? WHERE cid = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($bannerclient->name);
		$sqlQuery->set($bannerclient->contact);
		$sqlQuery->set($bannerclient->email);
		$sqlQuery->set($bannerclient->extrainfo);
		$sqlQuery->setNumber($bannerclient->checkedOut);
		$sqlQuery->set($bannerclient->checkedOutTime);
		$sqlQuery->set($bannerclient->editor);

		$sqlQuery->setNumber($bannerclient->cid);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM bannerclient';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM bannerclient WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContact($value){
		$sql = 'SELECT * FROM bannerclient WHERE contact = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM bannerclient WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByExtrainfo($value){
		$sql = 'SELECT * FROM bannerclient WHERE extrainfo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCheckedOut($value){
		$sql = 'SELECT * FROM bannerclient WHERE checked_out = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCheckedOutTime($value){
		$sql = 'SELECT * FROM bannerclient WHERE checked_out_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEditor($value){
		$sql = 'SELECT * FROM bannerclient WHERE editor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByName($value){
		$sql = 'DELETE FROM bannerclient WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContact($value){
		$sql = 'DELETE FROM bannerclient WHERE contact = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM bannerclient WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByExtrainfo($value){
		$sql = 'DELETE FROM bannerclient WHERE extrainfo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCheckedOut($value){
		$sql = 'DELETE FROM bannerclient WHERE checked_out = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCheckedOutTime($value){
		$sql = 'DELETE FROM bannerclient WHERE checked_out_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEditor($value){
		$sql = 'DELETE FROM bannerclient WHERE editor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return BannerclientMySql 
	 */
	protected function readRow($row){
		$bannerclient = new Bannerclient();
		
		$bannerclient->cid = $row['cid'];
		$bannerclient->name = $row['name'];
		$bannerclient->contact = $row['contact'];
		$bannerclient->email = $row['email'];
		$bannerclient->extrainfo = $row['extrainfo'];
		$bannerclient->checkedOut = $row['checked_out'];
		$bannerclient->checkedOutTime = $row['checked_out_time'];
		$bannerclient->editor = $row['editor'];

		return $bannerclient;
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
	 * @return BannerclientMySql 
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