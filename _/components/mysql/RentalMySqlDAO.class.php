<?php
/*
 * Class that operate on table 'PROD_RENTAL'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2014/07/09
 */
require_once('BaseCommonMySqlDAO.class.php');

class RentalMySqlDAO extends BaseCommonMySqlDAO implements RentalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ContentMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'PROD_RENTAL');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('PROD_RENTAL');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'PROD_RENTAL');
	}
	
	/**
 	 * Delete record from table
 	 * @param content primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'PROD_RENTAL');
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('PROD_RENTAL');
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContentMySql content
 	 */
	public function insert(Rental $Rental){
		$sql = 'INSERT INTO PROD_RENTAL (T_I_TITLE, T_I_IMAGE_1, T_I_IMAGE_2, T_I_IMAGE_3, T_I_IMAGE_4, T_I_IMAGE_5, C_I_PRICE_DAY, C_I_PRICE_WEEKEND, C_I_PRICE_WEEK, L_I_ACTIVE, T_I_DESCRIPTION, S_I_CREATE_TECH) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($Rental->title);
		$sqlQuery->setString($Rental->image1);
		$sqlQuery->setString($Rental->image2);
		$sqlQuery->setString($Rental->image3);
		$sqlQuery->setString($Rental->image4);
		$sqlQuery->setString($Rental->image5);
		$sqlQuery->set($Rental->priceDay);
		$sqlQuery->set($Rental->priceWeekend);
		$sqlQuery->set($Rental->priceWeek);
		$sqlQuery->set($Rental->active);
		$sqlQuery->set($Rental->description);
		$sqlQuery->set((new \DateTime())->format('Y-m-d H:i:s'));
		
		$id = $this->executeInsert($sqlQuery);	
		$Rental->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContentMySql content
 	 */
	public function update(Rental $Rental){
// 		echo 'update<br>';
// 		echo 'id:'.$Rental->id.'<br>';
// 		echo 'id:'.$_SESSION['sh_id'].'<br>';
		$sql = 'UPDATE PROD_RENTAL SET T_I_TITLE = ?, T_I_IMAGE_1 = ?, T_I_IMAGE_2 = ?, T_I_IMAGE_3 = ?, T_I_IMAGE_4 = ?, T_I_IMAGE_5 = ?, C_I_PRICE_DAY = ?,  C_I_PRICE_WEEKEND = ?,  C_I_PRICE_WEEK = ?,  L_I_ACTIVE = ?, T_I_DESCRIPTION = ?, S_I_MOD_TECH = ? WHERE O_I_IDF_TECH = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($Rental->title);
		$sqlQuery->setString($Rental->image1);
		$sqlQuery->setString($Rental->image2);
		$sqlQuery->setString($Rental->image3);
		$sqlQuery->setString($Rental->image4);
		$sqlQuery->setString($Rental->image5);
		$sqlQuery->set($Rental->priceDay);
		$sqlQuery->set($Rental->priceWeekend);
		$sqlQuery->set($Rental->priceWeek);
		$sqlQuery->set($Rental->active);
		$sqlQuery->set($Rental->description);
		$sqlQuery->set((new \DateTime())->format('Y-m-d H:i:s'));

		$sqlQuery->setNumber($Rental->id);
		
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
		$Rental = new Rental();
		
		$Rental->id 				= $row['O_I_IDF_TECH'];
		$Rental->title 				= $row['T_I_TITLE'];
		$Rental->image1 			= $row['T_I_IMAGE_1'];
		$Rental->image2 			= $row['T_I_IMAGE_2'];
		$Rental->image3 			= $row['T_I_IMAGE_3'];
		$Rental->image4 			= $row['T_I_IMAGE_4'];
		$Rental->image5 			= $row['T_I_IMAGE_5'];
		$Rental->priceDay			= $row['C_I_PRICE_DAY'];
		$Rental->priceWeekend		= $row['C_I_PRICE_WEEKEND'];
		$Rental->priceWeek			= $row['C_I_PRICE_WEEK'];
		$Rental->active 			= $row['L_I_ACTIVE'];
		$Rental->description 		= $row['T_I_DESCRIPTION'];
		$Rental->created 			= $row['S_I_CREATE_TECH'];
		$Rental->modified			= $row['S_I_MOD_TECH'];
		
		return $Rental;
	}
	
}
?>