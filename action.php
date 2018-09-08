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

  public function update_records($table,$where,$field){

  	//update table_name SET field1 = new-value1, field2 = new-value2 where condition

    $sql ='';
    $condition='';
    $sql.="Update ".$table ." set ";
    foreach($where as $key=>$value)
    {
      $condition= $key ." =  ".$value;
    }
    foreach ($field as $key=>$value)
    {
      if($key!='id'){
      $sql.=$key ." = '" .$value."' ".",";
      }
   }
    $sql =substr($sql,0,-2);
    $sql.=" where  " .$condition;
  
    $query =mysqli_query($this->con, $sql);


    if($query){
      return true;
    }
}

public function deleted_records($table,$where){

  $sql='';
  $condition='';
  foreach($where as $key=>$value)
  {
    $condition=$key ." = " .$value;
  }
   $sql.="Delete From ".$table. " where " .$condition;

   $query=mysqli_query($this->con,$sql);
   if($query){
    return true;
   }
 
}


}

$obj = new DataOperation;

//Insert Data
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

//Update Data
if( isset( $_POST['update'] ) ){

    $myarray1 =array(

     'id'=>$_POST['id'],
     'm_name' =>$_POST['medicine'],
     'qty' =>$_POST['quantity']
    );

   $id =$_POST["id"];
   $where =array('id'=>$id);
   $s_data =$obj->select_records('medicine',$where);
   foreach($s_data as $row){
                     
    $newURL='index.php?update=1&id='.$row['id'];
   }
    if($_POST['id'] == '' || $_POST['medicine'] == '' || $_POST['quantity'] =='' ){

    header('Location: '.$newURL);
  }
    else{ 
       if( $obj->update_records('medicine',$where,$myarray1) ){

      header("location:index.php?msg=Record Updated Successfull");
    }

    } 
  } 

  //Deleted Record

  if( isset($_GET['deleted']) ) {
     $id=$_GET['id'];
     $where=array('id'=>$id);
     if( $obj->deleted_records('medicine',$where) )
     {
      header('location:index.php?msg=Record Deleted Successfull');
     }
  }
  
    


?>
