<?php
include('../config.php');
class NewsType{
    private $type_id;
    private $type_name;
    public $db_connection;
    private $serverName="localhost";
    private $userName="root";
    private $password="";
    private $databaseName="newsdb";
    
       

    function __construct(){
      
        $this->db_connection=new Configration();
    }
function getAllType(){
    //$pdo=$this->db_connection->getConnection();
    $pdo=new PDO("mysql:host=$this->serverName;dbname=$this->databaseName",$this->userName,$this->password);
   
    $pdo_statement=$pdo->prepare("SELECT * FROM type");
    $pdo_statement->execute();
    

    return $pdo_statement->fetchAll(PDO::FETCH_OBJ);

}
function addType(){
    try {
        
    //$pdo=$this->db_connection->getConection();
    $pdo=new PDO("mysql:host=$this->serverName;dbname=$this->databaseName",$this->userName,$this->password);
    $pdo_statement=$pdo->prepare("insert into type valuse(null,?)");
    $pdo_statement->excute($this->type_name);
    return true;
    } catch (PDOException $e) {
        return false;
    }
}
function updateType(){
    try {
       // $pdo=$this->db_connection->getConnection();
       $pdo=new PDO("mysql:host=$this->serverName;dbname=$this->databaseName",$this->userName,$this->password);
       $pdo_statement=$pdo->prepare("update type set type_name=? WHERE id=?");
       $pdo_statement->execute([$this->type_name,$this->type_id]); 
        return true;
       } catch (PDOException $e) {
         return false;
       }
   }

   
   function deleteType(){
       try {
       // $pdo=$this->db_connection->getConnection();
       $pdo=new PDO("mysql:host=$this->serverName;dbname=$this->databaseName",$this->userName,$this->password);
       $pdo_statement=$pdo->prepare("delete from  type WHERE id=?");
       $pdo_statement->execute([$this->type_id]); 
        return true;
       } catch (PDOException $e) {
         return false;
       }
   } 
    }
    
?>
