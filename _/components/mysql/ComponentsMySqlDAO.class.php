<?php
/*
 * Class that operate on table 'components'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class ComponentsMySqlDAO implements ComponentsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ComponentsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM components WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM components';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM components ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param component primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM components WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ComponentsMySql component
 	 */
	public function insert($component){
		$sql = 'INSERT INTO components (name, link, menuid, parent, admin_menu_link, admin_menu_alt, option, ordering, admin_menu_img, iscore, params) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($component->name);
		$sqlQuery->set($component->link);
		$sqlQuery->setNumber($component->menuid);
		$sqlQuery->setNumber($component->parent);
		$sqlQuery->set($component->adminMenuLink);
		$sqlQuery->set($component->adminMenuAlt);
		$sqlQuery->set($component->option);
		$sqlQuery->setNumber($component->ordering);
		$sqlQuery->set($component->adminMenuImg);
		$sqlQuery->setNumber($component->iscore);
		$sqlQuery->set($component->param);

		$id = $this->executeInsert($sqlQuery);	
		$component->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ComponentsMySql component
 	 */
	public function update($component){
		$sql = 'UPDATE components SET name = ?, link = ?, menuid = ?, parent = ?, admin_menu_link = ?, admin_menu_alt = ?, option = ?, ordering = ?, admin_menu_img = ?, iscore = ?, params = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($component->name);
		$sqlQuery->set($component->link);
		$sqlQuery->setNumber($component->menuid);
		$sqlQuery->setNumber($component->parent);
		$sqlQuery->set($component->adminMenuLink);
		$sqlQuery->set($component->adminMenuAlt);
		$sqlQuery->set($component->option);
		$sqlQuery->setNumber($component->ordering);
		$sqlQuery->set($component->adminMenuImg);
		$sqlQuery->setNumber($component->iscore);
		$sqlQuery->set($component->param);

		$sqlQuery->setNumber($component->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM components';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM components WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLink($value){
		$sql = 'SELECT * FROM components WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMenuid($value){
		$sql = 'SELECT * FROM components WHERE menuid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParent($value){
		$sql = 'SELECT * FROM components WHERE parent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAdminMenuLink($value){
		$sql = 'SELECT * FROM components WHERE admin_menu_link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAdminMenuAlt($value){
		$sql = 'SELECT * FROM components WHERE admin_menu_alt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOption($value){
		$sql = 'SELECT * FROM components WHERE option = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrdering($value){
		$sql = 'SELECT * FROM components WHERE ordering = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAdminMenuImg($value){
		$sql = 'SELECT * FROM components WHERE admin_menu_img = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIscore($value){
		$sql = 'SELECT * FROM components WHERE iscore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParams($value){
		$sql = 'SELECT * FROM components WHERE params = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByName($value){
		$sql = 'DELETE FROM components WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLink($value){
		$sql = 'DELETE FROM components WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMenuid($value){
		$sql = 'DELETE FROM components WHERE menuid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParent($value){
		$sql = 'DELETE FROM components WHERE parent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAdminMenuLink($value){
		$sql = 'DELETE FROM components WHERE admin_menu_link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAdminMenuAlt($value){
		$sql = 'DELETE FROM components WHERE admin_menu_alt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOption($value){
		$sql = 'DELETE FROM components WHERE option = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrdering($value){
		$sql = 'DELETE FROM components WHERE ordering = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAdminMenuImg($value){
		$sql = 'DELETE FROM components WHERE admin_menu_img = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIscore($value){
		$sql = 'DELETE FROM components WHERE iscore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParams($value){
		$sql = 'DELETE FROM components WHERE params = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ComponentsMySql 
	 */
	protected function readRow($row){
		$component = new Component();
		
		$component->id = $row['id'];
		$component->name = $row['name'];
		$component->link = $row['link'];
		$component->menuid = $row['menuid'];
		$component->parent = $row['parent'];
		$component->adminMenuLink = $row['admin_menu_link'];
		$component->adminMenuAlt = $row['admin_menu_alt'];
		$component->option = $row['option'];
		$component->ordering = $row['ordering'];
		$component->adminMenuImg = $row['admin_menu_img'];
		$component->iscore = $row['iscore'];
		$component->param = $row['params'];

		return $component;
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
	 * @return ComponentsMySql 
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