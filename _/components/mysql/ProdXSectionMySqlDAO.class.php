<?php
/*
 * Class that operate on table 'language'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2013/11/28
 */

require_once('BaseCommonMySqlDAO.class.php');

class ProdXSectionMySqlDAO extends BaseCommonMySqlDAO implements ProdXSectionDAO {

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ProdXSectionMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'section_x_category');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('section_x_category');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'section_x_category');
	}
	
	/**
 	 * Delete record from table
 	 * @param language primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'section_x_category');
	}
	
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProdXSectionMySql language
 	 */
	public function insert($prodxsection){
		$sql = 'INSERT INTO section_x_category (O_SECTION_IDF_TECH, O_CATEGORY_IDF_TECH, L_I_ACTIVE, N_I_ORDER, S_I_CREATE_TECH) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		//$sqlQuery->setNumber($prodxsection->id);
		$sqlQuery->set($prodxsection->section);
		$sqlQuery->set($prodxsection->category);
		$sqlQuery->set($prodxsection->active);
		$sqlQuery->set($prodxsection->order);
		$sqlQuery->set(date('Y-m-d H:i:s'));

		$id = $this->executeInsert($sqlQuery);	
		$prodxsection->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProdXSectionMySql language
 	 */
	public function update($prodxsection){
		$sql = 'UPDATE section_x_category SET O_SECTION_IDF_TECH = ?, O_CATEGORY_IDF_TECH = ?, L_I_ACTIVE = ?, N_I_ORDER = ?, S_I_MOD_TECH = ? WHERE O_I_IDF_TECH = ?';
		//echo $sql;

		$sqlQuery = new SqlQuery($sql);
			
	
		$sqlQuery->set($prodxsection->section);
		$sqlQuery->set($prodxsection->category);
		$sqlQuery->set($prodxsection->active);
		$sqlQuery->set($prodxsection->order);
		$sqlQuery->set(date('Y-m-d H:i:s'));
		
		$sqlQuery->setNumber($prodxsection->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('section_x_category');
	}

	/**
	 * Read row
	 *
	 * @return ProdXSectionMySql 
	 */
	public function readRow($row){
		$prodxsection = new ProdXSection();
		
		$prodxsection->id = $row['O_I_IDF_TECH'];
		$prodxsection->section = $row['O_SECTION_IDF_TECH'];
		$prodxsection->category = $row['O_CATEGORY_IDF_TECH'];
		$prodxsection->active = $row['L_I_ACTIVE'];
		$prodxsection->order = $row['N_I_ORDER'];
		$prodxsection->created = $row['S_I_CREATE_TECH'];
		$prodxsection->modified = $row['S_I_MOD_TECH'];
		
		return $prodxsection;
	}
}
?>