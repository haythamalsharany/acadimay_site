<?php
include_once('../config.php');
class News{
    private $news_id;
    private $news_title;
    private $news_image;
    private $news_content;
    private $news_date;
    private $category_id;
    public $db_connection;
    private $serverName="localhost";
    private $userName="root";
    private $password="";
    private $databaseName="newsdb";
   

    function __construct(){
      
        $this->db_connection=new Configration();
        
    }

function getAllnewsInCategory_($category_id){
   // $pdo=$this->db_connection->getConnection();
   $pdo=new PDO("mysql:host=$this->serverName;dbname=$this->databaseName",$this->userName,$this->password);
    $pdo_statement=$pdo->prepare("select * from news_table where category_id=?");
    $pdo_statement->execute([$category_id]);
    
    $row=$pdo_statement->fetchAll(PDO::FETCH_OBJ);
    return $row;

}
function getSinglenews($news_id){
   // $pdo=$this->db_connection->getConnection();
   $pdo=new PDO("mysql:host=$this->serverName;dbname=$this->databaseName",$this->userName,$this->password);
    $pdo_statement=$pdo->prepare("select * from news_table where id=?");
    $pdo_statement->execute([$news_id]);

    $row=$pdo_statement->fetchAll(PDO::FETCH_OBJ);
    return $row;

}
function addnews(){
    try {
       // $pdo=$this->db_connection->getConnection();
       $pdo=new PDO("mysql:host=$this->serverName;dbname=$this->databaseName",$this->userName,$this->password);
        $pdo_statement=$pdo->prepare("insert into news_table valuse(null,?,?,now(),?,?");
        $pdo_statement->execute([$this->news_title,$this->news_content,$this->news_image,$this->category_id]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
   }
   function updateNews(){
    try {
       // $pdo=$this->db_connection->getConnection();
       $pdo=new PDO("mysql:host=$this->serverName;dbname=$this->databaseName",$this->userName,$this->password);
        $pdo_statement=$pdo->prepare("update news_table set news_title=?,news_content=?,news_date=?,news_image=?,category_id=? WHERE id=?");
        $pdo_statement->execute([$this->$news_title,$this->$news_content,$this->$news_date,$this->news_image,$this->$category_id,$this->news_id]); 
        return true;
       } catch (PDOException $e) {
         return false;
       }
   }

   
   function deleteNews(){
       try {
        //$pdo=$this->db_connection->getConnection();
        $pdo=new PDO("mysql:host=$this->serverName;dbname=$this->databaseName",$this->userName,$this->password);
        $pdo_statement=$pdo->prepare("delete from  news_table WHERE id=?");
        $pdo_statement->execute([$this->news_id]); 
        return true;
       } catch (PDOException $e) {
         return false;
       }
   }
}
?>