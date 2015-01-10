<?php
/*
 * Class that operate on table 'CONT_CONTENT'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2013/11/30
 */
require_once('BaseCommonMySqlDAO.class.php');

class ProductMySqlDAO extends BaseCommonMySqlDAO implements ProductDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ContentMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'prod_product');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('prod_product');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'prod_product');
	}
	
	/**
 	 * Delete record from table
 	 * @param content primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'prod_product');
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('prod_product');
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContentMySql content
 	 */
	public function insert(Product $product){
		$sql = 'INSERT INTO prod_product (T_I_TITLE_NED, T_I_TITLE_FR, T_I_DESCR_NED, T_I_DESCR_FR, T_I_PAGE_NED, T_I_PAGE_FR,T_I_IMAGE, L_I_ACTIVE, S_I_CREATE_TECH) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($product->titleNed);
		$sqlQuery->setString($product->titleFr);
		$sqlQuery->setString($product->descrNed);
		$sqlQuery->setString($product->descrFr);
		$sqlQuery->setString($product->pageNed);
		$sqlQuery->setString($product->pageFr);
		$sqlQuery->set($product->image);
		$sqlQuery->set($product->active);
		//$sqlQuery->set((new \DateTime())->format('Y-m-d H:i:s'));
		$sqlQuery->set(date('Y-m-d H:i:s'));
		
		$id = $this->executeInsert($sqlQuery);	
		$product->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContentMySql content
 	 */
	public function update(Product $product){
		$sql = 'UPDATE prod_product SET T_I_TITLE_NED = ?,  T_I_TITLE_FR = ?, T_I_DESCR_NED = ?, T_I_DESCR_FR = ?, T_I_PAGE_NED = ?, T_I_PAGE_FR = ?, T_I_IMAGE = ?,  L_I_ACTIVE = ?, S_I_MOD_TECH = ? WHERE O_I_IDF_TECH = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($product->titleNed);
		$sqlQuery->setString($product->titleFr);
		$sqlQuery->setString($product->descrNed);
		$sqlQuery->setString($product->descrFr);
		$sqlQuery->setString($product->pageNed);
		$sqlQuery->setString($product->pageFr);
		$sqlQuery->set($product->image);
		$sqlQuery->set($product->active);
		//$sqlQuery->set((new \DateTime())->format('Y-m-d H:i:s'));
		//$sqlQuery->set(new \DateTime( 'now' ));
		$sqlQuery->set(date('Y-m-d H:i:s'));

		$sqlQuery->setNumber($product->id);
		
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
		$product = new Product();
		
		$product->id 				= $row['O_I_IDF_TECH'];
		$product->titleNed 			= $row['T_I_TITLE_NED'];
		$product->titleFr			= $row['T_I_TITLE_FR'];
		$product->descrNed 			= $row['T_I_DESCR_NED'];
		$product->descrFr			= $row['T_I_DESCR_FR'];
		$product->pageNed 			= $row['T_I_PAGE_NED'];
		$product->pageFr			= $row['T_I_PAGE_FR'];
		$product->image 			= $row['T_I_IMAGE'];
		$product->active 			= $row['L_I_ACTIVE'];
		$product->created 			= $row['S_I_CREATE_TECH'];
		$product->modified			= $row['S_I_MOD_TECH'];
		
		return $product;
	}
	
}
?>