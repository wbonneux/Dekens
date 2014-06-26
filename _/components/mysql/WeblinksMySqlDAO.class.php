<?php
/*
 * Class that operate on table 'weblinks'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class WeblinksMySqlDAO implements WeblinksDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return WeblinksMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM weblinks WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM weblinks';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM weblinks ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param weblink primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM weblinks WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WeblinksMySql weblink
 	 */
	public function insert($weblink){
		$sql = 'INSERT INTO weblinks (catid, sid, title, url, description, date, hits, published, checked_out, checked_out_time, ordering, archived, approved, params) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($weblink->catid);
		$sqlQuery->setNumber($weblink->sid);
		$sqlQuery->set($weblink->title);
		$sqlQuery->set($weblink->url);
		$sqlQuery->set($weblink->description);
		$sqlQuery->set($weblink->date);
		$sqlQuery->setNumber($weblink->hit);
		$sqlQuery->setNumber($weblink->published);
		$sqlQuery->setNumber($weblink->checkedOut);
		$sqlQuery->set($weblink->checkedOutTime);
		$sqlQuery->setNumber($weblink->ordering);
		$sqlQuery->setNumber($weblink->archived);
		$sqlQuery->setNumber($weblink->approved);
		$sqlQuery->set($weblink->param);

		$id = $this->executeInsert($sqlQuery);	
		$weblink->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param WeblinksMySql weblink
 	 */
	public function update($weblink){
		$sql = 'UPDATE weblinks SET catid = ?, sid = ?, title = ?, url = ?, description = ?, date = ?, hits = ?, published = ?, checked_out = ?, checked_out_time = ?, ordering = ?, archived = ?, approved = ?, params = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($weblink->catid);
		$sqlQuery->setNumber($weblink->sid);
		$sqlQuery->set($weblink->title);
		$sqlQuery->set($weblink->url);
		$sqlQuery->set($weblink->description);
		$sqlQuery->set($weblink->date);
		$sqlQuery->setNumber($weblink->hit);
		$sqlQuery->setNumber($weblink->published);
		$sqlQuery->setNumber($weblink->checkedOut);
		$sqlQuery->set($weblink->checkedOutTime);
		$sqlQuery->setNumber($weblink->ordering);
		$sqlQuery->setNumber($weblink->archived);
		$sqlQuery->setNumber($weblink->approved);
		$sqlQuery->set($weblink->param);

		$sqlQuery->setNumber($weblink->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM weblinks';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCatid($value){
		$sql = 'SELECT * FROM weblinks WHERE catid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySid($value){
		$sql = 'SELECT * FROM weblinks WHERE sid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitle($value){
		$sql = 'SELECT * FROM weblinks WHERE title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUrl($value){
		$sql = 'SELECT * FROM weblinks WHERE url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM weblinks WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDate($value){
		$sql = 'SELECT * FROM weblinks WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHits($value){
		$sql = 'SELECT * FROM weblinks WHERE hits = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPublished($value){
		$sql = 'SELECT * FROM weblinks WHERE published = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCheckedOut($value){
		$sql = 'SELECT * FROM weblinks WHERE checked_out = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCheckedOutTime($value){
		$sql = 'SELECT * FROM weblinks WHERE checked_out_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrdering($value){
		$sql = 'SELECT * FROM weblinks WHERE ordering = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByArchived($value){
		$sql = 'SELECT * FROM weblinks WHERE archived = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApproved($value){
		$sql = 'SELECT * FROM weblinks WHERE approved = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParams($value){
		$sql = 'SELECT * FROM weblinks WHERE params = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCatid($value){
		$sql = 'DELETE FROM weblinks WHERE catid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySid($value){
		$sql = 'DELETE FROM weblinks WHERE sid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitle($value){
		$sql = 'DELETE FROM weblinks WHERE title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUrl($value){
		$sql = 'DELETE FROM weblinks WHERE url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM weblinks WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDate($value){
		$sql = 'DELETE FROM weblinks WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHits($value){
		$sql = 'DELETE FROM weblinks WHERE hits = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPublished($value){
		$sql = 'DELETE FROM weblinks WHERE published = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCheckedOut($value){
		$sql = 'DELETE FROM weblinks WHERE checked_out = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCheckedOutTime($value){
		$sql = 'DELETE FROM weblinks WHERE checked_out_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrdering($value){
		$sql = 'DELETE FROM weblinks WHERE ordering = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByArchived($value){
		$sql = 'DELETE FROM weblinks WHERE archived = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApproved($value){
		$sql = 'DELETE FROM weblinks WHERE approved = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParams($value){
		$sql = 'DELETE FROM weblinks WHERE params = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return WeblinksMySql 
	 */
	protected function readRow($row){
		$weblink = new Weblink();
		
		$weblink->id = $row['id'];
		$weblink->catid = $row['catid'];
		$weblink->sid = $row['sid'];
		$weblink->title = $row['title'];
		$weblink->url = $row['url'];
		$weblink->description = $row['description'];
		$weblink->date = $row['date'];
		$weblink->hit = $row['hits'];
		$weblink->published = $row['published'];
		$weblink->checkedOut = $row['checked_out'];
		$weblink->checkedOutTime = $row['checked_out_time'];
		$weblink->ordering = $row['ordering'];
		$weblink->archived = $row['archived'];
		$weblink->approved = $row['approved'];
		$weblink->param = $row['params'];

		return $weblink;
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
	 * @return WeblinksMySql 
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