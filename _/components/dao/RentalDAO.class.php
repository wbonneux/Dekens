<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */

require_once("BaseCommonDAO.class.php");

interface RentalDAO extends BaseCommonDAO{

	/**
 	 * Insert record to table
 	 *
 	 * @param Content content
 	 */
	public function insert(Rental $rental);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Content content
 	 */
	public function update(Rental $rental);	

	/**
	 * Read a row
	 * @param row(row of a language)
	 */
	
	public function readRow($row);


}
?>