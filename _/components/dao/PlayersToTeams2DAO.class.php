<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-10-17 06:11
 */
interface PlayersToTeams2DAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PlayersToTeams2 
	 */
	public function load($teamId, $playerId);

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
 	 * @param playersToTeams2 primary key
 	 */
	public function delete($teamId, $playerId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PlayersToTeams2 playersToTeams2
 	 */
	public function insert($playersToTeams2);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PlayersToTeams2 playersToTeams2
 	 */
	public function update($playersToTeams2);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);


	public function deleteByName($value);


}
?>