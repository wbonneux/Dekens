<?php
/*
 * Class that operate on table 'contact_details'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class ContactDetailsMySqlDAO implements ContactDetailsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ContactDetailsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM contact_details WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM contact_details';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM contact_details ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param contactDetail primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM contact_details WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContactDetailsMySql contactDetail
 	 */
	public function insert($contactDetail){
		$sql = 'INSERT INTO contact_details (name, con_position, address, suburb, state, country, postcode, telephone, fax, misc, image, imagepos, email_to, default_con, published, checked_out, checked_out_time, ordering, params, user_id, catid, access) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($contactDetail->name);
		$sqlQuery->set($contactDetail->conPosition);
		$sqlQuery->set($contactDetail->addres);
		$sqlQuery->set($contactDetail->suburb);
		$sqlQuery->set($contactDetail->state);
		$sqlQuery->set($contactDetail->country);
		$sqlQuery->set($contactDetail->postcode);
		$sqlQuery->set($contactDetail->telephone);
		$sqlQuery->set($contactDetail->fax);
		$sqlQuery->set($contactDetail->misc);
		$sqlQuery->set($contactDetail->image);
		$sqlQuery->set($contactDetail->imagepo);
		$sqlQuery->set($contactDetail->emailTo);
		$sqlQuery->setNumber($contactDetail->defaultCon);
		$sqlQuery->setNumber($contactDetail->published);
		$sqlQuery->setNumber($contactDetail->checkedOut);
		$sqlQuery->set($contactDetail->checkedOutTime);
		$sqlQuery->setNumber($contactDetail->ordering);
		$sqlQuery->set($contactDetail->param);
		$sqlQuery->setNumber($contactDetail->userId);
		$sqlQuery->setNumber($contactDetail->catid);
		$sqlQuery->setNumber($contactDetail->acces);

		$id = $this->executeInsert($sqlQuery);	
		$contactDetail->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContactDetailsMySql contactDetail
 	 */
	public function update($contactDetail){
		$sql = 'UPDATE contact_details SET name = ?, con_position = ?, address = ?, suburb = ?, state = ?, country = ?, postcode = ?, telephone = ?, fax = ?, misc = ?, image = ?, imagepos = ?, email_to = ?, default_con = ?, published = ?, checked_out = ?, checked_out_time = ?, ordering = ?, params = ?, user_id = ?, catid = ?, access = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($contactDetail->name);
		$sqlQuery->set($contactDetail->conPosition);
		$sqlQuery->set($contactDetail->addres);
		$sqlQuery->set($contactDetail->suburb);
		$sqlQuery->set($contactDetail->state);
		$sqlQuery->set($contactDetail->country);
		$sqlQuery->set($contactDetail->postcode);
		$sqlQuery->set($contactDetail->telephone);
		$sqlQuery->set($contactDetail->fax);
		$sqlQuery->set($contactDetail->misc);
		$sqlQuery->set($contactDetail->image);
		$sqlQuery->set($contactDetail->imagepo);
		$sqlQuery->set($contactDetail->emailTo);
		$sqlQuery->setNumber($contactDetail->defaultCon);
		$sqlQuery->setNumber($contactDetail->published);
		$sqlQuery->setNumber($contactDetail->checkedOut);
		$sqlQuery->set($contactDetail->checkedOutTime);
		$sqlQuery->setNumber($contactDetail->ordering);
		$sqlQuery->set($contactDetail->param);
		$sqlQuery->setNumber($contactDetail->userId);
		$sqlQuery->setNumber($contactDetail->catid);
		$sqlQuery->setNumber($contactDetail->acces);

		$sqlQuery->setNumber($contactDetail->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM contact_details';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM contact_details WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByConPosition($value){
		$sql = 'SELECT * FROM contact_details WHERE con_position = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAddress($value){
		$sql = 'SELECT * FROM contact_details WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySuburb($value){
		$sql = 'SELECT * FROM contact_details WHERE suburb = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByState($value){
		$sql = 'SELECT * FROM contact_details WHERE state = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCountry($value){
		$sql = 'SELECT * FROM contact_details WHERE country = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPostcode($value){
		$sql = 'SELECT * FROM contact_details WHERE postcode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelephone($value){
		$sql = 'SELECT * FROM contact_details WHERE telephone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFax($value){
		$sql = 'SELECT * FROM contact_details WHERE fax = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMisc($value){
		$sql = 'SELECT * FROM contact_details WHERE misc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImage($value){
		$sql = 'SELECT * FROM contact_details WHERE image = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImagepos($value){
		$sql = 'SELECT * FROM contact_details WHERE imagepos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmailTo($value){
		$sql = 'SELECT * FROM contact_details WHERE email_to = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDefaultCon($value){
		$sql = 'SELECT * FROM contact_details WHERE default_con = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPublished($value){
		$sql = 'SELECT * FROM contact_details WHERE published = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCheckedOut($value){
		$sql = 'SELECT * FROM contact_details WHERE checked_out = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCheckedOutTime($value){
		$sql = 'SELECT * FROM contact_details WHERE checked_out_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrdering($value){
		$sql = 'SELECT * FROM contact_details WHERE ordering = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParams($value){
		$sql = 'SELECT * FROM contact_details WHERE params = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUserId($value){
		$sql = 'SELECT * FROM contact_details WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCatid($value){
		$sql = 'SELECT * FROM contact_details WHERE catid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAccess($value){
		$sql = 'SELECT * FROM contact_details WHERE access = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByName($value){
		$sql = 'DELETE FROM contact_details WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByConPosition($value){
		$sql = 'DELETE FROM contact_details WHERE con_position = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAddress($value){
		$sql = 'DELETE FROM contact_details WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySuburb($value){
		$sql = 'DELETE FROM contact_details WHERE suburb = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByState($value){
		$sql = 'DELETE FROM contact_details WHERE state = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCountry($value){
		$sql = 'DELETE FROM contact_details WHERE country = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPostcode($value){
		$sql = 'DELETE FROM contact_details WHERE postcode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelephone($value){
		$sql = 'DELETE FROM contact_details WHERE telephone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFax($value){
		$sql = 'DELETE FROM contact_details WHERE fax = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMisc($value){
		$sql = 'DELETE FROM contact_details WHERE misc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImage($value){
		$sql = 'DELETE FROM contact_details WHERE image = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImagepos($value){
		$sql = 'DELETE FROM contact_details WHERE imagepos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmailTo($value){
		$sql = 'DELETE FROM contact_details WHERE email_to = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDefaultCon($value){
		$sql = 'DELETE FROM contact_details WHERE default_con = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPublished($value){
		$sql = 'DELETE FROM contact_details WHERE published = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCheckedOut($value){
		$sql = 'DELETE FROM contact_details WHERE checked_out = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCheckedOutTime($value){
		$sql = 'DELETE FROM contact_details WHERE checked_out_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrdering($value){
		$sql = 'DELETE FROM contact_details WHERE ordering = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParams($value){
		$sql = 'DELETE FROM contact_details WHERE params = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUserId($value){
		$sql = 'DELETE FROM contact_details WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCatid($value){
		$sql = 'DELETE FROM contact_details WHERE catid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAccess($value){
		$sql = 'DELETE FROM contact_details WHERE access = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ContactDetailsMySql 
	 */
	protected function readRow($row){
		$contactDetail = new ContactDetail();
		
		$contactDetail->id = $row['id'];
		$contactDetail->name = $row['name'];
		$contactDetail->conPosition = $row['con_position'];
		$contactDetail->addres = $row['address'];
		$contactDetail->suburb = $row['suburb'];
		$contactDetail->state = $row['state'];
		$contactDetail->country = $row['country'];
		$contactDetail->postcode = $row['postcode'];
		$contactDetail->telephone = $row['telephone'];
		$contactDetail->fax = $row['fax'];
		$contactDetail->misc = $row['misc'];
		$contactDetail->image = $row['image'];
		$contactDetail->imagepo = $row['imagepos'];
		$contactDetail->emailTo = $row['email_to'];
		$contactDetail->defaultCon = $row['default_con'];
		$contactDetail->published = $row['published'];
		$contactDetail->checkedOut = $row['checked_out'];
		$contactDetail->checkedOutTime = $row['checked_out_time'];
		$contactDetail->ordering = $row['ordering'];
		$contactDetail->param = $row['params'];
		$contactDetail->userId = $row['user_id'];
		$contactDetail->catid = $row['catid'];
		$contactDetail->acces = $row['access'];

		return $contactDetail;
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
	 * @return ContactDetailsMySql 
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