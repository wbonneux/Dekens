<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */

require_once("BaseCommonDAO.class.php");

interface AvDaysOpenDAO extends BaseCommonDAO{

	/**
 	 * Insert record to table
 	 *
 	 * @param Content content
 	 */
	public function insert(AvDaysOpen $avDaysOpen);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Content content
 	 */
	public function update(AvDaysOpen $avDaysOpen);	

	/**
	 * Read a row
	 * @param row(row of a language)
	 */
	
	public function readRow($row);


}
?>