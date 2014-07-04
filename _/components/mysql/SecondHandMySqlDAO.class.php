<?php
/*
 * Class that operate on table 'CONT_CONTENT'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2013/11/30
 */
require_once('BaseCommonMySqlDAO.class.php');

class SecondHandMySqlDAO extends BaseCommonMySqlDAO implements SecondHandDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ContentMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'PROD_SECONDHAND');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('PROD_SECONDHAND');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'PROD_SECONDHAND');
	}
	
	/**
 	 * Delete record from table
 	 * @param content primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'PROD_SECONDHAND');
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('PROD_SECONDHAND');
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContentMySql content
 	 */
	public function insert(SecondHand $secondHand){
		$sql = 'INSERT INTO PROD_SECONDHAND (T_I_TITLE, T_I_IMAGE_1, T_I_IMAGE_2, T_I_IMAGE_3, T_I_IMAGE_4, T_I_IMAGE_5, N_I_BUILD_YEAR, T_I_SIZE_TIRE_FRONT, T_I_SIZE_TIRE_BACK, N_I_HOURS_WORK, C_I_PRICE, L_I_ACTIVE, L_I_SOLD, T_I_DESCRIPTION, S_I_CREATE_TECH) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($secondHand->title);
		$sqlQuery->setString($secondHand->image1);
		$sqlQuery->setString($secondHand->image2);
		$sqlQuery->setString($secondHand->image3);
		$sqlQuery->setString($secondHand->image4);
		$sqlQuery->setString($secondHand->image5);
		$sqlQuery->set($secondHand->buildYear);
		$sqlQuery->set($secondHand->sizeTireFront);
		$sqlQuery->set($secondHand->sizeTireBack);
		$sqlQuery->set($secondHand->hoursWork);
		$sqlQuery->set($secondHand->price);
		$sqlQuery->set($secondHand->active);
		$sqlQuery->set($secondHand->sold);
		$sqlQuery->set($secondHand->description);
		$sqlQuery->set((new \DateTime())->format('Y-m-d H:i:s'));
		
		$id = $this->executeInsert($sqlQuery);	
		$secondHand->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContentMySql content
 	 */
	public function update(SecondHand $secondHand){
		
		$sql = 'UPDATE prod_secondhand SET T_I_TITLE = ?, T_I_IMAGE_1 = ?, T_I_IMAGE_2 = ?, T_I_IMAGE_3 = ?, T_I_IMAGE_4 = ?, T_I_IMAGE_5 = ?, N_I_BUILD_YEAR = ?, T_I_SIZE_TIRE_FRONT = ?, T_I_SIZE_TIRE_BACK = ?, N_I_HOURS_WORK = ?, C_I_PRICE = ?,  L_I_ACTIVE = ?, L_I_SOLD = ?, T_I_DESCRIPTION = ?, S_I_MOD_TECH = ? WHERE O_I_IDF_TECH = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($secondHand->title);
		$sqlQuery->setString($secondHand->image1);
		$sqlQuery->setString($secondHand->image2);
		$sqlQuery->setString($secondHand->image3);
		$sqlQuery->setString($secondHand->image4);
		$sqlQuery->setString($secondHand->image5);
		$sqlQuery->set($secondHand->buildYear);
		$sqlQuery->set($secondHand->sizeTireFront);
		$sqlQuery->set($secondHand->sizeTireBack);
		$sqlQuery->set($secondHand->hoursWork);
		$sqlQuery->set($secondHand->price);
		$sqlQuery->set($secondHand->active);
		$sqlQuery->set($secondHand->sold);
		$sqlQuery->set($secondHand->description);
		$sqlQuery->set((new \DateTime())->format('Y-m-d H:i:s'));

		$sqlQuery->setNumber($secondHand->id);
		
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
		$secondHand = new SecondHand();
		
		$secondHand->id 				= $row['O_I_IDF_TECH'];
		$secondHand->title 				= $row['T_I_TITLE'];
		$secondHand->image1 			= $row['T_I_IMAGE_1'];
		$secondHand->image2 			= $row['T_I_IMAGE_2'];
		$secondHand->image3 			= $row['T_I_IMAGE_3'];
		$secondHand->image4 			= $row['T_I_IMAGE_4'];
		$secondHand->image5 			= $row['T_I_IMAGE_5'];
		$secondHand->buildYear 			= $row['N_I_BUILD_YEAR'];
		$secondHand->sizeTireFront 		= $row['T_I_SIZE_TIRE_FRONT'];
		$secondHand->sizeTireBack 		= $row['T_I_SIZE_TIRE_BACK'];
		$secondHand->hoursWork 			= $row['N_I_HOURS_WORK'];
		$secondHand->price 				= $row['C_I_PRICE'];
		$secondHand->active 			= $row['L_I_ACTIVE'];
		$secondHand->sold 				= $row['L_I_SOLD'];
		$secondHand->description 		= $row['T_I_DESCRIPTION'];
		$secondHand->created 			= $row['S_I_CREATE_TECH'];
		$secondHand->modified			= $row['S_I_MOD_TECH'];
		
		return $secondHand;
	}
	
}
?>