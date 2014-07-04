<?php
/*
 * Class that operate on table 'bannerfinish'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class BannerfinishMySqlDAO implements BannerfinishDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return BannerfinishMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM bannerfinish WHERE bid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM bannerfinish';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM bannerfinish ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param bannerfinish primary key
 	 */
	public function delete($bid){
		$sql = 'DELETE FROM bannerfinish WHERE bid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($bid);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param BannerfinishMySql bannerfinish
 	 */
	public function insert($bannerfinish){
		$sql = 'INSERT INTO bannerfinish (cid, type, name, impressions, clicks, imageurl, datestart, dateend) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($bannerfinish->cid);
		$sqlQuery->set($bannerfinish->type);
		$sqlQuery->set($bannerfinish->name);
		$sqlQuery->setNumber($bannerfinish->impression);
		$sqlQuery->setNumber($bannerfinish->click);
		$sqlQuery->set($bannerfinish->imageurl);
		$sqlQuery->set($bannerfinish->datestart);
		$sqlQuery->set($bannerfinish->dateend);

		$id = $this->executeInsert($sqlQuery);	
		$bannerfinish->bid = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param BannerfinishMySql bannerfinish
 	 */
	public function update($bannerfinish){
		$sql = 'UPDATE bannerfinish SET cid = ?, type = ?, name = ?, impressions = ?, clicks = ?, imageurl = ?, datestart = ?, dateend = ? WHERE bid = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($bannerfinish->cid);
		$sqlQuery->set($bannerfinish->type);
		$sqlQuery->set($bannerfinish->name);
		$sqlQuery->setNumber($bannerfinish->impression);
		$sqlQuery->setNumber($bannerfinish->click);
		$sqlQuery->set($bannerfinish->imageurl);
		$sqlQuery->set($bannerfinish->datestart);
		$sqlQuery->set($bannerfinish->dateend);

		$sqlQuery->setNumber($bannerfinish->bid);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM bannerfinish';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCid($value){
		$sql = 'SELECT * FROM bannerfinish WHERE cid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByType($value){
		$sql = 'SELECT * FROM bannerfinish WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM bannerfinish WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImpressions($value){
		$sql = 'SELECT * FROM bannerfinish WHERE impressions = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByClicks($value){
		$sql = 'SELECT * FROM bannerfinish WHERE clicks = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImageurl($value){
		$sql = 'SELECT * FROM bannerfinish WHERE imageurl = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDatestart($value){
		$sql = 'SELECT * FROM bannerfinish WHERE datestart = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateend($value){
		$sql = 'SELECT * FROM bannerfinish WHERE dateend = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCid($value){
		$sql = 'DELETE FROM bannerfinish WHERE cid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByType($value){
		$sql = 'DELETE FROM bannerfinish WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByName($value){
		$sql = 'DELETE FROM bannerfinish WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImpressions($value){
		$sql = 'DELETE FROM bannerfinish WHERE impressions = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByClicks($value){
		$sql = 'DELETE FROM bannerfinish WHERE clicks = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImageurl($value){
		$sql = 'DELETE FROM bannerfinish WHERE imageurl = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDatestart($value){
		$sql = 'DELETE FROM bannerfinish WHERE datestart = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateend($value){
		$sql = 'DELETE FROM bannerfinish WHERE dateend = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return BannerfinishMySql 
	 */
	protected function readRow($row){
		$bannerfinish = new Bannerfinish();
		
		$bannerfinish->bid = $row['bid'];
		$bannerfinish->cid = $row['cid'];
		$bannerfinish->type = $row['type'];
		$bannerfinish->name = $row['name'];
		$bannerfinish->impression = $row['impressions'];
		$bannerfinish->click = $row['clicks'];
		$bannerfinish->imageurl = $row['imageurl'];
		$bannerfinish->datestart = $row['datestart'];
		$bannerfinish->dateend = $row['dateend'];

		return $bannerfinish;
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
	 * @return BannerfinishMySql 
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