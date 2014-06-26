<?php
/*
 * Class that operate on table 'messages'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class MessagesMySqlDAO implements MessagesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MessagesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM messages WHERE message_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM messages';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM messages ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param message primary key
 	 */
	public function delete($message_id){
		$sql = 'DELETE FROM messages WHERE message_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($message_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MessagesMySql message
 	 */
	public function insert($message){
		$sql = 'INSERT INTO messages (user_id_from, user_id_to, folder_id, date_time, state, priority, subject, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($message->userIdFrom);
		$sqlQuery->setNumber($message->userIdTo);
		$sqlQuery->setNumber($message->folderId);
		$sqlQuery->set($message->dateTime);
		$sqlQuery->setNumber($message->state);
		$sqlQuery->setNumber($message->priority);
		$sqlQuery->set($message->subject);
		$sqlQuery->set($message->message);

		$id = $this->executeInsert($sqlQuery);	
		$message->messageId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MessagesMySql message
 	 */
	public function update($message){
		$sql = 'UPDATE messages SET user_id_from = ?, user_id_to = ?, folder_id = ?, date_time = ?, state = ?, priority = ?, subject = ?, message = ? WHERE message_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($message->userIdFrom);
		$sqlQuery->setNumber($message->userIdTo);
		$sqlQuery->setNumber($message->folderId);
		$sqlQuery->set($message->dateTime);
		$sqlQuery->setNumber($message->state);
		$sqlQuery->setNumber($message->priority);
		$sqlQuery->set($message->subject);
		$sqlQuery->set($message->message);

		$sqlQuery->setNumber($message->messageId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM messages';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUserIdFrom($value){
		$sql = 'SELECT * FROM messages WHERE user_id_from = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUserIdTo($value){
		$sql = 'SELECT * FROM messages WHERE user_id_to = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFolderId($value){
		$sql = 'SELECT * FROM messages WHERE folder_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateTime($value){
		$sql = 'SELECT * FROM messages WHERE date_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByState($value){
		$sql = 'SELECT * FROM messages WHERE state = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPriority($value){
		$sql = 'SELECT * FROM messages WHERE priority = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySubject($value){
		$sql = 'SELECT * FROM messages WHERE subject = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMessage($value){
		$sql = 'SELECT * FROM messages WHERE message = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUserIdFrom($value){
		$sql = 'DELETE FROM messages WHERE user_id_from = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUserIdTo($value){
		$sql = 'DELETE FROM messages WHERE user_id_to = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFolderId($value){
		$sql = 'DELETE FROM messages WHERE folder_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateTime($value){
		$sql = 'DELETE FROM messages WHERE date_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByState($value){
		$sql = 'DELETE FROM messages WHERE state = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPriority($value){
		$sql = 'DELETE FROM messages WHERE priority = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubject($value){
		$sql = 'DELETE FROM messages WHERE subject = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMessage($value){
		$sql = 'DELETE FROM messages WHERE message = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MessagesMySql 
	 */
	protected function readRow($row){
		$message = new Message();
		
		$message->messageId = $row['message_id'];
		$message->userIdFrom = $row['user_id_from'];
		$message->userIdTo = $row['user_id_to'];
		$message->folderId = $row['folder_id'];
		$message->dateTime = $row['date_time'];
		$message->state = $row['state'];
		$message->priority = $row['priority'];
		$message->subject = $row['subject'];
		$message->message = $row['message'];

		return $message;
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
	 * @return MessagesMySql 
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