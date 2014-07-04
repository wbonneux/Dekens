<?php
/*
 * Class that operate on table 'content_rating'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class ContentRatingMySqlDAO implements ContentRatingDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ContentRatingMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM content_rating WHERE content_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM content_rating';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM content_rating ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param contentRating primary key
 	 */
	public function delete($content_id){
		$sql = 'DELETE FROM content_rating WHERE content_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($content_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContentRatingMySql contentRating
 	 */
	public function insert($contentRating){
		$sql = 'INSERT INTO content_rating (rating_sum, rating_count, lastip) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($contentRating->ratingSum);
		$sqlQuery->setNumber($contentRating->ratingCount);
		$sqlQuery->set($contentRating->lastip);

		$id = $this->executeInsert($sqlQuery);	
		$contentRating->contentId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContentRatingMySql contentRating
 	 */
	public function update($contentRating){
		$sql = 'UPDATE content_rating SET rating_sum = ?, rating_count = ?, lastip = ? WHERE content_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($contentRating->ratingSum);
		$sqlQuery->setNumber($contentRating->ratingCount);
		$sqlQuery->set($contentRating->lastip);

		$sqlQuery->setNumber($contentRating->contentId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM content_rating';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByRatingSum($value){
		$sql = 'SELECT * FROM content_rating WHERE rating_sum = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRatingCount($value){
		$sql = 'SELECT * FROM content_rating WHERE rating_count = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLastip($value){
		$sql = 'SELECT * FROM content_rating WHERE lastip = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByRatingSum($value){
		$sql = 'DELETE FROM content_rating WHERE rating_sum = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRatingCount($value){
		$sql = 'DELETE FROM content_rating WHERE rating_count = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLastip($value){
		$sql = 'DELETE FROM content_rating WHERE lastip = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ContentRatingMySql 
	 */
	protected function readRow($row){
		$contentRating = new ContentRating();
		
		$contentRating->contentId = $row['content_id'];
		$contentRating->ratingSum = $row['rating_sum'];
		$contentRating->ratingCount = $row['rating_count'];
		$contentRating->lastip = $row['lastip'];

		return $contentRating;
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
	 * @return ContentRatingMySql 
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