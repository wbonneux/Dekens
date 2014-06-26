<?php
/*
 * Class that operate on table 'banner'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class BannerMySqlDAO implements BannerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return BannerMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM banner WHERE bid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM banner';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM banner ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param banner primary key
 	 */
	public function delete($bid){
		$sql = 'DELETE FROM banner WHERE bid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($bid);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param BannerMySql banner
 	 */
	public function insert($banner){
		$sql = 'INSERT INTO banner (cid, type, name, imptotal, impmade, clicks, imageurl, clickurl, date, showBanner, checked_out, checked_out_time, editor, custombannercode) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($banner->cid);
		$sqlQuery->set($banner->type);
		$sqlQuery->set($banner->name);
		$sqlQuery->setNumber($banner->imptotal);
		$sqlQuery->setNumber($banner->impmade);
		$sqlQuery->setNumber($banner->click);
		$sqlQuery->set($banner->imageurl);
		$sqlQuery->set($banner->clickurl);
		$sqlQuery->set($banner->date);
		$sqlQuery->setNumber($banner->showBanner);
		$sqlQuery->setNumber($banner->checkedOut);
		$sqlQuery->set($banner->checkedOutTime);
		$sqlQuery->set($banner->editor);
		$sqlQuery->set($banner->custombannercode);

		$id = $this->executeInsert($sqlQuery);	
		$banner->bid = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param BannerMySql banner
 	 */
	public function update($banner){
		$sql = 'UPDATE banner SET cid = ?, type = ?, name = ?, imptotal = ?, impmade = ?, clicks = ?, imageurl = ?, clickurl = ?, date = ?, showBanner = ?, checked_out = ?, checked_out_time = ?, editor = ?, custombannercode = ? WHERE bid = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($banner->cid);
		$sqlQuery->set($banner->type);
		$sqlQuery->set($banner->name);
		$sqlQuery->setNumber($banner->imptotal);
		$sqlQuery->setNumber($banner->impmade);
		$sqlQuery->setNumber($banner->click);
		$sqlQuery->set($banner->imageurl);
		$sqlQuery->set($banner->clickurl);
		$sqlQuery->set($banner->date);
		$sqlQuery->setNumber($banner->showBanner);
		$sqlQuery->setNumber($banner->checkedOut);
		$sqlQuery->set($banner->checkedOutTime);
		$sqlQuery->set($banner->editor);
		$sqlQuery->set($banner->custombannercode);

		$sqlQuery->setNumber($banner->bid);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM banner';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCid($value){
		$sql = 'SELECT * FROM banner WHERE cid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByType($value){
		$sql = 'SELECT * FROM banner WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM banner WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImptotal($value){
		$sql = 'SELECT * FROM banner WHERE imptotal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImpmade($value){
		$sql = 'SELECT * FROM banner WHERE impmade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByClicks($value){
		$sql = 'SELECT * FROM banner WHERE clicks = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImageurl($value){
		$sql = 'SELECT * FROM banner WHERE imageurl = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByClickurl($value){
		$sql = 'SELECT * FROM banner WHERE clickurl = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDate($value){
		$sql = 'SELECT * FROM banner WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByShowBanner($value){
		$sql = 'SELECT * FROM banner WHERE showBanner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCheckedOut($value){
		$sql = 'SELECT * FROM banner WHERE checked_out = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCheckedOutTime($value){
		$sql = 'SELECT * FROM banner WHERE checked_out_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEditor($value){
		$sql = 'SELECT * FROM banner WHERE editor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCustombannercode($value){
		$sql = 'SELECT * FROM banner WHERE custombannercode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCid($value){
		$sql = 'DELETE FROM banner WHERE cid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByType($value){
		$sql = 'DELETE FROM banner WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByName($value){
		$sql = 'DELETE FROM banner WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImptotal($value){
		$sql = 'DELETE FROM banner WHERE imptotal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImpmade($value){
		$sql = 'DELETE FROM banner WHERE impmade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByClicks($value){
		$sql = 'DELETE FROM banner WHERE clicks = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImageurl($value){
		$sql = 'DELETE FROM banner WHERE imageurl = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByClickurl($value){
		$sql = 'DELETE FROM banner WHERE clickurl = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDate($value){
		$sql = 'DELETE FROM banner WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByShowBanner($value){
		$sql = 'DELETE FROM banner WHERE showBanner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCheckedOut($value){
		$sql = 'DELETE FROM banner WHERE checked_out = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCheckedOutTime($value){
		$sql = 'DELETE FROM banner WHERE checked_out_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEditor($value){
		$sql = 'DELETE FROM banner WHERE editor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCustombannercode($value){
		$sql = 'DELETE FROM banner WHERE custombannercode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return BannerMySql 
	 */
	protected function readRow($row){
		$banner = new Banner();
		
		$banner->bid = $row['bid'];
		$banner->cid = $row['cid'];
		$banner->type = $row['type'];
		$banner->name = $row['name'];
		$banner->imptotal = $row['imptotal'];
		$banner->impmade = $row['impmade'];
		$banner->click = $row['clicks'];
		$banner->imageurl = $row['imageurl'];
		$banner->clickurl = $row['clickurl'];
		$banner->date = $row['date'];
		$banner->showBanner = $row['showBanner'];
		$banner->checkedOut = $row['checked_out'];
		$banner->checkedOutTime = $row['checked_out_time'];
		$banner->editor = $row['editor'];
		$banner->custombannercode = $row['custombannercode'];

		return $banner;
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
	 * @return BannerMySql 
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