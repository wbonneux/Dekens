<?php
/*
 * Class that operate on table 'CONT_CONTENT'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2013/11/30
 */
require_once('BaseCommonMySqlDAO.class.php');

class ProductSectionMySqlDAO extends BaseCommonMySqlDAO implements ProductSectionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ContentMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'prod_section');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('prod_section');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'prod_section');
	}
	
	/**
 	 * Delete record from table
 	 * @param content primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'prod_section');
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('prod_section');
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContentMySql content
 	 */
	public function insert(ProductSection $productSection){
		$sql = 'INSERT INTO prod_section (T_I_MENU_NED, T_I_MENU_FR, T_I_URL, T_I_TITLE_NED, T_I_TITLE_FR, T_I_DESCR_NED, T_I_DESCR_FR, T_I_PAGE_NED, T_I_PAGE_FR, T_I_IMAGE, N_I_ORDER, L_I_ACTIVE, S_I_CREATE_TECH) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($productSection->menuNed);
		$sqlQuery->setString($productSection->menuFr);
		$sqlQuery->setString($productSection->url);
		$sqlQuery->setString($productSection->titleNed);
		$sqlQuery->setString($productSection->titleFr);
		$sqlQuery->setString($productSection->descrNed);
		$sqlQuery->setString($productSection->descrFr);
		$sqlQuery->setString($productSection->pageNed);
		$sqlQuery->setString($productSection->pageFr);
		$sqlQuery->setString($productSection->image);
		$sqlQuery->set($productSection->order);
		$sqlQuery->set($productSection->active);
		//$sqlQuery->set((new \DateTime())->format('Y-m-d H:i:s'));
		$sqlQuery->set(date('Y-m-d H:i:s'));
		
		$id = $this->executeInsert($sqlQuery);	
		$productSection->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContentMySql content
 	 */
	public function update(ProductSection $productSection){
		$sql = 'UPDATE prod_section SET T_I_MENU_NED = ?, T_I_MENU_FR = ?, T_I_URL = ?, T_I_TITLE_NED = ?,  T_I_TITLE_FR = ?, T_I_DESCR_NED = ?, T_I_DESCR_FR = ?, T_I_PAGE_NED = ?, T_I_PAGE_FR = ?, T_I_IMAGE = ?, N_I_ORDER = ?, L_I_ACTIVE = ?, S_I_MOD_TECH = ? WHERE O_I_IDF_TECH = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($productSection->menuNed);
		$sqlQuery->setString($productSection->menuFr);
		$sqlQuery->setString($productSection->url);
		$sqlQuery->setString($productSection->titleNed);
		$sqlQuery->setString($productSection->titleFr);
		$sqlQuery->setString($productSection->descrNed);
		$sqlQuery->setString($productSection->descrFr);
		$sqlQuery->setString($productSection->pageNed);
		$sqlQuery->setString($productSection->pageFr);
		$sqlQuery->setString($productSection->image);
		$sqlQuery->set($productSection->order);
		$sqlQuery->set($productSection->active);
		//$sqlQuery->set((new \DateTime())->format('Y-m-d H:i:s'));
		//$sqlQuery->set(new \DateTime( 'now' ));
		$sqlQuery->set(date('Y-m-d H:i:s'));

		$sqlQuery->setNumber($productSection->id);
		
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
		$productSection = new ProductSection();
		
		$productSection->id 				= $row['O_I_IDF_TECH'];
		$productSection->menuNed 			= $row['T_I_MENU_NED'];
		$productSection->menuFr				= $row['T_I_MENU_FR'];
		$productSection->url 				= $row['T_I_URL'];
		$productSection->titleNed 			= $row['T_I_TITLE_NED'];
		$productSection->titleFr			= $row['T_I_TITLE_FR'];
		$productSection->descrNed 			= $row['T_I_DESCR_NED'];
		$productSection->descrFr			= $row['T_I_DESCR_FR'];
		$productSection->pageNed 			= $row['T_I_PAGE_NED'];
		$productSection->pageFr				= $row['T_I_PAGE_FR'];
		$productSection->image 				= $row['T_I_IMAGE'];
		$productSection->order 				= $row['N_I_ORDER'];
		$productSection->active 			= $row['L_I_ACTIVE'];
		$productSection->created 			= $row['S_I_CREATE_TECH'];
		$productSection->modified			= $row['S_I_MOD_TECH'];
		
		return $productSection;
	}
	
}
?>