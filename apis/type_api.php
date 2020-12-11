<?php
include('../models/NewsType.php');

$news_type_model=new NewsType();

if(isset($_POST)&& !empty($_POST)){
    $news_type_model->type_name = $_POST['name'];
   
    if($news_type_model->addType()){
        $feedback['code']=2021;
        $feedback['message']="the type was saved successfully";
    }else{
        $feedback['code']=2020;
        $feedback['message']="failed  to save type try again";
    }
    echo json_encode($feedback);
}elseif ($_SERVER['REQUEST_METHOD']=="PUT") {
    $_Put=array();
    parse_str(file_get_contents('php://input'),$_Put);
    $news_type_model->type_id = $_Put['id'];
    $news_type_model->type_name = $_Put['name'];
    
    if($news_type_model->updateType()){
        $feedback['code']=2021;
        $feedback['message']="the type was updated successfully";
    }else{
        $feedback['code']=2020;
        $feedback['message']="failed  to update type try again";
    } 
    echo json_encode($feedback); 
}elseif ($_SERVER['REQUEST_METHOD']=="DELETE") {
    $news_type_model->type_id=$_GET['id'];
    if($news_type_model->deleteType()){
        $feedback['code']=2021;
        $feedback['message']="the type was delete successfully";
    }else{
        $feedback['code']=2020;
        $feedback['message']="failed  to delete type tray again";
    }  
    echo json_encode($feedback);
}elseif (isset($_GET)){
        echo json_encode($news_type_model->getAllType());
    }

?>