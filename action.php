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
  public function fetch_record($table){

  	//Select *from table_name;
  	$sql='';
  	$sql.= "Select * from " .$table;	
  	
  	$array=array();
  	$query = mysqli_query($this->con,$sql);

  	while( $row =mysqli_fetch_assoc($query)) {
      
      $array[] = $row;
   }
    return $array;

  }

  public function select_records($table,$where){

  	//SELECT * from table_name where condition

  	$sql ='';
  	$condition ='';

  	foreach($where as $key =>$value){
  		//id='5'
  		$condition =$key."= " .$value;
  	}
   
   $sql ="SELECT * from " .$table ." where " .$condition;

   $array =array();
   $query =mysqli_query($this->con,$sql);
  	while($row =mysqli_fetch_assoc($query)){

  		$array[] =$row;
  	}

  	return $array;
  }

  public function update_records($table,$where){

  	//update table_name SET field1 = new-value1, field2 = new-value2 where condition

  }

}

$obj = new DataOperation;

if( isset( $_POST['submit'] ) ){

    $myarray =array(
     
     'm_name' =>$_POST['medicine'],
     'qty' =>$_POST['quantity']
    );
    if($_POST['medicine'] == '' || $_POST['quantity'] =='' ){

    	header("location:index.php");
    }
    else{
    	 if( $obj->insert_records('medicine',$myarray) ){

    	header("location:index.php?msg=Record Inserted Successfull");
    }

    }    
}

?>
