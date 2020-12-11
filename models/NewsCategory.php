<?php
require('../config.php');

class NewsCategory{
    public $category_id;
    public $category_name;
    public $type_id;
    public $db_connection;
    private $serverName="localhost";
    private $userName="root";
    private $password="";
    private $databaseName="newsdb";
        
       

    function __construct(){
      
        $this->db_connection=new Configration();
        
    }

function getAllCategory($type_id){
     
    $pdo=new PDO("mysql:host=$this->serverName;dbname=$this->databaseName",$this->userName,$this->password);
   
  //  $pdo=$this->db_connection->getConnection();
    $pdo_statement=$pdo->prepare(" select * from category_table where id=?");
    $pdo_statement->execute([$type_id]);
   return $pdo_statement->fetchAll(PDO::FETCH_OBJ);
}
function addCategory(){
    try{
        $pdo=new PDO("mysql:host=$this->serverName;dbname=$this->databaseName",$this->userName,$this->password);
        //$pdo=$this->db_connection->getConnection();
    $pdo_statement=$pdo->prepare("insert into category_table VALUES (null,?,?)");
  $pbo_statement->execute([$this->category_name,$this->type_id]);
    
     return true;
    
    }
    catch( PDOException $e){
        return false;

    }

    }
    function updateCategory(){
        try {
           // $pdo=$this->db_connection->getConnection();
           $pdo=new PDO("mysql:host=$this->serverName;dbname=$this->databaseName",$this->userName,$this->password);
           $pdo_statement=$pdo->prepare("update category_table set category_name=?,type_id=? WHERE id=?");
           $pdo_statement->execute([$this->category_name,$this->type_id,$this->category_id]); 
            return true;
           } catch (PDOException $e) {
             return false;
           }
       }
    
       
       function deleteCategory(){
           try {
           // $pdo=$this->db_connection->getConnection();
           $pdo=new PDO("mysql:host=$this->serverName;dbname=$this->databaseName",$this->userName,$this->password);
           $pdo_statement=$pdo->prepare("delete from  category_table WHERE id=?");
           $pdo_statement->execute([$this->category_id]); 
            return true;
           } catch (PDOException $e) {
             return false;
           }
       }   
 
}

