<?php
/*
 * Class that operate on table 'content_frontpage'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class ContentFrontpageMySqlDAO implements ContentFrontpageDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ContentFrontpageMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM content_frontpage WHERE content_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM content_frontpage';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM content_frontpage ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param contentFrontpage primary key
 	 */
	public function delete($content_id){
		$sql = 'DELETE FROM content_frontpage WHERE content_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($content_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContentFrontpageMySql contentFrontpage
 	 */
	public function insert($contentFrontpage){
		$sql = 'INSERT INTO content_frontpage (ordering) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($contentFrontpage->ordering);

		$id = $this->executeInsert($sqlQuery);	
		$contentFrontpage->contentId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContentFrontpageMySql contentFrontpage
 	 */
	public function update($contentFrontpage){
		$sql = 'UPDATE content_frontpage SET ordering = ? WHERE content_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($contentFrontpage->ordering);

		$sqlQuery->setNumber($contentFrontpage->contentId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM content_frontpage';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByOrdering($value){
		$sql = 'SELECT * FROM content_frontpage WHERE ordering = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByOrdering($value){
		$sql = 'DELETE FROM content_frontpage WHERE ordering = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ContentFrontpageMySql 
	 */
	protected function readRow($row){
		$contentFrontpage = new ContentFrontpage();
		
		$contentFrontpage->contentId = $row['content_id'];
		$contentFrontpage->ordering = $row['ordering'];

		return $contentFrontpage;
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
	 * @return ContentFrontpageMySql 
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