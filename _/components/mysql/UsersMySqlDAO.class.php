<?php
/*
 * Class that operate on table 'users'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class UsersMySqlDAO implements UsersDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UsersMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM users WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM users';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM users ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param user primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM users WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsersMySql user
 	 */
	public function insert($user){
		$sql = 'INSERT INTO users (name, username, email, password, usertype, block, sendEmail, gid, registerDate, lastvisitDate, activation, params) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($user->name);
		$sqlQuery->set($user->username);
		$sqlQuery->set($user->email);
		$sqlQuery->set($user->password);
		$sqlQuery->set($user->usertype);
		$sqlQuery->setNumber($user->block);
		$sqlQuery->setNumber($user->sendEmail);
		$sqlQuery->setNumber($user->gid);
		$sqlQuery->set($user->registerDate);
		$sqlQuery->set($user->lastvisitDate);
		$sqlQuery->set($user->activation);
		$sqlQuery->set($user->param);

		$id = $this->executeInsert($sqlQuery);	
		$user->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsersMySql user
 	 */
	public function update($user){
		$sql = 'UPDATE users SET name = ?, username = ?, email = ?, password = ?, usertype = ?, block = ?, sendEmail = ?, gid = ?, registerDate = ?, lastvisitDate = ?, activation = ?, params = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($user->name);
		$sqlQuery->set($user->username);
		$sqlQuery->set($user->email);
		$sqlQuery->set($user->password);
		$sqlQuery->set($user->usertype);
		$sqlQuery->setNumber($user->block);
		$sqlQuery->setNumber($user->sendEmail);
		$sqlQuery->setNumber($user->gid);
		$sqlQuery->set($user->registerDate);
		$sqlQuery->set($user->lastvisitDate);
		$sqlQuery->set($user->activation);
		$sqlQuery->set($user->param);

		$sqlQuery->setNumber($user->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM users';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM users WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsername($value){
		$sql = 'SELECT * FROM users WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM users WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassword($value){
		$sql = 'SELECT * FROM users WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsertype($value){
		$sql = 'SELECT * FROM users WHERE usertype = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBlock($value){
		$sql = 'SELECT * FROM users WHERE block = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySendEmail($value){
		$sql = 'SELECT * FROM users WHERE sendEmail = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGid($value){
		$sql = 'SELECT * FROM users WHERE gid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRegisterDate($value){
		$sql = 'SELECT * FROM users WHERE registerDate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLastvisitDate($value){
		$sql = 'SELECT * FROM users WHERE lastvisitDate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByActivation($value){
		$sql = 'SELECT * FROM users WHERE activation = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParams($value){
		$sql = 'SELECT * FROM users WHERE params = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByName($value){
		$sql = 'DELETE FROM users WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsername($value){
		$sql = 'DELETE FROM users WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM users WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassword($value){
		$sql = 'DELETE FROM users WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsertype($value){
		$sql = 'DELETE FROM users WHERE usertype = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBlock($value){
		$sql = 'DELETE FROM users WHERE block = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySendEmail($value){
		$sql = 'DELETE FROM users WHERE sendEmail = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGid($value){
		$sql = 'DELETE FROM users WHERE gid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRegisterDate($value){
		$sql = 'DELETE FROM users WHERE registerDate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLastvisitDate($value){
		$sql = 'DELETE FROM users WHERE lastvisitDate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByActivation($value){
		$sql = 'DELETE FROM users WHERE activation = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParams($value){
		$sql = 'DELETE FROM users WHERE params = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UsersMySql 
	 */
	protected function readRow($row){
		$user = new User();
		
		$user->id = $row['id'];
		$user->name = $row['name'];
		$user->username = $row['username'];
		$user->email = $row['email'];
		$user->password = $row['password'];
		$user->usertype = $row['usertype'];
		$user->block = $row['block'];
		$user->sendEmail = $row['sendEmail'];
		$user->gid = $row['gid'];
		$user->registerDate = $row['registerDate'];
		$user->lastvisitDate = $row['lastvisitDate'];
		$user->activation = $row['activation'];
		$user->param = $row['params'];

		return $user;
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
	 * @return UsersMySql 
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