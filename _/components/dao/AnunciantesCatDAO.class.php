<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface AnunciantesCatDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AnunciantesCat 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param anunciantesCat primary key
 	 */
	public function delete($codigo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AnunciantesCat anunciantesCat
 	 */
	public function insert($anunciantesCat);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AnunciantesCat anunciantesCat
 	 */
	public function update($anunciantesCat);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCodAnunciante($value);

	public function queryByCodCategoria($value);


	public function deleteByCodAnunciante($value);

	public function deleteByCodCategoria($value);


}
?>