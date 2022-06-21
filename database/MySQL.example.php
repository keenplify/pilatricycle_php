<?php
namespace Database;

class MySQL {
  protected $host = "localhost";
  protected $database = "pilatricycle_db";
  protected $username = "root";
  protected $password = "";
  public $connection;

  function __construct() {
    if( is_null($this->connection) ) {
      $this->getConnection()->connectDB();
    }

    return $this->connection;
  }

  function __destruct() {
    mysqli_close($this->connection);
  }

  public function getConnection(){
    /** 
    * Native php function to create db_connection
    */	
    $this->connection = mysqli_connect(
      $this->host,
      $this->username,
      $this->password
    );

    if(!$this->connection) {
      die("Unable to create connection, Server might be too busy or check your credentials!");			
    }

    return $this;
  }

  public function connectDB() {
    /** 
    * Native php function to select database
    */
    if(mysqli_select_db($this->connection, $this->database)){
      return $this;
    } else {
      
    die("Unable to connect to database");
    }
  }
}