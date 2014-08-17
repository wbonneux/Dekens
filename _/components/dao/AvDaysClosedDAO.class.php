<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */

require_once("BaseCommonDAO.class.php");

interface AvDaysClosedDAO extends BaseCommonDAO{

	/**
 	 * Insert record to table
 	 *
 	 * @param Content content
 	 */
	public function insert(AvDaysClosed $avDaysClosed);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Content content
 	 */
	public function update(AvDaysClosed $avDaysClosed);	

	/**
	 * Read a row
	 * @param row(row of a language)
	 */
	
	public function readRow($row);


}
?>