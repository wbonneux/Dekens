<?php
/*
 * Class that operate on table 'mambots'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class MambotsMySqlDAO implements MambotsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MambotsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mambots WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mambots';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mambots ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param mambot primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM mambots WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MambotsMySql mambot
 	 */
	public function insert($mambot){
		$sql = 'INSERT INTO mambots (name, element, folder, access, ordering, published, iscore, client_id, checked_out, checked_out_time, params) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($mambot->name);
		$sqlQuery->set($mambot->element);
		$sqlQuery->set($mambot->folder);
		$sqlQuery->setNumber($mambot->acces);
		$sqlQuery->setNumber($mambot->ordering);
		$sqlQuery->setNumber($mambot->published);
		$sqlQuery->setNumber($mambot->iscore);
		$sqlQuery->setNumber($mambot->clientId);
		$sqlQuery->setNumber($mambot->checkedOut);
		$sqlQuery->set($mambot->checkedOutTime);
		$sqlQuery->set($mambot->param);

		$id = $this->executeInsert($sqlQuery);	
		$mambot->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MambotsMySql mambot
 	 */
	public function update($mambot){
		$sql = 'UPDATE mambots SET name = ?, element = ?, folder = ?, access = ?, ordering = ?, published = ?, iscore = ?, client_id = ?, checked_out = ?, checked_out_time = ?, params = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($mambot->name);
		$sqlQuery->set($mambot->element);
		$sqlQuery->set($mambot->folder);
		$sqlQuery->setNumber($mambot->acces);
		$sqlQuery->setNumber($mambot->ordering);
		$sqlQuery->setNumber($mambot->published);
		$sqlQuery->setNumber($mambot->iscore);
		$sqlQuery->setNumber($mambot->clientId);
		$sqlQuery->setNumber($mambot->checkedOut);
		$sqlQuery->set($mambot->checkedOutTime);
		$sqlQuery->set($mambot->param);

		$sqlQuery->setNumber($mambot->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mambots';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM mambots WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByElement($value){
		$sql = 'SELECT * FROM mambots WHERE element = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFolder($value){
		$sql = 'SELECT * FROM mambots WHERE folder = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAccess($value){
		$sql = 'SELECT * FROM mambots WHERE access = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrdering($value){
		$sql = 'SELECT * FROM mambots WHERE ordering = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPublished($value){
		$sql = 'SELECT * FROM mambots WHERE published = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIscore($value){
		$sql = 'SELECT * FROM mambots WHERE iscore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByClientId($value){
		$sql = 'SELECT * FROM mambots WHERE client_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCheckedOut($value){
		$sql = 'SELECT * FROM mambots WHERE checked_out = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCheckedOutTime($value){
		$sql = 'SELECT * FROM mambots WHERE checked_out_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParams($value){
		$sql = 'SELECT * FROM mambots WHERE params = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByName($value){
		$sql = 'DELETE FROM mambots WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByElement($value){
		$sql = 'DELETE FROM mambots WHERE element = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFolder($value){
		$sql = 'DELETE FROM mambots WHERE folder = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAccess($value){
		$sql = 'DELETE FROM mambots WHERE access = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrdering($value){
		$sql = 'DELETE FROM mambots WHERE ordering = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPublished($value){
		$sql = 'DELETE FROM mambots WHERE published = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIscore($value){
		$sql = 'DELETE FROM mambots WHERE iscore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByClientId($value){
		$sql = 'DELETE FROM mambots WHERE client_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCheckedOut($value){
		$sql = 'DELETE FROM mambots WHERE checked_out = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCheckedOutTime($value){
		$sql = 'DELETE FROM mambots WHERE checked_out_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParams($value){
		$sql = 'DELETE FROM mambots WHERE params = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MambotsMySql 
	 */
	protected function readRow($row){
		$mambot = new Mambot();
		
		$mambot->id = $row['id'];
		$mambot->name = $row['name'];
		$mambot->element = $row['element'];
		$mambot->folder = $row['folder'];
		$mambot->acces = $row['access'];
		$mambot->ordering = $row['ordering'];
		$mambot->published = $row['published'];
		$mambot->iscore = $row['iscore'];
		$mambot->clientId = $row['client_id'];
		$mambot->checkedOut = $row['checked_out'];
		$mambot->checkedOutTime = $row['checked_out_time'];
		$mambot->param = $row['params'];

		return $mambot;
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
	 * @return MambotsMySql 
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