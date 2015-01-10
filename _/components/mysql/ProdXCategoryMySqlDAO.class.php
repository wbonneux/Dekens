<?php
/*
 * Class that operate on table 'language'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2013/11/28
 */

require_once('BaseCommonMySqlDAO.class.php');

class ProdXCategoryMySqlDAO extends BaseCommonMySqlDAO implements ProdXCategoryDAO {

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ProdXCategoryMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'prod_x_category');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('prod_x_category');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'prod_x_category');
	}
	
	/**
 	 * Delete record from table
 	 * @param language primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'prod_x_category');
	}
	
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProdXCategoryMySql language
 	 */
	public function insert($prodxcategory){
		$sql = 'INSERT INTO prod_x_category (O_PRODUCT_IDF_TECH, O_CATEGORY_IDF_TECH, L_I_ACTIVE, N_I_ORDER, S_I_CREATE_TECH) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		//$sqlQuery->setNumber($prodxcategory->id);
		$sqlQuery->set($prodxcategory->product);
		$sqlQuery->set($prodxcategory->category);
		$sqlQuery->set($prodxcategory->active);
		$sqlQuery->set($prodxcategory->order);
		$sqlQuery->set(date('Y-m-d H:i:s'));

		$id = $this->executeInsert($sqlQuery);	
		$prodxcategory->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProdXCategoryMySql language
 	 */
	public function update($prodxcategory){
		$sql = 'UPDATE prod_x_category SET O_PRODUCT_IDF_TECH = ?, O_CATEGORY_IDF_TECH = ?, L_I_ACTIVE = ?, N_I_ORDER = ?, S_I_MOD_TECH = ? WHERE O_I_IDF_TECH = ?';
		//echo $sql;

		$sqlQuery = new SqlQuery($sql);
			
	
		$sqlQuery->set($prodxcategory->product);
		$sqlQuery->set($prodxcategory->category);
		$sqlQuery->set($prodxcategory->active);
		$sqlQuery->set($prodxcategory->order);
		$sqlQuery->set(date('Y-m-d H:i:s'));
		
		$sqlQuery->setNumber($prodxcategory->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('prod_x_category');
	}

	/**
	 * Read row
	 *
	 * @return ProdXCategoryMySql 
	 */
	public function readRow($row){
		$prodxcategory = new ProdXCategory();
		
		$prodxcategory->id = $row['O_I_IDF_TECH'];
		$prodxcategory->product = $row['O_PRODUCT_IDF_TECH'];
		$prodxcategory->category = $row['O_CATEGORY_IDF_TECH'];
		$prodxcategory->active = $row['L_I_ACTIVE'];
		$prodxcategory->order = $row['N_I_ORDER'];
		$prodxcategory->created = $row['S_I_CREATE_TECH'];
		$prodxcategory->modified = $row['S_I_MOD_TECH'];
		
		return $prodxcategory;
	}
}
?>