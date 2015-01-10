<?php
/*
 * Class that operate on table 'language'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2013/11/28
 */

require_once('BaseCodeMySqlDAO.class.php');

class CategoryTypeMySqlDAO extends BaseCodeMySqlDAO implements CategoryTypeDAO {

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CategoryTypeMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'CODE_CATEGORY_TYPE');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('CODE_CATEGORY_TYPE');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'CODE_CATEGORY_TYPE');
	}
	
	/**
 	 * Delete record from table
 	 * @param language primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'CODE_CATEGORY_TYPE');
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CategoryTypeMySql language
 	 */
	public function insert($categoryType){
		$sql = 'INSERT INTO CODE_CATEGORY_TYPE (T_I_CODE, T_I_DESCR_NED, T_I_DESCR_FR, T_I_DESCR_EN) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		//$sqlQuery->setNumber($categoryType->id);
		$sqlQuery->setString($categoryType->code);
		$sqlQuery->setString($categoryType->descrNed);
		$sqlQuery->setString($categoryType->descrFr);
		$sqlQuery->setString($categoryType->descrEn);

		$id = $this->executeInsert($sqlQuery);	
		$categoryType->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CategoryTypeMySql language
 	 */
	public function update($categoryType){
		$sql = 'UPDATE CODE_CATEGORY_TYPE SET T_I_CODE = ?, T_I_DESCR_NED = ?, T_I_DESCR_FR = ?, T_I_DESCR_EN = ?, ';
		$sql = $sql.'S_I_MOD_TECH = now() WHERE C_I_IDF_TECH = ?';
		echo $sql;

		$sqlQuery = new SqlQuery($sql);
			
		$sqlQuery->setString($categoryType->code);
		$sqlQuery->setString($categoryType->descrNed);
		$sqlQuery->setString($categoryType->descrFr);
		$sqlQuery->setString($categoryType->descrEn);
		
		$sqlQuery->setNumber($categoryType->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('CODE_CATEGORY_TYPE');
	}

	/**
	 * Read row
	 *
	 * @return CategoryTypeMySql 
	 */
	public function readRow($row){
		$categoryType = new CategoryType();
		
		$categoryType->id = $row['C_I_IDF_TECH'];
		$categoryType->code= $row['T_I_CODE'];
		$categoryType->descrNed = $row['T_I_DESCR_NED'];
		$categoryType->descrFr = $row['T_I_DESCR_FR'];
		$categoryType->descrEn = $row['T_I_DESCR_EN'];
		$categoryType->created = $row['S_I_CREATE_TECH'];
		$categoryType->modified = $row['S_I_MOD_TECH'];
		
		return $categoryType;
	}
}
?>