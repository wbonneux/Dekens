<?php
/*
 * Class that operate on table 'containers'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class ContainersMySqlDAO implements ContainersDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ContainersMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM containers WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM containers';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM containers ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param container primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM containers WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContainersMySql container
 	 */
	public function insert($container){
		$sql = 'INSERT INTO containers (parentid, ordering, published, childcount, name, title, windowtitle, keywords, icon, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($container->parentid);
		$sqlQuery->setNumber($container->ordering);
		$sqlQuery->set($container->published);
		$sqlQuery->setNumber($container->childcount);
		$sqlQuery->set($container->name);
		$sqlQuery->set($container->title);
		$sqlQuery->set($container->windowtitle);
		$sqlQuery->set($container->keyword);
		$sqlQuery->set($container->icon);
		$sqlQuery->set($container->description);

		$id = $this->executeInsert($sqlQuery);	
		$container->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContainersMySql container
 	 */
	public function update($container){
		$sql = 'UPDATE containers SET parentid = ?, ordering = ?, published = ?, childcount = ?, name = ?, title = ?, windowtitle = ?, keywords = ?, icon = ?, description = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($container->parentid);
		$sqlQuery->setNumber($container->ordering);
		$sqlQuery->set($container->published);
		$sqlQuery->setNumber($container->childcount);
		$sqlQuery->set($container->name);
		$sqlQuery->set($container->title);
		$sqlQuery->set($container->windowtitle);
		$sqlQuery->set($container->keyword);
		$sqlQuery->set($container->icon);
		$sqlQuery->set($container->description);

		$sqlQuery->setNumber($container->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM containers';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByParentid($value){
		$sql = 'SELECT * FROM containers WHERE parentid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrdering($value){
		$sql = 'SELECT * FROM containers WHERE ordering = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPublished($value){
		$sql = 'SELECT * FROM containers WHERE published = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByChildcount($value){
		$sql = 'SELECT * FROM containers WHERE childcount = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM containers WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitle($value){
		$sql = 'SELECT * FROM containers WHERE title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWindowtitle($value){
		$sql = 'SELECT * FROM containers WHERE windowtitle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByKeywords($value){
		$sql = 'SELECT * FROM containers WHERE keywords = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIcon($value){
		$sql = 'SELECT * FROM containers WHERE icon = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM containers WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByParentid($value){
		$sql = 'DELETE FROM containers WHERE parentid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrdering($value){
		$sql = 'DELETE FROM containers WHERE ordering = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPublished($value){
		$sql = 'DELETE FROM containers WHERE published = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByChildcount($value){
		$sql = 'DELETE FROM containers WHERE childcount = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByName($value){
		$sql = 'DELETE FROM containers WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitle($value){
		$sql = 'DELETE FROM containers WHERE title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWindowtitle($value){
		$sql = 'DELETE FROM containers WHERE windowtitle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKeywords($value){
		$sql = 'DELETE FROM containers WHERE keywords = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIcon($value){
		$sql = 'DELETE FROM containers WHERE icon = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM containers WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ContainersMySql 
	 */
	protected function readRow($row){
		$container = new Container();
		
		$container->id = $row['id'];
		$container->parentid = $row['parentid'];
		$container->ordering = $row['ordering'];
		$container->published = $row['published'];
		$container->childcount = $row['childcount'];
		$container->name = $row['name'];
		$container->title = $row['title'];
		$container->windowtitle = $row['windowtitle'];
		$container->keyword = $row['keywords'];
		$container->icon = $row['icon'];
		$container->description = $row['description'];

		return $container;
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
	 * @return ContainersMySql 
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