<?php
/*
 * Class that operate on table 'menu'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class MenuMySqlDAO implements MenuDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MenuMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM menu WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM menu';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM menu ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param menu primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM menu WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MenuMySql menu
 	 */
	public function insert($menu){
		$sql = 'INSERT INTO menu (menutype, name, link, type, published, parent, componentid, sublevel, ordering, checked_out, checked_out_time, pollid, browserNav, access, utaccess, params) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($menu->menutype);
		$sqlQuery->set($menu->name);
		$sqlQuery->set($menu->link);
		$sqlQuery->set($menu->type);
		$sqlQuery->setNumber($menu->published);
		$sqlQuery->setNumber($menu->parent);
		$sqlQuery->setNumber($menu->componentid);
		$sqlQuery->setNumber($menu->sublevel);
		$sqlQuery->setNumber($menu->ordering);
		$sqlQuery->setNumber($menu->checkedOut);
		$sqlQuery->set($menu->checkedOutTime);
		$sqlQuery->setNumber($menu->pollid);
		$sqlQuery->setNumber($menu->browserNav);
		$sqlQuery->setNumber($menu->acces);
		$sqlQuery->setNumber($menu->utacces);
		$sqlQuery->set($menu->param);

		$id = $this->executeInsert($sqlQuery);	
		$menu->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MenuMySql menu
 	 */
	public function update($menu){
		$sql = 'UPDATE menu SET menutype = ?, name = ?, link = ?, type = ?, published = ?, parent = ?, componentid = ?, sublevel = ?, ordering = ?, checked_out = ?, checked_out_time = ?, pollid = ?, browserNav = ?, access = ?, utaccess = ?, params = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($menu->menutype);
		$sqlQuery->set($menu->name);
		$sqlQuery->set($menu->link);
		$sqlQuery->set($menu->type);
		$sqlQuery->setNumber($menu->published);
		$sqlQuery->setNumber($menu->parent);
		$sqlQuery->setNumber($menu->componentid);
		$sqlQuery->setNumber($menu->sublevel);
		$sqlQuery->setNumber($menu->ordering);
		$sqlQuery->setNumber($menu->checkedOut);
		$sqlQuery->set($menu->checkedOutTime);
		$sqlQuery->setNumber($menu->pollid);
		$sqlQuery->setNumber($menu->browserNav);
		$sqlQuery->setNumber($menu->acces);
		$sqlQuery->setNumber($menu->utacces);
		$sqlQuery->set($menu->param);

		$sqlQuery->setNumber($menu->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM menu';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByMenutype($value){
		$sql = 'SELECT * FROM menu WHERE menutype = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM menu WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLink($value){
		$sql = 'SELECT * FROM menu WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByType($value){
		$sql = 'SELECT * FROM menu WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPublished($value){
		$sql = 'SELECT * FROM menu WHERE published = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParent($value){
		$sql = 'SELECT * FROM menu WHERE parent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComponentid($value){
		$sql = 'SELECT * FROM menu WHERE componentid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySublevel($value){
		$sql = 'SELECT * FROM menu WHERE sublevel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrdering($value){
		$sql = 'SELECT * FROM menu WHERE ordering = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCheckedOut($value){
		$sql = 'SELECT * FROM menu WHERE checked_out = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCheckedOutTime($value){
		$sql = 'SELECT * FROM menu WHERE checked_out_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPollid($value){
		$sql = 'SELECT * FROM menu WHERE pollid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBrowserNav($value){
		$sql = 'SELECT * FROM menu WHERE browserNav = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAccess($value){
		$sql = 'SELECT * FROM menu WHERE access = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUtaccess($value){
		$sql = 'SELECT * FROM menu WHERE utaccess = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParams($value){
		$sql = 'SELECT * FROM menu WHERE params = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByMenutype($value){
		$sql = 'DELETE FROM menu WHERE menutype = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByName($value){
		$sql = 'DELETE FROM menu WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLink($value){
		$sql = 'DELETE FROM menu WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByType($value){
		$sql = 'DELETE FROM menu WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPublished($value){
		$sql = 'DELETE FROM menu WHERE published = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParent($value){
		$sql = 'DELETE FROM menu WHERE parent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComponentid($value){
		$sql = 'DELETE FROM menu WHERE componentid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySublevel($value){
		$sql = 'DELETE FROM menu WHERE sublevel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrdering($value){
		$sql = 'DELETE FROM menu WHERE ordering = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCheckedOut($value){
		$sql = 'DELETE FROM menu WHERE checked_out = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCheckedOutTime($value){
		$sql = 'DELETE FROM menu WHERE checked_out_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPollid($value){
		$sql = 'DELETE FROM menu WHERE pollid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBrowserNav($value){
		$sql = 'DELETE FROM menu WHERE browserNav = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAccess($value){
		$sql = 'DELETE FROM menu WHERE access = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUtaccess($value){
		$sql = 'DELETE FROM menu WHERE utaccess = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParams($value){
		$sql = 'DELETE FROM menu WHERE params = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MenuMySql 
	 */
	protected function readRow($row){
		$menu = new Menu();
		
		$menu->id = $row['id'];
		$menu->menutype = $row['menutype'];
		$menu->name = $row['name'];
		$menu->link = $row['link'];
		$menu->type = $row['type'];
		$menu->published = $row['published'];
		$menu->parent = $row['parent'];
		$menu->componentid = $row['componentid'];
		$menu->sublevel = $row['sublevel'];
		$menu->ordering = $row['ordering'];
		$menu->checkedOut = $row['checked_out'];
		$menu->checkedOutTime = $row['checked_out_time'];
		$menu->pollid = $row['pollid'];
		$menu->browserNav = $row['browserNav'];
		$menu->acces = $row['access'];
		$menu->utacces = $row['utaccess'];
		$menu->param = $row['params'];

		return $menu;
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
	 * @return MenuMySql 
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