<?php

class User {

private Database $conn;

public function __construct() {
  $this->conn = new Database();
}

/**
* Store a user to to the database
*
* @param string login
* @param string password
*
* @return void
**/
public function create(string $login, string $password):void {
  $this->conn->queryWithParams("INSERT INTO users (login, password) VALUES (:login, :password)", ["login" => $login, "password" => $password]);
}

/**
 * Get current logged in user
 *
 * @return array|false
 */
public function current():array|false {
  return $this->getByLogin($_SESSION["login"]);
}

/**
* Get user by id
*
* @param int id
*
* @return array|false data|false
**/
public function getById(int $id):array|false {
  return $this->conn->fetchQueryWithParams("SELECT * FROM users WHERE id = :id", ["id" => $id]);
}

/**
* Get user by login
*
* @param string login
*
* @return array|false data|null
*/
public function getByLogin(string $login):array|false {
  return $this->conn->fetchQueryWithParams("SELECT * FROM users WHERE login = :login", ["login" => $login]);
}

/**
* Update a user's login
*
* @param int id
* @param string login
*
* @return void
**/
public function updateLogin(int $id, string $username):void {
  $this->conn->queryWithParams("UPDATE users SET username = :username WHERE id = :id", ["username" => $username, "id" => $id]);
}

/**
* Update a user's password
* @param int id
* @param string password
*
* @return void
**/
public function updatePassword(int $id, string $password):void {
  $this->conn->queryWithParams("UPDATE users SET password = :password WERE id = :id", ["password" => $password, "id" => $id]);
}

/**
* Delete a user from the database
*
* @param int id
*
* @return void
**/
public function delete(int $id): void {
  $this->conn->queryWithParams("DELETE FROM USERS WHERE id = :id", ["id" => $id]);
}


/**
* Check if a user is logged in

* @return bool
**/

public function isLoggedIn():bool {
  if(empty($_SESSION))
  {
    session_start();
  }
 return isset($_SESSION["login"]);
}

/**
* check if user is root
*
* @return bool
**/
public function isRoot():bool {
return $_SESSION["login"] == "root";
}



}
