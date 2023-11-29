<?php 
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'safe_helpp_db');

class Crud
{
    
function __construct()
{
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->dbh = $con;


if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
}

//insert

 public function insert($table,$data){
    foreach( array_keys($data) as $key ) {
        
        $fields[] = "`$key`";
        $values[] = "'" . $data[$key] . "'";
    
}

$fields = implode(",", $fields);
$values = implode(",", $values);

$insert_data = mysqli_query($this->dbh,"INSERT INTO $table ($fields) VALUES ($values)");

	return $insert_data;

 }

//read

public function read($table){
    $read_data = mysqli_query($this->dbh,"SELECT * FROM $table ");
    return $read_data;

}

//read with condition
 public function read_with_condition($table,$where_condition){
    $condition = "";
    foreach($where_condition as $key=>$value){

        $condition .= $key." = '".$value."' AND ";

    }

    $condition = substr($condition, 0, -5);
    $fetch_data = mysqli_query($this->dbh,"SELECT * FROM $table WHERE  ".$condition);
     return $fetch_data;
 }

//update

public function update($tablename, $fields, $where_condition){

    $query = "";

    $condition = "";

    foreach($fields as $key=>$value){

        $query .= $key." = '".$value."', ";

    }

    $query = substr($query, 0, -2);

    foreach($where_condition as $key=>$value){

        $condition .= $key." = '".$value."' AND ";

    }

    $condition = substr($condition, 0, -5);

    $query = "UPDATE ".$tablename." SET ".$query." WHERE ".$condition;

    if(mysqli_query($this->dbh, $query)){

        return true;

    } 

}


// delete

public function delete($table,$where_condition){
    $condition = "";
    foreach($where_condition as $key=>$value){

        $condition .= $key." = '".$value."' AND ";

    }

    $condition = substr($condition, 0, -5);
    $delete_data = mysqli_query($this->dbh,"DELETE FROM $table WHERE  ".$condition);
     return $delete_data;
 }







}



?>
