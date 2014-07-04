<?php
/*
 * Class that operate on table 'players_to_teams'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class PlayersToTeamsMySqlDAO implements PlayersToTeamsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PlayersToTeamsMySql 
	 */
	public function load($teamId, $playerId){
		$sql = 'SELECT * FROM players_to_teams WHERE team_id = ?  AND player_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($teamId);
		$sqlQuery->setNumber($playerId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM players_to_teams';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM players_to_teams ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param playersToTeam primary key
 	 */
	public function delete($teamId, $playerId){
		$sql = 'DELETE FROM players_to_teams WHERE team_id = ?  AND player_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($teamId);
		$sqlQuery->setNumber($playerId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PlayersToTeamsMySql playersToTeam
 	 */
	public function insert($playersToTeam){
		$sql = 'INSERT INTO players_to_teams (name, team_id, player_id) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($playersToTeam->name);

		
		$sqlQuery->setNumber($playersToTeam->teamId);

		$sqlQuery->setNumber($playersToTeam->playerId);

		$this->executeInsert($sqlQuery);	
		//$playersToTeam->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PlayersToTeamsMySql playersToTeam
 	 */
	public function update($playersToTeam){
		$sql = 'UPDATE players_to_teams SET name = ? WHERE team_id = ?  AND player_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($playersToTeam->name);

		
		$sqlQuery->setNumber($playersToTeam->teamId);

		$sqlQuery->setNumber($playersToTeam->playerId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM players_to_teams';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM players_to_teams WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByName($value){
		$sql = 'DELETE FROM players_to_teams WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PlayersToTeamsMySql 
	 */
	protected function readRow($row){
		$playersToTeam = new PlayersToTeam();
		
		$playersToTeam->teamId = $row['team_id'];
		$playersToTeam->playerId = $row['player_id'];
		$playersToTeam->name = $row['name'];

		return $playersToTeam;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return PlayersToTeamsMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>