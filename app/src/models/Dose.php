<?php

Class Dose {
  private Database $conn;


public function __construct() {
  $this->conn = new Database();
} 

/**
* Store a dose to the database
*
* @param int uid
* @param string substance
* @param int dose
* @param string volume
* @param string dosed_at
*
* @return void
**/
public function create(int $uid, string $substance, int $dose, string $unit, string $dosed_at):void {
  $this->conn->queryWithParams('INSERT INTO doses (uid, substance, dose, unit, dosed_at) VALUES (:uid, :substance, :dose, :unit, :dosed_at)', ["uid" => $uid, "substance" => $substance, "dose" => $dose, "unit" => $unit, "dosed_at" => $dosed_at]);
}

/**
* Get all dose entries from a user
*
* @param int uid
*
* @return array|null
**/
public function getFromUser(int $uid):array|null {
  return $this->conn->fetchAllQueryWithParams("SELECT * FROM doses WHERE uid = :uid", ["uid" => $uid]);
}

/**
* Get last X dose entries from a user
*
* @param int uid
* @param int limit (Default 10)
*
* @return array|null
**/
public function getLastFromUser(int $uid, int $limit = 10):array|null {
  return $this->conn->fetchAllQueryWithParams("SELECT * FROM doses WHERE uid = :uid ORDER BY created_at DESC LIMIT :limitValue", ['uid' => $uid, 'limitValue' => $limit]);
}

/**
* Delete a dose entry from the database
*
* @param int id
*
* @return void
**/
public function delete(int $id):void {
  $this->conn->queryWithParams("DELETE FROM dose WHERE id = :id");
}
}
 ?>
