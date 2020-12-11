<?php
 
class Configration{
   
    private $serverName="localhost";
    private $userName="root";
    private $password="";
    private $databaseName="newsdb";
    public $pdo;
    function __construct(){
        try{
        $pdo=new PDO("mysql:host=$this->serverName;dbname=$this->databaseName",$this->userName,$this->password);
       // $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo "Connection failed:".$e->getMessage();
        }
       

    }
function getConnection()
    {
        return $this->pdo;
    }
}

?>