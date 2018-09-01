<?php 

include('db.php');

class DataOperation extends Database {

public function insert_records($table,$fields){

    //Insert into table_name ( , ) VALUES ('','') 
     $sql='';
     $sql .= "INSERT INTO ". $table; 
     $sql .="(" .implode(',',array_keys($fields)).") VALUES"; 
     $sql .="('".implode( "','" ,array_values($fields))."')";

     $query =mysqli_query($this->con, $sql);
 
   if($query){
   	 return true;
   }
     
}

}

$obj = new DataOperation;

if( isset( $_POST['submit'] ) ){

    $myarray =array(
     
     'm_name' =>$_POST['medicine'],
     'qty' =>$_POST['quantity']
    );

    if( $obj->insert_records('medicine',$myarray) ){

    	header("location:index.php?msg=Record Inserted Successfull");
    }
    
}





?>
