<?php
/*
 * Class that operate on table 'newsfeeds'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class NewsfeedsMySqlDAO implements NewsfeedsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return NewsfeedsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM newsfeeds WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM newsfeeds';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM newsfeeds ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param newsfeed primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM newsfeeds WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param NewsfeedsMySql newsfeed
 	 */
	public function insert($newsfeed){
		$sql = 'INSERT INTO newsfeeds (catid, name, link, filename, published, numarticles, cache_time, checked_out, checked_out_time, ordering) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($newsfeed->catid);
		$sqlQuery->set($newsfeed->name);
		$sqlQuery->set($newsfeed->link);
		$sqlQuery->set($newsfeed->filename);
		$sqlQuery->setNumber($newsfeed->published);
		$sqlQuery->setNumber($newsfeed->numarticle);
		$sqlQuery->setNumber($newsfeed->cacheTime);
		$sqlQuery->setNumber($newsfeed->checkedOut);
		$sqlQuery->set($newsfeed->checkedOutTime);
		$sqlQuery->setNumber($newsfeed->ordering);

		$id = $this->executeInsert($sqlQuery);	
		$newsfeed->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param NewsfeedsMySql newsfeed
 	 */
	public function update($newsfeed){
		$sql = 'UPDATE newsfeeds SET catid = ?, name = ?, link = ?, filename = ?, published = ?, numarticles = ?, cache_time = ?, checked_out = ?, checked_out_time = ?, ordering = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($newsfeed->catid);
		$sqlQuery->set($newsfeed->name);
		$sqlQuery->set($newsfeed->link);
		$sqlQuery->set($newsfeed->filename);
		$sqlQuery->setNumber($newsfeed->published);
		$sqlQuery->setNumber($newsfeed->numarticle);
		$sqlQuery->setNumber($newsfeed->cacheTime);
		$sqlQuery->setNumber($newsfeed->checkedOut);
		$sqlQuery->set($newsfeed->checkedOutTime);
		$sqlQuery->setNumber($newsfeed->ordering);

		$sqlQuery->setNumber($newsfeed->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM newsfeeds';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCatid($value){
		$sql = 'SELECT * FROM newsfeeds WHERE catid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM newsfeeds WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLink($value){
		$sql = 'SELECT * FROM newsfeeds WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFilename($value){
		$sql = 'SELECT * FROM newsfeeds WHERE filename = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPublished($value){
		$sql = 'SELECT * FROM newsfeeds WHERE published = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumarticles($value){
		$sql = 'SELECT * FROM newsfeeds WHERE numarticles = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCacheTime($value){
		$sql = 'SELECT * FROM newsfeeds WHERE cache_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCheckedOut($value){
		$sql = 'SELECT * FROM newsfeeds WHERE checked_out = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCheckedOutTime($value){
		$sql = 'SELECT * FROM newsfeeds WHERE checked_out_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrdering($value){
		$sql = 'SELECT * FROM newsfeeds WHERE ordering = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCatid($value){
		$sql = 'DELETE FROM newsfeeds WHERE catid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByName($value){
		$sql = 'DELETE FROM newsfeeds WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLink($value){
		$sql = 'DELETE FROM newsfeeds WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFilename($value){
		$sql = 'DELETE FROM newsfeeds WHERE filename = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPublished($value){
		$sql = 'DELETE FROM newsfeeds WHERE published = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumarticles($value){
		$sql = 'DELETE FROM newsfeeds WHERE numarticles = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCacheTime($value){
		$sql = 'DELETE FROM newsfeeds WHERE cache_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCheckedOut($value){
		$sql = 'DELETE FROM newsfeeds WHERE checked_out = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCheckedOutTime($value){
		$sql = 'DELETE FROM newsfeeds WHERE checked_out_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrdering($value){
		$sql = 'DELETE FROM newsfeeds WHERE ordering = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return NewsfeedsMySql 
	 */
	protected function readRow($row){
		$newsfeed = new Newsfeed();
		
		$newsfeed->catid = $row['catid'];
		$newsfeed->id = $row['id'];
		$newsfeed->name = $row['name'];
		$newsfeed->link = $row['link'];
		$newsfeed->filename = $row['filename'];
		$newsfeed->published = $row['published'];
		$newsfeed->numarticle = $row['numarticles'];
		$newsfeed->cacheTime = $row['cache_time'];
		$newsfeed->checkedOut = $row['checked_out'];
		$newsfeed->checkedOutTime = $row['checked_out_time'];
		$newsfeed->ordering = $row['ordering'];

		return $newsfeed;
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
	 * @return NewsfeedsMySql 
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