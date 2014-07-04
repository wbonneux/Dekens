<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface PlayersToTeamsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PlayersToTeams 
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
 	 * @param playersToTeam primary key
 	 */
	public function delete($teamId, $playerId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PlayersToTeams playersToTeam
 	 */
	public function insert($playersToTeam);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PlayersToTeams playersToTeam
 	 */
	public function update($playersToTeam);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);


	public function deleteByName($value);


}
?>