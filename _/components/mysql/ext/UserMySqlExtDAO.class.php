<?php
/*
 * Class that operate on table 'users'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-10-17 03:43
 */
class UserMySqlExtDAO extends UserMySqlDAO{
	function getUserByUsernamePassword($username, $userpassword){
		$sql = 'SELECT * FROM USR_USER WHERE T_I_USERNAME = ? AND T_I_PASSWORD = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setString($username);
		$sqlQuery->setString($userpassword);
		return $this->getRow($sqlQuery);
	}


	function getUserByUsername($username){
		$sql = 'SELECT * FROM USR_USER WHERE T_I_USERNAME = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setString($username);
		return $this->getRow($sqlQuery);
	}	
	
}
?>