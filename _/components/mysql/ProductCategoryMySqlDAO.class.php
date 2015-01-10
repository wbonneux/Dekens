<?php
/*
 * Class that operate on table 'CONT_CONTENT'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2013/11/30
 */
require_once('BaseCommonMySqlDAO.class.php');

class ProductCategoryMySqlDAO extends BaseCommonMySqlDAO implements ProductCategoryDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ContentMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'prod_category');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('prod_category');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'prod_category');
	}
	
	/**
 	 * Delete record from table
 	 * @param content primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'prod_category');
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('prod_category');
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContentMySql content
 	 */
	public function insert(ProductCategory $productCategory){
		$sql = 'INSERT INTO prod_category (O_SECTION_IDF_TECH, O_CATEGORY_TYPE_IDF_TECH, T_I_TITLE_NED, T_I_TITLE_FR, T_I_DESCR_NED, T_I_DESCR_FR, T_I_PAGE_NED, T_I_PAGE_FR, T_I_IMAGE, O_I_PARENT_CATEGORY_IDF_TECH, T_I_URL_COMPANY, N_I_ORDER, L_I_ACTIVE, S_I_CREATE_TECH) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($productCategory->section);
		$sqlQuery->set($productCategory->categoryType);
		$sqlQuery->setString($productCategory->titleNed);
		$sqlQuery->setString($productCategory->titleFr);
		$sqlQuery->setString($productCategory->descrNed);
		$sqlQuery->setString($productCategory->descrFr);
		$sqlQuery->setString($productCategory->pageNed);
		$sqlQuery->setString($productCategory->pageFr);
		$sqlQuery->setString($productCategory->image);
		$sqlQuery->set($productCategory->parent);
		$sqlQuery->set($productCategory->url);
		$sqlQuery->set($productCategory->order);
		$sqlQuery->set($productCategory->active);
		//$sqlQuery->set((new \DateTime())->format('Y-m-d H:i:s'));
		$sqlQuery->set(date('Y-m-d H:i:s'));
		
		$id = $this->executeInsert($sqlQuery);	
		$productCategory->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContentMySql content
 	 */
	public function update(ProductCategory $productCategory){
		$sql = 'UPDATE prod_category SET O_SECTION_IDF_TECH = ?, O_CATEGORY_TYPE_IDF_TECH = ?, T_I_TITLE_NED = ?,  T_I_TITLE_FR = ?, T_I_DESCR_NED = ?, T_I_DESCR_FR = ?, T_I_PAGE_NED = ?, T_I_PAGE_FR = ?, T_I_IMAGE = ?, O_I_PARENT_CATEGORY_IDF_TECH = ?, T_I_URL_COMPANY = ?, N_I_ORDER = ?, L_I_ACTIVE = ?, S_I_MOD_TECH = ? WHERE O_I_IDF_TECH = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($productCategory->section);
		$sqlQuery->set($productCategory->categoryType);
		$sqlQuery->setString($productCategory->titleNed);
		$sqlQuery->setString($productCategory->titleFr);
		$sqlQuery->setString($productCategory->descrNed);
		$sqlQuery->setString($productCategory->descrFr);
		$sqlQuery->setString($productCategory->pageNed);
		$sqlQuery->setString($productCategory->pageFr);
		$sqlQuery->setString($productCategory->image);
		$sqlQuery->set($productCategory->parent);
		$sqlQuery->setString($productCategory->url);
		$sqlQuery->set($productCategory->order);
		$sqlQuery->set($productCategory->active);
		//$sqlQuery->set((new \DateTime())->format('Y-m-d H:i:s'));
		//$sqlQuery->set(new \DateTime( 'now' ));
		$sqlQuery->set(date('Y-m-d H:i:s'));

		$sqlQuery->setNumber($productCategory->id);
		
// 		echo 'update<br/>';
// 		echo $sqlQuery->getQuery();
		return $this->executeUpdate($sqlQuery);
	}

	

	/**
	 * Read row
	 *
	 * @return ContentMySql 
	 */
	public function readRow($row){
		$productCategory = new ProductCategory();
		
		$productCategory->id 				= $row['O_I_IDF_TECH'];
		$productCategory->section			= $row['O_SECTION_IDF_TECH'];
		$productCategory->categoryType		= $row['O_CATEGORY_TYPE_IDF_TECH'];
		$productCategory->titleNed 			= $row['T_I_TITLE_NED'];
		$productCategory->titleFr			= $row['T_I_TITLE_FR'];
		$productCategory->descrNed 			= $row['T_I_DESCR_NED'];
		$productCategory->descrFr			= $row['T_I_DESCR_FR'];
		$productCategory->pageNed 			= $row['T_I_PAGE_NED'];
		$productCategory->pageFr			= $row['T_I_PAGE_FR'];
		$productCategory->image 			= $row['T_I_IMAGE'];
		$productCategory->parent 			= $row['O_I_PARENT_CATEGORY_IDF_TECH'];
		$productCategory->url 				= $row['T_I_URL_COMPANY'];
		$productCategory->order 			= $row['N_I_ORDER'];
		$productCategory->active 			= $row['L_I_ACTIVE'];
		$productCategory->created 			= $row['S_I_CREATE_TECH'];
		$productCategory->modified			= $row['S_I_MOD_TECH'];
		
		return $productCategory;
	}
	
}
?>