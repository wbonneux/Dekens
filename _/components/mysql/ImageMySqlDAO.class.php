<?php
/*
 * Class that operate on table 'language'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2013/11/28
 */

require_once('BaseCodeMySqlDAO.class.php');

class ImageMySqlDAO extends BaseCodeMySqlDAO implements languageDAO {

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ImageMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'img_image');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('img_image');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'img_image');
	}
	
	/**
 	 * Delete record from table
 	 * @param language primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'img_image');
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ImageMySql language
 	 */
	public function insert($image){
		$sql = 'INSERT INTO img_image (T_I_DESCR_NED, T_I_DESCR_FR, T_I_DESCR_EN, T_I_NAME, L_I_ACTIVE, S_I_CREATE_TECH) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		//$sqlQuery->setNumber($image->id);
		$sqlQuery->setString($image->descrNed);
		$sqlQuery->setString($image->descrFr);
		$sqlQuery->setString($image->descrEn);
		$sqlQuery->setString($image->name);
		$sqlQuery->set($image->active);
		$sqlQuery->set(date('Y-m-d H:i:s'));

		$id = $this->executeInsert($sqlQuery);	
		$image->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ImageMySql language
 	 */
	public function update($image){
		$sql = 'UPDATE img_image SET T_I_DESCR_NED = ?, T_I_DESCR_FR = ?, T_I_DESCR_EN = ?, T_I_NAME = ?, L_I_ACTIVE = ?, S_I_MOD_TECH = ? WHERE O_I_IDF_TECH = ?';
		echo $sql;

		$sqlQuery = new SqlQuery($sql);
			
		
		$sqlQuery->setString($image->descrNed);
		$sqlQuery->setString($image->descrFr);
		$sqlQuery->setString($image->descrEn);
		$sqlQuery->setString($image->name);
		$sqlQuery->set($image->active);
		$sqlQuery->set(date('Y-m-d H:i:s'));
		
		$sqlQuery->setNumber($image->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('img_image');
	}

	/**
	 * Read row
	 *
	 * @return ImageMySql 
	 */
	public function readRow($row){
		$image = new Image();
		
		$image->id = $row['O_I_IDF_TECH'];
		$image->descrNed = $row['T_I_DESCR_NED'];
		$image->descrFr = $row['T_I_DESCR_FR'];
		$image->descrEn = $row['T_I_DESCR_EN'];
		$image->name = $row['T_I_NAME'];
		$image->active = $row['L_I_ACTIVE'];
		$image->created = $row['S_I_CREATE_TECH'];
		$image->modified = $row['S_I_MOD_TECH'];
		
		return $image;
	}
}
?>