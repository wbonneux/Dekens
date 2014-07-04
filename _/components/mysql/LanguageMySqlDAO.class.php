<?php
/*
 * Class that operate on table 'language'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2013/11/28
 */

require_once('BaseCodeMySqlDAO.class.php');

class LanguageMySqlDAO extends BaseCodeMySqlDAO implements languageDAO {

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return LanguageMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'CODE_LANGUAGE');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('CODE_LANGUAGE');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'CODE_LANGUAGE');
	}
	
	/**
 	 * Delete record from table
 	 * @param language primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'CODE_LANGUAGE');
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LanguageMySql language
 	 */
	public function insert($language){
		$sql = 'INSERT INTO CODE_LANGUAGE (T_I_CODE, T_I_DESCR_NED, T_I_DESCR_FR, T_I_DESCR_EN) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		//$sqlQuery->setNumber($language->id);
		$sqlQuery->setString($language->code);
		$sqlQuery->setString($language->descrNed);
		$sqlQuery->setString($language->descrFr);
		$sqlQuery->setString($language->descrEn);

		$id = $this->executeInsert($sqlQuery);	
		$language->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param LanguageMySql language
 	 */
	public function update($language){
		$sql = 'UPDATE CODE_LANGUAGE SET T_I_CODE = ?, T_I_DESCR_NED = ?, T_I_DESCR_FR = ?, T_I_DESCR_EN = ?, ';
		$sql = $sql.'S_I_MOD_TECH = now() WHERE C_I_IDF_TECH = ?';
		echo $sql;

		$sqlQuery = new SqlQuery($sql);
			
		$sqlQuery->setString($language->code);
		$sqlQuery->setString($language->descrNed);
		$sqlQuery->setString($language->descrFr);
		$sqlQuery->setString($language->descrEn);
		
		$sqlQuery->setNumber($language->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('CODE_LANGUAGE');
	}

	/**
	 * Read row
	 *
	 * @return LanguageMySql 
	 */
	public function readRow($row){
		$language = new Language();
		
		$language->id = $row['C_I_IDF_TECH'];
		$language->code= $row['T_I_CODE'];
		$language->descrNed = $row['T_I_DESCR_NED'];
		$language->descrFr = $row['T_I_DESCR_FR'];
		$language->descrEn = $row['T_I_DESCR_EN'];
		$language->created = $row['S_I_CREATE_TECH'];
		$language->modified = $row['S_I_MOD_TECH'];
		
		return $language;
	}
}
?>